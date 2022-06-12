<?php 

/*
file name           : funtion.php
database connection : -
table               : -
purpose             : 

     The functionality of this page is to create and manage session
	 

*/

include ("init.php");


date_default_timezone_set('Indian/Maldives');

 if(session_status() == PHP_SESSION_NONE){
 session_start();
 }
 
if(isset($_POST['username'])){
   $uname=$_POST['username'];
   $password=$_POST['pass'];
   
  if($uname!=''&&$password!='')
 { 
   $query=mysqli_query($conn,"select * from users where User_name='".$uname."' and Password='".$password."'") ;
   $res=mysqli_fetch_row($query);
	if($res)
   {
	echo $res['Role'];
    $_SESSION['username']=$uname;
	$_SESSION['user_role']=$res['Role'];
	
    header('location:./admin/adminhome.php');
   }
   else
   {
  echo '<h6 style="color:red">Invalid details!</h6><br>';
	
   }}
 else
 {
	  echo '<h6 style="color:red">Enter details!</h6><br>';
  // header('location:./index.php');
 }
}


?>
