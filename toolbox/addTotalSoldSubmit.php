<?php
require_once('../authenticate.php');
include_once("../assets/lib/libAmazonReports.php");
  //Author: Zach Howard
  //Purpose: This page processes POST data from addTotalSold.php
  //Date: 05/18/2016
  //Ver: 1.0
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="tables.css">
</head>
<body>
  <h1 id='reportTitle'>Totals Added!</h1>
  <div  class="tbl-header">
  <table>
    <thead><tr><th>Name</th><th>Added</th><th>New Total</th></tr></thead>
  </table>
</div>
<div  class="tbl-content">
<table>
<?php
  if ($_POST) {
    foreach($_POST as $sku=>$qty) {

      // NO MORE BLANKS!!!!
      $regex = "/\./";
      $sku = preg_replace("/\_/", '.', $sku);

      if ($qty != "") {
        $qty = validateInput("digit" ,$qty);
        $brand = getBrand($sku);
        $name = getName($sku);
        $totalSold = getTotalSold($sku);
        $totalSold += $qty;
        if ($qty) {
          addTotalSold($sku, $qty);
        }
        echo ("<tr><td>" . $brand . " " . $name . "</td><td>" . $qty . "</td><td>" . $totalSold .  "</td></tr>");
      }
    }

  } else {
    echo "Nothing has been posted";
  }
?>
  </table>
</div>
</body>
</html>
