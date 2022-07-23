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
            echo "<img src='https://avatars.dicebear.com/api/initials/{$_SESSION['username']}.svg'>"
        ?>
        <div class="arrow"></div>
        <div class="profile-settings">
            <?php 
                echo "<p>{$_SESSION['username']}</p>"
            ?>
            <div>
                <i class="fa-solid fa-user"></i>
                <p>edit profile</p>
            </div>
            <div>
                <i class="fa-solid fa-moon"></i>
                <p>dark mode</p>
            </div>
            <div>
                <i class="fa-solid fa-arrow-left"></i>
                <p>sign-out</p>
            </div>
        </div>
    </div>
</nav>