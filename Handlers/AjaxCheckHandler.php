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
        include './HandlerDatabase.php';

        $type = $_REQUEST['type'];

        if ($type == 1) {
            $email = $_REQUEST['value'];
            $result = registrationCheckEmail($email);

            $count = mysql_num_rows($result);

            if ($count > 0) {
                echo "existing";
            } else {
                echo "Valid email";
            }
        }
        elseif ($type == 2) {
            $contact = $_REQUEST['value'];
            $result = registrationCheckContact($contact);

            $count = mysql_num_rows($result);

            if ($count > 0) {
                echo "existing";
            } else {
                echo "Valid Number";
            }
    }
        ?>
    </body>
</html>
