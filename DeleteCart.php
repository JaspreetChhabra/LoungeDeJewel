
        <?php
        session_start();

        $con = mysql_connect("localhost", "root", "") or die("Error connecting to server" . mysql_error());
        $db_select = mysql_select_db("jwelleryshop") or die("Error connecting to Database" . mysql_error());


        $select = $_REQUEST['value'];
        

       
        
        $delete = "Delete from cartTable where product_id='$select'";
            $deleteResult = mysql_query($delete);
            
           
            
            if($deleteResult)
            {
                echo '0';
            }
            else
            {
                echo '1';
            }

        ?>
