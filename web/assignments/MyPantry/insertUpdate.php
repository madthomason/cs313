<?php
/**
 * Created by PhpStorm.
 * User: Madeline Barlocker
 * Date: 2/14/2019
 * Time: 10:59 AM
 */
require_once 'database.php';
$db = getDb();
session_start();

if (isset($_GET["item"])) {
    createItem($_POST["cupboard_id"], $_POST["name"], $_POST["quantity_type"], $_POST["quantity"], $_POST["restock_quantity"], $db);
} else if (isset($_GET["cupboard"])) {
    if ($_GET["cupboard"] == "insert") {
        createCupboard($_POST["person_id"], $_POST["name"], $_POST["description"], $db);
    } else if ($_GET["cupboard"] == "update") {
        updateCupboard($_POST["cupboard_id"], $_POST["name"], $_POST["description"], $db);
    }
}

flush();
header("Location: pantry.php?id=" . $_SESSION["user"]["id"]);
die();






