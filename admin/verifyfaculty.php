
<?php 

/*
file name           : verifyfaculty.php
database connection : buspassdatabase
table               : faculty, faculty_dup, and  dashboard
purpose             : 

     The functionality of this page is to verify employee registration
	 
	 there are two functionalities
	 1) accepting registration
	 2) rejecting registration
	 

	 In the first functionality the data is inserted into faculty table , deleted from
	 faculty_dup and facreg counter is incremented in dashboard table
	 
	 
	 In the second functionality the data is permanently from database.
	 

*/

?>

<?php
require_once('init.php');
$rowCount = "";
 if(!isset($_POST['empid'])){  /* for retrieving data from student entry  
    
    data retrieving starts
 
 */

	
$row1=mysqli_query($conn,"SELECT * FROM `faculty_dup` WHERE Employee_id='".$_POST['hallticket']."'");

$rowCount = mysqli_num_rows($row1);

if($rowCount == null )   /* condition for checking if the user data doesn't exist */
  {
	  echo "<h5 style='color:red;'>Employee not registered</h5>";
}
else{
//echo "<script>alert(localStorage.getItem('htno'));alert(localStorage.getItem('htno1'));</script>";

/* executes when the data of student is present */

 while($row = mysqli_fetch_array($row1)):
 

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
   <link rel="stylesheet" href=" styles.css">
   
   <title>AGI- Logistic Mgmt | Employee Reg</title>
   
   <link rel="stylesheet" type="text/css" href=" css/main.css">
   <script src="jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
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
   
    
 
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">


  <link href=" lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <link href=" lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href=" lib/animate/animate.min.css" rel="stylesheet">
<script src="jquery-3.2.1.min.js" type="text/javascript"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>


<script src="webcam.min.js"></script>





<script>



<!-- code for boadring points based on route number -->
function getState(val) {
	$.ajax({
	type: "POST",
	url: " getState.php",
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

}
input[type=text]{	
	border:thin solid black;
	height:35px;
	width:250px;
}
input[type=numeric],[type=email],[type=number]{	
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

#camera {
  width: 100%;
  height: 350px;
}
    </style>
    </head>
<script>
	function call(){
 
var val = "<?php echo $row['Boarding_point'] ;?>";

document.cookie = "bppoint = "+val;  //for getting boardingpoint values

 getState(<?php echo $row['Route_no'];?>);

var ht = "<?php echo $row['Employee_id']?>";
document.cookie = "empid = "+ ht; // for printing receipt

	}
	</script>
	
<body onload="call()">

<div class="limiter">
		<div class="container-login100" style="align:center">
<form name="form1" action="verify.php" method="POST" enctype="multipart/form-data">
		<h5 align="center">Employee Veification Form</h5><br>
 <div class="row">
	<div class="col-lg-4">
      <div class="form-group">
       <label for="rcpno">Employee ID</label>
        <input type="text" class="form-control" id="empid" name="empid" value="<?php echo $row['Employee_id'];?>" pattern="[1-9][0-9]{4}" title="Invalid Employee Id" maxlength="5" placeholder="Employee Id" readonly />
      </div>
    </div>
	<div class= "col-lg-4">
 <div class="form-group">
    <label for="Name">Name</label>
         <input type="text" class="form-control" id="facname" name="facname" value="<?php echo $row['Name'];?>"  placeholder="Employee Name" pattern="[A-Za-z ]{3,50}" title="No special characters, only characters of minimum 3 and maximum 30" maxlength="30"  required />
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
	
	<img id="blah" src="img/<?php echo $row['image_of_faculty'];?>" alt="your image" width="119" />
	<input type="hidden" name="image3" class="image-tag">
	</span>
  </div>
  
    <div class="row">
    	<div class= "col-lg-4">
 <div class="form-group">
    <label for="Department">Category</label>
    <select class="form-control" id="department" style="height:30px;width:250px;border:1px solid black;" name="Designation">
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
  </div>
  </div>
    	
  <div class="col-lg-4">
  
  <input type="file" name="image1" onchange="readURL(this);"  />&nbsp;&nbsp;
  <input type="hidden" name="image2" value="<?php echo $row['image_of_faculty'];?>">
    <input id="cam" type="button" value="Capture Image" style="border:1px solid #116EB0;width:250px;	
height:35px;color:white;background-color: #116eb0;" onclick="camcall();"/>
  </div>
  </div>
  
  
  
   <div class="modal" id="show" >
   <input type="button" id="clickclose" class="close" style="background-color:transparent;margin-right:10px;color:black;height:20px;width:15px;"  value="X" />
   <div id="my_camera" ></div>
		
			    <input type="button" class="btn btn-success" value="Take Snapshot" onClick="take_snapshot()">
             
  </div>
  
  <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
    
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
  
 $('#show').delay(10).fadeIn();

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
    <label for="Mobile">Mobile Number</label>
    
   <input type="text" class="form-control" pattern="[6789][0-9]{9}" title="Phone number starting with 6-9 and remaining 9 digit with 0-9" id="mobile" name="mobile" placeholder="Enter Mobile No" value="<?php echo $row['Mobile_Number'];?>" required>
   </div></div>
   
   
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
    <label for="Email">Email</label>
    <input type="email" class="form-control" id="email" maxlength="50" name="email" placeholder="Enter Email" value="<?php echo $row['Email'];?>" required>
    
  </div>
  </div>
  <div class="col-lg-4">
  <div class="form-group">
    <label for="Address">Address</label>
    <input type="text" class="form-control" id="address" maxlength="90" name="address" placeholder="Your Address" value="<?php echo $row['Address'];?>"  required>
 <p style="color:red;">special character ',/ not allowed</p>
   </div> 
  </div>
  
  
   <!-- code for removing not allowed values -->
	<script>
    
 $('body').on('input', 'input[name=address]', function() {
	 $ap = "'";
  $(this).val($(this).val().replace('/', ' '));
  $(this).val($(this).val().replace($ap, ' '));
});
  </script>
	
  </div>
  
  <div class="row">
   <div class="col-lg-4">
  <div class="form-group">
  <label>Route Number</label><br/>
  
<select name="routeno" id="routeno" class="form-control" style="height:30px;width:250px;border:1px solid black;" onChange="getState(this.value);">
<option value disabled selected>Select Route</option>
  

<?php
foreach($results as $country) {
?>
<option value="<?php echo $country["Route_No"]; ?>" <?php if($row['Route_no'] == $country['Route_No']) echo "selected"; ?>  ><?php echo $country["Route_No"]; ?></option><?php
}
?>
</select>

  </div>
  </div>
 
 <div class="col-lg-7">
  <div class="form-group">
    <label for="bp">Boarding Point</label><br/>
	<select name="boardingpoint" id="boardingpoint" style="height:30px;border:1px solid black;" class="form-control" onChange="getCity(this.value);">
<option value="">Select Boarding point</option>

</select>
   
  </div>
  </div>
  
  
  
 </div> 
  
    <div class="row">
	
	 <div class="col-lg-4" >
   <div class="form-group">
    <label for="fee">Total Fee</label><br/>
     <select name="fee" id="fee" style="height:30px;width:250px;border:1px solid black;" value="<?php echo $row['Fee'];?>" class="form-control"  onChange="feepaid();">
</select>
  </div>
  
  </div>
  
  <div class= "col-md-4">
  <div class="form-group">
    <label for="paid"> Paid </label>
  <input type="number" class="form-control" id="paid" onChange="feepaid()" name="paid"  placeholder=" "  />
    
  </div>
  </div>
  
  <!-- code for calculating due -->
  
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
else
alert('<?php echo "No word has been entered!";?>')

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
    <label for="Name">Remarks</label>
    <input type="text" class="form-control" id="remarks" name="remarks" maxlength="30" value="<?php echo $row['Remarks'];?>" aria-describedby="Name" placeholder="Remarks" required>
    
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
		<option value="<?php echo ($y -1)."-".$y%100; ?>" <?php if(($y -1)."-".$y%100 == $row['acadyear']) echo 'selected'; ?>  ><?php echo ($y -1)."-".$y%100; ?></option>
		<option value="<?php echo $y."-".$y2; ?>" <?php if($y."-".$y2 == $row['acadyear']) echo 'selected'; ?> ><?php echo $y."-".$y2; ?></option>
		<option value="<?php echo floor($y/100).$y2."-".$y3; ?>" <?php if(floor($y/100).$y2."-".$y3 == $row['acadyear']) echo 'selected'; ?>   ><?php echo floor($y/100).$y2."-".$y3; ?></option>
    </select>
  </div>
  </div>
  </div>
    

    
	
 <div class="row">
  <div class="col-lg-6">
 
 </div>
  <div class="col-lg-1">
  <input type="submit" name="submit" value="Submit" class="btn btn-primary"/>
 </div>
 <div class="col-lg-3">
 </div>
 
  <div class="col-lg-1">
  <input type="submit" id="dec" name="submit1" value="Decline" class="btn btn-primary" onclick="declinefuc()" />
  <input type="hidden" name="decline" id="decline" value="0">
 </div>
 
 
  <script>
    function declinefuc(){
		document.getElementById('decline').value = '1';
		//alert(document.getElementById('decline').value);
		
		
	}
 
 </script>
 
   <!-- code for printing receipt 
  <div class="col-lg-4">
  <input type="button" id="print" name="submit" value="print receipt" style="<?php if(isset($_POST['hallticket'])){ echo "display:block";}else echo "display:none"; ?>;" onclick="receiptprint()" class="btn btn-primary"/>
</div>-->
  </div>
  <script>
  
function receiptprint(){ 
window.open(' receipt1.php', '_blank', 'toolbar=yes,scrollbars=yes,resizable=yes,top=250,left=500,width=1215,height=680');

 //document.getElementById('print').style.display = "none";
}

 
  </script>
  
  
  
  </div>

</div>
 
</form>
<!-- form ends -->

</div>

</body>
</html>
<?php
endwhile;} }



require_once("init.php");
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
$email = "";
$address = "";
$ay="";
$count1 = "";
$apid =" ";
$total = "";
$decline = "";
$image1 = "";
$img = "";

if(isset($_POST['submit1'])){
$decline = $_POST['decline'];
$hallticket=strtoupper($_POST['empid']);
if($decline == 1){
		     
			 $status = mysqli_query($conn,"delete from faculty_dup where Employee_id = '$hallticket'");
			 if($status == true) echo '<h5 style="color:green">Data Deleted Successfully.</h5><br>';
			 
			 
			 $query1=mysqli_query($conn,"SELECT empdec FROM dashboard");
    $res1=mysqli_fetch_array($query1);
	$count1 = $res1["empdec"] + 1 ;
	$sql1 = "UPDATE dashboard SET empdec = '".$count1."'";
	mysqli_query($conn,$sql1);
			 
		}
}


if(isset($_POST['empid']) && !isset($_POST['submit1'])){
$target="img/".basename($_FILES['image1']['name']);
$image1=$_FILES['image1']['name'];
$empid=strtoupper($_POST['empid']);
$facname=strtoupper($_POST['facname']);
$designation=strtoupper($_POST['Designation']);
$department=strtoupper($_POST['Department']);
$total=$_POST['fee'];
$mobileno=strtoupper($_POST['mobile']);
$address=strtoupper($_POST['address']);
$email=strtoupper($_POST['email']);
$ay=$_POST['academicsyear'];
$boardingpoint=strtoupper($_POST['boardingpoint']);
$routeno=$_POST['routeno'];
$date= date("Y-m-d h:i:s");
$remarks=strtoupper($_POST['remarks']);
$usr = $_SESSION['username'];

$msg="";




$status = 0;

if($image1 == "")
	$image1 = $_POST['image2'];  /* is user doesn't upload new image */

	
	
$img = $_POST['image3'];
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

	

	
	
		$query=mysqli_query($conn,"SELECT * FROM `faculty` WHERE Employee_id='".$empid."'");
		$query1=mysqli_query($conn,"SELECT * FROM `faculty` ");
		$res=mysqli_fetch_row($query);
		
		if($res)
		{
			echo '<h5 style="color:red">Faculty already Registered.</h5><br>';
			
			
		}
		else if($status != 1){ // echo $boardingpoint;echo $date;echo $department;echo $facname;echo $image;echo $mobileno;echo $empid;echo $remarks;echo $routeno;echo $ay;
		
		
		$num_of_rows = mysqli_num_rows($query1) + 1 ;
		$apid = "E".(string)(date("Y")*10000+sprintf("%04d", $num_of_rows));
		
		//echo $apid;
$sql = "INSERT INTO `faculty`(`Employee_id`, `Name`, `Designation`, `Department`, `Mobile_Number`, `Address`, `Email`,`bpid`, `Boarding_point`, `Route_no`, `Fee`, `Due`, `Receipt_Number`, `Date_of_Payment`, `Remarks`, `Idcard_status`, `image_of_faculty`, `acadyear`,`appid`,`Verifiedby`)
VALUES ('".$empid."','".$facname."','".$designation."','".$department."','".$mobileno."','".$address."','".$email."',(SELECT bpid from bus_master where Boarding_point = '$boardingpoint' and Route_No = '$routeno'),'".$boardingpoint."','".$routeno."','".$total."','0',' ','".$date."','".$remarks."','not print','".$image1."','".$ay."','".$apid."','".$usr."')";

 //echo $sql;

if(mysqli_query($conn, $sql) )
{
	
	/* for displaying appid in alert */
	echo '<h5 style="color:green">Faculty Registered Successfully.</h5><br>';
	
	
	
	$message = 'Your step 1 of registration has been successful. Please note the reference Number :'.$apid.'. \r\n Step 2: Please visit the counter and submit the reference number.';
  //echo "<script type='text/javascript'>alert('$message');</script>";
	
	$query2=mysqli_query($conn,"SELECT empver FROM dashboard");
    $res1=mysqli_fetch_array($query2);
	$count1 = $res1["empver"] + 1 ;
	$sql1 = "UPDATE dashboard SET empver = '".$count1."'";
	mysqli_query($conn,$sql1);
			 
		
	
	$query1=mysqli_query($conn,"SELECT * FROM `route_master` WHERE Route_No='".$routeno."'");
    $res1=mysqli_fetch_array($query1);
	$count1 = $res1["Counter"] - 1 ;
	$sql1 = "UPDATE route_master SET Counter = '".$count1."'  where Route_No = '".$routeno."'";
	mysqli_query($conn,$sql1);
     
	
    /*  deleting the data from duplicate table */	
	 
	mysqli_query($conn,"delete from faculty_dup WHERE Employee_id='".$empid."'"); 
	
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