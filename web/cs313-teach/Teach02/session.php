<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $_SESSION['user'] = $_GET['user'];
    header("Location: home.php");
    die();

?>