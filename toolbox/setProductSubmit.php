<?php

include_once("../assets/lib/libAmazonReports.php");
require_once('../authenticate.php');
//Author: Zach Howard
//Purpose: This page allows you to add new products to the database
//Date: 05/24/2016
//Ver: 1.0

?>
<?php

  if ($_POST) {
      $brand = getBrand($_POST['sku']);
      $name = getName($_POST['sku']);
      $minInv = getMinimumInventory($_POST['sku']);
      $totSold = getTotalSold($_POST['sku']);
      $MAP = getMAP($_POST['sku']);
      $landedCost = getLandedCost($_POST['sku']);
      $backordered = getBackordered($_POST['sku']);
  }

?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="tables.css">
  </head>
  <body>
    <h1 id='reportTitle'>Set Product</h1>
    <form method='post' action="setProductSubmit2.php">
      <div  class="tbl-content">
      <table class='pure-table pure-table-horizontal'>
        <!-- <thead><tr><td></td></tr></thead> -->
        <tr><td>SKU:</td><td><input type='text' name='sku' value='<?php echo ($_POST['sku']); ?>'></input></td></tr>
        <tr><td>Brand:</td><td><input type='text' name='brand' value='<?php echo($brand); ?>'</td></tr>
        <tr><td>Name:</td><td><input type='text' name='name' value='<?php echo($name); ?>'></></input></td></tr>
        <tr><td>MinInv:</td><td><input type='text' name='minInv' value='<?php echo($minInv); ?>'></></input></td></tr>
        <tr><td>Total Sold:</td><td><input type='text' name='totalSold' value='<?php echo($totSold); ?>'></input></td></tr>
        <tr><td>MAP:</td><td><input type='text' name='MAP' value='<?php echo($MAP); ?>'></></input></td></tr>
        <tr><td>Landed Cost:</td><td><input type='text' name='landedCost' value='<?php echo($landedCost); ?>'></input></td></tr>
        <tr><td>Backordered:</td><td><input type='text' name='backordered' value='<?php echo($backordered); ?>'></input></td></tr>
        <tr><td colspan=2><input type='submit'></input></td></tr>
      </table>
    </div>
    </form>
  </body>
</html>
