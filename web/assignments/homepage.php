<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Homepage</title>
    <link rel="stylesheet" href="general.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
          integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

</head>
<body>
<div class="header d-flex justify-content-around">
    <h1>About Me!</h1>
<!--    <div class="d-flex justify-content-around">-->
        <a href="assignments.html"><h2>Assignments</h2></a>
        <div class="countdown">
            <?php
            $today = time();
            $graduation = mktime(0, 0, 0, 4, 12, 2019);
            $days = floor(($graduation - $today) / 86400);
            echo "<h2>$days days until graduation, but who's counting...</h2>";

            ?>
        </div>
<!--    </div>-->
</div>
<div class="jumbotron well d-flex flex-row bg-info row">
    <div class=".col-sm-5 .col-md-6">
        <h3>A Few Fun Facts About Madeline Barlocker:</h3>
        <ul>
            <li>I am from a small town in NE Washington called <a href="https://www.cityofchewelah.org/">Chewelah</a>(think
                2500 people).
            </li>
            <li>I just finished my internship with the Temple Portfolio in the ICS department of the church in
                Riverton.
            </li>
            <li> I was called to serve in the London South mission but having gone on a blind date(set up by his senior
                project which is a whole other story) the day my papers went in
                I ended up ditching the mission for a different eternal M with my partner in crime Garrett.
            </li>
            <li>I love to cook, and then eat said cooking.</li>
            <li>This is my last semester of my Software Engineering major which will be followed closely by the addition
                of a little girl to our family!
                <div>
                    <video id="video" width="320" height="180" preload="auto">
                        <source src="media/IMG_3231.mp4" type="video/mp4">
                        Your Browser doesn't support the video tag
                    </video>
                    <p class="text-muted">Hover to play the video</p>
                </div>
            </li>
        </ul>
    </div>
    <div class=".col-sm-5 .offset-sm-2 .col-md-6 .offset-md-0">
        <img src="media/IMG_5398.png" class="img-rounded" alt="Sand Hill, Lake Powell">
        <p class="figure-caption text-center text-wrap">I love the annual Lake Powell trip with my in-laws. A week free
            of cares on the lake with
            family,
            nothing better.</p>
    </div>
</div>


<script>
    const video = document.getElementById("video");
    video.addEventListener('mouseover', function (e) {
        video.play();
    });
    video.addEventListener('mouseout', function (e) {
        video.pause();
    });

</script>
</body>
</html>
