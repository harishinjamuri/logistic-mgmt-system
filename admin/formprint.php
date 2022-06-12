
<?php 

/*
file name           : formprint.php
database connection : buspassdatabase
table               : student
purpose             : 

     The functionality of this page is to genarate the student data in thee form of receipt 
     which can be used for fee-payment.

*/

?>


<!doctype html>
<html lang=''>
<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
		text-transform: uppercase;
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
	function printContent() {    
           var divToPrint = document.getElementById('pass');
           var popupWin = window.open('', '_blank', 'width=800px,height=800px');
           popupWin.document.open();
           popupWin.document.write('<html><body style="margin-left:50px;" onload="window.print()">' + divToPrint.innerHTML + '</html>');
            popupWin.document.close();
			window.close();
			
                }
			

</script>

  <!--  onload="printContent();"  -->
<body  >

<?php //include("nav.php");
//echo $_POST['empid'];
?>

<div class="container" style="margin-top:15px;width:100%;">

	  
		<div style="margin:50px;">
		    
<?php
require "init.php";

//".$_COOKIE['hallticket']."
$query=mysqli_query($conn,"SELECT * FROM `student` WHERE HallticketNumber='".$_COOKIE['hallticket']."'");




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
	  echo "<h5 style='color:red;'>student not registered</h5>";
  }
else{
 while($row = mysqli_fetch_array($query)):
 ?>
 
 </div>
 <div style="margin-left:90px;">
<div id="pass"  style="background-color:white;width:660px;margin-left:90px;font-size:13px;
"><br/>

<style>p{font-size:12px;line-height: 0.5;margin-top:10px;}
td{font-size:13px;}
</style>
<div class="row" style="margin-bottom:30px;">
<div class="col-lg-12" style="text-align:center;">
  <input type="button" id="print" name="submit" value="Print Form" onclick="printContent()" class="btn btn-primary"/>
</div>

</div>

<table  style="border:2px solid black;" cellspacing="0" cellpadding="0" width="678px" >
            <tr>
             <td colspan="5"  style="text-align:center;margin:auto;padding:auto;">
			     <table cellspacing="0" cellpadding="0" style="text-align:center;vertical-align: baseline;line-height: 1;" >
				   <tr >
				    <td rowspan="3" style="padding:10px 0px 10px 130px;" >
					  <img src="anuraglogo.jpg" alt=""  title="" height="45" width="45" />
					</td>
					 <td style="padding-left:20px;text-align:center;font-size:18px;color:black;"><b >ANURAG GROUP OF INSTITUTIONS</b></td></tr>
					 <tr><td style="text-align:center;font-size:15px;color:black;">
     <b >(An Autonomous Institution)</b></td></tr>
	 <tr><td style="text-align:center;font-size:9px;color:black;">
     <b >Venkatapur(V),&nbsp;Ghatkesar(M),&nbsp;Medchal(Dist)&nbsp;-&nbsp;500088</b>
	 </td>
				   </tr>		   
				   
				 </table>
</td></tr>
<tr><td colspan="4" >
<table style="border-top:2px solid black;border-bottom:2px solid black;" width="680px">
<tr>
<td align="center"><b>STUDENT BUS PASS REGISTRATION <?php echo $row['acadyear'];?></b></td>
</tr>

</table></td>
<tr>
				<td style="margin:0;vertical-align: baseline;line-height: 1;padding-left:10px;" width="85px">Rcpt No  </td>
				<td style="margin:0;vertical-align: baseline;line-height: 1;" width="330px"><p><?php echo $row['Receipt_Number'];?></p></td>
				<td ></td>
				<td width="100px"></td>
</tr>

            <tr style="vertical-align: baseline;line-height: 1;">
                <td style="padding-left:10px;">H.T.No </td>
                <td ><p><?php echo $row['HallticketNumber'];?></p></td>
				<td ></td>
				<td ></td>
			</tr>
			<tr >
				<td style="padding-left:10px;vertical-align: baseline;line-height: 1;">Name  </td>
				<td style="vertical-align: baseline;line-height: 1;"  width="180px"><p><?php echo $row['Name'];?></p></td>
				<td  rowspan="4" id="blah" style="padding:8px;"><img  <?php echo 'src="img/'.$row['imageofStudent'].'';?>" alt="yourimage" class="auto-style2" style="height:115px;width:100px;margin:0;padding:0;"/></td>
				<td rowspan="5" style="margin:0px;padding:0px 50px 5px 0px;"><img src="<?php 
				 $data = "H.T No: ".$row['HallticketNumber']."  Name: ".$row['Name']." Paid:".$row['Total']." Due:".$row['Due']." Bp point: ".$row['Boarding_point'];
				echo "qr_php/qr_img.php?d=$data"; ?>" width="90px" height="90px"></td>
				
			</tr>
			<tr >
				<td style="padding-left:10px;vertical-align: baseline;line-height: 1;">Parent </td>
				<td style="vertical-align: baseline;line-height: 1;" width="180px"><p><?php echo $row['Father_Name'];?></p></td>
			</tr>
			<tr >
				<td style="padding-left:10px;vertical-align: baseline;line-height: 1;">Course & Branch </td>
				<td style="vertical-align: baseline;line-height: 1;" width="180px"><p><?php echo $row['Year']."   ".$row['Course']."   ".$row['Department_Name'];?></p></td>
			</tr>
			<tr >
				<td style="padding-left:10px;vertical-align: baseline;line-height: 1;">Mobile No. </td>
				<td style="vertical-align: baseline;line-height: 1;" width="180px"><p><?php echo $row['Mobile_Number'];?></p></td>
			</tr>
			<tr >
				<td style="padding-left:10px;vertical-align: baseline;line-height: 1;">Email Id </td>
				<td style="vertical-align: baseline;line-height: 1;" width="180px"><p><?php echo $row['Email'];?></p></td>
			</tr>
			<tr>
			    <td style="padding-left:10px;vertical-align: baseline;line-height: 1;">Boarding Point </td>
				<td style="margin:0;vertical-align: baseline;line-height: 1;"><p style="font-size:13px;"><?php $bp =  $row['Boarding_point'];
				echo substr($bp,0,20);?></p></td>
			    <td style="padding-left:10px;">Bus No  </td>
				<td ><p><?php echo $row['Route_no'];?></p></td> 
			</tr>
			<tr style="vertical-align: baseline;line-height: 1;">
				<td style="padding-left:10px;">Paid  </td>
				<td ><p><?php echo $row['Total']; ?></p></td>
				<td style="margin:0;vertical-align: baseline;line-height: 1;padding-left:10px;">Due  </td>
				<td style="margin:0;vertical-align: baseline;line-height: 1;"><p><?php echo $row['Due']; ?></p></td>
			</tr>
			<tr style="vertical-align: baseline;line-height: 1;">
				<td style="padding-left:10px;">Address  </td>
				<td ><p><?php echo $row['Address']; ?></p></td>
			</tr>
			<tr style="vertical-align: baseline;line-height: 1;">
				<td style="margin:0;vertical-align: baseline;line-height: 1;padding-left:10px;">Remarks  </td>
				<td style="margin:0;vertical-align: baseline;line-height: 1;"><p><?php echo $row['Remarks']; ?></p></td>
			</tr>
<tr>
<td colspan="4" >
<table style="margin-top:10px;border-top:2px solid black;" width="680px">
<tr>
<td style="padding:50px 15px 10px 15px;"><b>Date :  <?php echo date("d-m-Y");?></b><b style="float:right;">Signature of the Receiver</b></td></tr>

</table></td>

</tr>
</tr>
</table>

<br/>

 </div>	
			<br/>


           </div>
  <br/>
   			
 <?php endwhile;
}
 
?>

    </div>
	
    
    
  </div>
</div>


</body>
<html>
