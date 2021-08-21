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
$alternate_swing_production_date= $_POST['alternate_swing_production_date'];
$splitted_pp_creation_date= explode("/",$swing_production_date);
$swing_production_date= $splitted_pp_creation_date[2]."-".$splitted_pp_creation_date[1]."-".$splitted_pp_creation_date[0];

?>
<form id="swing_report" name="swing_report">
<div class="row">
	<div class="col-md-4 mt-4">
		<div>
			<div><span>Date: </span><span id="date_up"><?php echo $alternate_swing_production_date; ?></span></div>
			<div><span>Total Manpower: </span><span id="total_manpower_up"></span></div>
			<div><span>Avg Working Hour: </span><span id="avg_working_hour_up"></span></div>
		</div>
	</div>
	<div class="col-md-4">
		<h3>Noman Fashion Fabrics Ltd.</h3>
		<p>HOURLY PRODUCTION DISPLAY BOARD</p>
	</div>
	<div class="col-md-4 text-right">
		<div>
			<div><span>Target: </span><span id="target_up"></span></div>
			<div><span>Achieve: </span><span id="achieve_up"></span></div>
			<div><span>Loss: </span><span id="loss_up"></span></div>
		</div>
	</div>
</div>

<button class="btn btn-primary"><a style="text-decoration: none; color: white;" id="downloadLink" onclick="exportF(this)">Excel</a></button>
<table id="datatable-buttons" class="table table-striped table-bordered">
 	<thead>
         <tr>
             <th>Line</th>
             <th>Buyer</th>
             <th>Style No</th>
             <th>Color</th>
             <th>Man Power</th>
             <th>Hourley Target</th>
             <th>Cumulative Target</th>

             <th>Active Hour</th>
             <th>Cumulative Achieve</th>
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

$total_manpower_up = 0;
$avg_working_hour_up = 0;
$target_up = 0;
$achieve_up = 0;
$loss_up = 0;

$sql = "select * from `swing_production_per_hour` where `production_date`= '$swing_production_date' order by line_id asc";
$result = mysqli_query($con, $sql) or die(mysqli_error($con));
$row = mysqli_fetch_array( $result);
$count = 1;
$sl = 01;
$swing_production_info_id_array = array();
while($row = mysqli_fetch_array( $result))
{
	$swing_production_info_id = $row['swing_production_info_id'];
	$line_id = $row['line_id'];
	if ($count == 1) 
	{
		array_push($swing_production_info_id_array, $swing_production_info_id);

		$sql2 = "select * from `swing_production_info` where `id`= '$swing_production_info_id'";
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

		?>
	    	<tr>
	            <td>
	            	<?php 
	            		$sql2 = "SELECT * FROM line_info WHERE id='$line_id'";
	            		$res2 = mysqli_query($con, $sql2);
	            		$row2 = mysqli_fetch_assoc($res2);
	            		echo " Unit:".$row2['unit'].", Line:".$row2['line'].", ".$row2['description'];
	            	?>
	            </td>
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
	            <td><?php echo $manpower; ?></td>
	            <td><?php echo $hourly_target; ?></td>
	            <td><?php echo $cumilitive_target; ?></td>


	            <td ><span id="active_hour_<?php echo $count;?>" ></span></td>
				<td ><span id="cumilitive_achieve_<?php echo $count;?>"></span></td>
				<td ><span id="difference_<?php echo $count;?>"></span></td>
				<td ><span id="achieve_<?php echo $count;?>"> </span></td>
		<?php

		$sql3 = "select * from `swing_production_per_hour` where `production_date`= '$swing_production_date' and `swing_production_info_id` = '$swing_production_info_id' ";
		$result3 = mysqli_query($con,$sql3) or die(mysql_error);

		$active_hour_row = mysqli_num_rows ( $result3 );

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

		$difference_val = $cumilitive_achieve - $cumilitive_target;
		$result_val =( 100 - (($cumilitive_target - $cumilitive_achieve)/ $cumilitive_target) * 100);
		$result_val = number_format((float)$result_val, 2, '.', '');
		$result_val = $result_val.'%';

		$total_manpower_up = $total_manpower_up + $manpower;
		$avg_working_hour_up = $avg_working_hour_up + $active_hour_row;
		$target_up = $target_up + $cumilitive_target;
		$achieve_up = $achieve_up + $cumilitive_achieve;
		$loss_up = $loss_up + $difference_val;

		?>

		</tr>
		<input type="hidden" id="active_hour_value_<?php echo $count;?>" value="<?php echo $active_hour_row; ?>">
		<input type="hidden" id="cumilitive_achieve_value_<?php echo $count;?>" value="<?php echo $cumilitive_achieve; ?>">
		<input type="hidden" id="difference_value_<?php echo $count;?>" value="<?php echo $difference_val; ?>"> 
		<input type="hidden" id="achieve_value_<?php echo $count;?>" value="<?php echo $result_val; ?>">
		<?php
	}
	else
	{
		if (in_array($swing_production_info_id, $swing_production_info_id_array))
		{
			// echo $swing_production_info_id;
			// echo 'array find';

		}
		else
		{
			array_push($swing_production_info_id_array, $swing_production_info_id);
		  	// echo $swing_production_info_id;
		  	// echo 'array not find';

		  	$sql2 = "select * from `swing_production_info` where `id`= '$swing_production_info_id'";
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

			?>
		    	<tr>
		            <td>
		            	<?php 
		            		$sql2 = "SELECT * FROM line_info WHERE id='$line_id'";
		            		$res2 = mysqli_query($con, $sql2);
		            		$row2 = mysqli_fetch_assoc($res2);
		            		echo " Unit:".$row2['unit'].", Line:".$row2['line'].", ".$row2['description'];
		            	?>
		            </td>
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
		            <td><?php echo $manpower; ?></td>
		            <td><?php echo $hourly_target; ?></td>
		            <td><?php echo $cumilitive_target; ?></td>


		            <td ><span id="active_hour_<?php echo $count;?>" ></span></td>
					<td ><span id="cumilitive_achieve_<?php echo $count;?>"></span></td>
					<td ><span id="difference_<?php echo $count;?>"></span></td>
					<td ><span id="achieve_<?php echo $count;?>"> </span></td>
			<?php

			$sql3 = "select * from `swing_production_per_hour` where `production_date`= '$swing_production_date' and `swing_production_info_id` = '$swing_production_info_id' ";
			$result3 = mysqli_query($con,$sql3) or die(mysql_error);

			$active_hour_row = mysqli_num_rows ( $result3 );

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

			$difference_val = $cumilitive_achieve - $cumilitive_target;
			$result_val = ( 100 - (($cumilitive_target - $cumilitive_achieve)/ $cumilitive_target) * 100).'%';
			$result_val = number_format((float)$result_val, 2, '.', '');
			$result_val = $result_val.'%';

			$total_manpower_up = $total_manpower_up + $manpower;
			$avg_working_hour_up = $avg_working_hour_up + $active_hour_row;
			$target_up = $target_up + $cumilitive_target;
			$achieve_up = $achieve_up + $cumilitive_achieve;
			$loss_up = $loss_up + $difference_val;

			?>

			</tr>
			<input type="hidden" id="active_hour_value_<?php echo $count;?>" value="<?php echo $active_hour_row; ?>">
			<input type="hidden" id="cumilitive_achieve_value_<?php echo $count;?>" value="<?php echo $cumilitive_achieve; ?>">
			<input type="hidden" id="difference_value_<?php echo $count;?>" value="<?php echo $difference_val; ?>"> 
			<input type="hidden" id="achieve_value_<?php echo $count;?>" value="<?php echo $result_val; ?>">
			<?php

		}
	}

	++$count;
}

	?>
		<input type="hidden" id="counter" value="<?php echo $count; ?>">

		<input type="hidden" id="total_manpower_up_val" value="<?php echo $total_manpower_up; ?>">
		<input type="hidden" id="avg_working_hour_up_val" value="<?php echo $avg_working_hour_up; ?>">
		<input type="hidden" id="target_up_val" value="<?php echo $target_up; ?>">
		<input type="hidden" id="achieve_up_val" value="<?php echo $achieve_up; ?>">
		<input type="hidden" id="loss_up_val" value="<?php echo $loss_up; ?>">
	<?php
?>

		</tbody>
	</table>
</form>

<script>
	let count = document.querySelector('#counter').value;

	for(var i = 1; i <= count; i++)
	{
		if (document.querySelector('#active_hour_value_'+i)) 
		{
			let active_value = document.querySelector('#active_hour_value_'+i).value;
			let cumilitive_achieve_value = document.querySelector('#cumilitive_achieve_value_'+i).value;
			let difference_value = document.querySelector('#difference_value_'+i).value;
			let achieve_value = document.querySelector('#achieve_value_'+i).value;

			let active = document.querySelector('#active_hour_'+i);
			active.innerHTML = active_value;

			let cumilitive_achieve = document.querySelector('#cumilitive_achieve_'+i);
			cumilitive_achieve.innerHTML = cumilitive_achieve_value;

			let difference = document.querySelector('#difference_'+i);
			difference.innerHTML = difference_value;

			let achieve = document.querySelector('#achieve_'+i);
			achieve.innerHTML = achieve_value;
		}
		
	}

	let total_manpower_up = document.querySelector('#total_manpower_up_val').value;
	let avg_working_hour_up = document.querySelector('#avg_working_hour_up_val').value;
	let target_up = document.querySelector('#target_up_val').value;
	let achieve_up = document.querySelector('#achieve_up_val').value;
	let loss_up = document.querySelector('#loss_up_val').value;

	let total_manpower = document.querySelector('#total_manpower_up');
	total_manpower.innerHTML = total_manpower_up;

	let avg_working_hour = document.querySelector('#avg_working_hour_up');
	avg_working_hour.innerHTML = avg_working_hour_up; 

	let target = document.querySelector('#target_up');
	target.innerHTML = target_up; 

	let achieve = document.querySelector('#achieve_up');
	achieve.innerHTML = achieve_up; 

	let loss = document.querySelector('#loss_up');
	loss.innerHTML = loss_up;
	

// console.log(document.getElementById("active_hour").innerHTML);
// document.getElementById("active_hour").innerHTML(<?php $sl.'.00'; ?>);

function exportF(elem) {
    let table = document.getElementById("swing_report");
    let html = table.innerHTML;
    let url = 'data:application/vnd.ms-excel,' + escape(html); 
    elem.setAttribute("href", url);
    elem.setAttribute("download", "swing_per_day_production_report.xls"); 
    return false;
}
</script>
