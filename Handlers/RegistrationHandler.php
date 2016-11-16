<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include './HandlerDatabase.php';
        include '../DbCredintials.php';
$con = mysql_connect($servername,$dbuname,$dbpass) or die("Error connecting to server" . mysql_error());

        $db_select = mysql_select_db("jwelleryshop") or die("Error connecting to Database" . mysql_error());

        if (isset($_SERVER['HTTP_REFERER'])) 
            {

                $referer = $_SERVER['HTTP_REFERER'];
                if (strpos($referer, "http://localhost/LoungeDeJewelWebsite/login_user.php") === 0) {

                    
                    $fname = $_REQUEST['fname'];
                    $lname = $_REQUEST['lname'];
                    $email = $_REQUEST['email'];
                    $pass = $_REQUEST['Password'];
                    $user_type = "user";
                    $mobile = $_REQUEST['phno'];
                    $landline = $_REQUEST['landline'];
                    
                    $b_add1 = $_REQUEST['address1'];
                    $b_add2 = $_REQUEST['address2'];
                    $b_city = $_REQUEST['city'];
                    $b_state = $_REQUEST['state'];
                    $b_country = $_REQUEST['country'];
                    $b_zip = $_REQUEST['zipcode'];
                    
                    $s_add1 = $_REQUEST['ship_address1'];
                    $s_add2 = $_REQUEST['ship_address2'];
                    $s_city = $_REQUEST['ship_city'];
                    $s_state = $_REQUEST['s_state'];
                    $s_country = $_REQUEST['ship_country'];
                    $s_zip = $_REQUEST['ship_zipcode'];
                    
                    $sec_ques = $_POST['securityques'];
                    $sec_ans = $_POST['securityquesans'];
                    $passwd = md5($pass);
//                    $query = mysql_query("SELECT ID FROM ldj_security_question where security_ques='$sec_ques'");
//                    while($row = mysql_fetch_array($query))
//                    {
//                        $sec_ques_id = $row[0];
//                    }
                    if((empty ($s_add1)) && (empty ($s_add2)) && (($s_city==1)||($s_city==2)) && (($s_state==1) || ($s_state==1)) && (empty ($s_country)) && (empty ($s_zip)))
                    {
                        $s_add1 = $b_add1;
                        $s_add2 = $b_add2;

                        if($b_city==1 && $b_state==1)
                        {
                            $s_city = 1;
                            $s_state = 1;
                        }
                        else if($b_city==2 && $b_state==2)
                        {
                            $s_city = 2;
                            $s_state = 2;
                        }
                        
                        $s_state = $b_state;
                        $s_country = $b_country;
                        $s_zip = $b_zip;
                    }
                    

                    $email= $_REQUEST['email'];
                    $password = $_REQUEST['Password'];

                    $result = registrationCheck($email, $password);

                    if(mysql_num_rows($result) > 0)
                    {
                        echo "User Already exists";
                    }
                    else
                    {
                       $insert = doRegistration($user_type,$fname,$lname,$passwd,$email,$mobile,$landline,$sec_ques,$sec_ans);
                       $insert_add = insertAddress($b_add1,$b_add2,$b_city,$b_state,$b_country,$b_zip);
                       $insert_ship_add = insertShipAdd($s_add1,$s_add2,$s_city,$s_state,$s_country,$s_zip);
                       if($insert && $insert_add && $insert_ship_add)
                       {
                           $query = mysql_query("SELECT MAX(user_id) FROM ldj_user");
                           while($row=  mysql_fetch_array($query))
                           {
                               $u_id = $row[0];
                           }
                           
                           $query1 = mysql_query("SELECT MAX(billing_add_id) FROM ldj_billing_address");
                           while($row=  mysql_fetch_array($query1))
                           {
                               $b_id = $row[0];
                           }
                           $bill=insertBillMap($u_id,$b_id);

                           $query2 = mysql_query("SELECT MAX(shipping_id) FROM ldj_shipping_address");
                           while($row=  mysql_fetch_array($query2))
                           {
                               $s_id = $row[0];
                           }
                           $ship=insertShipMap($u_id,$s_id);
                           if($bill && $ship)
                           {
                                    header("location:../home.php?q=successful");

                           }
                           else
                           {
                               echo "fail inserting into mapping table";
                           }


                           }

                       else
                       {
                           echo "Fail inserting into main table";
                       }
                    }
                }
            }
                
            
        ?>
    </body>
</html>
