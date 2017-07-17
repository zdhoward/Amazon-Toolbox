<?php
include_once("../assets/lib/libAmazonReports.php");
require_once('../authenticate.php');

if ($_POST) {
  //debugDump($_POST);

  $item = $_POST['item_name'];
  $date = $_POST['date_ordered'];
  $user = $_POST['username'];
  $name = $_POST['name'];

  $paid = $_POST['paid'];

  if ($paid == "Y") {
    $trans = $_POST['transaction_id'];
  } else {
    $trans = "";
  }


 if ($_POST['paid'] == "Y") {
   $insert = "INSERT INTO ebay_orders (item_name, date_ordered, date_paid, transaction_id, username, customer_name)
   VALUES ('$item', '$date', '$date', '$trans', '$user', '$name');";
 } else {
   $insert = "INSERT INTO ebay_orders (item_name, date_ordered, username, customer_name)
   VALUES ('$item', '$date', '$user', '$name');";
 }

//echo ($item . " " . $date . " " . $user . " " . $name . " " . $paid . " " . $trans);

//echo ("<br />");

//echo $insert;

addEbayOrder($insert);

//echo ("eBay Order Added!");
header('Location: eBayOrdersPending.php');
}
?>
