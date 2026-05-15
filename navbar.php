<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$initialCount = 0;

if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {

    foreach ($_SESSION['cart'] as $item) {

        if (isset($item['quantity'])) {
            $initialCount += (int)$item['quantity'];
        }
    }
}

?>

<style>

.cart-icon {
    position: relative;
    display: inline-flex;
    align-items: center;
    justify-content: center;
}

#cart-count {
    position: absolute;
    top: -6px;
    right: -8px;

    width: 18px;
    height: 18px;

    background-color: #723434;
    color: #FFFFFF;
    border: 2px solid #f5ece1;
    border-radius: 50%;

    display: flex;
    align-items: center;
    justify-content: center;

    font-size: 10px;
    font-weight: bold;
    line-height: 1;
    text-align: center;

    box-sizing: content-box;
    z-index: 999;
}

</style>

<nav class="navbar">

    <div class="nav-left">

        <img src="./images/theLogo.png" alt="CAFé 418 Logo" class="logo">

        <div class="nav-links">
            <a href="index.php">Home</a>
            <a href="menu.php">Menu</a>
            <a href="about.php">About us</a>
            <a href="contact-us.php">Contact us</a>
        </div>

    </div>

    <div class="nav-icons">

        <a href="#">
            <img src="./images/icons/search.png" class="icon-img" alt="Search">
        </a>

        <a href="cart.php" class="cart-icon">

            <img src="./images/icons/cart.png" class="icon-img" alt="Cart">

            <span id="cart-count"
            style="display: <?= $initialCount > 0 ? 'flex' : 'none' ?>;">

                <?= $initialCount ?>

            </span>

        </a>

        <a href="profile.php">
            <img src="./images/icons/profile.png" class="icon-img" alt="Profile">
        </a>

    </div>

</nav>