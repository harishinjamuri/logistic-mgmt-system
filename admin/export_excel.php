
<?php 

/*
file name           : export_excel.php
database connection : buspassdatabase
table               : student and faculty
purpose             : 

     The functionality of this page is to generate excel sheet based on the passed query.
	 

*/

?>


<?php require_once('init.php');

// headers for exporting excel
$query1 = $_POST['query1'];


header("Content-Disposition: attachment; filename=excel_export.xls");

header("Content-Type: application/vnd.ms-excel");

function dataFilter(&$str_val)
{
	$str_val = preg_replace("/\t/", "\\t", $str_val);
	$str_val = preg_replace("/\r?\n/", "\\n", $str_val);
	if(strstr($str_val, '"')) $str_val = '"' . str_replace('"', '""', $str_val) . '"';
}

$post_list = array();

//get rows query
$query = mysqli_query($conn, "$query1");

//number of rows
$rowCount = mysqli_num_rows($query);

$sno = 1;
if($rowCount > 0){
	$array = array();
	
	
	//array_push($post_list,"Total Students Details")
	
	
	$array = array();
	$name =  mysqli_fetch_fields  ($query );
	foreach ($name as $val) {
    array_push($array,"$val->name");
	
	}
	array_push($post_list,$array);
	
	
	while($row = mysqli_fetch_assoc($query)){
		$datalist = array();
		
		foreach ($array as $name) {
		 array_push($datalist,strval($row["$name"]));
         //echo $row["$name"]." ";
      	}
		
		array_push( $post_list,$datalist );
		$sno++;
		/*
		foreach ($datalist as $name) {
         echo $name." ";
      	}
*/
	}
  }


$title_flag = false;
foreach($post_list as $post) {
	/*
	if(!$title_flag) {
		// Showing column names 
		echo implode("\t", array_keys($post)) . "\n";
		$title_flag = true;
	}*/
	// data filtering
	array_walk($post, 'dataFilter');
	echo implode("\t", array_values($post)) . "\n";

}

?>