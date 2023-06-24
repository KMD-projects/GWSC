<?php
session_start();
// logout
//unset( $_SESSION['logged_in_user_id'] );
session_destroy();
header('location: index.php');
//echo '<script>location.reload();</script>';
exit();
?>
