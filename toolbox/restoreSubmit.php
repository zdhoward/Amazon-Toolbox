<?php
include_once("../assets/lib/libAmazonReports.php");
require_once('../authenticate.php');

  //restore();

  if ($_POST) {
    restore($_POST['file']);
  }
?>
