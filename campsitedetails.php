<?php

include('db/query.php');

session_start();

$campsiteId = $_GET['campsite_id'];
$campsite = getCampsite($campsiteId);
$pitches = getPitches($campsiteId);
$attractions = getAttractions($campsiteId);
$reviews = getReviews($campsiteId);
$features = getFeatures($campsiteId);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GWSC</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js"></script>
</head>

<body>
<header>
    <?php include 'navbar.php'; ?>
</header>
<main class="grid-container-3">

    <section class="campsite-detail-container">
        <?php
        echo '<img alt="campsite image" class="image" src="' . $campsite->image . '">';
        echo '<h1>' . $campsite->name . '</h1>';
        echo '<h4>' . $campsite->location . '</h4>';
        echo '<p>' . $campsite->description . '</p>'
        ?>

        <h1>Features</h1>
        <div class="features">
            <?php
            foreach ($features as $feature) {
                echo '<span>' . $feature->name . '</span>';
            }
            ?>
        </div>

        <h1>Pitches</h1>
        <div class="pitches grid-container-2">
            <?php
            foreach ($pitches as $pitch) {
                echo '<div class="item">';
                echo '<img alt="image" class="image" src="' . $pitch->image . '">';
                echo '<div class="content">';
                echo '<h3>' . $pitch->name . '</h3>';
                echo '<span class="chip-filled">' . $pitch->type . '</span>';
                echo '<span class="chip-filled">' . $pitch->groundType . '</span>';
                echo '<span class="max-lines-2 margin-top-8">' . $pitch->description . '</span>';
                echo '<form action="bookingpage.php" method="post">';
                echo '<input type="hidden" name="pitch_id" value="' . $pitch->id . '">';
                echo '<div class="grid-container-2 margin-top-12">';
                echo '<span><span class="price-small">$' . $pitch->price . '</span> for '.$pitch->duration.'</span>';
                echo '<button class="btn-sm-filled margin-bot-8" type="submit">Book</button>';
                echo '</div>';
                echo '</form>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>

        <h1>Attractions</h1>
        <div class="attractions grid-container-2">
            <?php
            foreach ($attractions as $attraction) {
                echo '<div class="item">';
                echo '<img alt="image" class="image" src="' . $attraction->image . '">';
                echo '<div class="content">';
                echo '<span class="title">' . $attraction->name . '</span><br>';
                echo '<span class="chip-filled distance">' . $attraction->distance . ' miles</span><br>';
                echo '<p>' . $attraction->description . '</p><br>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>

        <h1>Reviews</h1>
        <div class="reviews grid-container-2">
            <?php
            foreach ($reviews as $review) {
                echo '<div class="item">';

                echo '<div class="header">';
                echo '<img alt="reviewer image" src="images/cool.png">';

                echo '<div class="content">';
                echo '<span>' . $review->userId . '</span><br>';
                echo '<span>Reviewed ' . $review->date . '</span>';
                echo '</div>';

                echo '</div>';

                echo '<h3 class="title">' . $review->title . '</h3>';
                echo '<div class="rating">';
                echo '<i class="fa-solid fa-star fa-sm"></i>';
                echo '<i class="fa-solid fa-star fa-sm"></i>';
                echo '<i class="fa-solid fa-star fa-sm"></i>';
                echo '<i class="fa-solid fa-star fa-sm"></i>';
                echo '<i class="fa-regular fa-star fa-sm"></i>';
                echo '</div>';
                echo '<p class="description">' . $review->description . '</p>';
                echo '</div>';
            }
            ?>
        </div>

        <h1>Location</h1>
        <iframe class="map"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3819.34423957643!2d96.13362136091719!3d16.809270202581764!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1eb46206c0001%3A0x62648e1d66474021!2sKMD%20Institute!5e0!3m2!1sen!2smm!4v1672136439916!5m2!1sen!2smm"
                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>

</main>
<?php include 'footer.html'; ?>
<script>
    changePageNameFooter("Campsite");
</script>
</body>
</html>
