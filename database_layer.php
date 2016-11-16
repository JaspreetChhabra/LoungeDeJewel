<?php

include 'DbCredintials.php';
$connect = mysql_connect($servername,$dbuname,$dbpass) or die("Error connecting to server" . mysql_error());

mysql_select_db("jwelleryshop") or die("No database found");

function questionDropdown()
{
    $result = mysql_query("SELECT security_ques from ldj_security_question");
    return $result;
}

function cityDropdown()
{
    $result = mysql_query("SELECT city_name from ldj_city");
    return $result;
}
function  stateDropdown()
{
    $result = mysql_query("SELECT State_name from ldj_states");
    return $result;
}


?>
