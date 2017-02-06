<?php
include_once("../assets/lib/libAmazonReports.php");
require_once('../authenticate.php');
  //Author: Zach Howard
  //Purpose: This page processes POST data from setEmptySKUs.php
  //Date: 05/18/2016
  //Ver: 1.0
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="tables.css">
</head>
<body>
  <h1 id='reportTitle'>Empty SKUs Added!</h1>
  <div  class="tbl-header">
  <table class='pure-table pure-table-horizontal'>
    <thead><tr><th>Name</th><th>SKU</th></tr></thead>
  </table>
  </div>
<div  class="tbl-content">
  <table>
<?php
  if ($_POST) {
    foreach($_POST as $id=>$sku) {
      if ($sku != "") {
        $name = getNameByID($id);
        echo ("<tr><td>" . $name . "</td><td>" . $sku . "</td></tr>");
        setSKUByID($id, $sku);
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
