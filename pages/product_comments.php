<!DOCTYPE html>
<html lang="en">
    <?php
        include "../components/head.php";
    ?>
    <body onload="renderComments()">
        <div class="wrapper">
            <?php
                include "../components/navbar.php";
            ?>
            <div class="comments">
                <?php
                    include "../includes/comment_header.php";
                ?>
                <div id="item-comments"></div>
                <form class="comment-box">
                    <?php
                        $src = "https://avatars.dicebear.com/api/initials/{$_SESSION['username']}.svg";
                        echo "<img src='{$src}' alt='user-profile'/>"
                    ?>
                    <div>
                        <textarea id="comment" onclick="clearErrorMsg()" placeholder="comment here..."></textarea>
                        <p id="error-message"></p>
                        <button id="send-comment" onclick="addComment()">
                            <i class="fa-solid fa-paper-plane"></i>
                        </button>
                    </div>
                </form>
            </div>
            <div class="arrow-up" onclick="scrollback()">
                <i class="fa-solid fa-arrow-up"></i>
            </div>
        </div>
        <script src="../js/product.js?v=<?php echo time(); ?>"></script>
    </body>
</html>