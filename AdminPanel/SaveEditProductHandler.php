
        <?php
        include_once './DbCredintials.php';
 $image2data = "";
 $image1data = "";
     session_start();

        $pname = $_REQUEST['pname'];
        //$ptype = $_REQUEST['ptype'];
        $mrp = $_REQUEST['mrp'];
        $sp = $_REQUEST['sp'];
        $desc = $_REQUEST['desc'];
        $quantity = $_REQUEST['quantity'];
        $pagetitle = $_REQUEST['pagetitle'];
        $metakeywords = $_REQUEST['metakeywords'];
        $occasion = $_REQUEST['occasion'];
        $material = $_REQUEST['material'];
        $color = $_REQUEST['color'];
        $stonetype = $_REQUEST['stonetype'];
        $weight = $_REQUEST['weight'];
        $lastupdated = $_SESSION['username'];
        $cat=$_REQUEST['cat'];
        $id=$_SESSION['productID'];
        if($cat==$_SESSION['cat_id'])
        {
            echo "yes";
        }
 else {
            echo 'no';
 }
      
 
 
 
 
 
    if(isset($_REQUEST['dispercent']) && isset($_REQUEST['disfrom']) && isset($_REQUEST['disto']))
    {
         $dp=$_REQUEST['dispercent'];
         $from=$_REQUEST['disfrom'];
         $to=$_REQUEST['disto'];
        $query=  mysql_query("SELECT * FROM ldj_discount WHERE product_id='$id'");
        if(mysql_num_rows($query) > 0)
        {
        
        $query=  mysql_query("UPDATE `ldj_discount` SET `product_discount(%)`=$dp,`valid_from`='$from',`valid_to`='$to' WHERE product_id='$id'");
        if($query > 0)
        {
            echo "Thai gayu update";
        }
        
            
        }
        else
        {
            $query=  mysql_query("INSERT INTO ldj_discount (`product_id`, `product_discount(%)`, `valid_from`, `valid_to`) VALUES ('$id', $dp, '$from', '$to')");
        if($query > 0)
        {
            echo "Thai gayu insert";
        }
        
        }
    }
 
 
 
 
 
 
 
 
        $doc = new DOMDocument( );
        $ele = $doc->createElement('productAttributes');
        $doc->appendChild($ele);


        $ele1 = $doc->createElement('occasion');
        $ele1->nodeValue = $occasion;
        $ele->appendChild($ele1);

        $ele2 = $doc->createElement('material');
        $ele2->nodeValue = $material;
        $ele->appendChild($ele2);

        $ele3 = $doc->createElement('color');
        $ele3->nodeValue = $color;
        $ele->appendChild($ele3);

        $ele4 = $doc->createElement('updateBy');
        $ele4->nodeValue = $lastupdated;
        $ele->appendChild($ele4);

        $ele5 = $doc->createElement('stoneType');
        $ele5->nodeValue = $stonetype;
        $ele->appendChild($ele5);

        $ele6 = $doc->createElement('weight');
        $ele6->nodeValue = $weight;
        $ele->appendChild($ele6);



        $doc->save('productAttribute.xml');


        $data = file_get_contents('productAttribute.xml');

        
        
            
            if (isset($_FILES['img1'])) {
                
                // move_uploaded_file($_FILES['file']['tmp_name'], "imgs/".$_FILES['file']['name']);
                if ($_FILES['img1']['tmp_name']) {
                    $image1data = "data:" . $_FILES['img1']['type'] . ";base64," . base64_encode(file_get_contents($_FILES['img1']['tmp_name']));
                  
                }
                else
                {
                    $image1data = "nocontent";
                }
                
                
            } else {
                
                echo "Set file as the default one.";
            }
            
            if (isset($_FILES['img2'])) {
                
                // move_uploaded_file($_FILES['file']['tmp_name'], "imgs/".$_FILES['file']['name']);
                if ($_FILES['img2']['tmp_name']) {
                    $image2data = "data:" . $_FILES['img2']['type'] . ";base64," . base64_encode(file_get_contents($_FILES['img2']['tmp_name']));
                    
                   
                }
                else
                {
                    $image1data = "nocontent";
                }
               
            } else {
                $image2data = "nocontent";
                echo "Set file as the default one.";
            }
       
        
        date_default_timezone_set('Asia/Calcutta');
        $cd = date('Y-m-d H:i:s');
        $id=$_SESSION['productID'];
        
        if($image1data == "nocontent" || $image2data == "nocontent")
        {
           $updateproduct = mysql_query("Update ldj_product SET product_name='$pname',category_id='$cat' , stock_quantity='$quantity' , product_desc='$desc' , page_title='$pagetitle' , product_mrp='$mrp' , product_selling_price='$sp' , product_last_update='$cd' , product_last_update_by='$lastupdated' , product_attribute='$data' where product_id='$id'") or die(mysql_error());
       
         
        }
        else
        {
        $doc = new DOMDocument( );
        $ele = $doc->createElement('images');
        $doc->appendChild($ele);

        $ele1 = $doc->createElement('image');
        $ele1->nodeValue = $image1data;
        $ele->appendChild($ele1);
        
        $ele2 = $doc->createElement('image');
        $ele2->nodeValue = $image2data;
        $ele->appendChild($ele2);
        
        $doc->save('ImagesPath.xml');


        $imagespathdata = file_get_contents('ImagesPath.xml');
        

        $updateproduct = mysql_query("Update ldj_product SET product_name='$pname',category_id='$cat' , stock_quantity='$quantity' , product_desc='$desc' , page_title='$pagetitle' , product_mrp='$mrp' , product_selling_price='$sp' , product_img_path='$imagespathdata' , product_last_update='$cd' , product_last_update_by='$lastupdated' , product_attribute='$data' where product_id='$id'") or die(mysql_error());
        
        }
        
        if($updateproduct == 1)
        {
            header("location:ManageProducts.php");
           // echo 'thai gayu';
        }
        else
        {
            echo mysql_error();
        }
        ?>
        
        ?>
    </body>
</html>
