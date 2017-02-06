<?php
include_once("../assets/lib/libAmazonReports.php");
  // Import Text From text box or file

  // Decipher csv into usable array

  // Calculate Inventory Turn Rate
    // Factor in date added vs report length
    // Sales / Inventory
?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="tables.css">
  </head>
  <body>
    <h1 id='reportTitle'>Check Inventory Turn Rate</h1>
    <form action="checkInventoryTurnRateSubmit.php" method="post">
      <div  class="tbl-header">
      <table class='pure-table pure-table-horizontal'>
        <thead>
          <tr>
            <td>Import CSV:</td>
          </tr>
        </thead>
      </table>
    </div>
    <div  class="tbl-content">
      <table>
        <tbody>
          <tr>
            <td>
              <textarea name="csv" rows="4" cols="50"></textarea>
            </td>
          </tr>
          <tr>
            <td>
              <input type="submit" name="submit"></input>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    </form>
  </body>
</html>
