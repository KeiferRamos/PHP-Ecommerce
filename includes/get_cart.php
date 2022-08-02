<?php
    include "../includes/connect.php";

    if(!isset($_SESSION)){
        session_start();
    }

    $user_id = $_SESSION['id'];

    $sql = "SELECT * 
            FROM orders o 
            JOIN products p 
            ON p.item_id = o.item_id 
            AND o.customer_id = $user_id;";

    $result = mysqli_query($conn, $sql);
    $check_result = mysqli_num_rows($result);

    $datas = [];

    if($check_result > 0){
        while($row = mysqli_fetch_assoc($result)){
            array_push($datas, $row);
        }
    }else{
        echo "<div class='empty'>
                <img src='https://cdni.iconscout.com/illustration/free/thumb/empty-cart-4085814-3385483.png' />
                <p>no item in cart!</p>
            </div>";
        return;
    }

    $mappedItems = array_map(function($data){
            $encoder = "data:image/jpeg;charser:utf8;base64";
            $imagecontent = base64_encode($data['image']);
            $item_id = $data['item_id'];
            $total_price = $data['price'] * $data['quantity'];

            return "
                <div class='cart-item'>
                    <img src='{$encoder},{$imagecontent}' alt='product image'/>
                    <div class='cartitem-info' data-id='{$item_id}'>
                        <h4>{$data['name']}</h4>
                        <p 
                            id='{$data['name']}' 
                            data-price='{$data['price']}'
                        >
                            ₱ {$total_price}.00
                        </p>
                        <button onclick='removeItem()'>
                            remove
                        </button>
                    </div>
                    <div class='quantity' data-id='$item_id' data-name='{$data['name']}'>
                        <i onclick='addQuantity(`dec`)' class='fa-solid fa-angle-left'></i>
                        <p id='$item_id'>{$data['quantity']}</p>
                        <i onclick='addQuantity(`inc`)' class='fa-solid fa-angle-right'></i>
                    </div>
                </div>";
    }, $datas);

    echo join("", $mappedItems);
?>