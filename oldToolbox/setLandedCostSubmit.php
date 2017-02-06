<?php
include_once("../assets/lib/libAmazonReports.php");
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
  <h1 id='reportTitle'>Landed Cost Set!</h1>
  <div  class="tbl-header">
  <table class='pure-table pure-table-horizontal'>
    <thead><tr><th>Name</th><th>Old Cost</th><th>New Cost</th></tr></thead>
  </table>
</div>
<div  class="tbl-content">
<table>
<?php
  if ($_POST) {
    foreach($_POST as $sku=>$amt) {
      if ($amt != "") {
        $amt = validateInput("decimal" ,$amt);
        $brand = getBrand($sku);
        $name = getName($sku);
        $oldLandedCost = getLandedCost($sku);
        if ($amt) {
          setLandedCost($sku, $amt);
        }
        echo ("<tr><td>" .$brand . " " . $name . "</td><td>" . $oldLandedCost . "</td><td>" . $amt .  "</td></tr>");
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
