<?php
    if(isset($_GET["success"])){
        if($_GET["success"] == "false"){
            if($_GET["error"] == "empty_field"){
                echo "<p>All fields are required!</p>";
            }else if($_GET['error'] == "short_pass"){
                echo "<p>password must be at least 8 characters long!</p>";
            }else if($_GET['error'] == "taken"){
                echo "<p>username already taken!</p>";
            }else{
                echo "<p>password does not match!</p>";
            }
        }else{
            echo "<p>registered successfully!</p>";
        }   
    }
?>