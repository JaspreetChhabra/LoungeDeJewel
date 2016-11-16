<?php


header('Cache-Control: no cache'); //no cache
session_cache_limiter('must-revalidate');
$content = $_POST['content'];
session_start();
$con = mysql_connect("localhost", "root", "") or die("Error connecting to server" . mysql_error());
$db_select = mysql_select_db("jwelleryshop") or die("Error connecting to Database" . mysql_error());

$tablename = "ldj_feedback";
$mail = $_SESSION['email'];

$user = mysql_query("SELECT user_id FROM ldj_user WHERE user_email_id='$mail'");
while($row=  mysql_fetch_array($user))
{
    $u_id = $row[0];
}
    
$prod_id = $_SESSION['productid'];

$insert = mysql_query("INSERT INTO  ldj_feedback (user_id,feedback_content,product_id) VALUES('$u_id','$content','$prod_id')");
header("location:product-details.php");
?>