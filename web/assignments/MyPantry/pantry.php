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
            <a data-placement="bottom" data-toggle="popover" data-title="Login" data-container="body" type="button" data-html="true" href="#" id="login">
                <i class="fas fa-plus font-xxl"></i>
            </a>

            <div id="popover-content" class="hide">
                <?php
                require 'itemModal.php'
                ?>
            </div>
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