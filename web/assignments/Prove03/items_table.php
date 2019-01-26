<table id="cart" class="table table-hover table-condensed">
        <thead>
        <tr>
            <th class="w-50">Product</th>
            <th class="w-10">Price</th>
            <th class="quantity">Quantity</th>
            <th class="text-center subtotal">Subtotal</th>
            <th class="w-10"></th>
        </tr>
        </thead>
        <tbody>
        <?php

            session_start();

            foreach ($_SESSION["cartItems"] as $x => $quantity) {

                echo '<tr>
            <td data-th="Product">
                <div class="row">
                    <div class="col-2 hidden-xs">
                        <img src="' . $images[$x] . '" class="img-fluid" />
                    </div>
                    <div class="col-10">
                        <h4 class="nomargin">' . $titles[$x] . '</h4>
                    </div>
                </div>
            </td>
            <td data-th="Price">Free!</td>
            <td data-th="Quantity">' . $quantity . '</td>
            <td data-th="Subtotal" class="text-center">Free</td>';
                if ($remove == true) {
                    echo '<td class="actions">
                <a class="btn bg-danger" href="remove_items.php?id=' . $x . '">
                    <i class="far fa-trash-alt"></i>
                </a>
            </td>';
                }
            }
        ?>
        </tr>
        </tbody>