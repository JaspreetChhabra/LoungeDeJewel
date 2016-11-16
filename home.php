<?php
$con = mysql_connect("localhost", "root", "") or die("Error connecting to server" . mysql_error());
$db_select = mysql_select_db("jwelleryshop") or die("Error connecting to Database" . mysql_error());
session_start();
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
        <script src="js/jquery-2.1.1.js"></script>
        <script>
            $(document).ready(function () {
                //alert("Hello world");

                $('.sub-menu li a').click(function () {
                    //                    alert($(this).text());
                    var val = $(this).text();
                    //alert(val);
                    //                        $.post("shop.php" , {key:'value',value:'val'});
                    //                          $.get("shop.php?value"+val);

                    //                        window.location("shop.php?value"+val);

                    localStorage.setItem('value', val);
                });




            });

//            function xyz()
//            {
//                var a = "aadsd";
//                //alert(a);
//                if (window.XMLHttpRequest) {
//                    // code for IE7+, Firefox, Chrome, Opera, Safari
//                    xmlhttp = new XMLHttpRequest();
//                } else {  // code for IE6, IE5
//                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
//                }
//                xmlhttp.onreadystatechange = function () {
//                    if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
//
//                        var a1 = xmlhttp.responseText;
//
//                        //alert(a1.length);
//                        if (a1 == "no") {
//
//                            window.location = "login_user.php";
//                            //window.location = window.location.protocol + "//" + window.location.host + "/login_user.php";
//
//                        }
//                    }
//                }
//                xmlhttp.open("GET", "check_login.php", true);
//                xmlhttp.send();
//
//
//            }
            function displayWishlist()
            {

                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {  // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function () {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        document.getElementById('displayWishlist').innerHTML = xmlhttp.responseText;

                    }
                }
                xmlhttp.open("GET", "DisplayWishlist.php", true);
                xmlhttp.send();
            }
            
            
            
            
            function deleteWishlist(pid,uid)
            {
              //  alert("ids: "+pid+uid);
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {  // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function () {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                       // alert(xmlhttp.responseText);
                        if (xmlhttp.responseText == 1)
                        {
                            //alert("enable");
                           
                            displayWishlist();
                        }
                        else if (xmlhttp.responseText == 0)
                        {
                            alert("Problem Executing the query!");
                            
                        }
                        else if (xmlhttp.responseText == 'i')
                        {
                            alert("Invalid ID");
                        }
                    }
                }
                xmlhttp.open("GET", "DeleteWhishlist.php?pid="+pid+"&uid="+uid, true);
                xmlhttp.send();
                
            }
            

            function searchlist()
            {
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {  // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function () {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        document.getElementById('datalist1').innerHTML = xmlhttp.responseText;
                    }
                }
                xmlhttp.open("GET", "datalist.php", true);
                xmlhttp.send();
            }

            function checkVal(val)
            {
                if(val)
                {
                    redirectsearch(val);
                }
                else
                {
                    alert("Empty Val.");
                    window.location.reload();
                }
            }

            function redirectsearch(value)
            {
                alert("hello");
                var xmlhttp;
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {  // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function () {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        var pid = xmlhttp.responseText;
                        alert(pid);
                        if(pid != "no")
                        {
                            alert("aaya");
                            window.location.replace('http://localhost/LoungeDeJewelWebsite/product-details.php?pid=' + encodeURI(" ' "+pid+" ' "));
                            
                        }
                        else
                        {
                            window.location.replace('http://localhost/LoungeDeJewelWebsite/home.php');
                        }
                    }
                    
                }
                xmlhttp.open("GET", "searchdatalist.php?value=" + value, true);
                xmlhttp.send();
            }


//            function displayWishlist()
//            {
//
//                if (window.XMLHttpRequest) {
//                    // code for IE7+, Firefox, Chrome, Opera, Safari
//                    xmlhttp = new XMLHttpRequest();
//                } else {  // code for IE6, IE5
//                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
//                }
//                xmlhttp.onreadystatechange = function () {
//                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//                        document.getElementById('displayWishlist').innerHTML = xmlhttp.responseText;
//
//                    }
//                }
//                xmlhttp.open("GET", "DisplayWishlist.php", true);
//                xmlhttp.send();
//            }


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
    <body onload="loadfn()">
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
                                            <li><a href="#" onclick="sendVal('Earrings')">Earrings</a></li>
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


        <!-- Modal Wishlist-->
        <div class="modal fade bs-example-modal-lg" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title1" id="myModalLabel1">WISHLIST ITEMS</h4>
                    </div>
                    <div class="modal-body">
                        <div id="displayWishlist"></div>
                    </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-primary" style="float: left;"onclick="window.location.replace('../LoungeDeJewelWebsite/home.php')">Continue Shopping</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
<!--                        <button type="button" class="btn btn-primary" onclick="window.location.replace('../LoungeDeJewelWebsite/checkoutAddress.php')">Add To Cart  </button>-->

                    </div>
                </div>
            </div>
        </div>
        <!--Modal Wishlist-->
        
        <!--<infomodal>-->
    <div class="modal fade bs-example-modal-lg" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="yourLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">NOTE</h4>
                    </div>
                    <div class="modal-body">
<!--                        <div id="infoText">Hello</div>-->
                    </div>
                     <div class="modal-footer">
                        
                        <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
                        

                    </div>
                </div>
            </div>
        </div>
<!--</infomodal>-->




        <section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
                                                        <li data-target="#slider-carousel" data-slide-to="3"></li>
						</ol>

						<div class="carousel-inner">
							<div class="item active" style="padding-left:0px;">
								<div class="col-sm-6 col-xs-6 overlay"  style="background: transparent;">

                                                                <h1><span style="color: #FF496B; "><font style="size: 150px;">LDJ</font></span></h1>

                                                                <p>Welcome to Lounge De Jewel</p>

                                                                </div>
                                                                <div class="col-lg-7"  >
                                                                    <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><font style="padding-left: 10px;">Lounge De Jewel Is An Online Jewellery Store<br/>&nbsp;&nbsp;With a wide range of choices. </font>
                                                                </div>

                                                                <div class="col-lg-5" >
                                                                    <img src="logo-new.png" style="height:441px;  width: 99%;" class="girl img-responsive" alt="" />

                                                                </div>
                                                            
                                                            
                                                        </div>
                                                    
                                                    <div class="item">
                                                        <div class="col-sm-6">
<!--									<h1><span>E</span>-SHOPPER</h1>-->
									<h2>Lounge De Jewel</h2>
									<p>Exclusive Ear-Rings just for you only @ Lounge de Jewel</p>
<!--									<button type="button" class="btn btn-default get">Get it now</button>-->
								</div>
								<div class="col-sm-6">
                                                                    <img src="img/img5.jpg" class="girl img-responsive" alt="" />
									
								</div>
                                                        
                                                    </div>
							<div class="item">
								<div class="col-sm-6">
<!--									<h1><span>E</span>-SHOPPER</h1>-->
									<h2>Lounge De Jewel</h2>
									<p>Beautiful Necklace at your tips</p>
<!--									<button type="button" class="btn btn-default get">Get it now</button>-->
								</div>
								<div class="col-sm-6">
                                                                    <img src="img/img2.jpg" class="girl img-responsive" alt="" />
<!--									<img src="images/home/pricing.png"  class="pricing" alt="" />-->
								</div>
							</div>

							<div class="item">
								<div class="col-sm-6">
<!--									<h1><span>E</span>-SHOPPER</h1>-->
									<h2>Lounge De Jewel</h2>
									<p>Mangalsutras for the perfect Bride</p>
<!--									<button type="button" class="btn btn-default get">Get it now</button>-->
								</div>
								<div class="col-sm-6">
                                                                    <img src="img/img3.jpg" class="girl img-responsive" alt="" />
<!--									<img src="images/home/pricing.png" class="pricing" alt="" />-->
								</div>
							</div>

						</div>

						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>

				</div>
			</div>
		</div>
	</section><!--/slider-->

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

                    <div class="recommended_items"><!--recommended_items-->
                        <h2 class="title text-center">recommended items</h2>
                         <?php
                            $y=0;$a=0;
                            $query = mysql_query("Select * from ldj_recommended_items");
                            
                            while ($row5 = mysql_fetch_array($query)) {
                                $pro_id = $row5['product_id'];
                                //echo $pro_id;
                                //$string = "Select * from ldj_product where product_name=".$val;
                                //echo mysql_num_rows($query);
                                $query1 = mysql_query("Select * from ldj_product where product_id='$pro_id'");
                                //echo $query1;
                                while ($row6 = mysql_fetch_array($query1)) {
                                    //echo "helloo".$row['product_id'];
                                $pro_name[$y]= $row6['product_name'];
                                $pro_price[$y]=$row6['product_selling_price'];
                                
                                
                                //echo $pro_name[y];
                                    
                                    $data1[$a] = $row6['product_img_path'];
                                    
                                    //echo $pro_id;
                                }
                                $y++; $a++;
                         } ?> 
                        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="item active">
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <?php $xml = new SimpleXMLElement($data1[0]);?>
                                                    <img src=<?php echo $xml->image[0]; ?> alt="" />
                                                    <h2><?php echo " Rs.".$pro_price[0]; ?></h2>
                                                    <p><?php echo $pro_name[0]; ?></p>
                                                    <a href="#" onclick="addtoWishlist(<?php echo $pro_id; ?>)" class="btn btn-default add-to-cart"><i class="fa fa-star-o"></i>Add to wishlist</a>
                                                </div>
                            
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <?php $xml = new SimpleXMLElement($data1[1]);?>
                                                    <img src=<?php echo $xml->image[0]; ?> alt="" />
                                                    <h2><?php echo " Rs.".$pro_price[1]; ?></h2>
                                                    <p><?php echo $pro_name[1]; ?></p>
                                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-star-o"></i>Add to wishlist</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <?php $xml = new SimpleXMLElement($data1[2]);?>
                                                    <img src=<?php echo $xml->image[0]; ?> alt="" />
                                                    <h2><?php echo " Rs.".$pro_price[2]; ?></h2>
                                                    <p><?php echo $pro_name[2]; ?></p>
                                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-star-o"></i>Add to wishlist</a>
                                                </div>

                                            </div>
                                           
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                 <?php for ($index1 = 3; $index1 < 6; $index1++) {
                                    ?>
                                
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <?php $xml = new SimpleXMLElement($data1[$index1]); ?> 
                                                    <img src=<?php echo $xml->image[0]; ?> alt="" />
                                                    <h2><?php echo " Rs.".$pro_price[$index1];?></h2>
                                                    <p><?php echo $pro_name[$index1];?></p>
                                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-star-o"></i>Add to wishlist</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                
                                 <?php }?>
                                    </div>
<!--                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="images/j5.jpg" alt="" />
                                                    <h2>Rs.100/-</h2>
                                                    <p>Ruby Red Ring</p>
                                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to wishlist</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="images/j6.jpg" alt="" />
                                                    <h2>Rs.200/-</h2>
                                                    <p>Gold Plated Ring</p>
                                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-star-o"></i>Add to wishlist</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>-->
                            <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                        </div>
                 
                    </div><!--/recommended_items-->

                    <div class="col-sm-9 padding-right">
                        <div class="features_items"><!--New Arrivals-->
                            <h2 class="title text-center">New Arrivals</h2>
                            <?php
                            $query = mysql_query("Select * from ldj_new_arrivals");
                            while ($row1 = mysql_fetch_array($query)) {
                                $pro_id = $row1['product_id'];

                                //$string = "Select * from ldj_product where product_name=".$val;
                                //echo mysql_num_rows($query);
                                $query1 = mysql_query("Select * from ldj_product where product_id='$pro_id'");

                                while ($row = mysql_fetch_array($query1)) {
                                    //echo "helloo".$row['product_id'];


                                    $data = $row['product_img_path'];
                                    $xml = new SimpleXMLElement($data);
                                    //echo $pro_id;
                                    ?> 
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src=<?php echo $xml->image[0]; ?> alt="" />
                                                    <h2><?php echo " Rs.".$row['product_selling_price']; ?></h2>
                                                    <p><?php echo $row['product_name']; ?></p>
                                                    <button onclick="addtoWishlist(<?php echo $pro_id; ?>)" class="btn btn-default add-to-cart"  ><i class="fa fa-star">Add to Wishlist</i></button>
                                                </div>
                                                <div class="product-overlay">
                                                    <div class="overlay-content" >

                                                        <div>
                                                            <a href="product-details.php?pid=<?php echo $pro_id; ?>" class="btn btn-default add-to-cart"  ><span class="glyphicon glyphicon-shopping-cart"></span> Buy Now</a>
                                                        </div>
                                                        <div>
        <!--                                                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-star"></i>Add to wishlist</a>-->
                                                            <button onclick="addtoWishlist(<?php echo $pro_id; ?>)" class="btn btn-default add-to-cart" ><i class="fa fa-star"></i>Add to Wishlist</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <?php
                                }
                            }
                            ?>

                            <div class="category-tab"><!--category-tab-->

                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <br>
            <div class="container">
                <h2 class="title text-center">"Reviews from our Delighted Customers"</h2>
                <?php
                             $query3 = mysql_query("Select * from ldj_feedback");
                             $x=0;  $a=0;
                             while($row5=  mysql_fetch_array($query3))
                {
                    $pro_id=$row5['product_id'];
                    $query4=  mysql_query("SELECT * FROM ldj_product");
                    while ($row6 = mysql_fetch_array($query4)) {
                        if($row6['product_id'] == $pro_id)
                        {
                            
                                    $data1[$a] = $row6['product_img_path'];
//                                    $xml = new SimpleXMLElement($data1[$a]);
                        }
                                   
                    }
                    $fb_content[$x]= $row5['feedback_content'];
                    $x++; $a++;
               }
                                // echo $row5['feedback_content'];
                
       ?>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="quote"><i class="fa fa-quote-left fa-4x"></i></div>
                        <div class="carousel slide" id="fade-quote-carousel" data-ride="carousel" data-interval="3000">
                            <!-- Carousel indicators -->
                            <ol class="carousel-indicators">
                                 
                                <li data-target="#fade-quote-carousel" data-slide-to="0" class="active"></li>
                                <?php for ($index = 1; $index < count($fb_content); $index++) {
                                    ?>
                                <li data-target="#fade-quote-carousel" data-slide-to=""></li>
<!--                                <li data-target="#fade-quote-carousel" data-slide-to=""></li>-->
                                 <?php } ?>
                            </ol>
                            <!-- Carousel items -->
                            <div class="carousel-inner">
                                <div class="active item">
                                    <blockquote>
                                        <p><?php echo $fb_content[0];?></p><br><br>
                                    </blockquote>
                                    <div class="profile-circle">
                                        <img src=<?php echo $xml->image[0]; ?> alt="" />
                                    </div>
                                </div>
                          <?php for ($index = 1; $index < count($fb_content); $index++) {
                                    ?>

                                    <div class="item">
                                        <blockquote>
                                            <p><?php echo $fb_content[$index]; ?></p><br><br>
                                            
                                            <?php $xml = new SimpleXMLElement($data1[$index]); ?> 
                                            <img src=<?php echo $xml->image[0]; ?> alt="" height="60px" width="100px"/>
                                        </blockquote>
                                        <!--                                    <div class="profile-circle" style="background-color: rgba(77,5,51,.2);"></div>-->
                                    </div>
                                <?php } ?>
                                <!--                                <div class="item">
                                    <blockquote>
                                        <?php // echo $row['content'];}  ?>
                                        <p>It was a good experience shopping online..Indeed Good jewellary..</p>
                                    </blockquote>
                                    <div class="profile-circle" style="background-color: rgba(145,169,216,.2);"></div>
                                </div>-->


                            </div>
                            

                        </div>
                    </div>
                </div>
            </div>



        </section>



        <?php
        include 'footer.php';
        ?>



        <script src="js/jquery.min.js"></script>
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



       

        <script type="text/javascript">
function addtoWishlist(val)
            {

        //alert("Hello"+val);
              xyz();
                
                
                    
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {  // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function () {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                        //alert("Aya"+xmlhttp.responseText);
                        if (xmlhttp.responseText == 0)
                        {
                            alert("Your product has been added..!!");
                            $(document).ready(function () {
                                $("#infoModal").modal('show');
                                document.getElementById("#infoText").innerHTML = "You have ";
                            });
                        }
                        else if(xmlhttp.responseText == 1)
                        {
                            alert("There is Problem Inserting In The Whishlist!");
                            $(document).ready(function () {
                                $("#infoModal").modal('show');
                                document.getElementById("#infoText").innerHTML = "There is Problem Inserting In The Whishlist!";
                            });
//                            document.getElementById("submitinfo").innerHTML = "Problem inserting";

                        }
                        else if(xmlhttp.responseText == 2)
                        {
                            alert("You can't add more than 8 items in Whishlist");
                             $(document).ready(function () {
                                $("#infoModal").modal('show');
                                document.getElementById("#infoText").innerHTML = "you can't add more than 8 items in Whishlist";
                            });
//                         
//                            alert("Cant Add More");
//                            $(document).ready(function(){
//                                
////                                $("#submitModal").modal('show');
//                            });
                        }
                        else if(xmlhttp.responseText == 3)
                        {
                            alert("Your product already existing in Wishlist..!!");
                             $(document).ready(function () {
                                $("#myModal").modal('show');
                                document.getElementById("#infoText").innerHTML = "This product already exists in the Whishlist";
                            });
//                         
//                            alert("Product Existing ");
//                            $(document).ready(function(){
//                                
////                                $("#submitModal").modal('show');
//                            });
                        }
                       
                    }

                }
                xmlhttp.open("GET", "AddWishlist.php?value="+val, true);
                xmlhttp.send();

               
            }
            

        </script>





<!--         Login modal>
        <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myloginModalLabel" aria-hidden="true">
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
            </modal>-->


<!--<check user session>-->
        <?php
        echo '<script>function checkLogin()';

        if (isset($_SESSION['username'])) {
            ?>  $(document).ready(function() {
            $('#loginModal').modal('show');
                
            });
            <?php
            echo '}function goBack() {
                location.replace("login.php");
            ';
        }

        echo '}</script>';
        include 'CheckLogin.php';
        ?>



    </body>
</html>