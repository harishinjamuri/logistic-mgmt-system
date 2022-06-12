
<?php 

/*
file name           : getCity.php
database connection : buspassdatabase
table               : bus_master
purpose             : 

     The functionality of this page is to generate lists for Amount based on the selected boarding point in the registration forms.

*/

?>





<script>
var someVarName = 0;
localStorage.setItem("status1", someVarName);

</script>

<?php
require_once ("dbcontroller.php");
$db_handle = new DBController();
$sta = "<script>document.write(localStorage.getItem('status1'));</script>";
if(isset($_COOKIE['bppoint']) &&($sta == 0))
{
	$query = "SELECT * FROM bus_master WHERE Boarding_point = '".$_COOKIE['bppoint']."' ";
    $results = $db_handle->runQuery($query);
	foreach ($results as $city) {
    
	?>
<option value="<?php echo $city["Amount"]; ?>"><?php echo $city["Amount"]; ?></option>

<?php
    }
  echo "<script>
var someVarName1 = 1;
localStorage.setItem('status1', someVarName1);
</script>";	
	
}

if (! empty($_POST["Boarding_point"])) {
	
    $query = "SELECT * FROM bus_master WHERE Boarding_point = '".$_POST["Boarding_point"]."' ";
    $results = $db_handle->runQuery($query);
	foreach ($results as $city) {
        ?>
<option value="<?php echo $city["Amount"];  ?>" selected><?php echo $city["Amount"]; ?></option>
<?php
    }
	
}
?>


