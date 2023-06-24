<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://kit.fontawesome.com/9cfc40fa5c.js" crossorigin="anonymous"></script>
</head>
<!--<nav id="hamnav">-->
<!--    <label for="hamburger">&#9776;</label>-->
<!--    <input type="checkbox" id="hamburger">-->
<!--    <div id="hamitems">-->
<!--        <a href="index.php">Home</a>-->
<!--        <a href="">Information</a>-->
<!--        <a href="campsitepage.php">Pitch Types</a>-->
<!--        <a href="reviewpage.php">Reviews</a>-->
<!--        <a href="">Features</a>-->
<!--        <a href="">Contact</a>-->
<!--        <a href="">Attractions</a>-->
<!--        <a href="rsspage.php">RSS</a>-->
<!--    </div>-->
<!--</nav>-->
<nav>
    <a href="index.php" class="home-icon">GWSC</a>
    <ul class="menu">
        <li><a href="#">Information</a></li>
        <li><a href="campsitepage.php">Pitch Types</a></li>
        <li><a href="reviewpage.php#">Reviews</a></li>
        <li><a href="#">Features</a></li>
        <li><a href="#">Contact</a></li>
        <li><a href="#">Attractions</a></li>
        <li><a href="rsspage.php">RSS</a></li>
    </ul>
    <div class="login-section">
        <?php
        $userId = "";
        if (isset($_SESSION['logged_in_user_id'])) {
            $userId = $_SESSION['logged_in_user_id'];
        }
        if (!empty($userId)) {
            $userName = $_SESSION['logged_in_username'];
            echo '<span class="user-name">Welcome, ' . $userName . '</span>';
            echo '<a href="logout.php">Logout</a>';
        } else {
            echo '<a href="customerlogin.php">Login</a>';
        }

        ?>
    </div>
</nav>
</html>