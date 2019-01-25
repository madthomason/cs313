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
//
//if (!isset($_SESSION["cartItems"])) {
//    $_SESSION["cartItems"] = array();
//}

if (isset($_GET["id"])) {
    if (!empty($_SESSION["cartItems"])) {
        $_SESSION["cartItems"] .= ", " . $_GET["id"];
    } else {
        $_SESSION["cartItems"][] =  $_GET["id"];
    }

}

header("Location: browse.php");
