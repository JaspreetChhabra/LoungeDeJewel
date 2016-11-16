<?php
//session_start();
include 'DbCredintials.php';
$connect = mysql_connect($servername,$dbuname,$dbpass) or die("Error connecting to server" . mysql_error());
mysql_select_db("jwelleryshop") or die("No database found");


if(!(isset ( $_SESSION['username'] )))
{


?>
<script>
    $(document).ready(function()
{
    $("#wishlist").hide();
});
$(document).ready(function()
{
    $("#signout").hide();
    $("#orders").hide();
});
document.getElementById('msg').innerHTML = "Hello,Guest!";

</script>
<?php
}
else
{
?>
<script>
    $(document).ready(function()
{
    $("#wishlist").show();
});
  $(document).ready(function()
{
    $("#signout").show();
    $("#signin").hide();
    $("#orders").show();
});
 document.getElementById('msg').innerHTML = "Welcome <?php echo $_SESSION['username']; ?>";
</script>
<?php

}
?>