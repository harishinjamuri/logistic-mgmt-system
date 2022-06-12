
<?php 

/*
file name           : buspassquery.php
database connection : buspassdatabase
table               : student and faculty
purpose             : 

     The functionality of this page is to update the idcard status when the check box os checked 
	 for duplicate bus pass.

*/

?>

<?php 
require_once('init.php');

if(isset($_POST['hallticket']))
{
	//for updating in student table
  $sql ="update student set Idcard_status = 'printed' where HallticketNumber = '".$_POST['hallticket']."' ";
  mysqli_query($conn,$sql);
}

if(isset($_POST['empid']))
{
		//for updating in faculty table
  $sql ="update faculty set Idcard_status = 'printed' where Employee_id = '".$_POST['empid']."' ";
  mysqli_query($conn,$sql);
}

?>

