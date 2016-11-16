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

        <!-- Morris Charts CSS -->
        <link href="../css/plugins/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="../css/manageproducts.css" rel="stylesheet">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script src="../js/jquery.js"></script>
        <script type="text/javascript">
            function getid()
            {
                alert("Set Value as : ");
                var val = document.getElementById("pid").value;
                document.getElementById("getid").value = val;
                alert("Set Value as : " + val);
                window.location="EditProducts.php?id="+val;



            }
        </script>
<!--    <script>
    
    $(document).ready(function(){
  
    $("#sidenav").hide(1000);
  
});

    
    </script>-->

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

            <div id="page-wrapper" style="min-height: 473px;">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Manage Products</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>


<!--            <style>
    @media screen and (max-width: 900px)
    {
        #tblcon
        {margin-left: -40px;}
    }
    
</style>-->

                <!-- Table -->

                <div class="container" id="tblcon" style="margin-left: -40px;">
                    <div class="col-lg-12">
<!--                        action="EditProducts.php" method="POST"-->
                        <form onsubmit="<script>alert('hie');</script>">
                            <table class="table table-responsive" >
                                <tbody><tr>
                                        <td>
                                            Image
                                        </td>
                                        <td>
                                            Name
                                        </td>
                                        <td>
                                            MRP (Rs.)
                                        </td>
                                        <td>
                                            Selling Price

                                        </td>
                                        <td>
                                            Quantity
                                        </td>
                                        <td>
                                            Operation
                                        </td>
                                    </tr>
                                    <?php
                                    $connect = mysql_connect("localhost", "root", "") or die("Couldn't connect to Database Server");

                                    mysql_select_db("jwelleryshop") or die("No database found");

                                    $query = mysql_query("Select * from ldj_product ");
                                    while ($row = mysql_fetch_array($query)) {
                                        echo '<tr>';
                                        $data = $row['product_img_path'];
////                                file_put_contents("a.txt", $data);
//                                echo '<td><img height=100 width=100 src='.file_get_contents("a.txt").' /></td>';
                                        $xml = new SimpleXMLElement($data);
                                        ?>
                                    <td><img class="img-responsive" height="200" width="200" src='<?php echo $xml->image[0]; ?>'></td>
                                        <?php
                                        echo '<td>' . $row['product_name'] . '</td>';
                                        echo '<td>' . $row['product_mrp'] . '</td>';
                                        echo '<td>' . $row['product_selling_price'] . '</td>';
                                        echo '<td>' . $row['stock_quantity'] . '</td>';
                                        echo '<td><input type="submit" class="btn" btn-primary=""  btn-block=""   value="Edit" >
                                            
                                      <br/><br/><input type="button" class=btn btn-primary btn-block=""  value="Delete" onclick="EditProducts.php" name=$row[product_name]></td>';
                                       // echo '<td><input type="hidden" value =' . $row['product_id'] . ' name="pid />"</td>';
                                        ?><input type='text' id="getid"  name="getid"  value=<?php echo $row['product_id'];?> />
                                        <?php        
                                        echo '</tr>';
                                    }
                                    ?>
                                
                                </tbody></table>
                            <input type="text" value="0" name="pid" id="setid" />
                            
                        </form>
<input type="button" onclick="getid()" value="Edit" >
                    </div>
                    <!-- /.col-lg-12 -->
                    
                </div>
                





                <!-- Content Here -->














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




    </body></html>