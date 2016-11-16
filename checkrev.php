<?php

session_start();

$connect = mysql_connect("localhost","root","") or die("Couldn't connect to Database Server");

mysql_select_db("jwelleryshop") or die("No database found");


$mail=$_SESSION['email'];
$pass=$_SESSION['password'];


if($mail && $pass)
{
    echo "yes";
}
else
{
    echo "no";
}
//$query = mysql_query("Select * from ldj_user ");
//while ($row = mysql_fetch_array($query)) {
//    
//    if($row['user_password'] == md5($pass))
//    {
//        echo "Hello" . $row['user_fname'];
//        $_SESSION['username'] = $row['user_fname'];
//
//        if ($row['user_type'] == 'user') {
//            header("Location:home.php");
//        }
//        else
//        {
//            header("Location:dashboard.php");
//        }
//    }
//}


