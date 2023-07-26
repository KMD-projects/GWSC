<?php

include('db/query.php');


session_start();

$features = getAllFeatures();

$wearables = [];
$wearables[] = "Smartwatches";
$wearables[] = "Fitness trackers";
$wearables[] = "VR and AR headsets";
$wearables[] = "Smart clothing";
$wearables[] = "Smart jewelry";
$wearables[] = "Headphones";
$wearables[] = "Smart eyewear";
$wearables[] = "Medical wearables";

$facilities = [];
$facilities[] = "Reception";
$facilities[] = "Restrooms";
$facilities[] = "First aid";
$facilities[] = "Sanitary facilities";
$facilities[] = "Car parking";
$facilities[] = "Restaurant, Cafe";
$facilities[] = "Sitting area";
$facilities[] = "Available tents";
$facilities[] = "Fire place";
$facilities[] = "Washing and drying machines";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Features</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js"></script>
</head>

<body>
<header>
    <?php include 'navbar.php'; ?>
    <div class="page-header">
        <h1>Features</h1>
    </div>
</header>
<main class="grid-container-3">
    <div class="flex-container grid-2-3 margin-top-20">
        <?php
        foreach ($features as $feature) {
            echo '<div class="feature-item" >';
            echo '<span>' . $feature->name . '</span>';
            echo '</div>';
        }
        ?>
    </div>

    <h1 class="grid-2-3">Facilities</h1>
    <span class="grid-2-3">These are some common facilities on our sites.</span>

    <div class="flex-container grid-2-3 margin-top-20">
    <?php
    foreach ($facilities as $facility) {
        echo '<div class="feature-item" >';
        echo '<span>' . $facility . '</span>';
        echo '</div>';
    }
    ?>
    </div>

    <h1 class="grid-2-3">Wearable Technologies</h1>
    <span class="grid-2-3">GWSC allows these types of wearables on our sites.</span>

    <div class="flex-container grid-2-3 margin-top-20">
    <?php
    foreach ($wearables as $wearable) {
        echo '<div class="feature-item" >';
        echo '<span>' . $wearable . '</span>';
        echo '</div>';
    }
    ?>
    </div>

</main>
<?php include 'footer.php'; ?>
<script>
    changePageNameFooter("Features");
</script>
</body>
</html>
