<?php
include_once("../assets/lib/libAmazonReports.php");
require_once('../authenticate.php');

  ob_implicit_flush(true);

  if ($_POST) {
    //debugDump($_POST);
    $_POST['csv'];
    $data = str_getcsv($_POST['csv'], "\n");

    $count = 0;
    $content = array();

    foreach ($data as &$row) {
      if ($count == 0) {
        $titles = str_getcsv($row, ",");
        //debugDump($titles);
      } else {
        $body = str_getcsv($row, ",");
        array_push($content, $body);
        //debugDump(str_getcsv($row, ","));
      }
      $count++;
    }

    //debugDump($titles);

    //debugDump($content);

    // GENERATE TURN RATE REPORT
      // Total Sold
      // Time Period Based On Date Added
      // $$ Worth of Sales
      // Calculate Turn Rate
      // Buy Box Percentage


  }
?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="tables.css">
  </head>
  <body>
    <h1 id='reportTitle'>Check Inventory Turn Rate</h1>
    <div  class="tbl-header">
    <table class='pure-table pure-table-horizontal'>
      <thead>
        <tr>
          <td><?php echo ($titles[2]); ?></td>
          <td><?php echo ($titles[8]); ?></td>
          <td><?php echo ($titles[10]); ?></td>
          <td>Inventory Cost</td>
          <td><?php echo ($titles[11]); ?></td>
          <td><?php echo ($titles[12]); ?></td>
          <td>Landed Cost</td>
          <td>Fulfillable</td>
          <td>Inventory Turn Rate</td>
          <td>Date Added</td>
        </tr>
      </thead>
    </table>
  </div>
  <div  class="tbl-content">
    <table>
      <tbody>
        <?php
          foreach ($content as $data) {
            // Get name
            $brand = getBrand($data[3]);
            $name = getName($data[3]);

            if ($name == "") {
              $name = "";
              $brand = $data[2];
            }

            // Format $$
            $money = ltrim($data[11], 'Can$');
            $money = str_replace(',', '', $money);

            // Get Landed Cost
            $landedCost = getLandedCost($data[3]);

            // Get current Inventory count
            $fulfillable = getFulfillable($data[3]);

            // Calculate inventory Cost
              // (Total Sold + Fulfillable) * LandedCost
            $invCost = ($data[12] + $fulfillable) * $landedCost;

            // Calculate Inventory Turn RATE
            $invTurnRate = $money / $invCost;

            // Get dateAdded and compare to a reasonable
              // If its less than a month ago these numbers are inaccurate
            $dateAdded = getDateAdded($data[3]);

            echo ("<tr><td>" . $brand . " " . $name . "</td><td>" . $data[8] . "</td><td>" . $data[10] . "</td><td>" . $invCost . "</td><td>" . $money . "</td><td>" . $data[12] . "</td><td>" . $landedCost . "</td><td>" . $fulfillable . "</td><td>" . $invTurnRate . "</td><td>" . $dateAdded . "</td></tr>");
            //echo ("<tr><td>" . $data[0] . "</td><td>" . $data[1] . "</td><td>" . $data[2] . "</td><td>" . $data[3] . "</td><td>" . $data[4] . "</td><td>" . $data[5] . "</td><td>" . $data[6] . "</td><td>" . $data[7] . "</td><td>" . $data[8] . "</td><td>" . $data[9] . "</td><td>" . $data[10] . "</td><td>" . $data[11] . "</td><td>" . $data[12] . "</td></tr>");
          }
        ?>
      </tbody>
    </table>
  </div>
  </body>
</html>
