<?php
/**
 * Created by PhpStorm.
 * User: Madeline Barlocker
 * Date: 1/23/2019
 * Time: 4:56 PM
 */

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if (isset($_GET["id"])) {
    if (!empty($_SESSION["cartItems"] && !isset($_SESSION["cartItems"]))) {
        if ($_SESSION["cartItems"][$_GET["id"]]) {
            $_SESSION["cartItems"][$_GET["id"]] = $_SESSION["cartItems"][$_GET["id"]]++;
        } else {
            $_SESSION["cartItems"] .= ", " . $_GET["id"] . " => 1";
        }

    } else {
        $_SESSION["cartItems"] =  [$_GET["id"] => 1];
    }

}

header("Location: browse.php");
