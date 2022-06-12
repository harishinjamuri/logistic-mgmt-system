<?php 
/*

file name           : homestud.php
database connection : buspassdatabase
table               : student_dup and dashboard
purpose             : when student click on submit the data is inserted into student_dup table only if the student is        
                      not registetred already . if registration is successful the value of studreg is incremented by 1 in dashboard table.

*/
?>
<!Doctype html>
<html lang='en'>
<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="admin/styles.css">
   <script src="jquery-latest.min.js" type="text/javascript"></script>
   <!--<script src="script.js"></script>-->
    <title>AGI- Logistic Mgmt | Login</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">


  <link href="admin/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="admin/favicon.ico">
	<link rel="stylesheet" type="text/css" href="admin/css/util.css">
	<link rel="stylesheet" type="text/css" href="admin/css/main.css">
 
 
 <style>
    .input100{border:1px solid lightgrey;}
 </style>
   
</head>
<body>

<?php
date_default_timezone_set('Indian/Maldives');

 include('mainnav.php');?>
<div class="limiter">
		<div class="container-login100" >
			<div class="wrap-login100 p-l-40 p-r-40 p-t-20 p-b-20" style="border:1px solid lightgrey;">
				<form class="login100-form validate-form" method="POST" action="#">
					<span class="login100-form-title p-b-20">
						 Login
					</span>

					<div class="wrap-input100 validate-input" >
						<input class="input100" type="text" name="username" placeholder="Enter Username">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>
<br/>
					<div class="wrap-input100  validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="pass" placeholder="Enter Password">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>
<br/>
					
<?php 

include("admin/function.php");
?>
					<div style="text-align:center;">
						 <input type="submit" name="submit" value="Submit" class="btn btn-primary"/>
						 
					</div>
					</form>
					</div>
					</div>
					</div>
<div style="position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;">
	<?php include('admin/footer.php');?>
  </div>
</body>
<html>
