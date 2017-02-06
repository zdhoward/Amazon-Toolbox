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
        <thead><tr><td>Name</td><td>Min Inv</td><td>Fulfillable</td><td>Inbound</td><td>Total Inv</td></tr></thead>
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
              $total = $fulfillable + $inbound;

              $striped = "";

              if ($fulfillable == 0) {
                $striped = "pure-table-odd";
              }



              //if ($needed > 0) {
                echo ("<tr class='" . $striped . "'><td>" . $brand . " " . $name . "</td><td>" . $minInv . "</td><td>" . $fulfillable . "</td><td>" . $inbound . "</td><td>" . $total . "</td></tr>");
              //}
            }
          }

        ?>
      </table>
    </form>
  </body>
</html>
