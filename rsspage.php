<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/rss_style.css">

</head>
<body>
<header>
    <?php include 'navbar.php'; ?>
</header>
<div class="content">

    <?php

    $url = "rss.php";
    if (isset($_POST['submit'])) {
        if ($_POST['feedurl'] != '') {
            $url = $_POST['feedurl'];
        }
    }

    $invalidurl = false;
    if (@simplexml_load_file($url)) {
        $feeds = simplexml_load_file($url);
    } else {
        $invalidurl = true;
        echo "<h2>Invalid RSS feed URL.</h2>";
    }


    $i = 0;
    if (!empty($feeds)) {

        $site = $feeds->channel->title;
        $sitelink = $feeds->channel->link;

        echo "<h2>" . $site . "</h2>";
        foreach ($feeds->channel->item as $item) {

            $title = $item->title;
            $link = $item->link;
            $description = $item->description;
            $postDate = $item->pubDate;
            $pubDate = date('D, d M Y', strtotime($postDate));


            if ($i >= 5) break;
            ?>
            <div class="post">
                <div class="post-head">
                    <h2><a class="feed_title" href="<?php echo $link; ?>"><?php echo $title; ?></a></h2>
                    <span><?php echo $pubDate; ?></span>
                </div>
                <div class="post-content">
                    <?php echo implode(' ', array_slice(explode(' ', $description), 0, 20)) . "..."; ?> <a
                            href="<?php echo $link; ?>">Read more</a>
                </div>
            </div>

            <?php
            $i++;
        }
    } else {
        if (!$invalidurl) {
            echo "<h2>No item found</h2>";
        }
    }
    ?>
</div>
<?php include 'footer.html'; ?>
</body>
</html>

