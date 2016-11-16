<?php

/**
 * This example shows settings to use when sending via Google's Gmail servers.
 */
//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that

session_start();


$con = mysql_connect("localhost", "root", "") or die("Error connecting to server" . mysql_error());
$db_select = mysql_select_db("jwelleryshop") or die("Error connecting to Database" . mysql_error());

$cartSelect = mysql_query("Select * From cartTable");
if (mysql_num_rows($cartSelect) > 0) {

    $doc = new DOMDocument( );
    $ele = $doc->createElement('productInfo');
    $doc->appendChild($ele);


    while ($cartInfo = mysql_fetch_array($cartSelect)) {
        $pid = $cartInfo['product_id'];
        $qty = $cartInfo['Quantity'];

        $ele1 = $doc->createElement('pid');
        $ele1->nodeValue = $pid;
        $ele->appendChild($ele1);
    }

    $doc->save('OrderproductInfo.xml');

    $data = file_get_contents('OrderproductInfo.xml');
} else {
    $data = 'null';
}

$bid = $_SESSION['bill_id'];
$uid = $_SESSION['user_id'];


date_default_timezone_set('Asia/Calcutta');
$cd = date('Y-m-d H:i:s');

$insertOrderDetails = mysql_query("INSERT INTO ldj_orders values(null ,'$data' , $uid , '$cd' , 'Dispatched' , null , 'COD' , $bid)");
echo $insertOrderDetails;

$updateStockSelect = mysql_query("Select * from cartTable");

if(mysql_num_rows($updateStockSelect) > 0)
{
    while ($productID = mysql_fetch_array($updateStockSelect)) {
        $pid = $productID['product_id'];
        $qty = $productID['Quantity'];
        
        $productStock = mysql_query("Select * from ldj_product where product_id='$pid'");
        while ($getStock = mysql_fetch_array($productStock)) {
            $stock = $getStock['stock_quantity'];
            echo 'Stock '.$stock;
        }
        $stock = $stock-$qty;
//        echo 'Updated Stock :'.$stock;
        $updateStock = mysql_query("UPDATE ldj_product SET stock_quantity='$stock' where product_id='$pid'");
//        echo $updateStock;
    }
}
else
{
    echo 'No Stock To Update';
}

date_default_timezone_set('Etc/UTC');

require 'PHPMailer-master/PHPMailerAutoload.php';
echo $_SESSION['email'];
$emailid = $_SESSION['email'];
echo $emailid;
//Create a new PHPMailer instance
$mail = new PHPMailer;

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 2;

//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "mistryakshar54@gmail.com";

//Password to use for SMTP authentication
$mail->Password = "atn1611947";

//Set who the message is to be sent from
$mail->setFrom('from@example.com', 'Lounge De Jewel');

//Set an alternative reply-to address
$mail->addReplyTo('replyto@example.com', 'Lounge De Jewel');

//Set who the message is to be sent to
$mail->addAddress($emailid);

//Set the subject line
$mail->Subject = 'Order Confirmation';
$mail->Body = "Your Order Has Been confirmed";
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';
$mail->isHTML(true);
//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');
//send the message, check for errors
if (!$mail->send()) {
    //echo "Mailer Error: " . $mail->ErrorInfo;
    header('location:finalCheckout.php');
} else {
    echo "Message sent!";
    header('location:finalCheckout.php');
}