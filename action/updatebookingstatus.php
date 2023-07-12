<?php
include('../db/query.php');

if (isset($_POST['booking_id'])) {
    echo $_POST['booking_id'];
    echo $_POST['booking_status'];
    updateBookingStatus($_POST['booking_id'], $_POST['booking_status']);
}
exit();

