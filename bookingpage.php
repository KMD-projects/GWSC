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
$booking = findBooking($pitchId, $user->id)

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
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
            echo '<h3>' . $pitch->name . '</h3>';
            echo '<span class="chip-filled">' . $pitch->type . '</span>';
            echo '<span class="chip-filled">' . $pitch->groundType . '</span>';
            echo '<p class="margin-top-16">' . $pitch->description . '</p>';
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
                    echo '<span class="price">$' . $pitch->price . '</span><span> for ' . $pitch->duration . '</span><br>';

                    echo '<div class="margin-top-20">';
                    echo '<label for="guest" class="block gwsc-input-label"><b>How many guests?</b>(maximum 5)</label>';
                    echo '<input class="gwsc-input-filled" type="number" id="guest" name="txtGuest" max="5" value="1">';
                    echo '</div>';
                    echo '<hr class="margin-top-20">';
                    echo '<div class="grid-container-2 margin-top-20">';
                    echo '<span><b id="guest_count">1 guest</b></span><span id="price">$' . $pitch->price . '</span>';
                    echo '</div>';
                    echo '<div class="grid-container-2 margin-top-12">';
                    echo '<span><b>Service fee</b></span><span id="service-fee">$15.00</span>';
                    echo '</div>';
                    echo '<div class="grid-container-2 margin-top-12">';
                    echo '<span><b>Tax(15%)</b></span><span id="tax-fee"></span>';
                    echo '</div>';
                    echo '<hr class="margin-top-20">';
                    echo '<div class="grid-container-2 margin-top-20">';
                    echo '<span><b>Total</b></span><span class="price" id="total-fee">$52.00</span>';
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
                        <label for="first-name" class="block gwsc-input-label">First Name*</label>
                        <input class="gwsc-input-filled-full-width margin-top-4" id="first-name" type="number"
                               name="txtFirstName" placeholder="John"
                               required/>
                    </div>
                    <div>
                        <label for="last-name" class="block gwsc-input-label">Last Name*</label>
                        <input class="gwsc-input-filled-full-width margin-top-4" id="last-name" type="text"
                               name="txtLastName" placeholder="Doe"
                               required/>
                    </div>
                </div>
                <label for="address" class="block gwsc-input-label margin-top-8">Address*</label>
                <input class="gwsc-input-filled-full-width margin-top-4" id="address" type="number"
                       name="txtAddress" placeholder="Address"
                       required/>

                <div class="grid-container-2 grid-gap-16 margin-top-8">
                    <div>
                        <label for="state-province" class="block gwsc-input-label">State/Province*</label>
                        <input class="gwsc-input-filled-full-width margin-top-4" id="state-province" type="number"
                               name="txtStateProvince" placeholder="Yangon"
                               required/>
                    </div>
                    <div>
                        <label for="zipcode" class="block gwsc-input-label">Zip*</label>
                        <input class="gwsc-input-filled-full-width margin-top-4" id="zipcode" type="text"
                               name="txtZipCode" placeholder="11411"
                               required/>
                    </div>
                </div>

                <div class="grid-container-2 grid-gap-16 margin-top-8">
                    <div>

                        <label for="country" class="block gwsc-input-label">Country*</label>
                        <input class="gwsc-input-filled-full-width margin-top-4" id="country" type="number"
                               name="txtCountry" placeholder="Myanmar"
                               required/>
                    </div>
                </div>
            </div>

            <div class="payment-section">
                <h3>Card information</h3>
                <label for="card-number" class="block gwsc-input-label">Card number*</label>
                <input class="gwsc-input-filled-full-width margin-top-4 match-parent-width" id="card-number"
                       type="text" name="txtCardNumber" placeholder="XXXX XXXX XXXX XXXX"
                       required/>

                <div class="grid-container-2 grid-gap-16 margin-top-8">
                    <div>
                        <label for="card-expiry" class="block gwsc-input-label">Expiry*</label>
                        <input class="gwsc-input-filled-full-width margin-top-4" id="card-expiry" type="text"
                               name="txtCardExpiry" placeholder="MM / YY"
                               required/>
                    </div>
                    <div>
                        <label for="card-cvc" class="block gwsc-input-label">CVC*</label>
                        <input class="gwsc-input-filled-full-width margin-top-4" id="card-cvc" type="text"
                               name="txtCardCVC" placeholder="CVC"
                               required/>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="grid-2-3 booking-btn-container margin-top-18">
        <?php
        if ($booking != null) {
            echo '<h3>You already booked this pitch! (Booking status: '.$booking->status.')</h3>';
        } else {
            echo '<button class="btn-lg-filled" onclick="createBooking(\'' . $pitch->campsiteId . '\', \'' . $pitch->id . '\', \'' . $user->id . '\')">Book Now!</button>';
        }
        ?>
    </div>

</main>
<?php include 'footer.php'; ?>
<script>
    changePageNameFooter("Booking");
    const selectElement = document.querySelector("#guest");
    const result = document.querySelector("#guest_count");
    const priceElement = document.querySelector("#price");
    const serviceFeeElement = document.querySelector("#service-fee");
    const taxFeeElement = document.querySelector("#tax-fee");
    const totalFeeElement = document.querySelector("#total-fee");

    const price = parseInt(priceElement.textContent.substring(1))
    const serviceFee = parseInt(serviceFeeElement.textContent.substring(1))

    let tax = calculateTax(price);
    taxFeeElement.textContent = `$${tax}`;

    selectElement.addEventListener("input", function () {
        if (event.target.value === "") {
            result.textContent = `1 guest`;
        } else {
            var guestCount = parseInt(event.target.value)
            if (guestCount < 0 || guestCount > 5) {
                guestCount = 1
                selectElement.value = guestCount
            }

            if (guestCount === 1) {
                result.textContent = `${event.target.value} guest`;
            } else {
                result.textContent = `${event.target.value} guests`;
            }

            let fee = guestCount * price;
            priceElement.textContent = `$${fee}`;

            let tax = calculateTax(fee);
            taxFeeElement.textContent = `$${tax}`;

            let total = fee + tax + serviceFee;
            totalFeeElement.textContent = `$${total}`;
        }
    });

    function calculateTax(amount) {
        return amount * 0.15;
    }


    // credit card validation
    let cardNumberInput = document.querySelector("#card-number");
    cardNumberInput.addEventListener("input", function () {
        let input = cardNumberInput.value;
        let sanitizedInput = input.replace(/\D/g, "");
        if (sanitizedInput.length > 16) {
            sanitizedInput = sanitizedInput.slice(0, 16);
        }
        cardNumberInput.value = sanitizedInput.replace(/(\d{4})(?=\d)/g, "$1 ");
    });

    // credit card expiry date validation
    let expiryDateInput = document.getElementById("card-expiry");
    expiryDateInput.addEventListener("input", formatExpiryDate);

    function formatExpiryDate() {
        let input = expiryDateInput.value;
        let sanitizedInput = input.replace(/\D/g, "");
        if (sanitizedInput.length > 4) {
            sanitizedInput = sanitizedInput.slice(0, 4);
        }
        expiryDateInput.value = sanitizedInput.replace(/^(\d{2})(\d{0,2})/, "$1 / $2");
    }

    var cvcInput = document.getElementById("card-cvc");

    cvcInput.addEventListener("input", validateCVC);

    // credit card CVC validation
    function validateCVC() {
        var cvc = cvcInput.value;
        var sanitizedInput = cvc.replace(/\D/g, "");
        var formattedInput = sanitizedInput.slice(0, 3);
        cvcInput.value = formattedInput;
    }
</script>
</body>
</html>