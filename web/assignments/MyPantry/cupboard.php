
<div>
    <div<?php if (empty($_SESSION["cupboards"])){echo " style='display: none;'";}?> class="d-flex justify-content-center">
        <?php
        echo '<h5>' . $_SESSION["cupboardDesc"][$cupboardId] . '</h5>';
        ?>
        <button type="button" class="btn btn-link" data-toggle="modal" data-target="#updateCupboardModal">
            <i class="fas fa-pencil-alt"></i>
        </button>
    </div>
    <div<?php if (!empty($_SESSION["cupboards"])){echo " style='display: none;'";}?>>
        <i class="fas fa-arrow-up"></i>
        <h2>Please add a cupboard above</h2>
        <i class="fas fa-arrow-up"></i>
    </div>
    <div class="row w-100 m-0 p-3">
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 p-1">
            <div class="card d-flex justify-content-center align-items-center h-100">

                <button type="button" class="btn btn-link" data-toggle="modal" data-target="#createItemModal"
                    <?php if (empty($_SESSION["cupboards"])){echo "disabled";}?>>
                    <i class="fas fa-plus font-xxl"></i>
                </button>

            </div>
        </div>
        <?php
        foreach ($items as $item) {
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
                            <div>
                            <h6>Quantity: ' . $item["quantity"] . ' ' . $quantityTypes[$item["quantity_type_id"]] . '</h6>
                            <p class="text-muted mb-0"><small>Restock Quantity: ' . $item["restock_quantity"] . ' ' . $quantityTypes[$item["quantity_type_id"]] . '</small></p>
                            </div>
                            
                        </div>
                    </div>
                </div>';
        }
        ?>
    </div>
</div>
