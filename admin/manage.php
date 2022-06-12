
<?php 

/*
file name           : manage.php
database connection : buspassdatabase
table               : student, faculty, faculty_backup, student_backup and  route_master
purpose             : 

     The functionality of this page is to manage the data 
	 
	 there are four functionalities 
	 1) deleting student and employee data 
	 2) reseting the no of seats filled in each route to zero
	 3) replacing the routes pdf file.
	 4) downloading the backup student/employee data.

	 In the first functionality the data deleted from student and faculty tables 
	 and inserted into student_backup and faculty_backup tables.
	 
	 In the second functionality the counter in the route_master table is set to ZERO.
	 
	 In the fourth the data is retrieved from student/faculty table and exported to 
	 excel sheet for future reference.   	 
	 

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

   <title>AGI- Logistic Mgmt | Data Management</title>
   <link rel="stylesheet" type="text/css" href="css/main.css">
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
    <title>AGI-Bus Pass</title>
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
}
input[type=text]{	
	border:thin solid black;
	height:30px;
	width:200px;
	align:center;
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

span p{
	font-size:14px; 
	color:#000;
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
  border-right:1px solid black;
  height: 65vh; 
  
}
    </style>
    </head>
<body>

<?php include("nav.php");?>


<div class="wrap">   <!-- div occupies entire place between nav and footer -->
   
    <div class="right">  <!-- div for occupying right half  -->
      <div style="height: auto;">
       <div style="margin-top:50px;">
	     
	       <form name="form1" style="margin-left:80px;"  action="manage.php" method="POST" enctype="multipart/form-data" onsubmit="validate()">
          <p style="color:red;" >*Caution: using this option will delete entire data </p>
            <br/><br/>  		  
		  
		  <h5 > Select the data to be Deleted.</h5>
		   <br>
		   <input type="checkbox" id="dell" name="dell[]" value="Student"  > <span style="font-size: 14px;">Student</span><br>
		   <!--  onchange=" if(this.checked != false){var a = confirm(' Are you sure to delete student data?');  if(!a) this.checked = false;}"  -->
		   
		   
           <input type="checkbox" id="dell1" name="dell[]" value="Faculty"> <span style="font-size: 14px;">Employee</span><br>
		   <!-- onchange="if(this.checked != false){var a = confirm('  Are you sure to delete Employee data?');  if(!a) this.checked = false;}" --> 
		   
		   <br/>
		   <div class="form-group form-inline" >Would you like to reset the dashboard ?&nbsp;&nbsp;&nbsp;&nbsp;<label>
    <input type="radio" class="form-control" id="YES" name="dashboard"   value="YES">&nbsp;&nbsp;Yes </label>&nbsp;&nbsp;
	    <label class="Detain">

	<input type="radio" class="form-control" id="NO" name="dashboard"  value="NO">&nbsp;&nbsp;No
	</label>
	
	<script>
	
	function validate(){
		
		if(document.getElementById('dell').checked)
		{var a = confirm(' Are you sure to delete student data?'); 
		 if(!a) document.getElementById('dell').checked = false;
		}
		
		if(document.getElementById('dell1').checked)
		{var a = confirm(' Are you sure to delete Employee data?'); 
		 if(!a) document.getElementById('dell1').checked = false;
		}
		
	 if(document.getElementById("YES").checked == true)
	  {
		 var a = confirm(" Are you sure to reset Dashboard?");
		  if(!a)
             document.getElementById("NO").checked = true;
	  }
}

/*
function dashboardno()
{ 
	 if(document.getElementById("NO").checked == true)
	  {
		  document.getElementById("YES").checked == false;
	  }
}
*/
</script>
	    </div>
		   
		  
		   <input type="submit"  value="Submit" class="btn btn-primary"/>
	<br/><br/><br/>	   
		   <?php
	
if(isset($_POST['dell'])){
$name = $_POST['dell'];
require_once('init.php');
foreach ($name as $color){ 
    //echo $color."<br />";
	if($color == 'Student')
	{
    mysqli_query($conn,"INSERT INTO student_backup SELECT * from student");
	$query=mysqli_query($conn,"SELECT * FROM `student`");
    while($row = mysqli_fetch_array($query)){
	$filename = "img/".$row['imageofStudent'];
  if (file_exists($filename)) {
    unlink($filename);
   // echo 'File '.$filename.' has been deleted';
  } else {
    //echo 'Could not delete '.$filename.', file does not exist';
  }
	
	}
	
	mysqli_query($conn,"delete from student");
	echo '<h6 style="color:green">Student Data Deleted Successfully.</h6></br>';
	
	
	}
   
    if($color == 'Faculty')
	{
    mysqli_query($conn,"INSERT INTO faculty_backup SELECT * from faculty");
	$query=mysqli_query($conn,"SELECT * FROM `faculty`");
    while($row = mysqli_fetch_array($query)){
	$filename = "img/".$row['image_of_faculty'];
  if (file_exists($filename)) {
    unlink($filename);
   // echo 'File '.$filename.' has been deleted';
  } else {
    //echo 'Could not delete '.$filename.', file does not exist';
  }
	
	mysqli_query($conn,"delete from faculty");
	echo '<h6 style="color:green">Faculty Data Deleted Successfully.</h6></br>';
	}   	
   }
}
}

if(isset($_POST['dashboard'])){
    if($_POST['dashboard'] == "YES")
	{
		mysqli_query($conn,"UPDATE `dashboard` SET `studreg`= 0,`studver`= 0,`studdec`=0,`empreg`=0,`empver`=0,`empdec`=0" );
		echo '<h6 style="color:green">Dashboard Reset Successful.</h6><br>';
	}
}


?>
	   
	   
	   
		   </form>
		 </div>

      </div>
    </div>
	
	
	
    <div class="left" > <!-- div for form to enter data into database -->
	   
		 <div class="container" style="margin-top:30px;">
		   <form id="form2" style=""  action="manage.php" method="POST" enctype="multipart/form-data">
		   <p align="center" style="font-size:14px;color:#000;"> Set Counter</p>
		   <input type="hidden" name="counter">
		   <br>
		   <input type="submit" id="submit" class="btn btn-primary" style="margin-left:280px;" value="Reset" />
		   
		 
		 
		 	    
<script type="text/javascript">
$(document).ready(function(){
    $("#submit").click(function(){
var question=confirm("Are you sure you want reset the seats capacity ?");
if(question){
document.getElementById('form2').submit();
} 
 });
});
</script>

  
<?php
if(isset($_POST['counter'])){
	require_once('init.php');
	mysqli_query($conn,"update route_master set Counter = Capacity");
	echo '<h6 style="color:green">Updated Successfully.</h6></br>';
}		
		
?>
         </form>
		</div>


	    <div class="container" style="margin-top:10px;padding-left:20px;border-top:1px solid black;">
		   <form name="form3" style="margin-top:10px;"  action="manage.php" method="POST" enctype="multipart/form-data">
		   <p align="center" style="font-size:14px;color:#000;">Upload bus route file: </p>
		   <br>
		   <input type="file" name="fileToUpload" id="fileToUpload" style="margin-left:100px;"  >
           <input type="submit" class="btn btn-primary" value="Upload File" name="submit1" >
		   <br/>
		<?php
		if(isset($_POST["submit1"])) {
$target_dir = "../";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$temp = explode(".", $_FILES["fileToUpload"]["name"]);
$newfilename = 'busroutes.' . end($temp);
		
$uploadOk = 1;
// Check if image file is a actual image or fake image

    if ($uploadOk == 0) {
    echo '<h6 style="color:green">Sorry, your file was not uploaded.</h6>';
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "../" . $newfilename)) {
        echo '<h6 style="color:green">The file has been uploaded Successfully.</h6>';
    } else {
        echo '<h6 style="color:green">Sorry, there was an error uploading your file.</h6>';
    }
}
}
	
?>
		   </form>
  
		 </div>
	   
	   
	    <div class="container form-inline justify-content-center" style="margin-top:20px;border-top:1px solid black;">
		
		<span style="width:100%;margin-top:10px;"><p align="center"  >Download Back-up Data</p></span>
		  <form action="export_excel.php" class="form-inline "  method="post">
 
  <input type="hidden" value = "select * from student_backup" name="query1" >
									
  <input type="submit" style="border:1px solid #116EB0;width:180px;border-radius:4px;	
height:35px;color:white;background-color: #116eb0;margin-left:20px;"  value = "Export Student Data" >

</form>

 <form action="export_excel.php"  class="form-inline "  method="post">
 
  <input type="hidden" value = "select * from faculty_backup" name="query1" >
									
  <input type="submit" style="border:1px solid #116EB0;width:180px;border-radius:4px;	
height:35px;color:white;background-color: #116eb0;margin-left:20px;"   value = "Export Employee Data" >

</form>

		</div>
	   
	   
    </div>
</div>

<div style="position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;">
	<?php include('footer.php');?>
  </div>
</body>
<html>
