
<?php 

/*
file name           : verify.php
database connection : buspassdatabase
table               : student, student_dup, faculty, faculty_dup, and  dashboard
purpose             : 

     The functionality of this page is to verify employee registration
	 
	 there are two functionalities
	 1) student verification
	 2) employee verification

	 In the first functionality the student verification form is displayed.
	 
	 
	 In the second functionality the employee verification form is displayed.
	 

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
	
   <title>AGI- Logistic Mgmt | Verification </title>
   
   <link rel="stylesheet" type="text/css" href="css/main.css">
   <script src="jquery-latest.min.js" type="text/javascript"></script>

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">


  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
<script src="jquery-3.2.1.min.js" type="text/javascript"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

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
		
}
input[type=text]{	
	border:thin solid black;
	height:30px;
	width:250px;
}
input[type=numeric]{	
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

    </style>
	   
    <link href="https://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/examples/jumbotron-narrow/jumbotron-narrow.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	
<script src="webcam.min.js"></script>

    </head>
	
	
<body >
<?php include('nav.php');/*navigation bar*/?> 

       
<div class="limiter" style="padding: 15px 0 0 25px; ">
<p style="color:#116EB0;font-size:14px; "><a href="adminhome.php">Home > </a><a href="verify.php"> Verify</a></p><br>
	
<div class="container" >

		<form style="margin:0;padding:0px;" class="form-inline" action="verify.php" method="post">
		  <label style="font-size:18px;">Enter ID No </label>&nbsp;&nbsp;
		  <input type="text"  class="form-control"  id="hallticket" name="hallticket" placeholder="Enter ID no" maxlength="10" required />&nbsp;&nbsp;
          <input type="submit" class="btn btn-primary" name="submit" value="Go">
		
	   
		    <div class="col-lg-4">
  <input type="button" id="printreg" name="submit" value="Print Form" style="<?php if(isset($_POST['hallticket1']) && !isset($_POST['submit1'])){ echo "display:block";}else echo "display:none"; ?>;" onclick="receiptreg()" class="btn btn-primary"/>
</div> </form>
  <script>
  
function receiptreg(){ 
window.open('formprint.php', '_blank', 'toolbar=yes,scrollbars=yes,resizable=yes,top=250,left=500,width=1215,height=680');

 //document.getElementById('print').style.display = "none";
}

 
  </script>
  
    <div class="col-lg-4" style="display:none;">
  <input type="button" id="print" name="submit" value="Print Receipt" style="<?php if(isset($_POST['hallticket1']) && !isset($_POST['submit1'])){ echo "display:block";}else echo "display:none"; ?>;" onclick="receiptprint()" class="btn btn-primary"/>
</div>
  <script>
  
function receiptprint(){ 
window.open('receipt1.php', '_blank', 'toolbar=yes,scrollbars=yes,resizable=yes,top=250,left=500,width=1215,height=680');

 //document.getElementById('print').style.display = "none";
}

 
  </script>
  <!--
  
  <div class="modal" id="show" >
   <button type="button" class="close" data-dismiss="modal"></button>
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
-->
  <script>
  
/*
	
	function camcall(){
		 
			// alert('hi');
      Webcam.attach( '#my_camera' );
  
$('#show').delay(40).fadeIn();
		document.getElementById("button").disabled = true;
		document.getElementById("show").style.display = "block";
		
	}	
	
	$('#clickclose').click(function() {
		//alert('hi');
		Webcam.reset();
		$('#show').delay(10).fadeOut();
});
	*/
  </script>
  
  <br/>
<?php

$hallticket="";

/* this if condition is used to open form for verification based on the id entered by the user */
if(isset($_POST['hallticket'])){
$hallticket=strtoupper($_POST['hallticket']);
$htno = strlen($hallticket);

if($htno == 10){

include('verifystudent.php');
}
else
 if($htno < 6){
	 include('verifyfaculty.php');
 }
}


/* this condition is used for submitting data from the form */
if(isset($_POST['hallticket1'])){
	
	include('verifystudent.php');
}

if(isset($_POST['empid'])){
	
	include('verifyfaculty.php');
}

?>
</div>
</div>
	 <?php if(isset($_POST['hallticket']) )
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
 
 
 
 <!-- <div class="modal" id="show" >
  <input type="button" id="clickclose" class="close" style="border:1px solid black;background-color:transparent;margin-right:20px;color:black;height:20px;width:105px;"  value="X" />
 
   <button type="button" class="close" data-dismiss="modal"></button>
    <div id="my_camera" ></div>
		
			    <input type="button" class="btn btn-success" value="Take Snapshot" onClick="take_snapshot()">
             
  </div>
  -->
  
</body>
</html>
