<table id="cart" class="table table-hover table-condensed">
        <thead>
        <tr>
            <th class="w-50">Product</th>
            <th style="width:10%">Price</th>
            <th style="width:8%">Quantity</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%"></th>
        </tr>
        </thead>
        <tbody>
        <?php

            //session_start();

            foreach ($_SESSION["cart_items"] as $x) {
                echo '<tr>
            <td data-th="Product">
                <div class="row">
                    <div class="col-sm-2 hidden-xs"><img src="' . $images[$x] . '" class="img-responsive" /></div>
                    <div class="col-sm-10">
                        <h4 class="nomargin">' . $titles[$x] . '</h4>
                    </div>
                </div>
            </td>
            <td data-th="Price">Free!</td>
            <td data-th="Subtotal" class="text-center">Free</td>';
                if ($remove == true) {
                    echo '<td class="actions">
                <a class="btn bg-secondary" href="remove_items.php?id=' . $x . '">
                    <i class="fa fa-trash-o"></i>
                </a>
            </td>';
                }
            }
        ?>
        </tr>
        </tbody>