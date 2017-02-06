<?php
include_once("../assets/lib/libAmazonReports.php");
require_once('../authenticate.php');
  //Author: Zach Howard
  //Purpose: This page processes POST data from addProduct.php
  //Date: 05/24/2016
  //Ver: 1.0
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="tables.css">
</head>
<body>
  <h1 id='reportTitle'>New Product Added!</h1>
  <div  class="tbl-content">
  <table>
<?php
  if ($_POST) {
    //debugDump($_POST);
    //echo ("<hr />");

    // Process and INSERT

    if ($_POST['brand'] == 'new') {
      $brand = $_POST['otherBrand'];
      //echo "New";
    } else {
      //echo "Old";
      $brand = $_POST['brand'];
      //echo $_POST['brand'];
    }

    $name = $_POST['name'];
    $sku = $_POST['sku'];
    $minInv = $_POST['minInv'];
    $totalSold = $_POST['totalSold'];
    $MAP = $_POST['MAP'];
    $landedCost = $_POST['landedCost'];
    $backordered = $_POST['backordered'];
    $dateAdded = $_POST['dateAdded'];
    $hidden = $_POST['hidden'];


    // Open DB Connection
    $conn = new mysqli($credentials['ServerName'], $credentials['Username'], $credentials['Password'], $credentials['Database']);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Construct SQL Query
    $sql = "INSERT INTO tbl_product (brand, name, sku, minInv, totalSold, MAP, landedCost, backordered, dateAdded, hidden) VALUES ('" . $brand . "', '" . $name . "', '" . $sku . "', '" . $minInv . "', '" . $totalSold . "', '" . $MAP . "', '" . $landedCost . "', '";
    $sql = $sql . $backordered . "', '" . $dateAdded . "', '" . $hidden . "')";

    //echo ($sql);
    // Query DB
    $result = $conn->query($sql);

    // Free resources and close DB Connection
    $conn->close();

    echo ($brand . " " . $name . " is fully inserted into the database");

  } else {
    echo "Nothing has been posted";
  }
?>
  </table>
</div>
</body>
</html>
