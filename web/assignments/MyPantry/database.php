<?php
/**
 * Created by PhpStorm.
 * User: Madeline Barlocker
 * Date: 2/4/2019
 * Time: 9:59 AM
 */
function getDb() {
    $db = null;
    try
    {
        $dbUrl = getenv('DATABASE_URL');

        $dbOpts = parse_url($dbUrl);

        $dbHost = $dbOpts["host"];
        $dbPort = $dbOpts["port"];
        $dbUser = $dbOpts["user"];
        $dbPassword = $dbOpts["pass"];
        $dbName = ltrim($dbOpts["path"],'/');

        $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $ex)
    {
        echo 'Error!: ' . $ex->getMessage();
        die();
    }
    return $db;
}


//$db = getDb();
//$loginStmt = $db->prepare('SELECT * FROM pantry.person WHERE name=:login OR email=:login');
//$loginStmt->execute(array(':login' => $input));
//$user = $loginStmt->fetchAll(PDO::FETCH_ASSOC);

//$cupboardsStmt = $db->prepare('SELECT * FROM pantry.cupboard WHERE person_id=:userId');
//$cupboardsStmt->execute(array(':userId' => $user["id"]));
//$cupboards = $cupboardsStmt->fetchAll(PDO::FETCH_ASSOC);

//$quantityTypesStmt = $db->prepare('SELECT * FROM pantry.quantity_type');
//$quantityTypesStmt->execute();
//$quantityTypes = $quantityTypesStmt->fetchAll(PDO::FETCH_ASSOC);

//$itemsStmt = $db->prepare('SELECT * FROM pantry.item WHERE cupboard_id=:cupboardId');
//$itemsStmt->execute(array(':cupboardId' => $cupboards["id"]));
//$items =  varchar(45)->fetchAll(PDO::FETCH_ASSOC);


//$signUpStmt = $db->prepare('INSERT INTO pantry.person (name, email, password) VALUES(:name, :email, :password)'');
//$signUpStmt->execute(array(':name' => $name, ':email' => $email));

//$updateItemsStmt = $db->prepare('UPDATE pantry.items SET quantity = quantity + 1 WHERE id=: ');
//$updateCupboardsStmt = $db->prepare('SELECT * FROM pantry.cupboard WHERE name is like :login OR email is like :login');

