
<div class="modal fade" id="updateCupboardModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add A Cupboard</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" action="insertUpdate.php?cupboard=update" method="post" id="updateCupboard">
                    <div class="form-group">
                        <input name="cupboard_id" type="hidden" value="<?php echo $cupboardId; ?>">
                        <input name="name" type="text" placeholder="<?php echo $cupboardId; ?>" class="form-control"
                               value="<?php echo $cupboards[$cupboardId]["name"]; ?>">
                        <textarea name="description" placeholder="Description" class="form-control"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" value="Create Cupboard" form="updateCupboard">
            </div>
        </div>
    </div>
</div>