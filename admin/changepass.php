
<?php 

/*
file name           : changepass.php
database connection : buspassdatabase
table               : users
purpose             : 

     The functionality of this page is to let the user change password to his own password.
	 

*/

?>


<?php include("init.php");?>
<!doctype html>
<html lang=''>
<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="icon" type="image/png" href="favicon.ico">

  <title>AGI- Logistic Mgmt | Change Password</title>
 
  
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">


  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">

    <style>
    #buttons{
	margin-top: 18px;
	overflow: hidden;
}
#blah{
  max-width:180px;
}
input[type=file]{
padding:10px;
}
#buttons :first-child{
	float:right;
}
#buttons:nth-child(2){
margin-right:15px;
float:right;
padding:30px 25px;
	
}
input
{
		border-radius: 4px;
		text-transform: none;
}
input[type=text],input[type=password]{	
	border:thin solid black;
	height:30px;
	width:250px;
}
input[type=numeric]{	
	border:thin solid black;
	height:30px;
	width:200px;
}
input[type=date]{	
	border:thin solid black;
}
textarea{
	border:thin solid black;
}



    </style>
	
	<script src="script.js"></script>
	<script>
	var check = function() {
  if (document.getElementById('password').value ==
    document.getElementById('confirm_password').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'Passwords Match';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'Passwords do not Match';
  }
}
	</script>
    </head>
<body>

<?php include("nav.php");?>

        
<div class="limiter" style="padding: 15px 0 0 25px; ">
<p style="color:#116EB0;font-size:14px; "><a href="adminhome.php">Home > </a>Profile ><a href="changepass.php"> Change Password</a></p><br>
		<div class="container " style="align:center;"  >
		
	<div style="margin:50px;" class="col-lg-10">
		<form action ="changepass.php"  method="post" style="margin:50px 0 0 200px;" >
		
		
		<div class="row">
		<div class= "col-lg-6">
<div class="form-group">
    <label for="Old Password">Old Password</label><br>
    <input type="text"  class="form-control"   id="OldPassword" name="Oldpassword" placeholder="Enter Old Password" size="30" required />
  </div>
  </div>
  </div>
   <div class="row">
  <div class= "col-lg-6">
  <div class="form-group">
    <label for="Password">New Password</label><br>
    <input type="password" class="form-control" id="password" name="password" onkeyup='check();' placeholder="Enter New Password" size="30" required/><!--pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"--> 
  </div>
  </div>
  
  
 
  <div class= "col-lg-6">
  <div class="form-group">
    <label for="Password">Confirm Password</label><br>
    <input type="password" class="form-control" id="confirm_password" name="confirm_password" onkeyup='check();' placeholder="Enter to Confirm Password" size="30" required/><!-- pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" -->
	<br/>
  <h6><span id='message' ></span></h6>
  </div>
  </div>
</div>
     <div class="form-group">
  <input type="submit" class="btn btn-primary" name="submit"> </div>

     <?php
require "init.php";
$username="";
$password="";
$Oldpassword="";

    if(isset($_POST['password']))
    {

$password=$_POST['password'];
$Oldpassword=$_POST['Oldpassword'];

$sql1=mysqli_query($conn,"select * from users where User_name = 'Admin' and Password = '".$Oldpassword."'");
	$res=mysqli_num_rows($sql1);	
	//	echo $res;
	if($res ==1)
	{		
$sql="update users set Password = '".$password."' where User_name = 'Admin' and Password = '".$Oldpassword."'";
if(mysqli_query($conn,$sql))
{
	echo '<h6 style="color:green">Password changed Successfully.</h6></br>';
	$username="";
}
else{
	echo '<h6 style="color:red">Unable to Change Password.</h6></br>';
	$username="";
   }
	}
else{
	echo '<h6 style="color:red">Details not matched.</h6></br>';		
	}
}

?>
	

        </div>
        
   </form></div>
   
   <div style="position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;">
	<?php include('footer.php');?>
  </div>

</body>
<html>
