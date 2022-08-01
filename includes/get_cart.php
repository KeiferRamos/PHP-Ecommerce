<?php
    include "../includes/connect.php";

    if(!isset($_SESSION)){
        session_start();
    }

    $user_id = $_SESSION['id'];

    $sql = "SELECT * FROM orders WHERE customer_id = $user_id;";
    $result = mysqli_query($conn, $sql);
    $check_result = mysqli_num_rows($result);

    $datas = [];

    if($check_result > 0){
        while($row = mysqli_fetch_assoc($result)){
            array_push($datas, $row);
        }
    }else{
        echo "<div>
                <p>no item in cart!</p>
            </div>";
        return;
    }

    $mappedItems = array_map(function($data){

        include "../includes/connect.php";

        $sql = "SELECT * FROM products JOIN orders ON id = {$data['item_id']};";
        $result = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_assoc($result)){
            
            $encoder = "data:image/jpeg;charser:utf8;base64";
            $imagecontent = base64_encode($row['image']);
            $item_id = $data['item_id'];
            $total_price = $row['price'] * $data['quantity'];

            return "
                <div class='cart-item'>
                    <img src='{$encoder},{$imagecontent}' alt='product image'/>
                    <div class='cartitem-info'>
                        <h4>{$row['name']}</h4>
                        <p 
                            id='{$row['name']}' 
                            data-price='{$row['price']}'
                        >
                            ₱ {$total_price}.00
                        </p>
                        <button 
                            data-id='{$item_id}'
                            onclick='removeItem()'
                        >
                            remove
                        </button>
                    </div>
                    <div class='quantity' data-id='$item_id' data-name='{$row['name']}'>
                        <i onclick='addQuantity(`dec`)' class='fa-solid fa-angle-left'></i>
                        <p id='$item_id'>{$data['quantity']}</p>
                        <i onclick='addQuantity(`inc`)' class='fa-solid fa-angle-right'></i>
                    </div>
                </div>";
        }
    }, $datas);

    echo join("", $mappedItems);
?>