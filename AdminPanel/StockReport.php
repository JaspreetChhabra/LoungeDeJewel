<?php
include_once './DbCredintials.php';
include './NavBar.php';
?>

<html lang="en"><head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Manage Stock</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

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
        
        <div style="min-height: 329px;" id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <br/><br/>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Product Stock Information
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Sr No</th>
                                            <th>Product Image</th>
                                            <th>Product Name</th>
                                            <th>Stock Quantity</th>
                                            <th>Operation</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
<!--                                        <tr>-->
<!--                                            <td>
                                                
                                            </td>-->
                                   
                                    
                                        <?php

                                        $query = mysql_query("Select * from ldj_product ");
                                        while ($row = mysql_fetch_array($query)) {
                                            echo "<tr><form id=form name=form action=UpdateProducts.php method=POST>";
                                            
                                            $data = $row['product_img_path'];
                                            $xml = new SimpleXMLElement($data);
                                                
//                                                $x=0;
//                                                foreach ($xml->children() as $parent) {
//                                                
//                                                    echo $xml->p_name[$x]."<br/>";
//                                                    $x++;
//                                                }
//                                                
                                                

                                            $x=1;
                                            echo '<td>' . $row['product_id'] . '</td>';
                                            
                                            echo '<td>';?>
                                                <img height=100 width=100 src='<?php echo $xml->image[0]; ?>' />
                                            <?php 
                                            echo '</td>';
                                            echo '<td>' . $row['product_name'] . '</td>';
                                            echo '<td>' . $row['stock_quantity'] . '</td>';
                                            echo '<td><input type="submit" style="margin-top:35px;width:85px" class="btn btn-primary"  btn-block=""   value="Edit" />
                                                 </td>';
//                                            
                                        ?>
                                                
                                                
                                                <input type="hidden" name='delid' value=<?php echo $row['product_id']; ?> />
                                                
                                                <!-- Button trigger modal -->

<!--                                                <modal popup>-->
                                        <input type="hidden" name="product_getid" id="pid" value=<?php echo $row['product_id']; ?> />
                                        <?php
                                            echo "</form></tr>";
                                            $x++;
                                        }
                                        ?>
                                    
<!--                                        </tr>-->
                                        </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
                
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
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
    });
   
    
    </script>
        



</body></html>