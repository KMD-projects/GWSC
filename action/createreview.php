<?php

use db\model\Review;

global $connect;

include('../db/query.php');

$review = new Review();
$review->title =  mysqli_real_escape_string($connect, $_POST['title']);
$review->description =  mysqli_real_escape_string($connect, $_POST['message']);
$review->userId = $_POST['user_id'];
$review->campsiteId = $_POST['campsite_id'];

insertReview($review);
exit();
