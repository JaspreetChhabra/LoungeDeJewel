<?php

session_start();

include_once './DbCredintials.php';
$id=$_REQUEST['id'];
$fn=$_REQUEST['fname'];
$ln=$_REQUEST['lname'];
$mail=$_REQUEST['mail'];
$pass=md5($_REQUEST['pass']);
$mob=$_REQUEST['mob'];
$llno=$_REQUEST['llno'];
$secques=$_REQUEST['secques'];





$sql="UPDATE `ldj_user` SET user_fname = '$fn',user_lname ='$ln', user_password= '$pass', user_email_id='$mail', user_mobileno=$mob, user_landline='$llno', security_answer='$secques' WHERE user_id = $id";
if(! mysql_query($sql))
{
    echo mysql_error();
}
        else
        {
            //echo mysql_error();
            header("Location:userprofilehandler.php");

        }
  


