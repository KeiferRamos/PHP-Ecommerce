<!DOCTYPE html>
<html lang="en">
<?php
    include "../components/head.php";
?>
<body>
    <div class="login-page">
        <div class="background">
            <img src="https://images.unsplash.com/photo-1512621776951-a57141f2eefd?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" alt="">
            <header>
                <h1>We'll do that together.</h1>
                <h1>Do what?</h1>
            </header>
        </div>
         <form action="../includes/register.php" class="login-form" method="POST">
            <h1>REGISTER</h1>
            
            <?php
                include "../includes/registerhandler.php";
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

             <br/>

             <div class="input-field">
                <label class="confirm label">
                    <i class="fa-solid fa-lock"></i>
                    <p>confirm</p>
                </label>
                <input id="confirm" type="password" name="confirm">
            </div>

            <div class="password-checkbox">
                <input type="checkbox" name="checkbox" id="checkbox">
                <label for="checkbox">Show Password</label>
            </div>

            <br/>

            <button class="login-btn" type="submit" name="submit">register</button>

            <br/>

            <div class="register-link">
                <p>
                    already have an account?
                    <a href="../index.php">sign in.</a>
                </p>
            </div>
                
        </form>
        <script src="../js/login.js?v=<?php echo time(); ?>"></script>
    </div>
</body>
</html>