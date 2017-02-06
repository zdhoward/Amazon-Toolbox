<?php

include_once("../assets/lib/libAmazonReports.php");
//Author: Zach Howard
//Purpose: This page allows you to modify products in the database
//Date: 05/24/2016
//Ver: 1.0

?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="tables.css">
  </head>
  <body>
    <h1 id='reportTitle'>Set Product</h1>
    <form method='post' action="setProductSubmit.php">
      <div  class="tbl-content">
      <table class='pure-table pure-table-horizontal'>
        <!-- <thead><tr><td></td></tr></thead> -->
        <tr><td>SKU:</td><td><input type='text' name='sku'></input></td></tr>
        <tr><td colspan=2><input type='submit'></input></td></tr>
      </table>
    </div>
    </form>
  </body>
</html>
