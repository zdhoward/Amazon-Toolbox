<?php
include_once("../assets/lib/libAmazonReports.php");
  //Author: Zach Howard
  //Purpose: This report shows the Amazon Report, excluding all hidden products
  //Date: 05/18/2016
  //Ver: 1.0
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
</head>
<body>
  <table class='pure-table pure-table-horizontal'>
    <thead><tr><th>Brand</th><th>Name</th><th>Min Inv</th><th>Fulfillable</th><th>Inbound</th><th>Needed</th><th>Total Sold</th><th>Backordered</th><th>Buy Box</th><th>MAP</th><th>Our Price</th><th>Lowest Price</th><th>Landed Cost</th><th>Date Added</th></tr></thead>
    <?php
      ob_implicit_flush(true);
      // Get non-hidden SKUs
      $SKUs = getSKUs();

      foreach ($SKUs as $sku) {
        // Table Structure
        // Brand, Name, MinInv, FBAInv, Inbound, TotalSold, Backordered, BuyBox, MAP, LowestPrice, LandedCost, DateAdded
        $brand = getBrand($sku);
        $name = getName($sku);
        $minInv = getMinimumInventory($sku);
        $FBAInv = getFulfillable($sku);
        $inbound = getInbound($sku);
        $totalSold = getTotalSold($sku);
        $backordered = getBackordered($sku);
        $buyBox = getBuyBox($sku);
        $MAP = getMAP($sku);
        $ourPrice = getOurPrice($sku);
        $lowestPrice = getLowestPrice($sku);
        $landedCost = getLandedCost($sku);
        $dateAdded = getDateAdded($sku);

        //Calculated fields
        $needed = $minInv - ($FBAInv + $inbound);

        //Conditional Modifiers
        if ($needed > 0) {
          //$striped = "pure-table-odd";
          $striped = "";
        } else {
          $striped = "";
        }

        echo ("<tr class='" . $striped . "'><td>" . $brand . "</td><td>" . $name . "</td><td>" . $minInv . "</td><td>" . $FBAInv . "</td><td>" . $inbound . "</td><td>" . $needed . "</td><td>" . $totalSold . "</td><td>" . $backordered . "</td><td>" . $buyBox . "</td><td>" . $MAP . "</td><td>" . $ourPrice . "</td><td>" . $lowestPrice . "</td><td>" . $landedCost . "</td><td>" . $dateAdded . "</td></tr>");
      }
    ?>
  </table>
</body>
</html>
