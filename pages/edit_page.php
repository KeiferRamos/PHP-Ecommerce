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
                    <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8cGVyc29ufGVufDB8fDB8fA%3D%3D&w=1000&q=80" alt="">
                    <br/>
                    <button>Upload image</button>
                </div> 
                <div class="user-info">
                    <div>
                        <p>Username</p>
                        <input type="text">
                    </div>
                    <div>
                        <p>password</p>
                        <input type="text">
                    </div>
                </div> 
            </div>
        </div>
        <script src="../js/product.js?v=<?php echo time(); ?>"></script>
    </body>
</html>