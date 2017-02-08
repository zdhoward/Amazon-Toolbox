<?php

include_once("../assets/lib/libAmazonReports.php");
require_once('../authenticate.php');

//echo ("Hello World");

?>

<!DOCTYPE html>
<html>
<head><script src="../assets/js/clipboard.min.js"></script></head>
  <body>
    <form action ="#" method='POST'>
      <table>
        <tr><td>Parse:</td></tr>
        <tr><td><textarea id='box' name='box' rows='10' cols='60' ></textarea></td></tr>
        <tr>
          <td id='selected'><?php
            if ($_POST['box']) {
              //debugDump($_POST);
              //echo (preg_split(PHP_EOL, $_POST['box']));

              $result = $_POST['box'];

              //echo (json_encode($_POST['box']));
              $result = (json_encode($result));
              //echo $result;

              //echo ("----------");

              // REMOVE DUPLICATES - DOESN'T WORK
              //$arr = explode('\r\n', $result);
              //$arr = array_unique($arr);
              //$result = implode('\r\n', $arr);

              //echo $result;

              //echo ("----------");

              //$res = preg_split('/\r\n/', $result);
              //$wcount = count($res);

              //$wcount = str_word_count($result, 1);
              //$wcount = count($wcount);

              $temp = str_replace('"', '', $result);
              $arr = explode('\r\n', $temp);
              $arr = array_filter($arr);
              $arr = array_unique($arr);

              //debugDump($arr);
              $replace = array("- S/N:");
              array_splice($arr, 1, 0, $replace);
              $arr[0] = trim($arr[0]);
              //$arr = $temp;
              //debugDump($temp);

              $wcount = count($arr) - 2;
              $result = implode('\r\n', $arr);
              //debugDump($result);


              // Prepare output
              $result = str_replace('\r\n', ' ', $result);
              $result = str_replace('"', '', $result);
              echo ("<p>[$wcount]</p>");
              echo ("<textarea id='result' rows='10' cols='60'>" . $result . "</textarea>");

              /*
              //echo ("Hello World");
              // PARSE INPUT
              // Take all lines and concatenate them up to x characters
              $len = 60;
              $arr = explode('\n', $_POST['box']);
              $line = '';
              $result = '';

              foreach ($arr as $word) {
                //$cnt = strlen($word);
                if (strlen($word) + $charCount + 1 < $len) { //if current line will be less than maximum char
                  $line = $line . " " . $word;
                  $charCount += strlen($word);
                } else { // line is done, print to result and repeat
                  $result = $result . '\n' . $line;
                }
              }

              echo ($result);
              */



            }
          ?>
          </td>
        </tr>
        <td><input type='submit' name='submit'><button class='btn' data-clipboard-action='cut' data-clipboard-target='#result'>Cut</button></td>
        <script>
        var clipboard = new Clipboard('.btn');

        clipboard.on('success', function(e) {
            console.log(e);
        });

        clipboard.on('error', function(e) {
            console.log(e);
        });
        </script>
      </table>
    </form>
  </body>
</html>
