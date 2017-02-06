<?php
include_once("../assets/lib/libAmazonReports.php");
require_once('../authenticate.php');
//View Pending Orders
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
  <h1 id='reportTitle'>eBay Completed Orders</h1>
  <div  class="tbl-header">
  <table>
    <thead>
      <tr><td>ID</td><td>Item</td><td>Date Ordered</td><td>Date Paid</td><td>PayPal Transaction ID</td><td>Requested From WH</td><td>Received From WH</td><td>Date Shipped</td><td>Carrier</td><td>Tracking Number</td><td>Username</td><td>Name</td><td>Received By Customer</td><td>Invoice Number</td></tr>
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
      </tr>
    -->

      <?php
      $id = $result['id'][$i];

      $result = getEbayOrdersCompleted();
      $numRows = count($result['id']);

      for ($i = 0; $i < $numRows; $i = $i + 1) {
        echo "<tr>";
        echo "<td>" . $result['id'][$i] . "<input type='hidden' name='id[]' value='$id'>" . "</td>";
        echo "<td>" . $result['item_name'][$i] . "</td>";
        echo "<td>" . $result['date_ordered'][$i] . "</td>";
        echo "<td>" . $result['date_paid'][$i] . "</td>";
        echo "<td>" . $result['transaction_id'][$i] . "</td>";

        //wh_requested
        if ($result['wh_requested'][$i] != "Y") {
          echo "<td></td>";
        } else {
          echo "<td>" . "<button class='btn btn-block btn-sm btn-success btn-fill'>Requested</button>" . "</td>";
        }

        //wh_received
        if ($result['wh_received'][$i] != "Y") {
          echo "<td></td>";
        } else {
          echo "<td>" . "<button class='btn btn-block btn-sm btn-success btn-fill'>Received</button>" . "</td>";
        }

        echo "<td>" . $result['date_shipped'][$i] . "</td>";
        echo "<td>" . $result['carrier'][$i] . "</td>";
        echo "<td>" . $result['tracking_number'][$i] . "</td>";
        echo "<td>" . $result['username'][$i] . "</td>";
        echo "<td>" . $result['customer_name'][$i] . "</td>";

        //customer_received
        if ($result['customer_received'][$i] != "Y") {
          echo "<td></td>";
        } else {
          echo "<td>" . "<button class='btn btn-block btn-sm btn-success btn-fill'>Received</button>" . "</td>";
        }

        echo "<td>" . $result['invoice'][$i] . "</td>";
        echo "</tr>";
      }
      ?>



    </tbody>
  </table>
  </div>
</body>
</html>
