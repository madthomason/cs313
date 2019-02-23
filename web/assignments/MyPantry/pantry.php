<?php
/**
 * Created by PhpStorm.
 * User: Madeline Barlocker
 * Date: 2/4/2019
 * Time: 10:05 AM
 */
require 'header.php';

if (isset($_SESSION["user"])) {
    //Get the cupboards
    $_SESSION["cupboards"] = getCupboards($_SESSION["user"]["id"], $db);
    $cupboardId = $_SESSION["cupboards"][0]["id"];
    $items = getItems($cupboardId, $db);


} else if (isset($_GET["cupboardId"])) {
    $items = getItems($_GET["cupboardId"], $db);
    $cupboardId = $_GET["cupboardId"];

} else {
    flush();
    header("Location: login.php?error=true");
    die();
}

$cupboards = $_SESSION["cupboards"];
//$quantityTypes = getQuantityTypes();

////debuggers:
//$message =  $_SESSION["cupboardDesc"][16] . ': ' . $items[0]["cupboard_id"];
//echo "<script type='text/javascript'>alert('$message');</script>";


require 'itemModal.php';
require 'cupboardModal.php';
require_once 'updateCupboardModal.php';
?>
<nav class="navbar navbar-dark bg-dark">
    <div class="d-flex">
        <?php
        echo '<a class="navbar-brand" href="pantry.php?id=' . $_SESSION["user"]["id"] . '">' . $_SESSION["user"]["name"] . '\'s Pantry</a>
        <div class="navbar-nav flex-row">';
        foreach ($cupboards as $cupboard) {
            $_SESSION["cupboardDesc"][$cupboard["id"]] = $cupboard["description"];
            echo '<a class="nav-item nav-link p-2" href="pantry.php?cupboardId=' . $cupboard["id"] . '">'
                . $cupboard["name"] . '</a>';
        }
        ?>
        <button type="button" class="btn btn-link navbar-btn" data-toggle="modal" data-target="#createCupboardModal">
            <i class="fas fa-plus font-xxl"></i>
        </button>
        <?php
        require 'cupboardModal.php';
        ?>
    </div>
    </div>
    <div class="nav navbar-nav navbar-right">
        <a href="login.php?logout=true"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>

</nav>
<?php
require 'cupboard.php';
?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>