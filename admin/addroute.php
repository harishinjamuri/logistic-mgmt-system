<?php 

/*
file name           : addroute.php
database connection : buspassdatabase
table               : route_master
purpose             : 

     The functionality of this page is to manage the data 
	 
	 there are three functionalities
	 1) displaying existing routes
	 2) adding new rotue
	 3) change user route data
	 

	 In the first functionality the list of existing routes
	 
	 In the second functionality the from can be used to add new route.
	 
	 In the third functionality the user and admin can change route data by double clicking on the data.
	 


*/

?>


<!doctype html>
<html lang=''>
<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="icon" type="image/png" href="favicon.ico">

  <title>AGI- Logistic Mgmt | Route Management</title>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   

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
input[type=numeric]{	
	border:thin solid black;
	height:30px;
	width:200px;
	font-size:15px;	
}

tr:nth-child(odd){background: rgba(17,110,176,0.2);}

 td{font-size:14px;}

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
  
  flex-basis: 50%;
  
  height: 65vh; 
  overflow: auto;
}

	h5{font-size:14px;}
    </style>
	<script src="//code.jquery.com/jquery-latest.js"></script> 
	
	<!-- code to refresh right div on click -->
	
    <script> 
        $(document).ready(function() { 
	    $('#btn_click').on('click', function() { 
	        var url = 'addroute.php';  
	        $('#wrap1').load(url + ' #wrap1'); 
	     }); 
        });
		$(document).ready(function() { 
	    $('#btn_click1').on('click', function() { 
	        var url = 'addroute.php';  
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
   
   <div id="wrap1"> <!-- div for showing data from database -->
     <table class="table" style="text-align:center;">
        <tr style=" background: rgba(38, 115, 38,0.9);color:white;">
			<th>Route No</th>
			<th>Route Name</th>
			<th>Capacity</th>
			<th>Seats Available</th>
        </tr>   
    <!-- populate table from mysql database -->
                <?php 
				include("init.php");

  $search_result = mysqli_query($conn, "SELECT * FROM route_master");
 while($row = mysqli_fetch_array($search_result)){?>
     <tr>
	 
	 <!--  contenteditable opens text box and allows to change value
          onkey allows us to call function on key press  
	-->
	 
    	<td ><?php echo $row['Route_No'];?></td>
		<td contenteditable='true' onkeyup="javascript:routename(this,event,<?php echo $row['Route_No'];?>);" ><?php echo $row['Route_Name'];?></td>
		<td contenteditable='true' onkeyup="javascript:routecapacity(this,event,<?php echo $row['Route_No'];?>);"><?php echo $row['Capacity'];?></td>
		<td><?php echo $row['Counter'];?></td>
		
    
	
	<script>
	 
	function routename(element,e,rt)
	{
		//alert("content " + element.textContent);
		 var keycode = (e.keyCode ? e.keyCode : e.which);  // to get the value of key entered
    if (keycode == '13') {    // loop executes when enter key is pressed
        //alert(element.textContent +' '+rt); 
		$.ajax({
	type: "POST",
	url: "editqueries.php",
	data:'Route_no='+rt+'&Route_Name='+element.textContent,   // data to be send to query for execution
	success: function(data){
		//alert(data);
		var url = 'addroute.php';  
	        $('#wrap1').load(url + ' #wrap1');   // to refresh the div and update the data in table
	}
	});
    }
	}	
	
	//check above function for comments
	
	function routecapacity(element,e,rt)
	{
		//alert("content " + element.textContent);
		 var keycode = (e.keyCode ? e.keyCode : e.which);
    if (keycode == '13') {
        //alert(element.textContent +' '+rt);
		$.ajax({
	type: "POST",
	url: "editqueries.php",
	data:'Route_no='+rt+'&capacity='+element.textContent,
	success: function(data){
		//alert(data);
		var url = 'addroute.php';  
	        $('#wrap1').load(url + ' #wrap1'); 
	}
	});
    }
	}	
	
	</script>
</tr>	
              <?php }
                 ?>
            </table>
			</div>
 </div>
    </div>
	
	
        <div class="left" style="padding: 15px 0 0 25px; "> <!-- div for form to enter data into database -->
	  <p style="color:#116EB0;font-size:14px; "><a href="adminhome.php">Home >  </a>Route Management ><a href="addroute.php"> Add Route</a></p><br>
		<div class="container col-lg-12"  >
		<h5 >Add Route and click <button style="font-size:15px;" type="button" id="btn_click1" class="btn btn-default btn-sm">
  
          <span class="glyphicon glyphicon-refresh" style="color:#000;" ></span></button></h5>
		 
		 <form action="#" method="post" style="margin:50px 0 0 40px;">  <!-- form starts -->
		
    <div class="row">
  
    	<div class= "col-lg-6">
 <div class="form-group">
    <label>Route Number</label>
    <input type="text"  class="form-control" id="routeno" name="routeno" placeholder="Enter Route No" size="30" required/>
  
  </div>
  </div>
  
    	<div class= "col-lg-6">
 <div class="form-group">
    <label>Route Name</label>
    <input type="text"  class="form-control" id="routename" name="routename" placeholder="Enter Route Name" size="30" required/>
 
  </div>
  </div>
  
 </div>
		 <div class="row">
  
    	<div class= "col-lg-6">
 <div class="form-group">
     <label>Bus Number</label>
    <input type="text"  class="form-control" id="busnumber" name="busnumber" placeholder="Enter Bus Number" size="30" required/>
 
  </div>
  </div>
  
    	<div class= "col-lg-6">
 <div class="form-group">
     <label>Bus Capacity</label>
    <input type="numeric"  class="form-control" id="capacity" name="capacity" placeholder="Enter Bus Number" size="30" required/>
 
  </div>
  </div>
  
 </div>
 <div class="row">
  
    	<div class= "col-lg-6">
 <div class="form-group">
    <label>Driver Name</label>
    <input type="text"  class="form-control" id="drivername" name="drivername" placeholder="Enter Driver's Name" size="30" required/>
 
  </div>
  </div>
  
    	<div class= "col-lg-6">
 <div class="form-group">
     <label for="Mobile">Driver Number</label>
    <input type="text" class="form-control" pattern="[6789][0-9]{9}" title="Phone number starting with 6-9 and remaining 9 digit with 0-9" id="drivernumber" name="drivernumber" aria-describedby="mobile" placeholder="Enter Driver Number" required/>
    
  </div>
  </div>
  
 </div>

	


	     <div class="form-group">
  <input type="submit" class="btn btn-primary" name="submit"> 
  </div>
  	
<?php
include("init.php");


$routeno= " ";
$routename=" ";
$busnumber= " ";
$capacity= " ";
$drivername=" ";
$drivernumber=" ";

if(isset($_POST['submit']))
{
    if(isset($_POST['routeno']))
    {
$routeno=$_POST['routeno'];
$routename=strtoupper($_POST['routename']);
$busnumber=$_POST['busnumber'];
$capacity=$_POST['capacity'];
$drivername=strtoupper($_POST['drivername']);
$drivernumber=$_POST['drivernumber'];
$message;
/*
if (empty($username)) { 
			array_push($errors, "Username is required"); 
		}*/
$sql1=mysqli_query($conn,"select * from route_master where Route_no = '".$routeno."'");
	$res=mysqli_fetch_row($sql1);	
		
	if(!$res)
	{		
$sql="INSERT INTO route_master(Bus_No,Capacity,Counter,Driver_Mobile,Driver_Name,Route_Name,Route_No)
 VALUES ('$busnumber','$capacity','$capacity','$drivernumber','$drivername','$routename','$routeno')";

	
	if(mysqli_query($conn,$sql))
     {
       echo '<h5 style="color:green">Route Successfully Added.click <button style="font-size:15px;" type="button" id="btn_click1" class="btn btn-default btn-sm">
  
          <span class="glyphicon glyphicon-refresh" style="color:#1B0;" ></span></button></</h5></br>';
	   $routeno= " ";
	  
     }
     else
		{
			echo '<h5 style="color:red">Route Addition Unsuccessful.</h5></br>';
			$routeno= " ";
		}
	}
	else
	if(!isset($_POST['submit']))	
	{
		echo '<h5 style="color:red">Route Already Exist.</h5></br>';		
	}
}}

?>  
</form>

<!-- form ends -->
   </div>
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