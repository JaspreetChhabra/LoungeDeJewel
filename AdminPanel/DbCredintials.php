<?php
$dbhost="localhost";
$dbuser="root";
$dbpass="";
$con = mysql_connect($dbhost, $dbuser, $dbpass) or die("Couldn't connect to Database Server".  mysql_error());
$db_select = mysql_select_db("jwelleryshop") or die("Error connecting to Database" . mysql_error());

?>
