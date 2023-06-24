<?php

include('db/query.php');

session_start();

$error = "No account found with this email. Would you like to register?";

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
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/9cfc40fa5c.js" crossorigin="anonymous"></script>
</head>
<body class="login-body">
<main class="container">
    <h1 class="center-text margin-0">GWSC</h1>
    <h3 class="center-text margin-top-8">Login</h3>
    <form action="customerlogin.php" method="POST">

        <label for="email" class="block gwsc-input-label">Email</label>
        <input class="gwsc-input margin-top-4" id="email" type="email" name="txtEmail" placeholder="Enter email"
               required/>

        <label for="password" class="block margin-top-12 gwsc-input-label">Password</label>
        <input class="gwsc-input margin-top-4" id="password" type="password" name="txtPassword"
               placeholder="Enter password" required/>

        <input class="btn-lg-filled margin-top-18" type="submit" name="btnLogin" value="Login">
    </form>
    <?php if (!empty($error)) : ?>
        <div class="gwsc-error center-text margin-top-8">
            <i class="fa-solid fa-circle-exclamation"></i>
            <?php
            echo $error;
            ?>
        </div>
    <?php endif ?>
    <span class="block center-text margin-top-18">Don't have an account yet?</span>
    <button class="btn-lg-outlined margin-top-8" onclick="location.href='customerregister.php'">Register</button>
</main>
</body>
</html>
