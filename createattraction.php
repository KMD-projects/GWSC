<?php

use db\model\Attraction;

include('db/query.php');

global $connect;

$campsiteId = "";
if (isset($_GET['campsite_id'])) {
    $campsiteId = $_GET['campsite_id'];
}

if (isset($_POST['btnCreate'])) {

    $attraction = new Attraction();
    $attraction->name = mysqli_real_escape_string($connect, $_POST['txtName']);
    $attraction->description = mysqli_real_escape_string($connect, $_POST['txtDescription']);
    $attraction->distance = mysqli_real_escape_string($connect, $_POST['txtDistance']);
    $attraction->campsiteId = mysqli_real_escape_string($connect, $_POST['txtCampsiteId']);

    // image
    $imgFileName = $_FILES['photo']['name'];
    $imgTmpPath = $_FILES['photo']['tmp_name'];
    $to = "images/".$imgFileName;
    $to = mysqli_real_escape_string($connect, $to);
    $copy = move_uploaded_file($imgTmpPath, $to);
    $attraction->image = $to;

    if (insertAttraction($attraction)) {
        echo "Attraction created successfully!";
    } else {
        echo "Failed to create attraction.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create attraction</title>
</head>
<body>
<form action="createattraction.php" method="POST" enctype="multipart/form-data">
    <label for="name">Name: </label>
    <input id="name" type="text" name="txtName" placeholder="Enter name" required/><br>

    <label for="description">Description: </label>
    <input id="description" type="text" name="txtDescription" placeholder="Enter description" required/><br>

    <label for="distance">Capacity: </label>
    <input id="distance" type="number" name="txtDistance" placeholder="Enter distance" required/><br>

    <label for="campsiteId">Campsite: </label>
    <?php
    echo '<input id="campsiteId" value="' . $campsiteId . '" type="number" name="txtCampsiteId" placeholder="Enter campsite ID" readonly/><br>';
    ?>

    <label for="image">Image: </label>
    <input id="image" type="file" name="photo">

    <br>
    <br>

    <input type="submit" name="btnCreate" value="Create">
    <input type="reset" name="btnReset" value="Cancel">
</form>
</body>
</html>
