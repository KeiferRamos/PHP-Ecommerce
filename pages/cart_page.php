<!DOCTYPE html>
<html lang="en">
    <?php
        include "../components/head.php"
    ?>
    <body>
        <div class="wrapper">
            <?php
                include "../components/navbar.php";
            ?>
            <div id="cart-items" class="items">
                <?php
                    include "../includes/get_cart.php";
                ?>
            </div>
        </div>
        <script src="../js/product.js??v=<?php echo time(); ?>"></script>
    </body>
</html>