<nav>
    <header class="title">
        <h1>Ecommerce</h1>
    </header>
    <ul class="link-list">
        <li>
            <a href="product_page.php">
                home
            </a>
        </li>
        <li>
            <a href="cart_page.php">
                cart
            </a>
        </li>
    </ul>
    <div class="profile">
        <?php
            session_start();
            echo "<img id='user-profile' 
                    src='https://avatars.dicebear.com/api/initials/{$_SESSION['username']}.svg'>"
        ?>
        <div class="arrow"></div>
        <form action="../includes/signout.php" method="POST" class="profile-settings settings">
            <?php 
                echo "<p class='username settings'>{$_SESSION['username']}</p>"
            ?>
            <button>
                <i class="fa-solid fa-user"></i>
                <p>edit profile</p>
            </button>
            <button id="toggle-mode">
                <i class="fa-solid fa-moon"></i>
                <p>dark mode</p>
            </button>
            <button name="signout" type="submit">
                <i class="fa-solid fa-arrow-left"></i>
                <p>sign-out</p>
            </button>
        </form>
    </div>
</nav>