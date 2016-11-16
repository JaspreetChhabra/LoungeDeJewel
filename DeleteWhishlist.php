
        <?php
        session_start();
        
        $con = mysql_connect("localhost", "root", "") or die("Error connecting to server" . mysql_error());
        $db_select = mysql_select_db("jwelleryshop") or die("Error connecting to Database" . mysql_error());


         $uid=$_GET['uid'];
         $pid=$_GET['pid'];
        
        $query=  mysql_query("SELECT product_ids FROM ldj_wishlist WHERE user_id='$uid'");
        if(mysql_num_rows($query) > 0)
        {
            while ($row = mysql_fetch_array($query)) {
                $data=$row['product_ids'];
            }
           // echo 'Product XML: '.$data."<br/>";
            $xml=new SimpleXMLElement($data);
            $x=0;
            $doc = new DOMDocument( );
        $ele = $doc->createElement('product');
        $doc->appendChild($ele);
        
            foreach($xml->children() as $value)
            {
                //echo "Product id".$xml->p_id[$x];
                
                if($xml->p_id[$x] != $pid)
                {
                    
        $ele1 = $doc->createElement('p_id');
        $ele1->nodeValue = $xml->p_id[$x];
        $ele->appendChild($ele1);
            $x++;
                }
                else
                {
                    $x++;
                }
           
            }
            $doc->save('my.xml');
        $data2=file_get_contents("my.xml");
        //echo $data2;
        $sql= mysql_query("UPDATE ldj_wishlist SET product_ids='$data2' WHERE user_id='$uid'");
        if($sql == 1)
        {
//            echo 'Query successfully executed!';
        echo '1';
        }
        else{
            echo '0';
        }
        }
        else
        {
            echo "i";
        }
       
        
        
        ?>
