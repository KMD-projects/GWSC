<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GWSC</title>
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
<header>
    <?php include 'navbar.html'; ?>
</header>
<div>
    <input type="checkbox" id="close_ads">
    <div id="ads_popup">
        <div class="promo-image">
            <img alt="promo image" src="images/promo-image.jfif">
        </div>
        <div>
            <div class="content">
                <p class="title">First time discount!</p>
                <span class="discount price-small">15% OFF</span><br><br>
                <label class="review-input-label" id="email-label" for="email">Enter your email:</label><br>
                <input class="styled-input" type="email" id="email" name="email"
                       placeholder="example@gmail.com"><br><br>
                <button type="submit" class="rounded-border-button-primary">UNLOCK 15% OFF</button><br><br>
                <label class="rounded-border-button-3" for="close_ads" id="decline_offer">Decline
                    Offer</label><br><br>
                <p id="ads-note">**Exclusions apply. Does not apply to sale items & cannot be combined with other
                    promos.</p>
            </div>
            <label for="close_ads" id="close_popup">
                <span class="rounded-border-button-3">close</span>
            </label>
        </div>
    </div>
</div>
<main class="grid-container-3">

</main>
<?php include 'footer.html'; ?>
</body>

</html>
