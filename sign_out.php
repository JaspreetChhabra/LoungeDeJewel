<?php
$con = mysql_connect("localhost", "root", "") or die("Error connecting to server" . mysql_error());
$db_select = mysql_select_db("jwelleryshop") or die("Error connecting to Database" . mysql_error());
session_start();

$delete = mysql_query("DROP TABLE carttable");

session_destroy();
header("Location:home.php");

?>
