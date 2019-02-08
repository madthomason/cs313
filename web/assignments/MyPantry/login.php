<?php
include 'header.php';

if (isset($_POST["username"]) && isset($_POST["password"])) {
    $loginStmt = $db->prepare('SELECT * FROM pantry.person WHERE (name=:login OR email=:login) AND password=:password');
    $loginStmt->bindParam(':login', $_POST["username"], PDO::PARAM_STR);
    $loginStmt->bindParam(':password', $_POST["password"], PDO::PARAM_STR);
    $loginStmt->execute();
    $user = $loginStmt->fetch(PDO::FETCH_ASSOC);

    if (isset($user["id"])) {
        header("Location: pantry.php?id=" . $user["id"]);
    } else {
        $error = true;
    }
}
if (isset($_GET["error"]) || $error) {
    //alert error
    $message = "Incorrect Username/Password. Try again";
    echo "<script type='text/javascript'>alert('$message');</script>";
}


//$signUpStmt = $db->prepare('INSERT INTO pantry.person (name, email) VALUES(:name, :email)'');
//$signUpStmt->bindParam(':login', $login, PDO::PARAM_STR);
//$signUpStmt->execute(array(':name' => $name, ':email' => $email));

?>
<div>
    <div class="wrapper">
        <form class="form-signin" action="login.php" method="post">
            <h2>Please login</h2>
            <input type="text" class="form-control" name="username" placeholder="Email Address or Username" required="" autofocus="" />
            <input type="password" class="form-control" name="password" placeholder="Password" required=""/>
            <input class="btn btn-lg btn-primary btn-block" type="submit">Login</input>
        </form>
    </div>
<!--    <div class="wrapper hidden">-->
<!--        <form class="form-signup" action="cupboard.php" method="post">-->
<!--            <h2>Please Put in your information</h2>-->
<!--            <input type="text" class="form-control" name="name" placeholder="Username" required="" autofocus="" />-->
<!--            <input type="email" class="form-control" name="email" placeholder="Email Address" required=""/>-->
<!--            <input class="btn btn-lg btn-primary btn-block" type="submit">Sign Up</input>-->
<!--        </form>-->
<!--    </div>-->
</div>
</body>
</html>


