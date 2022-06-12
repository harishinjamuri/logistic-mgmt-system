
<?php 

/*
file name           : adminhome.php
database connection : buspassdatabase
table               : dashboard
purpose             : 

     The functionality of this page is to display dashboard.
	 
	 the dashboard has all the statistical data of the database.
	 

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
   <title>AGI- Logistic Mgmt | Menu</title>
   <link rel="stylesheet" type="text/css" href="css/main.css">
   <script src="jquery-latest.min.js" type="text/javascript"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script>
	function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
	</script>
    <title>AGI-Bus Pass</title>
    <style>


tr:nth-child(odd){background-color: rgba(17,110,176,0.2)}

th{
	font-size:15px;
}
   
td{
	font-size:16px;
	border-right:1px solid rgba(0,0,0,0.1);
}   

#progress{
   margin-top:5px;
   margin-left:8px;
   color:black;
   height:15px;
   width:160px;
   font-size:11px;
}


    </style>
    </head>
<body>

<?php include("nav.php");?>

		<div align="center" style="width:100vw;"> 
		
		 <div style="margin:10vh 0 10vh 0;width:70vw;">
		    <h3 style="text-align:center;font-style:Arial;">Dash Board</h3>
			<?php 
			   include("init.php");
			   
			   $sql = mysqli_fetch_array(mysqli_query($conn,"select * from dashboard"));
			   $stud = mysqli_num_rows(mysqli_query($conn,"select * from student where Idcard_status = 'printed'"));
			   $studdue = mysqli_num_rows(mysqli_query($conn,"select * from student where Due > 0"));
			   $emp = mysqli_num_rows(mysqli_query($conn,"select * from faculty where Idcard_status = 'printed'"));
			   
			   $studrows = mysqli_num_rows(mysqli_query($conn,"select * from student"));
			   $emprows = mysqli_num_rows(mysqli_query($conn,"select * from faculty"));
			?>
			
		<?php 
		
		function percentage($value,$maximum){
			if ($maximum == 0){
				$maximum = 1;
			}
			
			return round(($value*100)/$maximum,2);
		}
		
		
		?>	
				
		 <table class="table" style="border:1px solid rgba(0,0,0,0.1);text-align:center;">
            <tr style=" background: rgba(17,110,176,0.9);color:white;">
			  <th>Item</th>
			  <th>#Registered</th>
			  <th>#Verified</th>
			  <th>#Declined</th>
			  <th>#Processed</th>
			  <th>#Fee Due</th>
			</tr>
             <tr>
			  <td><br/>Student</td>
			  <td><br/><?php echo $sql['studreg'];?></td>
			  <td><?php echo $sql['studver'];?>  (<?php echo percentage($sql['studver'],$sql['studreg']);?>%)<br/>
			  <div class="progress" id="progress"  >
  <div class="progress-bar" role="progressbar"  aria-valuenow="<?php echo $sql['studver'];?>"
  aria-valuemin="0" aria-valuemax="<?php echo $sql['studreg'];?>" style="width:<?php echo percentage($sql['studver'],$sql['studreg']);?>%">
  </div>
</div>
             </td>

			  <td>			  <?php echo $sql['studdec'];?>  (<?php echo percentage($sql['studdec'],$sql['studreg']);?>%)
			  <div class="progress" id="progress"  >
  <div class="progress-bar" role="progressbar"  aria-valuenow="<?php echo $sql['studdec'];?>"
  aria-valuemin="0" aria-valuemax="<?php echo $sql['studreg'];?>" style="width:<?php echo percentage($sql['studdec'],$sql['studreg']);?>%">
  </div>
</div>
</td>
			  <td>  <?php echo $stud;?>  (<?php echo percentage($stud,$studrows);?>%)
			  <div class="progress" id="progress"  >
  <div class="progress-bar" role="progressbar"  aria-valuenow="<?php echo $stud;?>"
  aria-valuemin="0" aria-valuemax="<?php echo $studrows;?>" style="width:<?php echo percentage($stud,$studrows);?>%">
  </div>
</div>			
			  
			 </td>
			  <td>  <?php echo $studdue;?>  (<?php echo percentage($studdue,$studrows);?>%)
			  <div class="progress" id="progress"  >
  <div class="progress-bar" role="progressbar"  aria-valuenow="<?php echo $studdue;?>"
  aria-valuemin="0" aria-valuemax="<?php echo $studrows;?>" style="width:<?php echo percentage($studdue,$studrows);?>%">
  </div>
</div>			</td>
			</tr> 
			
			
			
			 <tr>
			  <td><br/>Employee</td>
			  <td><br/><?php echo $sql['empreg'];?></td>
			  <td><?php echo $sql['empver'];?>  (<?php echo percentage($sql['empver'],$sql['empreg']);?>%)
			  <div class="progress" id="progress"  >
  <div class="progress-bar" role="progressbar"  aria-valuenow="<?php echo $sql['empver'];?>"
  aria-valuemin="0" aria-valuemax="<?php echo $sql['empreg'];?>" style="width:<?php echo percentage($sql['empver'],$sql['empreg']);?>%">
  </div>
</div>
             </td>

			  <td> <?php echo $sql['empdec'];?>  (<?php echo percentage($sql['empdec'],$sql['empreg']);?>%)
			  <div class="progress" id="progress"  >
  <div class="progress-bar" role="progressbar"  aria-valuenow="<?php echo $sql['empdec'];?>"
  aria-valuemin="0" aria-valuemax="<?php echo $sql['empreg'];?>" style="width:<?php echo percentage($sql['empdec'],$sql['empreg']);?>%">
  </div>
</div>			 
</td>
			  <td>	  <?php echo $emp;?>  (<?php echo percentage($emp,$emprows);?>%)
			  <div class="progress" id="progress"  >
  <div class="progress-bar" role="progressbar"  aria-valuenow="<?php echo $emp;?>"
  aria-valuemin="0" aria-valuemax="<?php echo $studrows;?>" style="width:<?php echo percentage($emp,$emprows);?>%">
  </div>
</div>		
			  
			 </td>
			  <td><br/>NA</tr> 

		</table>
		 </div>
		</div>


	<div style="position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;">
	<?php include('footer.php');?>
  </div>
  
</body>
<html>
