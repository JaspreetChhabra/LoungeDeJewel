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

        <title>Product Report</title>

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
                                                <th>Product ID </th>

                                                <th>Product Image</th>
                                                <th>Product Name</th>
                                                <th>Total Purchases</th>
                                                <th>Stock Quantity</th>


                                            </tr>
                                        </thead>
                                        <tbody>

                                            <!--Product Report-->

                                            <?php
                                            $tablename = "productReportTable";
                                            $res = mysql_query("SELECT table_name FROM information_schema.tables WHERE table_name = '$tablename';");
                                            $count = mysql_num_rows($res);


                                            if ($count > 0) {
//                                                echo ' Product Table Existing';
                                                $dropTaable = mysql_query("DROP TABLE productreporttable");
//                                                echo $dropTaable;
                                            }
                                            $query = "CREATE TABLE productReportTable (
                                                serial_no INT AUTO_INCREMENT PRIMARY KEY,
                                                product_id INT
                                                )";

                                            $result = mysql_query($query);
//                                            echo "Cart Table Result : " . $result;


                                            $selectOrders = mysql_query("Select * from ldj_orders");

                                            if (mysql_num_rows($selectOrders) > 0) {

                                                while ($row = mysql_fetch_array($selectOrders)) {


                                                    $data = $row['product_ids'];
                                                    if ($data != 'null') {
//                                                        echo $data;
                                                        file_put_contents("my.xml", $data);
                                                        $xml1 = new SimpleXMLElement($data);

                                                        $x = 0;
                                                        foreach ($xml1->children() as $value) {
                                                            $pid = $xml1->pid[$x];
//                                                            echo '<br>id :'.$pid;
                                                            $x++;
                                                            $insertproductReport = mysql_query("INSERT INTO productReportTable values(null , $pid)");
                                                        }
                                                    }
                                                }
                                            }

                                            $productReport1 = mysql_query("Select product_id from productReportTable group by product_id");
//                                            echo $productReport1;

                                            while ($row2 = mysql_fetch_array($productReport1)) {
//                                                echo "<br>value".$row2[0];
                                            }

                                            $productReport = mysql_query("Select count(product_id) , product_id  from productReportTable group by product_id order by count(product_id) DESC");
//                                            echo $productReport;
                                            $y=0;
                                            while ($row1 = mysql_fetch_array($productReport)) {
//                                                echo "<br>value".$row1[0];
//                                                echo "<br>value".$row1[1];
                                                   $array[$y]=$row1[1];
                                                   $y++;
                                                $query = mysql_query("Select * from ldj_product where product_id='$row1[1]'");
                                                while ($rowdisplay = mysql_fetch_array($query)) {
                                                    echo "<tr>";

                                                    $data = $rowdisplay['product_img_path'];
                                                    $xml = new SimpleXMLElement($data);

//                                                $x=0;
//                                                foreach ($xml->children() as $parent) {
//                                                
//                                                    echo $xml->p_name[$x]."<br/>";
//                                                    $x++;
//                                                }
//                                                


                                                    $x = 1;
                                                    echo '<td>' . $rowdisplay['product_id'] . '</td>';

                                                    echo '<td>';
                                                    ?>
                                                <img height=100 width=100 src='<?php echo $xml->image[0]; ?>' />
                                                <?php
                                                echo '</td>';
                                                echo '<td>' . $rowdisplay['product_name'] . '</td>';
                                                echo '<td>' . $row1[0] . '</td>';
                                                echo '<td>'. $rowdisplay['stock_quantity'] . 
                                                 '</td>';
                                            }
                                        }
                                        $xx=0;
                                        foreach ($array as $value) {
                                            if($xx !=5)
                                            {
                                                 $insertRecommendedItems = mysql_query("INSERT INTO ldj_recommended_items values(null , $value)");
                                                 
                                            }
                                            $xx++;
                                           
                                        }
                                        
                                        ?>

                                        <!--Product Report-->
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
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });


        </script>




    </body></html>