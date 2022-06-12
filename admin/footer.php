
<?php 

/*
file name           : footer.php
database connection : buspassdatabase
table               : -
purpose             : 

     The functionality of this page is to display footer with copyright
	 

*/

?>

<footer style=" background: #116EB0; text-align: center;padding : 10px 0; color: #fff; font-size: 14px;">  
      <div class="copyright">
        &copy;<a href="https://anurag.edu.in/" target="_blank" style="color:white;" > Anurag Group of Institutions</a>,  <?php  $y = date("Y");	echo $y;  ?> || <strong>Courtesy</strong>: Dept. of Information Technology 
      </div>
 </footer>
 
 
 
 <?php 
   $link = $_SERVER['HTTP_HOST'].''.$_SERVER['REQUEST_URI'];
   //echo $link;
   //echo $_SERVER['HTTP'];
/*
if($_SERVER['HTTPS'] !="on")
echo "<script>
window.open('https://$link', '_self');
// window.open('https://$link', '_blank', 'toolbar=yes,scrollbars=yes,resizable=yes,top=250,left=500,width=215,height=280');
//window.close();
		</script>";*/
 ?>