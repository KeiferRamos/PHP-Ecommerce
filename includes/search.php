<?php
    include "../includes/connect.php";

    $queryString = $_REQUEST['query'];
    $sql = "SELECT * FROM products WHERE name REGEXP '^{$queryString}';";
    $result = mysqli_query($conn, $sql);
    $check_result = mysqli_num_rows($result);

    if($check_result > 0 && $queryString){
        while($row = mysqli_fetch_assoc($result)){
            echo "<p class='recommended-item' onclick='displaySelected()' id={$row['item_id']}>{$row['name']}</p>";
        }
    }
?>