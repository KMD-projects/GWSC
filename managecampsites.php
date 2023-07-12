<?php
include('db/query.php');

$campsites = getCampsites();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Campsites</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="js/script.js"></script>
</head>
<body>
<main class="grid-container-3">
    <h1 class="grid-2-3 center-text">Manage Campsites</h1>
    <h2 class="grid-2-3 center-text"><a href="createcampsite.php">Create campsite</a></h2>
    <table class="grid-2-3 data-table">
        <tr>
            <th>Campsite ID</th>
            <th>Name</th>
            <th>Location</th>
            <th>Pitches</th>
            <th>Attractions</th>
            <th>Actions</th>
        </tr>
        <?php
        foreach ($campsites as $campsite) {
            echo '<tr>';
            echo '<td>' . $campsite->id . '</td>';
            echo '<td>' . $campsite->name . '</td>';
            echo '<td>' . $campsite->location . '</td>';
            $pitches = $campsite->tentCapacity." Tents | ".$campsite->caravanCapacity." Caravans | ".$campsite->motorHomeCapacity. " MotorHomes";
            echo '<td>' . $pitches . '</td>';
            echo '<td>' . sizeof($campsite->attractions) . '</td>';
            echo '<td>';
            echo '<button id="' . $campsite->id . '" class="btn-error" onclick="deleteCampsite(this)">Delete</button>';
            echo '<button class="btn-success" onclick="navigateToAddPitch`(\'' . $campsite->id . '\')`">Add Pitch</button>';
            echo '<button class="btn-success" onclick="navigateToAddFeature(\'' . $campsite->id . '\')">Add Features</button>';
            echo '<button class="btn-success" onclick="navigateToAddAttraction(\'' . $campsite->id . '\')">Add Attractions</button>';
            echo '</td>';
            echo '</tr>';
        }
        ?>
    </table>
</main>
</body>
</html>
