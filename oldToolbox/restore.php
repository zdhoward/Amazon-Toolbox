<?php
include_once("../assets/lib/libAmazonReports.php");
?>
<!Doctype html>
<html>
  <head>
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
  </head>
  <body>
    <form method='post' action='restoreSubmit.php'>
      <table class='pure-table pure-table-horizontal'>
        <tr><td colspan=2>Please Select a Backup to Restore:</td></tr>
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
</form>
</body>
</html>
