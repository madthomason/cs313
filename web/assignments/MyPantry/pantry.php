<?php
/**
 * Created by PhpStorm.
 * User: Madeline Barlocker
 * Date: 2/4/2019
 * Time: 10:05 AM
 */
require 'header.php';

function getUser($id) {
    $userStmt = $db->prepare('SELECT * FROM pantry.person WHERE id=:id');
    $userStmt->bindParam(':id', $id, PDO::PARAM_INT);
    $userStmt->execute();
    return $userStmt->fetch(PDO::FETCH_ASSOC);
}

if(isset($_GET["id"])) {
    $user = getUser($_GET["id"]);

    //Get the cupboards
    $cupboardsStmt = $db->prepare('SELECT * FROM pantry.cupboard WHERE person_id=:userId');
    $cupboardsStmt->execute(array(':userId' => $user["id"]));
    $cupboards = $cupboardsStmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    header("Location: login.php?error=true");
}

?>
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <?php
                foreach($cupboards as $cupboard) {
                    echo "<li class=\"nav-item active\">
                    <a class=\"nav-link\" href=\"#\">$cupboard <span class=\"sr-only\">(current)</span></a>
                </li>";
                }
                ?>

                <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                </li>
            </ul>
        </div>
    </nav>
</div>
<?php
require 'cupboard.php';
?>



</body>
</html>