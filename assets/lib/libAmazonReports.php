<?php

  /*
      Title: Amazon Report Library
     Author: Zach Howard
       Date: May 10, 2016
    Version: 0.4
  */

  include_once(".credentials.php");

    ///////////////////
   //      TEST     //
  ///////////////////

  //$SKUs = getAllSKUs();

  //echo "Test <hr />";

  // Working functions
  //
  // SQL functions
  // getAllSKUs();
  // getBrand("HJ-BSX4-GNRT");
  // getName("HJ-BSX4-GNRT");
  // getMinimumInventory("HJ-BSX4-GNRT");
  // getTotalSold("HJ-BSX4-GNRT");
  // getMAP("9D-6LUM-98ZI");
  // getLandedCost("9D-6LUM-98ZI");
  //
  // API functions
  // getAllFBAInventory($sku);
  // getFulfillable($id)

/*
  $id = "S9-CLBC-U3T1"; // Yamaha MG06X
  $name = getName($id);
  $brand = getBrand($id);
  echo ($brand . " " . $name . "<br />");
  $qty = getNeeded($id);
  $qty2 = getFulfillable($id);
  $qty3 = getMinimumInventory($id);
  echo ("Needed: " . $qty . "<br />");
  echo ("Qty: " . $qty2 . "<br />");
  echo ("Min: " . $qty3);
*/

    ///////////////////////////////
   //      Database Helpers     //
  ///////////////////////////////

  function backup() {
    global $credentials;

    // Open DB Connection
    $conn = new mysqli($credentials['ServerName'], $credentials['Username'], $credentials['Password'], $credentials['Database']);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $location = '/Applications/MAMP/db/bak/' . date('Y:m:d_H-i-s') . '_products.sql';
    //$location = $credentials['BackupLocation'] . '/products.sql';

    // update DB with new totalSold
    $sql = "SELECT * INTO OUTFILE '$location' FROM tbl_product";

    // Query DB
    $result = $conn->query($sql);

    if ($result !== "") {
    echo "Backed up data successfully\n";
  } else {
    echo ("Backup failed");
  }

    // Free resources and close DB Connection
    $conn->close();
  }

  function restore($file) {
    global $credentials;

    // Open DB Connection
    $conn = new mysqli($credentials['ServerName'], $credentials['Username'], $credentials['Password'], $credentials['Database']);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    //$location = '/Applications/MAMP/db/bak/' . date('Y:m:d_H-is') . '_products.sql';
    $location = $credentials['BackupLocation'] . "/" . $file;

    // update DB with new totalSold
    //$sql = "SELECT * INTO OUTFILE '$location' FROM tbl_product";
    $sql = "LOAD DATA INFILE '$location' INTO TABLE tbl_product";

    // Query DB
    $result = $conn->query($sql);

    if ($result !== "") {
    echo "Restored data successfully\n";
  } else {
    echo ("Restore failed");
  }

    // Free resources and close DB Connection
    $conn->close();
  }

    ////////////////////////
   //      ACCESSORS     //
  ////////////////////////

  function setEbayDateShipped($id, $date) {
      global $credentials;

      // Open DB Connection
      $conn = new mysqli($credentials['ServerName'], $credentials['Username'], $credentials['Password'], $credentials['Database']);

      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      // update DB with new totalSold
      $sql = "UPDATE ebay_orders SET date_shipped='" . $date . "' WHERE id='" . $id . "'";

      // Query DB
      $result = $conn->query($sql);

      // Free resources and close DB Connection
      $conn->close();
  }

  function setEbayDatePaid($id, $date) {
      global $credentials;

      // Open DB Connection
      $conn = new mysqli($credentials['ServerName'], $credentials['Username'], $credentials['Password'], $credentials['Database']);

      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      // update DB with new totalSold
      $sql = "UPDATE ebay_orders SET date_paid='" . $date . "' WHERE id='" . $id . "'";

      // Query DB
      $result = $conn->query($sql);

      // Free resources and close DB Connection
      $conn->close();
  }

  function setEbayTransactionID($id, $trans) {
      global $credentials;

      // Open DB Connection
      $conn = new mysqli($credentials['ServerName'], $credentials['Username'], $credentials['Password'], $credentials['Database']);

      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      // update DB with new totalSold
      $sql = "UPDATE ebay_orders SET transaction_id='" . $trans . "' WHERE id='" . $id . "'";

      // Query DB
      $result = $conn->query($sql);

      // Free resources and close DB Connection
      $conn->close();
  }

  function setEbayCarrier($id, $carrier) {
      global $credentials;

      // Open DB Connection
      $conn = new mysqli($credentials['ServerName'], $credentials['Username'], $credentials['Password'], $credentials['Database']);

      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      // update DB with new totalSold
      $sql = "UPDATE ebay_orders SET carrier='" . $carrier . "' WHERE id='" . $id . "'";

      // Query DB
      $result = $conn->query($sql);

      // Free resources and close DB Connection
      $conn->close();
  }

  function setEbayTrackingNumber($id, $tracking) {
      global $credentials;

      // Open DB Connection
      $conn = new mysqli($credentials['ServerName'], $credentials['Username'], $credentials['Password'], $credentials['Database']);

      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      // update DB with new totalSold
      $sql = "UPDATE ebay_orders SET tracking_number='" . str_replace(' ', '', $tracking) . "' WHERE id='" . $id . "'";

      // Query DB
      $result = $conn->query($sql);

      // Free resources and close DB Connection
      $conn->close();
  }

  function setEbayInvoice($id, $invoice) {
      global $credentials;

      // Open DB Connection
      $conn = new mysqli($credentials['ServerName'], $credentials['Username'], $credentials['Password'], $credentials['Database']);

      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      // update DB with new totalSold
      $sql = "UPDATE ebay_orders SET invoice='" . $invoice . "' WHERE id='" . $id . "'";

      // Query DB
      $result = $conn->query($sql);

      // Free resources and close DB Connection
      $conn->close();
  }

  function setEbayWHRequested($id) {
      global $credentials;

      // Open DB Connection
      $conn = new mysqli($credentials['ServerName'], $credentials['Username'], $credentials['Password'], $credentials['Database']);

      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      // update DB with new totalSold
      $sql = "UPDATE ebay_orders SET wh_requested='Y' WHERE id='" . $id . "'";

      // Query DB
      $result = $conn->query($sql);

      // Free resources and close DB Connection
      $conn->close();
  }

  function setEbayWHReceived($id) {
      global $credentials;

      // Open DB Connection
      $conn = new mysqli($credentials['ServerName'], $credentials['Username'], $credentials['Password'], $credentials['Database']);

      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      // update DB with new totalSold
      $sql = "UPDATE ebay_orders SET wh_received='Y' WHERE id='" . $id . "'";

      // Query DB
      $result = $conn->query($sql);

      // Free resources and close DB Connection
      $conn->close();
  }

  function setEbayCustomerReceived($id) {
      global $credentials;

      // Open DB Connection
      $conn = new mysqli($credentials['ServerName'], $credentials['Username'], $credentials['Password'], $credentials['Database']);

      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      // update DB with new totalSold
      $sql = "UPDATE ebay_orders SET customer_received='Y' WHERE id='" . $id . "'";

      // Query DB
      $result = $conn->query($sql);

      // Free resources and close DB Connection
      $conn->close();
  }

  function getEbayOrdersCompleted() {
    global $credentials;
    $ret = array();
    $id = array();
    $item_name = array();
    $date_ordered = array();
    $date_paid = array();
    $transaction_id = array();
    $wh_requested = array();
    $wh_received = array();
    $date_shipped = array();
    $carrier = array();
    $tracking_number = array();
    $username = array();
    $customer_name = array();
    $customer_received = array();
    $invoice = array();

    // Open DB Connection
    $conn = new mysqli($credentials['ServerName'], $credentials['Username'], $credentials['Password'], $credentials['Database']);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Construct SQL Query
    $sql = "SELECT * FROM ebay_orders WHERE customer_received='Y' ORDER BY id DESC";

    // Query DB
    $result = $conn->query($sql);

    // Decipher response
    //item_name
    while ($row = $result->fetch_assoc()) {
      array_push($id, $row['id']);
      array_push($item_name, $row['item_name']);
      array_push($date_ordered, $row['date_ordered']);
      array_push($date_paid, $row['date_paid']);
      array_push($transaction_id, $row['transaction_id']);
      array_push($wh_requested, $row['wh_requested']);
      array_push($wh_received, $row['wh_received']);
      array_push($date_shipped, $row['date_shipped']);
      array_push($carrier, $row['carrier']);
      array_push($tracking_number, $row['tracking_number']);
      array_push($username, $row['username']);
      array_push($customer_name, $row['customer_name']);
      array_push($customer_received, $row['customer_received']);
      array_push($invoice, $row['invoice']);
    }

    //array_push($ret, $item_name);
    $ret['id'] = $id;
    $ret['item_name'] = $item_name;
    $ret['date_ordered'] = $date_ordered;
    $ret['date_paid'] = $date_paid;
    $ret['transaction_id'] = $transaction_id;
    $ret['wh_requested'] = $wh_requested;
    $ret['wh_received'] = $wh_received;
    $ret['date_shipped'] = $date_shipped;
    $ret['carrier'] = $carrier;
    $ret['tracking_number'] = $tracking_number;
    $ret['username'] = $username;
    $ret['customer_name'] = $customer_name;
    $ret['customer_received'] = $customer_received;
    $ret['invoice'] = $invoice;

    // Free resources and close DB Connection
    $conn->close();

    return $ret;

  }

  function getEbayOrdersPending() {
    global $credentials;
    $ret = array();
    $id = array();
    $item_name = array();
    $date_ordered = array();
    $date_paid = array();
    $transaction_id = array();
    $wh_requested = array();
    $wh_received = array();
    $date_shipped = array();
    $carrier = array();
    $tracking_number = array();
    $username = array();
    $customer_name = array();
    $customer_received = array();
    $invoice = array();

    // Open DB Connection
    $conn = new mysqli($credentials['ServerName'], $credentials['Username'], $credentials['Password'], $credentials['Database']);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Construct SQL Query
    $sql = "SELECT * FROM ebay_orders WHERE customer_received!='Y' ORDER BY id ASC";

    // Query DB
    $result = $conn->query($sql);

    // Decipher response
    //item_name
    while ($row = $result->fetch_assoc()) {
      array_push($id, $row['id']);
      array_push($item_name, $row['item_name']);
      array_push($date_ordered, $row['date_ordered']);
      array_push($date_paid, $row['date_paid']);
      array_push($transaction_id, $row['transaction_id']);
      array_push($wh_requested, $row['wh_requested']);
      array_push($wh_received, $row['wh_received']);
      array_push($date_shipped, $row['date_shipped']);
      array_push($carrier, $row['carrier']);
      array_push($tracking_number, $row['tracking_number']);
      array_push($username, $row['username']);
      array_push($customer_name, $row['customer_name']);
      array_push($customer_received, $row['customer_received']);
      array_push($invoice, $row['invoice']);
    }

    //array_push($ret, $item_name);
    $ret['id'] = $id;
    $ret['item_name'] = $item_name;
    $ret['date_ordered'] = $date_ordered;
    $ret['date_paid'] = $date_paid;
    $ret['transaction_id'] = $transaction_id;
    $ret['wh_requested'] = $wh_requested;
    $ret['wh_received'] = $wh_received;
    $ret['date_shipped'] = $date_shipped;
    $ret['carrier'] = $carrier;
    $ret['tracking_number'] = $tracking_number;
    $ret['username'] = $username;
    $ret['customer_name'] = $customer_name;
    $ret['customer_received'] = $customer_received;
    $ret['invoice'] = $invoice;

    // Free resources and close DB Connection
    $conn->close();

    return $ret;

  }

  function setSKUByID($id, $sku) {
    global $credentials;

    // Open DB Connection
    $conn = new mysqli($credentials['ServerName'], $credentials['Username'], $credentials['Password'], $credentials['Database']);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // update DB with new totalSold
    $sql = "UPDATE tbl_product SET sku='" . $sku . "' WHERE id='" . $id . "'";

    // Query DB
    $result = $conn->query($sql);

    // Free resources and close DB Connection
    $conn->close();

  }

  function getNameByID($id) {
    global $credentials;
    $name = "";

    // Open DB Connection
    $conn = new mysqli($credentials['ServerName'], $credentials['Username'], $credentials['Password'], $credentials['Database']);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // select all DISTINCT occurrances of brand
    $sql = "SELECT brand, name FROM tbl_product WHERE id='" . $id . "'";

    // Query DB
    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {
      //array_push($brands, $row['brand']);
      $name = $row['brand'] . " " . $row['name'];
    }

    // Free resources and close DB Connection
    $conn->close();


    return $name;
  }

  function getBrandList() {
      global $credentials;
      $brands = array();

      // Open DB Connection
      $conn = new mysqli($credentials['ServerName'], $credentials['Username'], $credentials['Password'], $credentials['Database']);

      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      // select all DISTINCT occurrances of brand
      $sql = "SELECT DISTINCT brand FROM tbl_product WHERE 1=1 ORDER BY brand";

      // Query DB
      $result = $conn->query($sql);

      // Decipher response
      while ($row = $result->fetch_assoc()) {
        array_push($brands, $row['brand']);
      }

      // Free resources and close DB Connection
      $conn->close();


      return $brands;
  }

  function setName($sku, $newName) {
    global $credentials;

    // Open DB Connection
    $conn = new mysqli($credentials['ServerName'], $credentials['Username'], $credentials['Password'], $credentials['Database']);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // update DB with new totalSold
    $sql = "UPDATE tbl_product SET name='" . $newName . "' WHERE sku='" . $sku . "'";

    // Query DB
    $result = $conn->query($sql);

    // Free resources and close DB Connection
    $conn->close();

  }

  // Add quantity to total Sold
  function addTotalSold($sku, $qty) {
      global $credentials;

      $totalSold = getTotalSold($sku);
      $totalSold += $qty;

      // Open DB Connection
      $conn = new mysqli($credentials['ServerName'], $credentials['Username'], $credentials['Password'], $credentials['Database']);

      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      // update DB with new totalSold
      $sql = "UPDATE tbl_product SET totalSold='" . $totalSold . "' WHERE sku='" . $sku . "'";

      // Query DB
      $result = $conn->query($sql);

      // Free resources and close DB Connection
      $conn->close();
  }

  // Add quantity to Backordered
  function addBackordered($sku, $qty) {
      global $credentials;

      $backordered = getBackordered($sku);
      $backordered += $qty;

      // Open DB Connection
      $conn = new mysqli($credentials['ServerName'], $credentials['Username'], $credentials['Password'], $credentials['Database']);

      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      // update DB with new totalSold
      $sql = "UPDATE tbl_product SET backordered='" . $backordered . "' WHERE sku='" . $sku . "'";

      // Query DB
      $result = $conn->query($sql);

      // Free resources and close DB Connection
      $conn->close();
  }

  // Remove quantity from Backordered
  function removeBackordered($sku, $qty) {
      global $credentials;

      $backordered = getBackordered($sku);
      $backordered -= $qty;

      // Open DB Connection
      $conn = new mysqli($credentials['ServerName'], $credentials['Username'], $credentials['Password'], $credentials['Database']);

      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      // update DB with new totalSold
      $sql = "UPDATE tbl_product SET backordered='" . $backordered . "' WHERE sku='" . $sku . "'";

      // Query DB
      $result = $conn->query($sql);

      // Free resources and close DB Connection
      $conn->close();
  }

  // Set MAP price
  function setMAP($sku, $amt) {
      global $credentials;

      // Open DB Connection
      $conn = new mysqli($credentials['ServerName'], $credentials['Username'], $credentials['Password'], $credentials['Database']);

      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      // update DB with new totalSold
      $sql = "UPDATE tbl_product SET MAP='" . $amt . "' WHERE sku='" . $sku . "'";

      // Query DB
      $result = $conn->query($sql);

      // Free resources and close DB Connection
      $conn->close();
  }

  function addEbayOrder($insert) {
      global $credentials;

      // Open DB Connection
      $conn = new mysqli($credentials['ServerName'], $credentials['Username'], $credentials['Password'], $credentials['Database']);

      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      // update $sql with $insert
      $sql = $insert;

      // Query DB
      $result = $conn->query($sql);

      // Free resources and close DB Connection
      $conn->close();
  }

  // Set Landed Cost
  function setLandedCost($sku, $amt) {
      global $credentials;

      // Open DB Connection
      $conn = new mysqli($credentials['ServerName'], $credentials['Username'], $credentials['Password'], $credentials['Database']);

      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      // update DB with new totalSold
      $sql = "UPDATE tbl_product SET landedCost='" . $amt . "' WHERE sku='" . $sku . "'";

      // Query DB
      $result = $conn->query($sql);

      // Free resources and close DB Connection
      $conn->close();
  }

  // Set Minimum Inventory
  function setMinimumInventory($sku, $qty) {
      global $credentials;

      // Open DB Connection
      $conn = new mysqli($credentials['ServerName'], $credentials['Username'], $credentials['Password'], $credentials['Database']);

      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      // update DB with new totalSold
      $sql = "UPDATE tbl_product SET minInv='" . $qty . "' WHERE sku='" . $sku . "'";

      // Query DB
      $result = $conn->query($sql);

      // Free resources and close DB Connection
      $conn->close();
  }

  // get all SKUs
  function getAllSKUs() {
    global $credentials;
    $SKUs = array();

    // Open DB Connection
    $conn = new mysqli($credentials['ServerName'], $credentials['Username'], $credentials['Password'], $credentials['Database']);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Construct SQL Query
    $sql = "SELECT sku FROM tbl_product WHERE sku IS NOT NULL ORDER BY brand ASC, name ASC";

    // Query DB
    $result = $conn->query($sql);

    // Decipher response
    while ($row = $result->fetch_assoc()) {
      array_push($SKUs, $row['sku']);
    }

    // Free resources and close DB Connection
    $conn->close();

    return $SKUs;

  }

  // Get all empty SKUs
  function getEmptySKUs() {
    global $credentials;
    $SKUs = array();

    // Open DB Connection
    $conn = new mysqli($credentials['ServerName'], $credentials['Username'], $credentials['Password'], $credentials['Database']);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Construct SQL Query
    $sql = "SELECT id, brand, name, MAP, minInv FROM tbl_product WHERE (sku='' OR sku IS NULL) AND hidden='0' ORDER BY brand ASC, name ASC";

    // Query DB
    $result = $conn->query($sql);

    //echo "Hello World";

    // Decipher response
    while ($row = $result->fetch_assoc()) {
      $product = array('id'=>$row['id'], 'brand'=>$row['brand'], 'name'=>$row['name'], 'MAP'=>$row['MAP'], 'minInv'=>$row['minInv']);
      array_push($SKUs, $product);
    }

    // Free resources and close DB Connection
    $conn->close();

    return $SKUs;



  }

  // Get all unhidden SKUs
  function getSKUs() {
    global $credentials;
    $SKUs = array();

    // Open DB Connection
    $conn = new mysqli($credentials['ServerName'], $credentials['Username'], $credentials['Password'], $credentials['Database']);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Construct SQL Query
    $sql = "SELECT sku FROM tbl_product WHERE hidden='0' AND sku IS NOT NULL ORDER BY brand ASC, name ASC";

    // Query DB
    $result = $conn->query($sql);

    // Decipher response
    while ($row = $result->fetch_assoc()) {
      array_push($SKUs, $row['sku']);
    }

    // Free resources and close DB Connection
    $conn->close();

    return $SKUs;

  }

  // Get all hidden SKUs
  function getHiddenSKUs() {
    global $credentials;
    $SKUs = array();

    // Open DB Connection
    $conn = new mysqli($credentials['ServerName'], $credentials['Username'], $credentials['Password'], $credentials['Database']);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Construct SQL Query
    $sql = "SELECT sku FROM tbl_product WHERE hidden='1' AND sku IS NOT NULL ORDER BY brand ASC, name ASC";

    // Query DB
    $result = $conn->query($sql);

    // Decipher response
    while ($row = $result->fetch_assoc()) {
      array_push($SKUs, $row['sku']);
    }

    // Free resources and close DB Connection
    $conn->close();

    return $SKUs;

  }

  // get All FBA inventory from amazon
  function getAllFBAInventory($sku) {
    global $credentials;
    $allInv = "";

    // Query Amazon API
    $fulfillable = getFBAQtyBySKU($sku);

    $allInv = $fulfillable["TotalSupplyQuantity"];

    return $allInv;

  }

  function getASIN($sku){
    global $credentials;
    $ASIN = "";

    $fulfillable = getFBAQtyBySKU($sku);

    $ASIN = $fulfillable["ASIN"];

    return $ASIN;
  }

  // get the Brand of the product
  function getBrand($sku) {
    global $credentials;
    $brand = "";

    // Open DB Connection
    $conn = new mysqli($credentials['ServerName'], $credentials['Username'], $credentials['Password'], $credentials['Database']);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Construct SQL Query
    $sql = "SELECT brand FROM tbl_product WHERE sku='" . $sku . "'";


    // Query DB
    $result = $conn->query($sql);

    // Decipher response
    while ($row = $result->fetch_assoc()) {
      $brand = $row['brand'];
    }

    // Free resources and close DB Connection
    $conn->close();

    return $brand;

  }

  // get the Name of the product
  function getName($sku) {
    global $credentials;
    $name = "";

    // Open DB Connection
    $conn = new mysqli($credentials['ServerName'], $credentials['Username'], $credentials['Password'], $credentials['Database']);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Construct SQL Query
    $sql = "SELECT name FROM tbl_product WHERE sku='" . $sku . "'";


    // Query DB
    $result = $conn->query($sql);

    // Decipher response
    while ($row = $result->fetch_assoc()) {
      $name = $row['name'];
    }

    // Free resources and close DB Connection
    $conn->close();

    return $name;

  }

  // get the Fulfillable inventory from amazonservices
  function getFulfillable($sku) {
    global $credentials;
    $fulfillable = "";

    // Query Amazon API
    $fulfillable = getFBAQtyBySKU($sku);

    return $fulfillable["InStockSupplyQuantity"];
    //return $fulfillable["TotalSupplyQuantity"];

  }

  // get the Fulfillable inventory from amazonservices
  function getReserved($sku) {
    global $credentials;
    $fulfillable = "";

    // Query Amazon API
    $fulfillable = getFBAQtyBySKU($sku);
    $inbound = getInbound($sku);

    //return $fulfillable["InStockSupplyQuantity"];
    return ($fulfillable["TotalSupplyQuantity"] - ($fulfillable["InStockSupplyQuantity"] + $inbound));

  }

  // get the Minimum inventory
  function getMinimumInventory($sku) {
    global $credentials;
    $minInv = "";

    // Open DB Connection
    $conn = new mysqli($credentials['ServerName'], $credentials['Username'], $credentials['Password'], $credentials['Database']);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Construct SQL Query
    $sql = "SELECT minInv FROM tbl_product WHERE sku='" . $sku . "'";


    // Query DB
    $result = $conn->query($sql);

    // Decipher response
    while ($row = $result->fetch_assoc()) {
      $minInv = $row['minInv'];
    }

    // Free resources and close DB Connection
    $conn->close();

    return $minInv;

  }

  // get the Needed inventory
  function getNeeded($sku) {
    global $credentials;
    $needed = 0;

    $inbound = getInbound($sku);
    $fulfillable = getFulfillable($sku);
    $minInventory = getMinimumInventory($sku);
    $reserved = getReserved($sku);

/*
    if (($needed = $minInventory - $fulfillable) < 0) {
      $needed = 0;
    }
*/
    $needed = $minInventory - ($fulfillable + $inbound + $reserved);

    return $needed;

  }

  // get Inbound inventory
  function getInbound($sku) {
    global $credentials;
    $inbound = 0;

    // Query Amazon API
    //$allInv = getAllFBAInventory($sku);
    $inv = getFBAQtyBySKU($sku);

    $inv = $inv['SupplyDetail']['member'];

    foreach ($inv as $member) {
      if ($member['SupplyType'] == "Inbound") {
        $inbound += $member['Quantity'];
      }
    }

    //var_dump($allInv);

    //$inbound = $allInv["TotalSupplyQuantity"] - $allInv["InStockSupplyQuantity"];

    //$inbound = $allInv["SupplyDetail"]["SupplyType"]["Inbound"];

    //printf("print_r():<pre>%s</pre>", print_r($inbound, TRUE));

    //printf("var_export():<pre>%s</pre>", var_export($allInv, TRUE));

    //print 'var_dump():<pre>';
    //var_dump($inbound);
    //print '</pre>';


    return $inbound;

  }

  // get Total Sold
  function getTotalSold($sku) {
    global $credentials;
    $totalSold = "";

    // Open DB Connection
    $conn = new mysqli($credentials['ServerName'], $credentials['Username'], $credentials['Password'], $credentials['Database']);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Construct SQL Query
    $sql = "SELECT totalSold FROM tbl_product WHERE sku='" . $sku . "'";


    // Query DB
    $result = $conn->query($sql);

    // Decipher response
    while ($row = $result->fetch_assoc()) {
      $totalSold = $row['totalSold'];
    }

    // Free resources and close DB Connection
    $conn->close();

    return $totalSold;

  }

  // get Buy Box Status
  function getBuyBox($sku) {
    global $credentials;
    $buyBox = "";

    // Query Amazon API
    $xml = getCompetitivePricingForSKU($sku);

    if ($xml->CompetitivePrices->CompetitivePrice){
      $buyBox = $xml->CompetitivePrices->CompetitivePrice->attributes()->belongsToRequester;
    } else {
      $buyBox = "No Buy Box";
    }

    return $buyBox;

  }

  // get Lowest Advertised Price on Amazon
  function getLowestPrice($sku) {
    global $credentials;
    $lowPrice = "";

    $lowPrice = GetLowestPricedOffersForSKU($sku);

    if ($lowPrice == "") {
      $lowPrice = GetLowestPricedOffersForSKU($sku);
      if ($lowPrice == "") {
        $xml = getCompetitivePricingForSKU($sku);
        $lowPrice = $xml->CompetitivePrices->CompetitivePrice->Price->ListingPrice->Amount;
        if ($lowPrice == "" || $lowPrice == "No Winner" || $lowPrice == "No Info") {
          $lowPrice = "Not Found";
        }
      }
    }

/*
    // Query Amazon API
    $xml = getCompetitivePricingForSKU($sku);

    if ($xml->CompetitivePrices->CompetitivePrice->Price->ListingPrice->Amount) {
      $lowPrice = $xml->CompetitivePrices->CompetitivePrice->Price->ListingPrice->Amount;
    } else {
      $lowPrice = "No Info";
      //printf("print_r():<pre>%s</pre>", print_r($xml, TRUE));
    }
*/

    return $lowPrice;

  }

  // get MAP Pricing
  function getMAP($sku) {
    global $credentials;
    $MAP = "";

    // Open DB Connection
    $conn = new mysqli($credentials['ServerName'], $credentials['Username'], $credentials['Password'], $credentials['Database']);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Construct SQL Query
    $sql = "SELECT MAP FROM tbl_product WHERE sku='" . $sku . "'";


    // Query DB
    $result = $conn->query($sql);

    // Decipher response
    while ($row = $result->fetch_assoc()) {
      $MAP = $row['MAP'];
    }

    //Format as a currency number
    $MAP = money_format('%i', $MAP);

    // Free resources and close DB Connection
    $conn->close();

    return $MAP;

  }

  // get Landed Costs
  function getLandedCost($sku) {
    global $credentials;
    $landedCost = "";

    // Open DB Connection
    $conn = new mysqli($credentials['ServerName'], $credentials['Username'], $credentials['Password'], $credentials['Database']);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Construct SQL Query
    $sql = "SELECT landedCost FROM tbl_product WHERE sku='" . $sku . "'";


    // Query DB
    $result = $conn->query($sql);

    // Decipher response
    while ($row = $result->fetch_assoc()) {
      $landedCost = $row['landedCost'];
    }

    //Format as a currency number
    $landedCost = money_format('%i', $landedCost);

    // Free resources and close DB Connection
    $conn->close();

    return $landedCost;

  }

  // get Backordered amount
  function getBackordered($sku) {
    global $credentials;
    $backordered = "";

    // Open DB Connection
    $conn = new mysqli($credentials['ServerName'], $credentials['Username'], $credentials['Password'], $credentials['Database']);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Construct SQL Query
    $sql = "SELECT backordered FROM tbl_product WHERE sku='" . $sku . "'";


    // Query DB
    $result = $conn->query($sql);

    // Decipher response
    while ($row = $result->fetch_assoc()) {
      $backordered = $row['backordered'];
    }

    // Free resources and close DB Connection
    $conn->close();

    return $backordered;

  }

  // get Last Sale
  function getLastSold($sku) {
    global $credentials;
    $lastSold = "";

    // Query Amazon API
    // Calculate # of days since last sold

    return $lastSold;

  }

  // get Date Added
  function getDateAdded($sku) {
    global $credentials;
    $dateAdded = "";

    // Open DB Connection
    $conn = new mysqli($credentials['ServerName'], $credentials['Username'], $credentials['Password'], $credentials['Database']);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Construct SQL Query
    $sql = "SELECT dateAdded FROM tbl_product WHERE sku='" . $sku . "'";


    // Query DB
    $result = $conn->query($sql);

    // Decipher response
    while ($row = $result->fetch_assoc()) {
      $dateAdded = $row['dateAdded'];
    }

    // Free resources and close DB Connection
    $conn->close();

    return $dateAdded;

  }

  function getOurPrice($sku) {
    global $credentials;
    $ourPrice = "";

    $ourPrice = GetMyPriceForSKU($sku);

    if ($ourPrice == "") {
      $ourPrice = "No Info";
    }

    return $ourPrice;
  }

    ///////////////////////
   //      SECURITY     //
  ///////////////////////

  function validateInput($regexp, $input) {

    switch ($regexp) {
      case "digit":
        $regexp = "/^-?[0-9]+$/";
        break;

      case "decimal":
        $regexp = "/^-?[0-9]+(\.[0-9]?[0-9])?$/";
        break;
    }

    $pass = false;
    // REGEX VALIDATION
    if (preg_match($regexp, $input)) {
      //echo ($regexp . " " . $input);
      $pass = true;
    }

    // Sanitize
    $input = strip_tags($input);
    $input = htmlspecialchars($input);

    if ($pass) {
      return $input;
    } else {
      return false;
    }
  }

    ///////////////////////////////////////
   //      NEW AMAZON API ACCESSORS     //
  ///////////////////////////////////////

  function requestReport($reportType) {
    global $credentials;
    // Make a request for a report to be generated and return the request id

    return $requestID;
  }

  function checkRequest($requestID) {
    global $credentials;
    // Query amazon for report Status

    // When status returns _DONE_ downloadReport and return file location
    return $fileLocation;
  }

  function downloadReport($requestID) {
    // Download the report

    // Return the file location
    return $fileLocation;
  }

  function ListInventorySupplyBy50() {
    global $credentials;
    $SKUs = getAllSKUs();
    $count = count($SKUs);

    $listInv = array();

    while ($count > 0) {
      // Prepare Request
        // Load .credentials
        // Prepare Params
        // Prepare array of 50 members at a time
        // Construct Request
        // Sign Request

      // Query AMAZON & repeat above steps until all SKUs have been queried
      // Compile all responses into one array
      $count = $count - 50;
    }
    // Return an array of all Inventory
  }

  function getFBAQtyBySKU($sku) {
    sleep(1);
    global $credentials;

    $listInv = array();

    // Prepare Request
      $param = array();
      $param['AWSAccessKeyId']   = $credentials['AWSAccessKeyId'];
      $param['Action']           = 'ListInventorySupply';
      $param['SellerId']         = $credentials['SellerId'];
      $param['SignatureMethod']  = 'HmacSHA256';
      $param['SignatureVersion'] = '2';
      $param['Timestamp']        = gmdate("Y-m-d\TH:i:s.\\0\\0\\0\\Z", time());
      $param['Version']          = '2010-10-01';
      $param['MarketplaceId']    = 'A2EUQ1WTGCTBG2';
      $param['ResponseGroup']    = 'Detailed';
      $param['SellerSkus.member.1']  = $sku;

      $secret = $credentials['Secret'];

      // Construct Request
      $url = array();

      foreach ($param as $key => $val) {
          $key = str_replace("%7E", "~", rawurlencode($key));
          $val = str_replace("%7E", "~", rawurlencode($val));
          $url[] = "{$key}={$val}";
      }

      sort($url);

      $arr   = implode('&', $url);

      // Sign Request
      $sign  = 'GET' . "\n";
      $sign .= 'mws.amazonservices.com' . "\n";
      $sign .= '/FulfillmentInventory/2010-10-01' . "\n";
      $sign .= $arr;

      $signature = hash_hmac("sha256", $sign, $secret, true);
      $signature = urlencode(base64_encode($signature));

      $link  = "https://mws.amazonservices.com/FulfillmentInventory/2010-10-01?";
      $link .= $arr . "&Signature=" . $signature;

    // Query AMAZON
    $ch = curl_init($link);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/xml'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    $response = curl_exec($ch);
    $info = curl_getinfo($ch);
    curl_close($ch);

    // Parse Response
    $xml = simplexml_load_string($response);
    $json = json_encode($xml);
    $array = json_decode($json,TRUE);

    return $array["ListInventorySupplyResult"]["InventorySupplyList"]["member"];

  }

  // API/Products/GetCompetitivePricingForSKU
  function getCompetitivePricingForSKU($sku) {
    global $credentials;
    $result = array();

    // Prepare Params
    $param = array();
    $param['AWSAccessKeyId']   = $credentials['AWSAccessKeyId'];
    $param['Action']           = 'GetCompetitivePricingForSKU';
    $param['SellerId']         = $credentials['SellerId'];
    $param['SignatureMethod']  = 'HmacSHA256';
    $param['SignatureVersion'] = '2';
    $param['Timestamp']        = gmdate("Y-m-d\TH:i:s.\\0\\0\\0\\Z", time());
    $param['Version']          = '2011-10-01';
    $param['MarketplaceId']    = 'A2EUQ1WTGCTBG2';
    $param['SellerSKUList.SellerSKU.1'] = $sku;

    $secret = $credentials['Secret'];

    // Construct Request
    $url = array();
    foreach ($param as $key => $val) {

        $key = str_replace("%7E", "~", rawurlencode($key));
        $val = str_replace("%7E", "~", rawurlencode($val));
        $url[] = "{$key}={$val}";
    }

    sort($url);

    $arr   = implode('&', $url);


    // Sign Request
    $sign  = 'GET' . "\n";
    $sign .= 'mws.amazonservices.com' . "\n";
    $sign .= '/Products/2011-10-01' . "\n";
    $sign .= $arr;

    $signature = hash_hmac("sha256", $sign, $secret, true);
    $signature = urlencode(base64_encode($signature));

    $link  = "https://mws.amazonservices.com/Products/2011-10-01?";
    $link .= $arr . "&Signature=" . $signature;

    // Query Amazon
    $ch = curl_init($link);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/xml'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    $response = curl_exec($ch);
    $info = curl_getinfo($ch);
    curl_close($ch);

    // Parse Response
    $xml = simplexml_load_string($response);
    //$json = json_encode($xml);
    //$array = json_decode($json,TRUE);

    return ($xml->GetCompetitivePricingForSKUResult->Product->CompetitivePricing);

  }

  function GetLowestPricedOffersForSKU($sku) {
    global $credentials;
    $result = array();

    // Prepare Params
    $param = array();
    $param['AWSAccessKeyId']   = $credentials['AWSAccessKeyId'];
    $param['Action']           = 'GetLowestOfferListingsForSKU';
    $param['SellerId']         = $credentials['SellerId'];
    $param['SignatureMethod']  = 'HmacSHA256';
    $param['SignatureVersion'] = '2';
    $param['Timestamp']        = gmdate("Y-m-d\TH:i:s.\\0\\0\\0\\Z", time());
    $param['Version']          = '2011-10-01';
    $param['MarketplaceId']    = 'A2EUQ1WTGCTBG2';
    $param['ItemCondition']    = 'New';
    $param['SellerSKUList.SellerSKU.1'] = $sku;

    $secret = $credentials['Secret'];

    // Construct Request
    $url = array();
    foreach ($param as $key => $val) {

        $key = str_replace("%7E", "~", rawurlencode($key));
        $val = str_replace("%7E", "~", rawurlencode($val));
        $url[] = "{$key}={$val}";
    }

    sort($url);

    $arr   = implode('&', $url);


    // Sign Request
    $sign  = 'GET' . "\n";
    $sign .= 'mws.amazonservices.com' . "\n";
    $sign .= '/Products/2011-10-01' . "\n";
    $sign .= $arr;

    $signature = hash_hmac("sha256", $sign, $secret, true);
    $signature = urlencode(base64_encode($signature));

    $link  = "https://mws.amazonservices.com/Products/2011-10-01?";
    $link .= $arr . "&Signature=" . $signature;

    // Query Amazon
    $ch = curl_init($link);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/xml'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    $response = curl_exec($ch);
    $info = curl_getinfo($ch);
    curl_close($ch);

    // Parse Response
    $xml = simplexml_load_string($response);
    $json = json_encode($xml);
    $array = json_decode($json,TRUE);

    return ($array["GetLowestOfferListingsForSKUResult"]["Product"]["LowestOfferListings"]["LowestOfferListing"][0]["Price"]["LandedPrice"]["Amount"]);
  }

  function isAmazonSelling($sku) {
    global $credentials;
    $result = array();

    // Prepare Params
    $param = array();
    $param['AWSAccessKeyId']   = $credentials['AWSAccessKeyId'];
    $param['Action']           = 'GetLowestOfferListingsForSKU';
    $param['SellerId']         = $credentials['SellerId'];
    $param['SignatureMethod']  = 'HmacSHA256';
    $param['SignatureVersion'] = '2';
    $param['Timestamp']        = gmdate("Y-m-d\TH:i:s.\\0\\0\\0\\Z", time());
    $param['Version']          = '2011-10-01';
    $param['MarketplaceId']    = 'A2EUQ1WTGCTBG2';
    $param['ItemCondition']    = 'New';
    $param['ExcludeMe']        = 'true';
    $param['SellerSKUList.SellerSKU.1'] = $sku;

    $secret = $credentials['Secret'];

    // Construct Request
    $url = array();
    foreach ($param as $key => $val) {

        $key = str_replace("%7E", "~", rawurlencode($key));
        $val = str_replace("%7E", "~", rawurlencode($val));
        $url[] = "{$key}={$val}";
    }

    sort($url);

    $arr   = implode('&', $url);


    // Sign Request
    $sign  = 'GET' . "\n";
    $sign .= 'mws.amazonservices.com' . "\n";
    $sign .= '/Products/2011-10-01' . "\n";
    $sign .= $arr;

    $signature = hash_hmac("sha256", $sign, $secret, true);
    $signature = urlencode(base64_encode($signature));

    $link  = "https://mws.amazonservices.com/Products/2011-10-01?";
    $link .= $arr . "&Signature=" . $signature;

    // Query Amazon
    $ch = curl_init($link);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/xml'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    $response = curl_exec($ch);
    $info = curl_getinfo($ch);
    curl_close($ch);

    // Parse Response
    $xml = simplexml_load_string($response);
    $json = json_encode($xml);
    $array = json_decode($json,TRUE);

    return ($array["GetLowestOfferListingsForSKUResult"]["Product"]["LowestOfferListings"]);
  }

  function GetMyPriceForSKU($sku) {
    global $credentials;
    $result = array();

    // Prepare Params
    $param = array();
    $param['AWSAccessKeyId']   = $credentials['AWSAccessKeyId'];
    $param['Action']           = 'GetMyPriceForSKU';
    $param['SellerId']         = $credentials['SellerId'];
    $param['SignatureMethod']  = 'HmacSHA256';
    $param['SignatureVersion'] = '2';
    $param['Timestamp']        = gmdate("Y-m-d\TH:i:s.\\0\\0\\0\\Z", time());
    $param['Version']          = '2011-10-01';
    $param['MarketplaceId']    = 'A2EUQ1WTGCTBG2';
    $param['ItemCondition']    = 'New';
    $param['SellerSKUList.SellerSKU.1'] = $sku;

    $secret = $credentials['Secret'];

    // Construct Request
    $url = array();
    foreach ($param as $key => $val) {

        $key = str_replace("%7E", "~", rawurlencode($key));
        $val = str_replace("%7E", "~", rawurlencode($val));
        $url[] = "{$key}={$val}";
    }

    sort($url);

    $arr   = implode('&', $url);


    // Sign Request
    $sign  = 'GET' . "\n";
    $sign .= 'mws.amazonservices.com' . "\n";
    $sign .= '/Products/2011-10-01' . "\n";
    $sign .= $arr;

    $signature = hash_hmac("sha256", $sign, $secret, true);
    $signature = urlencode(base64_encode($signature));

    $link  = "https://mws.amazonservices.com/Products/2011-10-01?";
    $link .= $arr . "&Signature=" . $signature;

    // Query Amazon
    $ch = curl_init($link);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/xml'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    $response = curl_exec($ch);
    $info = curl_getinfo($ch);
    curl_close($ch);

    // Parse Response
    $xml = simplexml_load_string($response);
    $json = json_encode($xml);
    $array = json_decode($json,TRUE);

    return ($array["GetMyPriceForSKUResult"]["Product"]["Offers"]["Offer"]["BuyingPrice"]["LandedPrice"]["Amount"]);

    //return ($array["GetLowestOfferListingsForSKUResult"]["Product"]["LowestOfferListings"]["LowestOfferListing"][0]["Price"]["LandedPrice"]["Amount"]);
  }

  // DEBUGGING Tools
  function debugDump($array) {
    printf("print_r():<pre>%s</pre>", print_r($array, TRUE));
  }

    //////////////////////////
   //      SPICY STUFF     //
  //////////////////////////
  function allBrandsAsSelectInput() {
    $brands = getBrandList();

    echo ("<select name='brand'>");
    echo ("<option value='new'>Add New</option>");

    foreach ($brands as $brand) {
      echo ("<option value='" . $brand . "'>" . $brand . "</option>");
    }

    echo ("</select>");

  }



?>
