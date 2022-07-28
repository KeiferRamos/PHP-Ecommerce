<?php
    include "../includes/connect.php";

    session_start();
    $item_id = $_REQUEST['id'];
    $user_id = $_SESSION['id'];

    $sql1 = "SELECT * FROM likes WHERE item_id = $item_id AND user_id = $user_id;";
    $result = mysqli_query($conn, $sql1);
    $check_result = mysqli_num_rows($result);

    if($check_result > 0){
        $sql2 = "DELETE FROM likes WHERE item_id = $item_id AND user_id = $user_id;";
        mysqli_query($conn, $sql2);
    }else{
        $sql3 = "INSERT INTO likes(item_id, user_id) VALUES('$item_id', '$user_id');";
        mysqli_query($conn, $sql3);
    }

    $sql4 = "SELECT * FROM likes WHERE item_id = $item_id;";
    $result2 = mysqli_query($conn, $sql4);
    $result_count = mysqli_num_rows($result2);

    echo $result_count > 0 ? $result_count : "";
?>