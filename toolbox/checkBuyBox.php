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
    <h1 id='reportTitle'>Check Buy Boxes</h1>
    <div  class="tbl-header">
      <table>
        <thead><tr><td>Name</td><td>Fulfillable</td><td>Buy Box</td><td>URL</td></tr></thead>
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
              $asin = getASIN($sku);

              $buyBox = getBuyBox($sku);

              //echo ("<tr><td>" . $buyBox . "</td></tr>");

              if ($buyBox == "false") {
                $fulfillable = getFulfillable($sku);
                if ($fulfillable > 0) {
                  echo ("<tr><td>" . $brand . " " . $name . "</td><td>" . $fulfillable . "</td><td>" . "false" . "</td><td><a href='https://www.amazon.ca/dp/$asin' target='_blank'>https://www.amazon.ca/dp/$asin</td></tr>");
                }
              }
            }
          }

        ?>
      </table>
    </div>
    </form>
  </body>
</html>
