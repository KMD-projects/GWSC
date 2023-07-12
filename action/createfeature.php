<?php

use db\model\Feature;

global $connect;

include('../db/query.php');

if (isset($_POST['feature_name'])) {
    $feature = new Feature();
    $feature->name = mysqli_real_escape_string($connect, $_POST['feature_name']);
    insertFeature($feature);
}
exit();
