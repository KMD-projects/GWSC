document.addEventListener("DOMContentLoaded", function() {
    // JavaScript for auto image slider
    // var images = document.querySelectorAll('.banner-image');
    // var currentImageIndex = 0;
    // var intervalTime = 3000; // Time between slides (in milliseconds)
    //
    // function changeImage() {
    //     // Hide current image
    //     images[currentImageIndex].style.opacity = 0;
    //
    //     // Increment index for next image
    //     currentImageIndex++;
    //
    //     // Reset index if it exceeds the number of images
    //     if (currentImageIndex >= images.length) {
    //         currentImageIndex = 0;
    //     }
    //
    //     // Display next image
    //     images[currentImageIndex].style.opacity = 1;
    // }
    //
    // // Start auto image slider
    // setInterval(changeImage, intervalTime);
});

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
    element.innerText = `You are at ${currentPage} page.`;
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
    console.log(`Name::::${featureName}`);
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