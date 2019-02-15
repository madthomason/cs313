<?php
/**
 * Created by PhpStorm.
 * User: Madeline Barlocker
 * Date: 2/4/2019
 * Time: 10:06 AM
 */
?>
<form class="form-inline" role="form" action="insertUpdate.php?item=insert" method="post">
    <div class="form-group">
        <div class="cupboard d-flex">
        Cupboard:
            <?php
            foreach($cupboards as $cupboard) {
                echo '<input type="radio" name="cupboard" value="' . $cupboard["id"] . '"';
                if ($cupboard["id"] == $cupboardId) {
                    echo ' checked';
                }
                echo '>' . $cupboard["name"] . '</option>';
            }
            ?>
        </div>
        Item Name: <input type="text" name="name" placeholder="Name" class="form-control">
        Quantity: <input type="number" name="quantity" min="0" class="form-control">
        Restock Quantity: <input type="number" name="restock" min="0" class="form-control">

        Quantity Type: <select name="quantityType" class="form-control">
            <?php
                foreach($quantityTypes as $id => $quantityType) {
                    echo "<option value='$id'>$quantityType</option>";
                }
            ?>
        </select>

        <insert type="submit" class="btn btn-primary" value="Add Item"></insert>
    </div>
</form>