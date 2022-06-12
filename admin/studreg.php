
<?php 

/*
file name           : student.php
database connection : buspassdatabase
table               : student
purpose             : 
     when employee click on submit the data is inserted into student table only if the student is        
                      not registetred already 
     

*/

?>



<?php include("nav.php");?>
<?php

/* code for route drop down */
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
   
   
     <title>AGI- Logistic Mgmt | Student Reg</title>
 
 
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
	
    
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  
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
	//alert(val);
	
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
input[type=number],[type=email]{	
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
	function call(){	var val = " ";

document.cookie = "bppoint = "+val;
  //alert(localStorage.getItem("status"));
	}
	</script>
	
<body onload="call()">
<div class="limiter" style="padding: 15px 0 50px 25px; ">
<p style="color:#116EB0;font-size:14px; "><a href="adminhome.php">Home > </a>Register ><a href="studreg.php"> Student</a></p><br>
	
<div class="container" >

<!-- form starts -->
		<script>
	
         function validate(){
			 //alert("hi");
			 
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
		<form name="form1" style="margin-left:80px;"  action="studreg.php" method="POST" enctype="multipart/form-data" onsubmit="return validate()">
		
 <div class="row">
	<div class="col-lg-4">
      <div class="form-group">
       <label for="rcpno">Receipt_Number</label>
        <input type="text" class="form-control" id="receipt" name="receipt"  placeholder="Receipt no" Maxlength="10"  required />
      </div>
    </div>
	
	
	<div class= "col-lg-4">
      <div class="form-group">
        <label for="Name">HallTicket number</label>
        <input type="text" class="form-control" id="hallticket" name="hallticket" maxlength="10" onChange="getwords()" placeholder="Enter hallticket"  pattern="[0-9]{2}[a-zA-Z][0-9]{2}[a-zA-Z][0-9]{2}[a-zA-Z0-9][0-9]" title="enter valid Hallticket" required />
      </div>
    </div>
	
	  
  
	<span style="margin:-10px 0px 0px 50px">
	<img id="blah" src="180.png" alt="your image" width="119" />
	<input type="hidden" name="image1" id="image1" class="image-tag">
	</span>
<script>

function done(){
    $('#snapshots').html("uploaded");
}
</script>

 <script>
  
  $('#hallticket').on('keypress', function (event) {
	  
    var regex = new RegExp("^[a-zA-Z0-9]");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
       event.preventDefault();
       return false;
    }
});
  </script>

<!-- code for finding details from hallticket -->

<script language='JavaScript'>
function getwords(){
myOutput= document.getElementById('Course');
ht = document.getElementById('hallticket');


document.cookie = "halltickethome = "+ht.value;

if (ht.value != "")
{  var str =  ht.value;
   var res =  str.substr(0, 2);    //for calculating year
   var d = new Date();

   var d1 = d.getFullYear();
   var year = d1%100;                      //calculate the year from date
   var dy = document.getElementById('detainyear');
     var dy1 = document.getElementById('year1');
    var d2 = d.getMonth(); 
	   if(d2<5)
		year = year -1; 
   if((year-res +1)>4)
    {   
        document.getElementById("YES").checked = true;
        document.getElementById('Year').value = " ";
		dy.style.display = "block";
		dy1.style.display = "none";
		
	} 
   else
   { 
     document.getElementById("NO").checked = true;
     document.getElementById('Year').value = year-res +1;
     dy.style.display = "none";
     dy1.style.display = "block";
   }
 // myOutput.value=textbox.value;
 if(str.substr(5, 1) == 'A'||str.substr(5,1) == 'a'){
 
 var branch = str.substr(6, 2);
 document.getElementById('department').value = branch;
 switch (branch)
            {   
                case '01': document.getElementById('Course').value = "B TECH";  document.getElementById('department').value = "CIVIL"; break;
                case '02': document.getElementById('Course').value = "B TECH";  document.getElementById('department').value = "EEE";  break;
                case '03': document.getElementById('Course').value = "B TECH";  document.getElementById('department').value = "MECH"; break;
                case '04': document.getElementById('Course').value = "B TECH";  document.getElementById('department').value = "ECE"; break;
                case '05': document.getElementById('Course').value = "B TECH";  document.getElementById('department').value = "CSE"; break;
                case '08': document.getElementById('Course').value = "B TECH";  document.getElementById('department').value = "CHEM"; break;
                case '12': document.getElementById('Course').value = "B TECH";  document.getElementById('department').value = "IT"; break;
                default:document.getElementById('hallticket').value = ""; document.getElementById('Course').value = "";   document.getElementById('department').value = "";  alert('<?php echo "Invalid Hall Ticket Number";?>');
   }
 }else  if(str.substr(5, 1) == 'R'||str.substr(5,1) == 'r'){
	 var branch = str.substr(6, 2);
 document.getElementById('department').value = branch;
 switch (branch){
	 case '00': document.getElementById('Course').value = "B PHARM";   document.getElementById('department').value = "B PHARM"; break;
     default:document.getElementById('hallticket').value = ""; document.getElementById('Course').value = "";   document.getElementById('department').value = "";  alert('<?php echo "Invalid Hall Ticket Number";?>');
	}
 }
 else if(str.substr(5, 1) == 'S'||str.substr(5,1) == 's'){
	 var branch = str.substr(6, 2);
 document.getElementById('department').value = branch;
 switch (branch){
	 case '01':
     case '02':	
     case '03':  document.getElementById('Course').value = "M PHARM";   document.getElementById('department').value = "M PHARM"; break;
     default: document.getElementById('hallticket').value = ""; document.getElementById('Course').value = "";   document.getElementById('department').value = "";  alert('<?php echo "Invalid Hall Ticket Number";?>');
	}
 }
 else if(str.substr(5, 1) == 'T'||str.substr(5,1) == 't'){
	 var branch = str.substr(6, 2);
 document.getElementById('department').value = branch;
 switch (branch){
	 case '01':
     case '02':	
     case '03':  document.getElementById('Course').value = "PHARM D";   document.getElementById('department').value = "PHARM D"; break;
     default: document.getElementById('hallticket').value = "";document.getElementById('Course').value = "";   document.getElementById('department').value = "";  alert('<?php echo "Invalid Hall Ticket Number";?>');
	}
 }
 else if(str.substr(5, 1) == 'D'||str.substr(5,1) == 'd'){
	 var branch = str.substr(6, 2);
 document.getElementById('department').value = branch;
 switch (branch){
	 case '01':
     case '02':	
     case '03':  document.getElementById('Course').value = "M Tech";   document.getElementById('department').value = "M Tech"; break;
     default:document.getElementById('hallticket').value = "";document.getElementById('Course').value = "";   document.getElementById('department').value = ""; alert('<?php echo "Invalid Hall Ticket Number";?>');
	}
 }
 else if(str.substr(5, 1) == 'E'||str.substr(5,1) == 'e'){
	 var branch = str.substr(6, 2);
 document.getElementById('department').value = branch;
 switch (branch){
	 case '01':
     case '02':	
     case '03':  document.getElementById('Course').value = "MBA";   document.getElementById('department').value = "MBA"; break;
     default:document.getElementById('hallticket').value = "";document.getElementById('Course').value = "";   document.getElementById('department').value = "";  alert('<?php echo "Invalid Hall Ticket Number";?>');
	}
 }
 else{
	 document.getElementById('hallticket').value = "";
	 alert('<?php echo "Invalid Hall Ticket Number";?>');
 }
}
else
alert('<?php echo "No word has been entered!";?>');
}
</script>

  </div>
 
    <div class="row">
  
    	<div class= "col-lg-4">
 <div class="form-group">
    <label for="Name">Name</label>
         <input type="text" class="form-control" id="studname" name="studname"  pattern="[A-Za-z ]{3,}" title="No special characters, only characters of minimum 3 and maximum 30" maxlength="30"  placeholder="Student Name" required />
    
  </div>
  </div>
  
    <script>
  
  $('#studname').on('keypress', function (event) {
	  
    var regex = new RegExp("^[a-zA-Z ]");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
       event.preventDefault();
       return false;
    }
});
  </script>
  
  
    	<div class= "col-lg-4">
 <div class="form-group">
    <label for="Father's name">Father's name</label>
      <input type="text" class="form-control" id="Fname" name="Fname" placeholder="Father Name" pattern="[A-Za-z ]{3,}" title="No special characters, only characters of minimum 3 and maximum 30" maxlength="30"  required />
     
  </div>
  </div>
  
      <script>
  
  $('#Fname').on('keypress', function (event) {
	  
    var regex = new RegExp("^[a-zA-Z ]");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
       event.preventDefault();
       return false;
    }
});
  </script>
  
  
  <div class="col-lg-4">
  
  <input type="file" id = "image" name="image" onchange="readURL(this);"  />                                     
  <input id="button" type="button" value="Capture Image" style="border:1px solid #116EB0;width:250px;	
height:35px;color:white;background-color: #116eb0;" onclick="camcall();"/>
  </div>
 </div><br/>
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
    </script>
  
 
  <div class="row">
  
    	<div class= "col-lg-4">
 <div class="form-group">
    <label for="course">Course</label>
    <input type="text" class="form-control" id="Course" name="Course" readonly />
	
  </div>
  </div>
  
    	<div class= "col-lg-4">
 <div class="form-group">
    <label for="Department">Department</label>
    <input type="text" class="form-control" id="department" name="department" readonly />
	
  </div>
  </div>
  
   <div class="col-lg-4">
   <div class="form-group">
    <label for="Year" >Year</label>
    <input type="text" class="form-control" id="Year" name="Year" readonly />
		
  </div>
  </div>
 </div>
 
    <div class="row">
<div class="col-lg-4">
  <div class="form-group">
    <label for="Mobile">Mobile Number</label>
    <input type="text"id="mobile" class="form-control" pattern="[6789][0-9]{9}" title="Phone number starting with 6-9 and remaining 9 digit with 0-9" id="mobile" name="mobile" placeholder="Enter Mobile No" maxlength="10"  required>
    
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
  
  <div class= "col-lg-4">
  
    
    <label class="Detain" >Detained ?<div class="form-group form-inline" style="margin-top:5px;">
    <input type="radio" class="form-control" id="YES" name="Detain" onChange="detainyes()"	value="YES">&nbsp;&nbsp;YES </label>&nbsp;&nbsp;
	    <label class="Detain">

	<input type="radio" class="form-control" id="NO" name="Detain" onchange="detainno()" value="NO">&nbsp;&nbsp;NO
	</label>
	
	
	<!-- code for changing detained values -->
<script language='JavaScript'>
function detainyes()
{ var dy = document.getElementById('detainyear');
	 if(document.getElementById("YES").checked == true)
	  {
		  dy.style.display = "block";
	  }
}


function detainno()
{ var dy = document.getElementById('detainyear');
	 if(document.getElementById("NO").checked == true)
	  {
		  dy.style.display = "none";
	  }
}

</script>
	    
   </div>
  </div>
  
  <div class="col-lg-4" id="detainyear" style="display:none;">
   <div class="form-group" >
    <label for="dYear" >Current Year</label>
    <input type="text" class="form-control" id="dYear" name="dYear" placeholder="enter current year" />
		
  </div>
  </div>
  </div>
  
  <div class="row">
   <div class="col-lg-4">
  <div class="form-group">
  <label>Route Number</label><br/>
   <!-- code for getting routes --> 
<select name="routeno" id="routeno"  style="height:30px;width:250px;border:1px solid black;" class="form-control" onChange="getState(this.value);">
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
 
 <!-- code for getting boardingpoint values -->
 <div class="col-lg-7">
  <div class="form-group">
    <label for="bp">Boarding Point</label><br/>
	<select name="boardingpoint"  style="height:30px;border:1px solid black;" id="boardingpoint" class="form-control" onChange="getCity(this.value);">


</select>
   
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
  <input type="number" class="form-control" id="paid" onchange="feepaid()" name="paid"  placeholder=" " required>
    
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
    <select class="form-control"  style="height:30px;width:250px;border:1px solid black;" id="Academicsyear" name="academicsyear">
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

$hallticket="";
$studname="";
$Fname="";
$department="";
$mobile="";
$Course="";
$Year="";
$total="";
$due="";
$boardingpoint="";
$routeno="";
$detain="";
$receipt="";
$date="";
$remarks="";
$idcard="";
$image = "";
$count1 = "";
$count2 = "";
$img = "";


if(isset($_POST['hallticket'])){
$target="img/".basename($_FILES['image']['name']);
$image=$_FILES['image']['name'];
$hallticket=strtoupper($_POST['hallticket']);
$studname=strtoupper($_POST['studname']);
$Fname=strtoupper($_POST['Fname']);
$department=strtoupper($_POST['department']);
$mobile=$_POST['mobile'];
$Course=strtoupper($_POST['Course']);
$Year=$_POST['Year'];
$total=$_POST['fee'];
$due=$_POST['Due'];
$boardingpoint=strtoupper($_POST['boardingpoint']);
$routeno=$_POST['routeno'];
$detain=strtoupper($_POST['Detain']);
$receipt=strtoupper($_POST['receipt']);
$date= date("Y-m-d h:i:s");
$remarks=strtoupper($_POST['remarks']);
$ay = strtoupper($_POST['academicsyear']);
$usr = $_SESSION['username'];
if($detain == 'YES')
	$Year = $_POST['dYear'];



$status = 0;

$img = $_POST['image1'];
if($image == "" )
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
    $fileName = $hallticket . '.png';
  
    $file = $folderPath . $fileName;
    file_put_contents($file, $image_base64);
    //echo $file;
    $image = $fileName;
	}

	

$msg="";




	
		$query=mysqli_query($conn,"SELECT * FROM `student` WHERE HallticketNumber='".$hallticket."'");
		$res=mysqli_fetch_row($query);
		if($res )
		{
		

echo '<h5 style="color:red">Student Already registered.</h5><br>';
echo "<script> alert('Student Already registered.');</script>";
			
		}
		else if(isset($_POST['hallticket']) && $status !=1  ){ //echo $boardingpoint;echo $Course;echo $date;echo $department;echo $due;echo $Fname;echo $hallticket;echo $image;echo $mobile;echo $studname;echo $receipt;echo $remarks;echo $routeno;echo $total;echo $Year;
$sql = "INSERT INTO student (HallticketNumber,Name,Father_Name,Department_Name,Mobile_Number,Email,Address,Course,Year,Total,Due,bpid,Boarding_point,Route_no,Detain,Receipt_Number,Date_of_Payment,Remarks,idcard_status,imageofstudent,acadyear,appid,verifiedby,`concession`,`cona_amount`) VALUES
 ('$hallticket','$studname','$Fname','$department','$mobile',' ',' ','$Course','$Year','$total','$due',(SELECT bpid from bus_master where Boarding_point = '$boardingpoint' and Route_No = '$routeno'),'$boardingpoint','$routeno','$detain','$receipt','$date','$remarks','not print','$image','$ay',' ','$usr','no','0')";
 //echo $sql;
if(mysqli_query($conn, $sql) )
{
	echo '<h5 style="color:green">Student Registered Successfully.</h5><br>';
	
echo "<script> alert('Student Registered Successfully.');</script>";
	
	$query2=mysqli_query($conn,"SELECT studreg FROM dashboard");
    $res1=mysqli_fetch_array($query2);
	$count2 = $res1["studreg"] + 1 ;
	$sql1 = "UPDATE dashboard SET studreg = '".$count2."'";
	mysqli_query($conn,$sql1);
	
		
		/* code to deduct seats available */
	$query1=mysqli_query($conn,"SELECT * FROM route_master WHERE Route_no='".$routeno."'");
    $res1=mysqli_fetch_array($query1);
	$count1 = $res1["Counter"] - 1 ;
	$sql1 = "UPDATE route_master SET Counter = '".$count1."'  where Route_no = '".$routeno."'";
	mysqli_query($conn,$sql1);
	//echo $_POST['hallticket']."sdjkbvjk";
//	unset($_POST);
//	echo $_POST['hallticket'];
	echo '<script type="text/javascript">

 //alert("reset");
 document.getElementById("form1").reset();

</script>';

}
else  
{
	echo '<h5 style="color:red">Unable to Register Student. Duplicate Receipt Number</h5><br>';
		}}
if(move_uploaded_file($_FILES['image']['tmp_name'],$target)){
	$msg="Image uploaded successfully";
}else
{
	$msg="There was a problem uploaded image";
}}
?>


    
	<div class="row">
  <div class="col-lg-5">

  </div>
  <div class="col-lg-5">
     <div class="col-lg-4" style="display:none;"> 
  <input type="button" id="printreg" name="submit" value="Print Form" style="<?php if(isset($_POST['hallticket']) ){ echo "display:block";}else echo "display:none"; ?>;" onclick="receiptreg()" class="btn btn-primary"/>
</div>

<input type="submit" name="submit" value="Submit" class="btn btn-primary"/>
 
  </div>
   <div class="col-lg-1">
     
  </div>
  </div>
  

  <script>
  
function receiptreg(){
	document.getElementById('show1').style.display = "none";

window.open('formprint.php', '_blank', 'toolbar=yes,scrollbars=yes,resizable=yes,top=250,left=500,width=1215,height=680');
	
 //document.getElementById('print').style.display = "none";
}

 
  </script>
  <!--
    <div class="col-lg-4" style="display:none;">
  <input type="button" id="print" name="submit" value="print receipt" style="<?php if(isset($_POST['hallticket'])){ echo "display:block";}else echo "display:none"; ?>;" onclick="receiptprint()" class="btn btn-primary"/>
</div>
  </div>-->
  <script>
  
function receiptprint(){ 
window.open('receipt1.php', '_blank', 'toolbar=yes,scrollbars=yes,resizable=yes,top=250,left=500,width=1215,height=680');

 //document.getElementById('print').style.display = "none";
}

  </script>


</div>
 
</form>
</div>

	<?php include('footer.php');?>
  <script type="text/javascript">

 //alert("reset");
 //document.getElementById("form1").reset();

</script>
  
</body>
</html>
