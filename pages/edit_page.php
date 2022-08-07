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
                <?php
                    include "../includes/edit_user.php";
                ?>
            </div>
            <div class="arrow-up" onclick="scrollback()">
                <i class="fa-solid fa-arrow-up"></i>
            </div>
        </div>
        <script src="../js/product.js?v=<?php echo time(); ?>"></script>
        <script src="../js/user.js?v=<?php echo time(); ?>"></script>
    </body>
</html>