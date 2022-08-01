<?php
    include "../includes/connect.php";

    if(!isset($_SESSION)){
        session_start();
    }

    $item_id = $_REQUEST['id'];
    $user_id = $_SESSION['id'];

    $sql1 = "SELECT * FROM orders WHERE item_id = $item_id AND customer_id = $user_id;";
    $result = mysqli_query($conn, $sql1);
    $check_result = mysqli_num_rows($result);

    if($check_result > 0){
        echo "item already in cart!";
    }else{
        $sql2 = "INSERT INTO orders(customer_id,item_id,quantity) VALUES('$user_id','$item_id',1);";
        mysqli_query($conn, $sql2);

        echo "item added to cart";
    }
?>