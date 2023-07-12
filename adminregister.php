<?php

use db\model\Admin;

include('db/query.php');

if (isset($_POST['btnRegister'])) {

    $admin = new Admin();
    $admin->name = $_POST['txtName'];
    $admin->email = $_POST['txtEmail'];
    $admin->password = $_POST['txtPassword'];

    if (isAdminExists($admin->email)) {
        echo "<script>window.alert('Admin with email already existed.')</script>";
        echo "<script>window.location='adminregister.php'</script>";
    } else {
        if (insertAdmin($admin)) {
            echo "<script>window.alert('Admin registered successfully!')</script>";
            echo "<script>window.location='adminlogin.php'</script>";
        } else {
            echo "Failed to register admin.";
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
    <title>Admin register</title>
</head>
<body class="auth-form-body">
<div class="auth-form-container">
    <h2>Admin registration</h2>
    <form action="adminregister.php" method="POST">
        <label for="name">Name</label>
        <input id="name" type="text" name="txtName" placeholder="Enter name" required/><br>

        <label for="email">Email</label>
        <input id="email" type="email" name="txtEmail" placeholder="Enter email" required/><br>

        <label for="password">Password</label>
        <input id="password" type="password" name="txtPassword" placeholder="Enter password" required/><br>

        <input type="submit" name="btnRegister" value="Register">
        <input type="reset" name="btnReset" value="Cancel">
    </form>
</div>
</body>
</html>
