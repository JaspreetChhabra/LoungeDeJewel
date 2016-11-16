<?php
include 'DbCredintials.php';
$con = mysql_connect($servername,$dbuname,$dbpass) or die("Error connecting to server" . mysql_error());
        $db_select = mysql_select_db("jwelleryshop") or die("Error connecting to Database" . mysql_error());
        session_start();

?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | Lounge De Jewel</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
   <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="LOGO.gif">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    <link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
    <link rel="stylesheet" href="css/style.css"> <!-- Resource style -->

    <script>
        function changePassform(value) {

  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {

            var status = xmlhttp.responseText;


                    document.getElementById('changepass').innerHTML=xmlhttp.responseText;
//                    var val = document.getElementById('mail').value;
//                    if((val === "existing") || (val === "email empty!"))
//                        {
//                            document.getElementById('email').focus();
//                        }


    }

  }
  xmlhttp.open("GET","Handlers/forgotPassHandler.php?value="+value,true);
  xmlhttp.send();
}






            $(document).ready(function () {
                alert("Hello world");

                $('.sub-menu li a').click(function () {
//                    alert($(this).text());
                        var val=$(this).text();
                        alert(val);
//                        $.post("shop.php" , {key:'value',value:'val'});
//                          $.get("shop.php?value"+val);

//                        window.location("shop.php?value"+val);

                    localStorage.setItem('value',val);
    });




            });






        </script>


</head><!--/head-->

<body>
<div class="radio">
    <label><input type="radio" name="mail" onclick="changePassform(this.value)">Change Password via email</label>
</div>
<div class="radio">
  <label><input type="radio" name="secques" onclick="changePassform(this.value)">Change Password via security question</label>
</div>
    <div id="changepass">

    </div>
<?php
include 'footer.php';
        ?>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/masonry.pkgd.min.js"></script>
    <script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/modernizr.js"></script>
    <script src="js/main.js"></script>
    <script src="js/main1.js"></script>
    <script src="js/masonry.pkgd.min.js"></script>
        <script src="js/jquery.easing.min.js"></script>
<!--   <script src="js/scrolling-nav.js"></script>-->
</body>
</html>