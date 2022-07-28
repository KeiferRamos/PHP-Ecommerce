<!DOCTYPE html>
<html lang="en">
    <?php
        include "../components/head.php";
    ?>
    <body>
        <div class="wrapper">
            <?php
                include "../components/navbar.php";
                include "../components/filter.php";
            ?>
            <div class="products">
                <?php
                    include "../components/products.php";
                    
                ?>
            </div>
            <?php
                include "../components/modal.php";
            ?>
            <div class="arrow-up" onclick="scrollback()">
                <i class="fa-solid fa-arrow-up"></i>
            </div>
        </div>
        <script  src="../js/product.js?v=<?php echo time(); ?>"></script>
    </body>
</html>