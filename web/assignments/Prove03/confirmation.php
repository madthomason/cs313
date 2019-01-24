<?php
require 'items.php';
require 'header.php';

$name = htmlspecialchars($_POST["name"]);



echo '<address class="vcard">
  <span class="adr">
  <span class="name">' . $name . '</span>
    <span class="address">' . $name . '</span>
    <span class="city">' . $name . '</span>,  
    <abbr class="state" title="California">CA</abbr>&nbsp;&nbsp;
    <span class="zip">' . $name . '</span>
    <span class="email">' . $name . '</span>
  </span>
</address>';

?>

<?php
include 'items_table.php';
?>
<tfoot>

</tfoot>
    </table>

</body>
</html>
<?php
/**
 *  It should display all the items they have just purchased as well as the address to which it will be shipped.
 * Make sure to check for malicious injection, especially from free-entry fields like the address.
 */