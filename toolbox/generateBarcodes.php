<?php
require_once('../authenticate.php');
include_once("../assets/lib/libAmazonReports.php");

$dir = "../assets/barcodes";
$files = scandir($dir);

//debugDump($files);

echo ("<table cellpadding='15'>");
echo ("<tr><td colspan='4'><h1><center>Amazon Catalog</center></h1></td></tr>");

for ($i = 0; $i < count($files); $i = $i + 1) {
  //if ($files[$i] != "." && $files[$i] != "..") {
  if (substr($files[$i], 0, 1) !== "." && $files[$i] !== "") {
    echo ("<tr>");
    echo ("<td><img alt='$files[$i]' src='$dir/$files[$i]'></td>");
    $i =  $i + 1;
    echo ("<td><img alt='$files[$i]' src='$dir/$files[$i]'></td>");
    $i =  $i + 1;
    echo ("<td><img alt='$files[$i]'  src='$dir/$files[$i]'></td>");
    $i =  $i + 1;
    echo ("<td><img alt='$files[$i]'  src='$dir/$files[$i]'></td>");
    echo ("</tr>");
  }
}

echo ("</table>");


?>
