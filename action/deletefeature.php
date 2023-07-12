<?php
include('../db/query.php');

if (isset($_POST['feature_id'])) {
    deleteFeature($_POST['feature_id']);
}
exit();

