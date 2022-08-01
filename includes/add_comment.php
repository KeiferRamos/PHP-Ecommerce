<?php
    include "../includes/connect.php";

    if(!isset($_SESSION)){
        session_start();
    }

    $username = $_SESSION['username'];
    $comment = $_REQUEST['comment'];
    $item_id = $_REQUEST['id'];
    $limit = $_REQUEST['limit'];
    $date_now = date('m-d-Y',time());
    $time_now = date("H:ia");
    $date_time = "{$date_now}  {$time_now}";

    $sql1 = "INSERT INTO comments(username, user_comment, item_id, time)
            VALUES('$username','$comment','$item_id','$date_time');";

    mysqli_query($conn, $sql1);

    include "../includes/rendercomment.php";
?>