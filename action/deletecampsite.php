<?php
include('../db/query.php');

if (isset($_POST['campsite_id'])) {
    deleteCampsite($_POST['campsite_id']);
}
exit();

