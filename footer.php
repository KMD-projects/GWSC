<?php
$visitorCount = getVisitorCount();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="js/script.js"></script>
</head>
<body>
<footer class="grid-container-3">
    <div class="container">
        <div>
            <h6 class="footer-category">Links</h6>
            <div>
                <a href="index.php" class="footer-category-item hover-underline-animation">Home</a><br>
                <a href="contactus.php" class="footer-category-item hover-underline-animation">Contact Us</a><br>
                <a href="rsspage.php" class="footer-category-item hover-underline-animation">RSS</a><br>
            </div>
        </div>
        <div>
            <h6 class="footer-category">Information</h6>
            <div>
                <a href="informationpage.php" class="footer-category-item hover-underline-animation">Information</a><br>
                <a href="featurespage.php" class="footer-category-item hover-underline-animation">Features</a><br>
                <a href="attractionspage.php" class="footer-category-item hover-underline-animation">Attractions</a><br>
                <a href="reviewpage.php" class="footer-category-item hover-underline-animation">Reviews</a><br>
            </div>
        </div>
        <div>
            <h6 class="footer-category">Contact</h6>
            <div>
                <a href="https://goo.gl/maps/5yX7xGGcrBwZS7ZV9" target="_blank"
                   class="footer-category-item hover-underline-animation">
                    Location
                </a><br>
                <a href="mailto:contact@gwsc.com" target="_blank"
                   class="footer-category-item hover-underline-animation">Email Us</a><br>
                <a href="" class="footer-category-item hover-underline-animation">Live Chat</a><br>
                <a href="tel:+8006001234"
                   class="footer-category-item hover-underline-animation">800-600-1234</a><br>
            </div>
        </div>
        <div>
            <h6 class="footer-category">Social</h6>
            <div>
                <a href="https://www.facebook.com/" target="_blank"
                   class="footer-category-item hover-underline-animation"><i class="fa-brands fa-facebook"></i> Facebook</a><br>
                <a href="https://twitter.com/" target="_blank"
                   class="footer-category-item hover-underline-animation"><i class="fa-brands fa-twitter"></i> Twitter</a><br>
                <a href="https://www.instagram.com/" target="_blank"
                   class="footer-category-item hover-underline-animation"><i class="fa-brands fa-instagram"></i> Instagram</a><br>

            </div>
        </div>
    </div>
    <div class="notice">
        <span id="page-name"></span>
        <?php
        echo '<span id="visitor-count">Visitor count: <span class="visitor-count">'.$visitorCount.'</span></span>';
        ?>
        <div id="google_translate_element"></div>
        <p>&copy; Copyright 2023, Global Wild Swimming and Camping</p>
        <p>This website is for educational purpose only.</p>
    </div>
    <script>
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
        }

        googleTranslateElementInit();
    </script>
</footer>
</body>
</html>