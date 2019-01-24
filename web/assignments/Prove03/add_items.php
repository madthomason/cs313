<?php
/**
 * Created by PhpStorm.
 * User: Madeline Barlocker
 * Date: 1/23/2019
 * Time: 4:56 PM
 */

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["cartItems"])) {
    $_SESSION["cartItems"] = array();
}

if ($_GET["id"]) {
    $_SESSION["cartItems"] .= ", " . $_GET["id"];
}


header("Location: browse.php");
