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

   include "../includes/renderItems.php";
?>