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
<!--    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>-->
     <script>
//            $(document).ready(function () {
//                alert("aaya");
//
//                $('.sub-menu li a').click(function () {
//                    alert($(this).text());
//                });
//            });






        </script>
        
        <script type="text/javascript">
    function getValue(val)
    {
        
        
         if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {  // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function () {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        if(xmlhttp.responseText == null)
                        {
                            document.getElementById("displayItems").innerHTML="No Product In This Range Found";
                        }
                        else
                        {
                            document.getElementById("displayItems").innerHTML=xmlhttp.responseText;
                        }
                        
                        
                    }

                }
                xmlhttp.open("GET", "getRangeTypeContent.php?value=" + JSON.stringify(val) , true);
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
    function selectCategory()
            {
                
                var categoryarr = new Array();
                i=0;
                if(document.getElementById('type1').checked == true)
                {
                    categoryarr[i] = document.getElementById('type1').value;
                    
                    i++;
                }
                if(document.getElementById('type2').checked == true)
                {
                    categoryarr[i] = document.getElementById('type2').value;
                    
                    i++;
                }
                if(document.getElementById('type3').checked == true)
                {
                    categoryarr[i] = document.getElementById('type3').value;
                    
                    i++;
                }
                if(document.getElementById('type4').checked == true)
                {
                    categoryarr[i] = document.getElementById('type4').value;
                    
                    
                }
                
//                alert(categoryarr.length);
//                for(i=0;i<categoryarr.length;i++)
//                {
//                    alert(categoryarr[i]);
//                }

            if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {  // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function () {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                        document.getElementById("displayItems").innerHTML=xmlhttp.responseText;
                        
                    }

                }
                xmlhttp.open("GET", "getFilterTypeContent.php?value=" + JSON.stringify(categoryarr) , true);
                xmlhttp.send();
            }
            
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
            
            function updateQty(val, id)
            {
                alert(val + " " + id);
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
                            alert("updated");
                            displayCart();
                        }
                        else if (xmlhttp.responseText == 2)
                        {
                            alert("Not enough Stock");
                        }
                        else
                        {
                            alert("not updated");

                        }

                    }
                }
                xmlhttp.open("GET", "updateQuantity.php?value=" + val + "&id=" + id, true);
                xmlhttp.send();

            }
            
            
            
            
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




            function deleteWishlist(pid, uid)
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
                xmlhttp.open("GET", "DeleteWhishlist.php?pid=" + pid + "&uid=" + uid, true);
                xmlhttp.send();

            }

            function wishlistCart(val) {
                //alert(val);
                window.location.replace("http://localhost/LoungeDeJewelWebsite/product-details.php?pid=" + val);

            }
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
    <?php
    ?><script>
val=decodeURI(<?php echo $_GET['value'];?>);
document.writeln("Decoded Val: "+val);
<?php $val1?>=val;
    </script><?php
        $_SESSION['val'] = '<script>val</script>';
        $val=$_SESSION['val'];
        echo 'Decoded Value: '.$val1;
        $val= strtolower($val);
        
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
                                        <button class="btn btn-default" type="submit" onclick="redirectsearch(datalist1.value)"><i class="glyphicon glyphicon-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                        
                        


                    </div>
                </div>
            </div><!--/header-bottom-->
        </header><!--/header-->
        <!-- CART Modal -->
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
        <!--CART Modal-->

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

        <!-- Modal Wishlist-->
        <div class="modal fade bs-example-modal-lg" id="modalWishlist" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                    </div>
                </div>
            </div>
        </div>
        <!--Modal Wishlist-->

        <!--info modal 1-->
        <div class="modal fade bs-example-modal-lg" id="addedModal" tabindex="-1" role="dialog" aria-labelledby="yourLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">NOTE</h4>
                    </div>
                    <div class="modal-body">
                        <h4>Product Added Into The Wishlist !!</h4>
                    </div>
                    <div class="modal-footer">

                        <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>


                    </div>
                </div>
            </div>
        </div>
        <!-- info Modal 2-->
        <div class="modal fade bs-example-modal-lg" id="problemInsertingModal" tabindex="-1" role="dialog" aria-labelledby="yourLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">NOTE</h4>
                    </div>
                    <div class="modal-body">
                        <h4>There is Problem Inserting In The Whishlist!</h4>
                    </div>
                    <div class="modal-footer">

                        <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>


                    </div>
                </div>
            </div>
        </div>
        <!-- info modal 3-->
        <div class="modal fade bs-example-modal-lg" id="limitModal" tabindex="-1" role="dialog" aria-labelledby="yourLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">NOTE</h4>
                    </div>
                    <div class="modal-body">
                        <h4>You can't add more than 8 items in Whishlist</h4>
                    </div>
                    <div class="modal-footer">

                        <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>


                    </div>
                </div>
            </div>
        </div>
        <!-- info modal 4 -->
        <div class="modal fade bs-example-modal-lg" id="existingModal" tabindex="-1" role="dialog" aria-labelledby="yourLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">NOTE</h4>
                    </div>
                    <div class="modal-body">
                        <h4>Your product already existing in Wishlist..!!</h4>
                    </div>
                    <div class="modal-footer">

                        <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>


                    </div>
                </div>
            </div>
        </div>
        <!--info modal-->



	
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
					<div class="brands_products"><!--brands_products-->
                                <h2>Type</h2>
                                <div class="brands-name">
                                    <form method="post" action="">
                                        <input type="checkbox" name="type1" id="type1" value="Gold Plated" onchange="selectCategory()"> Gold Plated<br><br><br>
                                        
                                        <input type="checkbox" name="type2" id="type2" value="American Diamond" onchange="selectCategory()"> American Diamond<br><br><br>
                                        <input type="checkbox" name="type3" id="type3" value="Hand Crafted" onchange="selectCategory()"> Hand Crafted<br><br><br>
                                        <input type="checkbox" name="type4" id="type4" value="Western" onchange="selectCategory()"> Western<br><br><br>
                                        
                                    </form>
                                </div>
                            </div><!--/brands_products-->

                            <div class="price-range" ><!--price-range-->
                                <h2>Price Range</h2>
                                <div class="well" onclick="getValue(document.getElementById('sl2').value)">
                                    <input type="text" class="span2"  value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                                    <b>Rs 0</b> <b class="pull-right">Rs 1000</b>
                                </div>
                            </div><!--/price-range-->

						
						
						
						
						
					
					</div>
				</div>
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
                                                <div id="displayItems">
						<?php
                                              
                                                $selectCategory = mysql_query("Select * from ldj_product_category");
                                                while ($row1 = mysql_fetch_array($selectCategory)) {
                                                    $categoryName = strtolower($row1['category_type']);
                                                    if($val == $categoryName)
                                                    {
                                                        $categoryID = $row1['category_id'];
                                                    }
                                                }
                                                
                                                $_SESSION['catedory']=$categoryID;
//                                                echo $categoryID;
                                                if($categoryID == null)
                                                {
                                                    echo '<h1>The Following Category Is Not Available </h1>';
                                                }
                                                
                            $query = mysql_query("Select * from ldj_product where category_id='$categoryID'");
//                            $string = "Select * from ldj_product where product_name=".$val;
                             if(mysql_num_rows($query) > 0)
                             {
                             
                             
                            while ($row = mysql_fetch_array($query)) {
//                                echo "helloo".$row['product_id'];
                                
                                
                                $data=$row['product_img_path'];
                                $xml=new SimpleXMLElement($data);
//                                echo $xml;
                                ?> 
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <a href="http://localhost/LoungeDeJewel/product-details.php"><img src=<?php echo $xml->image[0];?> alt="" height="250" width="250"/></a>
                                                <h2><?php echo " Rs.".$row['product_selling_price'] ; ?></h2>
                                                <p><?php echo $row['product_name']; ?></p>
                                                <a href="http://localhost/LoungeDeJewel/product-details.php" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>

                                            
                                            <div class="product-overlay" id='overlayid' >
                                                <div class="overlay-content" >
                                                    <h2><?php // echo "Rs ".$row['product_selling_price']; ?></h2>
                                                    <p><?php // echo $row['product_name']; ?></p>
                                                     <div>
<!--                                                            <a href="product-details.php?pid=//<?php // echo $pro_id; ?>" class="btn btn-default add-to-cart"  ><span class="glyphicon glyphicon-shopping-cart"></span> Buy Now</a>-->
                                                        </div>
                                                     <div>
<!--                                                                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-star"></i>Add to wishlist</a>-->
                                                            <button onclick="addtoWishlist(<?php echo $row['product_id']; ?>)" class="btn btn-default add-to-cart" ><i class="fa fa-star"></i>Add to Wishlist</button>
                                                        </div>
                                                    <form method="POST" action="product-details.php">
                                                        <input type="hidden" value='<?php  echo $row['product_id'];?>' name='pid' id='pid'/>
<!--                                                        <input type="text" value='<?php // echo $row['product_id']; ?>' name='pid' id='pid'/>-->
                                                        <div>
                                                            <input type="submit" class="btn btn-default add-to-cart" value="Buy Now" >
<!--                                                            <span class=" glyphicon glyphicon-shopping-cart"> <input type="submit" class="btn btn-default add-to-cart" value="Buy Now" ></span>-->
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>

                                                                                        
<!--                                            
                                            <div class="overlay-content" >

                                                        <div>
                                                            <a href="product-details.php?pid=<?php //echo $pro_id; ?>" class="btn btn-default add-to-cart"  ><span class="glyphicon glyphicon-shopping-cart"></span> Buy Now</a>
                                                        </div>
                                                        <div>
                                                                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-star"></i>Add to wishlist</a>
                                                            <button onclick="addtoWishlist(<?php //echo $pro_id; ?>)" class="btn btn-default add-to-cart" ><i class="fa fa-star"></i>Add to Wishlist</button>
                                                        </div>
                                                    </div>-->
                                            
                                            
                                        </div>

                                    </div>
                                    
                                                                             
                                </div>
                                <?php
                            }
                             }
                             else
                             {
                                 echo '<center><font size="6">No Products Available For This Category</font></center>';
                             }
                            ?>
				</div>
                                </div></div>
                        </div>
                </div>
            
			</div>
		</div>
	</section>
	
	
	<?php
include 'footer.php';

        ?>

  
    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
    <script type="text/javascript">
function addtoWishlist(val)
            {

       // alert("Hello"+val);
             // xyz();
                
                
                    
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
    <?php include 'CheckLogin.php'; ?>
</body>
</html>