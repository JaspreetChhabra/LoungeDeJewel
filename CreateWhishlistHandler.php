<?php
include_once './DbCredintials.php';
$connect = mysql_connect($servername, $dbuname, $dbpass) or die("Error connecting to server" . mysql_error());

mysql_select_db("jwelleryshop") or die("No database found");

echo $id= $_REQUEST['id'];

$doc = new DOMDocument( );
        $ele = $doc->createElement('product');
        $doc->appendChild($ele);

        $doc->save('ImagesPath.xml');


        $data = file_get_contents('ImagesPath.xml');
        echo $data;
        $query=  mysql_query("INSERT INTO ldj_wishlist (`sr_no`, `user_id`, `product_ids`) VALUES (NULL, $id, '$data')");
        if($query == 1)
        {
            header("Location:home.php");
        }