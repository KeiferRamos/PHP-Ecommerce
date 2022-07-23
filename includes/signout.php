<?php
    if(isset($_POST['signout'])){
        session_start();
        session_destroy();
        header("location: ../index.php");
    }
?>