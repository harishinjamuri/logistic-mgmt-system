
<?php 

/*
file name           : faculty.php
database connection : buspassdatabase
table               : faculty
purpose             : 
     when employee click on submit the data is inserted into faculty table only if the employee is        
                      not registetred already 
     

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
   
     <title>AGI- Logistic Mgmt | Employee Reg</title>
 

 <link rel="stylesheet" type="text/css" href="css/main.css">
   <script src="jquery-latest.min.js" type="text/javascript"></script>
   
   
   <!-- code for reading image -->
	<script>
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
 
	
	
    
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">


  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
<script src="jquery-3.2.1.min.js" type="text/javascript"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<script src="webcam.min.js"></script>




<!-- code for boadring points based on route number -->

<script>
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

<!-- code for amount based on Boarding point -->

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
    </head>
	<script>
	function call(){
var val = " ";

document.cookie = "bppoint = "+val;
  //alert(localStorage.getItem("status"));
	}
	</script>
	
<body onload="call()">
<div class="limiter" style="padding: 15px 0 50px 25px; ">
<p style="color:#116EB0;font-size:14px; "><a href="adminhome.php">Home > </a>Register ><a href="faculty.php"> Employee</a></p><br>
	
<div class="container" >


<script>
	
         function validate(){
			// alert("hi");
			 
			 //return false;
			 var img = document.getElementById('image');
			 var img1 = document.getElementById('image1');
			 
			 
			 if( img.value == "" && img1.value == "")
			 {
				 alert("Photo Not Found");
				 return false;
			 }
		 else
				 return true;
		 }	
		 
		
		</script>
		
		<!-- form starts -->
		<form name="form1" style="margin-left:150px;" action="faculty.php" method="POST" enctype="multipart/form-data"  onsubmit="return validate()">

 <div class="row">
	<div class="col-lg-4">
      <div class="form-group">
       <label for="rcpno">Employee ID</label>
        <input type="text" class="form-control" id="empid" name="empid" onchange="getwords()" pattern="[1-9][0-9]{4}" title="Invalid Employee Id" maxlength="5" placeholder="Employee Id" required />
      </div>
    </div>
	
	<script>
  
  $('#empid').on('keypress', function (event) {
	  
    var regex = new RegExp("^[0-9]");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
       event.preventDefault();
       return false;
    }
});
  </script>
  
  
	<script language='JavaScript'>
function getwords(){

ht = document.getElementById('empid');


document.cookie = "empid = "+ht.value;
	
  }
</script>
	
	<div class= "col-lg-4">
 <div class="form-group">
    <label for="Name">Name</label>
         <input type="text" class="form-control" id="facname" name="facname"  placeholder="Faculty Name" pattern="[A-Za-z ]{3,50}" title="No special characters, only characters of minimum 3 and maximum 30" maxlength="30"  required />
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
	<span style="margin:-10px 0px 0px 50px">
	<img id="blah" src="180.png" alt="your image" width="119" />
	 <input type="hidden" id="image1" name="image1" class="image-tag">
	 </span>
  </div>

  
    <div class="row">
    	<div class= "col-lg-4">
 <div class="form-group">
    <label for="Designation">Category</label>
    <select class="form-control" style="height:30px;width:250px;border:1px solid black;" id="Designation" name="Designation"  required/>
	<option value="-select-">-select-</option>
	<option value="TEACHING">TEACHING</option>
	<option value="NON TEACHING">NON TEACHING</option>
	<option value="OTHERS">OTHERS</option>

    </select>
  </div>
  </div>
  
  <div class= "col-lg-4">
 <div class="form-group">
    <label for="department">Department</label>
    <select class="form-control" style="height:30px;width:250px;border:1px solid black;" id="department" name="department">
<option value="SELECT">SELECT</option>
	<option value="CHEMICAL">CHEMICAL</option>
	<option value="CSE">CSE</option>
	<option value="CIVIL">CIVIL</option>
	<option value="ECE">ECE</option>
	<option value="EEE">EEE</option>
	<option value="IT">IT</option>
	<option value="MECH">MECH</option>
	<option value="ADMIN">ADMIN</option>
	<option value="H&amp;S">H&amp;S</option>
	<option value="MBA">MBA </option>
	<option value="PHARM"> PHARM</option>
    </select>
  </div>
  </div>
    	
  <div class="col-lg-4">
  
  <input type="file" name="image1" id="image" onchange="readURL(this);"  />&nbsp;&nbsp;
  <input id="button" type="button" value="Capture Image" style="border:1px solid #116EB0;width:250px;	
height:35px;color:white;background-color: #116eb0;" onclick="camcall();"/>

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
   <div class="col-lg-4">
  <div class="form-group">
  <label>Route Number</label><br/>
  <!-- code for getting routes --> 
<select name="routeno" id="routeno"  style="height:30px;width:250px;border:1px solid black;" class="form-control" onChange="getState(this.value);" required />
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
  <!-- code for getting Boarding points --> 
    <label for="bp">Boarding Point</label><br/>
	<select name="boardingpoint" id="boardingpoint"  style="height:30px;border:1px solid black;" class="form-control" onChange="getCity(this.value);"   required />
<option value="">Select Boarding point</option>

</select>
   
  </div>
  </div>
  
  <div class="col-lg-4" style="display:none">
   <div class="form-group">
    <label for="fee">Total Fee</label><br/>
    
  </div>
  
  </div>
  
 </div> 
  
  <div class="row">
  <div class="col-lg-4">
   <div class="form-group">
    <label for="fee">Total Fee</label><br/>
     <select name="fee" id="fee"  style="height:30px;width:250px;border:1px solid black;" class="form-control"  onChange="feepaid();">
</select>
  </div>
  
  </div>
  
  
		<div class= "col-lg-4">
  <div class="form-group">
    <label for="paid"> Paid </label>
  <input type="number" class="form-control" id="paid" onchange="feepaid()" name="paid"  placeholder=" " >
    
  </div>
  </div>
  
  <!-- code for calculating due -->
 <script> 
 function feepaid(){
	
	
e = document.getElementById('fee');
paidfee = document.getElementById('paid');
if(paidfee.value == 0){
	alert("Enter Valid Amount"); 
}else
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
      <input type="text"  class="form-control" id="Due" name="Due" readonly>
  </div>
  
</div>

    <div class="row">
  <div class="col-lg-4">
  <div class="form-group">
    <label for="Mobile">Mobile Number</label>
    <input type="text" class="form-control" pattern="[6789][0-9]{9}" title="Phone number starting with 6-9 and remaining 9 digit with 0-9" id="mobile" name="mobile" placeholder="Enter Mobile No" required>
    
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
    <input type="text" class="form-control" id="remarks" name="remarks" maxlength="30" aria-describedby="Name" placeholder="Remarks" required>
    
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
    <select class="form-control" style="height:30px;width:250px;border:1px solid black;" id="Academicsyear" name="academicsyear">
		<option>Select Academic year</option>
		<option value="<?php echo ($y -1)."-".$y%100; ?>"><?php echo ($y -1)."-".$y%100; ?></option>
		<option value="<?php echo $y."-".$y2; ?>" selected ><?php echo $y."-".$y2; ?></option>
		<option value="<?php floor($y/100).$y2."-".$y3; ?>"><?php echo floor($y/100).$y2."-".$y3; ?></option>
    </select>
  </div>
  </div>
  </div>
    
	<?php
require "init.php";
$empid="";
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
$total="";
$count1 = "";
$img = "";

$total="";
$due="";

if(isset($_POST['empid'])){
$target="img/".basename($_FILES['image1']['name']);
$image1=$_FILES['image1']['name'];
$empid=strtoupper($_POST['empid']);
$facname=strtoupper($_POST['facname']);
$designation=strtoupper($_POST['Designation']);
$department=strtoupper($_POST['department']);
$total=$_POST['fee'];
$due=$_POST['Due'];
$mobileno=strtoupper($_POST['mobile']);
$ay=$_POST['academicsyear'];
$boardingpoint=strtoupper($_POST['boardingpoint']);
$routeno=$_POST['routeno'];
$date= date("Y-m-d h:i:s");
$remarks=strtoupper($_POST['remarks']);
$usr = $_SESSION['username'];

$status = 0;

$img = $_POST['image1'];
if($image1 == "" )
if($img == "")
 {
	// echo "<script>alert('Photo Not Found');</script>";
	 $status = 1;
 }
else	
{
//echo "img ".$img."img ";
    $folderPath = "img/";
  
    $image_parts = explode(";base64,", $img);
    $image_type_aux = explode("img/", $image_parts[0]);
    //$image_type = $image_type_aux[1];
  
    $image_base64 = base64_decode($image_parts[1]);
    $fileName = $empid . '.png';
  
    $file = $folderPath . $fileName;
    file_put_contents($file, $image_base64);
    //echo $file;
    $image1 = $fileName;
	}

	
$msg="";
	
		$query=mysqli_query($conn,"SELECT * FROM `faculty` WHERE Employee_id='".$empid."'");
		$res=mysqli_fetch_row($query);
		if($res )
		{
			echo '<h5 style="color:red">Faculty already registered.</h5><br>';
			
echo "<script> alert('Faculty Already Registered.');</script>";
		}
		else if(isset($_POST['empid']) && $status != 1){ //echo $boardingpoint;echo $Course;echo $date;echo $department;echo $due;echo $Fname;echo $hallticket;echo $image;echo $mobile;echo $studname;echo $receipt;echo $remarks;echo $routeno;echo $total;echo $Year;
$sql = "INSERT INTO `faculty`(`Employee_id`, `Name`, `Designation`, `Department`, `Mobile_Number`, `Address`, `Email`,bpid, `Boarding_point`, `Route_no`, `Fee`, `Due`, `Receipt_Number`, `Date_of_Payment`, `Remarks`, `Idcard_status`, `image_of_faculty`,acadyear,appid,Verifiedby) 
VALUES ('".$empid."','".$facname."','".$designation."','".$department."','".$mobileno."',' ',' ',(SELECT bpid from bus_master where Boarding_point = '$boardingpoint' and Route_No = '$routeno'),'".$boardingpoint."','".$routeno."','".$total."','".$due."',' ','".$date."','".$remarks."','not print','".$image1."','".$ay."',' ','".$usr."')";

//echo $sql;

if(mysqli_query($conn, $sql) )
{
	echo '<h5 style="color:green">Faculty Registered Successfully.</h5><br>';
	
echo "<script> alert('Faculty Registered Successfully.');</script>";
	// the below code for activating webcam when value is 1.
	
	
	
	$query2=mysqli_query($conn,"SELECT empreg FROM dashboard");
    $res1=mysqli_fetch_array($query2);
	$count1 = $res1["empreg"] + 1 ;
	$sql1 = "UPDATE dashboard SET empreg = '".$count1."'";
	mysqli_query($conn,$sql1);
	/* code to deduct seats available */
	
	$query1=mysqli_query($conn,"SELECT * FROM route_master WHERE Route_no='".$routeno."'");
    $res1=mysqli_fetch_array($query1);
	$count1 = $res1["Counter"] - 1 ;
	$sql1 = "UPDATE route_master SET Counter = '".$count1."'  where Route_no = '".$routeno."'";
	mysqli_query($conn,$sql1);
}
else  if(!isset($_POST['empid']))
{
	echo '<h5 style="color:red">Unable to Register Faculty.</h5><br>';
		}}
if(move_uploaded_file($_FILES['image1']['tmp_name'],$target)){
	$msg="Image uploaded successfully";
}else
{
	$msg="There was a problem uploaded image";
}
/*$sql1="SELECT * FROM student";
$result=mysqli_query($conn,$sql1);
while($row=mysqli_fetch_array($result))
{
echo "<img src='img/".$row['image']."'>";

}


*/}
?>
    
	<div class="row">
  <div class="col-lg-5">

  </div>
  <div class="col-lg-5">
   <input type="submit" name="submit" value="Submit" class="btn btn-primary"/>
 
  </div>
   <div class="col-lg-1">
    
  </div>
  </div>

</form>
</div>
</div>
	<?php include('footer.php');?>
  
  
</body>
</html>
