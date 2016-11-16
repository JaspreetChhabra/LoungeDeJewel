<?php

include './DbCredintials.php';
$con = mysql_connect($servername, $dbuname, $dbpass) or die("Error connecting to server" . mysql_error());
$db_select = mysql_select_db("jwelleryshop") or die("Error connecting to Database" . mysql_error());

$sql = "select product_name from ldj_product";
$query = mysql_query($sql);

while($row=mysql_fetch_array($query))
{
    echo "<option value='$row[product_name]'/>";
}


//foreach ($query as $row) {
//echo "<option value='$row[State_name]'/>";
//echo $row[State_name];// Format for adding options 
//}

