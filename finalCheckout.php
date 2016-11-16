<!DOCTYPE html>

<?php
header('Cache-Control: no cache'); //no cache
session_cache_limiter('must-revalidate');

session_start();

$con = mysql_connect("localhost", "root", "") or die("Error connecting to server" . mysql_error());
$db_select = mysql_select_db("jwelleryshop") or die("Error connecting to Database" . mysql_error());


$selectqueryID = mysql_query("Select * from ldj_user");

if (mysql_num_rows($selectqueryID) > 0) {
    while ($row11 = mysql_fetch_array($selectqueryID)) {

        if ($row11['user_email_id'] == $_SESSION['email']) {
            $uid = $row11['user_id'];
        }
    }
}

$cartSelect = mysql_query("Select * From cartTable");
if(mysql_num_rows($cartSelect) > 0 )
{
    
    $doc = new DOMDocument( );
    $ele = $doc->createElement('productInfo');
    $doc->appendChild($ele);
    
    
while ($cartInfo = mysql_fetch_array($cartSelect)) {
    $pid = $cartInfo['product_id'];
    $qty = $cartInfo['Quantity'];
    
    $ele1 = $doc->createElement('pid');
        $ele1->nodeValue = $pid;
        $ele->appendChild($ele1);
    
        $ele2 = $doc->createElement('qty');
        $ele2->nodeValue = $qty;
        $ele->appendChild($ele2);
}

$doc->save('productWishlistInfo.xml');

    $data = file_get_contents('productWishlistInfo.xml');
    
    
}
else
{
    $data='null';
}


$insertBillDetails = mysql_query("INSERT INTO ldj_bill_details values(null , $uid , '$data')");


$billIdSelect = mysql_query("Select bill_id from ldj_bill_details where user_id = '$uid'");

while ($billIdFetch = mysql_fetch_array($billIdSelect)) {
    $bid = $billIdFetch['bill_id'];
}


$_SESSION['bill_id']=$bid;
$_SESSION['user_id']=$uid;
?>
<html>


    <head>
        <meta charset="utf-8" />
        <title>Invoice | Lounge De Jewel</title>
        <link rel="shortcut icon" href="LOGO.gif">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet">
        <script src="js/jquery-2.1.1.js"></script>
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




        <div class="container">



            <!-- Simple Invoice - START -->
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="text-center">

                            
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xs-12 col-md-3 col-lg-12 ">
                                <div class="panel panel-default height">
                                    <div class="panel-heading" style="background-color:#FF496B;"><h5 style="color:#FFFFFF;">Shipping Address</h5></div>
                                    <div class="panel-body">
                                        <center>   <h1>Your Order Has Been Placed</h1> 
                                        <h2>Check Your Email</h2>
                                        <button type="button" id="placeOrder" class="btn btn-primary " onclick="window.location.replace('./home.php')" ><b>Continue Shopping</b></button>
                                        </center>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                

                    <style>
                        .height {
                            min-height: 200px;
                        }

                        .icon {
                            font-size: 47px;
                            color: #5CB85C;
                        }

                        .iconbig {
                            font-size: 77px;
                            color: #5CB85C;
                        }

                        .table > tbody > tr > .emptyrow {
                            border-top: none;
                        }

                        .table > thead > tr > .emptyrow {
                            border-bottom: none;
                        }

                        .table > tbody > tr > .highrow {
                            border-top: 3px solid;
                        }
                    </style>

                    <!-- Simple Invoice - END -->

                </div>
        <?php include 'footer.php'; ?>
        <script src="js/jquery.js"></script>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.scrollUp.min.js"></script>
<?php include 'CheckLogin.php';
        ?>
    </body>
</html>