<?php

session_start();
include 'database_layer.php';
?>

<html lang="en"><head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Login | Lounge De Jewel</title>
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
    <style>
        label
        {
            margin-top: 5px;
        }
        @media screen and (max-width:700px)
        {
            #ans
            {
                padding-top: -30px;
            }
        }
        
    </style>
                    
            
            <script>
function checkEmail(value , type) {
    
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
        
        alert(xmlhttp.responseText);
    }
    
  }
  xmlhttp.open("GET","Handlers/AjaxCheckHandler.php?value="+value+"&type="+type,true);
  xmlhttp.send();
}

</script>
 
  
    </head><!--/head-->
<style>

.blurimg:hover
    {
       -webkit-filter: blur(3px);  -moz-filter: blur(3px); -o-filter: blur(3px); -ms-filter: blur(3px);
}
    .noblur
    {
         -webkit-filter: blur(0px);  -moz-filter: blur(0px); -o-filter: blur(0px); -ms-filter: blur(0px);
}
    a
    {
        text-decoration: none;
        color:black;
}


    @media screen and (max-width:900px)
    {
        #searchbar
        {

            margin-top:-100px;
        }

        #slider-carousel
        {
            margin-top:125px;
}
}
</style>

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
                                    <li><a href="OrdersHistory_1.php"><span class="glyphicon glyphicon-calendar"></span> My Orders</a></li>
                                    <li><a href="customerprofilehandler.php" ><i class="fa fa-user"></i><l id="msg"> Profile</l></a></li>
                                    <li id="signout"><a href="sign_out.php"><span class="glyphicon glyphicon-off"></span> Sign-out</a></li>
                                    <li><a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>
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

<!--                                    <li>
                                        <a href="#"><b>Combo Offers</b></a>
                                    </li>-->
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
        
        <section id="form"><!--form-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-sm-offset-1">
                        <div class="login-form"><!--login form-->
                            <h2>Login to your account</h2>
                            <form action="LoginHandler.php" method="POST">
                                <input type="email" name="mail" placeholder="Email Address">
                                <input type="password" name="passwd" placeholder="Enter Password!">

                                <a href="#">Forgot Password!</a>
                                <br>
                                <button type="submit" class="btn btn-default">Login</button>
                            </form>
                        </div><!--/login form-->
                    </div>
                    <div class="col-sm-1">
                        <h2 class="or">OR</h2>
                    </div>
                    <div class="col-lg-6">
                        <div class="signup-form"><!--sign up form-->
                            <h2>New User Signup!</h2>
                            <form action="./Handlers/RegistrationHandler.php" id="regform" method="post" class="col-lg-12">

                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10" id="personal"><center>Personal Details</center></div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>

                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10"></div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10"></div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10"></div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10"></div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10"></div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10"></div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>

                                <div id="div1" class="col-lg-9 col-md-10 col-sm-10 col-xs-10"><input type="text" name="fname" id="fname" data-toggle="tooltip" title="Enter only alphabets!!" placeholder="First Name"></div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1" id="firstname"></div>

                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10"><input type="text" name="lname" id="lname" data-toggle="tooltip" title="Enter only alphabets!!" placeholder="Last Name" onblur="lnmVal()"></div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1" id="lastname"></div>

                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10"><input type="email" name="email" id="email" data-toggle="tooltip" title="Must have @ symbol!!" placeholder="Email Address" onblur="checkEmail(this.email,1)"></div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1" id="mail"></div>

                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10"><input type="password" name="Password" id="password" data-toggle="tooltip" title="Must be of minimum 8 characters long!!" placeholder="Password" onblur="passVal()"></div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1" id="pass"></div>

                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10"><input type="password" name="Re-Password" id="re-pass" data-toggle="tooltip" title="Re-type the password!!" placeholder="Retype Password" onblur="recheckPass()"></div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1" id="re-password"></div>

                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10"><input type="tel" name="phno" placeholder="Mobile Number" id="phno" data-toggle="tooltip" title="Enter only numbers and must have 10 digits!!" onblur="phnoVal()"></div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1" id="no"></div>

                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10"><input type="tel" name="landline" id="landline" data-toggle="tooltip" title="Enter only numeric values!!" placeholder="Landline Number"></div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1" id="tele"></div>

                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10"><center>Billing Address</center></div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>

                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10"></div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>

                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10"></div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>

                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10"></div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>

                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10"></div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>

                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10"><input type="text" name="address1" id="address1" data-toggle="tooltip" title="Enter Address line 1!!" placeholder="Address Line 1"></div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>

                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10"><input type="text" name="address2" id="address2" data-toggle="tooltip" title="Enter Address line 2!!" placeholder="Address Line 2"></div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>

                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10">
                                    <select name="city">

                                             <?php
                                    $result = cityDropdown();
                                    $i = 0;
                                    while ($row = mysql_fetch_array($result)) {
                                        $i++;
                                        echo "<option value='$i'>$row[0]</option>";
                                    }
                                    ?>

                                            </select>
                                </div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>

                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10"></div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10"></div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10"></div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10"></div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10"></div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10"></div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>

                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10">
                                    <select name="state">

                                             <?php
                                    $result = stateDropdown();
                                    $i = 0;
                                    while ($row = mysql_fetch_array($result)) {
                                        $i++;
                                        echo "<option value='$i'>$row[0]</option>";
                                    }
                                    ?>

                                            </select>
                                </div>
                                
                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10"></div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10"></div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10"></div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10"></div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10"></div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10"></div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                                
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>

                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10"><input type="text" name="country" id="country" data-toggle="tooltip" title="Enter Your Country!!" placeholder="Country"></div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>

                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10"><input type="number" name="zipcode" id="zipcode" data-toggle="tooltip" title="Enter Your Zip-Code!!" placeholder="Zip Code"></div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>

                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10" id="cb">
                                 <div class="col-lg-2 col-md-3 col-sm-3 col-xs-3">
                                 <input type="checkbox" id="same" name="same" value="same as above"></div>
                                    <div id="del_msg" class="col-lg-9 col-md-10 col-sm-10 col-xs-10" style="margin-top: 15px;">Shipping Address same as above</div>
                                </div>
                                
                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10" id="delivery_add"><center>Shipping Address</center></div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>

                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10"></div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10"></div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10"></div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10"></div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10"></div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10"></div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>

                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10" id="add1"><input type="text" name="ship_address1" id="ship_address1" data-toggle="tooltip" title="Enter Address line 1!!" placeholder="Address Line 1"></div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>

                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10" id="add2"><input type="text" name="ship_address2" id="ship_address2" data-toggle="tooltip" title="Enter Address line 2!!" placeholder="Address Line 2"></div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>

                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10" id="s_city">
                                    <select name="ship_city">

                                             <?php
                                    $result = cityDropdown();
                                    $i = 0;
                                    while ($row = mysql_fetch_array($result)) {
                                        $i++;
                                        echo "<option value='$i'>$row[0]</option>";
                                    }
                                    ?>

                                            </select>
                                </div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>

                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10"></div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10"></div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10"></div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10"></div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10"></div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10"></div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>

                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10" id="s_state">
                                    <select name="s_state" >

                                             <?php
                                    $result = stateDropdown();
                                    $i = 0;
                                    while ($row = mysql_fetch_array($result)) {
                                        $i++;
                                        echo "<option value='$i'>$row[0]</option>";
                                    }
                                    ?>

                                            </select>
                                </div>
                                
                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10"></div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10"></div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10"></div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10"></div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10"></div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10"></div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>

                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10" id="s_country"><input type="text" name="ship_country" id="ship_country" data-toggle="tooltip" title="Enter Your Country!!" placeholder="Country"></div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>

                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10" id="s_zipcode"><input type="number" name="ship_zipcode" id="ship_zipcode" data-toggle="tooltip" title="Enter Your Zip-Code!!" placeholder="Zip Code"></div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                            
                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10" id="sec_question"><center>Security Question</center></div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>

                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10"></div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10"></div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10"></div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10"></div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10"></div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10"></div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div> 

                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10"><select name="securityques" data-toggle="tooltip" title="Select Security Question!!">
                                    
                                             <?php
                                    $result = questionDropdown();
                                    $i = 0;
                                    while ($row = mysql_fetch_array($result)) {
                                        $i++;
                                        echo "<option value='$i'>$row[0]</option>";
                                    }
                                    ?>

                                            </select></div><div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                                
                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10"><input type="text" name="securityquesans" placeholder="Enter Answer!" style="margin-top: 10px;"></div>

                                <div class="col-lg-12 col-md-10 col-sm-10 col-xs-10"><button type="submit" class="btn btn-default">Signup</button></div>
                            </form>
                            
                        </div><!--/sign up form-->
                    </div>
                   
                </div>
            </div>
        </section><!--/form-->


       <?php include './footer.php';?>

       
<!--        <script src="js/jquery-ui.js.js"></script>-->
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.scrollUp.min.js"></script>
        <script src="js/price-range.js"></script>
        <script src="js/jquery.prettyPhoto.js"></script>
        <script src="js/modernizr.js"></script>
        <script src="js/validator.js"></script>
         <script src="js/main.js"></script>
<script>
$(function ()
{
     $('[data-toggle="tooltip"]').tooltip()
});
</script>
 <script>
 $('#same').change(function(){
  if($(this).prop("checked")) {
    $('#delivery_add').hide();
  } else {
    $('#delivery_add').show();
  }
});
 $('#same').change(function(){
  if($(this).prop("checked")) {
    $('#add1').hide();
  } else {
    $('#add1').show();
  }
});
 $('#same').change(function(){
  if($(this).prop("checked")) {
    $('#add2').hide();
  } else {
    $('#add2').show();
  }
});

 $('#same').change(function(){
  if($(this).prop("checked")) {
    $('#s_city').hide();
  } else {
    $('#s_city').show();
  }
});
 $('#same').change(function(){
  if($(this).prop("checked")) {
    $('#s_state').hide();
  } else {
    $('#s_state').show();
  }
});
 $('#same').change(function(){
  if($(this).prop("checked")) {
    $('#s_country').hide();
  } else {
    $('#s_country').show();
  }
});
 $('#same').change(function(){
  if($(this).prop("checked")) {
    $('#s_zipcode').hide();
  } else {
    $('#s_zipcode').show();
  }
});

 </script>
 <?php include 'CheckLogin.php';
        ?>
</body></html>