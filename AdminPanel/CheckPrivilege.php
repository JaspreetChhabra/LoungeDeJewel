<?php
session_start();
$dbhost="localhost";
$dbuser="root";
$dbpass="";
$con = mysql_connect($dbhost, $dbuser, $dbpass) or die("Couldn't connect to Database Server".  mysql_error());
$db_select = mysql_select_db("jwelleryshop") or die("Error connecting to Database" . mysql_error());

$uid=$_SESSION['user_id'];

$query = mysql_query("Select * from  ldj_privileges WHERE user_id='$uid'");
while ($row = mysql_fetch_array($query))
{
$data = $row['admin_privileges']; 
$xml=new SimpleXMLElement($data);
$count = count($xml->privilegeno);

for ($index = 0; $index < $count; $index++) {
   echo $xml->privilegeno[$index];
   
   if($xml->privilegeno[$index] == "p1");
   {
       ?>
<script>
    alert("Checking Privileges..");
    checkAddProduct();
</script>
       <?php
   }
   
}

}
                                        