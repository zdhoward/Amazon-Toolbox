<?php
include_once("../assets/lib/libAmazonReports.php");
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
    <h1 id='reportTitle'>Set Empty SKUs</h1>
    <form method='post' action="setEmptySKUsSubmit.php">
      <div  class="tbl-header">
      <table class='pure-table pure-table-horizontal'>
        <thead><tr><td>Name</td><td colspan=2>SKU</td></tr></thead>
      </table>
    </div>
    <div  class="tbl-content">
      <table>
        <?php

          $SKUs = getEmptySKUs();

          foreach ($SKUs as $product) {
            //debugDump($product);
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
