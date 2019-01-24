<?php
require 'items.php';
require 'header.php';



echo '';

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