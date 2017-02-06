<?php
include_once("../assets/lib/libAmazonReports.php");
//Author: Zach Howard
//Purpose: This page checks for pricing problems
//Date: 05/18/2016
//Ver: 0.5
?>
<!Doctype html>
<html>
  <head>
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
  </head>
  <body>
      <table class='pure-table pure-table-horizontal'>
        <thead><tr><td>Name</td><td>MAP</td><td>Lowest Price</td><td>Landed Cost</td><td>Difference</td></tr></thead>
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
    </form>
  </body>
</html>
