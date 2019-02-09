
<div>
    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 p-1">
        <div class="card h-100">
            <i class="fas fa-plus"></i>
        </div>
    </div>
    <?php
    foreach($items as $item) {
        echo '<div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 p-1">
                    <div class="card h-100">
                        <div class="d-flex justify-content-around card-body">
                            <h5 class="card-title">' . $item["name"] . '</h5>
                            <a class="btn bg-primary" href="quantity.php?type=add&id=' . $item["id"] . '">
                                <i class="fas fa-plus-square"></i>
                            </a>
                            <a class="btn bg-primary" href="quantity.php?type=remove&id=' . $item["id"] . '">
                                <i class="fas fa-minus-square"></i>
                            </a>
                            <h5>Quantity: ' . $item["quantity"] . ' ' . $quantityTypes[$item["quantity_type_id"]] . '</h5>
                        </div>
                    </div>
                </div>';
    }
    ?>
</div>
