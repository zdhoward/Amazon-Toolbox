<?php
include_once("../assets/lib/libAmazonReports.php");
require_once('../authenticate.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="tables.css">
  </head>
  <body>
    <h1 id='reportTitle'>Check For Any FBA Competition</h1>
    <div  class="tbl-header">
    <table>
      <thead><th>Name</th><th>No Competition</th></thead>
    </table>
  </div>
  <div  class="tbl-content">
    <table>
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
          $bb = getBuyBox($sku);
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
          if ($pass == false && $bb == true) {
            $str .= "<td>TRUE</td></tr>";
            echo $str;
          }

          //echo $str;

          //echo "End";
        }
      }
    ?>
    </table>
  </div>
  </body>
</html>
