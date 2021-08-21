<?php
session_start();
require_once("../login/session.php");
include('../login/db_connection_class.php');
$obj = new DB_Connection_Class();
$obj->connection();



$data_previously_saved = "No";
$data_insertion_hampering = "No";
/*$user_name ="Iftekhar";
$user_id ="Iftekhar";
$password ="1234";*/

$user_id = $_SESSION['user_id'];
$password = $_SESSION['password'];
$user_name = $_SESSION['user_name'];


$swing_production_date= $_POST['swing_production_date'];
$splitted_pp_creation_date= explode("/",$swing_production_date);
$swing_production_date= $splitted_pp_creation_date[2]."-".$splitted_pp_creation_date[1]."-".$splitted_pp_creation_date[0];

?>
<form id="swing_report" name="swing_report">
<button class="btn btn-primary"><a style="text-decoration: none; color: white;" id="downloadLink" onclick="exportF(this)">Excel</a></button>
<table id="datatable-buttons" class="table table-striped table-bordered">
 	<thead>
         <tr>
             <th>SI</th>
             <th>Line</th>
             <th>Buyer</th>
             <th>Style No</th>
             <th>Color</th>
             <th>Man Power</th>
             <th>Hourley Target</th>
             <th>Cumilitive Target</th>

             <th>Active Hour</th>
             <th>Cumilitive Achieve</th>
             <th>Difference</th>
             <th>%Achieve</th>

             <th>1st Hour</th>
             <th>2nd Hour</th>
             <th>3rd Hour</th>
             <th>4th Hour</th>
             <th>5th Hour</th>
             <th>6th Hour</th>
             <th>7th Hour</th>
             <th>8th Hour</th>
             <th>9th Hour</th>
             <th>10th Hour</th>
             <th>11th Hour</th>
             <th>12th Hour</th>
             <th>13th Hour</th>
             <th>14th Hour</th>
             <th>15th Hour</th>

         </tr>
    </thead>
    <tbody>

<?php

$sql = "select * from `swing_production_per_hour` where `production_date`= '$swing_production_date' ";
$result = mysqli_query($con, $sql) or die(mysql_error);
$row = mysqli_fetch_array( $result);

// while($row = mysqli_fetch_array( $result))
// {

	$swing_production_info_id = $row['swing_production_info_id'];

	$sql2 = "select * from `swing_production_info` where `id`= '$swing_production_info_id' ";
	$result2= mysqli_query($con,$sql2) or die(mysql_error);
	$row2 = mysqli_fetch_array( $result2);

	$buyer_id = $row2['buyer_id'];
	$style_id = $row2['style_name_id'];
	$color_id = $row2['color_id'];
	$manpower = $row2['manpower'];
	$hourly_target = $row2['hourly_target'];
	$cumilitive_target = $row2['cumilitive_target'];
	$line_id = $row2['line_id'];
	$swing_production_date;
	$swing_production_info_id;

	$active_hour = 0;
	$cumilitive_achieve = 0;
	$difference = 0;
	$achieve = 0;

	$hour1 = 0;
	$hour2 = 0;
	$hour3 = 0;
	$hour4 = 0;
	$hour5 = 0;
	$hour6 = 0;
	$hour7 = 0;
	$hour8 = 0;
	$hour9 = 0;
	$hour10 = 0;
	$hour11 = 0;
	$hour12 = 0;
	$hour13 = 0;
	$hour14 = 0;
	$hour15 = 0;

	$sl = 01;
	$sql3 = "select * from `swing_production_per_hour` where `production_date`= '$swing_production_date' ";
	$result3 = mysqli_query($con,$sql3) or die(mysql_error);

	?>
	    	<tr>
	            <td width="50"><?php echo $sl; ?></td>
	            <td width="50">
	            	<?php 
	            		$sql2 = "SELECT * FROM buyer WHERE buyer_id='$buyer_id'";
	            		$res2 = mysqli_query($con, $sql2);
	            		$row2 = mysqli_fetch_assoc($res2);
	            		echo $row2['buyer_name']; 
	            	?>	
	            </td>
	            <td width="50">
	            	<?php 
	            		$sql2 = "SELECT * FROM style_name WHERE style_id='$style_id'";
	            		$res2 = mysqli_query($con, $sql2);
	            		$row2 = mysqli_fetch_assoc($res2);
	            		echo $row2['style_name']; 
	            	?>
	            </td>
	            <td>
	            	<?php 
	            		$sql2 = "SELECT * FROM color WHERE color_id='$color_id'";
	            		$res2 = mysqli_query($con, $sql2);
	            		$row2 = mysqli_fetch_assoc($res2);
	            		echo $row2['color_name'];
	            	?>
	            </td>
	            <td>
	            	<?php 
	            		$sql2 = "SELECT * FROM line_info WHERE id='$line_id'";
	            		$res2 = mysqli_query($con, $sql2);
	            		$row2 = mysqli_fetch_assoc($res2);
	            		echo " Unit:".$row2['unit'].", Line:".$row2['line'].", ".$row2['description'];
	            	?>
	            </td>
	            <td><?php echo $manpower; ?></td>
	            <td><?php echo $hourly_target; ?></td>
	            <td><?php echo $cumilitive_target; ?></td>


	            <td ><span id="active_hour" ></span></td>
				<td ><span id="cumilitive_achieve"></span></td>
				<td ><span id="difference"></span></td>
				<td ><span id="achieve"> </span></td>
	<?php

	while($row3 = mysqli_fetch_array( $result3))
	{

		$hour = $sl.' Hour';
		$garments = $row3['garments'];
		$cumilitive_achieve += $garments;
		if ($sl == '01' && $hour1 == 0) 
		{
			?>
				<td><?php echo $garments; ?></td>
			<?php
			$hour1 = 1;
		}

		else if ($sl == '02' && $hour2 == 0) 
		{
			?>
				<td><?php echo $garments; ?></td>
			<?php
			$hour2 = 1;
		}

		else if ($sl == '03' && $hour3 == 0) 
		{
			?>
				<td><?php echo $garments; ?></td>
			<?php
			$hour3 = 1;
		}

		else if ($sl == '04' && $hour4 == 0) 
		{
			?>
				<td><?php echo $garments; ?></td>
			<?php
			$hour4 = 1;
		}

		else if ($sl == '05' && $hour5 == 0) 
		{
			?>
				<td><?php echo $garments; ?></td>
			<?php
			$hour5 = 1;
		}

		else if ($sl == '06' && $hour6 == 0) 
		{
			?>
				<td><?php echo $garments; ?></td>
			<?php
			$hour6 = 1;
		}

		else if ($sl == '07' && $hour7 == 0) 
		{
			?>
				<td><?php echo $garments; ?></td>
			<?php
			$hour7 = 1;
		}

		else if ($sl == '08' && $hour8 == 0) 
		{
			?>
				<td><?php echo $garments; ?></td>
			<?php
			$hour8 = 1;
		}

		else if ($sl == '09' && $hour9 == 0) 
		{
			?>
				<td><?php echo $garments; ?></td>
			<?php
			$hour9 = 1;
		}

		else if ($sl == '10' && $hour10 == 0) 
		{
			?>
				<td><?php echo $garments; ?></td>
			<?php
			$hour10 = 1;
		}

		else if ($sl == '11' && $hour11 == 0) 
		{
			?>
				<td><?php echo $garments; ?></td>
			<?php
			$hour11 = 1;
		}

		else if ($sl == '12' && $hour12 == 0) 
		{
			?>
				<td><?php echo $garments; ?></td>
			<?php
			$hour12 = 1;
		}

		else if ($sl == '13' && $hour13 == 0) 
		{
			?>
				<td><?php echo $garments; ?></td>
			<?php
			$hour13 = 1;
		}

		else if ($sl == '14' && $hour14 == 0) 
		{
			?>
				<td><?php echo $garments; ?></td>
			<?php
			$hour14 = 1;
		}

		else if ($sl == '15' && $hour15 == 0) 
		{
			?>
				<td><?php echo $garments; ?></td>
			<?php
			$hour15 = 1;
		}

		++$sl;
	}

	if ($hour1 == 0) 
	{
		?>
			<td></td>
		<?php
	}
	if ($hour2 == 0) 
	{
		?>
			<td></td>
		<?php
	}
	if ($hour3 == 0) 
	{
		?>
			<td></td>
		<?php
	}
	if ($hour4 == 0) 
	{
		?>
			<td></td>
		<?php
	}
	if ($hour5 == 0) 
	{
		?>
			<td></td>
		<?php
	}
	if ($hour6 == 0) 
	{
		?>
			<td></td>
		<?php
	}
	if ($hour7 == 0) 
	{
		?>
			<td></td>
		<?php
	}
	if ($hour8 == 0) 
	{
		?>
			<td></td>
		<?php
	}
	if ($hour9 == 0) 
	{
		?>
			<td></td>
		<?php
	}
	if ($hour10 == 0) 
	{
		?>
			<td></td>
		<?php
	}
	if ($hour11 == 0) 
	{
		?>
			<td></td>
		<?php
	}

	if ($hour12 == 0) 
	{
		?>
			<td></td>
		<?php
	}

	if ($hour13 == 0) 
	{
		?>
			<td></td>
		<?php
	}

	if ($hour14 == 0) 
	{
		?>
			<td></td>
		<?php
	}

	if ($hour15 == 0) 
	{
		?>
			<td></td>
		<?php
	}

	?>
					<input type="hidden" id="active_hour_value" value="<?php echo $sl; ?>">
					<input type="hidden" id="cumilitive_achieve_value" value="<?php echo $cumilitive_achieve; ?>">
					<input type="hidden" id="difference_value" value="<?php echo $cumilitive_achieve - $cumilitive_target; ?>"> 
					<input type="hidden" id="achieve_value" value="<?php echo $result =( 100 - (($cumilitive_target - $cumilitive_achieve)/ $cumilitive_target) * 100).'%'; ?>">

				</tr>
			<?php //} ?>
		</tbody>
	</table>
</form>

<script>
	let active_value = document.querySelector('#active_hour_value').value;
	let cumilitive_achieve_value = document.querySelector('#cumilitive_achieve_value').value;
	let difference_value = document.querySelector('#difference_value').value;
	let achieve_value = document.querySelector('#achieve_value').value;

	let active = document.querySelector('#active_hour');
	active.innerHTML = active_value;

	let cumilitive_achieve = document.querySelector('#cumilitive_achieve');
	cumilitive_achieve.innerHTML = cumilitive_achieve_value;

	let difference = document.querySelector('#difference');
	difference.innerHTML = difference_value;

	let achieve = document.querySelector('#achieve');
	achieve.innerHTML = achieve_value;

// console.log(document.getElementById("active_hour").innerHTML);
// document.getElementById("active_hour").innerHTML(<?php $sl.'.00'; ?>);

function exportF(elem) {
    var table = document.getElementById("swing_report");
    var html = table.innerHTML;
    var url = 'data:application/vnd.ms-excel,' + escape(html); 
    elem.setAttribute("href", url);
    elem.setAttribute("download", "swing_per_day_production_report.xls"); 
    return false;
}
</script>
