<!DOCTYPE html>
<html lang="en">
    <?php
        include "../components/head.php";
    ?>
    <body>
        <div class="wrapper">
            <?php
                include "../components/navbar.php";
            ?>
            <div class="profile-update">
                <div class="image">
                    <img 
                        src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8cGVyc29ufGVufDB8fDB8fA%3D%3D&w=1000&q=80" 
                        alt=""
                    />
                    <br/>
                    <button>Upload image</button>
                </div> 
                <div class="user-info">
                    <div class="update-input">
                        <p>Username</p>
                        <input type="text" id="username">
                    </div>
                    <div class="update-input">
                        <p>password</p>
                        <input type="password" id="password" value="**********"> 
                        <div class="password-checkbox">
                            <input type="checkbox" id="checkbox" id="password">
                            <span>show password</span>
                        </div>
                    </div>
                    <div class="update-input">
                        <p>confirm</p>
                        <input type="password" id="confirm" value="**********">
                    </div>
                    <button>update</button>
                </div> 
            </div>
        </div>
        <script src="../js/product.js?v=<?php echo time(); ?>"></script>
        <script src="../js/user.js?v=<?php echo time(); ?>"></script>
    </body>
</html>