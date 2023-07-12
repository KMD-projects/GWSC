<?php

include('db/query.php');

session_start();

$reviews = getReviews("");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviews</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/9cfc40fa5c.js" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</head>

<body>
<header>
    <?php include 'navbar.php'; ?>
    <div class="page-header">
        <h1>Reviews</h1>
    </div>
</header>
<main class="grid-container-3">
    <section class="review-section">
        <div class="review-list">
            <div class="item">
                <div class="content">
                    <div class="review-profile">
                        <img alt="reviewer image" class="review-avatar" src="images/cool.png">
                        <div class="review-name">
                            <h3>Christopher Nolan</h3>
                            <h5>Reviewed Mar 5, 2022</h5><br>
                        </div>
                    </div>

                    <p class="quote">Multi Option Shelter</p><br>
                    <div class="rating">
                        <i class="fa-solid fa-star fa-xl"></i>
                        <i class="fa-solid fa-star fa-xl"></i>
                        <i class="fa-solid fa-star fa-xl"></i>
                        <i class="fa-solid fa-star fa-xl"></i>
                        <i class="fa-regular fa-star fa-xl"></i>
                    </div>
                    <p class="review-content">Even though this tent is a little heavy (5.5 lbs) for backpacking I could not pass up such a good sale on a tent that offers so many options. Using without the rainfly for ventilation and stargazing in good weather. One or both sides zipped down for great storm protection. One or both of the double zip vestibules propped up for a covered area for Read more about Even though this tent is a littlecooking or just chilling for the evening. This tent offers ample space for 2 people or with only 1 it is a palace. Easy setup for 1 person. I have upgraded the stakes and you will need guy lines if you opt to pitch the vestibule as an overhang.</p>
                </div>
            </div>
        </div>
        <div class="write-review-section">
            <div class="content">
                <p class="title">Write your own review</p>
                <form>
                    <label class="review-input-label" for="firstname">First name</label><br>
                    <input type="text" id="firstname" class="styled-input" placeholder="First name" required><br><br>
                    <label class="review-input-label" for="lastname">Last name</label><br>
                    <input type="text" id="lastname" class="styled-input" placeholder="Last name" required><br><br>
                    <label class="review-input-label" for="email">Email address</label><br>
                    <input type="email" id="email" class="styled-input" placeholder="Email" required><br><br>
                    <label class="review-input-label" for="subject">Subject</label><br>
                    <input type="text" id="subject" class="styled-input" placeholder="Subject" required><br><br>
                    <label class="review-input-label" for="message">Review</label><br>
                    <textarea id="message" placeholder="Type your review" class="styled-textarea"
                              required></textarea><br><br>
                    <button type="submit" class="btn-sm-filled">Send</button>
                </form>
            </div>
        </div>
    </section>
</main>
<?php include 'footer.html'; ?>
<script>
    changePageNameFooter("Review");
</script>
</body>

</html>
