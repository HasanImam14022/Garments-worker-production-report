<?php
session_start();
require_once("../login/session.php");
include('../login/db_connection_class.php');
$obj = new DB_Connection_Class();
$obj->connection();

$po_number_value = $_POST['po_number'];


$sql = "SELECT *
		FROM   swing_production_info
		WHERE  po_number = '$po_number_value'
		";
$result_production_info = mysqli_query($con, $sql) or die(mysqli_error($con));
$row1 = mysqli_fetch_array($result_production_info);

$sql = "SELECT *
		FROM   swing_line_wise_production_info
		WHERE  po_no = '$po_number_value'
		";
$result_line_wise_production_info = mysqli_query($con, $sql) or die(mysqli_error($con));
$row2 = mysqli_fetch_array($result_line_wise_production_info);



$swing_start_date = $row1['swing_start_time'];
$swing_end_date = $row1['swing_end_time'];
$po_number = $row1['po_number'];
$buyer_id = $row1['buyer_id'];
$style_id = $row1['style_name_id'];
$color_id = $row1['color_id'];
$manpower_op = $row1['manpower_op'];
$manpower_im = $row1['manpower_im'];
$manpower_hp = $row1['manpower_hp'];
$manpower_mk = $row1['manpower_mk'];
$hourly_target = $row1['hourly_target'];
$cumulative_target = $row1['cumilitive_target'];

?>

<div class="col-sm-12 col-md-12 col-lg-12">

	<div class="panel panel-default"> 

                <br><br>

				<form class="form-horizontal" action="" style="margin-top:10px;" name="swing_production_info_form" id="swing_production_info_form">

						<div class="form-group form-group-sm " id="form-group_for_pp_creation_date">
								<label class="control-label col-sm-3" for="swing_start_date" style="color:#00008B;">Sewing Start Date:<span style="color:red"> *</span></label>
								
								<div class="col-sm-3 row nopadding">
									<input type="text" class="form-control" id="alternate_swing_end_date" name="alternate_swing_end_date" value="<?php echo $swing_end_date?>" readonly>
								</div>
								
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_pp_creation_date"> -->
								<script>
									$( function()
									{
										$( "#swing_start_date" ).datepicker(
										{
											showWeek: true, // This is for Showing Week in Datepicker Calender.
											altField: "#alternate_swing_start_date", // This is for Descriptive Date Showing in Alternative Field.
											altFormat: "DD, d MM, yy" // This is for Descriptive Date Format in Alternative Field.
										}
										); // End of $( "#pp_creation_date" ).datepicker(

										$( "#swing_start_date" ).datepicker( "option", "dateFormat", "dd/mm/yy" ); // This is for Date Format in Actual Date Field.
										$( "#swing_start_date" ).datepicker( "option", "showAnim", "drop" ); // This is for Datepicker Calender Animation in Actual Date Field.
									}
									); // End of $( function()
								</script>


						<div class="form-group form-group-sm " id="form-group_for_pp_creation_date">
								<label class="control-label col-sm-3" for="swing_end_date" style="color:#00008B;">Sewing End Date:<span style="color:red"> *</span></label>
								
								<div class="col-sm-3 row nopadding">
									<input type="text" class="form-control" id="alternate_swing_end_date" name="alternate_swing_end_date" value="<?php echo $swing_end_date?>" readonly>
								</div>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_pp_creation_date"> -->
								<script>
									$( function()
									{
										$( "#swing_end_date" ).datepicker(
										{
											showWeek: true, // This is for Showing Week in Datepicker Calender.
											altField: "#alternate_swing_end_date", // This is for Descriptive Date Showing in Alternative Field.
											altFormat: "DD, d MM, yy" // This is for Descriptive Date Format in Alternative Field.
										}
										); // End of $( "#pp_creation_date" ).datepicker(

										$( "#swing_end_date" ).datepicker( "option", "dateFormat", "dd/mm/yy" ); // This is for Date Format in Actual Date Field.
										$( "#swing_end_date" ).datepicker( "option", "showAnim", "drop" ); // This is for Datepicker Calender Animation in Actual Date Field.
									}
									); // End of $( function()
								</script>

						<div class="form-group form-group-sm" id="form-group_for_pp_number">
								<label class="control-label col-sm-3" for="po_number" style="color:#00008B;">PO Number: </label>
								<div class="col-sm-3 row nopadding">
									<input type="text" class="form-control" id="alternate_swing_end_date" name="alternate_swing_end_date" value="<?php echo $po_number?>" readonly>
								</div>
						</div> 

                         
						


						<div class="form-group form-group-sm" id="form-group_for_customer_name">
						  <label class="control-label col-sm-3" for="buyer_name" style="margin-right:0px; color:#00008B;">Buyer Name:<span style="color:red"> *</span></label>
							<div class="col-sm-6">
								<?php 
									$sql = "select buyer_name from `buyer` where `buyer_id` = '$buyer_id'";
									$result = mysqli_query($con,$sql) or die(mysqli_error($con));
									while( $row = mysqli_fetch_array( $result))
									{

										//echo '<option value="'.$row['buyer_name'].'">'.$row['buyer_name'].'</option>';
										?>
											<div class="col-sm-3 row nopadding">
												<input type="text" class="form-control" id="buyer_name" name="buyer_name" value="<?php echo $row['buyer_name']?>" readonly>
											</div>
										<?php
									}
									
								?>
							</div>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_customer_name"> -->


						<div class="form-group form-group-sm" id="form-group_for_customer_name">
						   <label class="control-label col-sm-3" for="style_no" style="margin-right:0px; color:#00008B;">Style Name:<span style="color:red"> *</span></label>
							<div class="col-sm-6">
								
                                <?php 
                                    $sql = "select style_name from `style_name` where `style_id` = '$style_id'";
                                    $result = mysqli_query($con,$sql) or die(mysqli_error($con));
                                    while( $row = mysqli_fetch_array( $result))
                                    {

                                        //echo '<option value="'.$row['buyer_name'].'">'.$row['buyer_name'].'</option>';
                                        ?>
                                            <div class="col-sm-3 row nopadding">
                                                <input type="text" class="form-control" id="buyer_name" name="buyer_name" value="<?php echo $row['style_name']?>" readonly>
                                            </div>
                                        <?php
                                    }
                                    
                                ?>
				
							</div>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_customer_name"> -->


						<div class="form-group form-group-sm" id="form-group_for_customer_name">
						   <label class="control-label col-sm-3" for="color" style="margin-right:0px; color:#00008B;">Color:<span style="color:red"> *</span></label>
							<div class="col-sm-6">
                               <?php 
                                    $sql = "select color_name from `color` where `color_id` = '$color_id'";
                                    $result = mysqli_query($con,$sql) or die(mysqli_error($con));
                                    while( $row = mysqli_fetch_array( $result))
                                    {

                                        //echo '<option value="'.$row['buyer_name'].'">'.$row['buyer_name'].'</option>';
                                        ?>
                                            <div class="col-sm-3 row nopadding">
                                                <input type="text" class="form-control" id="color_name" name="color_name" value="<?php echo $row['color_name']?>" readonly>
                                            </div>
                                        <?php
                                    }
                                    
                                ?>
							</div>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_customer_name"> -->

						<!-- <div class="form-group form-group-sm" id="form-group_for_pp_number">
								<label class="control-label col-sm-3" for="manpower" style="color:#00008B;">Manpower:<span style="color:red"> *</span></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="manpower" name="manpower" placeholder="Enter Manpower" required>
								</div>
								<i class="glyphicon glyphicon-remove" onclick="Remove_Value_Of_This_Element('manpower')"></i>
						</div> End of <div class="form-group form-group-sm" id="form-group_for_pp_number"> -->

						


						<div class="form-group form-group-sm" >
				      
						  <label class="control-label col-sm-3" for="manpower" style="color:#00008B;">Manpower:<span style="color:red"> *</span></label>
			
					    
					       
					           <div class="col-sm-1 text-center">

							   
					               OP<input class="form-control input-sm" type="text" id="manpower_op" name="manpower_op" value="<?php echo $manpower_op?>" readonly>

					           </div>

					       

					           <div class="col-sm-1 text-center">
					               IM<input class="form-control input-sm" type="text" id="manpower_im" name="manpower_im" value="<?php echo $manpower_im?>" readonly>
					             
					           </div>
					            
					             
					          <div class="col-sm-1 text-center">
					               HP<input class="form-control input-sm" type="text" id="manpower_hp" name="manpower_hp" value="<?php echo $manpower_hp?>" readonly>
					              
					           </div>

							   <div class="col-sm-1 text-center">
					               MK<input class="form-control input-sm" type="text" id="manpower_mk" name="manpower_mk" value="<?php echo $manpower_mk?>" readonly>
					              
					           </div>
					            
					                 <!--Add Input/Select Field Here No Dive Only Input/Select/Radio Button/Checkbox/Textarea -->
					              
					          <!-- <div class="col-sm-1" for="measurement_of_cartoon_ply">

						          	<select  class="form-control" id="measurement_of_cartoon_ply" name="measurement_of_cartoon_ply">
												<option select="selected" value="select">Select No of Ply</option>
												<option value="3">3</option>
												<option value="5">5</option>
												<option value="7">7</option>
									</select>

					            
					          </div> -->

						</div>  
				                
				       
		


						<div class="form-group form-group-sm" id="form-group_for_pp_number">
								<label class="control-label col-sm-3" for="hourly_target" style="color:#00008B;">Hourly Target:<span style="color:red"> *</span></label>
								<div class="col-sm-3 row nopadding">
									<input type="text" class="form-control" id="alternate_swing_end_date" name="alternate_swing_end_date" value="<?php echo $hourly_target?>" readonly>
								</div>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_pp_number"> -->

						<div class="form-group form-group-sm" id="form-group_for_pp_number">
								<label class="control-label col-sm-3" for="cumilitive_target" style="color:#00008B;">Cumulative Target:<span style="color:red"> *</span></label>
								<div class="col-sm-3 row nopadding">
									<input type="text" class="form-control" id="alternate_swing_end_date" name="alternate_swing_end_date" value="<?php echo $cumulative_target?>" readonly>
								</div>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_pp_number"> -->

				</form>

	</div>
	<div class="form-group form-group-sm"  id="database_table">
            <table id="datatable-buttons" class="table table-striped table-bordered">
				<thead>
					<tr>
					<th>SI</th>
					<th>Line Number</th>
					<th>Start Line</th>
					<th>End Line</th>
					</tr>
				</thead>
                <tbody>

					<?php 
						$s1 = 1;
						$sql_for_line_wise_production_info = "SELECT * FROM `swing_line_wise_production_info`  where `po_no` = '$po_number_value'";

						$result_line_wise_production_info = mysqli_query($con, $sql_for_line_wise_production_info);

						while ($row = mysqli_fetch_array($result_line_wise_production_info)) 
						{
					?>

					<tr>
						<td width="45"><?php echo $s1; ?></td>

							<td class="align-middle">
							    <input type="text" class="form-control" value="<?php echo $row['line_number']?>"  readonly>	
							</td>

							<td align="center">
								<input type="text" class="form-control"  value="<?php echo $row['start_line']?>" readonly>
							</td>

							<td>
								<input type="text" class="form-control"  value="<?php echo $row['end_line']?>" readonly>
							</td>
						
						<?php
								
					    $s1++;
					    }
					?> 
				 </tr>
              </tbody>
          </table>
		</div>  	

         	<script>
	                $(document).ready(function() {
	              $('#datatable-buttons').DataTable( {
	                  initComplete: function () {
	                      this.api().columns().every( function () {
	                          var column = this;
	                          var select = $('<select><option value=""></option></select>')
	                              .appendTo( $(column.footer()).empty() )
	                              .on( 'change', function () {
	                                  var val = $.fn.dataTable.util.escapeRegex(
	                                      $(this).val()
	                                  );
	           
	                                  column
	                                      .search( val ? '^'+val+'$' : '', true, false )
	                                      .draw();
	                              } );
	           
	                          column.data().unique().sort().each( function ( d, j ) {
	                              select.append( '<option value="'+d+'">'+d+'</option>' )
	                          } );
	                      } );
	                  }
	               } );
	            } );
	        </script>

</div> <!-- End of <div class="col-sm-12 col-md-12 col-lg-12"> -->