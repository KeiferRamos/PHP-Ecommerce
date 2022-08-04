<?php
    include "../includes/connect.php";

    if(!isset($_SESSION)){
        session_start();
    }

    $item_id = $_REQUEST['id'];
    $quantity = $_REQUEST['count'];
    $customer_id = $_SESSION['id'];

    $sql = "UPDATE orders 
            SET quantity = '$quantity'
            WHERE item_id = {$item_id} 
            AND customer_id = {$customer_id} 
            AND order_status <> 'checkouted';";

    mysqli_query($conn, $sql);
    
    $sql2 = "SELECT * FROM orders 
            WHERE item_id = $item_id 
            AND customer_id = {$customer_id}
            AND order_status <> 'checkouted';";
            
    $result = mysqli_query($conn, $sql2);
    $check_result = mysqli_num_rows($result);

    if($check_result > 0){
        while($data = mysqli_fetch_assoc($result)){
            echo $data['quantity'];
        }
    }
?>