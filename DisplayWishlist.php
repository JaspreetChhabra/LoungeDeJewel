<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Product Details | Lounge De Jewel</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/prettyPhoto.css" rel="stylesheet">
        <link href="css/price-range.css" rel="stylesheet">
        <link href="css/animate.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet">
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->       
        <link rel="shortcut icon" href="images/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">

    </head>
    <body>




        <?php
        session_start();

        $con = mysql_connect("localhost", "root", "") or die("Error connecting to server" . mysql_error());
        $db_select = mysql_select_db("jwelleryshop") or die("Error connecting to Database" . mysql_error());

       
$uid=$_SESSION['uid'];
$total = 0;
$subtotal=0;
$fetchproduct = mysql_query("Select * from ldj_wishlist");
if(mysql_num_rows($fetchproduct) == 0)
{
    echo '<h1>WISHLIST EMPTY</h1>';
}
else
{
    ?>
        <table class="table table-condensed">
            <thead>
                <tr class="cart_menu">
                    <td class="image">Item</td>
                    <td class="description">Name</td>
                    <td class="description">Price</td>
                    
                    <td></td>
                </tr>
            </thead>
            <tbody>
        <?php
while ($wproduct = mysql_fetch_array($fetchproduct)) {
    $userid = $wproduct[1];
    $productid = $wproduct[2];
    $xml=new SimpleXMLElement($productid);
    $x=0;
    foreach ($xml->children() as $parent)
        {
        $pid=$xml->p_id[$x];
        
    
//    foreach ()
    $productinfo = mysql_query("Select * from ldj_product where product_id = '$pid'");

    while ($eachProductInfo = mysql_fetch_array($productinfo)) {
        ?>

                        <tr>
                            <td >
                                <?php $data1=$eachProductInfo['product_img_path'];
                                $xml1=new SimpleXMLElement($data1);
                                ?>
                                <a href = ""><img src = "<?php echo $xml1->image[0];?>" alt = "" height="100" width="100" class="img-responsive"></a>
                            </td>
                            <td>
                                <h4><a href = ""><?php echo $eachProductInfo[1]; ?></a></h4>
                                <p>Web ID: <?php echo $eachProductInfo[0]; ?></p>
                            </td>
                            <td>
                                <p><?php echo $eachProductInfo['product_selling_price']; ?></p>
                            </td>
                            <td>
                                <a class = "cart_quantity_delete" onclick="deleteWishlist(<?php echo $pid;?>,<?php echo $uid;?>)" ><i class = "fa fa-times"></i></a><br>
                                <button type="button" class="btn btn-primary" onclick="window.location.replace('http://localhost/LoungeDeJewelWebsite/product-details.php?pid=<?php echo $pro_id; ?>')">Add To Cart  </button>
<!--                                <a href='product-details.php?pid=<?php echo $pro_id; ?>'>Add To Cart</a>-->
                            </td>
                        </tr>
                        
        <?php }
        $x++;
        
    }
    
}
?>
                                  
                        
            </tbody>
        </table>
<?php } ?>
        

        <script src="js/jquery.js"></script>
        <script src="js/price-range.js"></script>
        <script src="js/jquery.scrollUp.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.prettyPhoto.js"></script>
        <script src="js/main.js"></script>
    </body>

</html>