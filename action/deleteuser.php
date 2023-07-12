<?php
include('../db/query.php');

if (isset($_POST['user_id'])) {
    deleteCustomer($_POST['user_id']);
}
exit();

