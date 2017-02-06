<?php include_once("../assets/lib/libAmazonReports.php"); ?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
  </head>
  <body>
    <table class='pure-table pure-table-horizontal'>
      <thead><th>Name</th><th>Being Sold FBA By Other Sellers</th></thead>
    <?php
      ob_implicit_flush(true);

      $SKUs = getSKUs();

      foreach($SKUs as $sku ) {
        if ($sku != "") {
          // "GC-VHVL-XBZF" // XKey 25
          // "OT-KE1Z-RNGT" // MPK Mini
          $result = isAmazonSelling($sku);
          //debugDump($result);
          //echo "Start";

          $brand = getBrand($sku);
          $name = getName($sku);
          $str = "";

          $str .= "<tr><td>$brand $name</td>";

          $pass = false;
          foreach ($result["LowestOfferListing"] as $offer) {
            //debugDump($offer["Qualifiers"]["FulfillmentChannel"]);
            if ($offer["Qualifiers"]["FulfillmentChannel"] == "Amazon") {
              //echo "Bingo!";
              $pass = true;
            }
          }



          //$pass = false;
          if ($pass == true) {
            $str .= "<td>TRUE</td></tr>";
            echo $str;
          }

          //echo $str;

          //echo "End";
        }
      }
    ?>
    </table>
  </body>
</html>
