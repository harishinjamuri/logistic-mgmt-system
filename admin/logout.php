
<?php 

/*
file name           : logout.php
database connection : -
table               : -
purpose             : 

     The functionality of this page is to destroy the current session and remove all thee cookies 
	 

*/

?>


<?php     
include('function.php');
         //unset($_SESSION['username']);
         
		 FOREACH($_COOKIE AS $key => $value) {
	     unset($_COOKIE[$key]);
         setcookie($key,"",time()-3600);
		   
}
 session_destroy();
		unset($_SESSION['user']);
		 header('location:../index.php');
		
?>