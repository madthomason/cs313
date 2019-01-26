<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if (isset($_GET["id"])) {
    if (isset($_SESSION["cartItems"])) {
        if (isset($_SESSION["cartItems"][$_GET["id"]])) {
            $_SESSION["cartItems"][$_GET["id"]] = $_SESSION["cartItems"][$_GET["id"]] - 1;
            if ($_SESSION["cartItems"][$_GET["id"]] == 0) {
                unset($_SESSION["cartItems"][$_GET["id"]]);
            }
        }
    }
}

header("Location: shopping_cart.php");
