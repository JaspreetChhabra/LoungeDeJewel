<?php

session_start();

include 'DbCredintials.php';
$connect = mysql_connect($servername, $dbuname, $dbpass) or die("Error connecting to server" . mysql_error());

mysql_select_db("jwelleryshop") or die("No database found");



$pass = $_POST['passwd'];
$_SESSION['email'] = $_POST['mail'];
$mail = $_SESSION['email'];

$query = mysql_query("Select * from ldj_user ");
while ($row = mysql_fetch_array($query)) {

    if ($row['user_password'] == md5($pass)) {
        echo "Hello" . $row['user_fname'];
        $_SESSION['username'] = $row['user_fname'];
         $_SESSION['uid'] = $row['user_id'];
        $uid= $_SESSION['uid'];
        if ($row['user_type'] == 'user') {

            $query = mysql_query("SELECT * FROM ldj_wishlist");
            $count = mysql_num_rows($query);
            if ($count > 0) {
                while ($row1 = mysql_fetch_array($query)) {
                    echo "User id: " . $row1['user_id'];
                    $wuid = $row1['user_id'];
                    if ($uid == $wuid) {
                        echo 'Found a matching ID';
                        header("Location:home.php");
                    } else {
                        echo 'No such id present';
                        header("Location:CreateWhishlistHandler.php?id='$uid'");
                    }
                }
            } else {
                echo header("Location:CreateWhishlistHandler.php?id='$uid'");;
            } 
        }
            else {
                header("Location:dashboard.php");
            }
        }
    }



