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
    <form action='./checkBuyBoxByBrandSubmit.php' method='get'>
      <table>
        <tr><td colspan='2'>Select a brand:</td></tr>
        <tr><td>Brand:</td><td><?php allBrandsAsSelectInput(); ?></td></tr>
        <tr><td colspan='2'><input type='submit'/></td></tr>
      </table>
    </form>
  </body>
</html>
