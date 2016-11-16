<html lang="en"><head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Admin Panel</title>

        <!-- Bootstrap Core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="../css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="../css/plugins/timeline.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../css/sb-admin-2.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../css/plugins/custom.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="../css/plugins/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <style>

            @media screen and (max-width: 320px){
                #altimg{
                    font-size:x-small;
                }
            }
        </style>
        <script type="text/javascript">
            function loadImage(val)
            {


                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {  // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function () {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        //alert("aaya");
                        alert(xmlhttp.responseText);
                    }

                }
                xmlhttp.open("GET", "getpath.php?getimage=" + val, true);
                xmlhttp.send();
            }

            function goBack() {
                location.replace("http://localhost/LoungeDeJewelWebsite/AdminPanel/ManageProducts.php");
            }
            
            
            function PreviewImage() {
                var oFReader = new FileReader();
                oFReader.readAsDataURL(document.getElementById("getimage").files[0]);

                oFReader.onload = function (oFREvent) {
                    document.getElementById("image1").src = oFREvent.target.result;
                };
            }
            ;
            function PreviewImage1() {
                var oFReader = new FileReader();
                oFReader.readAsDataURL(document.getElementById("getimage1").files[0]);

                oFReader.onload = function (oFREvent) {
                    document.getElementById("image2").src = oFREvent.target.result;
                };
            }
            ;
        </script>

    </head>

    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html">Lounge De Jewel Admin Panel</a>
                </div>
                <!-- /.navbar-header -->

                <ul class="nav navbar-top-links navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-messages">
                            <li>
                                <a href="#">
                                    <div>
                                        <strong>John Smith</strong>
                                        <span class="pull-right text-muted">
                                            <em>Yesterday</em>
                                        </span>
                                    </div>
                                    <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div>
                                        <strong>John Smith</strong>
                                        <span class="pull-right text-muted">
                                            <em>Yesterday</em>
                                        </span>
                                    </div>
                                    <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div>
                                        <strong>John Smith</strong>
                                        <span class="pull-right text-muted">
                                            <em>Yesterday</em>
                                        </span>
                                    </div>
                                    <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a class="text-center" href="#">
                                    <strong>Read All Messages</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                        <!-- /.dropdown-messages -->
                    </li>
                    <!-- /.dropdown -->

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                            </li>
                            <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li class="sidebar-search">
                                <div class="input-group custom-search-form">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                                <!-- /input-group -->
                            </li>
                            <li>
                                <a class="active" href="index.html"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Catalog<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse">
                                    <li>
                                        <a href="./AdminPanel/ManageProducts.php">Manage Products</a>
                                    </li>
                                    <li>
                                        <a href="morris.html">Add New Product</a>
                                    </li>
                                    <li>
                                    </li></ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li class="">
                                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Reports<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse" aria-expanded="false" style="height: 0px;">
                                    <li>
                                        <a href="flot.html">Stock Report</a>
                                    </li>
                                    <li>
                                        <a href="morris.html">Product Report</a>
                                    </li>
                                    <li>
                                    </li></ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="#"> <i class="fa fa-user fa-fw"></i> Sub-Admins<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse">
                                    <li>
                                        <a href="flot.html">Manage Sub-Admins</a>
                                    </li>
                                    <li>
                                        <a href="morris.html">Add New Sub-Admin</a>
                                    </li>
                                    <li>

                                    </li></ul>
                                <!-- /.nav-second-level -->
                            </li>


                            <li>
                                <a href="forms.html"><i class="fa fa-edit fa-fw"></i> Order History</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-files-o fa-fw"></i> Manage Site Data<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse">
                                    <li>
                                        <a href="blank.html">New Page</a>
                                    </li>
                                    <li>
                                        <a href="login.html">Manage Page</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>

            <div id="page-wrapper" style="min-height: 169px;">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Add Product</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!--                                <div class="container col-lg-12" >-->
                <div class="panel panel-default">
                    <div class="panel-heading">Section 1:Basic Information about Products</div>
                </div>



                <div class="row">
                    <div class="col-md-12">
                        <form class="form-horizontal" id="addProductForm" role="form" action="AddNewProductHandler.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <div class="col-sm-4 col-lg-2 col-md-2 col-xs-4">
                                    <label class="control-label"id="label">Product Name </label>
                                </div>
                                <div class="col-sm-8 col-lg-4 col-md-4 col-xs-8">
                                    <input type="text" id="pname" name="pname" data-toggle="tooltip" title="Enter product name!" class="form-control" placeholder="Product Name ">
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="col-sm-4 col-lg-2 col-md-2 col-xs-4">
                                    <label class="control-label"id="label">Product Category</label>
                                </div>
                                <div class="col-sm-4 col-lg-4 col-md-4 col-xs-8">
                                    <select name="cat" id="cat"  class="form-control placeholder" data-toggle="tooltip" title="Select product category!">
                                       <?php 
                                        $con = mysql_connect("localhost", "root", "") or die("Error connecting to server" . mysql_error());
                                        $db_select = mysql_select_db("jwelleryshop") or die("Error connecting to Database" . mysql_error());
                                        $sql="SELECT * FROM ldj_product_category";
                                        $result=  mysql_query($sql);
                            
                                        while ($row1 = mysql_fetch_array($result)) {
                                    
                                        echo '<option value='.$row1['category_id'].'>'.$row1['category_type'].'</option>';
                                        
                            }
                                        ?>
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4 col-lg-2 col-md-2 col-xs-4">
                                    <label class="control-label"id="label">M.R.P (Rs) </label>
                                </div>
                                <div class="col-sm-4 col-lg-4 col-md-4 col-xs-8">
                                    <input name="mrp" id="mrp" type="text" class="form-control" placeholder=" " data-toggle="tooltip" title="Enter MRP!">
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="col-sm-4 col-lg-2 col-md-2 col-xs-4">
                                    <label class="control-label"id="label">Selling Price (Rs) </label>
                                </div>
                                <div class="col-sm-4 col-lg-4 col-md-4 col-xs-8">
                                    <input name="sp" id="sp" type="text" class="form-control" placeholder=" " data-toggle="tooltip" title="Enter Selling Price!">
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="col-sm-4 col-lg-2 col-md-2 col-xs-4">
                                    <label class="control-label"id="label">Description </label>
                                </div>
                                <div class="col-sm-4 col-lg-4 col-md-4 col-xs-8">
                                    <textarea name="desc" id="desc" class="form-control" data-toggle="tooltip" title="Enter Product Description!"></textarea>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="col-sm-4 col-lg-2 col-md-2 col-xs-4">
                                    <label class="control-label"id="label">Quantity </label>
                                </div>
                                <div class="col-sm-4 col-lg-4 col-md-4 col-xs-8">
                                    <input name="quantity" id="quantity" type="number" class="form-control" placeholder=" " data-toggle="tooltip" title="Enter Quantity!">
                                </div>

                            </div>
                            
                            <div class="form-group">
                                <div class="col-sm-4 col-lg-2 col-md-2 col-xs-4">
                                    <label class="control-label"id="label">Image </label>
                                </div>
                                <div class="col-sm-3 col-lg-8 col-md-8 col-xs-3">
                                    <input name="img1" type="file" id="getimage" data-toggle="tooltip" title="Select Image!"  onchange="PreviewImage()" />
                                </div>
                                <div class="col-sm-3 col-lg-8 col-md-8 col-xs-3">
                                    <br/>
                                    <img class="img-responsive" id='image1' height="200" width="200" src=''>
                                
                                </div>
                                
                            </div>

                            <div class="form-group">
                                <div class="col-sm-4 col-lg-2 col-md-2 col-xs-4">
                                    <label  class="control-label"id="label">Image 2</label>
                                </div>
                                <div class="col-sm-3 col-lg-8 col-md-8 col-xs-3">
                                    <input name="img2" type="file" id="getimage1" data-toggle="tooltip" title="Select 2nd Image!" onchange="PreviewImage1()"/>
                                </div>
                                <div class="col-sm-3 col-lg-8 col-md-8 col-xs-3" id="image">
<br/>
                                    <img class="img-responsive" id="image2" height="200" width="200" src=''>
                                </div>


                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">Section 2:SEO/Meta Data (Optional)</div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-4 col-lg-2 col-md-2 col-xs-4">
                                    <label class="control-label"id="label">Page Title</label>
                                </div>
                                <div class="col-sm-4 col-lg-4 col-md-4 col-xs-8">
                                    <input name="pagetitle" type="text" class="form-control" data-toggle="tooltip" title="Enter Page title!" placeholder=" ">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-4 col-lg-2 col-md-2 col-xs-4">
                                    <label class="control-label"id="label">Meta Keywords</label>
                                </div>
                                <div class="col-sm-4 col-lg-4 col-md-4 col-xs-8">
                                    <input name="metakeywords" type="text" class="form-control" data-toggle="tooltip" title="Enter Meta-Keywords!" placeholder=" ">
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">Section 3:Features</div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-4 col-lg-2 col-md-2 col-xs-4">
                                    <label class="control-label"id="label">Occasion</label>
                                </div>
                                <div class="col-sm-4 col-lg-4 col-md-4 col-xs-8">
                                    <select name="occasion" class="form-control placeholder" data-toggle="tooltip" title="Select Occasion!">
                                        <option selected="Traditional">Traditional</option>
                                        <option value="Casual">Casual</option>
                                        <option value="Party Wear">Party Wear</option>

                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-4 col-lg-2 col-md-2 col-xs-4">
                                    <label class="control-label"id="label">Material</label>
                                </div>
                                <div class="col-sm-4 col-lg-4 col-md-4 col-xs-8">
                                    <select name="material" class="form-control placeholder" data-toggle="tooltip" title="Select Material!">
                                        <option selected="American Diamond">American Diamond</option>
                                        <option value="Gold Plated">Gold Plated</option>
                                        <option value="Hand Crafted">Hand Crafted</option>
                                        <option value="Western">Western</option>

                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-4 col-lg-2 col-md-2 col-xs-4">
                                    <label class="control-label"id="label">Colour</label>
                                </div>
                                <div class="col-sm-4 col-lg-4 col-md-4 col-xs-8">
                                    <select name="color" class="form-control placeholder" data-toggle="tooltip" title="Select Colour!">
                                        <option selected="Red">Red</option>
                                        <option value="Green">Green</option>
                                        <option value="Yellow">Yellow</option>

                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-4 col-lg-2 col-md-2 col-xs-4">
                                    <label class="control-label"id="label">Stone Type</label>
                                </div>
                                <div class="col-sm-4 col-lg-4 col-md-4 col-xs-8">

                                    <select name="stonetype" class="form-control placeholder" data-toggle="tooltip" title="Select stone!">
                                        <option selected="selected">Emerald</option>
                                        <option value="Ruby">Ruby</option>
                                        <option value="Gemstone">Gemstone</option>

                                    </select>
                                </div>
                            </div>
                            
                            
                            
                            
                            <div class="form-group">
                                <div class="col-sm-4 col-lg-2 col-md-2 col-xs-4">
                                    <label class="control-label"id="label">Weight</label>
                                </div>
                                <div class="col-sm-4 col-lg-4 col-md-4 col-xs-8">
                                    <input name="weight" id="weight" type="text" class="form-control" placeholder=" " data-toggle="tooltip" title="Enter weight!">
                                </div>
                            </div>


                            
                            <div class="row">
                                <div class="col-sm-3 col-xs-4 col-lg-2 col-md-4 col-lg-offset-2 col-sm-offset-1">
                                    <button type="submit" id="fnbtn" class="btn btn-default">Submit</button>

                                </div>

                                <div class="col-sm-8 col-xs-8 col-md-8 col-lg-5 col-lg-offset-0 col-md-offset-5">
                                    <button type="button" id="fnbtn" class="btn btn-default" onclick="goBack()">Cancel</button>
                                </div>

                            </div>

                           










                            <!--                                                <div class="form-group">
                                                                                <div class="col-sm-2">
                                                                                    <label class="control-label">Select a Category :</label>
                                                                                </div>
                                                                                <div class="col-sm-10">
                                                                                    <select class="form-control">
                                                                                        <option>1</option>
                                                                                        <option>2</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group" draggable="true">
                                                                                <div class="col-sm-2">
                                                                                    <label class="control-label">M.R.P (Rs) :</label>
                                                                                </div>
                                                                                <div class="col-sm-10">
                                                                                    <input type="text" class="form-control">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <div class="col-sm-2">
                                                                                    <label class="control-label">Retail Price (Rs.) :</label>
                                                                                </div>
                                                                                <div class="col-sm-10">
                                                                                    <input type="text" class="form-control">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <div class="col-sm-2">
                                                                                    <label class="control-label">Selling Price (Rs.) :</label>
                                                                                </div>
                                                                                <div class="col-sm-10">
                                                                                    <input type="text" class="form-control">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <div class="col-sm-2">
                                                                                    <label class="control-label">Full Description :</label>
                                                                                </div>
                                                                                <div class="col-sm-10">
                                                                                    <textarea class="form-control"></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <div class="col-sm-offset-2 col-sm-10">
                                                                                    <button type="submit" class="btn btn-default">Sign in</button>
                                                                                </div>
                                                                            </div>-->
                        </form>
                    </div>
                </div>


                <!--                    <div class="row">
                                        <div class="col-md-9">
                                            <form class="form-horizontal" role="form">
                                                <div class="form-group">
                                                    <div class="col-sm-2 col-md-2 col-xs-2 col-lg-2">
                                                        <label for="inputEmail3" class="control-label">Email</label>
                                                    </div>
                                                    <div class="col-sm-10 col-lg-8 col-md-8 col-xs-8">
                                                        <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-2">
                                                        <label for="inputPassword3" class="control-label">Password</label>
                                                    </div>
                                                    <div class="col-sm-10">
                                                        <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-offset-2 col-sm-10">
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox">Remember me</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-offset-2 col-sm-10">
                                                        <button type="submit" class="btn btn-default">Sign in</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-md-3"></div>
                                    </div>-->






                <!-- Content Here -->














            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="../js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../js/plugins/metisMenu/metisMenu.min.js"></script>

        <!--     Morris Charts JavaScript 
            <script src="../js/plugins/morris/raphael.min.js"></script>
            <script src="../js/plugins/morris/morris.min.js"></script>
            <script src="../js/plugins/morris/morris-data.js"></script>-->

        <!-- Custom Theme JavaScript -->
        <script src="../js/sb-admin-2.js"></script>

 <script>
                                $(function ()
                                {
                                     $('[data-toggle="tooltip"]').tooltip()
                                });

                            </script>

        <script src="../js/validator_add_product.js"></script>
    </body></html>
