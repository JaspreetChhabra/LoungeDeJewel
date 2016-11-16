<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//include './EditProductValuesHandler.php';
session_start();
include './NavBar.php';

if(!isset($_POST['product_getid']))
{
    $_POST['product_getid']=$_SESSION['productID'];
}
else
{
    $_SESSION['productID']=$_POST['product_getid'];
}


$id=$_POST['product_getid'];


//$_SESSION['productID'] = $id;

include_once './DbCredintials.php';
$query = mysql_query("Select * from ldj_product");
while ($row = mysql_fetch_array($query)) {
    
          if($row['product_id'] == $_SESSION['productID'])
          {
            
            $_SESSION['productName']=$row['product_name'];
            $_SESSION['quantity']=$row['stock_quantity'];
            $_SESSION['desc']=$row['product_desc'];
            $_SESSION['pageTitle']=$row['page_title'];
            $_SESSION['mrp']=$row['product_mrp'];
            $_SESSION['sp']=$row['product_selling_price'];
            $_SESSION['cid']=$row['category_id'];
            $_SESSION['imagePath']=$row['product_img_path'];
            $_SESSION['updateDate']=$row['product_last_update'];
            $_SESSION['updateBy']=$row['product_last_update_by'];
            $_SESSION['productAttribute']=$row['product_attribute'];
          }
        
    }

$cquery = mysql_query("Select category_type from ldj_product_category WHERE category_id='$_SESSION[cid]'");
while ($row2 = mysql_fetch_array($cquery)) {
$cname= $row2['category_type'];   
}












?>

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
                window.history.go(-1);
    }
            
            function checkweight(val)
            {
//                var regex='//';
//                if(val)
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
            
            <div id="page-wrapper" style="min-height: 169px;">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Update Product</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!--                                <div class="container col-lg-12" >-->
                <div class="panel panel-default">
                    <div class="panel-heading">Section 1:Basic Information about Products</div>
                </div>



                <div class="row">
                    <div class="col-md-12">
                        <form class="form-horizontal" role="form" action="SaveEditProductHandler.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <div class="col-sm-4 col-lg-2 col-md-2 col-xs-4">
                                    <label class="control-label"id="label">Product Name </label>
                                </div>
                                <div class="col-sm-8 col-lg-4 col-md-4 col-xs-8">
                                    <input type="text" name="pname" class="form-control" value="<?php echo $_SESSION['productName'];?>">
                                </div>

                            </div>
                            
                            <?php
                            $sql="SELECT * FROM ldj_product_category";
                            $result=  mysql_query($sql);
                            
                            ?>
                            
                            
                            <div class="form-group">
                                <div class="col-sm-4 col-lg-2 col-md-2 col-xs-4">
                                    <label class="control-label"id="label">Product Category</label>
                                </div>
                                <div class="col-sm-4 col-lg-4 col-md-4 col-xs-8">
                                    <select name="cat"  class="form-control placeholder" >
                                     <option id="cattag" value="<?php echo $_SESSION['cid'];?>" selected="selected"><?php echo $cname; ?></option>
                                        
                                       <?php 
                                       //echo $row1['category_id'];
                                       $_SESSION['cat_id']=$row1['category_id'];
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
                                    <input name="mrp" type="text" class="form-control" value='<?php echo $_SESSION['mrp']; ?>'>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="col-sm-4 col-lg-2 col-md-2 col-xs-4">
                                    <label class="control-label"id="label">Selling Price (Rs) </label>
                                </div>
                                <div class="col-sm-4 col-lg-4 col-md-4 col-xs-8">
                                    <input name="sp" type="text" class="form-control" value='<?php echo $_SESSION['sp']; ?>' >
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="col-sm-4 col-lg-2 col-md-2 col-xs-4">
                                    <label class="control-label"id="label">Description </label>
                                </div>
                                <div class="col-sm-4 col-lg-4 col-md-4 col-xs-8">
                                    <textarea name="desc" class="form-control"><?php echo $_SESSION['desc']; ?></textarea>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="col-sm-4 col-lg-2 col-md-2 col-xs-4">
                                    <label class="control-label"id="label">Quantity </label>
                                </div>
                                <div class="col-sm-4 col-lg-4 col-md-4 col-xs-8">
                                    <input name="quantity" type="number" class="form-control" value='<?php echo $_SESSION['mrp']; ?>'>
                                </div>

                            </div>

                            <div class="form-group">
                                <div class="col-sm-4 col-lg-2 col-md-2 col-xs-4">
                                    <label class="control-label"id="label">Image </label>
                                </div>
                                <?php
                                $data=$_SESSION['imagePath'];
                                $xml = new SimpleXMLElement($data);
                                //echo $xml->image[0];
                                ?>
                                <div class="col-sm-3 col-lg-8 col-md-8 col-xs-3">
                                    <input name="img1" type="file" id="getimage"  onchange="PreviewImage()" value="<?php echo $xml->image[0]; ?>" />
                                </div>
                                <div class="col-sm-3 col-lg-8 col-md-8 col-xs-3">
                                    <br/>
                                    <img class="img-responsive" id='image1' height="200" width="200" src='<?php echo $xml->image[0];?>'>
                                
                                </div>
                                
                            </div>

                            <div class="form-group">
                                <div class="col-sm-4 col-lg-2 col-md-2 col-xs-4">
                                    <label  class="control-label"id="label">Image 2</label>
                                </div>
                                <div class="col-sm-3 col-lg-8 col-md-8 col-xs-3">
                                    <input name="img2" type="file" id="getimage1" onchange="PreviewImage1()" value="<?php echo $xml->image[1];?>"/>
                                </div>
                                <div class="col-sm-3 col-lg-8 col-md-8 col-xs-3" id="image">
<br/>
                                    <img class="img-responsive" id="image2" height="200" width="200" src='<?php echo $xml->image[1];?>'>
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
                                    <input name="pagetitle" type="text" class="form-control" value='<?php echo $_SESSION['pageTitle']; ?>'>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-4 col-lg-2 col-md-2 col-xs-4">
                                    <label class="control-label"id="label">Meta Keywords</label>
                                </div>
                                <div class="col-sm-4 col-lg-4 col-md-4 col-xs-8">
                                    <input name="metakeywords" type="text" class="form-control" placeholder=" ">
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">Section 3:Features</div>
                            </div>

                            
                            <?php
                            $productAttributes = $_SESSION['productAttribute'];

                            file_put_contents("proattri.xml", $productAttributes);
                            $contents = simplexml_load_file("proattri.xml");
                            ?>
                            <div class="form-group">
                                <div class="col-sm-4 col-lg-2 col-md-2 col-xs-4">
                                    <label class="control-label"id="label">Occasion</label>
                                </div>
                                <div class="col-sm-4 col-lg-4 col-md-4 col-xs-8">
                                    <select name="occasion" placeholder="<?php echo "<b>" . $contents->occasion[0] . "</b>"; ?>" class="form-control placeholder" >
                                        <option id="occ" selected="selected"><?php echo $contents->occasion[0]; ?></option>
                                        <option value="Traditional">Traditional</option>
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
                                    <select name="material" class="form-control" placeholder='<?php echo "<b>" . $contents->material[0] . "</b>"; ?>' >
                                        <option id="mat" selected="selected"><?php echo $contents->material[0]; ?></option>
                                        <option value="American Diamond" >American Diamond</option>
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
                                    <select name="color" class="form-control" placeholder='<?php echo "<b>" . $contents->color[0] . "</b>"; ?>' >
                                            <option id="color" selected="selected"><?php echo $contents->color[0]; ?></option>
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

                                    <select name="stonetype" class="form-control placeholder='<?php echo "<b>" . $contents->stoneType[0] . "</b>"; ?>' >
                                            <option id="stone" selected="selected"><?php echo $contents->stoneType[0]; ?></option>
                                        <option selected="selected">Emerald</option>
                                        <option value="Ruby">Ruby</option>
                                        <option value="Gemstone">Gemstone</option>

                                    </select>
                                </div>
                            </div>
                            
                            
                            <?php
                            $query=  mysql_query("SELECT * FROM ldj_discount WHERE product_id='$id'");
        if(mysql_num_rows($query) > 0)
        {
            while ($discountarr = mysql_fetch_array($query)) {
                $dp=$discountarr['product_discount(%)'];
         $from=$discountarr['valid_from'];
         $to=$discountarr['valid_to'];
            }
            
        }
                            ?>
                            
                            
                            
                            <div class="form-group">
                                <div class="col-sm-4 col-lg-2 col-md-2 col-xs-4" id="cb">
                                    <label class="control-label"id="label">Discount</label>
                                </div>
                                <div class="col-lg-9 col-md-10 col-sm-10 col-xs-10" id="cb">
  <div class="col-lg-2 col-md-3 col-sm-3 col-xs-3">
      <input type="checkbox" name="same" id="same" class="checkbox"></div>
  <div class="col-lg-5 col-md-6 col-sm-6 col-xs-6">
    Add Discount To Product
  </div>                  
                                    
                                    
                                </div>
                            </div>

                            <div class="form-group" id="did1">
                                <div class="col-sm-4 col-lg-2 col-md-2 col-xs-4">
                                        <label class="control-label"id="label">Discount %</label>
                                    </div>
                                    <div class="col-sm-4 col-lg-4 col-md-4 col-xs-8">
                                        <input type="number" class="form-control" min="0" max="100" value="<?php echo $dp;?>" name="dispercent">
                                    </div>
                            </div> 
                            <div class="form-group" id="did2">
                                    <div class="col-sm-4 col-lg-2 col-md-2 col-xs-4">
                                        <label class="control-label"id="label">Discount From</label>
                                    </div>
                                    <div class="col-sm-4 col-lg-4 col-md-4 col-xs-8">
                                        <input type="date" class="form-control"  value="<?php echo $from;?>"   name="disfrom">
                                    </div>
                            </div>
                            <div class="form-group" id="did3">
                                <div class="col-sm-4 col-lg-2 col-md-2 col-xs-4">
                                        <label class="control-label"id="label">Discount To</label>
                                    </div>
                                    <div class="col-sm-4 col-lg-4 col-md-4 col-xs-8">
                                        <input type="date" class="form-control" value="<?php echo $to;?>"   name="disto">
                                    </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-sm-4 col-lg-2 col-md-2 col-xs-4">
                                    <label class="control-label"id="label">Weight(grams)</label>
                                </div>
                                <div class="col-sm-4 col-lg-4 col-md-4 col-xs-8">
                                    <input name="weight" type="text" onblur="checkweight(this.value)" class="form-control" value='<?php echo $contents->weight[0]; ?>'>
                                </div>
                            </div>


                            
                            <div class="form-group">
                                <div class="col-sm-4 col-lg-2 col-md-2 col-xs-4">
                                    <label class="control-label"id="label">Last Updated By</label>
                                </div>
                                <div class="col-sm-4 col-lg-4 col-md-4 col-xs-8">
                                    <input name="lastupdated" type="text" class="form-control" value='<?php echo $_SESSION['updateBy']; ?>' disabled="">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4 col-lg-2 col-md-2 col-xs-4">
                                    <label class="control-label"id="label">Last Updated</label>
                                </div>
                                <div class="col-sm-4 col-lg-4 col-md-4 col-xs-8">
                                    <input name="lastupdated" type="text" class="form-control" value='<?php echo $_SESSION['updateDate']; ?>' disabled="">
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
        $(document).ready(function() {
        
        $('#cattag').hide();
        $('#occ').hide();
        $('#mat').hide();
        $('#stone').hide();
        $('#color').hide();
//        $('#did1').hide();
//        $('#did2').hide();
//        $('#did3').hide();
//        
//        $('#checkMe').click(
//                alert("Hello");
//                {
//                   $('#did1').show(2000);
//        $('#did2').show(2000);
//        $('#did3').show(2000);
//         
//                });
//        
//        
//    });
    </script>
 <script>
         $(document).ready(function()
         {
             $('#did1').hide();
             $('#did2').hide();
             $('#did3').hide();
             
         });
 $('#same').change(function(){
  if($(this).prop("checked")) {
    $('#did1').show();
  } else {
    $('#did1').hide();
  }
});
 $('#same').change(function(){
  if($(this).prop("checked")) {
    $('#did2').show();
  } else {
    $('#did2').hide();
  }
});
 $('#same').change(function(){
  if($(this).prop("checked")) {
    $('#did3').show();
  } else {
    $('#did3').hide();
  }
});

// $('#same').change(function(){
//  if($(this).prop("checked")) {
//    $('#s_city').hide();
//  } else {
//    $('#s_city').show();
//  }
//});
// $('#same').change(function(){
//  if($(this).prop("checked")) {
//    $('#s_state').hide();
//  } else {
//    $('#s_state').show();
//  }
//});
// $('#same').change(function(){
//  if($(this).prop("checked")) {
//    $('#s_country').hide();
//  } else {
//    $('#s_country').show();
//  }
//});
// $('#same').change(function(){
//  if($(this).prop("checked")) {
//    $('#s_zipcode').hide();
//  } else {
//    $('#s_zipcode').show();
//  }


        </script>



    </body></html>
