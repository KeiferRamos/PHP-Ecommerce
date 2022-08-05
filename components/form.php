<?php
    include "../includes/connect.php";

    if(!isset($_SESSION)){
        session_start();
    }

    $user_id = $_SESSION['id'];

    $sql = "SELECT * FROM user_info WHERE customer_id = $user_id;";
    
    $result = mysqli_query($conn, $sql);
    $check_result = mysqli_num_rows($result);

    if($check_result > 0){
        while($row = mysqli_fetch_assoc($result)){
            $fullname = explode(" ", $row['fullname']);
            $firstname = $fullname[0];
            $lastname = $fullname[1];

            echo "
                <form class='checkout-form'>
                    <h1>Information</h1>
                    <input type='text' id='firstname' placeholder='First name' value='$firstname'>
                    <input type='text' id='lastname' placeholder='Last name' value='$lastname'>
                    <input type='text' id='address' placeholder='Complete Address' value='{$row['address']}'>
                    <input type='tel' id='contact' placeholder='contact number' value='{$row['contact_no']}'>
                    <input type='email' id='email' placeholder='email' value='{$row['email']}'>
                    <button onclick='confirmCheckout()'>Check out</button>
                    <div class='warning-text'>
                        <p></p>
                    </div>
                </form>";
        }
    }else{
        echo "
            <form class='checkout-form'>
                <h1>Information</h1>
                <input type='text' id='firstname' placeholder='First name' >
                <input type='text' id='lastname' placeholder='Last name'>
                <input type='text' id='address' placeholder='Complete Address'>
                <input type='tel' id='contact' placeholder='contact number'>
                <input type='email' id='email' placeholder='email'>
                <button onclick='confirmCheckout()'>Check out</button>
                <div class='warning-text'>
                    <p></p>
                </div>
            </form>";
    };

?>