<?php

require_once('../authenticate.php');
include_once("../assets/lib/libAmazonReports.php");

echo "Hello World";

$jsonurl = "http://api.fixer.io/latest?base=CAD";
$json = file_get_contents($jsonurl);
debugDump(json_decode($json));

?>
