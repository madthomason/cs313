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
<body class="bg-info">
<div class="jumbotron bg-secondary d-flex justify-content-around">
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
    <h3>A Few Fun Facts About Madeline Barlocker:</h3>

    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
            <div class="card vh-35">
                <img src="media/IMG_5398.png" class="img-rounded" alt="Sand Hill, Lake Powell">
                <div class="card-body">
                    <h5 class="card-title">Lake Powell</h5>
                    <p class="card-text">I love the annual Lake Powell trip with my in-laws. A week
                        free of cares on the lake with family, nothing better.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
            <div class="card">
                <img src="http://mw2.google.com/mw-panoramio/photos/medium/1482110.jpg" class="card-img-top"
                     alt="Chewelah, WA">
                <div class="card-body">
                    <h5 class="card-title">Home</h5>
                    <p class="card-text">I am from a small town in NE Washington(think
                        2500 people) called Chewelah.</p>
                    <a href="https://www.cityofchewelah.org/" class="btn btn-primary">Checkout Chewelah!</a>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
            <div class="card">
                <img src="media/Wedding-0255.jpg" class="card-img-top"
                     alt="12/27/17">
                <div class="card-body">
                    <p class="card-text">I was called to serve in the London South mission but having gone on a
                        blind date(set up by his
                        senior project which is a whole other story) the day my papers went in
                        I ended up ditching the mission for a different eternal M with my partner in crime
                        Garrett.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
            <div class="card">
                <img src="https://render.fineartamerica.com/images/rendered/search/print/images/artworkimages/medium/1/oquirrh-mountain-temple-sunset-john-wunderli.jpg"
                     class="card-img-top"
                     alt="Oquirr Mountain Temple, South Jordan">
                <div class="card-body">
                    <h5 class="card-title">Temple Portfolio Internship</h5>
                    <p class="card-text">I just finished my internship with the Temple Portfolio in the ICS
                        department of the church in Riverton working on the recording software for the temples.</p>
                    <a href="https://www.linkedin.com/in/madeline-barlocker-03484b149"
                       class="btn btn-primary">LinkedIn</a>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
            <div class="card">
                <img src="media/food.jpg" class="card-img-top" alt="Pregnancy Announcement 10/18">
                <div class="card-body">
                    <h5 class="card-title">My true passion</h5>
                    <p class="card-text">I love to cook, and then eat said cooking.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
            <div class="card">
                <video class="card-img-top" id="video" width="320" height="180" preload="auto">
                    <source src="media/IMG_3231.mp4" type="video/mp4">
                    Your Browser doesn't support the video tag
                </video>
                <div class="card-body">
                    <p class="font-italic text-center card-text">Hover to play the video</p>
                    <h5 class="card-title">Endings and New Beginnings</h5>
                    <p class="card-text">This is my last semester of my Software Engineering major which will be
                        followed closely by the addition of a little girl to our family!</p>
                </div>
            </div>
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
