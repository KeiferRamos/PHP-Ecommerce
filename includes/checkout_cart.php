<?php
    include "../includes/connect.php";

    if(!isset($_SESSION)){
        session_start();
    }

    $user_id = $_SESSION['id'];
    $fullname = "{$_REQUEST['firstname']} {$_REQUEST['lastname']}";
    $address = $_REQUEST['address'];
    $contact_no = $_REQUEST['contact'];
    $email = $_REQUEST['email'];
    $is_updated = $_REQUEST['isUpdated']; 

    $sql1 = "UPDATE orders SET order_status = 'checkouted' WHERE customer_id = $user_id;";
    mysqli_query($conn, $sql1);

    $sql2 = "SELECT * FROM user_info WHERE customer_id = $user_id;";
    $result = mysqli_query($conn, $sql2);

    if($is_updated == "true"){
        $sql3 = "UPDATE user_info 
        SET fullname = '$fullname', address = '$address', contact_no = '$contact_no', email = '$email'
        WHERE customer_id = $user_id;";

        mysqli_query($conn, $sql3);
    }else{
        if(mysqli_num_rows($result) == 0){
            $sql3 = "INSERT INTO 
                user_info(fullname,address,contact_no,email,customer_id) 
                VALUES('$fullname','$address','$contact_no','$email', '$user_id');";

            mysqli_query($conn, $sql3);
        }
    }
    
    include "../includes/get_cart.php";
?>