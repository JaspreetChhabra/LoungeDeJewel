<?php
include '../DbCredintials.php';
$con = mysql_connect($servername,$dbuname,$dbpass) or die("Error connecting to server" . mysql_error());
$db_select = mysql_select_db("jwelleryshop") or die("Error connecting to Database" . mysql_error());

function registrationCheckEmail($email ) {
    $query = mysql_query("Select * from ldj_user where user_email_id='$email'");
    return $query;
}

function registrationCheckContact($contact)
{
    $query = mysql_query("Select * from ldj_user where user_email_id='$contact'");
    return $query;
}

function registrationCheck($email , $pass) {
    $query = mysql_query("Select * from ldj_user where user_email_id='$email' OR user_password='$pass'");
    return $query;
}

function doRegistration($user_type,$fname,$lname,$pass,$email,$mobile,$landline,$sec_ques_id,$sec_ans)
{
    $query = mysql_query("INSERT INTO ldj_user (user_type,user_fname,user_lname,user_password,user_email_id,user_mobileno,user_landline,security_ques_id,security_answer) VALUES('$user_type','$fname','$lname','$pass','$email','$mobile','$landline','$sec_ques_id','$sec_ans')");
    return $query;
}

function  insertAddress($b_add1,$b_add2,$b_city,$b_state,$b_country,$b_zip)
{
    $query = mysql_query("INSERT INTO ldj_billing_address (add_line_1,add_line_2,city_id,States_id,country,zip_code) VALUES('$b_add1','$b_add2','$b_city','$b_state','$b_country','$b_zip')");
    return $query;
}

function insertShipAdd($s_add1,$s_add2,$s_city,$s_state,$s_country,$s_zip)
{
    $query = mysql_query("INSERT INTO ldj_shipping_address (add_line_1,add_line_2,city_id,States_id,country,zip_code) VALUES('$s_add1','$s_add2','$s_city','$s_state','$s_country','$s_zip')");
    return $query;
}

function insertBillMap($u_id,$b_id)
{
    $query = mysql_query("INSERT INTO ldj_user_billing_address (user_id,billing_add_id) VALUES('$u_id','$b_id')");
    return $query;
}

function insertShipMap($u_id,$s_id)
{
    $query = mysql_query("INSERT INTO ldj_user_shipping_address (user_id,shipping_id) VALUES('$u_id','$s_id')");
    return $query;
}
?>