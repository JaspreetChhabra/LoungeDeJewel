<!DOCTYPE html>
<?php

include_once './DbCredintials.php';
include './NavBar.php';
?>

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Panel</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
<!--    <link href="../css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">-->

    <!-- DataTables CSS -->
    <link href="../css/plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Order History</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
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
                                            echo "<tr><form  id=form name=form action=ViewOrderDetail.php method=POST>";
                                            
                                            echo '<td>' . $row['order_id'] . '</td>';
                                            $data=$row['product_info'];
                                                $xml = new SimpleXMLElement($data);
                                                
                                                $x=0;
                                                echo '<td>' ;
                                                foreach ($xml->children() as $parent) {
                                                
                                                    // $xml->p_id[$x]."<br/>";
                                                    echo $id=$xml->p_id[$x]."<br/>";
                                                   // echo $id=$xml->p_id[$x];
//                                                    $query = mysql_query("Select * from ldj_product WHERE product_id='$id'");
//                                                    while ($p_name = mysql_fetch_array($query)) {
//                                                        
//                                                        
//                                                        echo $p_name['product_name']."<br/>";
//                                                        
//                                                    }
                                                  $x++;  
                                                    
                                                }
                                                 echo '</td>';

                                            
                                            
                                            
                                            
                                            echo '<td>' . $row['order_date'] . '</td>';
                                            echo '<td>' . $row['order_status'] . '</td>';
                                            echo '<td><input type="submit" class="btn btn-primary"  btn-block=""   value="View And Edit" />
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

    <!-- DataTables JavaScript -->
    <script src="../js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="../js/plugins/dataTables/dataTables.bootstrap.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    
    <script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable();
        $('#dataTables-example_filter').hide();
    });
    
    
    
    </script>

</body>

</html>
