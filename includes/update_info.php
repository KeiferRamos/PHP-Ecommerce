<?php
    include "../includes/connect.php";

    if(!isset($_SESSION)){
        session_start();
    }

    $user_id = $_SESSION['id'];
    $toUpdate = $_REQUEST['toUpdate'];
    $updateVal = $_REQUEST['update'];

    if($toUpdate == "password"){
        $updateVal = password_hash($updateVal, PASSWORD_DEFAULT);
    }

    if($toUpdate == "username"){
        $checkUpdate = "SELECT * FROM users 
         WHERE username = '$updateVal' AND id <> $user_id;";

        $result = mysqli_query($conn, $checkUpdate);
        $check_result = mysqli_num_rows($result);

        if($check_result > 0){
            echo "username already in used!";
            return;
        }
    }

    $sql = "UPDATE users SET $toUpdate = '$updateVal' WHERE id = $user_id;";
    $result = mysqli_query($conn, $sql);

    echo "updated successfully!";
?>