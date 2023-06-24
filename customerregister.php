<?php

global $connect;

use db\model\Customer;

include('db/query.php');

$error = "";

if (isset($_POST['btnRegister'])) {

    $customer = new Customer();
    $customer->firstname = mysqli_real_escape_string($connect, $_POST['txtFirstname']);
    $customer->lastname = mysqli_real_escape_string($connect, $_POST['txtLastname']);
    $customer->email = mysqli_real_escape_string($connect, $_POST['txtEmail']);
    $customer->password = md5(mysqli_real_escape_string($connect, $_POST['txtPassword']));
    $customer->phone = mysqli_real_escape_string($connect, $_POST['txtPhone']);
    $customer->address = mysqli_real_escape_string($connect, $_POST['txtAddress']);

    if (isCustomerExists($customer->email)) {
        $error = "An account with email (".$customer->email.") already existed.";
    } else {
        if (insertCustomer($customer)) {
            header('location: customerlogin.php');
        } else {
            $error = "Failed to create an account.";
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
    <h3 class="center-text margin-top-8">Create New Account</h3>
    <form action="customerregister.php" method="POST">
        <label for="name" class="block gwsc-input-label margin-top-8">Firstname</label>
        <input class="gwsc-input margin-top-4" id="name" type="text" name="txtFirstname" placeholder="Enter firstname" required/><br>

        <label for="name" class="block gwsc-input-label margin-top-8">Lastname</label>
        <input class="gwsc-input margin-top-4" id="name" type="text" name="txtLastname" placeholder="Enter lastname" required/><br>

        <label for="email" class="block gwsc-input-label margin-top-8">Email</label>
        <input class="gwsc-input margin-top-4" id="email" type="email" name="txtEmail" placeholder="Enter email" required/><br>

        <label for="password" class="block gwsc-input-label margin-top-8">Password</label>
        <input class="gwsc-input margin-top-4" id="password" type="password" name="txtPassword" placeholder="Enter password" required/><br>

        <label for="phone" class="block gwsc-input-label margin-top-8">Phone</label>
        <input class="gwsc-input margin-top-4" id="phone" type="tel" name="txtPhone" placeholder="Enter phone" required/><br>

        <label for="address" class="block gwsc-input-label margin-top-8">Address</label>
        <input class="gwsc-input margin-top-4" id="address" type="text" name="txtAddress" placeholder="Enter address" required/><br>

        <input class="btn-lg-filled margin-top-18" type="submit" name="btnRegister" value="Register">
    </form>
    <?php if (!empty($error)) : ?>
        <div class="gwsc-error center-text margin-top-8">
            <i class="fa-solid fa-circle-exclamation"></i>
            <?php
            echo $error;
            ?>
        </div>
    <?php endif ?>
    <span class="block center-text margin-top-18">Already have an account?</span>
    <button class="btn-lg-outlined margin-top-8" onclick="location.href='customerlogin.php'">Login</button>
</main>
</body>
</html>
