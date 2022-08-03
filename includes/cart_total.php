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
    $item_total_price = [];
    $items_quantity = [];

    if($check_result > 0){
        while($data = mysqli_fetch_assoc($result)){
            array_push($item_total_price, $data['price'] * $data['quantity']);
            array_push($items_quantity, $data['quantity']);
        }
    }

    function sum($total, $num){
        return $total += $num;
    }

    $total_price = array_reduce($item_total_price, "sum");
    $total_quantity = array_reduce($items_quantity, "sum");
    $shipping_fee = 50;
    $cart_total = $total_price + $shipping_fee;

    if($total_quantity > 0){
        echo "
        <h2>Cart total</h2>
        <div>
            <p>Subtotal</p>
            <p>₱ {$total_price}.00</p>
        </div>
        <div>
            <p>Quantity</p>
            <p>{$total_quantity} pcs</p>
        </div>
        <div>
            <p>shipping Fee</p>
            <p>₱ {$shipping_fee}.00</p>
        </div>
        <div class='total'>
            <p>Total</p>
            <p id='cart-total'>₱ {$cart_total}.00</p>
        </div>
        <button onclick='checkOutItem()'>Checkout</button>";
    }
    
?>