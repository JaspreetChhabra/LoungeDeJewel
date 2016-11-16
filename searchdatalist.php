<?php
 
        include './DbCredintials.php';
        $con = mysql_connect("localhost", "root", "") or die("Error connecting to server" . mysql_error());
        $db_select = mysql_select_db("jwelleryshop") or die("Error connecting to Database" . mysql_error());


        $select = $_GET['value'];
        //$qty = $_REQUEST['quantity'];
       // echo $select;
       
        $searchProduct = mysql_query("select * from ldj_product where product_name='$select'");
        while ($row = mysql_fetch_array($searchProduct)) {
            $value =  $row['product_id'];
            $value1 = $row['product_name'];
            if($select != $value1)
            {
                  echo "no";
                  
            }
            else
            {
              
                echo $value;
            }
    
}