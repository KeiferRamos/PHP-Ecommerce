<nav>
    <header class="title">
        <h1>Ecommerce</h1>
    </header>
    <ul class="link-list">
        <li id="home">
            <a href="product_page.php">
                home
            </a>
        </li>
        <li id="cart">
            <a href="cart_page.php">
                cart
            </a>
        </li>
    </ul>
    <div class="profile">
        <?php
            echo "<img 
                    id='user-profile' 
                    onclick='showSettings()'
                    src='https://avatars.dicebear.com/api/initials/{$_SESSION['username']}.svg'
                    alt='user profile'
                    >"
        ?>
        <div class="arrow"></div>
        <div class="profile-settings settings">
            <?php 
                echo "<p class='username settings'>{$_SESSION['username']}</p>"
            ?>
            <div>
                <i class="fa-solid fa-user"></i>
                <p>edit profile</p>
            </div>
            <div id="toggler" onclick="toggleSettings()">
                <i class="fa-solid fa-moon"></i>
                <p>dark mode</p>
            </div>
            <div onclick="signout()">
                <i class="fa-solid fa-arrow-left"></i>
                <p>sign-out</p>
            </div>
        </form>
    </div>
</nav>