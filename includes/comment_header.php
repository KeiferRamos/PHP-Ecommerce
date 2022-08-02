<?php
    include "../includes/connect.php";

    $sql1 = "SELECT * FROM products WHERE item_id = {$_GET['id']};";
    $result = mysqli_query($conn, $sql1);
    $check_result = mysqli_num_rows($result);

    if($check_result > 0){
        while($row = mysqli_fetch_assoc($result)){
            $imgSrc = "data:image/jpeg;charset:utf8;base64";
            $imgcontent = base64_encode($row['image']);

            $sql2 = "SELECT * FROM likes WHERE item_id = {$row['item_id']};";
            $result2 = mysqli_query($conn, $sql2);
            $likes_count = mysqli_num_rows($result2);

            echo "
                <a href='../pages/info_page.php?id={$row['item_id']}'>
                    <img src='{$imgSrc},{$imgcontent}' alt='product-image' />
                    <div>
                        <h1>{$row['name']}</h1>
                        <span>{$likes_count} like(s)<span>
                    </div>
                </a>
            ";
        }
    }
    
?>