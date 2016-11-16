<?php

include_once './DbCredintials.php';
$image2data = "";
$image1data = "";

$desc1= $_REQUEST['desc1'];
$desc2= $_REQUEST['desc2'];
$desc3= $_REQUEST['desc3'];
$desc4= $_REQUEST['desc4'];
$desc5= $_REQUEST['desc5'];

$flag1 =0;
$flag2 ="";
$flag3 ="";
$flag4 ="";
$flag5 ="";

//echo 'DESC 1 :' .$desc1.'<br>';
//echo 'DESC 2 :' .$desc2.'<br>';
//echo 'DESC 3 :' .$desc3.'<br>';
//echo 'DESC 4 :' .$desc4.'<br>';
//echo 'DESC 5 :' .$desc5.'<br>';
//IMAGE1
if (isset($_FILES['img1'])) {


    if ($_FILES['img1']['tmp_name']) {
        $image1data = "data:" . $_FILES['img1']['type'] . ";base64," . base64_encode(file_get_contents($_FILES['img1']['tmp_name']));
    } else {
        $image1data = "nocontent";
    }
} else {
    $image1data = "nocontent";
    echo "Set file as the default one.";
}

//IMAGE2
if (isset($_FILES['img2'])) {


    if ($_FILES['img2']['tmp_name']) {
        $image2data = "data:" . $_FILES['img2']['type'] . ";base64," . base64_encode(file_get_contents($_FILES['img2']['tmp_name']));
    } else {
        $image2data = "nocontent";
    }
} else {
    $image2data = "nocontent";
    echo "Set file as the default one.";
}

//IMAGE3
if (isset($_FILES['img3'])) {


    if ($_FILES['img3']['tmp_name']) {
        $image3data = "data:" . $_FILES['img3']['type'] . ";base64," . base64_encode(file_get_contents($_FILES['img3']['tmp_name']));
    } else {
        $image3data = "nocontent";
    }
} else {
    $image3data = "nocontent";
    echo "Set file as the default one.";
}
//IMAGE4
if (isset($_FILES['img4'])) {


    if ($_FILES['img4']['tmp_name']) {
        $image4data = "data:" . $_FILES['img4']['type'] . ";base64," . base64_encode(file_get_contents($_FILES['img4']['tmp_name']));
    } else {
        $image4data = "nocontent";
    }
} else {
    $image4data = "nocontent";
    echo "Set file as the default one.";
}
//IMAGE5
if (isset($_FILES['img5'])) {


    if ($_FILES['img5']['tmp_name']) {
        $image5data = "data:" . $_FILES['img5']['type'] . ";base64," . base64_encode(file_get_contents($_FILES['img5']['tmp_name']));
    } else {
        $image5data = "nocontent";
    }
} else {
    $image5data = "nocontent";
    echo "Set file as the default one.";
}

//Update Image1
if ($image1data != "nocontent" && $desc1 != null) {
    $updateimg1 = "UPDATE ldj_slider SET Image_path = '$image1data' , Description='$desc1' WHERE Slider_image_id=1";
    $flag1 =1;
    echo 'thai gayu!!!!';
} else if($image1data != "nocontent" && $desc1 == null){
    $updateimg1 = "UPDATE ldj_slider SET Image_path = '$image1data' WHERE Slider_image_id=1";
    $flag1 =1;
    echo 'Iamge thai gayu!!!!';
   }
else if($image1data == "nocontent" && $desc1 != null)
{
    $updateimg1 = "UPDATE ldj_slider SET Description='$desc1' WHERE Slider_image_id=1";
    $flag1 =1;
    echo 'Desc thai gayu!!!!';
}
else
{
 $flag1=0;
  echo 'ERROR';   
}
echo 'flag :'.$flag1;
if($flag1 == 1)
{
    $update1 = mysql_query($updateimg1);
    echo 'Slider 1 '.$update1;
}
else
{
    echo 'NO change';
}


//Update Image2
if ($image2data != "nocontent" && $desc2 != null) {
    $updateimg2 = "UPDATE ldj_slider SET Image_path = '$image2data' , Description='$desc2' WHERE Slider_image_id=1";
    
//    echo 'thai gayu!!!!';
} else if($image2data != "nocontent" && $desc2 == null){
    $updateimg2 = "UPDATE ldj_slider SET Image_path = '$image2data' WHERE Slider_image_id=2";

//    echo 'Iamge thai gayu!!!!';
   }
else if($image2data == "nocontent" && $desc2 != null)
{
    $updateimg2 = "UPDATE ldj_slider SET Description='$desc2' WHERE Slider_image_id=2";
//    echo 'Desc thai gayu!!!!';
}
else
{
  echo 'ERROR';   
}
$update2 = mysql_query($updateimg2);
echo 'Slider 2 '.$update2;

//Update Image3
if ($image3data != "nocontent" && $desc3 != null) {
    $updateimg3 = "UPDATE ldj_slider SET Image_path = '$image3data' , Description='$desc3' WHERE Slider_image_id=3";
    
//    echo 'thai gayu!!!!';
} else if($image3data != "nocontent" && $desc3 == null){
    $updateimg3 = "UPDATE ldj_slider SET Image_path = '$image3data' WHERE Slider_image_id=3";

//    echo 'Iamge thai gayu!!!!';
   }
else if($image3data == "nocontent" && $desc3 != null)
{
    $updateimg3 = "UPDATE ldj_slider SET Description='$desc3' WHERE Slider_image_id=3";
//    echo 'Desc thai gayu!!!!';
}
else
{
  echo 'ERROR';   
}
$update3 = mysql_query($updateimg3);
echo 'Slider 3 '.$update3;

//Update Image4
if ($image4data != "nocontent" && $desc4 != null) {
    $updateimg4 = "UPDATE ldj_slider SET Image_path = '$image4data' , Description='$desc4' WHERE Slider_image_id=4";
    
//    echo 'thai gayu!!!!';
} else if($image4data != "nocontent" && $desc4 == null){
    $updateimg4 = "UPDATE ldj_slider SET Image_path = '$image4data' WHERE Slider_image_id=4";

//    echo 'Iamge thai gayu!!!!';
   }
else if($image4data == "nocontent" && $desc4 != null)
{
    $updateimg4 = "UPDATE ldj_slider SET Description='$desc4' WHERE Slider_image_id=4";
//    echo 'Desc thai gayu!!!!';
}
else
{
  echo 'ERROR';   
}
$update4 = mysql_query($updateimg4);
echo 'Slider 4 '.$update4;

//Update Image5
if ($image5data != "nocontent" && $desc5 != null) {
    $updateimg5 = "UPDATE ldj_slider SET Image_path = '$image5data' , Description='$desc5' WHERE Slider_image_id=5";
    
//    echo 'thai gayu!!!!';
} else if($image5data != "nocontent" && $desc5 == null){
    $updateimg5 = "UPDATE ldj_slider SET Image_path = '$image5data' WHERE Slider_image_id=5";

//    echo 'Iamge thai gayu!!!!';
   }
else if($image5data == "nocontent" && $desc5 != null)
{
    $updateimg5 = "UPDATE ldj_slider SET Description='$desc5' WHERE Slider_image_id=5";
//    echo 'Desc thai gayu!!!!';
}
else
{
  echo 'ERROR';   
}
$update5 = mysql_query($updateimg5);
echo 'Slider 5 '.$update5;

header('location:ManageSlider.php');
?>
