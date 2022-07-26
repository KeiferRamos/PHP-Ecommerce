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

    $mappedItem = array_map(function($data){
        $src = "data:image/jpg;charset=utf8;base64";
        $imageContent = base64_encode($data['image']);

        return "
                <div class='product' id='{$data['id']}'>
                    <img id='{$data['id']}' src='{$src},{$imageContent}' />
                    <p id='{$data['id']}'>{$data['name']}</p>
                    <p id='{$data['id']}'>₱ {$data['price']}</p>
                    <button id='{$data['name']}' class='add-btn'>add to cart</button>
                </div>
            ";
    },$datas);
       
    echo join("", $mappedItem);
?>