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
    if (!isset($_GET["action"]) || $_GET["action"] === "add") {
        if (isset($_SESSION["cartItems"]) && isset($_SESSION["cartItems"][$_GET["id"]])) {
            $_SESSION["cartItems"][$_GET["id"]] = $_SESSION["cartItems"][$_GET["id"]] + 1;
        } else {
            $_SESSION["cartItems"][$_GET["id"]] = 1;
        }

        if (!isset($_GET["action"])) {
            header("Location: browse.php");
        }
    } else if ($_GET["action"] === "remove") {
        if (isset($_SESSION["cartItems"][$_GET["id"]])) {
            $_SESSION["cartItems"][$_GET["id"]] = $_SESSION["cartItems"][$_GET["id"]] - 1;
            if ($_SESSION["cartItems"][$_GET["id"]] == 0) {
                unset($_SESSION["cartItems"][$_GET["id"]]);
            }
        }
    } else if ($_GET["action"] === "delete") {
        unset($_SESSION["cartItems"][$_GET["id"]]);
    }
}

header("Location: shopping_cart.php");

