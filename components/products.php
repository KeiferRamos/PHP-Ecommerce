<?php
    include "../includes/connect.php";

    $sql = "SELECT * FROM products;";
    $result = mysqli_query($conn,$sql);
    $resultCount = mysqli_num_rows($result);

    $datas = array();

    if($resultCount > 0){
        while($row = mysqli_fetch_assoc($result)){
            array_push($datas,$row);
        }
    }

    foreach($datas as $data){
        $src = "data:image/jpg;charset=utf8;base64";
        $imageContent = base64_encode($data['image']);

        echo "
                <div class='product'>
                    <img src='{$src},{$imageContent}' />
                    <p>{$data['name']}</p>
                    <p>₱ {$data['price']}</p>
                    <button>add to cart</button>
                </div>
                <br/>
            ";
    }
?>