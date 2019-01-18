<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Homepage</title>
    <link rel="stylesheet" href="general.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

</head>
<body>
<div class="header">
    <h1>About Me!</h1>
    <a href="assignments.html"></a>
</div>
<div class="main">
    <div>
        <h2>Madeline Barlocker</h2>
        <img src="media/IMG_5398.png" alt="Sand Hill, Lake Powell">
        <p class="caption">I love the annual Lake Powell trip with my in-laws. A week free of cares on the lake with
            family,
            nothing better.</p>

        <h3>A Few Fun Facts About Me</h3>
        <p>I am from a small town in NE Washington called Chewelah (think 2500 people).
            I just finished my internship with the Temple Portfolio in the ICS department of the church in Riverton.
            I was called to serve in the London South mission but having gone on a blind date(set up by his senior
            project which is a whole other story) the day my papers went in
            I ended up ditching the mission for a different eternal M with my partner in crime Garrett.
            I love to cook, and then eat said cooking.
            This is my last semester of my Software Engineering major which will be followed closely by the addition of
            a little girl to our family!
        </p>
    </div>
    <div>
        <video id="video">
            <source src="media/IMG_3231.mp4" type="video/mp4">
            Your Browser doesn't support the video tag
        </video>
        <p class="caption">Hover to play the video</p>
    </div>
</div>
<div class="countdown">
    <?php
    $today = time();
    $graduation = mktime(0, 0, 0, 4, 12, 2019);
    $days = ($graduation - $today) / 86400;
    echo "<h2>$days days until graduation, but who's counting...</h2>";

    ?>
</div>

<script>
    let video = document.getElementById("video");
    video.addEventListener("mouseover", playVideo());
    video.addEventListener("mouseout", pauseVideo());

    function playVideo() {
        video.play();
    }

    function pauseVideo() {
        video.play();
    }
</script>
</body>
</html>
