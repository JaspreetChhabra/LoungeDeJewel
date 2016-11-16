<?php 

    session_start();

    include_once './DbCredintials.php';
    echo $_SESSION['userid'] ;
    
    
    $priveleges = $_REQUEST['privileges'];
   
    
    
    
            
    
    
    $doc = new DOMDocument( );
    $ele = $doc->createElement( 'name' );
    $doc->appendChild( $ele );
    
    foreach ($priveleges as $value) {
    $ele1 = $doc->createElement( 'privilegeno' );
    $ele1->nodeValue = $value;
    $ele->appendChild( $ele1 );
    
    
}


$doc->save('testing.xml');
    

$data=file_get_contents('testing.xml');
echo $data;
$updatexml="UPDATE ldj_privileges SET admin_privileges = '$data' WHERE user_id=$_SESSION[userid]";
if(! mysql_query($updatexml))
{
    echo mysql_error();
}
        else
        {
            
            header("location:ManageSubAdmin.php");

        }
  






?>