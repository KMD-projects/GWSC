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
    <title>Admin dashboard</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<main>
    <h1 class="grid-2-3 center-text">Admin Dashboard</h1>
    <section class="dashboard">
        <div>
            <img src="images/home/campsites.png">
            <h2><a href="managecampsites.php">Manage Campsites</a></h2>
        </div>
        <div>
            <img src="images/home/users.png">
            <h2><a href="manageusers.php">Manage Users</a></h2>
        </div>
        <div>
            <img src="images/home/booking.png">
            <h2><a href="managebookings.php">Manage Bookings</a></h2>
        </div>
        <div>
            <img src="images/home/features.png">
            <h2><a href="managefeatures.php">Manage Features</a></h2>
        </div>
    </section>
</main>
</body>
</html>
