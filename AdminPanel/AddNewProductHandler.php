<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        session_start();
        include_once './DbCredintials.php';

        $pname = $_REQUEST['pname'];
        $cat = $_REQUEST['cat'];
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
                
            } else {
                $image1data = "";
                echo "You haven't selected any file";
            }
            
            if (isset($_FILES['img2'])) {
                
                // move_uploaded_file($_FILES['file']['tmp_name'], "imgs/".$_FILES['file']['name']);
                if ($_FILES['img2']['tmp_name']) {
                    $image2data = "data:" . $_FILES['img2']['type'] . ";base64," . base64_encode(file_get_contents($_FILES['img2']['tmp_name']));
                    
                  
                }
                
            } else {
                $image2data = "null";
                echo "You haven't selected any file";
            }
       
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
        

        date_default_timezone_set('Asia/Calcutta');
        $cd = date('Y-m-d H:i:s');
        $insertproduct = mysql_query("INSERT INTO ldj_product values (null ,'$pname','$cat' , $quantity , '$desc' , '$pagetitle' , $mrp , $sp , '$imagespathdata' ,'$cd' ,'$lastupdated' , '$data'  )") or die(mysql_error());
        
        
        if($insertproduct == 1)
        {
            header("location:AddNewProduct.php");
            
        }
        else
        {
            echo mysql_error();
        }
        ?>
    </body>
</html>
