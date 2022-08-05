<!DOCTYPE html>
<html lang="en">
    <?php
        include "../components/head.php"
    ?>
    <body onload="getCartTotal()">
        <div class="wrapper">
            <?php
                include "../components/navbar.php";
            ?>
            <div id="cart-items" class="items">
                <?php
                    include "../includes/get_cart.php";
                ?>
            </div>
            <div class="cart-total" id="cart-total">
            </div>
            <div class="checkout-modal" onload="updateHandler()">
               <?php
                    include "../components/form.php";
               ?>
            </div>
        </div>
        <?php
            include "../components/modal.php";
        ?>
        <div class="arrow-up" onclick="scrollback()">
            <i class="fa-solid fa-arrow-up"></i>
        </div>
        <script src="../js/product.js??v=<?php echo time(); ?>"></script>
    </body>
</html>