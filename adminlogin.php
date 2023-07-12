<?php

include('db/query.php');

session_start();

if (isset($_POST['btnLogin'])) {

    $email = $_POST['txtEmail'];
    $password = $_POST['txtPassword'];

    $admin = getAdmin($email, $password);

    if ($admin != null) {
        $_SESSION['logged_in_admin_id'] = $admin->id;
//        echo "<script>window.alert('Logged in successful!')</script>";
        echo "<script>window.location='admindashboard.php'</script>";
    } else {
        if (isAdminExists($email)) {
            echo "Login failed. Incorrect password.";
        } else {
            echo "No account found with this email. Would you like to register?";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Login</title>
</head>
<body class="auth-form-body">
<div class="auth-form-container">
    <h2>Admin Login</h2>
    <form action="adminlogin.php" method="POST">
        <label for="email">Email</label>
        <input id="email" type="email" name="txtEmail" placeholder="Enter email" required/><br>

        <label for="password">Password</label>
        <input id="password" type="password" name="txtPassword" placeholder="Enter password" required/><br>

        <input type="submit" name="btnLogin" value="Login">
        <input type="reset" name="btnReset" value="Cancel">
    </form>
</div>
</body>
</html>
