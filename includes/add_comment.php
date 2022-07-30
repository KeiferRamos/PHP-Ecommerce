<?php
    include "../includes/connect.php";

    if(!isset($_SESSION)){
        session_start();
    }

    $username = $_SESSION['username'];
    $comment = $_REQUEST['comment'];
    $item_id = $_REQUEST['id'];
    $limit = $_REQUEST['limit'];

    $sql1 = "INSERT INTO comments(username, user_comment, item_id)
            VALUES('$username','$comment','$item_id');";

    mysqli_query($conn, $sql1);

    include "../includes/rendercomment.php";
?>