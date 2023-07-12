<?php

include('db/query.php');

session_start();

$user = null;
if (isset($_SESSION['logged_in_user_id'])) {
    $userId = $_SESSION['logged_in_user_id'];
    $user = getCustomerProfile($userId);
}

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

        <h1 class="margin-top-40">Payment Options</h1>
        <input type="radio" id="option_paypal" name="payment_method" value="paypal"
               onchange="togglePaymentInfoVisibility()" checked>
        <label for="option_paypal">Paypal</label>
        <input type="radio" id="option_card" name="payment_method" value="card"
               onchange="togglePaymentInfoVisibility()">
        <label for="option_card">Card</label><br>
        <div id="payment_section" class="grid-container-2 payment-options-section">
            <div class="billing-section">
                <h3>Billing address</h3>
                <div class="grid-container-2 grid-gap-16">
                    <div>
                        <label for="card-number" class="block gwsc-input-label">First Name*</label>
                        <input class="gwsc-input-filled-full-width margin-top-4" id="card-number" type="number"
                               name="txtCardNumber" placeholder="John"
                               required/>
                    </div>
                    <div>
                        <label for="card-number" class="block gwsc-input-label">Last Name*</label>
                        <input class="gwsc-input-filled-full-width margin-top-4" id="card-number" type="text"
                               name="txtCardNumber" placeholder="Doe"
                               required/>
                    </div>
                </div>
                <label for="card-number" class="block gwsc-input-label margin-top-8">Address*</label>
                <input class="gwsc-input-filled-full-width margin-top-4" id="card-number" type="number"
                       name="txtCardNumber" placeholder="Address"
                       required/>

                <div class="grid-container-2 grid-gap-16 margin-top-8">
                    <div>
                        <label for="card-number" class="block gwsc-input-label">State/Province*</label>
                        <input class="gwsc-input-filled-full-width margin-top-4" id="card-number" type="number"
                               name="txtCardNumber" placeholder="Yangon"
                               required/>
                    </div>
                    <div>
                        <label for="card-number" class="block gwsc-input-label">Zip*</label>
                        <input class="gwsc-input-filled-full-width margin-top-4" id="card-number" type="text"
                               name="txtCardNumber" placeholder="11411"
                               required/>
                    </div>
                </div>

                <div class="grid-container-2 grid-gap-16 margin-top-8">
                    <div>

                        <label for="card-number" class="block gwsc-input-label">Country*</label>
                        <input class="gwsc-input-filled-full-width margin-top-4" id="card-number" type="number"
                               name="txtCardNumber" placeholder="Myanmar"
                               required/>
                    </div>
                </div>
            </div>

            <div class="payment-section">
                <h3>Card information</h3>
                <label for="card-number" class="block gwsc-input-label">Card number*</label>
                <input class="gwsc-input-filled-full-width margin-top-4 match-parent-width" id="card-number"
                       type="number" name="txtCardNumber" placeholder="Card number"
                       required/>

                <div class="grid-container-2 grid-gap-16 margin-top-8">
                    <div>
                        <label for="card-number" class="block gwsc-input-label">Expiry*</label>
                        <input class="gwsc-input-filled-full-width margin-top-4" id="card-number" type="text"
                               name="txtCardNumber" placeholder="MM / YY"
                               required/>
                    </div>
                    <div>
                        <label for="card-number" class="block gwsc-input-label">CVC*</label>
                        <input class="gwsc-input-filled-full-width margin-top-4" id="card-number" type="number"
                               name="txtCardNumber" placeholder="CVC"
                               required/>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="grid-2-3 booking-btn-container margin-top-18">
        <button class="btn-lg-filled">Book Now!</button>
    </div>

</main>
<?php include 'footer.html'; ?>
<script>
    changePageNameFooter("Booking");
</script>
</body>
</html>