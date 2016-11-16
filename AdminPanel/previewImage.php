<?php
include_once './DbCredintials.php';
$imagepath = $_REQUEST['getimage'];
echo $imagepath;

if (isset($_FILES['getimage'])) {
                
                // move_uploaded_file($_FILES['file']['tmp_name'], "imgs/".$_FILES['file']['name']);
                if ($_FILES['getimage']['tmp_name']) {
                    $image1data = "data:" . $_FILES['getimage']['type'] . ";base64," . base64_encode(file_get_contents($_FILES['getimage']['tmp_name']));
                    echo '2';
                    //echo $data
                   echo "<img src='" . $image1data . "' />";
                }
                
            } else {
                $image1data = "";
                echo "You haven't selected any file";
            }
?>


