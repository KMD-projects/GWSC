<?php
include('db/query.php');

$features = getAllFeatures();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="js/script.js"></script>
</head>
<body>
<main class="grid-container-3">
    <h1 class="grid-2-3 center-text">Manage Features</h1>
    <div class="grid-2-3">
        <input id="txtFeatureName" class="gwsc-input-filled" type="text" name="txtName" placeholder="Enter feature name" required>
        <button type="submit" class="btn-sm-filled" onclick="createFeature()">Create</button>
    </div>
    <table class="grid-2-3 data-table margin-top-12">
        <tr>
            <th>Feature ID</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
        <?php
        foreach ($features as $feature) {
            echo '<tr>';
            echo '<td>' . $feature->id . '</td>';
            echo '<td>' . $feature->name . '</td>';
            echo '<td><button id="' . $feature->id . '" class="btn-error" onclick="deleteFeature(this)">Delete</button></td>';
            echo '</tr>';
        }
        ?>
    </table>
</main>
</body>
</html>
