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
        <thead><tr><td>Name</td><td>Fulfillable</td><td>Buy Box</td></tr></thead>
        <?php
          ob_implicit_flush(true);

          $SKUs = getSKUs();

          foreach($SKUs as $sku ) {
            if ($sku != "") {
              $brand = getBrand($sku);
              $name = getName($sku);

              $buyBox = getBuyBox($sku);

              //echo ("<tr><td>" . $buyBox . "</td></tr>");

              if ($buyBox == "false") {
                $fulfillable = getFulfillable($sku);
                if ($fulfillable > 0) {
                  echo ("<tr><td>" . $brand . " " . $name . "</td><td>" . $fulfillable . "</td><td>" . "false" . "</td></tr>");
                }
              }
            }
          }

        ?>
      </table>
    </form>
  </body>
</html>
