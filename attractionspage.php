<?php

include('db/query.php');


session_start();

$attractions = getAllAttractions();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attractions</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="js/script.js"></script>
</head>

<body>
<header>
    <?php include 'navbar.php'; ?>
    <div class="page-header">
        <h1>Attractions</h1>
    </div>
</header>
<main class="grid-container-3">
    <div class="attractions grid-2-3 margin-top-20">
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
</main>
<?php include 'footer.php'; ?>
<script>
    changePageNameFooter("Attractions");
</script>
</body>
</html>
