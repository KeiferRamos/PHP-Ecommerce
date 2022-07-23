<?php
    include "../includes/connect.php";

    session_start();

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        if(empty($username) || empty($password)){
            header("location: ../index.php?success=false&error=empty_field");
        }else{
            $sql = "SELECT * FROM users WHERE username='$username';";
            $result = mysqli_query($conn, $sql);
            $check_result = mysqli_num_rows($result);

            if($check_result > 0){
                while($row = mysqli_fetch_assoc($result)){
                    $password_verified = password_verify($password,$row['password']);
                    if($password_verified){
                        $_SESSION['username'] = $row['username'];
                        $_SESSION['user_id'] = $row['id'];
                        header("location: ../index.php?success=true");
                    }else{
                        header("location: ../index.php?success=false&error=incorrect_password&username={$username}");
                    }
                }
            }else{
                header("location: ../index.php?success=false&error=invalid_username");
            }
        }
        
    }
?>