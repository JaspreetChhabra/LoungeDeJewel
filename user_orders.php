<?php
include './DbCredintials.php';
        $con = mysql_connect($servername,$dbuname,$dbpass) or die("Error connecting to server" . mysql_error());
        $db_select = mysql_select_db("jwelleryshop") or die("Error connecting to Database" . mysql_error());
        session_start();
        
if(!isset($_POST['delid']))
{
    $_POST['delid']=$_SESSION['delid'];
}
else
{
    $_SESSION['delid']=$_POST['delid'];
}
$oid=$_POST['delid'];
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Home |Lounge De Jewel</title>

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/prettyPhoto.css" rel="stylesheet">
        <link href="css/price-range.css" rel="stylesheet">
        <link href="css/animate.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet">
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->       
        <link rel="shortcut icon" href="LOGO.gif">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
        <link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
        <link rel="stylesheet" href="css/style.css"> <!-- Resource style -->
        <style type="text/css">
            .bs-wizard {margin-top: 40px;}

/*Form Wizard*/
.bs-wizard {border-bottom: solid 1px #e0e0e0; padding: 0 0 10px 0;}
.bs-wizard > .bs-wizard-step {padding: 0; position: relative;}
.bs-wizard > .bs-wizard-step + .bs-wizard-step {}
.bs-wizard > .bs-wizard-step .bs-wizard-stepnum {color: #595959; font-size: 16px; margin-bottom: 5px;}
.bs-wizard > .bs-wizard-step .bs-wizard-info {color: #999; font-size: 14px;}
.bs-wizard > .bs-wizard-step > .bs-wizard-dot {position: absolute; width: 30px; height: 30px; display: block; background: #fbe8aa; top: 45px; left: 50%; margin-top: -15px; margin-left: -15px; border-radius: 50%;}
.bs-wizard > .bs-wizard-step > .bs-wizard-dot:after {content: ' '; width: 14px; height: 14px; background: #fbbd19; border-radius: 50px; position: absolute; top: 8px; left: 8px; }
.bs-wizard > .bs-wizard-step > .progress {position: relative; border-radius: 0px; height: 8px; box-shadow: none; margin: 20px 0;}
.bs-wizard > .bs-wizard-step > .progress > .progress-bar {width:0px; box-shadow: none; background: #fbe8aa;}
.bs-wizard > .bs-wizard-step.complete > .progress > .progress-bar {width:100%;}
.bs-wizard > .bs-wizard-step.active > .progress > .progress-bar {width:50%;}
.bs-wizard > .bs-wizard-step:first-child.active > .progress > .progress-bar {width:0%;}
.bs-wizard > .bs-wizard-step:last-child.active > .progress > .progress-bar {width: 100%;}
.bs-wizard > .bs-wizard-step.disabled > .bs-wizard-dot {background-color: #f5f5f5;}
.bs-wizard > .bs-wizard-step.disabled > .bs-wizard-dot:after {opacity: 0;}
.bs-wizard > .bs-wizard-step:first-child  > .progress {left: 50%; width: 50%;}
.bs-wizard > .bs-wizard-step:last-child  > .progress {width: 50%;}
.bs-wizard > .bs-wizard-step.disabled a.bs-wizard-dot{ pointer-events: none; }
        </style>
    </head>
    
<body>
        <header id="header"><!--header-->


            <div class="header-middle" style="margin-top: 15px;"><!--header-middle-->
                <div class="container" style="padding-left: 0px;">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="logo pull-left">
                                <a href="home.php" style="padding-right: 10px;" ><img src="LOGO.png" alt="" height="100px" width="100px"/></a>
                            </div>
                            <div  style="margin-top: 27px;">
                                <font class="logofont"><a href="home.php"><span style="color: #FF496B;">L</span>ounge <span style="color: #FF496B;">D</span>e <span style="color: #FF496B;">J</span>ewel</font></a>
                            </div>
                            <!--<div>
                                <font face="Brush Script MT" size="10">Lounge De Jewel</font>
                            </div>-->

                        </div>

                        <div class="col-sm-8">
                            <div class="shop-menu pull-right">
                                <ul class="nav navbar-nav">
                                    <li id="signin"><a href="login_user.php"><i class="fa fa-lock"></i>Sign-In</a></li>
                                    <li id="orders"><a href="OrdersHistory_1.php"><span class="glyphicon glyphicon-calendar"></span> My Orders</a></li>
                                    <li><a href="customerprofilehandler.php" ><i class="fa fa-user"></i><l id="msg"> Profile</l></a></li>
                                    <li id="signout"><a href="sign_out.php"><span class="glyphicon glyphicon-off"></span> Sign-out</a></li>
                                   <li><a href="#" onclick="displayCart()"data-toggle="modal" data-target="#myModal"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                                    <li id="wishlist"><a href="#" onclick="displayWishlist()" data-toggle="modal" data-target="#myModal1"><i class="fa fa-star"></i> Wishlist</a></li>
                                   
                                </ul>
                            </div>






                        </div>
                    </div>





                </div>
            </div><!--/header-middle-->

            <div id="nav" class="header-bottom"><!--header-bottom-->
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8"  style="margin-top: 14px;">
                            <div class="navbar-header" style="margin-left: 60px;">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="sr-only" >Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="mainmenu pull-left">
                                <ul class="nav navbar-nav collapse navbar-collapse">
                                    <li><a href="home.php" class="active">Home</a></li>
                                    <li class="dropdown"><a href="#">Products<i class="fa fa-angle-down"></i></a>
                                        <ul role="menu" class="sub-menu">
                                            <li><a href="shop.php?value=Earrings">Earrings</a></li>
                                            <li><a href="shop.php?value=Necklace">Necklace</a></li>
                                            <li><a href="shop.php?value=Pendants">Pendants</a></li>
                                            <li><a href="shop.php?value=Rings">Rings</a></li>
                                            <li><a href="shop.php?value=Bangles">Bangles</a></li>
                                            <li><a href="shop.php?value=Tikkas">Tikkas</a></li>
                                            <li><a href="shop.php?value=NosePins">NosePins</a></li>
                                            <li><a href="shop.php?value=Bridal">Bridal</a></li>
                                            <li><a href="shop.php?value=Anklets">Anklets</a></li>
                                            <li><a href="shop.php?value=Exclusive">Exclusive</a></li>
                                            <li><a href="shop.php?value=Mangalsutra">Mangalsutra</a></li>
                                        </ul>
                                    </li>

                                    <li>
                                        <a href="#"><b>Combo Offers</b></a>
                                    </li>
                                    <li>
                                        <a href="contact_us.php"><b>Contact Us</b></a>
                                    </li>
                                    <li>

                                    </li>

                                </ul>
                            </div>
                        </div>


                        <div class="col-lg-4">
                            <form class="navbar-form" role="search" id="searchbar">
                                <div class="input-group" >
                                    <input id=pro1 list="datalist1" class="form-control"  name="datalist1" onkeyup="searchlist()" placeholder="Search" name="q">
                                    <datalist id="datalist1"></datalist>
                                    <div class="input-group-btn" >
                                        <button class="btn btn-default" type="submit" onclick="redirectsearch(datalist1.value)"><i class="glyphicon glyphicon-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>


                    </div>
                </div>
            </div><!--/header-bottom-->
        </header><!--/header-->

        <!--Ordering Process Steps -->
        <div class="container">


            <div class="row bs-wizard" style="border-bottom:0;">

                <div id="step1" class="col-xs-3 bs-wizard-step complete">
                  <div class="text-center bs-wizard-stepnum">Step 1</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center">Ordered</div>
                </div>

                <div id="step2" class="col-xs-3 bs-wizard-step complete"><!-- complete -->
                  <div class="text-center bs-wizard-stepnum">Step 2</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center">Dispatched</div>
                </div>

                <div id="step3" class="col-xs-3 bs-wizard-step active"><!-- complete -->
                  <div class="text-center bs-wizard-stepnum">Step 3</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center">Out for delivery</div>
                </div>

                <div id="step4" class="col-xs-3 bs-wizard-step disabled"><!-- active -->
                  <div class="text-center bs-wizard-stepnum">Step 4</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center">Delivered</div>
                </div>
            </div>





	</div>
         <!--/Ordering Process Steps -->



        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Full Order Details Page</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <?php 
            //$mail = $_SESSION['email'];
//            $get_user_id = mysql_query("SELECT user_id FROM ldj_user WHERE user_email_id='$mail'");
//            while($row6 = mysql_fetch_array($get_user_id))
//            {
//                $user_id = $row6[0];
//            }
            
//            $creatediv = mysql_query("SELECT count(order_id) FROM ldj_orders WHERE user_id='$user_id'");
//            while($row7 = mysql_fetch_array($creatediv))
//            {
//                $totaldiv = $row7[0];
//            }
            
            //for ($index1 = 0; $index1 < $totaldiv; $index1++) {
            ?>
            <div class="row">
                <div class="col-lg-7 col-lg-offset-3">
                    <div class="panel panel-default">
                       
                        <div class="panel-heading">
                            Order Information
                        </div>
                        <!-- /.panel-heading -->
                        
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-10 col-sm-offset-1">
                                    
                                    <form class="form-horizontal" role="form">
                                        <?php
                                        $query = mysql_query("Select * from ldj_orders where order_id='$oid'");
                                        
                                        while ($row = mysql_fetch_array($query)) {
                                        $u_id=$row['user_id'];   
                                       
                                        $data = $row['product_ids'];
                                        $xml = new SimpleXMLElement($data);
                                        
                                        
                                        $pid = $xml->pid[0];
                                        
                                        $nm="SELECT * FROM ldj_user WHERE user_id='$u_id'";
                                        $query1=  mysql_query($nm);
                                        
                                        while ($row1 = mysql_fetch_array($query1)) {
                                            $name=$row1['user_fname'];
                                            //echo $name;
                                        }
                                        $b_add = "SELECT * FROM ldj_user_billing_address WHERE user_id='$u_id'";
                                        $bill_addr = mysql_query($b_add);
                                        while ($row2=  mysql_fetch_array($bill_addr))
                                        {
                                             $bill_id=$row2['billing_add_id'];
                                        }
                                        
                                        
                                        $bill_add = mysql_query("SELECT * FROM ldj_billing_address WHERE billing_add_id='$bill_id'");
                                        while ($row3 = mysql_fetch_array($bill_add))
                                        {
                                            $add_line_1 = $row3['add_line_1'];
                                            $add_line_2 = $row3['add_line_2'];
                                            $cityid = $row3['city_id'];
                                            $stateid = $row3['States_id'];
                                            $country = $row3['country'];
                                            $zipcode = $row3['zip_code'];
                                            
                                        }
                                        
                                        $city = mysql_query("SELECT city_name FROM ldj_city WHERE city_id='$cityid'");
                                        while ($row4 = mysql_fetch_array($city))
                                        {
                                            $cityname = $row4['city_name'];
                                        }
                                        
                                        $city = mysql_query("SELECT State_name FROM ldj_states WHERE States_id='$stateid'");
                                        while ($row4 = mysql_fetch_array($city))
                                        {
                                            $statename = $row4['State_name'];

                                        }
                                        
//                                    echo "pid ".$pid;
                                    $x=0;
                                    foreach ($xml as $value) {
                                        $pro_id= $xml->pid[$x];
                                        
                                        $selectquery = mysql_query("SELECT * FROM ldj_product WHERE product_id='$pro_id'");
                                        //echo $selectquery;
                                        while ($row5 = mysql_fetch_array($selectquery)) {
                                            $product_name[$x]=$row5['product_name'];
                                            //echo $product_name[$x]."<br/>";
                                            $x++;
                                        
                                        }
                                    }

                                    $bill_details = mysql_query("SELECT * FROM ldj_bill_details WHERE user_id='$u_id'");
                                    while($row7 = mysql_fetch_array($bill_details))
                                    {
                                        $productinfo = $row7['product_info'];
                                        $xml2 = new SimpleXMLElement($productinfo);
                                        $x=0;
                                        foreach ($xml2 as $value) {
                                        $prod_id= $xml2->pid[$x];
                                      
                                        
                                        $selectquery = mysql_query("SELECT * FROM ldj_product WHERE product_id='$prod_id'");
                                        //echo $selectquery;
                                            echo "<script>alert(hello);</script>";
                                        while ($row8 = mysql_fetch_array($selectquery)) {
                                            $sellingprice[$x]=$row8['product_selling_price'];
                                           // $quant[$x]= $row8['']
                                            //echo $product_name[$x]."<br/>";
                                            $x++;

                                        }
                                    }
                                    }

                                    
                                   
                                        ?>
                                        <div class="form-group">
                                            <label class="col-lg-4 col-sm-5 col-xs-2 control-label">Order ID</label>
                                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-6 ">

                                               <label class="col-lg-7 col-sm-9 col-xs-2 control-label"><?php echo $row['order_id'];?></label>
                                            </div>
                          
                                            <label class="col-lg-4 col-sm-5 col-xs-2 control-label">Transaction ID</label>
                                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-6 ">

                                               <label class="col-lg-7 col-sm-9 col-xs-2 control-label"><?php echo $row['transaction_id'];?></label>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-lg-4 col-sm-5 col-xs-2 control-label">Product Name</label>
                                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-6 ">

                                               <label class="col-lg-7 col-sm-9 col-xs-2 control-label"><?php 
                                               
                                               for ($index = 0; $index < count($product_name); $index++) {
                                                   echo $product_name[$index]."<br/>";
                                               }
                                               ?></label>
                                            </div>
                                        </div>

                                        
                                        
                                        <div class="form-group">
                                            <label class="col-lg-4 col-sm-5 col-xs-2 control-label">Shipment Status</label>
                                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-6 ">

                                                <label id="order_status" class="col-lg-7 col-sm-9 col-xs-2 control-label"><?php echo $row['order_status'];?></label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-lg-4 col-sm-5 col-xs-2 control-label">Quantity</label>
                                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-6 ">

                                                <label id="order_status" class="col-lg-7 col-sm-9 col-xs-2 control-label"><?php  //echo $xml2->qty[0];

                                            $x=0;
                                    foreach ($xml2 as $value) {
                                        $quantity = $xml2->qty[$x];
                                        echo $quantity."<br/>";
                                        
                                            $x++;

                                        }
                                    
                                                ?></label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-4 col-sm-5 col-xs-2 control-label">Product Price</label>
                                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-6 ">

                                               <label class="col-lg-7 col-sm-9 col-xs-2 control-label"><?php

                                               for ($index = 0; $index < count($sellingprice); $index++) {
                                                   echo $sellingprice[$index]."<br/>";
                                               }
                                               ?></label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-lg-4 col-sm-5 col-xs-2 control-label">Payment Method</label>
                                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-6 ">

                                               <label class="col-lg-7 col-sm-9 col-xs-2 control-label">COD</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-4 col-sm-5 col-xs-2 control-label">Customer ID</label>
                                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-6 ">

                                                <label class="col-lg-7 col-sm-9 col-xs-2 control-label"><?php echo $row['user_id'];?></label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-4 col-sm-5 col-xs-2 control-label">Customer Name</label>
                                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-6 ">

                                               <label class="col-lg-7 col-sm-9 col-xs-2 control-label"><?php echo $name;?></label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-4 col-sm-5 col-xs-2 control-label">Billing Address</label>
                                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-6 ">

                                               <label class="col-lg-7 col-sm-9 col-xs-2 control-label"><?php echo $add_line_1." ".$add_line_2." ".$cityname." ".$zipcode." ".$statename." ".$country ?></label>
                                            </div>
                                        </div>
                                        

                                        
                                            
                                            
                                            
                                                      </div>
                                        </div>
                                        <?php }
                                        ?>

                                    </form>    
                                </div>
                            
                            </div>
                             
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
            <?php //} ?>
                <!-- /.col-lg-12 -->
</div>
<?php
        include 'footer.php';
        ?>




        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.scrollUp.min.js"></script>
        <script src="js/masonry.pkgd.min.js"></script>
        <script src="js/price-range.js"></script>
        <script src="js/jquery.prettyPhoto.js"></script>
        <script src="js/modernizr.js"></script>
        <script src="js/main.js"></script>
        <script src="js/main1.js"></script>
        <script src="js/masonry.pkgd.min.js"></script>
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.easing.min.js"></script>
        <script src="js/scrolling-nav.js"></script>
        <script>
            var orderval;
            $(document).ready(function(){
                orderval = $('#order_status').text();
                
            
            if(orderval == "Ordered")
                {
//                    $(document).ready(function(){
                        $('#step1').addClass("active");
                        $('#step1').removeClass("complete");
                        $('#step2').removeClass("complete");
                        $('#step2').addClass("disabled");
                        $('#step3').removeClass("active");
                        $("#step3").addClass("disabled");
                    //});
                }
                else if(orderval == "Dispatched")
                    {
                       // $(document).ready(function(){
                        $('#step2').removeClass("complete");
                        $('#step2').addClass("active");
                        $('#step3').removeClass("active");
                        $("#step3").addClass("disabled");
                   // });
                    }
                    else if(orderval == "Delivered")
                        {
                            //$(document).ready(function(){
                        $('#step3').removeClass("active");
                        $('#step3').addClass("complete");
                        $('#step4').removeClass("disabled");
                        $('#step4').addClass("active");
                    //});

                        }
                        });
        </script>
<?php include 'CheckLogin.php'; ?>


    </body>
</html>
