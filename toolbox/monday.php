<?php
require_once('../authenticate.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="tables.css">
    <script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
    <style>
      table tr.active td {background: #090;}
    </style>
    <script>
    $(document).ready(function(){
      $(".rowClick").children("tbody").children("tr").children("td").click(function(){
          $(this.parentNode).toggleClass("active");
      });
    });
    </script>
  </head>
  <body>
    <h1 id='reportTitle'>TODO - Mondays</h1>
    <!-- <table class='rowClick'> -->
    <div  class="tbl-header">
    <table>
      <thead>
        <tr><td>Step</td><td>Action</td></tr>
      </thead>
    </table>
  </div>
  <div  class="tbl-content">
    <table class='rowClick'>
      <tbody>
        <tr id='one' onclick=''><td>Step 1</td><td><a href='http://savedbytechnology.com/catalog/clearance_demo_used.php' target='_blank'>Generate New Listing</a></td></tr>
        <tr id='two'><td>Step 2</td><td><a href='https://www.kijiji.ca/m-my-ads.html#/EXPIRED' target='_blank'>Renew Kijiji Listing</a></td></tr>
        <tr id='three'><td>Step 3</td><td><a href='http://savedbytechnology.com/catalog/clearance_demo_used.php' target='_blank'>Generate New Listing</a></td></tr>
        <tr id='four'><td>Step 4</td><td><a href='https://accounts.craigslist.org/login/home?lang=en&cc=us&filter_active=inactive&filter_cat=0&show_tab=postings' target='_blank'>Renew Craigslist Listing</a></td></tr>
        <tr id='five'><td>Step 5</td><td><a href='https://sellercentral.amazon.ca/gp/orders-v2/list?ie=UTF8&ref_=ag_myo_dnav_xx_&' target='_blank'>Add Total Sold</a></td></tr>
        <tr id='six'><td>Step 6</td><td>Check Amazon Inventory</td></tr>
        <tr id='seven'><td>Step 7</td><td><a href='https://sellercentral.amazon.ca/gp/ssof/knights/items-list.html/ref=ag_fbamnginv_dnav_xx_' target='_blank'>Prepare New Amazon Shipment</a></td></tr>
        <tr id='eight'><td>Step 8</td><td>Generate Amazon Report</td></tr>
        <tr id='nine'><td>Step 9</td><td>Check Amazon Inventory For What Needs To Be Ordered</td></tr>
      </tbody>
    </table>
  </div>
  </body>
</html>
