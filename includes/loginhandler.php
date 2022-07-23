<?php
    if(isset($_GET['success'])){
        if($_GET['success'] == 'true'){
            header("location: ./pages/product_page.php");
        }else {
            $error = $_GET['error'];
            if($error == "empty_field"){
                echo "<p>All fields are required!</p>";
            }else if($error == "invalid_username"){
                echo "<p>username is not recognized!</p>";
            }else if($error == "incorrect_password"){
                echo "<p>incorrect password!</p>";
            }
        }
    }
?>