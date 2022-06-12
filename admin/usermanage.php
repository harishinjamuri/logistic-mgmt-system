
<?php 

/*
file name           : usermanage.php
database connection : buspassdatabase
table               : users
purpose             : 

     The functionality of this page is for managing users 
	 
	 there are three functionalities
	 1) displaying existing users 
	 2) deleting users
	 3) adding new user
	 4) change user password
	 

	 In the first functionality the list of existing users is dispalyed along with passwords
	 
	 
	 In the second functionality the users whose check box is checked can be deleted from the existence(not available for admin).
	 
	 In the Third functionality the from can be used to add new user.
	 
	 In the fourth functionality the admin can change thee password of the user.
	 

*/

?>

<!doctype html>
<html lang=''>
<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">
 <link rel="icon" type="image/png" href="favicon.ico">

  <title>AGI- Logistic Mgmt | User Management</title>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   

 <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">

    <style>
   body{overflow-y:hidden;}
	
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
	<!-- text-transform: uppercase;-->
	font-size:15px;	
}

input[type=submit]{	
	
	height:30px;
	
	font-size:15px;	
}
input[type=text]{	
	border:thin solid black;
	height:30px;
	width:200px;
	font-size:15px;	
}
input[type=numeric],input[type=password]{	
	border:thin solid black;
	height:30px;
	width:200px;
	font-size:15px;	
}

tr:nth-child(odd){ background: rgba(17,110,176,0.2);}

#footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: red;
   color: white;
   text-align: center;
}

.wrap {
	
	width:100%;
	position:absolute;
	height:auto;
  display: flex;
  font-size:15px;
}

.left {
 
  flex-basis: 50%;
}

.right {
  margin-down:25px;
  flex-basis: 50%;
  height: 65vh; 
  overflow: auto;
}

a{
	text-decoration:none;
}


    </style>
	<script src="//code.jquery.com/jquery-latest.js"></script> 
	
	<!-- code to refresh right div on click -->
	
    <script> 
        $(document).ready(function() { 
	    $('#btn_click').on('click', function() { 
	        var url = 'usermanage.php';  
	        $('#wrap1').load(url + ' #wrap1'); 
	     }); 
        }); 
		
		 $(document).ready(function() { 
	    $('#btn_click1').on('click', function() { 
	        var url = 'usermanage.php';  
	        $('#wrap1').load(url + ' #wrap1'); 
	     }); 
        }); 
    </script>
    </head>

<body >
<?php include("nav.php");?>



<div class="wrap">   <!-- div occupies entire place between nav and footer -->
   
    <div class="right">  <!-- div for occupying right half  -->
      <div style="height: auto;">
      
<div class="left"> <!-- div for refresh icon -->
			
  <div style="align:left;float:right;margin-top:2px;">  <button style="background-color:#116EB0;font-size:15px;" type="button" id="btn_click" class="btn btn-default btn-sm">
  
          <span class="glyphicon glyphicon-refresh" style="color:white;"></span></button> 
   </div>
   </div>
    <form action="#" method="post">  <!-- form starts -->
   <div id="wrap1"> <!-- div for showing data from database -->
     <table class="table" style="text-align:center;border-bottom:1px solid rgba(0,0,0,0.2);">
       <tr style=" background: rgba(38, 115, 38,0.9);color:white;">
			<th>Username</th>
			<th>Password</th>
			<th>Delete User</th>
			
        </tr>   
    <!-- populate table from mysql database -->
                <?php 
				include("init.php");

  $search_result = mysqli_query($conn, "SELECT * FROM users where Role != 'admin-it'");
 while($row = mysqli_fetch_array($search_result)){?>
    <tr>
	 
	 <!--  contenteditable opens text box and allows to change value
          onkey allows us to call function on key press  
	-->
	 
    	<td ><?php echo $row['User_name'];?></td>
		<td <?php if($row['User_name'] != 'Admin') echo " contenteditable='true';"; ?> onkeyup="javascript: userpass(this,event,'<?php echo $row['User_name'];?>');" > <?php echo ($_SESSION["user_role"] != 'admin' and $_SESSION["user_role"] != 'admin-it') ? '*****' : $row['Password'];?></td>
	    <td><input type="checkbox" id="dell" name="dell[]" style="<?php if($row['Role'] == 'admin') echo 'display:none;'; ?>" value="<?php echo $row['User_name'];?>"> 
		<span style="font-size: 20px;">  </span></td>
		
    <script>
	 
	function userpass(element,e,rt)
	{
		//alert("content " + element.textContent);
		 var keycode = (e.keyCode ? e.keyCode : e.which);  // to get the value of key entered
    if (keycode == '13') {    // loop executes when enter key is pressed
       //alert(element.textContent +' '+rt); 
		$.ajax({
	type: "POST",
	url: "editqueries.php",
	data:'User_name='+rt+'&Password='+element.textContent,   // data to be send to query for execution
	success: function(data){
		//alert(data);
		var url = 'usermanage.php';  
	        $('#wrap1').load(url + ' #wrap1');   // to refresh the div and update the data in table
	}
	});    }
	}	
	
	</script>
	</tr>
	
              <?php }
                 ?>
            </table>
		
			
  <div style="align:left;float:right;">  
  <input type="submit" class="btn btn-primary" id="Delete" name= "delete" Value="Delete">	
   </div>
   
  <?php  
   if(isset($_POST['dell'])){
$name = $_POST['dell'];
require_once('init.php');
foreach ($name as $color){ 
  //echo $colo'."<br />";
  	$query = mysqli_query($conn,"delete from users where User_name = '$color'");
    if($query)	
	 echo '<h5  style="color:#1B0;margin-left:30px;"> User deleted Successfully. click <button style="font-size:15px;" type="button" id="btn_click1" class="btn btn-default btn-sm">
  
          <span class="glyphicon glyphicon-refresh" style="color:#1B0;" ></span></button> </h5>';
	
}
   }
   ?>
   </form>
			</div>
 </div>
    </div>
	
	
    <div class="left" style="padding: 15px 0 0 25px; "> <!-- div for form to enter data into database -->
	  <p style="color:#116EB0;font-size:14px; "><a href="adminhome.php">Home > </a><a href="usermanage.php">User Management ></a> Add User</p><br>
		<div class="container col-lg-12"  >
		
		 <form action="#" method="post" style="margin:50px 0 0 40px;">  <!-- form starts -->
		
		 <script src="script.js"></script>
	<script>
	var check = function() {
  if (document.getElementById('password').value ==
    document.getElementById('confirm_password').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'Passwords Match';
	var c = document.getElementById('submit');
	c.style.display = "block";
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'Passwords do not Match';
    var c = document.getElementById('submit');
	c.style.display = "none";
  }
}
	</script>
	
		<div class="row">
		<div class= "col-lg-6">
<div class="form-group">
    <label for="Username">User Name</label><br>
    <input type="text"  class="form-control"   id="username" name="username1" placeholder="Enter Username" size="30" required>
  </div>
  </div>
  <div class= "col-lg-6">  
    <div class="form-group">
    <label for="Role">Role</label><br>
    <input type="text"  class="form-control" id="jobrole" name="jobrole" value="user" size="30" readonly />
  </div>
  </div>
  </div>
  <div class="row">
  <div class= "col-lg-6">
  <div class="form-group">
    <label for="Password">Password</label><br>
    <input type="password" class="form-control" id="password" name="password" onkeyup='check();' placeholder="Enter the password" size="30" required/><!--pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"--> 
  </div>
  </div>
  <div class= "col-lg-6">
  <div class="form-group">
    <label for="Password">Confirm Password</label><br>
    <input type="password" class="form-control" id="confirm_password" name="confirm_password" onkeyup='check();' placeholder="Enter to Confirm password" size="30" required/><!-- pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" -->
	
  <span id='message'></span>
  </div>
  </div>
</div>

     <div class="form-group">
  <input type="submit" class="btn btn-primary" id="submit" name="submit"><br/><br/>  </div>


       
     <?php
$username="";
$password="";
$jobrole="";
if(isset($_POST['submit']))
{
    if(isset($_POST['username1']))
    {
$username=$_POST['username1'];
$password=$_POST['password'];
$jobrole=$_POST['jobrole'];

$sql1=mysqli_query($conn,"select * from users where User_name = '".$username."'");
	$res=mysqli_fetch_row($sql1);	
		
	if(!$res)
	{	
$sql2 = mysqli_query($conn,"select * from users");
$noofrows = mysqli_num_rows($sql2);
$noofrows1 = $noofrows +1;

$sql="INSERT INTO users (s_no,User_name,Password,Role) VALUES 
('$noofrows1','$username','$password','$jobrole')" or die("Failed to submit".mysqli_error());
if(mysqli_query($conn,$sql))
{
	echo '<h5 style="color:green"> User Created Successfully. click <button style="font-size:15px;" type="button" id="btn_click1" class="btn btn-default btn-sm">
  
          <span class="glyphicon glyphicon-refresh" style="color:#1B0;" ></span></button></h5></br>';
	$username="";
}
else{
	echo '<h5 style="color:red">Unable to Create User.</h5></br>';
	$username="";
   }
	}
else{
	echo '<h5 style="color:red">User Already Exist.</h5></br>';		
	}
}
}
?>
	
		
		 </form>
 </div>
		<!-- form ends -->
		</div>
  </div>
 
<div style="position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;">
	<?php include('footer.php'); ?> 
 </div>
</body>
<html>