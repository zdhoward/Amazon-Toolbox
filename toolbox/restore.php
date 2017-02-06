<?php
include_once("../assets/lib/libAmazonReports.php");
require_once('../authenticate.php');
?>
<!Doctype html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="tables.css">
  </head>
  <body>
    <h1 id='reportTitle'>Restore Backup</h1>
    <form method='post' action='restoreSubmit.php'>
      <div  class="tbl-header">
      <table>
        <tr><td colspan=2>Please Select a Backup to Restore:</td></tr>
      </table>
    </div>
    <div  class="tbl-content">
      <table>
<?php
  //restore();

  $files = scandir($credentials['BackupLocation']);

  //debugDump($files);

  foreach ($files as $id=>$file) {
    //echo ("$id: $file <hr>");
    if (!$ret = strpos($file, ".")) {
      unset($files[$id]);
      //echo ("Delete $id - $file");
      //echo ($ret);
    }
  }
  //debugDump($files);
  echo ("<tr><td><select name='file'>");
  echo ("<option value='NULL'>Please Select a File</option>");
  foreach ($files as $file) {
    echo ("<option value='$file'>$file</option>");
  }
  echo ("</select></td>");
  echo ("<td><input type='submit' name='submit'></input></td></tr>");

?>
</table>
</div>
</form>
</body>
</html>
