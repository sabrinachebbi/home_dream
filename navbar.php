
<?php
session_start();

?>

<nav>
    <img id="logo" src="/images/logo-site.webp" onclick="window.location.href='/index.php'" alt="">
    <img src="/images/icone-rent-nav.png" alt="">
    <a href="">Rent</a>
    <img src="/images/icone-sale.png" alt="">
    <a href="">Buy </a>
    <img src="/images/icone-favori.png" alt="">
    <a href="">Favorites</a>
    <img src="/images/icone-contact.webp" alt="">
    <a href="">Contact Us</a>
    <img src="/images/icone-sign-in.png" alt="">
    <?php if (empty($_SESSION['isLoggedIn'])) : ?>
        <li><a href="/security/login.php" class="sign-up" style="background-color: blue; color: white; border-radius: 0.25rem; padding: 0.5rem 1rem; text-decoration: none; display: inline-block;">Login</a></li>
    <?php else : ?>
        <li>
            <a href="/ad/new.php">
                <i> <img src="/images/add.png" alt=""></i>Add
            </a>
        </li>
        <li><a href="/security/logout.php" style="background-color: red; color: white; border-radius: 0.25rem; padding: 0.5rem 1rem; text-decoration: none; display: inline-block;">Logout</a></li>
    <?php endif ?>

</nav>