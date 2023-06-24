<?php

include('db/query.php');

session_start();

$error = "";

if (isset($_POST['btnLogin'])) {

    $email = $_POST['txtEmail'];
    $password = md5($_POST['txtPassword']);

    $customer = getCustomer($email, $password);

    $failedCount = $_SESSION['customer_login_failed_count'] ?? 0;

    if ($customer != null) {
        $error = "";
        $_SESSION['logged_in_user_id'] = $customer->id;
        $_SESSION['logged_in_username'] = $customer->firstname;
        header('location: index.php');
    } else {
        if (isCustomerExists($email)) {
            $failedCount++;
            $_SESSION['customer_login_failed_count'] = $failedCount;
            $remainingAttempt = 3 - $failedCount;

            if ($remainingAttempt == 0) {
                $_SESSION['customer_login_failed_count'] = 0;
                header('location: LoginTimer.php');
                exit();
            }
            $error = "Login failed. Incorrect password. (Remaining attempt: $remainingAttempt)";
        } else {
            $error = "No account found with this email. Would you like to register?";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer register</title>
</head>
<body>
<?php if (!empty($error)) : ?>
    <div>
        <?php
        echo $error;
        ?>
    </div>
<?php endif ?>
<form action="customerlogin.php" method="POST">

    <label for="email">Email: </label>
    <input id="email" type="email" name="txtEmail" placeholder="Enter email" required/><br>

    <label for="password">Password: </label>
    <input id="password" type="password" name="txtPassword" placeholder="Enter password" required/><br>

    <input type="submit" name="btnLogin" value="Login">
    <input type="reset" name="btnReset" value="Cancel">
</form>
<a href="customerregister.php">Register</a>
</body>
</html>
