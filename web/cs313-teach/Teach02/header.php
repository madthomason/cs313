<?php
$current = basename(__FILE__);
?>
<div>
    <div class="header">
        <h1>Bumper</h1>
    </div>
    <div class="navbar">
        <ul>
            <li <?php     if ($current == 'home.php') {echo 'class="current"';} ?>><a href="home.php">Home</a></li>
            <li <?php     if ($current == 'about-us.php') {echo 'class="current"';} ?>><a href="about-us.php">About Us</a></li>
            <li <?php     if ($current == 'login.php') {echo 'class="current"';} ?>><a href="login.php">Login</a></li>
        </ul>
    </div>

</div>
