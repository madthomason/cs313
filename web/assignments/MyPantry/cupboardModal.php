<?php
/**
 * Created by PhpStorm.
 * User: Madeline Barlocker
 * Date: 2/4/2019
 * Time: 10:06 AM
 */
//name  |            description
?>
<form class="form-inline" role="form" action="insertUpdate.php?cupboard=insert" method="post">
    <div class="form-group">
        <input name="person_id" type="hidden" value="<?php echo $_SESSION["user"]["id"]; ?>">
        <input name="name" type="text" placeholder="Name" class="form-control">
        <textarea name="description" placeholder="Description" class="form-control">
        <insert type="submit" class="btn btn-primary" value="Create Cupboard">
    </div>
</form>
