<?php
/**
 * Created by PhpStorm.
 * User: Madeline Barlocker
 * Date: 2/4/2019
 * Time: 10:05 AM
 */
require 'header.php';

function getUser($id)
{
    $userStmt = $db->prepare('SELECT * FROM pantry.person WHERE id=:id');
    $userStmt->bindParam(':id', $id, PDO::PARAM_INT);
    $userStmt->execute();
    return $userStmt->fetch(PDO::FETCH_ASSOC);
}

if (isset($_GET["id"])) {
    $_SESSION["user"] = getUser($_GET["id"]);
    $message = $_SESSION["user"]["name"];
    //Get the cupboards
    $cupboardsStmt = $db->prepare('SELECT * FROM pantry.cupboard WHERE person_id=:userId');
    $cupboardsStmt->execute(array(':userId' => $_SESSION["user"]["id"]));
    $_SESSION["cupboards"] = $cupboardsStmt->fetchAll(PDO::FETCH_ASSOC);

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
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <?php
        foreach ($cupboards as $cupboard) {
            echo '<a class="nav-item nav-link active" href="pantry.php?cupboardId=' . $cupboard["id"] . '">'
                . $cupboard["name"] . '<span class="sr-only">(current)</span></a>';
        }
        ?>
    </nav>
</div>
<?php
require 'cupboard.php?';
?>


</body>
</html>