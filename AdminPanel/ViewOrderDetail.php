<!DOCTYPE html>
<?php
session_start();
if(!isset($_POST['delid']))
{
    $_POST['delid']=$_SESSION['delid'];
}
else
{
    $_SESSION['delid']=$_POST['delid'];
}
$oid=$_POST['delid'];
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
                    <h1 class="page-header">Full Order Details Page</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Order Information
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-10 col-sm-offset-1">
                                    
                                    <form class="form-horizontal" role="form" method="post" action="createSubadminHandler.php">
                                        <?php
                                        $query = mysql_query("Select * from ldj_orders WHERE order_id='$oid' ");
                                        while ($row = mysql_fetch_array($query)) {
                                        
                                            $data=$row['product_info'];
                                                $xml = new SimpleXMLElement($data);
                                                $x=0;
                                                foreach ($xml->children() as $parent) {
                                                    $arr[$x]=$xml->p_id[$x];
                                                    $x++;
                                                }
                                                for ($index = 0; $index < count($arr); $index++) {
                                                    echo "Array contents".$arr[$index];
                                                }
                                                //
                                        ?>
                                        <div class="form-group">
                                            <label class="col-lg-4 col-sm-5 col-xs-2 control-label">Order ID</label>
                                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-6 ">

                                               <label class="col-lg-7 col-sm-9 col-xs-2 control-label"><?php echo $row['order_id'];?></label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-4 col-sm-5 col-xs-2 control-label">Transaction ID</label>
                                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-6 ">

                                               <label class="col-lg-7 col-sm-9 col-xs-2 control-label"><?php echo $row['transaction_id'];?></label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-4 col-sm-5 col-xs-2 control-label">Order Status</label>
                                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-6 ">

                                               <label class="col-lg-7 col-sm-9 col-xs-2 control-label">
                                                   <select name="orderstatus" placeholder="<?php echo $row['order_status'];?>" class="form-control placeholder" >
                                                       <option id="tag1" selected="selected"><?php echo $row['order_status'];?></option>
                                                       <option value="Dispatching Soon">Dispatching Soon</option>
                                                       <option value="Dispatched">Dispatched</option>
                                                       <option value="In-Transit">In-Transit</option>
                                                       <option value="Out For Delivery">Out For Delivery</option>
                                                       <option value="Delivered">Delivered</option>
                                                   </select>
                                               </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-4 col-sm-5 col-xs-2 control-label">Payment Method</label>
                                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-6 ">

                                               <label class="col-lg-7 col-sm-9 col-xs-2 control-label">COD</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-4 col-sm-5 col-xs-2 control-label">Order Date</label>
                                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-6 ">

                                               <label class="col-lg-7 col-sm-9 col-xs-2 control-label"><?php echo $row['order_date'];?></label>
                                            </div>
                                        </div>
                                        <hr/>
                                        <div class="form-group">
                                            <label class="col-lg-4 col-sm-5 col-xs-2 control-label">User Name</label>
                                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-6 ">
                                                <?php
                                                $uid=$row['user_id'];
                                        }
                                          $query = mysql_query("Select user_fname,user_lname from ldj_user WHERE user_id='$uid' ");
                                        while ($user = mysql_fetch_array($query)) {
                                                $fn=$user['user_fname'];
                                                $ln=$user['user_lname'];
                                                ?>
                                               <label class="col-lg-7 col-sm-9 col-xs-2 control-label"><?php echo $fn." ".$ln;?></label>
                                            </div>
                                        </div>    
                                        <div class="form-group">
                                            <label class="col-lg-4 col-sm-5 col-xs-2 control-label">User Shipping Address</label>
                                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-6 ">
                                                <?php
                                                
                                        }
                                          $query = mysql_query("Select shipping_id from ldj_user_shipping_address WHERE user_id='$uid' ");
                                        while ($ship= mysql_fetch_array($query)) {
                                                $shipid=$ship['shipping_id'];
                                        }
                                          $query = mysql_query("Select * from ldj_shipping_address WHERE shipping_id='$shipid' ");
                                        while ($shipadd= mysql_fetch_array($query)) {
                                                $addline1=$shipadd['add_line_1'];
                                                $addline2=$shipadd['add_line_2'];
                                                $country=$shipadd['country'];
                                                $zipcode=$shipadd['zip_code'];
                                                $cityid=$shipadd['city_id'];
                                                $stateid=$shipadd['States_id'];
                                        
                                        }
                                        //echo 'Aa che city id:'.$cityid;
                                          $query = mysql_query("Select * from ldj_city WHERE city_id='$cityid' ");
                                        while ($city= mysql_fetch_array($query)) {
                                                $cityname=$city['city_name'];
                                        
                                        }
                                          $query = mysql_query("Select * from ldj_states WHERE States_id='$stateid' ");
                                        while ($state= mysql_fetch_array($query)) {
                                                $statename=$state['State_name'];
                                        
                                        }
                                        
                                        
                                                ?>
                                               <label class="col-lg-7 col-sm-9 col-xs-2 control-label"><?php echo $addline1;?></label>
                                               <label class="col-lg-7 col-sm-9 col-xs-2 control-label"><?php echo $addline2;?></label>
                                               <label class="col-lg-7 col-sm-9 col-xs-2 control-label"><?php echo $cityname;?></label>
                                               <label class="col-lg-7 col-sm-9 col-xs-2 control-label"><?php echo $statename;?></label>
                                               <label class="col-lg-7 col-sm-9 col-xs-2 control-label"><?php echo $country;?></label>
                                               <label class="col-lg-7 col-sm-9 col-xs-2 control-label"><?php echo $zipcode;?></label>
                                               
                                            </div>
                                            
                                        </div> 
                                        <hr/>
                                        <div class="form-group">
                                            <label class="col-lg-4 col-sm-5 col-xs-2 control-label">Product Name</label>
                                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-6 ">
                                                <?php
                                                     for ($index1 = 0; $index1 < count($arr); $index1++) {
                                                    $query = mysql_query("Select * from ldj_product WHERE product_id='$arr[$index1]'");
                                                    while ($p_name = mysql_fetch_array($query)) {

?>                                                  
                                                    <label class="col-lg-7 col-sm-9 col-xs-2 control-label"><?php  echo $p_name['product_name'];?></label>
                                                     <?php 
                                                    }
                                                }
                                                ?>    
                                              
                                            </div>
                                        </div>
                                        </form> 
                                        
                                                      </div>
                                        </div>
                                        <?php 
                                        ?>
                                       
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
        
//        $(select).click(
//                {
                  $('#tag1').hide();  
//                });
////        $('select').blur(
//                {
//                  $('#tag1').show();  
//                });
                
        
    });
    </script>

</body>

</html>
