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
    <h1 id='reportTitle'>Check Pricing</h1>
    <div  class="tbl-header">
      <table>
        <thead><tr><td>Name</td><td>MAP</td><td>Lowest Price</td><td>Landed Cost</td><td>Difference</td></tr></thead>
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
              $MAP = getMAP($sku);
              $lowPrice = getLowestPrice($sku);
              $landedCost = getLandedCost($sku);
              $difference = $MAP - $lowPrice;

              // What defines a pricing alert?
              // - If landedCost > lowPrice
              // - If MAP > lowPrice
              // - If ?
              // - Ignore null inputs from $landedCost, $MAP, and $lowPrice

              if ($lowPrice != "No Info" && $landedCost != 0 && $landedCost > $lowPrice && $difference > 0 ) {
                echo ("<tr><td>" . $brand . " " . $name . "</td><td>" . $MAP . "</td><td>" . $lowPrice . "</td><td>" . $landedCost . "</td><td>" . $difference . "</td></tr>");
              }
            }
          }

        ?>
      </table>
    </div>
    </form>
  </body>
</html>
