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

function loginForUser($username, $db)
{
    $loginStmt = $db->prepare('SELECT id, name, password FROM pantry.person WHERE (name=:login OR email=:login)');
    $loginStmt->bindParam(':login', $username, PDO::PARAM_STR);
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

    return getUser($userId, $db);
}

function getUser($id, $db)
{
    $userStmt = $db->prepare('SELECT id, name, email, password FROM pantry.person WHERE id=:id');
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
    $itemsStmt = $db->prepare('SELECT id, cupboard_id, name, quantity_type_id, quantity, restock_quantity 
                               FROM pantry.item WHERE cupboard_id=:cupboardId');
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

function getItemsForRestock($userId, $db) {
    $itemsStmt = $db->prepare('SELECT id, cupboard_id, name, quantity_type_id, quantity, restock_quantity 
                               FROM pantry.item AS i JOIN pantry.cupboard AS c ON c.id = i.cupboard_id
                               WHERE c.person_id = :personId AND i.notification = 0 AND i.quantity < i.restock_quantity');
    $itemsStmt->bindParam(':personId', $userId, PDO::PARAM_INT);
    $itemsStmt->execute();
    return $itemsStmt->fetchAll(PDO::FETCH_ASSOC);
}

function flagItemNotification($items, $db) {
    //Derived from https://stackoverflow.com/questions/920353/can-i-bind-an-array-to-an-in-condition
    $inQuery = implode(',', array_fill(0, count($items), '?'));
    //notification might be a date time: check this
    $updateItemsStmt = $db->prepare('UPDATE pantry.item SET notification = 1 WHERE id IS IN(' . $inQuery . ') ');
    foreach ($items as $k => $id) {
        $updateItemsStmt->bindValue(($k+1), $id);
    }
    $updateItemsStmt->execute();
}


function emailNotifications($user, $db) {
    $quantity_types = getQuantityTypes();
    $items = getItemsForRestock($user["id"], $db);
    if (isset($items)){
        $count = count($items);
        // the message
        $msg = "The following items have reached your restock quantity: \n";

        foreach ($items as $item) {
            $msg .= $item["name"] . " - " . $item["quantity"] . " " . $quantity_types[$item["quantity_type"]] . " \n";
        }

        // use wordwrap() if lines are longer than 70 characters
        $msg = wordwrap($msg,70);

        // send email
        mail($user["email"],"Restock $count Items",$msg);
    } else {
        //no items return 0?
    }

}

