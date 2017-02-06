<?php
global $connection;

if ( isset( $connection ) )
	return;
mysqli_report(MYSQLI_REPORT_STRICT);

$connection = new mysqli("localhost", "root", "root", "db_SBT_test_3");

if (mysqli_connect_errno()) {
	die(sprintf("Connect failed: %s\n", mysqli_connect_error()));
}
?>
