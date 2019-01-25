<?php
require 'header.php';

echo '<div class="confirm_address">
    <address class="vcard">
    <span class="adr">
    <h4 class="name">' . htmlspecialchars($_POST["name"]) . '</h4>
    <span class="address">' . htmlspecialchars($_POST["address"]) . '</span>
    <span class="city">' . htmlspecialchars($_POST["city"]) . '</span>,  
    <abbr class="state">' . htmlspecialchars($_POST["state"]) . '</abbr>
    <span class="zip">' . htmlspecialchars($_POST["zip"]) . '</span>
    <email class="email">' . htmlspecialchars($_POST["email"]) . '</email>
  </span>
</address>
</div>';
$remove = false;
include 'items_table.php';
?>
    <tfoot>
    <tr class="visible-xs">
        <td class="text-center"><strong>Total Free</strong></td>
    </tr>
    <tr>
        <td><a href="browse.php" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
        <td colspan="2" class="hidden-xs"></td>
        <td class="hidden-xs text-center"><strong>Total Free</strong></td>
        <td><a href="checkout.php" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>
    </tr>
    </tfoot>
    </table>

    </body>
    </html>
<?php
/**
 *  It should display all the items they have just purchased as well as the address to which it will be shipped.
 * Make sure to check for malicious injection, especially from free-entry fields like the address.
 */