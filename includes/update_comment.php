<?php
    include "../includes/connect.php";

    $user_comment = $_REQUEST['comment'];
    $commentId = $_REQUEST['commentId'];
    $item_id = $_REQUEST['id'];
    date_default_timezone_set("Asia/Singapore");
    $date_now = date("m-d-Y", time());
    $time_now = date("h:ia");
    $date_time = "{$date_now}  {$time_now}";

    $sql = "UPDATE comments SET user_comment = '$user_comment', time = '$date_time' WHERE comment_id = $commentId;";
    mysqli_query($conn, $sql);

    include "../includes/rendercomment.php";
?>