<?php
if(isset($_FILES['file'])) {
    // move_uploaded_file($_FILES['file']['tmp_name'], "imgs/".$_FILES['file']['name']);
    if($_FILES['file']['tmp_name']) {
        $data = "data:".$_FILES['file']['type'].";base64,".base64_encode(file_get_contents($_FILES['file']['tmp_name']));
        print_r($_FILES['file']);
        file_put_contents("/aks.txt", $data);
        echo "File saved successfully.";
        return;
    }
    echo "<img src='".file_get_contents("/aks.txt")."' />";
}
else
{
    echo "You haven't selected any file";
}

