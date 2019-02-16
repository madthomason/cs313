<?php
/**
 * Created by PhpStorm.
 * User: Madeline Barlocker
 * Date: 2/4/2019
 * Time: 10:05 AM
 */
require 'header.php';

if (isset($_GET["id"])) {
    $_SESSION["user"] = getUser($_GET["id"], $db);
    //Get the cupboards
    $_SESSION["cupboards"] = getCupboards($_SESSION["user"]["id"], $db);
    $items = getItems($_SESSION["cupboards"][0]["id"], $db);

} else if (isset($_GET["cupboardId"])) {
    $items = getItems($_GET["cupboardId"], $db);
} else {
    header("Location: login.php?error=true");
}
$cupboards = $_SESSION["cupboards"];

$quantityTypes = getQuantityTypes();

////debuggers:
//$message =  $_SESSION["cupboardDesc"][16] . ': ' . $items[0]["cupboard_id"];
//echo "<script type='text/javascript'>alert('$message');</script>";

$cupboardId = $items[0]["cupboard_id"];
require 'itemModal.php';
require 'cupboardModal.php';
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
    <a href="login.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
</div>

</nav>
<?php
require 'cupboard.php';
?>

</body>
</html>