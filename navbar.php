<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://kit.fontawesome.com/9cfc40fa5c.js" crossorigin="anonymous"></script>
</head>
<nav>
    <div class="header">
        <a href="index.php" class="home-icon">GWSC</a>
        <i id="hamburger" class="fa-solid fa-bars hamburger"></i>
    </div>
    <ul id="menu" class="menu">
        <li class="menu-item"><a href="informationpage.php">Information</a></li>
        <li class="menu-item"><a href="campsitepage.php">Pitch Types</a></li>
        <li class="menu-item"><a href="featurespage.php">Features</a></li>
        <li class="menu-item"><a href="attractionspage.php">Attractions</a></li>
        <li class="menu-item"><a href="reviewpage.php">Reviews</a></li>
        <li class="menu-item"><a href="contactus.php">Contact Us</a></li>
        <li class="menu-item"><a href="rsspage.php">RSS</a></li>
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