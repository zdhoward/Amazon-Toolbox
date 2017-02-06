<?php
include_once("../assets/lib/libAmazonReports.php");
require_once('../authenticate.php');
//Author: Zach Howard
//Purpose: This page checks for pricing problems
//Date: 05/18/2016
//Ver: 0.5
?>
<!Doctype html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="tables.css">
  </head>
  <body>
    <h1 id='reportTitle'>Check Inventory</h1>
    <div  class="tbl-header">
      <table>
        <thead><tr><td>Name</td><td>Min Inv</td><td>Fulfillable</td><td>Inbound</td><td>Reserved</td><td>Needed</td></tr></thead>
</table>
</div>
<div  class="tbl-content">
  <table>
        <?php
          ob_implicit_flush(true);

          $SKUs = getSKUs();

          foreach($SKUs as $sku ) {
            if ($sku != "") {
              $brand = getBrand($sku);
              $name = getName($sku);

              $needed = getNeeded($sku);
              $minInv = getMinimumInventory($sku);
              $fulfillable = getFulfillable($sku);
              $inbound = getInbound($sku);
              $reserved = getReserved($sku);

              $striped = "";

              if ($fulfillable == 0) {
                $striped = "pure-table-odd";
              }



              if ($needed > 0) {
                echo ("<tr class='" . $striped . "'><td>" . $brand . " " . $name . "</td><td>" . $minInv . "</td><td>" . $fulfillable . "</td><td>" . $inbound . "</td><td>" . $reserved . "</td><td>" . $needed . "</td></tr>");
              }
            }
          }

        ?>
      </table>
    </div>
    </form>
  </body>
</html>
