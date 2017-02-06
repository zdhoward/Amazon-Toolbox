<?php

include_once("../assets/lib/libAmazonReports.php");

global $credentials;

//$response = $_POST['brand'] . " " . $_POST['name'] . " has been sucessfully updated.";
//echo ($sql . "<hr>" . $response);


if ($_POST) {

  //debugDump($_POST);

  // Open DB Connection
  $conn = new mysqli($credentials['ServerName'], $credentials['Username'], $credentials['Password'], $credentials['Database']);

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  // update DB with new totalSold
  $sql = "UPDATE tbl_product SET brand='" . $_POST['brand'] . "', name='" . $_POST['name'] . "', minInv='" . $_POST['minInv'] . "', totalSold='" . $_POST['totalSold'] . "', MAP='" . $_POST['MAP'] . "', landedCost='" . $_POST['landedCost'] . "', backordered='" . $_POST['backordered'] . "' WHERE sku='" . $_POST['sku'] . "'";

  // Query DB
  $result = $conn->query($sql);

  // Free resources and close DB Connection
  $conn->close();

  // show response
  $response = $_POST['brand'] . " " . $_POST['name'] . " has been sucessfully updated.";
  echo ($response);
}

?>
