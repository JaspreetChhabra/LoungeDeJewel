<?php

session_start();
include './DbCredintials.php';
include './NavBar.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>

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



</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
         
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Manage SubAdmin</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Sub Admin List
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-10">
                                    
                                        <?php 
                                        $subadmin = mysql_query("Select * from ldj_user where user_type='subadmin'");
                                        
                                        if(mysql_num_rows($subadmin) > 0)
                                        {
                                            while ($row = mysql_fetch_array($subadmin)) {
                                                ?> 
                                        
                                        
                                     <form method="post" action="SelectSubAdminHandler.php">
                                        <div class="form-group">
                                            
                                            <label class="col-sm-4 col-lg-2 col-md-4 col-xs-3 control-label" ><?php echo $row['user_fname']; ?> </label>
                                            
                                            <div class="col-sm-4 col-lg-4 col-md-4 col-xs-4 ">
                                               
                                                <input type="hidden" name="sid" id="sid" value='<?php echo $row['user_id'];?> ' />
                                                <button type="submit" id="lnbtn" class="btn btn-default">Edit</button>
                                                
                                            </div>
                                       
                                        </div>
                                        </form>
                                    <br><br>
                                        <?php
                                        
                                           
                                            
                                        
                                            }
                                        }
                                        
                                        ?>
                                        
<!--                                        <div class="form-group">
                                            <label class="col-sm-2 col-xs-2 control-label">Last Name</label>
                                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-6 ">
                                                <input type="text" class="form-control" name="lname" id="lname"  placeholder="Smith">
                                            </div>
                                            <div class="col-sm-3 col-xs-1 ">
                                                <button type="submit" id="lnbtn" class="btn btn-default">Edit</button>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-sm-2 col-xs-2 control-label">Email - ID</label>
                                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-6 ">
                                                <input type="email" class="form-control" name="mail" id="mail" placeholder="abc@xyzmail.com"  >
                                            </div>
                                            <div class="col-sm-3 col-xs-1 ">
                                                <button type="submit" id="mailbtn" class="btn btn-default">Edit</button>
                                            </div>
                                        </div>
                                       
                                        <div class="form-group">
                                            <label  class="col-sm-2 col-xs-2 control-label">Password</label>
                                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-6 ">
                                                <input type="password" class="form-control" name="password" id="password"  >
                                            </div>
                                            <div class="col-sm-3 col-xs-1 ">
                                                <button type="submit" id="passbtn" class="btn btn-default">Edit</button>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label  class="col-sm-2 col-xs-2 control-label">Retype-Password</label>
                                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-6 ">
                                                <input type="password" class="form-control" name="pass2" id="password2" >
                                            </div>
                                            <div class="col-sm-3 col-xs-1 ">
                                                <button type="submit" id="passbtn" class="btn btn-default">Edit</button>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-sm-2 col-xs-2 control-label">Mobile Number</label>
                                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-6 ">
                                                <input type="tel" class="form-control" name="mobileno" id="mobileno" placeholder="123456789">
                                            </div>
                                            <div class="col-sm-3 col-xs-1 ">
                                                <button type="submit" id="mobilebtn" class="btn btn-default">Edit</button>
                                            </div>
                                        </div>
                                       <div class="form-group">
                                            <label class="col-sm-2 col-xs-2 control-label">Landline Number</label>
                                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-6 ">
                                                <input type="tel" class="form-control" name="landlineno" id="landlineno" placeholder="2634081">
                                            </div>
                                            <div class="col-sm-3 col-xs-1 ">
                                                <button type="submit" id="landlinebtn" class="btn btn-default">Edit</button>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 col-xs-2 control-label">Security Question</label>
                                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-6 ">
                                                <select class="form-control" name="securityques" id="securityques">
                                            

                                            </select>
                                            
                                            </div>
                                            <div class="col-sm-3 col-xs-1 ">
                                                <button type="submit" id="quesbtn" class="btn btn-default">Edit</button>
                                            </div>
                                        </div>
                                        
                                       <div class="form-group">
                                            <label class="col-sm-2 col-xs-2 control-label">Security Answer</label>
                                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-6 ">
                                                <input type="text" class="form-control" name="securityans" id="securityans"  placeholder="myanswer">
                                            </div>
                                            <div class="col-sm-3 col-xs-1 ">
                                                <button type="submit" id="quesbtn" class="btn btn-default">Edit</button>
                                            </div>
                                        </div>
                                       
                                        <div class="form-group">
                                            <label class="col-sm-3 col-lg-2 col-xs-2 control-label">Assign Privileges</label>
                                            <div class="col-sm-offset-0 col-sm-6 col-xs-offset-3">
                                                
                                                
                                            </div>

                                        </div>
                                        
                                        
                                        
                                        
                                        <div class="form-group">
                                            
                                            <div class="col-sm-offset-3 col-sm-6 col-xs-offset-2">
                                                <button type="submit" class="btn btn-default">Create Sub-Admin</button>
                                                <button type="submit" class="btn btn-default">Clear</button>
                                                
                                            </div>
                                            <div class="col-sm-offset-2 col-sm-6">
                                                
                                            </div>
                                            
                                        </div>-->
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
<!--             /.row -->
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


</body>

</html>
