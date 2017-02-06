<?php
include_once("../assets/lib/libAmazonReports.php");
  //Author: Zach Howard
  //Purpose: This page processes POST data from addTotalSold.php
  //Date: 05/18/2016
  //Ver: 1.0
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
</head>
<body>
  <table class='pure-table pure-table-horizontal'>
    <thead><tr><th>Name</th><th>Added</th><th>New Total</th></tr></thead>
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
</body>
</html>
