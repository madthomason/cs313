<?php
/**
 * Created by PhpStorm.
 * User: Madeline Barlocker
 * Date: 2/4/2019
 * Time: 9:59 AM
 */
function getDb()
{
    $db = null;
    try {
        $dbUrl = getenv('DATABASE_URL');

        $dbOpts = parse_url($dbUrl);

        $dbHost = $dbOpts["host"];
        $dbPort = $dbOpts["port"];
        $dbUser = $dbOpts["user"];
        $dbPassword = $dbOpts["pass"];
        $dbName = ltrim($dbOpts["path"], '/');

        $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $ex) {
        echo 'Error!: ' . $ex->getMessage();
        die();
    }
    return $db;
}

function loginForUser($username, $password, $db)
{
    $loginStmt = $db->prepare('SELECT id FROM pantry.person WHERE (name=:login OR email=:login) AND password=:password');
    $loginStmt->bindParam(':login', $username, PDO::PARAM_STR);
    $loginStmt->bindParam(':password', $password, PDO::PARAM_STR);
    $loginStmt->execute();
    return $loginStmt->fetch(PDO::FETCH_ASSOC);
}

function signUp($name, $email, $password, $db)
{
    $signUpStmt = $db->prepare('INSERT INTO pantry.person (name, email, password) VALUES(:name, :email, :password)');
    $signUpStmt->bindParam(':name', $name, PDO::PARAM_STR);
    $signUpStmt->bindParam(':email', $email, PDO::PARAM_STR);
    $signUpStmt->bindParam(':password', $password, PDO::PARAM_STR);
    $signUpStmt->execute();
    $userId = $db->lastInsertId('pantry.person_id_seq');
    echo "<script type='text/javascript'>alert('$userId');</script>";
    return $userId;
}

function getUser($id, $db)
{
    $userStmt = $db->prepare('SELECT * FROM pantry.person WHERE id=:id');
    $userStmt->bindParam(':id', $id, PDO::PARAM_INT);
    $userStmt->execute();
    return $userStmt->fetch(PDO::FETCH_ASSOC);
}

function getCupboards($userId, $db)
{
    $cupboardsStmt = $db->prepare('SELECT * FROM pantry.cupboard WHERE person_id=:userId');
    $cupboardsStmt->execute(array(':userId' => $userId));
    return $cupboardsStmt->fetchAll(PDO::FETCH_ASSOC);
}

function createCupboard($personId, $name, $description, $db) {
    $createCupboardStmt = $db->prepare('INSERT INTO pantry.cupboard (person_id, name, description) VALUES(:person_id, :name, :description)');
    $createCupboardStmt->bindParam(':person_id', $personId, PDO::PARAM_INT);
    $createCupboardStmt->bindParam(':name', $name, PDO::PARAM_STR);
    $createCupboardStmt->bindParam(':description', $description, PDO::PARAM_STR);
    $createCupboardStmt->execute();
}

function updateCupboard($id, $name, $description, $db) {
    $updateCupboardsStmt = $db->prepare('UPDATE pantry.cupboard SET name=:name, description=:description WHERE id=:id');
    $updateCupboardsStmt->bindParam(':name', $name, PDO::PARAM_STR);
    $updateCupboardsStmt->bindParam(':description', $description, PDO::PARAM_STR);
    $updateCupboardsStmt->bindParam(':id', $id, PDO::PARAM_INT);
    $updateCupboardsStmt->execute();
}

function getItems($cupboardId, $db)
{
    $itemsStmt = $db->prepare('SELECT * FROM pantry.item WHERE cupboard_id=:cupboardId');
    $itemsStmt->bindParam(':cupboardId', $cupboardId, PDO::PARAM_INT);
    $itemsStmt->execute();
    return $itemsStmt->fetchAll(PDO::FETCH_ASSOC);
}

function createItem($cupboardId, $name, $quantity_type_id, $quantity, $restock_quantity, $db) {
    $signUpStmt = $db->prepare('INSERT INTO pantry.item (cupboard_id, name, quantity_type_id, quantity, restock_quantity) 
                                                  VALUES(:cupboard_id, :name, :quantity_type_id, :quantity, :restock_quantity)');
    $signUpStmt->bindParam(':cupboard_id', $cupboardId, PDO::PARAM_INT);
    $signUpStmt->bindParam(':name', $name, PDO::PARAM_STR);
    $signUpStmt->bindParam(':quantity_type_id', $quantity_type_id, PDO::PARAM_INT);
    $signUpStmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
    $signUpStmt->bindParam(':restock_quantity', $restock_quantity, PDO::PARAM_INT);
    $signUpStmt->execute();
}

function getQuantityTypes()
{
    $quantityTypesStmt = getDb()->prepare('SELECT * FROM pantry.quantity_type');
    $quantityTypesStmt->execute();
    $quantityTypes = array();
    while ($row = $quantityTypesStmt->fetch(PDO::FETCH_ASSOC)) {
        $quantityTypes[$row["id"]] = $row["measurement"];
    }
    return $quantityTypes;
}



//$updateItemsStmt = $db->prepare('UPDATE pantry.item SET quantity = quantity + 1 WHERE id=: ');
//$updateCupboardsStmt = $db->prepare('UPDATE pantry.item SET name=:name, description=:description WHERE id=: ');

