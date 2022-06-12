
<?php 

/*
file name           : nav.php
database connection : -
table               : -
purpose             : 

     The functionality of this page is to display navigation bar which can be used to switch between other functionalities.

*/

?>



<?php 
include('function.php');

if( !isset($_SESSION['username']))
{
	session_destroy();
    header('location:../index.php');
}



?>   
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="styles.css">
   <link rel="stylesheet" type="text/css" href="css/main.css">
 
  
	
   <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">

  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!--===============================================================================================-->	
	
 <link rel="icon" type="image/png" href="favicon.ico">
  
<style>
*{
	font-family:Arial;
}

label{
	font-weight:bold;
}

h6,h5{
	font-size:14px;
}

a:hover{
	text-decoration:none;
}

input
{
		border-radius: 4px;
		<!-- text-transform: uppercase;-->
}

input[type=submit],input[type=button],button{	
	height:30px;
	font-weight:550;
	font-size:15px;	
}


#cssmenu a{
	text-decoration:none;
}


    </style>


<img src="logo.png" alt="" title="" height="72" width="260" style="margin-left:50pt;margin-top:20pt" />
<div id="heading">
<h1 style="font-size:36px;margin-left:500pt;color:#116EB0;margin-top:-40pt;">Logistics Management System</h1>


</div>
<div id='cssmenu'  style=" background: #116EB0; height:40px;text-decoration:none;" >
<ul>
      <li><a href="adminhome.php"><span style="font-size:15px;">Home</span></a></li>
  <li class='active' ><a href='verify.php'><span style="font-size:15px;">Verify</span></a> </li> 
 <li class='active has-sub'><a href='#'><span style="font-size:15px;">Register</span></a>
      <ul> <!--student registration page  -->
         <li  ><a href="studreg.php"><span style="font-size:15px;">Student</span></a>   
         </li>
         <li  ><a href="faculty.php"><span style="font-size:15px;">Employee</span></a>   <!--faculty registration page -->
            </li>
       
      </ul>
   </li>
    <li class='active has-sub'><a href='#'><span style="font-size:15px;">Update</span></a>
      <ul>
		 <li  ><a href="updatestud.php"><span style="font-size:15px;">Update Student</span></a>   <!--student update page -->
            </li>
         <li  ><a href="updatefaculty.php"><span style="font-size:15px;">Update Employee</span></a>   <!--faculty update page  -->
            </li>
      </ul>
   </li>
    
	
	
   <?php 
   //echo $_SESSION['username'];
   
   if( $_SESSION["user_role"] == "admin" || $_SESSION["userrole"] == "admin-it" ) 
   {   ?>
   <li class='active has-sub' ><a href='#'><span style="font-size:15px;">Route Management</span></a>
      <ul>
         <li  ><a href="addroute.php"><span style="font-size:15px;">Route</span></a>   <!--route management -->
         </li>
            <li  ><a href="addboardpoint.php"><span style="font-size:15px;">Boarding Point</span></a>  <!--boarding point page -->
            </li>
      </ul>
   </li>
   <li class='active ' ><a href='usermanage.php'><span style="font-size:15px;">User Management</span></a>
     <!-- <ul>
         <li  ><a href="adduser.php"><span style="font-size:15px;">Add User</span></a>   <!--user addition page-->
     <!--    </li>
         <li  ><a href='deluser.php'><span style="font-size:15px;">Delete User</span></a>   <!--user deletion page -->
       <!--     </li>
      </ul>-->
   </li> 
   <?php }?>
   
      <li class='active has-sub'><a href='#'><span style="font-size:15px;">Generate</span></a>
      <ul>
         <li  ><a href="buspass.php"><span style="font-size:15px;">Bus Pass</span></a> <!--buspass page -->
         </li>
         <li class='active has-sub'><a href='#'><span style="font-size:15px;">Student Reports</span></a>		
      
	  <ul>   <!--student reports -->
		   <li  ><a href="report.php"><span style="font-size:15px;">Reports</span></a></li>
  		   <li  ><a href="branch-report.php"><span style="font-size:15px;">Branch-wise Report</span></a></li>
  		   <li  ><a href="route-report.php"><span style="font-size:15px;">Route-wise Report</span></a></li>
		   <li  ><a href="year-report.php"><span style="font-size:15px;">Year-wise Report</span></a></li>
		   <li  ><a href="due-report.php"><span style="font-size:15px;">Due Report</span></a></li>
		   <li  ><a href="concession-report.php"><span style="font-size:15px;">Concession Report</span></a></li> 
		 </ul>
            </li>
			  <li class='active has-sub'><a href='facreport.php'><span style="font-size:15px;">Employee Reports</span></a></li>
			</ul>
		</li>

			
 </ul>
 <ul style="float:right;margin:0;padding-left:45px;text-decoration:none;" >
  <li class=' has-sub '><a href='#'><span style="color:#fff;font-size:15px;padding-left:43px;">Welcome <?php echo $_SESSION['username'];?></span></a>
    <ul>
	<?php 
   //echo $_SESSION['username'];
   //$_SESSION['user_role']
   if( $_SESSION["user_role"] == "admin" || $_SESSION["user_role"] == "admin-it") 
   {   ?><li ><a href="manage.php" class="auto-style1" ><span style="font-size:15px;">Data Management</span></a></li>
   <?php }?>
	<li  ><a href="changepass.php" class="auto-style1" ><span style="font-size:15px;">Change Password</span></a></li>
    <li  ><a href="logout.php" class="auto-style1" ><span style="font-size:15px;">Logout</span></a></li>
  </ul>
  </li>
  </ul>
</div>
