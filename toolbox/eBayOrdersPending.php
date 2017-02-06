<?php
include_once("../assets/lib/libAmazonReports.php");
require_once('../authenticate.php');
//View Pending Orders

if ($_POST) {
  //echo "POST";

  $numRows = count($_POST['id']);

  for ($i = 0; $i < $numRows; $i = $i + 1) {
    $id = $_POST['id'][$i];
    //echo ($_POST['id'][$i]);

    if ($_POST['date_paid'][$id] != "") {
      // change value in db
      setEbayDatePaid($id, $_POST['date_paid'][$id]);
      //echo "date_paid";
    }

    if ($_POST['transaction_id'][$id] != "") {
      // change value in db
      setEbayTransactionID($id, $_POST['transaction_id'][$id]);
      //echo ($_POST['transaction_id'][$id]);
    }

    if ($_POST['wh_requested'][$id] != "") {
      // change value in db
      setEbayWHRequested($id);
    }

    if ($_POST['wh_received'][$id] != "") {
      // change value in db
      setEbayWHReceived($id);
    }

    if ($_POST['customer_received'][$id] != "") {
      // change value in db
      setEbayCustomerReceived($id);

    }

    if ($_POST['invoice'][$id] != "") {
      // change value in db
      setEbayInvoice($id, $_POST['invoice'][$id]);
    }

    if ($_POST['carrier'][$id] != "" && $_POST['tracking_number'][$id] != "" && $_POST['date_shipped'][$id] != "0000-00-00") {
      // change values in db
      //echo ($_POST['carrier'][$id]);
      //echo ($_POST['tracking_number'][$id]);
      //echo ($_POST['date_shipped'][$id]);
      setEbayCarrier($id, $_POST['carrier'][$id]);
      setEbayTrackingNumber($id, $_POST['tracking_number'][$id]);
      setEbayDateShipped($id, $_POST['date_shipped'][$id]);

    }
  }

//debugDump($_POST);
}

?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="tables.css">
  <link href="../bootstrap3/css/bootstrap.css" rel="stylesheet" />
<link href="../assets/css/gsdk.css" rel="stylesheet" />
  <link href="../assets/css/demo.css" rel="stylesheet" />

  <script src="../jquery/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="../assets/js/jquery-ui-1.10.4.custom.min.js" type="text/javascript"></script>

	<script src="../bootstrap3/js/bootstrap.js" type="text/javascript"></script>
	<script src="../assets/js/gsdk-checkbox.js"></script>
	<script src="../assets/js/gsdk-radio.js"></script>
	<script src="../assets/js/gsdk-bootstrapswitch.js"></script>
	<script src="../assets/js/get-shit-done.js"></script>

    <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>

  <!--     Font Awesome     -->
  <link href="../bootstrap3/css/font-awesome.css" rel="stylesheet">
  <link href='http://fonts.googleapis.com/css?family=Grand+Hotel' rel='stylesheet' type='text/css'>
</head>
<body>
  <h1 id='reportTitle'>eBay Pending Orders</h1>
  <form action='./eBayOrdersPending.php' method='post'>
  <div  class="tbl-header">
  <table>
    <thead>
      <tr><td>ID</td><td>Item</td><td>Date Ordered</td><td>Date Paid</td><td>PayPal Transaction ID</td><td>Requested From WH</td><td>Received From WH</td><td>Date Shipped</td><td>Carrier</td><td>Tracking Number</td><td>Username</td><td>Name</td><td>Completed</td><td>Invoice Number</td></tr>
    </thead>
  </table>
  </div>
  <div  class="tbl-content">
  <table>
    <tbody>
    <!--
      <tr>
        <td><a href='#' target='_blank'><button class="btn btn-block btn-sm btn-success btn-fill">World</button></td>
        <td><a href='#' target='_blank'><button class="btn btn-block btn-sm btn-info btn-fill">World</button></td>
        <td><a href='#' target='_blank'><button class="btn btn-block btn-sm btn-warning btn-fill">World</button></td>
        <td><a href='#' target='_blank'><button class="btn btn-block btn-sm btn-default btn-fill">World</button></td>
        <td><a href='#' target='_blank'><button class="btn btn-block btn-sm btn-danger btn-fill">World</button></td>
          <td><a href='#' target='_blank'><button class="btn btn-block btn-sm btn-success">World</button></td>
          <td><a href='#' target='_blank'><button class="btn btn-block btn-sm btn-info">World</button></td>
          <td><a href='#' target='_blank'><button class="btn btn-block btn-sm btn-warning">World</button></td>
          <td><a href='#' target='_blank'><button class="btn btn-block btn-sm btn-default">World</button></td>
          <td><a href='#' target='_blank'><button class="btn btn-block btn-sm btn-danger">World</button></td>
          <td><label class="checkbox ct-red" for="checkbox1"><input type="checkbox" value="" id="checkbox1" data-toggle="checkbox" checked ></label></td>
          <td><label class="checkbox ct-blue" for="checkbox2"><input type="checkbox" value="" id="checkbox2" data-toggle="checkbox" checked ></label></td>
          <td><label class="checkbox ct-orange" for="checkbox3"><input type="checkbox" value="" id="checkbox3" data-toggle="checkbox" checked ></label></td>
          <td><label class="checkbox ct-azzure" for="checkbox4"><input type="checkbox" value="" id="checkbox4" data-toggle="checkbox" checked ></label></td>
      </tr>
    -->
      <?php
        $result = getEbayOrdersPending();
        $numRows = count($result['id']);

        for ($i = 0; $i < $numRows; $i = $i + 1) {
          $id = $result['id'][$i];

          echo "<tr>";
          echo "<td>" . $result['id'][$i] . "<input type='hidden' name='id[]' value='$id'>" . "</td>";
          echo "<td>" . $result['item_name'][$i] . "</td>";
          echo "<td>" . $result['date_ordered'][$i] . "</td>";

          //echo "<td>" . $result['date_paid'][$i] . "</td>";

          //date_shipped
          if ($result['date_paid'][$i] == "0000-00-00") {
            echo "<td>" . "<div class='form-group'><input type='text' name='date_paid[$id]' size=12 class='form-control' />" . "</td>";
          } else {
            echo "<td>" . $result['date_paid'][$i] . "</td>";
          }

          //echo "<td>" . $result['transaction_id'][$i] . "</td>";

          //trasaction_id
          if ($result['transaction_id'][$i] == 0 || $result['transaction_id'] == "") {
            echo "<td>" . "<div class='form-group'><input type='text' name='transaction_id[$id]' size=20 class='form-control' /></div>" . "</td>";
          } else {
            echo "<td>" . $result['transaction_id'][$i] . "</td>";
          }

          //wh_requested
          if ($result['wh_requested'][$i] != "Y") {
            //echo "<td>" . "<a href='eBayOrdersPending.php?wh_requested=$id' target='_blank'><button class='btn btn-block btn-sm btn-info btn-fill' name='wh_requested'>Request</button>" . "</td>";
            echo "<td>" . "<input name='wh_requested[$id]' type='checkbox' data-toggle='switch' class='ct-green'/>" . "</td>";
          } else {
            echo "<td>" . "<button class='btn btn-block btn-sm btn-success btn-fill'>Received</button>" . "</td>";
          }

          //wh_received
          if ($result['wh_received'][$i] != "Y") {
            echo "<td>" . "<input name='wh_received[$id]' type='checkbox' data-toggle='switch' class='ct-green'/>" . "</td>";
          } else {
            echo "<td>" . "<button class='btn btn-block btn-sm btn-success btn-fill'>Received</button>" . "</td>";
          }

          //date_shipped
          if ($result['date_shipped'][$i] == "0000-00-00") {
            echo "<td>" . "<div class='form-group'><input type='text' name='date_shipped[$id]' size=12 class='form-control' />" . "</td>";
          } else {
            echo "<td>" . $result['date_shipped'][$i] . "</td>";
          }

          //carrier
          if ($result['carrier'][$i] == "") {
            echo "<td>" . "<div class='form-group'><input type='text' name='carrier[$id]' size=10 class='form-control' /></div>" . "</td>";
          } else {
            echo "<td>" . $result['carrier'][$i] . "</td>";
          }

          //tracking_number
          if ($result['tracking_number'][$i] == "") {
            echo "<td>" . "<div class='form-group'><input type='text' name='tracking_number[$id]' size=20 class='form-control' /></div>" . "</td>";
          } else {
            echo "<td>" . $result['tracking_number'][$i] . "</td>";
          }

          echo "<td>" . $result['username'][$i] . "</td>";
          echo "<td>" . $result['customer_name'][$i] . "</td>";

          //customer_received
          if ($result['customer_received'][$i] != "Y") {
            echo "<td>" . "<input name='customer_received[$id]' type='checkbox' data-toggle='switch' class='ct-green'/>" . "</td>";
          } else {
            echo "<td>" . "<button class='btn btn-block btn-sm btn-success'>Received</button>" . "</td>";
          }

          //invoice
          if ($result['invoice'][$i] == 0) {
            echo "<td>" . "<div class='form-group'><input type='text' name='invoice[$id]' size=20 class='form-control' /></div>" . "</td>";
          } else {
            echo "<td>" . $result['invoice'][$i] . "</td>";
          }

          echo "</tr>";
        }

        //submit
        echo "<tr><td colspan=14><input type='submit' value='Submit'></td></tr>";

      ?>
    </tbody>
  </table>
  </div>
</form>
</body>
</html>
