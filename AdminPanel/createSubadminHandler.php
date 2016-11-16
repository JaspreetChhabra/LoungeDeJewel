<?php

include_once './DbCredintials.php';

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$mail = $_POST['mail'];
$pass = md5($_POST['password']);
$mobileno = $_POST['mobileno'];
$landlineno = $_POST['landlineno'];
$securityQues = $_POST['securityques'];
$securityans = $_POST['securityans'];
$privileges = $_POST['privileges'];

//foreach ($privileges as $value) {
//    
//    echo $value . "<br>";
//}

$doc = new DOMDocument( );
    $ele = $doc->createElement( 'name' );
    $doc->appendChild( $ele );
    
    foreach ($privileges as $value) {
    $ele1 = $doc->createElement( 'privilegeno' );
    $ele1->nodeValue = $value;
    $ele->appendChild( $ele1 );
}
    
    
    
    $doc->save('adminprivilege.xml');

$sql="INSERT INTO ldj_user(`user_id`, `user_type`, `user_fname`, `user_lname`, `user_password`, `user_email_id`, `user_mobileno`, `user_landline`, `security_ques_id`, `security_answer`)"
        . " VALUES (NULL, 'subadmin', '$fname', '$lname', '$pass', '$mail', '$mobileno', '$landlineno', $securityQues, '$securityans')";

$a=0;
  if(! mysql_query($sql))
{
    echo mysql_error();
       
}
        else
        {
            ?>
<script>alert('You values have been added!!');</script>
            <?php
//            //echo mysql_error();
//           // header("Location:userprofilehandler.php");
                $a=$a+1;
        }


$query=  mysql_query("SELECT * FROM ldj_user WHERE user_email_id='$mail'");
if(mysql_num_rows($query) > 0)
{
    while ($row = mysql_fetch_array($query)) {
        $id=$row['user_id'];
    }
}


$data=file_get_contents('adminprivilege.xml');
echo $data;
$insertxml="INSERT INTO ldj_privileges (`user_id`, `admin_privileges`) VALUES ('$id'    ,'$data')";




 
   
if(! mysql_query($insertxml))
       {
    echo mysql_error();
       }
       else
       {
           $a=$a+1;
          ?>
<script>alert('You privilages have been added!!');</script>
            <?php 
            if ($a == 2) {
        header("Location:AddSubAdmin.php");
    } else {
        ?>
        <script>alert('You values have been added!!');</script>
        <?php

    }
}