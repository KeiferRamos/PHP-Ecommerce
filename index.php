<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/d3782f2cbe.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="styles.css?v=<?php echo time(); ?>">
        <title>Ecommerce</title>
    </head>
    <body>
        <div class="login-page">
            <div class="background">
                <img src="https://images.unsplash.com/photo-1512621776951-a57141f2eefd?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" alt="">
                <header>
                    <h1>We'll do that together.</h1>
                    <h1>Do what?</h1>
                </header>
            </div>
            <form action="./includes/login.php" class="login-form" method="POST">
                <h1>LOGIN</h1>
                
                <?php
                    include "./includes/loginhandler.php";
                ?>
                <br/>

                <div class="input-field">
                    <label class="username label">
                        <i class="fa-solid fa-user"></i>
                        <p>username</p>
                    </label>
                    <?php
                        $val = '';
                        if(isset($_GET['username'])){
                            $val = $_GET['username'];
                        }
                        echo "<input 
                                id='username' 
                                type='text' 
                                name='username' 
                                value='{$val}'
                            />"
                    ?>
                </div>

                <br/>

                <div class="input-field">
                    <label class="password label">
                        <i class="fa-solid fa-lock"></i>
                        <p>password</p>
                    </label>
                    <input id="password" type="password" name="password">
                </div>

                <div class="password-checkbox">
                    <input type="checkbox" name="checkbox" id="checkbox">
                    <label for="checkbox">Show Password</label>
                </div>

                <br/>

                <button class="login-btn" type="submit" name="submit">Login</button>

                <br/>

                <div class="register-link">
                    <p>
                        dont have an account yet?
                        <a href="./pages/register_page.php">create.</a>
                    </p>
                </div>
            </form>
        </div>
        <script src="./js/login.js?v=<?php echo time(); ?>"></script>
    </body>
</html>