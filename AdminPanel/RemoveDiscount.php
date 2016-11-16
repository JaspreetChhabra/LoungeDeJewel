<?php
include_once './DbCredintials.php';
if(isset($_REQUEST['pid']))
{
$pid=$_REQUEST['pid'];
//echo 'Got value of pid as: '.$pid;
$sql="DELETE FROM ldj_discount WHERE product_id='$pid'";    
$ans=mysql_query($sql);
echo $ans;
}
else
{
    echo 0;
}
