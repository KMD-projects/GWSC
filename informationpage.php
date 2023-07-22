<?php

include('db/query.php');


session_start();

$campsites = getCampsites();
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
    <div class="campsite-list">
        <?php
        foreach ($campsites as $campsite) {
            echo '<div class="item">';
            echo '<img alt="campsite image" class="image" src="' . $campsite->image . '">';
            echo '<p class="name">' . $campsite->name . '</p>';
            echo '<span class="pitch-type">';
            echo $campsite->tentCapacity . ' Tents';
            echo '</span>';
            echo '<span class="pitch-type">';
            echo $campsite->caravanCapacity . ' caravans';
            echo '</span>';
            echo '<span class="pitch-type">';
            echo $campsite->motorHomeCapacity . ' motorhomes';
            echo '</span>';
            echo '<div class="description max-lines-2">';
            echo $campsite->description;
            echo '</div>';
            echo '<p><span class="price-small">$' . $campsite->price . '</span></p>';
            $detailPageUrl = 'campsitedetails.php?campsite_id=' . $campsite->id;
            echo '<button onclick="window.location.href = \'' . $detailPageUrl . '\';" class="btn-sm-filled">View</button>';
            echo '</div>';
        }
        ?>
    </div>
</main>
<?php include 'footer.html'; ?>
<script>
    changePageNameFooter("Campsites");
</script>
</body>
</html>
