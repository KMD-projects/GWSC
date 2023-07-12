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
</head>
<body>
<main class="grid-container-3">
    <h1 class="grid-2-3 center-text">Manage Campsites</h1>
    <table class="grid-2-3 data-table">
        <tr>
            <th>Campsite ID</th>
            <th>Name</th>
            <th>Location</th>
            <th>Actions</th>
        </tr>
        <?php
        foreach ($campsites as $campsite) {
            echo '<tr>';
            echo '<td>'.$campsite->id.'</td>';
            echo '<td>'.$campsite->name.'</td>';
            echo '<td>'.$campsite->location.'</td>';
            echo '<td>
<button class="btn-sm-outlined">Delete</button>
<a class="btn-sm-outlined" href="createpitch.php">Add Pitch</a>
<a class="btn-sm-outlined" href="">Add Features</a>
<a class="btn-sm-outlined" href="createat">Add Attractions</a>
</td>';
            echo '</tr>';
        }
        ?>
    </table>
</main>
</body>
</html>
