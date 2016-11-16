<?php

session_start();

//include '../DbCredintials.php';
$connect = mysql_connect("localhost","root","") or die("Error connecting to server" . mysql_error());

mysql_select_db("jwelleryshop") or die("No database found");


$mail=$_POST['mail'];
$pass=$_POST['passwd'];

$query = mysql_query("Select * from ldj_user ");
while ($row = mysql_fetch_array($query)) {
    
    if($row['user_password'] == md5($pass))
    {
    echo "Hello".$row['user_fname'];
    $_SESSION['username'] = $row['user_fname'];
    }
}
header("Location:../login_user.php");

?>