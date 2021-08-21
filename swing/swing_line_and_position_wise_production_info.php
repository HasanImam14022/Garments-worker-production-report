
<?php
session_start();
require_once("../login/session.php");
include('../login/db_connection_class.php');
$obj = new DB_Connection_Class();
$obj->connection();

 $po_number_value = $_POST['po_number'];
 $line_number_value = $_POST['line_number'];
 
?>



<div class="form-group form-group-sm" id="form-group_for_line_number">
	<label class="control-label col-sm-3" for="line_number" style="margin-right:0px; color:#00008B;">Line Number:<span style="color:red"> *</span></label>
	<div class="col-sm-6">
		<select  class="form-control for_auto_complete" id="line_number" name="line_number" onchange="swing_line_and_position_wise_production_info_show_position()">
					<option select="selected" value="<?php echo $line_number_value?>"><?php echo $line_number_value?></option>
					<?php 
							$sql = "select line_number from `swing_line_wise_production_info` where `po_no` = '$po_number_value'";
							$result= mysqli_query($con,$sql) or die(mysqli_error($con));
							$row = mysqli_fetch_assoc($result);
						
						
							while( $row = mysqli_fetch_array($result))
							{

								echo '<option value="'.$row['line_number'].'">'.$row['line_number'].'</option>';

							}

						?>
		</select>

	</div>
</div> 

<div class="form-group form-group-sm" id="form-group_for_position_in_line">
	<label class="control-label col-sm-3" for="position_in_line" style="margin-right:0px; color:#00008B;">Position In Line:<span style="color:red"> *</span></label>
	<div class="col-sm-6">
		<?php 
			// $sql = "select `start_line`,`end_line` from `swing_line_wise_production_info` where `po_no` = '$po_number_value' and `line_number` = '$line_number_value'";
			// $result= mysqli_query($con,$sql) or die(mysqli_error($con));
			// $row = mysqli_fetch_assoc($result);
			// $start_line = $row['start_line'];
			// $end_line = $row['end_line'];

			// for($i = $start_line; $i<=$end_line; $i++)
			// {
			// //echo '<option value="'.$i.'">'.$i.'</option>';
			
			// 	echo '<button class="btn btn-info" value="'.$i.'">'.$i.'</button>';
			
			// }

		?>
		<select  class="form-control for_auto_complete" id="position_in_line" onchange="positioning_line_wise_update_data()" name="position_in_line">
			<option select="selected" value="select">Select Position In Line</option>
			<?php 
					$sql = "select `start_line`,`end_line` from `swing_line_wise_production_info` where `po_no` = '$po_number_value' and `line_number` = '$line_number_value'";
					$result= mysqli_query($con,$sql) or die(mysqli_error($con));
					$row = mysqli_fetch_assoc($result);
					$start_line = $row['start_line'];
					$end_line = $row['end_line'];

					for($i = $start_line; $i<=$end_line; $i++)
					{
					echo '<option value="'.$i.'">'.$i.'</option>';
					//echo '<button class="btn btn-success" value="'.$i.'">'.$i.'</button>';
					}       

				?>
		</select>

	</div>
</div>

<div id="details_info2">

</div>  

                        




