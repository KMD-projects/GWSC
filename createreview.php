<?php

include('db/query.php');

session_start();

$user = null;
if (isset($_SESSION['logged_in_user_id'])) {
    $userId = $_SESSION['logged_in_user_id'];
    $user = getCustomerProfile($userId);
}

$campsiteId = $_POST['campsite_id'];
$pitchId = $_POST['pitch_id'];
$pitch = getPitch($pitchId);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js"></script>
</head>

<body>
<header>
    <?php include 'navbar.php'; ?>
    <div class="page-header">
        <h1>Booking</h1>
    </div>
</header>

<main class="grid-container-3">
    <section class="campsite-detail-container">
        <h1>Pitch Information</h1>
        <div class="pitches">
            <?php
            echo '<div class="item">';
            echo '<img alt="image" class="image" src="' . $pitch->image . '">';
            echo '<div class="content">';
            echo '<p>' . $pitch->name . '</p>';
            echo '<p>' . $pitch->type . '</p>';
            echo '<p>' . $pitch->groundType . '</p>';
            echo '<p>' . $pitch->description . '</p>';
            echo '</div>';
            echo '</div>';
            ?>
        </div>


        <div class="grid-container-2 grid-gap-16">
            <div>
                <h1 class="margin-top-40">Account Information</h1>
                <div class="booking-account-section">
                    <?php
                    $fullName = $user->firstname . ' ' . $user->lastname;
                    echo '<p><b>Name  : </b>' . $fullName . '</p>';
                    echo '<p><b>Email : </b>' . $user->email . '</p>';
                    echo '<p><b>Phone : </b>' . $user->phone . '</p>';
                    ?>
                </div>
            </div>
            <div>
                <h1 class="margin-top-40">Price</h1>
                <div class="booking-price-section">
                    <?php
                    echo '<span class="price">$30</span><span> for 2 guests</span><br>';

                    echo '<div class="margin-top-20 grid-container-2">';
                    echo '<label for="from_date"><b>From:</b></label>';
                    echo '<input class="gwsc-input-filled" type="date" id="from_date" name="from_date">';
                    echo '</div>';
                    echo '<div class="margin-top-8 grid-container-2">';
                    echo '<label for="to_date"><b>To:</b></label>';
                    echo '<input class="gwsc-input-filled" type="date" id="to_date" name="to_date">';
                    echo '</div>';
                    echo '<hr class="margin-top-20">';
                    echo '<div class="grid-container-2 margin-top-20">';
                    echo '<span><b>1 night</b></span><span>$30.00</span>';
                    echo '</div>';
                    echo '<div class="grid-container-2 margin-top-12">';
                    echo '<span><b>Service fee</b></span><span>$12.00</span>';
                    echo '</div>';
                    echo '<div class="grid-container-2 margin-top-12">';
                    echo '<span><b>Tax(15%)</b></span><span>$12.00</span>';
                    echo '</div>';
                    echo '<hr class="margin-top-20">';
                    echo '<div class="grid-container-2 margin-top-20">';
                    echo '<span><b>Total</b></span><span class="price">$52.00</span>';
                    echo '</div>';
                    ?>
                </div>
            </div>
        </div>
    </section>

    <div class="grid-2-3 booking-btn-container margin-top-18">
        <button class="btn-sm-filled">Post</button>
    </div>

</main>
<?php include 'footer.html'; ?>
<script>
    changePageNameFooter("Booking");
</script>
</body>
</html>