document.addEventListener("DOMContentLoaded", function() {

});

$( document ).ready(function() {
    setupMenuClick();
});

function setupMenuClick() {
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
}

function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for(let i = 0; i <ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return null;
}

function setCookie(cname, cvalue, expireMinute) {
    const d = new Date();
    d.setMinutes(d.getMinutes() + expireMinute);
    let expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function setLoginBlock() {
    const d = new Date();
    d.setMinutes(d.getMinutes() + 10);
    setCookie("login-block", d.toISOString(), 10);
}

function shouldBlockLogin() {
    let cookie = getCookie("login-block");
    return cookie != null;
}
function checkLoginBlock() {
    if (shouldBlockLogin()) {
        startTimer();
    }
}

function startTimer() {

    $("#btn-login").hide();
    $("#error").show();

    let cookie = getCookie("login-block");
    let future = new Date(cookie);

    let x = setInterval(function ()
    {
        let now = new Date();
        let diff = future - now;
        let remaining = new Date(diff);

        let currentTime = `Please try again in ${remaining.getMinutes()}m ${remaining.getSeconds()}s`;

        $("#error-text").text(currentTime);
        if (diff <= 0) {
            clearInterval(x);
            $("#btn-login").show();
            $("#error").hide();
        }
    }, 300);
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
                        setLoginBlock();
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
            location.reload();
        }
    });
}

function createBooking(campsiteId, pitchId, userId) {
    let guestCount = $("#guest").val();
    let pitchPrice = $("#price").text();
    let taxPrice = $("#tax-fee").text();
    let serviceFee = $("#service-fee").text();
    let totalPrice = $("#total-fee").text();
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
            location.reload();
        }
    });
}

function createReview(campsiteId, userId) {
    let title = $("#title").val();
    let message = $("#message").val();
    $.post({
        url: "action/createreview.php",
        data: {
            title: title,
            message: message,
            campsite_id: campsiteId,
            user_id: userId,
        },
        success: function () {
            $("#title").val("");
            $("#message").val("");
            location.reload();
        }
    });
}