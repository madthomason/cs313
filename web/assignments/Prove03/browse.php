<?php
require 'header.php';
?>
<h3 class="text-center">We currently are having a shortage of clear skies, but there is plenty precipitations available!</h3>

<div class="row w-100 m-0 p-3">
    <?php
     foreach ($titles as $x => $title) {
         $quantity = 0;
         echo '<h3>' . $_SESSION["cartItems"][0] . '</h3>';
         if (in_array($x, $_SESSION["cartItems"])) {
             $quantity = count(array_filter($_SESSION["cartItems"], function($a, $x) {return $a==$x;}));
         }
         echo '<div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 p-1">
                    <div class="card h-100">
                        <img src="' . $images[$x] . '" class="card-img-top">
                        <div class="d-flex justify-content-around card-body">
                            <h5 class="card-title">' . $title . '</h5>
                            <a class="btn bg-primary" href="add_items.php?id=' . $x . '">
                                <i class="fas fa-cart-plus"></i>
                            </a>
                            <h5>Quantity: ' . $quantity . '</h5>
                        </div>
                    </div>
                </div>';
     }
    ?>

</div>

</body>
</html>
