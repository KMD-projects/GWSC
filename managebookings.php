<?php
include('db/query.php');

$bookings = getAllBookings();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Bookings</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="js/script.js"></script>
</head>
<body>
<main class="grid-container-3">
    <h1 class="grid-2-3 center-text">Manage Bookings</h1>
    <table class="grid-2-3 data-table">
        <tr>
            <th>Booking ID</th>
            <th>Customer Name</th>
            <th>Pitch Name</th>
            <th>Campsite Name</th>
            <th>Booked Date</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        <?php
        foreach ($bookings as $booking) {
            echo '<tr>';
            echo '<td>'.$booking->id.'</td>';
            echo '<td>'.$booking->username.'</td>';
            echo '<td>'.$booking->pitchName.'</td>';
            echo '<td>'.$booking->campsiteName.'</td>';
            echo '<td>'.$booking->date.'</td>';
            echo '<td>'.$booking->status.'</td>';
            echo '<td>
<button id="'. $booking->id .'" class="btn-success" onclick="acceptBooking(this)">Accept</button>
<button id="'. $booking->id .'" class="btn-error" onclick="declineBooking(this)">Decline</button>
</td>';
            echo '</tr>';
        }
        ?>
    </table>
</main>
</body>
</html>
