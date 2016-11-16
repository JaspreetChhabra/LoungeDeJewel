<!--New File-->

<?php
header('Cache-Control: no cache'); //no cache
session_cache_limiter('must-revalidate');

session_start();

$con = mysql_connect("localhost", "root", "") or die("Error connecting to server" . mysql_error());
$db_select = mysql_select_db("jwelleryshop") or die("Error connecting to Database" . mysql_error());

$tablename = "cartTable";
$res = mysql_query("SELECT table_name FROM information_schema.tables WHERE table_name = '$tablename';");
$count = mysql_num_rows($res);

if ($count > 0) {
//    echo ' Cart Table Existing';
} else {
    $query = "CREATE TABLE cartTable (
                            serial_no INT AUTO_INCREMENT PRIMARY KEY,
                            product_id INT,
                            Quantity INT,
                            FinalPrice DOUBLE,
                            FOREIGN KEY (product_id) REFERENCES ldj_product(product_id)

                            )";

    $result = mysql_query($query);
//    echo "Cart Table Result : " . $result;
}

if (empty($_REQUEST['pid'])) {
    $_REQUEST['pid'] = $_SESSION['productid'];
    //echo "empty request : " . $_REQUEST['pid'];
} else {
    $_SESSION['productid'] = $_REQUEST['pid'];
}

//echo 'Request id :' . $_REQUEST['pid'] . '<br/>';
//echo 'Session id :' . $_SESSION['productid'] . '<br/>';
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
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="js/jquery-2.1.1.js"></script>

        <script type="text/javascript">
            function addtoCart(value, qty, sp)
            {
//                alert("addcart");
//                alert(sp);
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {  // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function () {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

//                        alert(xmlhttp.responseText);
                        if (xmlhttp.responseText == 0)
                        {
//                            alert("disable");
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
//                                alert("modal");
                                $("#submitModal").modal('show');
                            });
                        }
                    }

                }
                xmlhttp.open("GET", "AddCart.php?value=" + value + "&quantity=" + qty + "&sp=" + sp, true);
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
//                        alert(xmlhttp.responseText);
                        if (xmlhttp.responseText == 0)
                        {
//                            alert("enable");
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

//                alert("hello");
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

            function review(value)
            {
//                alert("hiiii" + value);
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {  // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function () {
                    if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                        //document.getElementById('displaycart').innerHTML = xmlhttp.responseText;
                    }

                }
                xmlhttp.open("GET", "feedbackhandler.php?value=" + value, true);
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

            function clickimg()
            {
                //alert("clicked");
                var value1 = document.getElementById("img1preview").src;
                $(document).ready(function () {
                    $('#imgmain').attr("src", value1);
                });
            }


            function clickimg1()
            {
                //alert("clicked");
                var value1 = document.getElementById("img1preview1").src;
                $(document).ready(function () {
                    $('#imgmain').attr("src", value1);
                });
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
    <style>
        
        input[type=button]{
            color: #FF496B;
        }
    </style>

    <?php
//    $_SESSION['email']="";
//    $mail="";
//    $mail=$_SESSION['email'];
    

    if (isset($_SESSION['email'])) {
        //$mail =$_SESSION['email'];
        ?>
        <script> $(document).ready(function () {
                $("#review").click(function () {
                    $("#reviewform1").show();
                });
            });
            $mail = $_SESSION['email'];
        </script>
        <?php
    } else {
        ?>
        <script> $(document).ready(function () {
                $("#review").click(function () {
                    window.location.replace("login_user.php");
                });
            });</script><?php }
    ?>
    <body>

        <?php
        $cartproduct = mysql_query("Select * from cartTable");
        while ($cartproductID = mysql_fetch_array($cartproduct)) {
//            echo $cartproductID['product_id'];

            if ($cartproductID['product_id'] == $_SESSION['productid']) {
//            echo $cartproductID['product_id'];
//            echo 'disable';
                ?>
                <script>
        //                alert("disable");
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
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="window.location.replace('../LoungeDeJewelWebsite/checkoutAddress.php')">Proceed To Checkout  </button>

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



        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="left-sidebar">
                            <h2>Category</h2>
                            <div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="shop.php?value=Earrings">Earrings</a>
<!--										<a data-toggle="collapse" data-parent="#accordian" href="#earring">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Earring
										</a>-->
									</h4>
								</div>
<!--								<div id="earring" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="#">Dangler </a></li>
											<li><a href="#">Studs </a></li>
											<li><a href="#">Jhumki </a></li>
											<li><a href="#">Bali</a></li>
										</ul>
									</div>
								</div>-->
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="shop.php?value=Necklace">Necklaces</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="shop.php?value=Pendants">Pendant Sets</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="shop.php?value=Rings">Rings</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="shop.php?value=Bangles">Bangles</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="shop.php?value=Tikkas">Tikkas</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="shop.php?value=NosePins">Nose Pins</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="shop.php?value=Bridal">Bridal</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="shop.php?value=Anklets">Anklets</a></h4>
								</div>
							</div>
                                                        <div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="shop.php?value=Exclusive">Exclusive</a></h4>
								</div>
							</div>
                                                        <div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="shop.php?value=MangalSutra">MangalSutra</a></h4>
								</div>
							</div>
							
						</div><!--/category-products-->

                        </div>
                    </div>

                    <div class="col-sm-9 padding-right">
                        <div class="product-details"><!--product-details-->

                            <?php
                            $query = mysql_query("Select * from ldj_product WHERE product_id=" . $_SESSION['productid']);

                            while ($row = mysql_fetch_array($query)) {

                                $data = $row['product_img_path'];
                                $xml = new SimpleXMLElement($data);


                                $_SESSION['qty'] = $row['stock_quantity'];
                                $_SESSION['cid'] = $row['category_id'];
//                                echo $_SESSION['cid'];
                                $_SESSION['pattr'] = $row['product_attribute'];
                                $_SESSION['desc']=$row['product_desc'];

                                $_SESSION['pnm'] = $row['product_name'];
                                $_SESSION['price'] = $row['product_selling_price'];
                            }
                            ?>
                            <div class="col-sm-5">
                                <div class="view-product">
                                    <img id="imgmain" src="<?php echo $xml->image[0]; ?>" alt="" />
                                    <!--                                    <h3>ZOOM</h3>-->
                                </div>

                                <div id="similar-product" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="">
                                            <a ><img src='<?php echo $xml->image[0]; ?>' id="img1preview1"  alt="" height="125px;" width="125px;" onclick="clickimg1()"></a>
                                            <a><img src='<?php echo $xml->image[1]; ?>' id="img1preview" alt="" height="125px;" width="125px;" onclick="clickimg()"></a>
<!--										  <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>-->
                                        </div>
                                    </div>

                                </div>

                            </div>


                            <div class="col-sm-7">
                                <div class="product-information"><!--/product-information-->

                                    <h2><?php echo "<h2>" . $_SESSION['pnm'] . "</h2>"; ?></h2>
<!--                                    <p>Web Product ID: <?php //echo $_SESSION['productid'];        ?></p>-->
<!--								<img src="images/product-details/rating.png" alt="" />-->
                                    <span>
                                        <span><?php echo " Rs." . $_SESSION['price']; ?></span>

                                        <br><br>
                                        <?php
                                        $selectDiscount = mysql_query("Select * from ldj_discount where product_id=" . $_SESSION['productid']);


                                        if (mysql_num_rows($selectDiscount) > 0) {

                                            while ($selectDiscountvalue = mysql_fetch_array($selectDiscount)) {
                                                date_default_timezone_set('Asia/Calcutta');
                                                $cd = date('Y-m-d');
//                                                echo "valid from " . $selectDiscountvalue['valid_from'];
//                                                echo "valid to " . $selectDiscountvalue['valid_to'];


                                                if (strtotime($cd) > strtotime($selectDiscountvalue['valid_from'])) {

                                                    if (strtotime($selectDiscountvalue['valid_to']) > strtotime($cd)) {
//                                                        echo '1';
                                                        echo "<br>Discount " . $selectDiscountvalue['product_discount(%)'] . " %<br><br>";
                                                        $discount = round($_SESSION['price'] - (($_SESSION['price'] * $selectDiscountvalue['product_discount(%)']) / 100), 2);
                                                        ?> <div style='color: #FF496B; font-weight: bolder;'><?php echo "Discounted Price Rs " . $discount; ?>
                                                        </div><?php
                                        $_SESSION['sp'] = $discount;
                                    }
                                }
                            }
                        } else {
                            $_SESSION['sp'] = $_SESSION['price'];
                        }
                                        ?> 



                                        <form method="POST" action="" id="reviewfrom">
                                            <br>
                                            <!--                                            <div class = "cart_quantity_button">
                                                                                            <a class = "cart_quantity_up" href = ""> + </a>
                                                                                            <input class = "cart_quantity_input" type = "text" name = "quantity" value = "1" autocomplete = "off" size = "2">
                                                                                            <a class = "cart_quantity_down" href = ""> - </a>
                                                                                        </div>-->

<?php
if ($_SESSION['qty'] == 0) {
    ?>
                                                <script>
                                                    //alert("disable");
                                                    $(document).ready(function () {
                                                        $("#submitproduct").prop("disabled", true);
                                                        document.getElementById("submitinfo").innerHTML = "Product Not in Stock";
                                                    });

                                                </script>
    <?php
} else {
    ?>
                                                <b>Quantity</b>   <select id="quantity" style="width:50px;">

                                                <?php
                                                for ($index = 1; $index <= $_SESSION['qty']; $index++) {
                                                    echo '<option value=' . $index . '>' . $index . '</option>';
                                                }
                                                ?>

                                                </select>
                                                <?php }
                                                ?>

                                            <br>
                                            <input type="hidden" value="<?php echo $_SESSION['productid']; ?>" id="pid" placeholder="value"/>
                                            <input type="hidden" value="<?php echo $_SESSION['sp']; ?>" id="sp" placeholder="value"/>

                                            <br><br>
                                            <button type="button" class="btn btn-default btn-primary" id='submitproduct' value="Add To Cart" onclick="addtoCart(<?php echo $_SESSION['productid']; ?>, quantity.value, <?php echo $_SESSION['sp']; ?>)" style="width:200px; height:50px;">Add To Cart</button>
                                            <br><br><div id="submitinfo" style="color: #FF496B; font-weight: bolder"><p><strong></strong ></p></div>
                                            <br><br>

                                            <input type="button" id="review" value="Write a Review" onclick="checkreview()" class="btn btn-default add-to-cart btn btn-lg btn-success" style="width:200px; height:50px;">

                                            <div id="submitid"></div>

                                        </form>

    <!--                                        <input type="button" onclick="checkreview()" value="mybutton">-->
                                    </span>
<!--                                    <p><b>Availability:</b> In Stock</p>
                                    <p><b>Condition:</b> New</p>
                                    <p><b>Brand:</b> E-SHOPPER</p>-->

                                </div><!--/product-information-->
                            </div>



                        </div><!--/product-details-->
 <div class="tab-pane fade active in" id="reviews" >
                            <div class="col-sm-10" id="reviewfrom">
                                <div id="reviewform1">
                                    <p style="font-weight: bolder; font-size: larger; color: #FF496B;"><b>Write Your Review</b></p>
                                    <br><br>

                                    <form action="feedbackhandler.php" id="rev">
                                        <span>
                                            <input type="text" id="user_name" placeholder="Your Name"/>
<!--											<input type="email" placeholder="Email Address"/>-->

                                            <textarea id="rev" rows="4" cols="8" id="feedback_content" name="rev" placeholder="Your Review" ></textarea>
<!--                                        <b>Rating: </b> <img src="images/product-details/rating.png" alt="" />-->
                                        </span>
                                        <button type="button" value="Submit" onclick="review(rev.value)" class="btn btn-default pull-right">
                                            Submit
                                        </button>
                                        <div id="rev1"></div>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-lg-7">
                                <div class="product-details product-information">
                                    <span>
                                        <span style="margin-top:0px;">Product Specifications</span>
                                    </span>
                                    <table class="table table-responsive table-condensed">

                                        <tbody>
                                        <thead>
                                            <tr>
                                                <td style="font-weight: bolder;"><h4>Category </h4> </td>
                                                <td> <?php
                                            $category = mysql_query("Select * from ldj_product_category");
                                            while ($row1 = mysql_fetch_array($category)) {    
//                                                echo $row1['category_id'];
                                           if($row1['category_id'] == $_SESSION['cid'])
                                                                    {
                                                                        echo $row1['category_type'];
                                                                    }
 
                                                                   
                                                                        
                                                                    }
                                                                    ?></td>
                                                                </tr>
                                                                
                                                               <?php $data = $_SESSION['pattr'];
                                                                        $xml = new SimpleXMLElement($data); ?>
      
                                                        </thead>
                                                        
                                                            <tr>
                                                                    <td style="font-weight: bolder">
                                                            Description 
                                                                </td>
                                                                    <td>
                                                            
                                                                        <?php echo  $_SESSION['desc'];?>
                                                                </td>
                                                        </tr>
                                                        <tr>
                                                                    <td style="font-weight: bolder">
                                                            Occasion
                                                                </td>
                                                                    <td>
                                                            
                                                                        <?php echo  $xml->occasion[0];?>
                                                                </td>
                                                        </tr>
                                                        <tr>
                                                                    <td style="font-weight: bolder">
                                                            Material
                                                                </td>
                                                                    <td>
                                                            
                                                                        <?php echo  $xml->material[0];?>
                                                                </td>
                                                        </tr>
                                                        <tr>
                                                                    <td style="font-weight: bolder">
                                                            Colour
                                                                </td>
                                                                    <td>
                                                            
                                                                        <?php echo  $xml->color[0];?>
                                                                </td>
                                                        </tr>
                                                        <tr>
                                                                    <td style="font-weight: bolder">
                                                            Stone Type
                                                                </td>
                                                                    <td>
                                                            
                                                                        <?php echo  $xml->stoneType[0];?>
                                                                </td>
                                                        </tr>
                                                        <tr>
                                                                    <td style="font-weight: bolder">
                                                            Weight 
                                                                </td>
                                                                    <td>
                                                            
                                                                        <?php echo  $xml->weight[0];?>
                                                                </td>
                                                        </tr>
                                                    </tbody>
                                            </table>
                                           
                                       </div>
                                </div>
                        </div>

                       



                    </div>
                </div>
            </div>
        </section>
        <br>

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
        <?php include 'CheckLogin.php';
        ?>
    </body>
</html>