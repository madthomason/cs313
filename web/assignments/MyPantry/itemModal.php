<div class="modal fade" id="createItemModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" action="insertUpdate.php?item=insert" method="post" id="itemForm">
                    <div class="form-group">
                        <div class="cupboard d-flex">
                            Cupboard: <select name="cupboard_id" class="form-control">
                                <?php

                                foreach($cupboards as $cupboard) {
                                    echo '<option value="' . $cupboard["id"] . '"';
                                    if ($cupboard["id"] == $cupboardId) {
                                        echo ' selected="selected"';
                                    }
                                    echo '>' . $cupboard["name"] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        Item Name: <input type="text" name="name" placeholder="Name" class="form-control">
                        Quantity: <input type="number" name="quantity" min="0" class="form-control">
                        Restock Quantity: <input type="number" name="restock_quantity" min="0" class="form-control">

                        Quantity Type: <select name="quantity_type" class="form-control">
                            <?php
                            foreach($quantityTypes as $id => $quantityType) {
                                echo "<option value='$id'>$quantityType</option>";
                            }
                            ?>
                        </select>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" value="Add Item" form="itemForm">
            </div>
        </div>
    </div>
</div>

