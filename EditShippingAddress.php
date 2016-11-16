<?php 
header('Cache-Control: no cache'); //no cache
session_cache_limiter('must-revalidate');

session_start();

$con = mysql_connect("localhost", "root", "") or die("Error connecting to server" . mysql_error());
$db_select = mysql_select_db("jwelleryshop") or die("Error connecting to Database" . mysql_error());


    
$add1 = $_REQUEST['add1'];
$add2 = $_REQUEST['add2'];
$city = $_REQUEST['city'];
$state = $_REQUEST['state'];
$country = $_REQUEST['country'];
$zipcode = $_REQUEST['zipcode'];
$shipid = $_REQUEST['shipid'];

//echo $shipid;

$cityselect = mysql_query("Select * from ldj_city");
while ($row = mysql_fetch_array($cityselect)) {
    if( $city == $row['city_name'])
    {
        $cityid = $row['city_id'];
    }
    
}
$stateselect = mysql_query("Select * from ldj_states");
while ($row = mysql_fetch_array($stateselect)) {
    if( $state == $row['State_name'])
    {
        $stateid = $row['States_id'];
    }
    
}

$shipupdate = mysql_query("UPDATE ldj_shipping_address SET add_line_1='$add1' , add_line_2='$add2' , city_id= $cityid , States_id=$stateid , country='$country' , zip_code='$zipcode' WHERE shipping_id='$shipid'");

?>


<div class="panel panel-default">
                        <div class="panel-heading">Shipping Address</div>
                        <div class="panel-body">

                            <form class="form-horizontal" role="form" method="post" action="" id="editform">
                                <?php
//                                        echo $_SESSION['email'];
                                $selectquery = mysql_query("Select * from ldj_user");

                                if (mysql_num_rows($selectquery) > 0) {
                                    while ($row1 = mysql_fetch_array($selectquery)) {

                                        if ($row1['user_email_id'] == $_SESSION['email']) {
                                            $uid = $row1['user_id'];

                                            $shippingAddID = mysql_query("Select * from ldj_user_shipping_address where user_id='$uid'");
//                                                          echo $shippingAdd;
                                            while ($row2 = mysql_fetch_array($shippingAddID)) {
                                                $shipid = $row2['shipping_id'];
                                                $shippingAdd = mysql_query("Select * from ldj_shipping_address where shipping_id='$shipid'");
//                                                              echo $shippingAdd;
                                                while ($row3 = mysql_fetch_array($shippingAdd)) {
                                                    ?>
                                                    <div class="form-group">
                                                        <label class="col-lg-6 col-sm-5 col-xs-2"><?php echo $row1['user_fname'] . " " . $row1['user_lname']; ?></label>

                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-lg-5 col-sm-5 col-xs-2 ">Address Line 1</label>
                                                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-6 ">

                                                            <label class="col-lg-10 col-sm-9 col-xs-2 "><?php echo $row3['add_line_1']; ?></label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-lg-5 col-sm-5 col-xs-2 ">Address Line 2</label>
                                                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-6 ">

                                                            <label class="col-lg-10 col-sm-9 col-xs-2"><?php echo $row3['add_line_2']; ?></label>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-lg-5 col-sm-5 col-xs-2 ">City</label>
                                                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-6 ">

                                                            <label class="col-lg-10 col-sm-9 col-xs-2 ">

                                                                <?php
                                                                $cityid = $row3['city_id'];
                                                                $city = mysql_query("Select city_name from ldj_city where city_id='$cityid'");
                                                                while ($row4 = mysql_fetch_array($city)) {
                                                                    echo $row4['city_name'];
                                                                }
                                                                ?>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-lg-5 col-sm-5 col-xs-2 ">State</label>
                                                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-6 ">

                                                            <label class="col-lg-10 col-sm-9 col-xs-2 ">
                                                                <?php
                                                                $stateid = $row3['States_id'];
                                                                $state = mysql_query("Select State_name from ldj_states where States_id='$stateid'");
                                                                while ($row4 = mysql_fetch_array($state)) {
                                                                    echo $row4['State_name'];
                                                                }
                                                                ?></label>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-lg-5 col-sm-5 col-xs-2 ">Country</label>
                                                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-6 ">

                                                            <label class="col-lg-10 col-sm-9 col-xs-2 "><?php echo $row3['country']; ?></label>
                                                        </div>
                                                    </div>  
                                                    <div class="form-group">
                                                        <label class="col-lg-5 col-sm-5 col-xs-2 ">Zip Code</label>
                                                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-6 ">

                                                            <label class="col-lg-10 col-sm-9 col-xs-2 "><?php echo $row3['zip_code']; ?></label>
                                                        </div>
                                                    </div>  



                                                    <?php
                                                }
                                            }
                                        }
                                    }
                                }
                                ?>

                                <div class="panel-footer">

                                    <button type="button" class="btn btn-default" onclick="editShipAdd()" style="float: right;">Edit</button> 
                                    <button type="button" class="btn btn-default" onclick="window.location.replace('billdetails.php')" style="float: right;">Deliver On This Address</button> 



                                </div>
                            </form>  
                        </div>
                    </div>




