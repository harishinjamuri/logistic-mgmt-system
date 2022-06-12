
<?php 

/*
file name           : addboardpoint.php
database connection : buspassdatabase
table               : bus_master
purpose             : 

     The functionality of this page is to manage the data 
	 
	 there are three functionalities
	 1) displaying existing boarding points
	 2) adding new boarding point
	 3) change user boardingpoint data
	 

	 In the first functionality the list of existing boardingpoint based on the selected route from the drop down list
	 
	 In the second functionality the from can be used to add new boarding point for a particular route.
	 
	 In the third functionality the user and admin can change boarding point data by double clicking on the data.
	 


*/

?>


<!doctype html>
<html lang=''>
<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="styles.css">
   <link rel="icon" type="image/png" href="favicon.ico">

   <title>AGI- Logistic Mgmt | Boarding point Management</title>

  
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  

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
input[type=text],input[type=time]{	
	border:thin solid black;
	height:30px;
	width:200px;
	font-size:15px;	
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

select,option {  
font-size:15px;
}


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
}

.left {

  flex-basis: 50%;
}

.right {
  
  flex-basis: 50%;
  
  height: 62vh; 
  overflow: auto;
}

	h5{font-size:14px;}

tr:nth-child(odd){ background: rgba(17,110,176,0.2);>

 td{font-size:14px;}

    </style>
	<script src="//code.jquery.com/jquery-latest.js"></script> 
	
	<!-- code to refresh right div on click -->
    <script> 
        $(document).ready(function() { 
	    $('#btn_click').on('click', function() { 
	        var url = 'addboardpoint.php';  
	        $('#wrap1').load(url + ' #wrap1'); 
	     }); 
        });  
		$(document).ready(function() { 
	    $('#btn_click1').on('click', function() { 
	        var url = 'addboardpoint.php';  
	        $('#wrap1').load(url + ' #wrap1'); 
	     }); 
        }); 
    </script>
    </head>
<body>

<?php include("nav.php");

?>


<div class="wrap" style="font-size:15px;"> <!-- div occupies entire place between nav and footer -->
     
    <div class="right">  <!-- div for occupying right half  -->
      <div style="height: auto;">
    <div style="float:right;margin-top:2px;"> <!-- div for refresh icon --> 
	

	<button style="background-color:#116EB0;font-size:15px;" type="button" id="btn_click" class="btn btn-default btn-sm">
          <span class="glyphicon glyphicon-refresh" style="color:white;"></span></button> 
   </div>
   
   
   
   <div id="wrap1">  <!-- div for showing data from database -->
     <table class="table "  style="text-align:center;" width="400">
        <tr style=" background: rgba(38, 115, 38,0.9);color:white;">
			<th>Route No</th>
			<th>Boarding point</th>
			<th> Time </th>
			<th> Amount </th>
        </tr>   
    <!-- populate table from mysql database -->
	
<?php 
include("init.php");
if(isset($_COOKIE['myJavascriptVar']))			 
{$phpVar =  $_COOKIE['myJavascriptVar'];	/* cookie is used to get the value of route number selected in route column of form */
  $search_result = mysqli_query($conn, "SELECT * FROM bus_master where Route_no = '".$phpVar."'");
 while($row = mysqli_fetch_array($search_result)){?>
    <tr>
	<!--  contenteditable opens text box and allows to change value
          onkey allows us to call function on key press  
	-->
	
    	<td  onkeyup="javascript:routeno(this,event,<?php echo $row['bpid'];?>);"><?php echo $row['Route_No'];?></td>
		<td contenteditable='true' onkeyup="javascript:boardingpoint(this,event,<?php echo $row['bpid'];?>);"><?php echo $row['Boarding_point'];?></td>
		<td contenteditable='true' onkeyup="javascript:time(this,event,<?php echo $row['bpid'];?>);"><?php echo $row['Time'];?></td>
		<td contenteditable='true' onkeyup="javascript:amount(this,event,<?php echo $row['bpid'];?>);"><?php echo $row['Amount'];?></td>
		
		<script>
	 
	 
	 // same comments follows for all the below functions
	 
	function routeno(element,e,rt)
	{
		//alert("content " + element.textContent);
		 var keycode = (e.keyCode ? e.keyCode : e.which);   // to get the value of key entered
    if (keycode == '13') {     // loop executes when enter key is pressed
        //alert(element.textContent +' '+rt);
		$.ajax({
	type: "POST",
	url: "editqueries.php",
	data:'bpid='+rt+'&Route_No='+element.textContent,   // data to be send to query for execution
	success: function(data){
		//alert(data);
		var url = 'addboardpoint.php';  
	        $('#wrap1').load(url + ' #wrap1');   // to refresh the div and update the data in table
	}
	});
    }
	}	
	
	//check above function for comments
	
	function boardingpoint(element,e,rt)
	{
		//alert("content " + element.textContent);
		 var keycode = (e.keyCode ? e.keyCode : e.which);
    if (keycode == '13') {
        //alert(element.textContent +' '+rt);
		$.ajax({
	type: "POST",
	url: "editqueries.php",
	data:'bpid='+rt+'&Boarding_point='+element.textContent,
	success: function(data){
		//alert(data);
		var url = 'addboardpoint.php';  
	        $('#wrap1').load(url + ' #wrap1'); 
	}
	});
    }
	}
	
	//check above function for comments
	function time(element,e,rt)
	{
		//alert("content " + element.textContent);
		 var keycode = (e.keyCode ? e.keyCode : e.which);
    if (keycode == '13') {
        //alert(element.textContent +' '+rt);
		$.ajax({
	type: "POST",
	url: "editqueries.php",
	data:'bpid='+rt+'&Time='+element.textContent,
	success: function(data){
		//alert(data);
		var url = 'addboardpoint.php';  
	        $('#wrap1').load(url + ' #wrap1'); 
	}
	});
    }
	}
	
	//check above function for comments
	
	function amount(element,e,rt)
	{
		//alert("content " + element.textContent);
		 var keycode = (e.keyCode ? e.keyCode : e.which);
    if (keycode == '13') {
        //alert(element.textContent +' '+rt);
		$.ajax({
	type: "POST",
	url: "editqueries.php",
	data:'bpid='+rt+'&Amount='+element.textContent,
	success: function(data){
		//alert(data);
		var url = 'addboardpoint.php';  
	        $('#wrap1').load(url + ' #wrap1'); 
	}
	});
    }
	}
	</script>
		
    </tr>
<?php }}
                 ?>
            </table>
			</div>
 </div>
    </div>
       <div class="left" style="padding: 15px 0 0 25px; "> <!-- div for form to enter data into database -->
	  <p style="color:#116EB0;font-size:14px; "><a href="adminhome.php">Home >  </a>Route Management ><a href="addboardpoint.php"> Add Boarding point</a></p><br>
		<div class="container col-lg-9"  >
		
		
		<h5 >Select Route and click <button style="font-size:15px;" type="button" id="btn_click1" class="btn btn-default btn-sm">
  
          <span class="glyphicon glyphicon-refresh" style="color:#000;" ></span></button> for Boarding points</h5>
		  
		 <form action="#" method="post" style="margin:50px 0 0 40px;">  <!-- form starts -->
		
<div class="row">
	<div class= "col-lg-6">
	<div class="form-group">
     <label>Route Number</label><br/>
	<script>
	
	function submit1()
	{
		var myOutput= document.getElementById('routeno').value;
		
		//alert("this function is executing"+myOutput);
	document.cookie = "myJavascriptVar = "+myOutput;   /* cookie is used to send the value of route number selected in route column of form to fetch the data from database*/
	//location.reload();
	document.getElementById('routeno').innerHtml = myOutput;
	}
	
	</script>
 <!--    <input type="text"  class="form-control" id="routeno" name="routeno" placeholder="Enter Route No" size="30" required>
--><?php 

include("init.php");

 $query = $conn->query("select * from route_master"); // Run your query

echo ' <select name="routeno" class="form-control" style="font-size:13px;height:30px;	border:thin solid black;" id="routeno" onchange="submit1();"  > 
	 <option value="select" selected>&nbsp; select &nbsp; </option>'; // Open your drop down box

// Loop through the query results, outputing the options one by one
while ($row = mysqli_fetch_array($query)) {
   echo '<option value="'.$row['Route_No'].'" style="text-align:center" >'.$row['Route_No'].'</option>';
}

echo'</select>';
?>  
   </div>
   </div>
   <div class= "col-lg-6">
  <div class="form-group">
    <label>Boarding Point</label><br>
    <input type="text"  class="form-control" id="boardingpoint" name="boardingpoint" placeholder="Enter Boarding Point" size="30" required>
  </div>
  </div></div>
<div class="row"> 
<div class= "col-lg-6"> 
  <div class="form-group">
    <label>Time</label><br>
    
<input type="time" class="form-control" name="bustime" id="bustime" placeholder="Enter time" size="30" required>
  </div>
</div>
<div class= "col-lg-6">
  <div class="form-group">
    <label>Fee</label><br>
    <input type="text"  class="form-control" id="fee" name="fee" placeholder="Enter the fee details" size="30" required>

  </div>
  </div>
  </div>
  <div class="row">
  <div class= "col-lg-6">
       <div class="form-group">
  <input type="submit" class="btn btn-primary" name="submit">  </div>
    </div></div>
	 <?php
include( "init.php");

$routeno="";
$boardingpoint="";
$busnumber="";
$bustime="";
$fee="";
if(isset($_POST['submit']))
{
if(isset($_POST['boardingpoint'])){
$routeno=$_POST['routeno'];
$boardingpoint=strtoupper($_POST['boardingpoint']);

$bustime=$_POST['bustime'];
$fee=$_POST['fee'];

$sql=mysqli_query($conn,"select * from bus_master where Route_No = '".$routeno."' and Boarding_point = '".$boardingpoint."'");
	$res=mysqli_fetch_row($sql);	
		
	if(!$res)
	{	
$sql2 = mysqli_query($conn,"select * from bus_master");
$noofrows = mysqli_num_rows($sql2);

$rows = array();

while(($row =  mysqli_fetch_assoc($sql2))) {
    $rows[] = $row['bpid'];
}
$count = 1;

foreach ($rows as $rows1){
  // echo $rows1." \n";
   
   if($rows1 == $count)
	   $count = $count + 1;
}

//echo $count;


$noofrows1 = $count;
$sql1="INSERT INTO bus_master (bpid,Boarding_point,Route_No,Bus_No,Time,Amount) VALUES 
('$noofrows1','$boardingpoint','$routeno','$routeno','$bustime','$fee')" ;
//echo $noofrows;
if(mysqli_query($conn,$sql1))
{
echo '<h5 style="color:green">Boarding point Added Successfully.</h5></br>';
}
else
{
echo '<h5 style="color:red">Boarding point Addition Unsuccessful.</h5></br>';
}}
else
	{
		echo '<h5 style="color:red">Route with this Boarding point Already Exist.</h5></br>';		
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
