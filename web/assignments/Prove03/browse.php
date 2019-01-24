<?php
require 'items.php';
require 'header.php';
?>
<h3 class="text-center">We currently are having a shortage of clear skies, but there is plenty precipitations available!</h3>

<div class="row w-100 m-0 p-3">
    <?php
     foreach ($titles as $x => $title) {
         echo '<div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 p-1">
                    <div class="card h-100">
                        <img src="' . $images[$x] . '" class="card-img-top">
                        <div class="d-flex justify-content-around card-body">
                            <h5 class="card-title">' . $title . '</h5>
                            <a class="btn bg-primary" href="add_items.php">
                                <i class="fas fa-cart-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>';
     }
    ?>

</div>

</body>
</html>