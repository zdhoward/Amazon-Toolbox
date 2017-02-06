<?php
include_once("../assets/lib/libAmazonReports.php");
require_once('../authenticate.php');
  //Author: Zach Howard
  //Purpose: This page processes POST data from removeBackordered.php
  //Date: 05/18/2016
  //Ver: 1.0
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="tables.css">
</head>
<body>
  <h1 id='reportTitle'>Backorders Removed!</h1>
  <div  class="tbl-header">
  <table class='pure-table pure-table-horizontal'>
    <thead><tr><th>Name</th><th>Removed</th><th>New Total</th></tr></thead>
  </table>
</div>
<div  class="tbl-content">
<table>
<?php
  if ($_POST) {
    foreach($_POST as $sku=>$qty) {
      if ($qty != "") {
        $qty = validateInput("digit" ,$qty);
        $brand = getBrand($sku);
        $name = getName($sku);
        $backordered = getBackordered($sku);
        $backordered -= $qty;
        if ($qty) {
          removeBackordered($sku, $qty);
        }
        echo ("<tr><td>" .$brand . " " . $name . "</td><td>" . $qty . "</td><td>" . $backordered .  "</td></tr>");
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
