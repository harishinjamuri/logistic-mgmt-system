<?php

/*


file name           : homestud.php
database connection : no database is required
table               : no table required
purpose             : for navigation bar which has the hyperlinks for student and employee registration forms.


*/



 date_default_timezone_set('Indian/Maldives');?>
<!doctype html>
<html lang=''>
<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="admin/styles.css">
   <link rel="stylesheet" type="text/css" href="admin/css/main.css">
  <link rel="icon" type="image/png" href="admin/favicon.ico">
  
<style>

*{
	font-family:Arial;
}

label{
	font-weight:bold;
}

input
{
		border-radius: 4px;
		<!-- text-transform: uppercase;-->
}

input[type=button],input[type=submit]{	
	text-transform: none;
}
#cssmenu a{
	text-decoration:none;
	font-family:Arial;
}


a,a:hover,a:visited,a:active{
	text-decoration:none;
}

</style>

    </head>
<body>
<img src="admin/logo.png" alt="" title="" height="72" width="260" style="margin-left:50pt;margin-top:20pt" />
<div id="heading">
<h1 style="font-family:Arial;margin-left:500pt;margin-top:-40pt;color:#116EB0;">Logistics Management System</h1>
</div>
<div id="cssmenu" style=" background: #116EB0;height:40px;" >
<ul>
<li><a href="index.php"><span style="font-size:15px;">Home</span></a></li>
   <li class='active has-sub'><a href='#'><span style="font-size:15px;">Register</span></a>
      <ul><!--student registration page-->
         <li class='has-sub'><a href="homestud.php"><span style="font-size:15px;">Student</span></a>   
         </li>
		 
		 <!--faculty registration page-->
         <li class='has-sub'><a href="homefac.php"><span style="font-size:15px;">Employee</span></a>    
            </li>
       
      </ul>
   </li>

   
</ul>
</div>

</body>
</html>