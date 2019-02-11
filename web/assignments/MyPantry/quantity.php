<?php
/**
 * Created by PhpStorm.
 * User: Madeline Barlocker
 * Date: 2/8/2019
 * Time: 5:54 PM
 */
if (isset($_GET["id"])) {
    if (isset($_GET["add"])) {
        if ($_GET["type"] == "add"){
            $updateItemsStmt = $db->prepare('UPDATE pantry.item SET quantity = quantity + 1 WHERE id=:id ');
        } else if ($_GET["type"] == "remove"){
            $updateItemsStmt = $db->prepare('UPDATE pantry.item SET quantity = quantity - 1 WHERE id=:id ');
        }
    }
}
