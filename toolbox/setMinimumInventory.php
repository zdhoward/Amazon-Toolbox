<?php
include_once("../assets/lib/libAmazonReports.php");
require_once('../authenticate.php');
//Author: Zach Howard
//Purpose: This page allows you to set MAP on unhidden products
//Date: 05/18/2016
//Ver: 1.0
?>
<!Doctype html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="tables.css">
  </head>
  <body>
    <h1 id='reportTitle'>Set Minimum Inventory Quantites</h1>
    <form method='post' action="setMinimumInventorySubmit.php">
      <div  class="tbl-header">
      <table class='pure-table pure-table-horizontal'>
        <thead><tr><td>Name</td><td colspan=2>Minimum Inventory</td></tr></thead>
      </table>
    </div>
<div  class="tbl-content">
    <table>
        <?php

          $SKUs = getSKUs();

          foreach($SKUs as $sku ) {
            if ($sku != "") {
              $brand = getBrand($sku);
              $name = getName($sku);
              $minInv = getMinimumInventory($sku);
              echo ("<tr><td>" . $brand . " " . $name . "</td><td>" . $minInv . "</td><td>" . "<input type='text' name='" . $sku . "'>" . "</td></tr>");
            }
          }

        ?>
        <tr><td colspan=3 align='center'><input type='submit'></td></tr>
      </table>
    </div>
    </form>
  </body>
</html>
