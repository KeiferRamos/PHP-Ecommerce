<?php
    include "../includes/connect.php";

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirm = $_POST['confirm'];

        if(empty($username) || empty($password)){
            header("location: ../pages/register_page.php?success=false&error=empty_field");
        }else{
            $sql = "SELECT * FROM users WHERE username='$username';";
            $result = mysqli_query($conn, $sql);
            $check_result = mysqli_num_rows($result);

            if($check_result > 0){
                header("location: ../pages/register_page.php?success=false&error=taken");
            }else if(strlen($password) < 8){
                header("location: ../pages/register_page.php?success=false&error=short_pass&username={$username}");
            }else if($confirm !== $password){
                header("location: ../pages/register_page.php?success=false&error=not_confirm&username={$username}");
            }else{
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO users(username,password) VALUES('$username','$hashedPassword');";
                mysqli_query($conn,$sql);

                header("location: ../pages/register_page.php?success=true&error=none");
            }
        }
    }
?>