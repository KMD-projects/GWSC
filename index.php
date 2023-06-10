<?php
session_start();
$loginId = $_SESSION['logged_in_customer_id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GWSC</title>
    <link rel="stylesheet" href="styles/style.css">
    <script src="scripts/script.js"></script>
</head>

<body>
<header>
    <?php include 'navbar.html'; ?>
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
            <a href="search.php" class="rounded-border-button">Browse</a>
        </div>
    </div>
    <div class="show-off">
        <div><span class="show-off-value">10</span><br>Years of<br>Experience</div>
        <div><span class="show-off-value">1K+</span><br>Camping<br>Destination</div>
        <div><span class="show-off-value">8K</span><br>Happy<br>Customer</div>
        <div><span class="show-off-value">4.2</span><br>Overall<br>Rating</div>
    </div>
</header>
<div>
    <input type="checkbox" id="close_ads">
    <div id="ads_popup">
        <div class="promo-image">
            <img alt="promo image" src="images/promo-image.jfif">
        </div>
        <div>
            <div class="content">
                <p class="title">First time discount!</p>
                <span class="discount price-small">15% OFF</span><br><br>
                <label class="review-input-label" id="email-label" for="email">Enter your email:</label><br>
                <input class="styled-input" type="email" id="email" name="email"
                       placeholder="example@gmail.com"><br><br>
                <button type="submit" class="rounded-border-button-primary">UNLOCK 15% OFF</button><br><br>
                <label class="rounded-border-button-3" for="close_ads" id="decline_offer">Decline
                    Offer</label><br><br>
                <p id="ads-note">**Exclusions apply. Does not apply to sale items & cannot be combined with other
                    promos.</p>
            </div>
            <label for="close_ads" id="close_popup">
                <span class="rounded-border-button-3">close</span>
            </label>
        </div>
    </div>
</div>
<main class="grid-container-3">
    <section class="grid-2-3">
        <h2 class="home-section-header">Our Top Picks</h2>
        <div class="gear-list">
            <div class="item">
                <img alt="product image" class="image" src="images/eq-5.jpg">
                <p class="brand">Sierra Designs</p>
                <p class="name">Meteor 4</p>
                <p><span class="price-small">$399</span></p>
                <div class="rating">
                    <img alt="rating star" class="star" src="icons/star.png">
                    <img alt="rating star" class="star" src="icons/star.png">
                    <img alt="rating star" class="star" src="icons/star.png">
                    <img alt="rating star" class="star" src="icons/star.png">
                    <img alt="rating star" class="star" src="icons/star.png">
                </div><br>
                <button class="rounded-border-button-2">ADD TO CART</button>
            </div>
            <div class="item">
                <img alt="product image" class="image" src="images/eq-9.jpg">
                <p class="brand">Camp Chef</p>
                <p class="name">Everest 2 Burner Stove</p>
                <p><span class="price-small">$166</span></p>
                <div class="rating">
                    <img alt="rating star" class="star" src="icons/star.png">
                    <img alt="rating star" class="star" src="icons/star.png">
                    <img alt="rating star" class="star" src="icons/star.png">
                    <img alt="rating star" class="star" src="icons/star.png">
                    <img alt="rating star" class="star" src="icons/star.png">
                </div><br>
                <button class="rounded-border-button-2">ADD TO CART</button>
            </div>
            <div class="item">
                <img alt="product image" class="image" src="images/furnitures/chair-1.jpg">
                <p class="brand">Snow Peak</p>
                <p class="name">Take! Bamboo Chair</p>

                <p><s>$189</s> <span class="price-small">$170</span></p>
                <div class="rating">
                    <img alt="rating star" class="star" src="icons/star.png">
                    <img alt="rating star" class="star" src="icons/star.png">
                    <img alt="rating star" class="star" src="icons/star.png">
                    <img alt="rating star" class="star" src="icons/star.png">
                    <img alt="rating star" class="star" src="icons/star.png">
                </div><br>
                <button class="rounded-border-button-2">ADD TO CART</button>
            </div>
            <div class="item">
                <img alt="product image" class="image" src="images/furnitures/table-3.jpg">
                <p class="brand">Big Agnes</p>
                <p class="name">Soul Kitchen Table</p>
                <p><span class="price-small">$149</span></p>
                <div class="rating">
                    <img alt="rating star" class="star" src="icons/star.png">
                    <img alt="rating star" class="star" src="icons/star.png">
                    <img alt="rating star" class="star" src="icons/star.png">
                    <img alt="rating star" class="star" src="icons/star.png">
                    <img alt="rating star" class="star" src="icons/star.png">
                </div><br>
                <button class="rounded-border-button-2">ADD TO CART</button>
            </div>
            <div class="item">
                <img alt="product image" class="image" src="images/eq-8.jpg">
                <p class="brand">Gregory</p>
                <p class="name">Raincover 50-80L</p>
                <p><span class="price-small">$39</span></p>
                <div class="rating">
                    <img alt="rating star" class="star" src="icons/star.png">
                    <img alt="rating star" class="star" src="icons/star.png">
                    <img alt="rating star" class="star" src="icons/star.png">
                    <img alt="rating star" class="star" src="icons/star.png">
                    <img alt="rating star" class="star" src="icons/star.png">
                </div><br>
                <button class="rounded-border-button-2">ADD TO CART</button>
            </div>
        </div>
    </section>
    <section class="grid-2-3">
        <h2 class="home-section-header">Top Brands</h2>
        <div class="brand-list">
            <img alt="brand image" class="item" src="images/brands/exped-bc-circle-small.webp">
            <img alt="brand image" class="item" src="images/brands/arcteryx-bc-circle-small.webp">
            <img alt="brand image" class="item" src="images/brands/lasportiva-bc-circle-small.webp">
            <img alt="brand image" class="item" src="images/brands/patagonia-bc-circle-small.png">
            <img alt="brand image" class="item" src="images/brands/petzl-bc-circle-small.png">
        </div>
    </section>
    <section class="equiment-section">
        <div class="equiment-section-container grid-2-3">
            <h1>Camping Equiments</h1>
            <p>Shop Best Selling & Staff Favorite Ideas</p>
            <p>15% off for first timers!</p><br>
            <a href="equipments.html" class="rounded-border-button">SHOP NOW</a>
        </div>
    </section>
    <section class="grid-2-3">
        <h2 class="home-section-header">Camping Gears</h2>
        <div class="gear-list">
            <div class="item">
                <img alt="product image" class="image" src="images/eq-2.jpg">
                <p class="brand">Black Diamond</p>
                <p class="name">Expedition 3 WR Trekking Poles</p>
                <p><span class="price-small">$169</span></p>
                <div class="rating">
                    <img alt="rating star" class="star" src="icons/star.png">
                    <img alt="rating star" class="star" src="icons/star.png">
                    <img alt="rating star" class="star" src="icons/star.png">
                    <img alt="rating star" class="star" src="icons/star.png">
                    <img alt="rating star" class="star" src="icons/star.png">
                </div><br>
                <button class="rounded-border-button-2">ADD TO CART</button>
            </div>
            <div class="item">
                <img alt="product image" class="image" src="images/eq-3.jpg">
                <p class="brand">Therm-a-Rest</p>
                <p class="name">Trail Scout</p>
                <p><span class="price-small">$59</span></p>
                <div class="rating">
                    <img alt="rating star" class="star" src="icons/star.png">
                    <img alt="rating star" class="star" src="icons/star.png">
                    <img alt="rating star" class="star" src="icons/star.png">
                    <img alt="rating star" class="star" src="icons/star.png">
                    <img alt="rating star" class="star" src="icons/star.png">
                </div><br>
                <button class="rounded-border-button-2">ADD TO CART</button>
            </div>
            <div class="item">
                <img alt="product image" class="image" src="images/eq-4.jpg">
                <p class="brand">Wolf and Grizzly</p>
                <p class="name">Grill M1 Edition with Fire Set</p>
                <p><span class="price-small">$114</span></p>
                <div class="rating">
                    <img alt="rating star" class="star" src="icons/star.png">
                    <img alt="rating star" class="star" src="icons/star.png">
                    <img alt="rating star" class="star" src="icons/star.png">
                    <img alt="rating star" class="star" src="icons/star.png">
                    <img alt="rating star" class="star" src="icons/star.png">
                </div><br>
                <button class="rounded-border-button-2">ADD TO CART</button>
            </div>
            <div class="item">
                <img alt="product image" class="image" src="images/eq-7.jpg">
                <p class="brand">Osprey</p>
                <p class="name">Duro/Dyna Handheld</p>
                <p><span class="price-small">$34</span></p>
                <div class="rating">
                    <img alt="rating star" class="star" src="icons/star.png">
                    <img alt="rating star" class="star" src="icons/star.png">
                    <img alt="rating star" class="star" src="icons/star.png">
                    <img alt="rating star" class="star" src="icons/star.png">
                    <img alt="rating star" class="star" src="icons/star.png">
                </div><br>
                <button class="rounded-border-button-2">ADD TO CART</button>
            </div>
            <div class="item">
                <img alt="product image" class="image" src="images/furnitures/stool-1.png">
                <p class="brand">Keith</p>
                <p class="name">Folding Titanium Stool</p>
                <p><span class="price-small">$70</span></p>
                <div class="rating">
                    <img alt="rating star" class="star" src="icons/star.png">
                    <img alt="rating star" class="star" src="icons/star.png">
                    <img alt="rating star" class="star" src="icons/star.png">
                    <img alt="rating star" class="star" src="icons/star.png">
                    <img alt="rating star" class="star" src="icons/star.png">
                </div><br>
                <button class="rounded-border-button-2">ADD TO CART</button>
            </div>
        </div>
    </section>
    <section class="top-brand-section">
        <h2 class="home-section-header">Shop top camp & hike brands</h2>
        <div class="brand-list">
            <div class="item"><img alt="rei co op brand" src="images/brands/rei-co-op.svg"></div>
            <div class="item"><img alt="osprey brand" src="images/brands/osprey.svg"></div>
            <div class="item"><img alt="salomon brand" src="images/brands/salomon.svg"></div>
            <div class="item"><img alt="danner brand" src="images/brands/danner.svg"></div>
            <div class="item"><img alt="nemo brand" src="images/brands/nemo.svg"></div>
            <div class="item"><img alt="yeti" src="images/brands/yeti.svg"></div>
            <div class="item"><img alt="the north face brand" src="images/brands/the-north-face.svg"></div>
            <div class="item"><img alt="dometic brand" src="images/brands/dometic.svg"></div>
        </div>
    </section>
    <div class="top-brand-section">
        <iframe class="video" src="https://www.youtube-nocookie.com/embed/lZsfQ1EdEjM" title="YouTube video player"
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
            <p class="desc">RCC's Newsletter</p>
            <p class="desc">Get 15% OFF Your FIrst Order with us.</p>
            <p class="desc">Be the first to know about our new gear, specials and our events.</p>
        </div>
        <div class="signup">
            <input class="styled-input-2" type="email" id="signup-email" name="email" placeholder="Your email">
            <button type="submit" class="rounded-border-button">Sign up</button><br><br>
        </div>
    </div>
</main>
<?php include 'footer.html'; ?>
</body>

</html>
