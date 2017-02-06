<?php
include_once("../assets/lib/libAmazonReports.php");
//Author: Zach Howard
//Purpose: This page lists all SKUs with hyperlinks to their detail page
//Date: 09/05/2016
//Ver: 0.5
?>
<!Doctype html>
<html>
  <head>
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
  </head>
  <body>
      <table class='pure-table pure-table-horizontal'>
        <thead><tr><td>Name</td><td>URL</td></tr></thead>
        <?php
          ob_implicit_flush(true);

          $SKUs = getSKUs();

          foreach($SKUs as $sku ) {
            if ($sku != "") {
              $brand = getBrand($sku);
              $name = getName($sku);
              $asin = getASIN($sku);
              $bb = getBuyBox($sku);

              //debugDump($asin);

              //echo ($asin);

              // Hyperlink = https://www.amazon.ca/dp/+ASIN
              echo "<tr><td>$brand $name:</td><td><a href='https://www.amazon.ca/dp/$asin' target='_blank'>https://www.amazon.ca/dp/$asin</td></tr>";
              //echo "Test";

            }
          }

        ?>
      </table>
    </form>
  </body>
</html>
