<?php
include_once("../assets/lib/libAmazonReports.php");
require_once('../authenticate.php');
  //Author: Zach Howard
  //Purpose: This page processes POST data from setMAP.php
  //Date: 05/18/2016
  //Ver: 1.0
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="tables.css">
</head>
<body>
  <h1 id='reportTitle'>Minimum Quantities Set!</h1>
  <div  class="tbl-header">
  <table class='pure-table pure-table-horizontal'>
    <thead><tr><th>Name</th><th>Old MinInv</th><th>New MinInv</th></tr></thead>
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
        $oldMinInv = getMinimumInventory($sku);
        setMinimumInventory($sku, $qty);

        echo ("<tr><td>" . $brand . " " . $name . "</td><td>" . $oldMinInv . "</td><td>" . $qty .  "</td></tr>");
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
