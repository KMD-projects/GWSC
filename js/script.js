document.addEventListener("DOMContentLoaded", function() {
    googleTranslateElementInit();
});

$("#hamburger").click(function(){
    let icon = $("#hamburger");
    let menu = $("#menu");
    if (icon.hasClass("fa-xmark")) {
        icon.removeClass("fa-xmark");
        icon.addClass("fa-bars");

        menu.removeClass("menu-responsive");
        menu.addClass("menu");
    } else {
        icon.removeClass("fa-bars");
        icon.addClass("fa-xmark");

        menu.removeClass("menu");
        menu.addClass("menu-responsive");
    }
});

function startTimer() {

    $("#btn-login").hide();
    $("#error").show();

    let date = new Date();
    let month = date.getMonth() + 1;
    let hour = date.getHours();
    let day = date.getDate();
    let year = date.getFullYear();
    let minutes = date.getMinutes();
    let second = date.getSeconds() + 10;
    let time = hour + ":" + minutes + ":" + second;
    let ResetTime = new Date(month + " " + day + " " + year + " " + time).getTime();
    let x = setInterval(function ()//1000 milliseconds = 1 second
    {
        let now = new Date().getTime();
        let distance = ResetTime - now;
        let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));//the largest integer less than or equal to a given number.
        let seconds = Math.floor((distance % (1000 * 60)) / 1000);
        let currentTime = "Please try again " + minutes + "m " + seconds + "s ";
        console.log(currentTime);
        $("#error-text").text(currentTime);
        if (distance <= 0) {
            clearInterval(x);
            $("#btn-login").show();
            $("#error").hide();
        }
    }, 1000);
}

function login() {
    $("#error").hide();
    let email = $("#email").val();
    let password = $("#password").val();
    let responseToken = grecaptcha.getResponse();
    if (email && password) {
        $.post({
            url: "action/customerlogin.php",
            data: {
                email: email,
                password: password,
                response_token: responseToken
            },
            success: function (data) {
                if (data.length !== 0) {
                    grecaptcha.reset();
                    if (data === "blocked") {
                        startTimer();
                    } else {
                        $("#error").show();
                        $("#error-text").text(data);
                    }
                } else {
                    window.location.href = "index.php";
                }
            }
        });
    }
}

function togglePaymentInfoVisibility() {
    let view = document.getElementById('payment_section');
    let cardOption = document.getElementById('option_card');

    if (cardOption.checked) {
        view.style.display = 'grid';
    } else {
        view.style.display = 'none';
    }
}

function changePageNameFooter(currentPage) {
    const element = document.getElementById("page-name")
    element.innerHTML = `You are at <span class="visitor-count"><u>${currentPage}</u></span> page.`;
}

function navigateToAddPitch(campsiteId) {
    window.location.href = `createpitch.php?campsite_id=${campsiteId}`;
}

function navigateToAddAttraction(campsiteId) {
    window.location.href = `createattraction.php?campsite_id=${campsiteId}`;
}

function navigateToAddFeature(campsiteId) {
    window.location.href = "createpitch.php";
}

function deleteUser(btn) {
    $.post({
        url: "action/deleteuser.php",
        data: {
            user_id: btn.id
        },
        success: function () {
            let row = btn.parentNode.parentNode;
            row.parentNode.removeChild(row);
        }
    });
}

function deleteFeature(btn) {
    $.post({
        url: "action/deletefeature.php",
        data: {
            feature_id: btn.id
        },
        success: function () {
            let row = btn.parentNode.parentNode;
            row.parentNode.removeChild(row);
        }
    });
}

function deleteCampsite(btn) {
    $.post({
        url: "action/deletecampsite.php",
        data: {
            campsite_id: btn.id
        },
        success: function () {
            let row = btn.parentNode.parentNode;
            row.parentNode.removeChild(row);
        }
    });
}

function createFeature() {
    let featureName = $("#txtFeatureName").val();
    $.post({
        url: "action/createfeature.php",
        data: {
            feature_name: featureName
        },
        success: function () {
            console.log(`Success`);
            location.reload();
        }
    });
}

function createBooking(campsiteId, pitchId, userId) {
    let guestCount = $("#guest").val();
    console.log(`guestCount: ${guestCount}`);
    let pitchPrice = $("#price").text();
    console.log(`pitchPrice: ${pitchPrice}`);
    let taxPrice = $("#tax-fee").text();
    console.log(`taxPrice: ${taxPrice}`);
    let serviceFee = $("#service-fee").text();
    console.log(`serviceFee: ${serviceFee}`);
    let totalPrice = $("#total-fee").text();
    console.log(`totalPrice: ${totalPrice}`);
    $.post({
        url: "action/createbooking.php",
        data: {
            guest_count: guestCount,
            pitch_price: pitchPrice,
            tax_price: taxPrice,
            service_fee: serviceFee,
            total_price: totalPrice,
            campsite_id: campsiteId,
            pitch_id: pitchId,
            user_id: userId,
        },
        success: function () {
            console.log(`Success`);
        }
    });
}

function acceptBooking(btn) {
    updateBooking(btn.id, "accepted")
}

function declineBooking(btn) {
    updateBooking(btn.id, "declined")
}

function updateBooking(bookingId, status) {
    $.post({
        url: "action/updatebookingstatus.php",
        data: {
            booking_id: bookingId,
            booking_status: status
        },
        success: function () {
            console.log(`Success`);
            location.reload();
        }
    });
}