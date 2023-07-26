<?php

include('db/query.php');
include('recaptcha.php');

global $connect, $dataSiteKey;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/9cfc40fa5c.js" crossorigin="anonymous"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="js/script.js"></script>
</head>
<body class="login-body">
<main class="container">
    <h1 class="center-text margin-0">GWSC</h1>
    <h3 class="center-text margin-top-8">Login</h3>

    <label for="email" class="block gwsc-input-label">Email</label>
    <input class="gwsc-input margin-top-4" id="email" type="email" name="txtEmail" placeholder="Enter email"
           required/>

    <label for="password" class="block margin-top-12 gwsc-input-label">Password</label>
    <input class="gwsc-input margin-top-4" id="password" type="password" name="txtPassword"
           placeholder="Enter password" required/>

    <?php
    echo '<div class="g-recaptcha margin-top-16" data-sitekey="' . $dataSiteKey . '"></div>';
    ?>

    <input id="btn-login" onclick="login()" type="submit" class="btn-lg-filled margin-top-18" name="btnLogin"
           value="Login">

    <div id="error" class="gwsc-error center-text margin-top-8" hidden>
        <i class="fa-solid fa-circle-exclamation"></i>
        <span id="error-text"></span>
    </div>
    <span class="block center-text margin-top-18">Don't have an account yet?</span>
    <button class="btn-lg-outlined margin-top-8" onclick="location.href='customerregister.php'">Register</button>
</main>
</body>
</html>
