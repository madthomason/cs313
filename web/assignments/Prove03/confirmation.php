<?php
require 'header.php';



echo '<div class="confirm_address p-3 m-3">
    <address>
    <span class="adr">
    <h4 class="name">' . htmlspecialchars($_POST["name"]) . '</h4><br>
    <span class="address">' . htmlspecialchars($_POST["address"]) . '</span><br>
    <span class="city">' . htmlspecialchars($_POST["city"]) . '</span>,  
    <abbr class="state">' . htmlspecialchars($_POST["state"]) . '</abbr>
    <span class="zip">' . htmlspecialchars($_POST["zip"]) . '</span><br>
    <email class="email">' . htmlspecialchars($_POST["email"]) . '</email>
  </span>
</address>
</div>
<div class="container">';
$remove = false;
include 'items_table.php';

?>

    </table>
</div>
    </body>
    </html>
<?php
/**
 *  It should display all the items they have just purchased as well as the address to which it will be shipped.
 * Make sure to check for malicious injection, especially from free-entry fields like the address.
 */