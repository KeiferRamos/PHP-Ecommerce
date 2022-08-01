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
            <div class="cart-total">
                <h2>Cart total</h2>
                <div>
                    <p>Subtotal</p>
                    <p>₱ 390.00</p>
                </div>
                <div>
                    <p>Quantity</p>
                    <p>10 pcs</p>
                </div>
                <div>
                    <p>shipping Fee</p>
                    <p>₱ 200.00</p>
                </div>
                <div class="total">
                    <p>Total</p>
                    <p>₱ 1000.00</p>
                </div>
                <button>Checkout</button>
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