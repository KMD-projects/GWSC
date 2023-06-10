<?php

include('db/query.php');

session_start();

if (isset($_POST['btnLogin'])) {

    $email = $_POST['txtEmail'];
    $password = $_POST['txtPassword'];

    $customer = getCustomer($email, $password);

    $failedCount = $_SESSION['customer_login_failed_count'] ?? 0;

    if ($customer != null) {
        $_SESSION['logged_in_customer_id'] = $customer->id;
        echo "<script>window.alert('Logged in successful!')</script>";
        echo "<script>window.location='index.php'</script>";
    } else {
        if (isCustomerExists($email)) {
            $failedCount++;
            $_SESSION['customer_login_failed_count'] = $failedCount;
            $remainingAttempt = 3 - $failedCount;
            if ($failedCount < 3) {
                echo "<script>window.alert('Login failed. Incorrect password. (Remaining attempt: $remainingAttempt)')</script>";
            } else {
                $_SESSION['customer_login_failed_count'] = 0;
                echo "<script>window.alert('Login failed. Incorrect password. (Remaining attempt: $remainingAttempt)')</script>";
                echo "<script>window.location='LoginTimer.php'</script>";
            }
        } else {
            echo "No account found with this email. Would you like to register?";
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
<form action="customerlogin.php" method="POST">

    <label for="email">Email: </label>
    <input id="email" type="email" name="txtEmail" placeholder="Enter email" required/><br>

    <label for="password">Password: </label>
    <input id="password" type="password" name="txtPassword" placeholder="Enter password" required/><br>

    <input type="submit" name="btnLogin" value="Login">
    <input type="reset" name="btnReset" value="Cancel">
</form>
</body>
</html>
