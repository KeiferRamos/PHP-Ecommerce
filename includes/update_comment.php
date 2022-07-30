<?php
    include "../includes/connect.php";

    $user_comment = $_REQUEST['comment'];
    $commentId = $_REQUEST['commentId'];
    $item_id = $_REQUEST['id'];

    $sql = "UPDATE comments SET user_comment = '$user_comment' WHERE comment_id = $commentId;";
    mysqli_query($conn, $sql);

    include "../includes/rendercomment.php";
?>