<?php


if (isset($_GET["id"])) {
    if (!empty($_SESSION["cartItems"])) {
        if (($key = array_search($_GET["id"], $_SESSION["cartItems"])) !== false) {
            unset($_SESSION["cartItems"][$key]);
        }
    }
}

header("Location: shopping_cart.php");
