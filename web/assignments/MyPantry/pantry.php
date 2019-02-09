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
    $message = $_SESSION["user"]["name"];
    //Get the cupboards
    $_SESSION["cupboards"] = getCupboards($_SESSION["user"]["id"], $db);

    $message = $_SESSION["cupboards"][0]["name"];
} else if (isset($_GET["cupboardId"])) {
    $itemsStmt = $db->prepare('SELECT * FROM pantry.item WHERE cupboard_id=:cupboardId');
    $itemsStmt->bindParam(':cupboardId', $_GET["cupboardId"], PDO::PARAM_INT);
    $itemsStmt->execute();
    $items = $itemsStmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    header("Location: login.php?error=true");
}
$cupboards = $_SESSION["cupboards"];

echo "<script type='text/javascript'>alert('$message');</script>";
?>
<div class="container">
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
        <?php
        echo '<div class="navbar-header">
            <a class="navbar-brand" href="#">'. $_SESSION["user"]["name"] . '\'s Pantry</a>
        </div>';
        foreach ($cupboards as $cupboard) {
            echo '<a class="nav-item nav-link active" href="pantry.php?cupboardId=' . $cupboard["id"] . '">'
                . $cupboard["name"] . '</a>';
        }
        ?>
            <div class="nav navbar-nav navbar-right">
                <a href="login.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
        </div>
    </nav>
</div>
<?php
require 'cupboard.php?';
?>


</body>
</html>