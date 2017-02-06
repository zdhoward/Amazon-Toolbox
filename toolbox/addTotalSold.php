<?php
include_once("../assets/lib/libAmazonReports.php");
require_once('../authenticate.php');
//Author: Zach Howard
//Purpose: This page allows you to add/remove quantities from unhidden products
//Date: 05/18/2016
//Ver: 1.0
?>
<!Doctype html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="tables.css">
  </head>
  <body>
    <h1 id='reportTitle'>Add Total Sold</h1>
    <div  class="tbl-content">
    <form method='post' action="addTotalSoldSubmit.php">
      <table>
        <thead><tr><td>Name</td><td colspan=2>Total Sold</td></tr></thead>
        <?php

          $SKUs = getSKUs();

          foreach($SKUs as $sku ) {
            if ($sku != "") {
              $brand = getBrand($sku);
              $name = getName($sku);
              $totalSold = getTotalSold($sku);
              echo ("<tr><td>" . $brand . " " . $name . "</td><td>" . $totalSold . "</td><td>" . "<input type='text' name='" . $sku . "'>" . "</td></tr>");
            }
          }

        ?>
        <tr><td colspan=3 align='center'><input type='submit'></td></tr>
      </table>
    </form>
  </div>
  </body>
</html>
