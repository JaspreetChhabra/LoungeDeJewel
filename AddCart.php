
        <?php
        session_start();

        $con = mysql_connect("localhost", "root", "") or die("Error connecting to server" . mysql_error());
        $db_select = mysql_select_db("jwelleryshop") or die("Error connecting to Database" . mysql_error());


        $select = $_REQUEST['value'];
        $qty = $_REQUEST['quantity'];
        $sp = $_REQUEST['sp'];

       
        $countProduct = mysql_query("select count(serial_no) from cartTable");
//        echo $countProduct;
        $count = mysql_fetch_array($countProduct);
        
        
        if($count[0] == 8)
        {
            echo '2';
        }
        else
        {
            
        
        $insert = "Insert INTO cartTable values(null , $select,$qty,$sp)";
            $insertResult = mysql_query($insert);
            
           
            
            if($insertResult)
            {
                echo '0';
            }
            else
            {
                echo '1';
            }
}
        ?>
