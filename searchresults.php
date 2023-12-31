<?php
include('db/query.php');
session_start();

$campsites = array();
$searchQuery = "";

if (isset($_GET['query'])) {
    $searchQuery = $_GET['query'];

    $campsites = searchCampsite($searchQuery);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GWSC</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<header>
    <?php include 'navbar.php'; ?>
</header>
<div>

</div>
<main class="grid-container-3">
    <div class="grid-2-3">
        <?php
        if (empty($campsites)) {
            echo '<div class="search-results-container">';
            echo '<p class="no-results-message">No Results Found for "'.$searchQuery.'"</p>';
            echo '</div>';
        } else {
            echo '<div class="search-results-container">';
            echo '<p class="no-results-message">Results Found for "'.$searchQuery.'"</p>';
            echo '</div>';
            echo '<div class="campsite-list">';

            foreach ($campsites as $campsite) {
                echo '<div class="item">';
                echo '<img alt="campsite image" class="image" src="' . $campsite->image . '">';
                echo '<p class="name">' . $campsite->name . '</p>';
                echo '<p class="description">' . $campsite->description . '</p>';
                echo '<p><span class="price-small">$' . $campsite->price . '</span></p>';
                $detailPageUrl = 'campsitedetails.php?campsite_id=' . $campsite->id;
                echo '<button onclick="window.location.href = \'' . $detailPageUrl . '\';" class="btn-sm-filled">View</button>';
                echo '</div>';
            }
            echo '</div>';
        }
        ?>
    </div>
</main>
</body>

</html>
