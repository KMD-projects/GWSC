<?php

include('../db/query.php');
include('../recaptcha.php');

global $connect, $dataSiteKey;

session_start();

$error = "";

$recaptchaResult = processRecaptcha($_POST['response_token']);
if (!empty($recaptchaResult)) {
    $error = $recaptchaResult;
} else {

    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $password = md5(mysqli_real_escape_string($connect, $_POST['password']));

    $customer = getCustomer($email, $password);

    $failedCount = $_SESSION['customer_login_failed_count'] ?? 0;

    if ($customer != null) {
        $error = "";
        $_SESSION['logged_in_user_id'] = $customer->id;
        $_SESSION['logged_in_username'] = $customer->firstname;
    } else {
        if (isCustomerExists($email)) {
            $failedCount++;
            $_SESSION['customer_login_failed_count'] = $failedCount;
            $remainingAttempt = 3 - $failedCount;

            if ($remainingAttempt == 0) {
                $_SESSION['customer_login_failed_count'] = 0;
                $error = "blocked";
            } else {
                $error = "Login failed. Incorrect password. (Remaining attempt: $remainingAttempt)";
            }
        } else {
            $error = "No account found with this email. Would you like to register?";
        }
    }
}

echo $error;