<?php
require 'session.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="teach02.css" rel="stylesheet">
</head>
<body>
<?php
//$current = 'login';
include 'header.php';
?>
<a href="session.php?user=admin">Login as Admin</a>
<a href="session.php?user=tester">Login as Tester</a>
<!--<button class="admin" onclick="--><?php //$_SESSION['user'] = 'admin';?><!--">Login as Admin</button>-->
<!--<button class="tester" onclick="--><?php //$_SESSION['user'] = 'tester';?><!--">Login as Tester</button>-->


<script>
    $('')
    
</script>
</body>
</html>
