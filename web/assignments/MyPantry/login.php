<?php
include 'header.php';
if (isset($_GET["logout"])) {
    session_destroy();
}
if (isset($_GET["signup"])) {
    if (isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["password"])) {
        $passwordHash = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $user = signUp($_POST["username"], $_POST["email"], $passwordHash, $db);

        if (isset($user)) {
            $_SESSION["user"] = $user;
            flush();
            header("Location: pantry.php");
            die();
        } else {
            $error = true;
            $message = "Error in sign up. Please Try again";
        }
    } else {
        $error = true;
        $message = "Missing information in sign up. Try again";
    }
} else if (isset($_POST["username"]) && isset($_POST["password"])) {

    $user = loginForUser($_POST["username"], $db);

    if (isset($user) && password_verify($_POST["password"], $user["password"])) {
        // Correct Password
        $_SESSION["user"] = $user;

        flush();
        header("Location: pantry.php");
        die();


    } else {
        $error = true;
        $message = "Incorrect Username/Password. Try again";
    }
}


if (isset($_GET["error"]) || $error) {
    //If no message they have been logged out
    if (!isset($message)){
        $message = "You have been logged out. Please log back in.";
    }
    //alert error
    echo "<script type='text/javascript'>alert('$message');</script>";
}


//$signUpStmt = $db->prepare('INSERT INTO pantry.person (name, email) VALUES(:name, :email)'');
//$signUpStmt->bindParam(':login', $login, PDO::PARAM_STR);
//$signUpStmt->execute(array(':name' => $name, ':email' => $email));

?>
<div class="d-flex justify-content-center align-items-center vh-100">
    <div id="login" class="card w-25 p-3">
        <form class="form-signin" action="login.php" method="post">
            <h2>Please login</h2>
            <input type="text" class="form-control" name="username" placeholder="Email Address or Username"
                   autofocus="" required/>
            <input type="password" class="form-control" name="password" placeholder="Password" required/>
            <input class="btn btn-lg btn-primary btn-block" type="submit" value="Login">
        </form>
        <h6>Don't have an account?</h6>
        <button class="btn btn-md btn-primary btn-block" onclick="toggleCards()">Sign Up!</button>
    </div>

    <div id="signup" class="card w-25 p-3 d-none">
        <form class="form-signin" action="login.php?signup=true" method="post">
            <h2>Sign Up</h2>
            <input type="text" class="form-control" name="username" placeholder="Username"
                   autofocus="" required/>
            <input type="email" class="form-control" name="email" placeholder="Email Address"
                   autofocus="" required/>

            <input type="password" class="form-control" name="password" placeholder="Password" required/>
            <input class="btn btn-lg btn-primary btn-block" type="submit" value="Sign Up">
        </form>
        <h6>Already have an account?</h6>
        <button class="btn btn-md btn-primary btn-block" onclick="toggleCards()">Login!</button>
    </div>
</div>
<script>
    function toggleCards() {
        var signup = document.getElementById("signup");
        var login = document.getElementById("login");
        signup.classList.toggle("d-none");
        login.classList.toggle("d-none");
    }
</script>
</body>
</html>


