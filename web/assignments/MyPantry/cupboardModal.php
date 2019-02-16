<?php
/**
 * Created by PhpStorm.
 * User: Madeline Barlocker
 * Date: 2/4/2019
 * Time: 10:06 AM
 */
?>
<div class="modal fade" id="createCupboardModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                <form role="form" action="insertUpdate.php?cupboard=insert" method="post" id="createCupboard">
                    <div class="form-group">
                        <input name="person_id" type="hidden" value="<?php echo $_SESSION["user"]["id"]; ?>">
                        <input name="name" type="text" placeholder="Name" class="form-control">
                        <textarea name="description" placeholder="Description" class="form-control"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" value="Create Cupboard" form="createCupboard">
            </div>
        </div>
    </div>
</div>

