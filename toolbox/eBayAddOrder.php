<?php
include_once("../assets/lib/libAmazonReports.php");
require_once('../authenticate.php');
//Add Order Page
  //Form:
    //Item Name
    //Date Ordered (Autofill with timestamp)
    //Paid Yet? (Y/N)
      //If yes, Transaction ID?
      //Make timestamp the same as date ordered
      $timestamp = date('Y-m-d');
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="tables.css">
</head>
<body>
  <h1 id='reportTitle'>Add eBay Order</h1>
  <form method='post' action="eBayAddOrderSubmit.php">
    <table>
      <tbody>
        <tr><td>Item Name</td><td><input type="text" name="item_name"></td></tr>
        <tr><td>Date Ordered</td><td><input type="text" name="date_ordered" value=<?php echo $timestamp; ?>></td></tr>
        <tr><td>Paid?</td><td><select name="paid"><option value="n">No</option><option value="Y">Yes</option></select></td></tr>
        <tr><td>Transaction ID</td><td><input type="text" name="transaction_id"></td></tr>
        <tr><td>Username</td><td><input type="text" name="username"></td></tr>
        <tr><td>Name</td><td><input type="text" name="name"></td></tr>
        <tr><td colspan=2><input type="submit" value="Submit"></td></tr>
      </tbody>
    </table>
  </form>
</body>
</html>
