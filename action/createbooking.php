<?php

use db\model\Booking;

global $connect;

include('../db/query.php');

$booking = new Booking();
$booking->guestCount =  mysqli_real_escape_string($connect, $_POST['guest_count']);
$booking->pitchPrice =  mysqli_real_escape_string($connect, $_POST['pitch_price']);
$booking->taxPrice =  mysqli_real_escape_string($connect, $_POST['tax_price']);
$booking->serviceFee =  mysqli_real_escape_string($connect, $_POST['service_fee']);
$booking->totalPrice =  mysqli_real_escape_string($connect, $_POST['total_price']);
$booking->status =  "pending";
$booking->campsiteId =  mysqli_real_escape_string($connect, $_POST['campsite_id']);
$booking->pitchId =  mysqli_real_escape_string($connect, $_POST['pitch_id']);
$booking->userId =  mysqli_real_escape_string($connect, $_POST['user_id']);

insertBooking($booking);
exit();
