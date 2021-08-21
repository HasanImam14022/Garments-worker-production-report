<?php
session_start();
require_once("../login/session.php");
include('../login/db_connection_class.php');
$obj = new DB_Connection_Class();
$obj->connection();

// $pp_number = $row['pp_number'];
// $customer_name = $row['customer_name'];
// $customer_id = $row['customer_id'];
// $work_order_number = $row['work_order_number'];
// $gd_number = $row['gd_number'];
// $construction = $row['construction'];
// $finish_width_in_inch = $row['finish_width_in_inch'];
// $roll_no = $row['roll_no'];
// $kgs = $row['kgs'];
// $composition = $row['composition'];
// $shade = $row['shade'];
// $weave = $row['weave'];
// $length = $row['length'];
// $finished_type = $row['finished_type'];

?>
<script>
function change_po_number()
{
	var po_number = document.getElementById("po_number").value;
 	$.ajax({
	 		url: 'swing/swing_line_wise_production_info_report_details.php',
	 		dataType: 'text',
	 		type: 'post',
	 		contentType: 'application/x-www-form-urlencoded',
	 		data: {po_number: po_number},
	 		success: function( data, textStatus, jQxhr )
	 		{
	 				// alert(data);
	 				document.getElementById('details_info').innerHTML=data;
	 				$('.for_auto_complete').chosen();
	 		},
	 		error: function( jqXhr, textStatus, errorThrown )
	 		{
	 				//console.log( errorThrown );
	 				alert(errorThrown);
	 		}
	 }); // End of $.ajax({
}
</script>

<div class="col-sm-12 col-md-12 col-lg-12">

		<div class="panel panel-default"> <!-- This div will create a block/panel for FORM -->

				<div class="panel-heading" style="color:#191970;"><b>Showing Line Wise Production Info</b></div> <!-- This will create a upper block for FORM (Just Beautification) -->

				<form class="form-horizontal" action="" style="margin-top:10px;" name="item_receiving_form" id="item_receiving_form">

					<div class="form-group form-group-md" id="form-group_for_received_by">
						<label class="control-label col-md-3" for="po_number" style="margin-right:0px; color:#00008B;">PO Number:</label>
							<div class="col-md-5 field_container">
								<select  class="form-control for_auto_complete" id="po_number" name="po_number" onchange="change_po_number()">
											<option selected="selected" value="select">Select PO Number</option>
											<?php 
												 $sql = 'select * from `swing_production_info` order by `id`';
												 $result= mysqli_query($con,$sql) or die(mysqli_error($con));
												 while( $row = mysqli_fetch_array($result))
												 {

													 echo '<option value="'.$row['po_number'].'">'.$row['po_number'].'</option>';

												 }

											 ?>
								</select>
							</div>
					</div>
                    <div id="details_info">
						
                    </div>    
                </form>  
        </div>
</div>                 
