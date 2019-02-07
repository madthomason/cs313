<?php
/**
 * Created by PhpStorm.
 * User: Madeline Barlocker
 * Date: 2/7/2019
 * Time: 10:00 AM
 */

include 'database.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Scriptures</title>
    <link rel="stylesheet" href="../general.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
          integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
          integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

</head>
<body>
<div>
    <h1>Scripture Resources</h1>

    <?php
    $db = getDb();
    if (isset($_GET["book"])) {
        $scripturesStmt = $db->prepare('SELECT * FROM scripture WHERE book=:book');
        $scripturesStmt->bindParam(':book', $_GET["book"], PDO::PARAM_STR);

    } else {
        $scripturesStmt = $db->prepare('SELECT * FROM scripture');
    }

    $scripturesStmt->execute();
    $scriptures = $scripturesStmt->fetchAll(PDO::FETCH_ASSOC);


    $books = array();
    foreach ($scriptures as $scripture) {
        array_push($books, $scripture["book"]);
        echo '<a href="details.php?id=' . $scripture["id"] . '"><h4>' . $scripture["book"] . ' ' . $scripture["chapter"] . ':' .
            $scripture["verse"] . '</h4></a><br>';
    }
    ?>

    <form action="scriptures.php" method="get">
<!--        <select>-->
<!--            --><?php
//            foreach ($books as $book) {
//                echo '<option value="'. $book . '"> '. $book . '</option>';
//            }
//            ?>
<!--        </select>-->
        Book Name: <input type="text" name="book">
        <input type="search">
    </form>
</div>

</body>
</html>