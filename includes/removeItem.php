<?php
    include "../includes/connect.php";

    if(!isset($_SESSION)){
        session_start();
    }

    $customerId = $_SESSION['id'];
    $item_id = $_REQUEST['item_id'];

    $sql = "DELETE FROM orders WHERE customer_id = $customerId AND item_id = $item_id;";
    mysqli_query($conn, $sql);

    include "../includes/get_cart.php";
?>