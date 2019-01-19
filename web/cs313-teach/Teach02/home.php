<?php
require 'session.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link href="teach02.css" rel="stylesheet">
</head>
<body>
<?php
//$current = 'home';
include 'header.php';
?>

<div>
    <?php
        switch ($_SESSION['user']) {
        case 'admin':
            echo "<p>Welcome Admin</p>";
            break;
        case 'tester':
            echo "<p>Welcome Tester</p>";
            break;
        default:
            echo "<p>Welcome. You are not logged in</p>";
            break;
        }
    ?>

</div>

</body>
</html>
