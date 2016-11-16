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

       

$total = 0;
$subtotal=0;
$fetchproduct = mysql_query("Select * from carttable");
if(mysql_num_rows($fetchproduct) == 0)
{
    echo '<h1>CART EMPTY</h1>';
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
                    <td class="price">Quantity</td>
                    <td class="total">Total</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
        <?php
while ($cartproduct = mysql_fetch_array($fetchproduct)) {
    $id = $cartproduct[1];
    $qty = $cartproduct[2];
    
    $price = $cartproduct[3];
    $productinfo = mysql_query("Select * from ldj_product where product_id = '$id'");

    while ($eachProductInfo = mysql_fetch_array($productinfo)) {
        ?>

                        <tr>
                            <td>
                                <?php
                                    $data1=$eachProductInfo['product_img_path'];
                                    $xml1=new SimpleXMLElement($data1);
                                ?>
                                <a href = ""><img src = "<?php echo $xml1->image[0];?>" alt = "" height="100" width="100" class="img-responsive"></a>
                            </td>
                            <td >
                                <h4><a href = ""><?php echo $eachProductInfo[1]; ?></a></h4>
                                <p>Web ID: <?php echo $eachProductInfo[0]; ?></p>
                            </td>
                            <td>
                                <p><?php 
                                echo $eachProductInfo['product_selling_price']; ?></p>
                            </td>
                            <td >
                                <p><?php echo $qty; ?></p>
                            </td>
                            <td>
                                <p class = "cart_total_price"><?php  $total = $price*$qty; 
                                echo $total;?></p>
                            </td>
<!--                            <td class = "cart_delete">-->
                            <td>
                                <a class = "cart_quantity_delete" onclick="deletecart(<?php echo $id;?>)" ><i class = "fa fa-times"></i></a>
                                
                            </td>
                        </tr>
                        
    <?php }
    $subtotal = $subtotal + $total;
}
?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
            <td>Total</td>
            <td><?php echo $subtotal; ?></td>
            </tr>          
                        
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