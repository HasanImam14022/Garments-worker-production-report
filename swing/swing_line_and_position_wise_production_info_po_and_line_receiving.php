<script>
    
</script>
<?php
session_start();
require_once("../login/session.php");
include('../login/db_connection_class.php');
$obj = new DB_Connection_Class();
$obj->connection();

 $po_number_value = $_POST['po_number'];


?>





<div class="form-group form-group-sm" id="form-group_for_line_number">
	<label class="control-label col-sm-3" for="buyer_name" style="margin-right:0px; color:#00008B;">Line Number:<span style="color:red"> *</span></label>
	<div class="col-sm-6">
		<select  class="form-control for_auto_complete" id="line_number" name="line_number" onchange="swing_line_and_position_wise_production_info_show_position()">
					<option selected="selected" value="select">Select Line Number</option>
					<?php 
							$sql = "select line_number from `swing_line_wise_production_info` where `po_no` = '$po_number_value'";
							$result= mysqli_query($con,$sql) or die(mysqli_error($con));
							while( $row = mysqli_fetch_array($result))
							{

								echo '<option value="'.$row['line_number'].'">'.$row['line_number'].'</option>';

							}

						?>
		</select>

	</div>
</div> 