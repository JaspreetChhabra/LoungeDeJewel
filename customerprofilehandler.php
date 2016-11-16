<?php

session_start();
if(isset($_SESSION['username']))
{
include 'DbCredintials.php';
$connect = mysql_connect($servername,$dbuname,$dbpass) or die("Error connecting to server" . mysql_error());
$name=$_SESSION['username'];
mysql_select_db("jwelleryshop") or die("No database found");
$query = mysql_query("Select * from ldj_user where user_fname='$name'");
while ($row = mysql_fetch_array($query)) {
    
    if($row['user_fname'] == $_SESSION['username'])
    {       
            $_SESSION['id']=$row['user_id'];
            $uid = $_SESSION['id'];
            $_SESSION['lname']=$row['user_lname'];
            $_SESSION['pass']=$row['user_password'];
            $_SESSION['mail']=$row['user_email_id'];
            $_SESSION['mobno']=$row['user_mobileno'];
            $_SESSION['landline']=$row['user_landline'];
            $sec_ques_id = $row['security_ques_id'];
            
            $result = mysql_query("SELECT security_ques FROM ldj_security_question WHERE security_ques_id='$sec_ques_id'");
            while($row1 =  mysql_fetch_array($result))
            {
                $_SESSION['sec_ques'] = $row1['security_ques'];
                echo $row1[0];
            }
            $_SESSION['secans']=$row['security_answer'];
            $billaddr = mysql_query("SELECT * FROM ldj_user_billing_address WHERE user_id='$uid'");
            while($row2 =  mysql_fetch_array($billaddr))
            {
                $_SESSION['bill_id'] = $row2['billing_add_id'];
                $billid = $row2['billing_add_id'];
                echo $row2[0];
            }

            $billmain = mysql_query("SELECT * FROM ldj_billing_address WHERE billing_add_id='$billid'");
            while ($row3 = mysql_fetch_array($billmain)) {
                $_SESSION['add_line_1'] = $row3['add_line_1'];
                $_SESSION['add_line_2'] = $row3['add_line_2'];
                $cityid = $row3['city_id'];
                
            }

            //$_SESSION['secans']=$row['security_answer'];
            
            
            header("Location:customer_profile.php");
        
    }
}
}
else
{
            header("Location:login_user.php");
}