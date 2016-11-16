<?php

session_start();
if(isset($_SESSION['username']))
{
    include_once './DbCredintials.php';
$query = mysql_query("Select * from ldj_product ");
while ($row = mysql_fetch_array($query)) {
    
    if($row['product_id'] == $_REQUEST['pid'])
    {       
            $_SESSION['id']=$row['user_id'];
            
            $_SESSION['lname']=$row['user_lname'];
            $_SESSION['pass']=$row['user_password'];
            $_SESSION['mail']=$row['user_email_id'];
            $_SESSION['mobno']=$row['user_mobileno'];
            $_SESSION['landline']=$row['user_landline'];
            $_SESSION['secans']=$row['security_answer'];
            
            
            header("Location:../AdminPanel/AdminProfile.php");
        
    }
}
}
else
{
            header("Location:../login.php");
}