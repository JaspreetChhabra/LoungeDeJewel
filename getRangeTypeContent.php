<?php
$type = json_decode($_REQUEST['value']);

$abc=explode(",", $type);

    
    
    
$con = mysql_connect("localhost", "root", "") or die("Error connecting to server" . mysql_error());
$db_select = mysql_select_db("jwelleryshop") or die("Error connecting to Database" . mysql_error());
$x=0;
foreach ($abc as $key) {
//    echo "Got value: " . $key;
$arr[$x]=$key;
    $x++;
    
}

    $sql = "SELECT * FROM ldj_product WHERE product_selling_price BETWEEN '$arr[0]' AND '$arr[1]'";
    $result = mysql_query($sql);
    if(mysql_num_rows($result) == 0)
    {
        echo '<center>No Product In This Range</center>';
    }
    else
    {
//    echo $result;
    while ($row = mysql_fetch_array($result)) {
        $data = $row['product_attribute'];
        $xml = new SimpleXMLElement($data);
        $mattype = $xml->material[0];
        
        
        $imagedata=$row['product_img_path'];
        $imagexml=new SimpleXMLElement($imagedata);
        
            ?>

            <div class="col-sm-4">
                <div class="product-image-wrapper">

                    <div class="single-products">
                        <div class="productinfo text-center">
                            <a href="http://localhost/LoungeDeJewel/product-details.php"><img src=<?php echo $imagexml->image[0]; ?> alt="" height="250" width="250"/></a>
                            <h2><?php echo $row['product_selling_price'] . " Rs."; ?></h2>
                            <p><?php echo $row['product_name']; ?></p>
                            <a href="http://localhost/LoungeDeJewel/product-details.php" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>


                        <div class="product-overlay" id='overlayid' >
                            <div class="overlay-content" >
                                <h2><?php// echo "Rs " . $row['product_selling_price']; ?></h2>
                                <p><?php //echo $row['product_name']; ?></p>
<div>
<!--                                                                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-star"></i>Add to wishlist</a>-->
                                                            <button onclick="addtoWishlist(<?php echo $row['product_id']; ?>)" class="btn btn-default add-to-cart" ><i class="fa fa-star"></i>Add to Wishlist</button>
                                                        </div>

                                <form method="POST" action="product-details.php">
                                    <input type="hidden" value='<?php echo $row['product_id']; ?>' name='pid' id='pid'/>
            <!--                                                        <input type="text" value='<?php // echo $row['product_id'];  ?>' name='pid' id='pid'/>-->
                                     <div>
                                                            <input type="submit" class="btn btn-default add-to-cart" value="Buy Now" >
<!--                                                            <span class=" glyphicon glyphicon-shopping-cart"> <input type="submit" class="btn btn-default add-to-cart" value="Buy Now" ></span>-->
                                                    </div>




                                </form>
                            </div>
                        </div>



                    </div>

                </div>


            </div>

            <?php
        
 
    }
}



//$arr = str_getcsv($type, ',');
//echo $arr;

    
    
    
    
    
    




?>