<?php 

/*
file name           : updatefaculty.php
database connection : buspassdatabase
table               : faculty
purpose             : 

     The functionality of this page is to update employee data
	 
	 enter the employeeid number and change the required data and submit the form.

*/

?>

<?php include("nav.php");?>
<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
$query ="SELECT * FROM route_master";
$results = $db_handle->runQuery($query);
?>
<!doctype html>
<html lang=''>
<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="styles.css">
   <link rel="icon" type="image/png" href="favicon.ico">
   <title>AGI- Logistic Mgmt | Employee Update</title>
   
   <link rel="stylesheet" type="text/css" href="css/main.css">
   <script src="jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
	<script>
	
	 <!-- code for reading image -->
	function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }  
	</script>
    <title>AGI-Bus Pass</title>
	
	
    
 
  
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">


  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
<script src="jquery-3.2.1.min.js" type="text/javascript"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>


<script src="webcam.min.js"></script>

<script>



<!-- code for boadring points based on route number -->
function getState(val) {
	$.ajax({
	type: "POST",
	url: "getState.php",
	data:'Route_no='+val,
	success: function(data){
		$("#boardingpoint").html(data);
		getCity();
	}
	});
}


<!-- code for fee based on boadring points -->
function getCity(val) {
	$.ajax({
	type: "POST",
	url: "getCity.php",
	data:'Boarding_point='+val,
	success: function(data){
		$("#fee").html(data);
	}
	});
}

</script>
    <style>
    #buttons{
	margin-top: 18px;
	overflow: hidden;
}
#blah{
  max-width:120px;
}
input[type=file]{
padding:10px;
}


input
{
		border-radius: 4px;
		<!-- text-transform: uppercase;-->
}
input[type=text]{	
	border:thin solid black;
	height:30px;
	width:250px;
}
input[type=number]{	
	border:thin solid black;
	height:30px;
	width:250px;
}
input[type=date]{	
	border:thin solid black;
}
textarea{
	border:thin solid black;	
}


#show{
	display:block;
	z-index:1;
	background-color: #2196f3;
	width:230px;
	height:280px;
	margin:auto;
	padding-left:15px;
	display:none;
	text-align:center;
	border-radius: 10px;
}


#fee::-ms-expand
    {
        display: none;
    }
    #fee
    {   pointer-events:none;
        -webkit-appearance: none;
        -moz-appearance: none;      
        appearance: none;
        padding: 2px 30px 2px 2px;
        /*border: none; - if you want the border removed*/
    }
	
	
	h5{font-size:14px;}

    </style>
	   
    <link href="https://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/examples/jumbotron-narrow/jumbotron-narrow.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>
	<script>
	function call(){
		
	var val = 0;	
	document.cookie = "updatevaluef ="+val;	 // for showing form to enter id number
		
		
	var someVarName = 0;
    localStorage.setItem("status", someVarName);  //for camera access
    if(localStorage.getItem('empid1')!=1){
     var  val = 0;   
     localStorage.setItem("empid1", val);}   // for edit enable
    else{
     //alert(localStorage.getItem("empid1")); 
	 
      //for not showing drop down 
	  var dy = document.getElementById('routeno');dy.style.display = "none";
      var y = document.getElementById('boardingpoint');y.style.display = "none";
	  var d = document.getElementById('file'); d.style.display = "none";
	  var c = document.getElementById('cam');c.style.display = "none";
	  var acad = document.getElementById('Academicsyear');acad.style.display = "none";
	  var up = document.getElementById('update'); up.style.display = "none";
	  var a10 = document.getElementById('Designation');a10.style.display = "none";
      var b10 = document.getElementById('Department'); b10.style.display = "none";
	   var b11 = document.getElementById('fee'); b11.style.display = "none";
	  
	  // for making fields read only
	  document.getElementById("facname").readOnly = true;
	  document.getElementById("mobile").readOnly = true;
	  document.getElementById("remarks").readOnly = true;	  
	  
	  //for showing drop downs
	  var dy1 = document.getElementById('routeno1');
      var y1 = document.getElementById('boardingpoint1');
	  var a1 = document.getElementById('fee1');
	  var acad1 = document.getElementById('Academicsyear1');
	  var a5 = document.getElementById('designation1');
      var b5 = document.getElementById('department1');
	  a5.style.display = "block";
	  b5.style.display = "block";
	  acad1.style.display = "block";
	  a1.style.display = "block";
	  dy1.style.display = "block";
	  y1.style.display = "block";
	}
	}
	</script>
	
<body onload="call()">
       
<div class="limiter" style="padding: 15px 0 0 25px; ">
<p style="color:#116EB0;font-size:14px; "><a href="adminhome.php">Home > </a>Update ><a href="updatefaculty.php"> Update Employee</a></p><br>
	
<div class="container" >

	<div >
		<form style="margin:0px;padding:0px;" class="form-inline" action="updatefaculty.php" method="post">
		<label style="font-size:18px;">Enter Employee Id</label>&nbsp;&nbsp;
		<input type="text"  class="form-control"  id="empid" name="empid" placeholder="Enter Employee Id" maxlength="5" required />&nbsp;&nbsp;
        <input type="submit" onclick="renderdata()" class="btn btn-primary" name="submit" value="Go">
		
	 </form><br/><br/>
    </div>
	
	<script>
  
  $('#empid').on('keypress', function (event) {
	  
    var regex = new RegExp("^[0-9]");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key) && key == '13') {
       event.preventDefault();
       return false;
    }
});
  </script>
  </div>	
<div class="container" >
		<?php
require "init.php";
 
//echo "<script>alert(localStorage.getItem('htno1')); </script>";	
//echo $_COOKIE['updatevaluef'];

$hallticket3="";
$facname="";
$designation="";
$department="";
$mobileno="";
$routeno="";
$boardingpoint="";
$date="";
$remarks="";
$image = "";
$ay="";
$count1 = "";
$total="";
$img ="";
if(isset($_COOKIE['updatevaluef'] ))
if($_COOKIE['updatevaluef'] == 2){
$target="img/".basename($_FILES['image']['name']);
$image=$_FILES['image']['name'];
$hallticket3=strtoupper($_POST['hallticket5']);
$facname=strtoupper($_POST['facname']);
$designation=strtoupper($_POST['Designation']);
$department=strtoupper($_POST['Department']);
$mobileno=strtoupper($_POST['mobile']);
$ay=strtoupper($_POST['academicsyear']);
$boardingpoint=strtoupper($_POST['boardingpoint']);
$routeno=strtoupper($_POST['routeno']);
$date= date("Y-m-d h:i:s");
$remarks=strtoupper($_POST['remarks']);
$ay=$_POST['academicsyear'];
$total=$_POST['fee'];
$usr = $_SESSION['username'];
$msg="";




$status = 0;

$img = $_POST['image1'];
if($img != "" )
{
//echo "img ".$img."img ";
    $folderPath = "img/";
  
    $image_parts = explode(";base64,", $img);
    $image_type_aux = explode("img/", $image_parts[0]);
    //$image_type = $image_type_aux[1];
  
    $image_base64 = base64_decode($image_parts[1]);
    $fileName = $hallticket3 . '1.png';
  
    $file = $folderPath . $fileName;
    file_put_contents($file, $image_base64);
    //echo $fileName;
    $image = $fileName;
	}
//echo $image;
	
/* query execution starts */



//echo "boardingpoint";echo "Course";echo "date";echo "department";echo "due";echo "Fname";echo "hallticket";echo "image";echo "mobile";echo "studname";echo "receipt";echo "remarks";echo "routeno";echo "total";echo "Year";echo "acad";
//echo $boardingpoint." ".$Course." ".$date." ".$department." ".$due." ".$Fname." ". $hallticket." ".$image." ".$mobile." ".$studname." ".$receipt." ".$remarks." ".$routeno." ".$total." ".$Year." ".$ay;
	

if($image == "")
{
		$sql =" 
	UPDATE `faculty` SET `Name`='".$facname."',`Designation`='".$designation."',`Department`='".$department."',`Mobile_Number`='".$mobileno."',`Boarding_point`='".$boardingpoint."',`Route_no`='".$routeno."',Fee='".$total."',`Date_of_Payment`= '".$date."',`Remarks`= '".$remarks."',`acadyear`= '".$ay."',Verifiedby='".$usr."' where `Employee_Id`= '".$hallticket3."'";	
}
else
 	
		$sql =" 
	UPDATE `faculty` SET `Name`='".$facname."',`Designation`='".$designation."',`Department`='".$department."',`Mobile_Number`='".$mobileno."',`Boarding_point`='".$boardingpoint."',`Route_no`='".$routeno."',Fee='".$total."',`Date_of_Payment`= '".$date."',`Remarks`= '".$remarks."',`image_of_faculty`='".$image."',`acadyear`= '".$ay."',Verifiedby='".$usr."' where `Employee_Id`= '".$hallticket3."'";
//echo $sql;
if(mysqli_query($conn, $sql) )
{
	echo '<h5 style="color:green">Employee Data Updated Successfully.</h5><br>';
		
echo "<script> alert('Employee Data Updated Successfully.');</script>";

	
	//echo $_COOKIE['status'];
		
echo "<script>if(localStorage.getItem('status') == 1){
window.open('webcamfac.php', '_blank', 'toolbar=yes,scrollbars=yes,resizable=yes,top=250,left=500,width=315,height=380');}
window.close();
		</script>";


}
else  if(!isset($_POST['hallticket']))
{
	echo '<h5 style="color:red">Employee Updation UnSuccessful.</h5><br>';
		
echo "<script> alert('Employee Data Updation UnSuccessfully.');</script>";

	
		}}

/* query execution ends */
?>
   

<script>
  function renderdata(){
	 var  someVarName = document.getElementById("empid").value;   
      localStorage.setItem("empid", someVarName);
	  var  val = 1;   
      localStorage.setItem("empid1", val); // for inserting image on camera capture
    //  
	//  document.getElementById("data").style.display = "block";
	// disable1();
	//alert(localStorage.getItem("empid1")); 
	
  }
 
</script>


<?php
require "init.php";
$hallticket="<script>document.write(localStorage.getItem('empid'));</script>";
$htstatus="<script>document.write(localStorage.getItem('empid1'));</script>";
$hallticket1 = "";

if(isset($_POST['empid'])){
$empid=strtoupper($_POST['empid']);

$htno = strlen($empid);
$hallticket1 = $hallticket;

if($htno <= 5){

echo "<script> document.getElementById('empid').value = localStorage.getItem('empid');
</script>";
 
 $query=mysqli_query($conn,"SELECT * FROM `faculty` WHERE Employee_Id='".$empid."'");




?>


<script type="text/javascript">

 

(function() {

 // document.getElementById("file").display = none;
	  //document.getElementById("button").display = "none";
	  //alert("called");

var img = document.getElementById('blah').firstChild;
img.onload = function() {
    if(img.height > img.width) {
        img.height = '100%';
        img.width = 'auto';
    }
};}());

</script>
<?php
$rowCount = "";

$rowCount = mysqli_num_rows($query);
if($rowCount == null)
  {
	  echo "<h5 style='color:red;'>Employee not registered</h5>";
  }
else{
//echo "<script>alert(localStorage.getItem('htno'));alert(localStorage.getItem('htno1'));</script>";

 while($row = mysqli_fetch_array($query)):
 
 ?>
 

<div id="data">
		<form name="form1" style="margin-left:80px;"  action="updatefaculty.php" method="POST" enctype="multipart/form-data">
		
 <div class="row">
	      
	<div class= "col-lg-4">
      <div class="form-group">
        <label for="Name">Employee Id</label>
        <input type="number" class="form-control" id="hallticket5" value="<?php echo $row['Employee_id'];?>" name="hallticket5" maxlength="5" onChange="getwords()" placeholder="Enter hallticket" readOnly />
      </div>
    </div>
	<div class= "col-lg-4">
      <div class="form-group">
        <label for="Name">Name</label>
         <input type="text" class="form-control" id="facname" name="facname" value="<?php echo $row['Name'];?>" placeholder="Faculty name"  pattern="[A-Za-z_]{3,50}" title="No special characters, only characters of minimum 3 and maximum 30" maxlength="30" required />
      </div>
    </div>
	
	<script>
  
  $('#facname').on('keypress', function (event) {
	  
    var regex = new RegExp("^[a-zA-Z ]");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
       event.preventDefault();
       return false;
    }
});
  </script>
	<div class= "col-lg-4">
	<span style="margin:-10px 0px 0px 50px">
	<img id="blah" src="img/<?php  $GLOBALS['image5'] = $row['image_of_faculty']; echo $image5;?>" alt="your image" width="119" />
	
	 <input type="hidden" name="image1" class="image-tag">
	</span>
<script>

function done(){
    $('#snapshots').html("uploaded");
}
</script>
<script language='JavaScript'>
function getwords(){
myOutput= document.getElementById('Course');
ht = document.getElementById('hallticket5');

document.cookie = "empid = "+ht.value;


}
</script>
  </div>
 </div>
   
   <div class="modal" id="show" >
   <input type="button" id="clickclose" class="close" style="background-color:transparent;margin-right:10px;color:black;height:20px;width:15px;"  value="X" />
    <div id="my_camera" ></div>
		
			    <input type="button" class="btn btn-success" value="Take Snapshot" onClick="take_snapshot()">
             
  </div>
  
   <script language="JavaScript">
    Webcam.set({
        width: 200,
        height: 220,
        image_format: 'jpeg',
        jpeg_quality: 100
    });
  
    function take_snapshot() {
        Webcam.snap( function(data_uri) {
		
            $(".image-tag").val(data_uri);
             $('#blah').attr('src', data_uri);
			 $('#show').delay(40).fadeOut();
			//alert(data_uri);
			Webcam.reset();
          //  document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
        } );
    }
</script>

    <script>

	 // code for modal box
	 
	 	$('#clickclose').click(function() {
		//alert('hi');
		Webcam.reset();
		$('#show').delay(10).fadeOut();
});

	function camcall(){
		 
  Webcam.attach( '#my_camera' );
  $('#show').delay(40).fadeIn();

		//document.getElementById("button").disabled = true;
		document.getElementById("show").style.display = "block";
		
	//	ready();
	}	
  </script>
  <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
    <script type="text/javascript"> 
     
	  
	  
	var modal = document.getElementById('show');

// Get the button that opens the modal
var btn = document.getElementById("show");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
  
 // code for modal box ends

  </script>
 
  <div class="row">
  
    	<div class= "col-lg-4">
 <div class="form-group">
 
 
  <label for="Designation">Category</label>
  <input type="text" class="form-control" id="department1"  value="<?php echo $row['Designation'];?>" name="Designation" readonly />
    <select class="form-control" id="Designation" style="height:30px;width:250px;border:1px solid black;" name="Designation">
	<option value="SELECT"   >SELECT</option>
	<option value="TEACHING" <?php if('TEACHING' == $row['Designation']) echo 'selected'; ?> >TEACHING</option>
	<option value="NON TEACHING" <?php if('NON-TEACHING' == $row['Designation']) echo 'selected'; ?> >NON TEACHING</option>
	<option value="OTHERS" <?php if( 'OTHERS' == $row['Designation']) echo 'selected'; ?> >OTHERS</option>

    </select>
  </div>
  </div>
  <div class= "col-lg-4">
 <div class="form-group">	
	 <label for="Department">Department</label> 
	 <input type="text" class="form-control" id="designation1"  value="<?php echo $row['Department'];?>" name="Department" readonly />
	
    <select class="form-control" id="Department" style="height:30px;width:250px;border:1px solid black;" name="Department">
	<option value="SELECT">SELECT</option>
	<option value="CHEMICAL" <?php if('CHEMICAL' == $row['Department']) echo 'selected'; ?> >CHEMICAL</option>
	<option value="CSE" <?php if('CSE' == $row['Department']) echo 'selected'; ?> >CSE</option>
	<option value="CIVIL" <?php if('CIVIL' == $row['Department']) echo 'selected'; ?> >CIVIL</option>
	<option value="ECE" <?php if('ECE' == $row['Department']) echo 'selected'; ?> >ECE</option>
	<option value="EEE" <?php if('EEE' == $row['Department']) echo 'selected'; ?> >EEE</option>
	<option value="IT" <?php if('IT' == $row['Department']) echo 'selected'; ?> >IT</option>
	<option value="MECH" <?php if('MECH' == $row['Department']) echo 'selected'; ?> >MECH</option>
	<option value="ADMIN" <?php if('ADMIN' == $row['Department']) echo 'selected'; ?> >ADMIN</option>
	<option value="H&amp;S" <?php if('H&amp;S' == $row['Department']) echo 'selected'; ?> >H&amp;S</option>
	<option value="MBA" <?php if('MBA' == $row['Department']) echo 'selected'; ?> >MBA </option>
	<option value="PHARM" <?php if('PHARM' == $row['Department']) echo 'selected'; ?> > PHARM</option>

    </select>
	
	

    </select>
  </div>
  </div>
  
  <div class="col-lg-4">
  
  <input type="file" id="file" name="image" onchange="readURL(this);"  />                                     
  <input id="cam" type="button" value="Capture Image" style="border:1px solid #116EB0;width:250px;	
height:35px;color:white;background-color: #116eb0;" onclick="camcall();"/>
  </div>
 </div>
 

 <div class="row">
  <div class="col-lg-4">
  <div class="form-group">
  <label>Route Number</label>
   <input type="text" class="form-control" id="routeno1"  value="<?php echo $row['Route_no'];?>" name="rtno" readonly />
<select name="routeno" id="routeno" style="height:30px;width:250px;border:1px solid black;" class="form-control" onChange="getState(this.value);">
<option value disabled selected>Select Route</option>
  

<?php
foreach($results as $country) {
?>
<option value="<?php echo $country["Route_No"]; ?>"><?php echo $country["Route_No"]; ?></option>
<?php
}
?>
</select>

  </div>
  </div>
 
 <div class="col-lg-7">
  <div class="form-group">
    <label for="bp">Boarding Point</label>
	 <input type="text" class="form-control" style="width:100%;" id="boardingpoint1"  value="<?php echo $row['Boarding_point'];?>" name="boardingpoint1" readonly />
	<select name="boardingpoint" style="height:30px;border:1px solid black;" id="boardingpoint" class="form-control" onChange="getCity(this.value);">
<option value="">Select Boarding point</option>

</select>
   
  </div>
  </div>

</div>

<div class="row">
  <div class="col-lg-4">
   <div class="form-group">
    <label for="fee">Total Fee</label><br/>
	 <input type="text" class="form-control" id="fee1"  value="<?php echo $row['Fee'];?>" name="paidfee" readonly />
     <select name="fee" id="fee"  style="height:30px;width:250px;border:1px solid black;" class="form-control"  onChange="feepaid();">
</select>
  </div>
  
  </div>
  
  
		<div class= "col-lg-4">
  <div class="form-group">
    <label for="paid"> Paid </label>
  <input type="number" class="form-control"  value="<?php $pay = $row['Fee']-$row['Due'];
    echo $pay; ?>"  id="paid" onChange="feepaid()" name="paid"  placeholder=" " >
    
  </div>
  </div>
 <script> 
 function feepaid(){
e = document.getElementById('fee');
paidfee = document.getElementById('paid');
if (paidfee.value != "")
{  
   var duefee = e.value - paidfee.value;
   
   if(duefee<0)
   { document.getElementById("paid").value = "Enter Valid Amount"; 
     document.getElementById("Due").value = " ";
   }
   else
     document.getElementById("Due").value = duefee;

}

}
 
 </script>
 
  
  <div class="col-lg-4">
  
  <label for="due">Due</label>
      <input type="text"  class="form-control"  value="<?php echo $row['Due'];?>" id="Due" name="Due" readOnly />
  </div>
  
</div>
  
 
  
    <div class="row">
<div class="col-lg-4">
  <div class="form-group">
    <label for="Mobile">Mobile Number</label>
    <input type="text" class="form-control" pattern="[6789][0-9]{9}" title="Phone number starting with 6-9 and remaining 9 digit with 0-9" id="mobile"  value="<?php echo $row['Mobile_Number'];?>" name="mobile" placeholder="Enter Mobile No" maxlength="10" required>
    
  </div>
  </div>
  	<script>
  
  $('#mobile').on('keypress', function (event) {
	  
    var regex = new RegExp("^[0-9]");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
       event.preventDefault();
       return false;
    }
});
  </script>
  <div class="col-lg-4">
  <div class="form-group">
    <label for="Name">Remarks</label>
    <input type="text" class="form-control" id="remarks"  value="<?php echo $row['Remarks'];?>" name="remarks" maxlength="30" aria-describedby="Name" placeholder="Remarks" required>
    
  </div>
  </div>
  <?php  
    $y = date("Y"); 
    $y1 = $y%100 ;
    $y2 = $y1 + 1;	
	$y3 = $y1 + 2;
  ?>
  <div class="col-lg-4">
   <div class="form-group">
    <label for="Year">Academic Year</label>
	<input type="text" class="form-control" id="Academicsyear1"  value="<?php echo $row['acadyear'];?>" name="ac" readonly />
    <select class="form-control" style="height:30px;width:250px;border:1px solid black;" id="Academicsyear" name="academicsyear">
		<option>Select Academic year</option>
		<option value="<?php echo ($y -1)."-".$y%100; ?>"><?php echo ($y -1)."-".$y%100; ?></option>
		<option value="<?php echo $y."-".$y2; ?>" selected ><?php echo $y."-".$y2; ?></option>
		<option value="<?php floor($y/100).$y2."-".$y3; ?>"><?php echo floor($y/100).$y2."-".$y3; ?></option>
    </select>
  </div>
  </div>
  </div>
  
   
	<script>
	
		// for showing drop downs
    function edit1(){
		document.getElementById('edit').style.display="none";
		var  someVarName = document.getElementById("empid").value;   
      document.cookie = "empid = "+someVarName;
	//alert("edit");
	  var dy2 = document.getElementById('routeno');
      var y2 = document.getElementById('boardingpoint');
	  var d2 = document.getElementById('file');
	  var c2 = document.getElementById('cam');
	  var acad2 = document.getElementById('Academicsyear');
	  var update = document.getElementById('update');
	  document.getElementById("routeno").value = document.getElementById('routeno1').value;
	  //document.getElementById("Designation").value = document.getElementById('designation1').value;
	  //document.getElementById("Department").value = document.getElementById('department1').value;
	  
	  var bp = "<?php echo $row['Boarding_point'];?>";
	  document.cookie = "bppoint = "+bp;
      getState(document.getElementById("routeno").value);
	  var up1 = document.getElementById('update');
	  var a4 = document.getElementById('Designation');
      var b4 = document.getElementById('Department');
      var b5 = document.getElementById('fee');
	  a4.style.display = "block";
	  b4.style.display = "block";
	  up1.style.display = "block";
	  update.style,display = "block";
	  acad2.style.display = "block";
	  c2.style.display = "block";
	  d2.style.display = "block";
	  dy2.style.display = "block";
	  y2.style.display = "block";
	  b5.style.display = "block";
	  y2.required = "false";

	  document.getElementById("facname").readOnly = false;
	  document.getElementById("designation1").readOnly =  false;
	  document.getElementById("mobile").readOnly = false;
	  document.getElementById("department1").readOnly = false;
	  document.getElementById("remarks").readOnly = false;	  
	  
	  var dy3 = document.getElementById('routeno1');
      var y3 = document.getElementById('boardingpoint1');
	
	  var acad3 = document.getElementById('Academicsyear1');
	  var sub = document.getElementById('sub');
	  var a6 = document.getElementById('designation1');
      var b6 = document.getElementById('department1');
      var b100 = document.getElementById('fee1');
	  a6.style.display = "none";
	  b6.style.display = "none";
	  //sub.style.display = "none";
	  acad3.style.display = "none";
	  
	  dy3.style.display = "none";
	  b100.style.display = "none";
	  y3.style.display = "none";
	}
  </script>
	     <div class="row">
  <!--
  <div class="col-lg-4">
  <div class="form-group">
   <input type="submit" id="sub" name="submit" value="verify" onClick="verify1()" class="btn btn-primary"/>
  </div>
  </div>
  <script>
    function verify1()
	{
		alert("Student verified successfully.");
	}
  </script>-->
  <div class="col-lg-5">
   <div class="form-group">
  </div>
  </div>
  <div class="col-lg-5">
   <div class="form-group"> 
   <input type="button" name="edit" id="edit" value="Edit" onClick="edit1();"	class="btn btn-primary"/> 
    <input type="submit" id="update" name="update" value="Update" onClick="update1();"  class="btn btn-primary"/>
  
  </div>
  </div>
  
  <div class="col-lg-1">
  <div class="form-group form-inline">
   
  </div>
  </div>
  </div>
  
  <script>
  function update1(){
	  var  val1 = 2;   
      document.cookie = "updatevaluef ="+val1;
	 // alert(document.getElementById['boardingpoint'].value);
  }
   </script>
  
</form>
    </div>
  
  
  
  
<?php endwhile;}}
}
 ?>


	
</div>
</div>

	 <?php if(isset($_POST['empid']) )
    { include('footer.php'); }
else
{?>
	 <div style="position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;">
	<?php include('footer.php');?>
  </div>
	<?php
}
 ?>
</body>
</html>
