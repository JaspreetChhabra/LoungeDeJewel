<?php
session_start();
include_once './DbCredintials.php';
include './NavBar.php';
?>
<html lang="en"><head></head><body>











        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Admin Panel</title>

        <!-- Bootstrap Core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="../css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="../css/plugins/timeline.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../css/sb-admin-2.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="../css/plugins/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script src="../js/jquery.js"></script>

                    <!--    <script>

                        $(document).ready(function(){
                    $("input").attr('disabled', true);



                       $('#fnbtn').click(function(){
                         $("#fname").removeAttr('disabled',false);
                         $("#fname").focus();
                       });
                       
                       
                       $('#lnbtn').click(function(){
                         $("#lname").removeAttr('disabled',false);
                         $("#lname").focus();
                       });
                       
                       $('#mailbtn').click(function(){
                         $("#mail").removeAttr('disabled',false);
                         $("#mail").focus();
                       });
                       
                       
                    });
                        
                        </script>-->






        <div id="wrapper">

            <!-- Navigation -->

            <div id="page-wrapper" style="min-height: 360px;">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User Profile</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                General Profile Information
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-10 col-sm-offset-1">

                                        <form class="form-horizontal" role="form" method="post" action="UpdateAdminPrivelegesHandler.php">
                                            <?php
                                            $sid = $_POST['sid'];
                                            $_SESSION['userid'] = $sid;


                                            $adminpriveleges = mysql_query("Select * from ldj_privileges WHERE user_id=1");


                                            while ($row1 = mysql_fetch_array($adminpriveleges)) {

                                                $superpri = $row1['admin_privileges'];
                                                file_put_contents("privileges.xml", $superpri);
                                                $data = simplexml_load_file("privileges.xml");
//                                                    
                                            }

                                            $query = mysql_query("Select * from  ldj_user WHERE user_id='$sid'");
                                            while ($userinfo = mysql_fetch_array($query)) {
                                                $_SESSION['userfname'] = $userinfo['user_fname'];
                                                $_SESSION['userlname'] = $userinfo['user_lname'];
                                            }

                                            $query = mysql_query("Select * from  ldj_privileges WHERE user_id='$sid'");
                                            while ($row = mysql_fetch_array($query)) {
//                                                    if($sid == $row1['user_id']){ 
                                                ?><div class="form-group">
                                                    <label class="col-sm-2 col-xs-2 control-label">First Name</label>
                                                    <label class="col-sm-2 col-xs-2 control-label"><?php echo $_SESSION['userfname']; ?></label>


                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 col-xs-2 control-label">Last Name</label>
                                                    <label class="col-sm-2 col-xs-2 control-label"><?php echo $_SESSION['userlname']; ?></label>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 col-xs-2 control-label">Privileges</label>
                                                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-6 ">
                                                        <?php
                                                        $xyz = $row['admin_privileges'];
                                                        file_put_contents("testing.xml", $xyz);
                                                        $contents = simplexml_load_file("testing.xml");
                                                    }

                                                    $count = count($contents->privilegeno);

                                                    $checked = "";
                                                    foreach ($data->children() as $parent) {

                                                        $value = $parent->getName();

                                                        for ($index = 0; $index < $count; $index++) {
                                                            if ($contents->privilegeno[$index] == $parent->getName()) {
                                                                $checked = 0;
                                                                break;
                                                            } else {
                                                                $checked = 1;
                                                            }
                                                        }
                                                         if ($checked == 0) {
                                                            echo "<b><input type=checkbox name=privileges[] value='$value' checked> " . $parent . "<br></b>";
                                                        } else if ($checked == 1) {
                                                            echo "<b><input type=checkbox name=privileges[] value='$value'> " . $parent . "<br></b>";
                                                        }
                                                    }
                                                    ?>
                                                </div>

                                            </div>
                                            <div class="form-group">

                                                <div class="col-sm-offset-3 col-sm-6 col-xs-offset-2">
                                                    <button type="submit" class="btn btn-default">Update</button>


                                                </div>
                                                <div class="col-sm-offset-2 col-sm-6">

                                                </div>

                                            </div>
                                        </form>
                                    </div>

                                </div>
                                <!-- /.row (nested) -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->

        <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../js/plugins/metisMenu/metisMenu.min.js"></script>

        <!--     Morris Charts JavaScript 
            <script src="../js/plugins/morris/raphael.min.js"></script>
            <script src="../js/plugins/morris/morris.min.js"></script>
            <script src="../js/plugins/morris/morris-data.js"></script>-->

        <!-- Custom Theme JavaScript -->
        <script src="../js/sb-admin-2.js"></script>





    </body></html>