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
        // put your code here
        
        $con = mysql_connect("localhost", "root", "") or die("Error connecting to server" . mysql_error());
$db_select = mysql_select_db("lta") or die("Error connecting to Database" . mysql_error());

        $sql="SELECT * FROM tybca58_train_info";
        $result=  mysql_query($sql);
        $x=0;
        while ($row = mysql_fetch_array($result)) {
            
            $arr[$x]=$row['train_id'];
            $x++;
        }
        echo $arr[1];
        
        echo $arr[0];
        echo $arr[2];
        
        
        ?>
    </body>
</html>
