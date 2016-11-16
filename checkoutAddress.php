

<?php
header('Cache-Control: no cache'); //no cache
session_cache_limiter('must-revalidate');

session_start();
include 'database_layer.php';
$con = mysql_connect("localhost", "root", "") or die("Error connecting to server" . mysql_error());
$db_select = mysql_select_db("jwelleryshop") or die("Error connecting to Database" . mysql_error());


$tablename = "cartTable";
$res = mysql_query("SELECT table_name FROM information_schema.tables WHERE table_name = '$tablename';");
$count = mysql_num_rows($res);

if ($count > 0) {
    //echo ' Cart Table Existing';
} else {
    $query = "CREATE TABLE cartTable (
                            serial_no INT AUTO_INCREMENT PRIMARY KEY,
                            product_id INT,
                            Quantity INT,
                            FOREIGN KEY (product_id) REFERENCES ldj_product(product_id)

                            )";

    $result = mysql_query($query);
    //echo "Cart Table Result : " . $result;
}
?>
<!DOCTYPE html>
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
        <script src="js/jquery.min.js"></script>
        <script src="js/jquery-2.1.1.js"></script>

        <script type="text/javascript">
            function addtoCart(value, qty)
            {
                alert("addcart");
                alert(value);
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {  // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function () {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                        alert(xmlhttp.responseText);
                        if (xmlhttp.responseText == 0)
                        {
                            alert("disable");
                            $(document).ready(function () {
                                $("#submitproduct").prop("disabled", true);
                                document.getElementById("submitinfo").innerHTML = "Product Added into the cart";
                            });
                        }
                        else if (xmlhttp.responseText == 1)
                        {
                            document.getElementById("submitinfo").innerHTML = "Problem inserting";

                        }
                        else if (xmlhttp.responseText == 2)
                        {
                            $(document).ready(function () {
                                alert("modal");
                                $("#submitModal").modal('show');
                            });
                        }
                    }

                }
                xmlhttp.open("GET", "AddCart.php?value=" + value + "&quantity=" + qty, true);
                xmlhttp.send();


            }


            function displayCart()
            {
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {  // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function () {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        document.getElementById('displaycart').innerHTML = xmlhttp.responseText;
                    }
                }
                xmlhttp.open("GET", "DisplayCart.php", true);
                xmlhttp.send();
            }

            function deletecart(deleteid)
            {
                //alert("delete");
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {  // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function () {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        alert(xmlhttp.responseText);
                        if (xmlhttp.responseText == 0)
                        {
                            alert("enable");
                            $(document).ready(function () {
                                $("#submitproduct").prop("disabled", false);
                                document.getElementById("submitinfo").innerHTML = "";
                            });
                            displayCart();
                        }
                        else
                        {
                            //alert("disable");
                            $(document).ready(function () {
                                $("#submitproduct").prop("disabled", true);
                                document.getElementById("submitinfo").innerHTML = "Product Added into the cart";
                            });

                        }

                    }
                }
                xmlhttp.open("GET", "DeleteCart.php?value=" + deleteid, true);
                xmlhttp.send();

            }


            function editShipAdd()
            {
                $(document).ready(function () {



                    $('#shippingAddEdit').show(500);
                    $('#InitialShipDetails').hide(500);
                });
            }

            function hideEditDetails()
            {
                checkLogin();
                $(document).ready(function () {

                    $('#shippingAddEdit').hide();
                    $('#billingAddEdit').hide();
                });
            }
            function editBillAdd()
            {
                $(document).ready(function () {



                    $('#billingAddEdit').show(500);
                    $('#InitialBillDetails').hide(500);
                });
            }

            function saveShipAdd()
            {
                var add1 = document.getElementById("ship_address1").value;
                var add2 = document.getElementById("ship_address2").value;
                var city = document.getElementById("ship_city").value;
                var state = document.getElementById("ship_state").value;
                var country = document.getElementById("ship_country").value;
                var zipcode = document.getElementById("ship_zipcode").value;
                var shipid = document.getElementById("ship_id").value;
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {  // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function () {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//                        alert(xmlhttp.responseText);
                        document.getElementById("InitialShipDetails").innerHTML = xmlhttp.responseText;
                        $(document).ready(function () {
                            $('#InitialShipDetails').show(500);
                            $('#shippingAddEdit').hide(500);

                        });
                    }
                }
                xmlhttp.open("POST", "EditShippingAddress.php", true);
                xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xmlhttp.send("shipid=" + shipid + "&add1=" + add1 + "&add2=" + add2 + "&city=" + city + "&state=" + state + "&country=" + country + "&zipcode=" + zipcode);
            }

            function saveBillAdd()
            {
                var add1 = document.getElementById("bill_address1").value;
                var add2 = document.getElementById("bill_address2").value;
                var city = document.getElementById("bill_city").value;
                var state = document.getElementById("bill_state").value;
                var country = document.getElementById("bill_country").value;
                var zipcode = document.getElementById("bill_zipcode").value;
                var billid = document.getElementById("bill_id").value;
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {  // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function () {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//                        alert(xmlhttp.responseText);
                        document.getElementById("InitialBillDetails").innerHTML = xmlhttp.responseText;
                        $(document).ready(function () {
                            $('#InitialBillDetails').show(500);
                            $('#billingAddEdit').hide(500);

                        });
                    }
                }
                xmlhttp.open("POST", "EditbillingAddress.php", true);
                xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xmlhttp.send("billid=" + billid + "&add1=" + add1 + "&add2=" + add2 + "&city=" + city + "&state=" + state + "&country=" + country + "&zipcode=" + zipcode);
            }
        </script>
        <script>
            $(document).ready(function () {

                $("#reviewform1").hide();

            });


//                     $(document).ready(function(){
//                        $("#review").click(function(){
//                        $("#reviewform1").show();
//                        
//                        });
//                    });

            document.getElementById('reviewform1').style.visibility = "hidden";

            function checkreview()
            {
                var status;

                alert("hello");
                document.getElementById('reviewform1').style.visibility = "visible";
                if (window.XMLHttpRequest)
                {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                }
                else
                {  // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function () {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        status = xmlhttp.responseText;

                    }
                    ;
                }

                if (status == "no")
                {
//                    document.getElementById('reviewform').style.display="block";
                    window.location.replace("login_user.php");
                }

                xmlhttp.open("POST", "checkrev.php", true);
                xmlhttp.send();


            }


            function func()
            {
                document.getElementById('reviewform').style.visibility = "hidden";
            }


            imagechange(value)
            {
//                    var oFReader = new FileReader();
//                oFReader.readAsDataURL(document.getElementById("getimage").files[0]);
//
//                oFReader.onload = function (oFREvent) {
                document.getElementById("img1").src = value;
//                };
            }
        </script>

    </head>

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

    <?php
//    $_SESSION['email']="";
//    $mail="";
//    $mail=$_SESSION['email'];

    if (isset($_SESSION['email'])) {
        ?>
        <script> $(document).ready(function () {
                $("#review").click(function () {
                    $("#reviewform1").show();
                });
            });</script>
        <?php
    } else {
        ?>
        <script> $(document).ready(function () {
                $("#review").click(function () {
                    window.location.replace("login_user.php");
                });
            });</script><?php }
    ?>
    <body onload="hideEditDetails()">

        <?php
        $cartproduct = mysql_query("Select * from cartTable where product_id=" . $_SESSION['productid']);

        if (mysql_num_rows($cartproduct) > 0) {
            //echo 'disable';
            ?>
            <script>
                //alert("disable");
                $(document).ready(function () {
                    $("#submitproduct").prop("disabled", true);
                    document.getElementById("submitinfo").innerHTML = "Product Existing into the cart";
                });

            </script>

            <?php
        } else {
            //echo 'enable';
            ?>
            <script type="text/javascript">
                // alert("enable");
                $(document).ready(function () {
                    $("#submitproduct").prop("disabled", false);
                });
            </script>

            <?php
        }
        ?>
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



        <!-- Modal -->
        <div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">CART ITEMS</h4>
                    </div>
                    <div class="modal-body">
                        <div id="displaycart"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" style="float: left;"onclick="window.location.replace('../LoungeDeJewelWebsite/home.php')">Continue Shopping</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="alert('Proceed to payment')">Proceed To Checkout</button>

                    </div>
                </div>
            </div>
        </div>
        <!--Modal-->

        <!--          Limit Exceed Modal -->
        <div class="modal fade" id="submitModal" tabindex="-1" role="dialog" aria-labelledby="mysubmitModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">

                        <h4 class="modal-title" id="myModalLabel">NOTE</h4>
                    </div>
                    <div class="modal-body">
                        <h1>You Cannot Add More Than 8 Items In The Cart</h1>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div>
        <!--        Limit Exceed Modal-->






        <!--<Login check modal>-->
        <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">Expired Session</h4>
                    </div>
                    <div class="modal-body">
                        Your Session has expired please login again!!
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="goBack()"  id='modaldel'  >Move To Login</button>
                    </div>
                </div>
            </div>
        </div> 
        <!--    </Login check modal>-->




        <div class="row" id="address">
            <div class="col-lg-12">
                <div class="col-lg-2 col-xs-1 col-md-1 col-sm-1"></div>
                <!--Shipping Address-->
                <div class="col-lg-4 col-sm-4 col-xs-4 col-md-4" id="InitialShipDetails">

                    <div class="panel panel-default">
                        <div class="panel-heading">Shipping Address</div>
                        <div class="panel-body">

                            <form class="form-horizontal" role="form" method="post" action="" id="editform">
                                <?php
//                                        echo $_SESSION['email'];
                                $selectquery = mysql_query("Select * from ldj_user");

                                if (mysql_num_rows($selectquery) > 0) {
                                    while ($row1 = mysql_fetch_array($selectquery)) {

                                        if ($row1['user_email_id'] == $_SESSION['email']) {
                                            $uid = $row1['user_id'];

                                            $shippingAddID = mysql_query("Select * from ldj_user_shipping_address where user_id='$uid'");
//                                                          echo $shippingAdd;
                                            while ($row2 = mysql_fetch_array($shippingAddID)) {
                                                $shipid = $row2['shipping_id'];
                                                $shippingAdd = mysql_query("Select * from ldj_shipping_address where shipping_id='$shipid'");
//                                                              echo $shippingAdd;
                                                while ($row3 = mysql_fetch_array($shippingAdd)) {
                                                    ?>
                                                    <div class="form-group">
                                                        <label class="col-lg-6 col-sm-5 col-xs-2"><?php echo $row1['user_fname'] . " " . $row1['user_lname']; ?></label>

                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-lg-5 col-sm-5 col-xs-2 ">Address Line 1</label>
                                                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-6 ">

                                                            <label class="col-lg-10 col-sm-7 col-xs-2 "><?php echo $row3['add_line_1']; ?></label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-lg-5 col-sm-5 col-xs-2 ">Address Line 2</label>
                                                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-6 ">

                                                            <label class="col-lg-10 col-sm-9 col-xs-2"><?php echo $row3['add_line_2']; ?></label>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-lg-5 col-sm-5 col-xs-2 ">City</label>
                                                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-6 ">

                                                            <label class="col-lg-10 col-sm-9 col-xs-2 ">

                                                                <?php
                                                                $cityid = $row3['city_id'];
                                                                $city = mysql_query("Select city_name from ldj_city where city_id='$cityid'");
                                                                while ($row4 = mysql_fetch_array($city)) {
                                                                    echo $row4['city_name'];
                                                                }
                                                                ?>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-lg-5 col-sm-5 col-xs-2 ">State</label>
                                                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-6 ">

                                                            <label class="col-lg-10 col-sm-9 col-xs-2 ">
                                                                <?php
                                                                $stateid = $row3['States_id'];
                                                                $state = mysql_query("Select State_name from ldj_states where States_id='$stateid'");
                                                                while ($row4 = mysql_fetch_array($state)) {
                                                                    echo $row4['State_name'];
                                                                }
                                                                ?></label>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-lg-5 col-sm-5 col-xs-2 ">Country</label>
                                                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-6 ">

                                                            <label class="col-lg-10 col-sm-9 col-xs-2 "><?php echo $row3['country']; ?></label>
                                                        </div>
                                                    </div>  
                                                    <div class="form-group">
                                                        <label class="col-lg-5 col-sm-5 col-xs-2 ">Zip Code</label>
                                                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-6 ">

                                                            <label class="col-lg-10 col-sm-9 col-xs-2 "><?php echo $row3['zip_code']; ?></label>
                                                        </div>
                                                    </div>  



                                                    <?php
                                                }
                                            }
                                        }
                                    }
                                }
                                ?>

                                <div class="panel-footer">

                                    <button type="button" class="btn btn-default" onclick="editShipAdd()" style="float: right;">Edit</button> 
                                </div>
                            </form>  
                        </div>
                    </div>
                </div>
                <!--Shipping Details-->

                <!--Shipping Form-->
                <div class="col-lg-4 col-sm-4 col-xs-4 col-md-4" id="shippingAddEdit">
                    <div class="signup-form">
                        <form action="" id="regform" method="post" class="col-lg-12">

                            <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10" id="delivery_add"><center>Shipping Address</center></div>
                            

                            <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10"></div>
                            
                            <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10"></div>
                            
                            <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10"></div>
                            
                            <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10"></div>
                            
                            <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10"></div>
                            
                            <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10"></div>
                            


                            <?php
                            $selectquery = mysql_query("Select * from ldj_user");

                            if (mysql_num_rows($selectquery) > 0) {
                                while ($row1 = mysql_fetch_array($selectquery)) {

                                    if ($row1['user_email_id'] == $_SESSION['email']) {
                                        $uid = $row1['user_id'];

                                        $shippingAddID = mysql_query("Select * from ldj_user_shipping_address where user_id='$uid'");
//                                                          echo $shippingAdd;
                                        while ($row2 = mysql_fetch_array($shippingAddID)) {
                                            $shipid = $row2['shipping_id'];
                                            $shippingAdd = mysql_query("Select * from ldj_shipping_address where shipping_id='$shipid'");
//                                                              echo $shippingAdd;
                                            while ($row3 = mysql_fetch_array($shippingAdd)) {
                                                ?>
                                                <input type="hidden" value="<?php echo $shipid; ?>" id="ship_id" name="ship_id" />
                                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10" id="shipadd1"><input type="text" name="ship_address1" id="ship_address1" data-toggle="tooltip" title="Enter Address line 1!!" placeholder="Address Line 1" value="<?php echo $row3['add_line_1']; ?>"></div>
                                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>

                                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10" id="shipadd2"><input type="text" name="ship_address2" id="ship_address2" data-toggle="tooltip" title="Enter Address line 2!!" placeholder="Address Line 2" value="<?php echo $row3['add_line_2']; ?>"></div>
                                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>

                                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10" id="shipcity">
                                                    <select name="ship_city" id="ship_city">

                                                        <?php
                                                        $cityid = $row3['city_id'];
                                                        $city = mysql_query("Select * from ldj_city ");
                                                        while ($row4 = mysql_fetch_array($city)) {
                                                            if ($cityid == $row4['city_id']) {
                                                                echo "<option value=" . $row4['city_name'] . " selected='selected'>" . $row4['city_name'] . "</option>";
                                                            } else {
                                                                echo "<option value=" . $row4['city_name'] . ">" . $row4['city_name'] . "</option>";
                                                            }
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

                                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10" id="shipstate">
                                                    <select name="ship_state" id="ship_state">

                                                        <?php
                                                        $stateid = $row3['States_id'];
                                                        $state = mysql_query("Select State_name from ldj_states ");
                                                        while ($row4 = mysql_fetch_array($state)) {
                                                            if ($stateid == $row4['States_id']) {
                                                                echo "<option value=" . $row4['State_name'] . " selected='selected'>" . $row4['State_name'] . "</option>";
                                                            } else {
                                                                echo "<option value=" . $row4['State_name'] . ">" . $row4['State_name'] . "</option>";
                                                            }
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

                                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10" id="shipcountry"><input type="text" name="ship_country" id="ship_country" data-toggle="tooltip" title="Enter Your Country!!" placeholder="Country" value="<?php echo $row3['country']; ?>"></div>
                                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>

                                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10" id="shipzipcode"><input type="number" name="ship_zipcode" id="ship_zipcode" data-toggle="tooltip" title="Enter Your Zip-Code!!" placeholder="Zip Code" value="<?php echo $row3['zip_code']; ?>"></div>
                                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>

                                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10" id="Save"><button type="button" class="btn btn-default btn-block" onclick="saveShipAdd()" >Save</button></div>
                                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                                            </form>
                                        </div>
                                    </div>


                                    <?php
                                }
                            }
                        }
                    }
                }
                ?>
                <!--Shipping Form-->

                <!--Billing Details-->


                
                <div class="col-lg-4 col-sm-6 col-xs-6 col-md-6" id="InitialBillDetails">

                    <div class="panel panel-default">
                        <div class="panel-heading">Billing Address</div>
                        <div class="panel-body">

                            <form class="form-horizontal" role="form" method="post" action="">
                                <?php
//                                        echo $_SESSION['email'];
                                $selectquery = mysql_query("Select * from ldj_user");

                                if (mysql_num_rows($selectquery) > 0) {
                                    while ($row1 = mysql_fetch_array($selectquery)) {

                                        if ($row1['user_email_id'] == $_SESSION['email']) {
                                            $uid = $row1['user_id'];

                                            $billingAddID = mysql_query("Select * from ldj_user_billing_address where user_id='$uid'");
//                                                          echo $shippingAdd;
                                            while ($row2 = mysql_fetch_array($billingAddID)) {
                                                $billid = $row2['billing_add_id'];
                                                $sbillingAdd = mysql_query("Select * from ldj_billing_address where billing_add_id='$billid'");
//                                                              echo $shippingAdd;
                                                while ($row3 = mysql_fetch_array($sbillingAdd)) {
                                                    ?>
                                                    <div class="form-group">
                                                        <label class="col-lg-6 col-sm-5 col-xs-2"><?php echo $row1['user_fname'] . " " . $row1['user_lname']; ?></label>

                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-lg-5 col-sm-5 col-xs-2 ">Address Line 1</label>
                                                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-6 ">

                                                            <label class="col-lg-10 col-sm-9 col-xs-2 "><?php echo $row3['add_line_1']; ?></label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-lg-5 col-sm-5 col-xs-2 ">Address Line 2</label>
                                                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-6 ">

                                                            <label class="col-lg-10 col-sm-9 col-xs-2"><?php echo $row3['add_line_2']; ?></label>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-lg-5 col-sm-5 col-xs-2 ">City</label>
                                                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-6 ">

                                                            <label class="col-lg-10 col-sm-9 col-xs-2 ">

                                                                <?php
                                                                $cityid = $row3['city_id'];
                                                                $city = mysql_query("Select city_name from ldj_city where city_id='$cityid'");
                                                                while ($row4 = mysql_fetch_array($city)) {
                                                                    echo $row4['city_name'];
                                                                }
                                                                ?>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-lg-5 col-sm-5 col-xs-2 ">State</label>
                                                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-6 ">

                                                            <label class="col-lg-10 col-sm-9 col-xs-2 ">
                                                                <?php
                                                                $stateid = $row3['States_id'];
                                                                $state = mysql_query("Select State_name from ldj_states where States_id='$stateid'");
                                                                while ($row4 = mysql_fetch_array($state)) {
                                                                    echo $row4['State_name'];
                                                                }
                                                                ?></label>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-lg-5 col-sm-5 col-xs-2 ">Country</label>
                                                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-6 ">

                                                            <label class="col-lg-10 col-sm-9 col-xs-2 "><?php echo $row3['country']; ?></label>
                                                        </div>
                                                    </div>  
                                                    <div class="form-group">
                                                        <label class="col-lg-5 col-sm-5 col-xs-2 ">Zip Code</label>
                                                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-6 ">

                                                            <label class="col-lg-10 col-sm-9 col-xs-2 "><?php echo $row3['zip_code']; ?></label>
                                                        </div>
                                                    </div>  



                                                    <?php
                                                }
                                            }
                                        }
                                    }
                                }
                                ?>

                                <div class="panel-footer">

                                    <button type="button" class="btn btn-default" onclick="editBillAdd()" style="float: right;">Edit</button> 
                                </div>
                            </form>  
                        </div>
                    </div>
                </div>
                <!--Billing Details-->

                <!--Billing Form-->
                <div class="col-lg-4 col-sm-4 col-xs-4" id="billingAddEdit">
                    <div class="signup-form">
                        <form action="" id="regform" method="post" class="col-lg-12" >

                            <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10" id="delivery_add"><center>Billing Address</center></div>
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
                            <?php
                            $selectquery = mysql_query("Select * from ldj_user");

                            if (mysql_num_rows($selectquery) > 0) {
                                while ($row1 = mysql_fetch_array($selectquery)) {

                                    if ($row1['user_email_id'] == $_SESSION['email']) {
                                        $uid = $row1['user_id'];

                                        $billingAddID = mysql_query("Select * from ldj_user_billing_address where user_id='$uid'");
//                                                          echo $shippingAdd;
                                        while ($row2 = mysql_fetch_array($billingAddID)) {
                                            $billid = $row2['billing_add_id'];
                                            $sbillingAdd = mysql_query("Select * from ldj_billing_address where billing_add_id='$billid'");
//                                                              echo $shippingAdd;
                                            while ($row3 = mysql_fetch_array($sbillingAdd)) {
                                                ?>
                                                <input type="hidden" value="<?php echo $billid; ?>" id="bill_id" name="bill_id" />
                                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10" id="add1"><input type="text" name="bill_address1" id="bill_address1" data-toggle="tooltip" title="Enter Address line 1!!" placeholder="Address Line 1" value="<?php echo $row3['add_line_1']; ?>"></div>
                                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>

                                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10" id="add2"><input type="text" name="bill_address2" id="bill_address2" data-toggle="tooltip" title="Enter Address line 2!!" placeholder="Address Line 2"ship_address2 value="<?php echo $row3['add_line_2']; ?>"></div>
                                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>

                                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10" id="billcity">
                                                    <select name="bill_city" id="bill_city">

                                                        <?php
                                                        $cityid = $row3['city_id'];
                                                        $city = mysql_query("Select * from ldj_city ");
                                                        while ($row4 = mysql_fetch_array($city)) {
                                                            if ($cityid == $row4['city_id']) {
                                                                echo "<option value=" . $row4['city_name'] . " selected='selected'>" . $row4['city_name'] . "</option>";
                                                            } else {
                                                                echo "<option value=" . $row4['city_name'] . ">" . $row4['city_name'] . "</option>";
                                                            }
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

                                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10" id="billstate">
                                                    <select name="bill_state" id="bill_state">

                                                        <?php
                                                        $stateid = $row3['States_id'];
                                                        $state = mysql_query("Select State_name from ldj_states ");
                                                        while ($row4 = mysql_fetch_array($state)) {
                                                            if ($stateid == $row4['States_id']) {
                                                                echo "<option value=" . $row4['State_name'] . " selected='selected'>" . $row4['State_name'] . "</option>";
                                                            } else {
                                                                echo "<option value=" . $row4['State_name'] . ">" . $row4['State_name'] . "</option>";
                                                            }
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

                                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10" id="billcountry"><input type="text" name="bill_country" id="bill_country" data-toggle="tooltip" title="Enter Your Country!!" placeholder="Country" value="<?php echo $row3['country']; ?>"></div>
                                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>

                                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10" id="billzipcode"><input type="number" name="bill_zipcode" id="bill_zipcode" data-toggle="tooltip" title="Enter Your Zip-Code!!" placeholder="Zip Code" value="<?php echo $row3['zip_code']; ?>"></div>
                                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>

                                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10" id="Save"><button type="button" class="btn btn-default btn-block" onclick="saveBillAdd()" >Save</button></div>
                                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>

                                            </form>
                                        </div>
                                    </div>

                                    <?php
                                }
                            }
                        }
                    }
                }
                ?>
                <!--Billing Form-->

            </div>
        </div>
    </div>
</div>

<div class="container">
    <div id="row">
        <div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">
        <div class="col-lg-3 col-xs-2 col-md-2 col-sm-2">
</div>
            <div class="col-lg-4 col-xs-4 col-md-4 col-sm-4 ">
                <button type="button" class="btn btn-default btn-primary" onclick="window.location.replace('billdetails.php')" style="float: right;">Proceed to Order Summary</button> 
            </div>
        <div class="col-lg-2 col-xs-2 col-md-2 col-sm-2">
</div>
    </div>
        </div>
</div>

<br><br>
<?php
include 'footer.php';
?>





<script src="js/jquery.js"></script>
<!--        <script src="js/bootstrap.js"></script>-->
<script src="js/price-range.js"></script>
<script src="js/jquery.scrollUp.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/main.js"></script>

<?php
echo '<script>function checkLogin()'
 . '{';

if (!isset($_SESSION['username'])) {
    ?>  $(document).ready(function() {
    $('#address').hide();        
    $('#loginModal').modal('show');



    });
    <?php
    echo '}function goBack() {
                location.replace("login.php");
            ';
}

echo '}</script>';
?>

<?php include 'CheckLogin.php';
        ?>




</body>
</html>
