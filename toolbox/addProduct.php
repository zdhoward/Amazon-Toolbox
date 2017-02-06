<?php
include_once("../assets/lib/libAmazonReports.php");
require_once('../authenticate.php');
//Author: Zach Howard
//Purpose: This page allows you to add new products to the database
//Date: 05/24/2016
//Ver: 1.0
?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="tables.css">
  </head>
  <body>
    <h1 id='reportTitle'>Add New Product</h1>
    <div  class="tbl-content">
    <form method='post' action="addProductSubmit.php">
      <table class='pure-table pure-table-horizontal'>
        <!-- <thead><tr><td></td></tr></thead> -->
        <tr><td>Brand:</td><td><?php allBrandsAsSelectInput(); ?></td></tr>
        <tr><td>Other Brand:</td><td><input type='text' name='otherBrand'></input></td></tr>
        <tr><td>Name:</td><td><input type='text' name='name'></input></td></tr>
        <tr><td>SKU:</td><td><input type='text' name='sku'></input></td></tr>
        <tr><td>MinInv:</td><td><input type='text' name='minInv'></input></td></tr>
        <tr><td>Total Sold:</td><td><input type='text' name='totalSold' value=0></input></td></tr>
        <tr><td>MAP:</td><td><input type='text' name='MAP'></input></td></tr>
        <tr><td>Landed Cost:</td><td><input type='text' name='landedCost'></input></td></tr>
        <tr><td>Backordered:</td><td><input type='text' name='backordered' value=0></input></td></tr>
        <tr><td>Date Added:</td><td><input type='text' name='dateAdded' value='<?php echo (date("Y-m-d")); ?>'></input></td></tr>
        <tr><td>Hidden:</td><td><input type='text' name='hidden' value=0></input></td></tr>
        <tr><td colspan=2><input type='submit'></input></td></tr>
      </table>
    </form>
  </div>
  </body>
</html>
