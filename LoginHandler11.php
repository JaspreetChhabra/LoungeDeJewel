<?php

session_start();

include 'DbCredintials.php';
$connect = mysql_connect($servername,$dbuname,$dbpass) or die("Error connecting to server" . mysql_error());

mysql_select_db("jwelleryshop") or die("No database found");



$pass=$_POST['passwd'];
$_SESSION['email']=$_POST['mail'];
$mail=$_SESSION['email'];

$query = mysql_query("Select * from ldj_user ");
while ($row = mysql_fetch_array($query)) {
    
    if($row['user_password'] == md5($pass))
    {
        echo "Hello" . $row['user_fname'];
        $_SESSION['username'] = $row['user_fname'];

        if ($row['user_type'] == 'user') {
            header("Location:home.php");
        }
        else
        {
            header("Location:dashboard.php");
        }
    }
}


