<?php

include('db/query.php');

global $connect;

session_start();

$user = null;
if (isset($_SESSION['logged_in_user_id'])) {
    $userId = $_SESSION['logged_in_user_id'];
    $user = getCustomerProfile($userId);
}

if (isset($_POST['btnSend'])) {
    $subject = mysqli_real_escape_string($connect, $_POST['txtSubject']);
    $message = mysqli_real_escape_string($connect, $_POST['txtMessage']);

    $msg = "";
    if (insertContactUs($user->id, $subject, $message)) {
        $msg = "Send successfully!";
    } else {
        $msg = "Failed to send message.";
    }
    echo '<script>alert("' . $msg . '");</script>';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/9cfc40fa5c.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="js/script.js"></script>
</head>

<body>
<header>
    <?php include 'navbar.php'; ?>
    <div class="page-header">
        <h1>Contact Us</h1>
    </div>
</header>
<main class="grid-container-3">
    <h1 class="center-text grid-2-3">Send us a message</h1>
    <form class="grid-2-3" action="contactus.php" method="POST">

        <div class="grid-container-3-equal grid-gap-16">
            <div>
                <label for="name" class="block gwsc-input-label">Name</label>
                <?php
                echo '<input class="gwsc-input-filled-full-width margin-top-4" id="name" type="text" name="txtName" placeholder="Name"
                       readonly value="' . $user->firstname . '"/>';
                ?>
            </div>

            <div>
                <label for="email" class="block gwsc-input-label">Email</label>
                <?php
                echo '<input class="gwsc-input-filled-full-width margin-top-4" id="email" type="email" name="txtEmail"
                       placeholder="Email"
                       readonly value="' . $user->email . '"/>';
                       ?>
            </div>

            <div>
                <label for="phone" class="block gwsc-input-label">Phone</label>
                <?php
                echo '<input class="gwsc-input-filled-full-width margin-top-4" id="phone" type="tel" name="txtPhone"
                       placeholder="Phone" readonly value="' . $user->phone . '"/>';
                ?>
            </div>
        </div>

        <label for="subject" class="block margin-top-12 gwsc-input-label">Subject</label>
        <input class="gwsc-input-filled-full-width margin-top-4" id="subject" type="text" name="txtSubject"
               placeholder="Subject" required/>

        <label for="message" class="block margin-top-12 gwsc-input-label">Message</label>
        <textarea class="gwsc-textarea-filled margin-top-4" id="message" name="txtMessage"
                  placeholder="Message" required></textarea>

        <input class="btn-lg-filled margin-top-18" type="submit" name="btnSend" value="Send message">
    </form>
    <div class="grid-container-2 grid-2-3 margin-top-40">
        <a class="tnc-pp" href="privacy-policy.php">Privacy Policy</a>
        <a class="tnc-pp" href="terms-of-service.php">Terms of Service</a>
    </div>
</main>
<?php include 'footer.php'; ?>
<script>
    changePageNameFooter("Contact Us");
</script>
</body>

</html>
