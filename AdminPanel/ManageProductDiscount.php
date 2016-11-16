<?php
include_once './DbCredintials.php';
include './NavBar.php';
?>

<html lang="en"><head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Manage Product Discount</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../css/plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    
    
    <div id="wrapper">

        <!-- Navigation -->
        
        <div style="min-height: 329px;" id="page-wrapper">
            <br/>
            <font size="6">Manage Product Discount</font>
    
   <hr/>
    
            <div class="row">
                <div class="col-lg-12">
                    <br/><br/>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Product Discount Information
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Sr No</th>
                                            <th>Product Image</th>
                                            <th>Product Name</th>
                                            <th>Selling Price</th>
                                            <th>Discount %</th>
                                            <th>Discount From</th>
                                            <th>Discount UpTo</th>
                                            <th>Operation</th>
                                            
                                        </tr>
                                    
                                    </thead>
<!--                                        <tr>-->
<!--                                            <td>
                                                
                                            </td>-->
                                   
                                    
                                        <?php

                                                                    $sql=  mysql_query("SELECT * FROM ldj_discount");
            
                                        if(mysql_num_rows($sql) > 0)
        {
            while ($discountarr = mysql_fetch_array($sql)) {
                $id=$discountarr['product_id'];
                $dp=$discountarr['product_discount(%)'];
         $from=$discountarr['valid_from'];
         $to=$discountarr['valid_to'];
                                       
          $query = mysql_query("Select * from ldj_product WHERE product_id='$id'");
                                        while ($row = mysql_fetch_array($query)) {
           
        
                                            
                                            echo "<tr><form id=form name=form action=UpdateProducts.php method=POST>";
                
                                            $data = $row['product_img_path'];
                                            $xml = new SimpleXMLElement($data);
                                                
//                                                $x=0;
//                                                foreach ($xml->children() as $parent) {
//                                                
//                                                    echo $xml->p_name[$x]."<br/>";
//                                                    $x++;
//                                                }
//                                                
                                                

                                            $x=1;
                                            echo '<td>' . $row['product_id'] . '</td>';
                                            
                                            echo '<td>';?>
                                                <img height=100 width=100 src='<?php echo $xml->image[0]; ?>' />
                                            <?php
                                                       echo '</td>';
                                            echo '<td>' . $row['product_name'] . '</td>';
                                            echo '<td>' . $row['product_selling_price'] . '</td>';
                                         
                                            echo '<td>' . $discountarr['product_discount(%)'] . '</td>';
                                            echo '<td>' . $discountarr['valid_from'] . '</td>';
                                            echo '<td>' . $discountarr['valid_to'] . '</td>';
            
                                            echo '<td><input type="submit" style="width:85px" class="btn btn-primary"  btn-block=""   value="Edit" />
                                                 <br/><br/>
                                                 <input type="button" id=delbtn style="width:85px" onclick="deleteProduct(form.delid.value)" class="btn btn-primary"  btn-block="" data-toggle="modal" data-target="#myModal"   value="Delete" >
                                                 </td>';
//                                            
                                        ?>
                                                
                                                
                                                <input type="hidden" name='delid' value=<?php echo $row['product_id']; ?> />
                                                
                                                <!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Remove Product Discount </h4>
      </div>
      <div class="modal-body">
        Are you sure you want to remove discount from the following product ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel Operation</button>
        <button type="button" class="btn btn-primary" onclick="delpro()" id='modaldel'  >Remove Product Discount</button>
      </div>
    </div>
  </div>
</div>
<!--                                                <modal popup>-->
                                        <input type="hidden" name="product_getid" id="pid" value=<?php echo $row['product_id']; ?> />
                                        <?php
                                            echo "</form>";   
                                        echo "</tr>";
                                            $x++;
          }
            
        }
                                            }
                                        ?>
                                    
<!--                                        </tr>-->
                                        
                                   <input type="hidden" id='delid2' value=<?php echo $row['product_id']; ?> />
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
                
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    
    
    
    
    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="../js/plugins/dataTables/dataTables.bootstrap.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable();
    });
   
    function delpro()
    {
        var val=document.getElementById('delid2').value;
        alert("Madyu mane: "+val);
         if (window.XMLHttpRequest)
                                {
                                    xmlhttp=new XMLHttpRequest();
                                } 
                          else 
                                {  
                                    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                                 }
                          xmlhttp.onreadystatechange=function() {
                          if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                            var status=xmlhttp.responseText;
                               alert("Answer: "+status);
                              // location.reload();
                               if(status == 1)
                               {
                                   $(document).ready(function() {
                                   $('#myModal').modal('hide');
                                               location.reload();

                                    });
                                   
                                   
                                   
                               }
                               else
                               {
                                   $(document).ready(function() {
                                   $('#myModal').modal('hide');
                                   
                                               location.reload();

                                    });
                                   
                                   
                               }
//                            if(status == "Success")
//                            {   document.getElementById("loadlog").innerHTML="Login";
//                            }
//                            else
//                            {   
//                                
//                                document.getElementById("loadlog").innerHTML="Register";
//                            }
                          }
                        }
                        xmlhttp.open("GET","RemoveDiscount.php?pid="+val,true);
                        xmlhttp.send();
    }
    function deleteProduct(val)
    {  
        alert("Value: "+val);
        document.getElementById('delid2').value=val;
        
    }
//        delpro();
//        
//        $('#myModal').modal('show');
//        $('#modaldel').click({
//            delpro(val);
//        });
////         if (window.XMLHttpRequest)
////                                {
////                                    xmlhttp=new XMLHttpRequest();
////                                } 
////                          else 
////                                {  
////                                    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
////                                 }
////                          xmlhttp.onreadystatechange=function() {
////                          if (xmlhttp.readyState==4 && xmlhttp.status==200) {
////                            var status=xmlhttp.responseText;
////                               alert("Anser: "+status);
////                              // location.reload();
////                               if(status == 1)
////                               {
////                                   $(document).ready(function() {
////                                  // $('#myModal').modal('hide');
////                                              // location.reload();
////
////                                    });
////                                   
////                                   
////                                   
////                               }
////                               else
////                               {
////                                   $(document).ready(function() {
////                                   $('#myModal').modal('hide');
////                                   
////                                               location.reload();
////
////                                    });
////                                   
////                                   
////                               }
//////                            if(status == "Success")
//////                            {   document.getElementById("loadlog").innerHTML="Login";
//////                            }
//////                            else
//////                            {   
//////                                
//////                                document.getElementById("loadlog").innerHTML="Register";
//////                            }
////                          }
////                        }
////                        xmlhttp.open("GET","DeleteProduct.php?pid="+val,true);
////                        xmlhttp.send();
//    }
    
    </script>
        



</body></html>