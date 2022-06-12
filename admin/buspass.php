
<?php 

/*
file name           : buspass.php
database connection : buspassdatabase
table               : student, faculty
purpose             : 

     The functionality of this page is to print buspass
	 
	 there are three functionalities 
	 1) generate student buspass
	 2) generate employee buspass
	 3) generate duplicate buspass
	 4) print buspass
	 
	 

	 In the first and second functionalities can be used to generate original bus pass.

	 In the third  functionality can be used to generate duplicate bus pass.
	 
	 The fourth functionality can be used to print bus pass.   	 
	 

*/

?>


<!doctype html>
<html lang=''>
<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="icon" type="image/png" href="favicon.ico">
<title>AGI- Logistic Mgmt | BUSPASS</title>
  

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
    <style>
	
    #buttons{
	margin-top: 18px;
	overflow: hidden;
}
#blah{
 padding:0px;
 margin:0px;
 width: 70px;
   height: 70px;
}
#result{ 
width:80px;
padding:0px;
 margin:0px;
}
#result img{
	
 width: 80px;
   height: 80px;
}

#blah img,#result{
   width: 100%;
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
}
input[type=text]{	
	border:thin solid black;
	height:30px;
	width:200px;
    font-size:15px;	
}

input[type=submit],button{	
	height:30px;
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

#duplicate{
	display:none;
	margin:0;
	padding:0;
}
#nonduplicate{
	display:block;
	margin:0;
	padding:0;
}

td{
	padding-left:5px;
}
table{
border-collapse: collapse;
    border-spacing: 0;
}
@media print {
    tr.vendorListHeading {
        -webkit-print-color-adjust: exact; 
    }
}

@media print {
    .vendorListHeading th {
        color: white !important;
    }
}


    </style>
    </head>
	

  <script>
  function student()
  {// alert("student function");
	 stu = document.getElementById('student');
	 emp = document.getElementById('employee');
     stu.style.display = "block";
	 emp.style.display = "none";
	 
e = document.getElementById('print1');
e.style.display = "none";
  }
 
  
  function employee()
  {  
 // alert("employee function");
     stu = document.getElementById('student');
	 emp = document.getElementById('employee');
     stu.style.display = "none";
	 emp.style.display = "block";
	 e = document.getElementById('print');
e.style.display = "none";
  }
  
  function set(){
	   document.getElementById('duplicate').style.display = 'none';
				document.getElementById('nonduplicate').style.display = 'block';
                //alert("Checkbox is unchecked.");
  }
  
  
  </script>
  
  
<body onload="set()" >

<?php 

include("nav.php");


?>

        
<div class="limiter" style="padding: 15px 0 0 25px; ">
<p style="color:#116EB0;font-size:14px; "><a href="adminhome.php">Home > </a>Generate ><a href="buspass.php"> Buspass</a></p><br>
		<div class="container " style="align:center;"  >
		<form style="margin:0;padding:0px;" class="form-inline" action="buspass.php" method="post">
		  <label style="font-size:18px;">Enter ID No </label>&nbsp;&nbsp;
		  <input type="text"  class="form-control"  id="hallticket" name="hallticket" placeholder="Enter ID no" size="30" value="<?php if(isset($_POST['hallticket'])) echo $_POST['hallticket']; echo "";?>" required />&nbsp;&nbsp;
          <input type="submit" class="btn btn-primary" name="submit" value="Go">
		
	    </form>
		<br/>
		<span style="font-size: 15px;">Duplicate </span><input type="checkbox" id="dell" name="dell[]" value="dup"> <br>
    <script type="text/javascript">
	
	var status = 0;
	//alert(status);
	
    $(document).ready(function(){
        $('input[type="checkbox"]').click(function(){
            if($(this).prop("checked") == true){
                document.getElementById('duplicate').style.display = 'block';
				document.getElementById('nonduplicate').style.display = 'none';
				status = 1;
				//alert("Checkbox is checked.");
				//alert(status);
            }
            else if($(this).prop("checked") == false){
                document.getElementById('duplicate').style.display = 'none';
				document.getElementById('nonduplicate').style.display = 'block';
				status=0;
                //alert("Checkbox is unchecked.");
				//alert(status);
            }
        });
    });
</script>
<?php
require "init.php";
$hallticket="";
$entries=0;
if(isset($_POST['hallticket'])){
$hallticket=strtoupper($_POST['hallticket']);
$htno = strlen($hallticket);

if($htno == 10){

$query=mysqli_query($conn,"SELECT * FROM `student` WHERE HallticketNumber='".$hallticket."'");

?>


<script type="text/javascript">
(function() {

var img = document.getElementById('blah').firstChild;
img.onload = function() {
    if(img.height > img.width) {
        img.height = '100%';
        img.width = 'auto';
    }
};}());
e = document.getElementById('print');
e.style.display = "block";
e = document.getElementById('print1');
e.style.display = "none";
</script>
<?php
$rowCount = "";

$rowCount = mysqli_num_rows($query);
if($rowCount == null)
  {
	  echo "<br/><br/><h4 style='color:red;'>Student not Registered</h4>";
  }
else{  $entries = 1;
 while($row = mysqli_fetch_array($query)):
 ?>

 </div>
 <div style="margin-left:400px;">
<div id="pass"  style="background-color:white;height:550px;width:320px;margin-left:24px;margin-top:0px,padding-top:0;font-size:13px;" onafterprint="myFunction()"><br/>

<style>p{font-size:12px;vertical-align: baseline;line-height: 1;}
td{font-size:13px;}padding: 2em 4em;
</style>

<script>
function myFunction() {
    alert("This document is now being printed");
}
</script>

<table cellspacing="0" cellpadding="0" width="320px" style="margin-top:0px;">
            <tr>
             <td colspan="5" style="padding-left:5px;border:3px solid ORANGE;">
			     <table cellspacing="0" cellpadding="0" style="vertical-align: baseline;line-height: 1;" >
				   <tr>
				    <td rowspan="3" style="padding-right:5px;border-right:3px solid ORANGE;" >
					  <img src="anuraglogo.jpg" alt=""  title="" height="45" width="45" />
					</td>
					 <td style="padding-right:6px;padding-left:6px;font-size:13.8px;text-align: center;color:#116EB0;"><b >ANURAG GROUP OF INSTITUTIONS</b></td></tr>
					 <tr><td style="font-size:13px;text-align: center;color:#116EB0;">
     <b >(An Autonomous Institution)</b></td></tr>
	 <tr><td style="font-size:9px;text-align: center;color:#116EB0;">
     <b >Venkatapur(V),&nbsp;Ghatkesar(M),&nbsp;Medchal(Dist)&nbsp;-&nbsp;500088</b>
	 </td>
				   </tr>
				   
				   
				 </table> 
			 </td>			</tr>
			<tr>
             <td colspan="5" style="font-size:12px;text-align:center;color:red;" ><span id="duplicate" ><b>STUDENT BUS PASS <?php echo $row['acadyear'];?> &nbsp;&nbsp;&nbsp;[D]</span> 
                <span id="nonduplicate" ><b>STUDENT BUS PASS <?php echo $row['acadyear'];?> </span> 
			 </b></td>
			</tr>
			<tr >
				<td style="vertical-align: baseline;line-height: 1;">Name  </td>
				<td style="vertical-align: baseline;line-height: 1;" colspan="3" width="180px"><p><?php $name =  $row['Name'];
				echo substr($name,0,20);?></p></td>
				<td  rowspan="4" id="blah" style="padding:0px;margin:0;"><img  <?php echo 'src="img/'.$row['imageofStudent'].'';?>" alt="yourimage" class="auto-style2" style="height:70px;width:65px;margin:0;padding:0;"/></td> 
			</tr>
            <tr style="vertical-align: baseline;line-height: 1;">
                <td >H.T.No </td>
                <td colspan="3"><p><?php echo $row['HallticketNumber'];?></p></td>
			</tr>	
			<tr style="vertical-align: baseline;line-height: 1;">
			    <td style="vertical-align: baseline;line-height: 1;">Mobile  </td>
				<td colspan="3"><p><?php echo $row['Mobile_Number'];?></p></td>
			</tr>	
			<tr style="vertical-align: baseline;line-height: 1;">
				<td>Course  </td>
				<td colspan="3" ><p><?php echo $row['Year']."   ".$row['Course']."   ".$row['Department_Name'];?></p></td>
			</tr>
			<tr >
				<td style="vertical-align: baseline;line-height: 1;">Boarding  </td>
				<td colspan="3" style="vertical-align: baseline;line-height: 1;"><p style="font-size:13px;"><?php $bp =  $row['Boarding_point'];
				echo substr($bp,0,20);?></p></td>
				<td rowspan="3" width="80px" style="margin:0px;padding:0px;width:65px;height:65px;"><img src="<?php 
				 $data = "H.T No: ".$row['HallticketNumber'].",Name: ".$row['Name'].",Paid:".$row['Total'].",Due:".$row['Due'].",Rt No: ".$row['Route_no'].",Bp : ".$row['Boarding_point'];
				echo "qr_php/qr_img.php?d=$data"; ?>" width="65px" height="65px"></td>
			</tr >
			<tr style="vertical-align: baseline;line-height: 1;">
				<td>Route No  </td>
				<td ><p><?php echo $row['Route_no'];?></p></td>
				<td>Rcpt No  </td>
				<td ><p><?php echo $row['Receipt_Number'];?></p></td>
				
			</tr>
			<tr style="vertical-align: baseline;line-height: 1;">
				<td>Paid  </td>
<td ><p><?php echo $row['Total']; ?></p></td>
				<td>Due  </td>
<td ><p><?php echo $row['Due']; ?></p></td>
			</tr>
			<tr >
				<td colspan="2" style="font-size:10px !important;margin-bottom:4px;">#<?php echo date('d-m-Y'); ?></td>
			</tr>
			<tr >
			<table width="320px" style="margin-top:5px;font-size:11px;transform: rotate(180deg);-ms-transform: rotate(180deg);"><tr><td>
			<span style="font-size:14px;"><b style="color:red">Rules and Regulations</b></span><td></tr>
			<tr><td >
			1.Students must be present at their respective stops 5 min before the scheduled time.</td></tr>
			<tr><td >
			2.Buses will be operated on the approved route based on the occupancy(50%).</td></tr>
			<tr><td>
			3.Student should always carry the Bus Pass and show it when asked for.</td></tr>
			<tr><td>
			4.Indiscipline /Ragging incidents are banned.</td></tr>
			<tr><td>
			5.Students should travel by the allotted bus only.</td></tr>
			<tr><td>
			<img src="director.jpg" style="margin-left:60px;" width="40px" height="30px"><img src="ti.jpg" style="float:right;margin-right:30px;" width="40px" height="30px"><br/>
			<span style="margin-left:30px;font-size:12px;"><b>Transport In-charge</b></span> <span style="float:right;font-size:12px;margin-right:30px;"><b>Director</b></span>          
			</td>	
           </tr>
			</table></tr></table></div> 
			
			
			
			
 <?php endwhile;
 
} 
?>
<div   style="margin-left:100px;margin-bottom:50px;<?php if($rowCount == null)
  { echo "display:none"; }?>">
	<button id="print" class="btn btn-primary" style="font-size:15px;"  onclick="printContent(status);" >Print</button></div>
           </div>
  <br/>
   

<br/>
    
<?php

}
 else{  $entries = 1;
$query=mysqli_query($conn,"SELECT * FROM `faculty` WHERE Employee_id='".$hallticket."'");


?>


<script type="text/javascript">
 
(function() {

var img = document.getElementById('blah').firstChild;
img.onload = function() {
    if(img.height > img.width) {
        img.height = '100%';
        img.width = 'auto';
    }
};}());
e = document.getElementById('print1');
e.style.display = "block";
e = document.getElementById('print');
e.style.display = "none";

</script>
<?php
$rowCount = "";

$rowCount = mysqli_num_rows($query);
if($rowCount == null)
  {   $entries = 0;
	  echo "<br/><br/><h4 style='color:red;'>Faculty not Registered</h4>";
  }
else{
 while($row = mysqli_fetch_array($query)):
 ?>
 <div style="margin-left:400px;margin-bottom:20px;">
<div id="pass1" style="background-color:white;height:550px;width:320px;margin-left:24px;margin-top:0px;font-size:13px;">
<br/>
<style>p{font-size:12px;vertical-align: baseline;line-height: 1;}
td{font-size:13px;}padding: 2em 4em;
</style> 
<table cellspacing="0" cellpadding="0" width="320px" style="margin-top:0px;">
            <tr>
             <td colspan="5" style="padding:0px;border:3px solid ORANGE;">
			     <table cellspacing="0" cellpadding="0" style="vertical-align: baseline;line-height: 1;" >
				   <tr>
				    <td rowspan="3" style="padding-right:5px;border-right:3px solid ORANGE;" >
					  <img src="anuraglogo.jpg" alt=""  title="" height="45" width="45" />
					</td>
					 <td style="padding-right:6px;padding-left:6px;font-size:13.8px;text-align: center;color:#116EB0;"><b >ANURAG GROUP OF INSTITUTIONS</b></td></tr>
					 <tr><td style="font-size:13px;text-align: center;color:#116EB0;">
     <b >(An Autonomous Institution)</b></td></tr>
	 <tr><td style="font-size:9px;text-align: center;color:#116EB0;">
     <b >Venkatapur(V),&nbsp;Ghatkesar(M),&nbsp;Medchal(Dist)&nbsp;-&nbsp;500088</b>
	 </td>
				   </tr>
				   
				   
				 </table> 
			 </td>			</tr>
			<tr>
             <td colspan="5" style="padding:0px;margin:0px;font-size:14px;text-align:center;color:red;" ><span id="duplicate" ><b>EMPLOYEE BUS PASS <?php echo $row['acadyear'];?> &nbsp;&nbsp;&nbsp;[D]</span>
               <span id="nonduplicate" ><b>EMPLOYEE BUS PASS <?php echo $row['acadyear'];?></span>
			 </b>  </td>
			</tr>
			<tr >
				<td style="vertical-align: baseline;line-height: 1;">Name  </td>
				<td colspan="3" width="180px"><p><?php $name =  $row['Name'];				echo substr($name,0,20);?></p></td>
				<td  rowspan="4" id="blah" style="padding:0px;margin:0;"><img  <?php echo 'src="img/'.$row['image_of_faculty'].'';?>" alt="yourimage" class="auto-style2" style="height:70px;width:65px;margin:0;padding:0;"/>
				
								</td> 
			</tr>
            <tr style="vertical-align: baseline;line-height: 1;">
                <td >Emp Id </td>
                <td colspan="3"><p><?php echo $row['Employee_id'];?></p></td>
			</tr>	
			<tr style="vertical-align: baseline;line-height: 1;">
			    <td style="vertical-align: baseline;line-height: 1;">Category  </td>
				<td colspan="3"><p><?php echo $row['Designation'];?></p></td>
			</tr>	
			<tr style="vertical-align: baseline;line-height: 1;">
				<td>Dept  </td>
				<td colspan="3" ><p><?php echo $row['Department'];?></p></td>
			</tr>
			<tr >
				<td style="vertical-align: baseline;line-height: 1;">Boarding  </td>
				<td colspan="3" style="vertical-align: baseline;line-height: 1;"><p style="font-size:13px;"><?php $bp =  $row['Boarding_point'];
				echo substr($bp,0,20);?></p></td>
				<td rowspan="3" width="80px" style="margin:0px;padding:0px;width:65px;height:65px;"><img src="<?php 
				 $data = "Emp id: ".$row['Employee_id']." ,Name: ".$row['Name'].",Designation:".$row['Designation'].",Dept:".$row['Department'].",Rt No: ".$row['Route_no'].",Bp : ".$row['Boarding_point'];
				echo "qr_php/qr_img.php?d=$data"; ?>" width="65px" height="65px"></td>
			</tr >
			<tr style="vertical-align: baseline;line-height: 1;">
				<td>Route No  </td>
				<td ><p><?php echo $row['Route_no'];?></p></td>
				<td>Mobile  </td>
				<td ><p><?php echo $row['Mobile_Number'];?></p></td>
				
			</tr>
			<tr >
				<td colspan="2" style="font-size:10px !important;margin-bottom:4px;">#<?php echo date('d-m-Y'); ?></td>
				<td></td><td></td>
			</tr>
			
			
			<tr >
			<table width="320px" style="margin-top:5px;font-size:11px;transform: rotate(180deg);-ms-transform: rotate(180deg);"><tr><td colspan="5">
			<span style="font-size:14px;"><b style="color:red">Rules and Regulations</b></span><td></tr>
			<tr><td colspan="5">
			1.Staff must be present at their respective stops 5 min before the scheduled time.</td></tr>
			<tr><td colspan="5">
			2.Buses will be operated on the approved route based on the occupancy(50%).</td></tr>
			<tr><td>
			3.Staff should always carry the Bus Pass and show it when asked for.</td></tr>
			<tr><td>
			4.Staff should ensure that no Indiscipline / Ragging occur in the bus.</td></tr>
			<tr><td>
			5.Staff should travel by the allotted bus only.</td></tr>
			<tr><td>
			<img src="director.jpg" style="margin-left:60px;" width="40px" height="30px"><img src="ti.jpg" style="float:right;margin-right:30px;" width="40px" height="30px"><br/>
			<span style="margin-left:30px;font-size:12px;"><b>Transport In-charge</b></span> <span style="float:right;font-size:12px;margin-right:30px;"><b>Director</b></span>          
			</td>	
           </tr>
		   
			</table></tr></table></div> 
						
           
  <br/>
	<div  style="margin-left:60px;margin-bottom:50px;<?php if($rowCount == null)
  { echo "display:none"; }?>">
	<button id="print1" class="btn btn-primary" style="font-size:15px;"  onclick="printContent1(status);" >Print</button></div>
	
		
 <?php endwhile;}}
}
 ?>

	</div>
    </div>
	
    </div>
    
  

 <?php if(isset($_POST['hallticket']) && $entries == 1)
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
 </div>
<script>
	function printContent(sta) {    
	      
           var divToPrint = document.getElementById('pass');
           var popupWin = window.open('', '_blank', 'width=800px,height=800px');
           popupWin.document.open();
	
           popupWin.document.write('<html><style>@page{margin:0;margin-left:15px;}</style><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
            popupWin.document.close(); 
			var ht= document.getElementById('hallticket').value;
			if(sta ==0){
				$.ajax({
	               type: "POST",
					url: "buspassquery.php",
					data:'hallticket='+ht,   // data to be send to query for execution for updating the idcard status
					success: function(data){
					//alert(sta);
				}
				});
			}			
                }
				
				function printContent1(sta) {
	     
           var divToPrint = document.getElementById('pass1');
           var popupWin = window.open('', '_blank', 'width=800px,height=800px');
           popupWin.document.open();
           popupWin.document.write('<html><style>@page{margin-top:0px;margin-left:15px;}</style><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
            popupWin.document.close();
			  var ht= document.getElementById('hallticket').value;
			if(sta ==0){
				$.ajax({
	               type: "POST",
					url: "buspassquery.php",
					data:'empid='+ht,   // data to be send to query for execution for updating the idcard status
					success: function(data){
					//alert(sta);
				}
				});
			}
                }

    </script>
</body>
<html>
