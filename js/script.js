document.addEventListener("DOMContentLoaded", function() {
    // JavaScript for auto image slider
    var images = document.querySelectorAll('.banner-image');
    var currentImageIndex = 0;
    var intervalTime = 3000; // Time between slides (in milliseconds)

    function changeImage() {
        // Hide current image
        images[currentImageIndex].style.opacity = 0;

        // Increment index for next image
        currentImageIndex++;

        // Reset index if it exceeds the number of images
        if (currentImageIndex >= images.length) {
            currentImageIndex = 0;
        }

        // Display next image
        images[currentImageIndex].style.opacity = 1;
    }

    // Start auto image slider
    setInterval(changeImage, intervalTime);
});