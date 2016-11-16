<?php

session_start();

include 'DbCredintials.php';
$connect = mysql_connect($servername,$dbuname,$dbpass) or die("Error connecting to server" . mysql_error());

mysql_select_db("jwelleryshop") or die("No database found");

$id=$_SESSION['id'];
$fn=$_REQUEST['fname'];
$ln=$_REQUEST['lname'];
$mail=$_REQUEST['mail'];
$pass=md5($_REQUEST['password']);
$mob=$_REQUEST['mobileno'];
$llno=$_REQUEST['landlineno'];
$secques=$_REQUEST['securityques'];





$sql="UPDATE `ldj_user` SET user_fname = '$fn',user_lname ='$ln', user_password= '$pass', user_email_id='$mail', user_mobileno=$mob, user_landline='$llno', security_answer='$secques' WHERE user_id = $id";
if(! mysql_query($sql))
{
    echo mysql_error();
}
        else
        {
            //echo mysql_error();
            header("Location:customerprofilehandler.php");

        }
  


