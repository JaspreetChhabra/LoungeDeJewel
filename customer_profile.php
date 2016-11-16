<?php

session_start();
include 'database_layer.php';

?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Profile | Lounge De Jewel</title>

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
                                    <li id="wishlist"><a href="#" onclick="displayWishlist()" data-toggle="modal" data-target="#modalWishlist"><i class="fa fa-star"></i> Wishlist</a></li>

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
                            
                            <script>
                            function sendVal(val)
                            {
                                window.location.replace('http://localhost/LoungeDeJewelWebsite/shop.php?value=' + encodeURI(" "+val+" "));
                                
                            }
                            
                            </script>
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
                                        <button class="btn btn-default" type="submit" onclick="checkVal(datalist1.value)"><i class="glyphicon glyphicon-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>


                    </div>
                </div>
            </div><!--/header-bottom-->
        </header><!--/header-->


<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-9 col-lg-offset-1">
                    <h1 class="page-header">User Profile</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-9 col-lg-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            General Profile Information
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-10 col-sm-offset-1">

                                    <form class="form-horizontal" id="contactform" role="form" method="post" action="UpdateCustProfileHandler.php">
                                        <div class="form-group">
                                            <label class="col-sm-2 col-xs-2 control-label">First Name</label>
                                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-6 ">

                                                <input type="text" class="form-control" name="fname" data-toggle="tooltip" value="<?php echo $_SESSION['username'];?>" title="Enter alphabets only!" id="fname" placeholder="John" >
                                            </div>



                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 col-xs-2 control-label">Last Name</label>
                                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-6 ">
                                                <input type="text" class="form-control" name="lname" id="lname" data-toggle="tooltip" value="<?php echo $_SESSION['lname'];?>" title="Enter alphabets only!"  placeholder="Smith">
                                            </div>

                                        </div>
                                         <div class="form-group">
                                            <label class="col-sm-2 col-xs-2 control-label">Email - ID</label>
                                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-6 ">
                                                <input type="email" class="form-control" name="mail" id="mail" data-toggle="tooltip" value="<?php echo $_SESSION['mail'];?>" title="Must contain @ and .com!" placeholder="abc@xyzmail.com"  >
                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <label  class="col-sm-2 col-xs-2 control-label">Password</label>
                                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-6 ">
                                                <input type="password" class="form-control" name="password" data-toggle="tooltip" value="<?php echo $_SESSION['pass'];?>" title="Must be minimum of 8 characters long!" id="password"  >
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <label  class="col-sm-2 col-xs-2 control-label">Retype-Password</label>
                                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-6 ">
                                                <input type="password" class="form-control" name="pass2" data-toggle="tooltip" value="<?php echo $_SESSION['pass'];?>" title="Retype the password" id="password2" >
                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 col-xs-2 control-label">Mobile Number</label>
                                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-6 ">
                                                <input type="tel" class="form-control" name="mobileno" id="mobileno"data-toggle="tooltip" value="<?php echo $_SESSION['mobno'];?>" title="Must contain minimum 10 digits" placeholder="123456789">
                                            </div>

                                        </div>
                                       <div class="form-group">
                                            <label class="col-sm-2 col-xs-2 control-label">Landline Number</label>
                                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-6 ">
                                                <input type="tel" class="form-control" name="landlineno" id="landlineno" data-toggle="tooltip" value="<?php echo $_SESSION['landline'];?>" title="Residential landline no!" placeholder="2634081">
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 col-xs-2 control-label">Security Question</label>
                                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-6 ">
                                                <select class="form-control" name="securityques" id="securityques">
                                                    <option value="<?php echo $_SESSION['sec_ques'];?>"><?php echo $_SESSION['sec_ques'];?></option>
                                                    <option value="--select different question--">--select different question--</option>
                                             <?php
                                    $result = questionDropdown();
                                    $i = 0;
                                    while ($row = mysql_fetch_array($result)) {
                                        $i++;
                                        echo "<option value='$i'>$row[0]</option>";
                                    }
                                    ?>

                                            </select>

                                            </div>

                                        </div>

                                       <div class="form-group">
                                            <label class="col-sm-2 col-xs-2 control-label">Security Answer</label>
                                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-6 ">
                                                <input type="text" class="form-control" name="securityans" value="<?php echo $_SESSION['secans'];?>"id="securityans"  placeholder="myanswer">
                                            </div>

                                        </div>

                                        




                                        <div class="form-group">

                                            <div class="col-sm-offset-3 col-sm-6 col-xs-offset-2">
                                                <button type="submit" class="btn btn-default">Save changes</button>
                                                <button type="submit"  class="btn btn-default">Cancel</button>

                                            </div>
                                            <div class="col-sm-offset-2 col-sm-6">

                                            </div>

                                        </div>
                                    </form>
                                </div>

                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
<?php
include 'footer.php';

        ?>
        <script src="js/validator_admin.js"></script>
        <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/masonry.pkgd.min.js"></script>
    <script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/modernizr.js"></script>
    <script src="js/main.js"></script>

</body>
</html>