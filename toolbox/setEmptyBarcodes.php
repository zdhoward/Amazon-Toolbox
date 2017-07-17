<?php
include_once("../assets/lib/libAmazonReports.php");
require_once('../authenticate.php');
//Author: Zach Howard
//Purpose: This page allows you to set SKUs for products that don't currently have SKUs
//Date: 05/24/2016
//Ver: 1.0
?>
<!Doctype html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="tables.css">
  </head>
  <body>
    <h1 id='reportTitle'>Set Empty Barcodes</h1>
    <form method='post' action="setEmptyBarcodesSubmit.php">
      <div  class="tbl-header">
      <table class='pure-table pure-table-horizontal'>
        <thead><tr><td>Name</td><td>Barcode</td></tr></thead>
      </table>
    </div>
    <div  class="tbl-content">
      <table>
        <?php

          $SKUs = getEmptyBarcodes();

          foreach ($SKUs as $product) {
            //debugDump($product);
            //$MAP = getMAP($product);

            echo ("<tr><td>" . $product['brand'] . " " . $product['name'] . "</td><td>" . "<input type='text' name='" . $product['id'] . "'></input>" . "</td></tr>");
          }

        //echo "Hello World";

        ?>
        <tr><td colspan=2 align='center'><input type='submit'></input></td></tr>
      </table>
    </div>
    </form>
  </body>
</html>
