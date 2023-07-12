<?php

use db\model\Pitch;

include('db/query.php');

global $connect;

$campsiteId = "";
if (isset($_GET['campsite_id'])) {
    $campsiteId = $_GET['campsite_id'];
}

if (isset($_POST['btnCreate'])) {

    $pitch = new Pitch();
    $pitch->name = mysqli_real_escape_string($connect, $_POST['txtName']);
    $pitch->capacity = mysqli_real_escape_string($connect, $_POST['txtCapacity']);
    $pitch->description = mysqli_real_escape_string($connect, $_POST['txtDescription']);
    $pitch->type = mysqli_real_escape_string($connect, $_POST['txtType']);
    $pitch->groundType = mysqli_real_escape_string($connect, $_POST['txtGroundType']);
    $pitch->price = mysqli_real_escape_string($connect, $_POST['txtPrice']);
    $pitch->campsiteId = mysqli_real_escape_string($connect, $_POST['txtCampsiteId']);

    // image
    $imgFileName = $_FILES['photo']['name'];
    $imgTmpPath = $_FILES['photo']['tmp_name'];
    $to = "images/" . $imgFileName;
    $to = mysqli_real_escape_string($connect, $to);
    $copy = move_uploaded_file($imgTmpPath, $to);
    $pitch->image = $to;

    if (insertPitch($pitch)) {
        echo "Pitch created successfully!";
    } else {
        echo "Failed to create pitch.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create pitch</title>
</head>
<body>
<form action="createpitch.php" method="POST" enctype="multipart/form-data">
    <label for="name">Name: </label>
    <input id="name" type="text" name="txtName" placeholder="Enter name" required/><br>

    <label for="capacity">Capacity: </label>
    <input id="capacity" type="number" name="txtCapacity" placeholder="Enter capacity" required/><br>

    <label for="description">Description: </label>
    <input id="description" type="text" name="txtDescription" placeholder="Enter description" required/><br>

    <span>Pitch Type: </span>
    <input type="radio" id="tent" name="txtType" value="Tent" checked>
    <label for="tent">Tent</label>
    <input type="radio" id="caravan" name="txtType" value="Caravan">
    <label for="caravan">Caravan</label>
    <input type="radio" id="motorhome" name="txtType" value="Motorhome">
    <label for="motorhome">Motorhome</label><br>

    <label for="groundType">Tent Ground Type: </label>
    <input id="groundType" type="text" name="txtGroundType" placeholder="Enter ground type" required/><br>

    <label for="price">Price: </label>
    <input id="price" type="number" name="txtPrice" placeholder="Enter price" required/><br>

    <label for="campsiteId">Campsite ID: </label>
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
