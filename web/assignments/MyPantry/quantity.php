<?php
/**
 * Created by PhpStorm.
 * User: Madeline Barlocker
 * Date: 2/8/2019
 * Time: 5:54 PM
 */
require_once 'database.php';
require("../../../sendgrid-php/sendgrid-php.php");
$db = getDb();
session_start();
$msg = "sent!";
if (isset($_GET["id"])) {
    if (isset($_GET["type"])) {
        if ($_GET["type"] == "add"){
            $updateItemsStmt = $db->prepare('UPDATE pantry.item SET quantity = quantity + 1 WHERE id=:id ');
            $updateItemsStmt->bindParam(":id", $_GET["id"], PDO::PARAM_INT);
            $updateItemsStmt->execute();
        } else if ($_GET["type"] == "remove"){
            $updateItemsStmt = $db->prepare('UPDATE pantry.item SET quantity = quantity - 1 WHERE id=:id ');
            $updateItemsStmt->bindParam(":id", $_GET["id"], PDO::PARAM_INT);
            $updateItemsStmt->execute();
            //$msg = emailNotifications($_SESSION["user"], $db);
            $email = new \SendGrid\Mail\Mail();
            $email->addTo($_SESSION["user"]["email"])
                ->setFrom("tho16031@byui.edu")
                ->setSubject("Hello World from the SendGrid PHP Library!")
                ->setText("Hello, Email!");

            $sg = new \SendGrid(getenv('SENDGRID_API_KEY'));

            $response = $sg->send($email);
            if (!isset($response)) {
                $msg = "notSent";
            }
        }
    }
}

function email() {


    $from = new SendGrid\Email(null, "test@example.com");
    $subject = "Hello World from the SendGrid PHP Library!";
    $to = new SendGrid\Email(null, "test@example.com");
    $content = new SendGrid\Content("text/plain", "Hello, Email!");
    $mail = new SendGrid\Mail($from, $subject, $to, $content);

    $apiKey = getenv('SENDGRID_API_KEY');
    $sg = new \SendGrid($apiKey);

    $response = $sg->client->mail()->send()->post($mail);
    echo $response->statusCode();
    echo $response->headers();
    echo $response->body();
}

flush();
header("Location: pantry.php?msg=" . $msg);
die();
