
<?php 

/*
file name           : getState.php
database connection : buspassdatabase
table               : route_master
purpose             : 

     The functionality of this page is to generate boarding points based on the selected route in the registration forms.

*/

?>


<?php
require_once ("dbcontroller.php");
$db_handle = new DBController();
if (! empty($_POST["Route_no"])) {
    
	$query1 = "SELECT * FROM route_master WHERE Route_No = '" . $_POST["Route_no"] . "'";
	$results1 = $db_handle->runQuery($query1);
	foreach ($results1 as $state1)
	if($state1['Counter'] <1)
	{
		?>
		<option style=" pointer-events:none;
        -webkit-appearance: none;
        -moz-appearance: none;      
        appearance: none;
        padding: 2px 30px 2px 2px;" value disabled selected>No Seats for this Route.</option>
		<?php
	}
   else{
	   
	  // echo "<script>alert(".$_POST["Route_no"].");</script>";
	$query = "SELECT * FROM bus_master WHERE Route_No = '" . $_POST["Route_no"] . "'";
    $results = $db_handle->runQuery($query);
    ?>
<option value disabled selected>Select Boarding point</option>
<?php
    foreach ($results as $state) {
        ?>
<option value="<?php echo $state["Boarding_point"];?>" <?php $str = strtoupper($state["Boarding_point"]); if($_COOKIE['bppoint'] == $str ) echo "selected"; ?> ><?php echo $state["Boarding_point"]; ?></option>

<?php
    }
}}


?>
