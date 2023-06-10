<?php

use db\model\Customer;

include('db/query.php');

if (isset($_POST['btnRegister'])) {

    $customer = new Customer();
    $customer->firstname = $_POST['txtFirstname'];
    $customer->lastname = $_POST['txtLastname'];
    $customer->email = $_POST['txtEmail'];
    $customer->password = $_POST['txtPassword'];
    $customer->phone = $_POST['txtPhone'];
    $customer->address = $_POST['txtAddress'];

    if (isCustomerExists($customer->email)) {
        echo "<script>window.alert('Customer with email already existed.')</script>";
        echo "<script>window.location='customerregister.php'</script>";
    } else {
        if (insertCustomer($customer)) {
            echo "Customer registered successfully!";
        } else {
            echo "Failed to register customer.";
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
<form action="customerregister.php" method="POST">
    <label for="name">Firstname: </label>
    <input id="name" type="text" name="txtFirstname" placeholder="Enter firstname" required/><br>

    <label for="name">Lastname: </label>
    <input id="name" type="text" name="txtLastname" placeholder="Enter lastname" required/><br>

    <label for="email">Email: </label>
    <input id="email" type="email" name="txtEmail" placeholder="Enter email" required/><br>

    <label for="password">Password: </label>
    <input id="password" type="password" name="txtPassword" placeholder="Enter password" required/><br>

    <label for="phone">Phone: </label>
    <input id="phone" type="tel" name="txtPhone" placeholder="Enter phone" required/><br>

    <label for="address">Address: </label>
    <input id="address" type="text" name="txtAddress" placeholder="Enter address" required/><br>

    <input type="submit" name="btnRegister" value="Register">
    <input type="reset" name="btnReset" value="Cancel">
</form>
</body>
</html>
