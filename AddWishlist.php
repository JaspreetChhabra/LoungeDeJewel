
<?php

session_start();

$con = mysql_connect("localhost", "root", "") or die("Error connecting to server" . mysql_error());
$db_select = mysql_select_db("jwelleryshop") or die("Error connecting to Database" . mysql_error());


//    $select = $_REQUEST['value'];
//$qty = $_REQUEST['quantity'];


$user_id = $_SESSION['uid'];
$flag = 0;
$productid = $_REQUEST['value'];
$query = mysql_query("SELECT product_ids FROM ldj_wishlist WHERE user_id='$user_id'");
while ($row = mysql_fetch_array($query)) {

    $data = $row['product_ids'];
}

$xmlCheck = new SimpleXMLElement($data);
$count = count($xmlCheck->p_id);
//    echo "Count : ".$count."<br>";


if ($count == 8) {
    echo '2';
} else {


    $x = 0;
    foreach ($xmlCheck->children() as $parent) {
        $pid = $xmlCheck->p_id[$x];
//        echo $pid;
//        echo "Product id :".$productid;
        if ($productid == $pid) {
            $flag = 1;
            break;
        }
        $x++;
    }
    if ($flag == 1) {
        echo 3;
    } else {
        $xml = new SimpleXMLElement($data);
        $xml->addChild('p_id', $productid);
        $ans = $xml->asXML();
        $query = mysql_query("UPDATE ldj_wishlist SET product_ids='$ans' WHERE user_id='$user_id'");

//            file_put_contents("append.xml", $ans);

        if ($query) {
            echo '0';
        } else {
            echo '1';
        }
    }
}
?>
