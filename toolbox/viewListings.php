<?php
include_once("../assets/lib/libAmazonReports.php");
require_once('../authenticate.php');
//Author: Zach Howard
//Purpose: This page lists all SKUs with hyperlinks to their detail page
//Date: 09/05/2016
//Ver: 0.5
?>
<!Doctype html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="tables.css">
  </head>
  <body>
    <h1 id='reportTitle'>View Listings</h1>
    <div  class="tbl-header">
      <table>
          <thead><tr><td>Name</td><td>URL</td></tr></thead>
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
      </div>
    </form>
  </body>
</html>
