
<?php 

/*
file name           : editqueries.php
database connection : buspassdatabase
table               : users, bus_master and  route_master
purpose             : 

     The functionality of this page is to execute queries and update thee data when called.

*/

?>


<?php

/* for updating User Password value in Users table on request from usermanage.php page */

if (! empty($_POST["User_name"])) {


 require_once("init.php");
 $query=" UPDATE `users` SET `Password`= '".$_POST['Password']."' where User_name = '".$_POST['User_name']."' ";
 mysqli_query($conn,$query);
 
 /*echo '<script type="text/javascript"> alert("<?php echo $query;?>"); </script>';*/

}



/* for updating routename value in route_master table on request from addroute.php page */

if (! empty($_POST["Route_Name"])) {


 require_once("init.php");
 $query="update route_master set Route_Name = '".$_POST['Route_Name']."' where Route_No = '".$_POST['Route_no']."'";
 mysqli_query($conn,$query);
 
 /*echo '<script type="text/javascript"> alert(<?php echo $query;?>); </script>';*/

}


/* for updating capacity value in route_master table on request from addroute.php page */

if (! empty($_POST["capacity"])) {


 require_once("init.php");
 $query="update route_master set capacity = '".$_POST['capacity']."' where Route_No = '".$_POST['Route_no']."'";
 mysqli_query($conn,$query);
 
 /*echo '<script type="text/javascript"> alert(<?php echo $query;?>); </script>';*/

}


/* for updating route_no value in bus_master table on request from addboardingpoint.php page */

if (! empty($_POST["Route_No"])) {


 require_once("init.php");
 $query="update bus_master set Route_No = '".$_POST['Route_No']."' where bpid = '".$_POST['bpid']."'";
 mysqli_query($conn,$query);
 
 /*echo '<script type="text/javascript"> alert(<?php echo $query;?>); </script>';*/

}


/* for updating Boarding_point value in bus_master table on request from addboardingpoint.php page */

if (! empty($_POST["Boarding_point"])) {

 require_once("init.php");
 $query="update bus_master set Boarding_point = '".$_POST['Boarding_point']."' where bpid = '".$_POST['bpid']."'";
 mysqli_query($conn,$query);
 
 /*echo '<script type="text/javascript"> alert(<?php echo $query;?>); </script>';*/

}


/* for updating time value in bus_master table on request from addboardingpoint.php page */

if (! empty($_POST["Time"])) {

 require_once("init.php");
 $query="update bus_master set Time = '".$_POST['Time']."' where bpid = '".$_POST['bpid']."'";
 mysqli_query($conn,$query);
 
/* echo '<script type="text/javascript"> alert(<?php echo $query;?>); </script>';*/

}



/* for updating amount value in bus_master table on request from addboardingpoint.php page */

if (! empty($_POST["Amount"])) {

 require_once("init.php");
 $query="update bus_master set Amount = '".$_POST['Amount']."' where bpid = '".$_POST['bpid']."'";
 mysqli_query($conn,$query);
 
 /*echo '<script type="text/javascript"> alert(<?php echo $query;?>); </script>';*/

}


 ?>