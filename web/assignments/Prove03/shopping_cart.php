<?php
require 'header.php';
?>

<div class="container">
    <?php
    $remove = true;
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
</div>
