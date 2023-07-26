<?php
session_start();

include('db/query.php');

$campsites = getCampsites();
$popularCampsites = array_slice($campsites, 0, 2);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GWSC</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/9cfc40fa5c.js" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</head>

<body>
<header>
    <?php include 'navbar.php'; ?>
    <div class="slider">
        <figure>
            <div class="slide"><img alt="slider image one" src="images/slider-one.jpg"></div>
            <div class="slide"><img alt="slider image two" src="images/slider-two.jpg"></div>
            <div class="slide"><img alt="slider image three" src="images/slider-three.jpg"></div>
            <div class="slide"><img alt="slider image two" src="images/slider-two.jpg"></div>
            <div class="slide"><img alt="slider image one" src="images/slider-one.jpg"></div>
        </figure>
        <div class="overlay"></div>
        <div class="home-text">
            <p class="title">Cabin In The Woods<br>But In A Good Way!</p>
            <p class="content">Enjoy camping anywhere and anytime with our best equipments.</p>
            <form action="searchresults.php" method="get">
                <div class="search-container">
                    <input class="search-input" type="text" name="query" placeholder="Search..." required>
                    <button type="submit" class="btn-sm-outlined-white">Go</button>
                </div>
            </form>
        </div>
    </div>
    <div class="show-off">
        <div><span class="show-off-value">10</span><br>Years of<br>Experience</div>
        <div><span class="show-off-value">1K+</span><br>Camping<br>Destination</div>
        <div><span class="show-off-value">8K</span><br>Happy<br>Customer</div>
        <div><span class="show-off-value">4.2</span><br>Overall<br>Rating</div>
    </div>
</header>
<main class="grid-container-3">
    <section class="home-section-pitches">
        <div>
            <img src="images/home/swimming.jpg">
            <h1>Wild Swimming</h1>
            <p>Immerse yourself in nature and explore hidden gems with our wild swimming sites.</p>
        </div>
        <div>
            <img src="images/home/tent.jpg">
            <h1>Tent pitches</h1>
            <p>Pitch your tent in our scenic locations and enjoy the great outdoors in comfort.</p>
        </div>
        <div>
            <img src="images/home/rv.jpg">
            <h1>Caravan and Motor Home pitches</h1>
            <p>Bring your home away from home and park it in our spacious and convenient pitches.</p>
        </div>
    </section>

    <!--Popular Campsites-->
    <section class="grid-2-3">
        <h1>Popular Campsites</h1>
        <div class="campsite-list">
        <?php
        foreach ($popularCampsites as $campsite) {
            echo '<div class="item">';
            echo '<img alt="campsite image" class="image" src="' . $campsite->image . '">';
            echo '<p class="name">' . $campsite->name . '</p>';
            echo '<span class="pitch-type">';
            echo $campsite->tentCapacity . ' Tents';
            echo '</span>';
            echo '<span class="pitch-type">';
            echo $campsite->caravanCapacity . ' caravans';
            echo '</span>';
            echo '<span class="pitch-type">';
            echo $campsite->motorHomeCapacity . ' motorhomes';
            echo '</span>';
            echo '<div class="description max-lines-2">';
            echo $campsite->description;
            echo '</div>';
            echo '<p><span class="price-small">$' . $campsite->price . '</span></p>';
            $detailPageUrl = 'campsitedetails.php?campsite_id=' . $campsite->id;
            echo '<button onclick="window.location.href = \'' . $detailPageUrl . '\';" class="btn-sm-filled">View</button>';
            echo '</div>';
        }
        ?>
        </div>
    </section>
    <div class="top-brand-section">
        <iframe class="video" src="https://www.youtube.com/embed/bCXCLUNaUL8" title="YouTube video player"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
    </div>
    <div class="top-brand-section">
        <iframe class="map"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3819.34423957643!2d96.13362136091719!3d16.809270202581764!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1eb46206c0001%3A0x62648e1d66474021!2sKMD%20Institute!5e0!3m2!1sen!2smm!4v1672136439916!5m2!1sen!2smm"
                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <div class="signup-section grid-2-3">
        <div class="content">
            <p class="title">Signup up for Newsletter</p>
            <p class="desc">GWSC's Newsletter</p>
            <p class="desc">Get 15% OFF Your camping with us.</p>
            <p class="desc">Be the first to know about our new pitches, specials and our events.</p>
        </div>
        <div class="signup">
            <input class="search-input" type="text" name="query" placeholder="Your email" required>
            <button type="submit" class="btn-sm-outlined-white">Sign up</button>
        </div>
    </div>
</main>
<?php include 'footer.html'; ?>
<script>
    changePageNameFooter("Home");
</script>
</body>

</html>
