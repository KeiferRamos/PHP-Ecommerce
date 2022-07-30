<?php
    include "../includes/connect.php";

    $comment_id = $_REQUEST['id'];
    $itemId = $_REQUEST['itemID'];
    $limit = $_REQUEST['limit'];

    $sql1 = "DELETE FROM comments WHERE comment_id = $comment_id;";
    mysqli_query($conn, $sql1);

    include "../includes/rendercomment.php";
?>