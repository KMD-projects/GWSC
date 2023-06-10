<?php

include('db/query.php');

if (isset($_POST['btnLogin'])) {

    $email = $_POST['txtEmail'];
    $password = $_POST['txtPassword'];

    $customer = getCustomer($email, $password);

    if ($customer != null) {
        echo "Logged in successful!";
    } else {
        if (isCustomerExists($email)) {
            echo "Incorrect password!";
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
