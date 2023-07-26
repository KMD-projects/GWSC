<?php

include('db/query.php');

session_start();

$reviews = getAllReviews();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviews</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/9cfc40fa5c.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="js/script.js"></script>
</head>

<body>
<header>
    <?php include 'navbar.php'; ?>
    <div class="page-header">
        <h1>Reviews</h1>
    </div>
</header>
<main class="grid-container-3">
    <section class="grid-2-3 grid-gap-16 review-list">
        <?php
        foreach ($reviews as $review) {
            echo '<div class="item">';
            echo '<div class="content">';
            echo '<div class="review-profile">';
            echo '<img alt="reviewer image" class="review-avatar" src="images/cool.png">';
            echo '<div class="review-name">';
            echo '<h3>' . $review->username . '</h3>';
            echo '<h5>Reviewed ' . $review->date . '</h5><br>';
            echo '</div>';
            echo '</div>';

            echo '<p class="quote">' . $review->title . '</p><br>';
            echo '<div class="rating">';
            echo '<i class="fa-solid fa-star fa-xl star"></i>';
            echo '<i class="fa-solid fa-star fa-xl star"></i>';
            echo '<i class="fa-solid fa-star fa-xl star"></i>';
            echo '<i class="fa-solid fa-star fa-xl star"></i>';
            echo '<i class="fa-regular fa-star fa-xl star"></i>';
            echo '</div>';
            echo '<p class="review-content">' . $review->description . '</p>';
            $detailPageUrl = 'campsitedetails.php?campsite_id=' . $review->campsiteId;
            echo '<button onclick="window.location.href = \'' . $detailPageUrl . '\';" class="btn-sm-filled">View Camp</button>';
            echo '</div>';
            echo '</div>';
        }
        ?>
    </section>
</main>
<?php include 'footer.php'; ?>
<script>
    changePageNameFooter("Review");
</script>
</body>

</html>
