<?php

use db\model\Campsite;

include('db/query.php');

if (isset($_POST['btnCreate'])) {

    $campsite = new Campsite();
    $campsite->name = $_POST['txtName'];
    $campsite->location = $_POST['txtLocation'];
    $campsite->description = $_POST['txtDescription'];
    $campsite->tentCapacity = $_POST['txtTentCapacity'];
    $campsite->caravanCapacity = $_POST['txtCaravanCapacity'];
    $campsite->motorHomeCapacity = $_POST['txtMotorHomeCapacity'];
    $campsite->price = $_POST['txtPrice'];

    // image
//    $imgFileName = $_FILES['photo']['name'];
//    $imgTmpPath = $_FILES['photo']['tmp_name'];
//
//    $to = "images/".$imgFileName;
//    $copy = move_uploaded_file($imgTmpPath, $to);

    if (insertCampsite($campsite)) {
        echo "Campsite created successfully!";
    } else {
        echo "Failed to create campsite.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create campsite</title>
</head>
<body>
<form action="createcampsite.php" method="POST">
    <label for="name">Name: </label>
    <input id="name" type="text" name="txtName" placeholder="Enter name" required/><br>

    <label for="location">Location: </label>
    <input id="location" type="text" name="txtLocation" placeholder="Enter location" required/><br>

    <label for="description">Description: </label>
    <input id="description" type="text" name="txtDescription" placeholder="Enter description" required/><br>

    <label for="tentCapacity">Tent Capacity: </label>
    <input id="tentCapacity" type="number" name="txtTentCapacity" placeholder="Enter tent capacity" required/><br>

    <label for="caravanCapacity">Tent Capacity: </label>
    <input id="caravanCapacity" type="number" name="txtCaravanCapacity" placeholder="Enter caravan capacity" required/><br>

    <label for="motorHomeCapacity">Tent Capacity: </label>
    <input id="motorHomeCapacity" type="number" name="txtMotorHomeCapacity" placeholder="Enter motor home capacity" required/><br>

    <label for="price">Price: </label>
    <input id="price" type="number" name="txtPrice" placeholder="Enter price" required/><br>

    <input type="submit" name="btnCreate" value="Create">
    <input type="reset" name="btnReset" value="Cancel">
</form>
</body>
</html>
