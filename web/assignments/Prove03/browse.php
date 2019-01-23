<?php
require 'items.php';
?>

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
<div class="jumbotron d-flex justify-content-around m-3 p-3">
    <h1>What weather can you afford?</h1>
    <a href="shopping_cart.php" class="btn btn-info btn-lg">
        <span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart
    </a>
</div>
<h3 class="text-center">We currently are having a shortage of clear skies, but there are plenty precipitations available!</h3>

<div class="row w-100 m-0 p-3">
    <?php
     foreach ($titles as $x => $title) {
         echo '<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 p-1">
                    <div class="card h-100">
                        <img src="' . $images[$x] . '" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">' . $title . '</h5>
                            <a class="btn bg-primary" href="https://www.cityofchewelah.org/">Add to cart</a>
                        </div>
                    </div>
                </div>';
     }
    ?>
   


</div>

</body>
</html>
