<?php

session_start();
include './DbCredintials.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

     <title>Manage Slider</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="../css/plugins/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin-2.css" rel="stylesheet">

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
        <script src="../js/jquery.js"></script>
        <script type="text/javascript">
            
            function goBack() {
                location.replace("../Dashboard.php");
            }
            
            
            function PreviewImage() {
                var oFReader = new FileReader();
                oFReader.readAsDataURL(document.getElementById("getimage").files[0]);

                oFReader.onload = function (oFREvent) {
                    document.getElementById("image1").src = oFREvent.target.result;
                };
            }
            
            function PreviewImage2() {
                var oFReader = new FileReader();
                oFReader.readAsDataURL(document.getElementById("getimage2").files[0]);

                oFReader.onload = function (oFREvent) {
                    document.getElementById("image2").src = oFREvent.target.result;
                };
            }
            function PreviewImage3() {
                var oFReader = new FileReader();
                oFReader.readAsDataURL(document.getElementById("getimage3").files[0]);

                oFReader.onload = function (oFREvent) {
                    document.getElementById("image3").src = oFREvent.target.result;
                };
            }
            function PreviewImage4() {
                var oFReader = new FileReader();
                oFReader.readAsDataURL(document.getElementById("getimage4").files[0]);

                oFReader.onload = function (oFREvent) {
                    document.getElementById("image4").src = oFREvent.target.result;
                };
            }
            function PreviewImage5() {
                var oFReader = new FileReader();
                oFReader.readAsDataURL(document.getElementById("getimage5").files[0]);

                oFReader.onload = function (oFREvent) {
                    document.getElementById("image5").src = oFREvent.target.result;
                };
            }
            
        </script>


</head>

<body>
    
    <div id="wrapper">

        <!-- Navigation -->
         <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0;width: auto;">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../dashboard.php">Lounge De Jewel Admin Panel</a>
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
                        <li><a href="userprofilehandler.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="../login.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" id="sidenav" role="navigation">
                <div class="sidebar-nav navbar-collapse collapse">
                    <ul class="nav" id="side-menu">
                        <br><br>
                        <li>
                            <a class="active" href="../dashboard.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Catalog<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                <li>
                                    <a href="./ManageProducts.php">Manage Products</a>
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
                                    <a href="ManageSubAdmin.php">Manage Sub-Admins</a>
                                </li>
                                <li>
                                    <a href="AddSubAdmin.php">Add New Sub-Admin</a>
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

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Manage Image Slider</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Slider
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-10">
                                    
                                    
                                    <form class="form-horizontal" role="form" action="ManageSliderHandler.php" method="post" enctype="multipart/form-data">

                                        <div class="form-group">
                                            <div class="col-sm-4 col-lg-2 col-md-2 col-xs-4">
                                                <label class="control-label"id="label">Image </label>
                                            </div>
                                            <?php
                                            $sql="SELECT * FROM ldj_slider";
                                            $result=  mysql_query($sql);
                                            $x=0;
                                            while ($row = mysql_fetch_array($result))
                                            {
                                                $img[$x]=$row['Image_path'];
                                                $data[$x]=$row['Description'];
                                                $x++;
                                            }
                                            
                                            ?>
                                            <div class="col-sm-3 col-lg-8 col-md-8 col-xs-3">
                                                <input name="img1" type="file" id="getimage"  onchange="PreviewImage()" value="<?php echo $img[0]; ?>" />
                                            </div>
                                            <div class="col-sm-3 col-lg-8 col-md-8 col-xs-3">
                                                <br/>
                                                <img class="img-responsive" id='image1'  src='<?php echo $img[0]; ?>'>

                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-4 col-lg-2 col-md-2 col-xs-4">
                                                <label  class="control-label"id="label">Image 1 Description</label>
                                            </div>
                                            <div class="col-sm-5 col-lg-8 col-md-8 col-xs-3">
                                                
                                                <input type="text" class="form-control" value='<?php echo $data[0]; ?>' size="500" id="desc1" name="desc1">
                                                    
                                                
                                                
                                            </div>
                                            

                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-4 col-lg-2 col-md-2 col-xs-4">
                                                <label  class="control-label"id="label">Image 2</label>
                                            </div>
                                            <div class="col-sm-3 col-lg-8 col-md-8 col-xs-3">
                                                <input name="img2" type="file" id="getimage2" onchange="PreviewImage2()" value="<?php echo $img[1]; ?>"/>
                                            </div>
                                            <div class="col-sm-8 col-lg-10 col-md-8 col-xs-3" id="image">
                                                <br/>
                                                <img class="img-responsive" id="image2"  src='<?php echo $img[1]; ?>'>
                                            </div>


                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-4 col-lg-2 col-md-2 col-xs-4">
                                                <label  class="control-label"id="label">Image 2 Description</label>
                                            </div>
                                            <div class="col-sm-5 col-lg-8 col-md-8 col-xs-3">
                                                
                                                <input type="text" size="500" class="form-control" value='<?php echo $data[1]; ?>'  id="desc2" name="desc2">
                                                   
                                                
                                            </div>
                                            
                                            

                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            <div class="col-sm-4 col-lg-2 col-md-2 col-xs-4">
                                                <label  class="control-label"id="label">Image 3</label>
                                            </div>
                                            <div class="col-sm-3 col-lg-8 col-md-8 col-xs-3">
                                                <input name="img3" type="file" id="getimage3" onchange="PreviewImage3()" value="<?php echo $img[2]; ?>"/>
                                            </div>
                                            <div class="col-sm-8 col-lg-10 col-md-8 col-xs-3" id="image">
                                                <br/>
                                                <img class="img-responsive" id="image3"  src='<?php echo $img[2]; ?>'>
                                            </div>


                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-4 col-lg-2 col-md-2 col-xs-4">
                                                <label  class="control-label"id="label">Image 3 Description</label>
                                            </div>
                                            <div class="col-sm-5 col-lg-8 col-md-8 col-xs-3">
                                                
                                                <input type="text" size="500" class="form-control" value='<?php echo $data[2]; ?>' id="desc3" name="desc3">
                                                  
                                            </div>
                                            
                                            

                                        </div>
                                        
                                        
                                                                              
                                        <div class="form-group">
                                            <div class="col-sm-4 col-lg-2 col-md-2 col-xs-4">
                                                <label  class="control-label"id="label">Image 4</label>
                                            </div>
                                            <div class="col-sm-3 col-lg-8 col-md-8 col-xs-3">
                                                <input name="img4" type="file" id="getimage4" onchange="PreviewImage4()" value="<?php echo $img[3]; ?>"/>
                                            </div>
                                            <div class="col-sm-8 col-lg-10 col-md-8 col-xs-3" id="image">
                                                <br/>
                                                <img class="img-responsive" id="image4"  src='<?php echo $img[3]; ?>'>
                                            </div>


                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-4 col-lg-2 col-md-2 col-xs-4">
                                                <label  class="control-label"id="label">Image 4 Description</label>
                                            </div>
                                            <div class="col-sm-5 col-lg-8 col-md-8 col-xs-3">
                                                
                                                <input type="text" class="form-control" value='<?php echo $data[3]; ?>' size="500" id="desc4" name="desc4">
                                                  
                                            </div>
                                            
                                            

                                        </div>
                                        
                                                                      
                                        <div class="form-group">
                                            <div class="col-sm-4 col-lg-2 col-md-2 col-xs-4">
                                                <label  class="control-label"id="label">Image 5</label>
                                            </div>
                                            <div class="col-sm-3 col-lg-8 col-md-8 col-xs-3">
                                                <input name="img5" type="file" id="getimage5" onchange="PreviewImage5()" value="<?php echo $img[4]; ?>"/>
                                            </div>
                                            <div class="col-sm-8 col-lg-10 col-md-8 col-xs-3" id="image">
                                                <br/>
                                                <img class="img-responsive" id="image5"  src='<?php echo $img[4]; ?>'>
                                            </div>


                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="col-sm-4 col-lg-2 col-md-2 col-xs-4">
                                                <label  class="control-label"id="label">Image 5 Description</label>
                                            </div>
                                            <div class="col-sm-5 col-lg-8 col-md-8 col-xs-3">
                                                
                                                <input type="text" class="form-control" value='<?php echo $data[4]; ?>' size="500" id="desc5" name="desc5">
                                                 
                                            </div>
                                            
                                            

                                        </div>
                       <div class="row">
                                <div class="col-sm-3 col-xs-4 col-lg-2 col-md-4 col-lg-offset-2 col-sm-offset-1">
                                    <button type="submit" id="fnbtn" class="btn btn-default">Edit</button>

                                </div>
    <div class="col-sm-8 col-xs-8 col-md-8 col-lg-5 col-lg-offset-0 col-md-offset-5">
                                    <button type="button" id="fnbtn" class="btn btn-default" onclick="goBack()">Cancel</button>
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
<!--             /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->

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


</body>

</html>
