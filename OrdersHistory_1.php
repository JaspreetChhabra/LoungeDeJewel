<!DOCTYPE html>
<?php

include_once './DbCredintials.php';
  $con = mysql_connect($servername,$dbuname,$dbpass) or die("Error connecting to server" . mysql_error());
        $db_select = mysql_select_db("jwelleryshop") or die("Error connecting to Database" . mysql_error());
      
//include './NavBar.php';
?>

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>My Orders | Lounge De Jewel</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
   <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
        <link href="css/plugins/dataTables.bootstrap.css" rel="stylesheet">
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
								<li><a href="login_user.php"><i class="fa fa-lock"></i>Sign-In</a></li>
								<li><a href="#"><span class="glyphicon glyphicon-calendar"></span> My Orders</a></li>
                                                                <li><a href="customerprofilehandler.php" ><i class="fa fa-user"></i><l id="msg"> Profile</l></a></li>
                                                                <li><a href="sign_out.php"><span class="glyphicon glyphicon-off"></span> Sign-out</a></li>
								<li><a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                                                                <li id="wishlist"><a href="wishlist.php"><i class="fa fa-star"></i> Wishlist</a></li>
<!--                                                                <li><a href="#" id="msg"></a></li>-->

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
                                                                                <li><a href="javascript:postwith('shop.php',{value:'Earrings'})">Earrings</a></li>
										<li><a href="shop.php?value=Necklace">Necklace</a></li>
                                                                                <li><a href="shop.php?value=Pendants">Pendants</a></li>
                                                                                <li><a href="shop.php?value=Rings">Rings</a></li>
                                                                                <li><a href="shop.php?value=Bangles">Bangles</a></li>
                                                                                <li><a href="shop.php?value=Tikkas">Tikkas</a></li>
                                                                                <li><a href="shop.php?value=nose-pins">nose-pins</a></li>
                                                                                <li><a href="shop.php?value=Bridal">Bridal</a></li>
                                                                                <li><a href="shop.php?value=Anklets">Anklets</a></li>
                                                                                <li><a href="shop.php?value=Exclusive">Exclusive</a></li>
                                                                                <li><a href="shop.php?value=MangalSutra">MangalSutra</a></li>
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
                    <input type="text" class="form-control" placeholder="Search" name="q">
                    <div class="input-group-btn" >
                        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                    </div>
                </div>
            </form>
                                        </div>


				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->

   

        <!-- Navigation -->
        
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1">
                    <h1 class="page-header">Order History</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Genral Order Information
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                               <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Product Name</th>
                                            <th>Order Date</th>
                                            <th>Order Status</th>
                                            <th>Operation</th>
                                        </tr>
                                    </thead>    
                                    <tbody> 
                                        <?php

                                        $query = mysql_query("Select * from ldj_orders ");
                                         
                                        while ($row = mysql_fetch_array($query)) {
                                            echo "<tr><form  id=form name=form action=user_orders.php method=POST>";
                                            
                                            echo '<td>' . $row['order_id'] . '</td>';
                                            $data = $row['product_ids'];
                                        $xml = new SimpleXMLElement($data);
                                                
                                                $x=0;
                                                echo '<td>' ;
                                                 foreach ($xml as $value) {
                                        $pro_id= $xml->pid[$x];
                                        
                                        
                                        $selectquery = mysql_query("SELECT product_name FROM ldj_product WHERE product_id='$pro_id'");
                                        //echo $selectquery;
                                        while ($row5 = mysql_fetch_array($selectquery)) {
                                            echo $row5['product_name']."<br/>";
                                            //echo $product_name[$x]."<br/>";
                                            

                                        }
                                        $x++;
                                                 }
                                                 echo '</td>';

                                            
                                            
                                            
                                            
                                            echo '<td>' . $row['order_date'] . '</td>';
                                            echo '<td>' . $row['order_status'] . '</td>';
                                            echo '<td><input type="submit" class="btn btn-primary"  btn-block=""   value="View Full Details" />
                                                 </td>';
                                           
                                        ?>
                                                
                                                
                                    <input type="hidden"  name='delid' value=<?php echo $row['order_id']; ?> />
                                        <?php
                                            echo "</form></tr>";
                                            $x++;
                                        }
                                        ?>
                                   
                               </tbody> 
                               </table>
                            </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>

        

    <?php include 'footer.php'; ?>
  
    
    <script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable();
        $('#dataTables-example_filter').hide();
    });
    
    
    
    </script>
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
    <script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script src="js/plugins/dataTables/jquery.dataTables.js"></script>
     
</body>

</html>

