<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://kit.fontawesome.com/9cfc40fa5c.js" crossorigin="anonymous"></script>
</head>
<nav>
    <a href="index.php" class="home-icon">GWSC</a>
    <ul class="menu">
        <li><a href="informationpage.php">Information</a></li>
        <li><a href="campsitepage.php">Pitch Types</a></li>
        <li><a href="reviewpage.php#">Reviews</a></li>
        <li><a href="featurespage.php">Features</a></li>
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