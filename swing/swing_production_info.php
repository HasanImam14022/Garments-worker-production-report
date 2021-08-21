<?php
session_start();
require_once("../login/session.php");
include('../login/db_connection_class.php');
$obj = new DB_Connection_Class();
$obj->connection();
/*
$user_id = $_SESSION['user_id'];
$password = $_SESSION['password'];

$sql="select * from hrm_info.user_login where user_id='$user_id' and `password`='$password'";

$result=mysqli_query($con,$sql) or die(mysql_error());
if(mysql_num_rows($result)<1)
{

	header('Location:logout.php');

}
*/
?>
<script type='text/javascript' src='swing/swing_production_info_form_validation.js'></script>

<style>

.form-group		/* This is for reducing Gap among Form's Fields */
{

	margin-bottom: 5px;

}
.row.no-gutter {
  margin-left: 0;
  margin-right: 0;
}

</style>

<script>

function Remove_Value_Of_This_Element(element_name)
{

	 document.getElementById(element_name).value='';
	 var alternate_field_of_date = "alternate_"+element_name;

	 if(typeof(alternate_field_of_date) != 'undefined' && alternate_field_of_date != null) // This is for deleting Alternative Field of Date if exists
	 {
		document.getElementById(alternate_field_of_date).value='';
	 }

}

function Reset_Radio_Button(radio_element)
{

		var radio_btn = document.getElementsByName(radio_element);
		for(var i=0;i<radio_btn.length;i++) 
		{
				radio_btn[i].checked = false;
		}


}

function Reset_Checkbox(checkbox_element)
{
		for(var i=0;i<checkbox_element.length;i++)
		{

				checkbox_element[i].checked = false;

		}
}

function mouseover()
{
  document.getElementById("span_id").style.display="block";
}

function mouseout()
{
  document.getElementById("span_id").style.display="none";
}


 function sending_data_of_swing_production_info_form_for_saving_in_database()
 {


       var validate = Swing_Production_Info_Form_Validation();
       var url_encoded_form_data = $("#swing_production_info_form").serialize(); //This will read all control elements value of the form	
       if(validate != false)
	   {


		  	 $.ajax({
			 		url: 'swing/swing_production_info_saving.php',
			 		dataType: 'text',
			 		type: 'post',
			 		contentType: 'application/x-www-form-urlencoded',
			 		data: url_encoded_form_data,
			 		success: function( data, textStatus, jQxhr )
			 		{
			 				alert(data);
			 				$("#database_table").load("swing_production_info.php")
			 				 // if(data== "Data is successfully saved.")
				     //          {  
					    //             var url_encoded_form_data = $("#process_program_info_form").serialize();

					    //             $.ajax({
					    //             url: 'process_program/returning_row_id_for_process_program_info.php',
					    //             dataType: 'text',
					    //             type: 'post',
					    //             contentType: 'application/x-www-form-urlencoded',
					    //             data: url_encoded_form_data,
					    //             success: function( data, textStatus, jQxhr )
					    //             { 


					    //               /*alert(data);*/
					    //               $('#element').load('process_program/process_program_info_preview.php?pp_num_id='+data);
					    //               $('#div_table').hide();

					                    
					    //             },
					    //             error: function( jqXhr, textStatus, errorThrown )
					    //             {
					       
					    //                 alert(errorThrown);
					    //             }
					    //          }); // End of $.ajax({
				     //          }
			 		},
			 		error: function( jqXhr, textStatus, errorThrown )
			 		{
			 				//console.log( errorThrown );
			 				alert(errorThrown);
			 		}
			 }); // End of $.ajax({

       }//End of if(validate != false)

 }//End of function sending_data_of_process_program_info_form_for_saving_in_database()


 function sending_data_for_delete(row_id)
 {
      
       var url_encoded_form_data = 'row_id='+row_id;
       
		  	 $.ajax({
			 		url: 'swing/deleting_swing_production_info.php',
			 		dataType: 'text',
			 		type: 'post',
			 		contentType: 'application/x-www-form-urlencoded',
			 		data: url_encoded_form_data,
			 		success: function( data, textStatus, jQxhr )
			 		{
			 				alert(data);

			 		},
			 		error: function( jqXhr, textStatus, errorThrown )
			 		{
			 				//console.log( errorThrown );
			 				alert(errorThrown);
			 		}
			 }); // End of $.ajax({



 }//End of function sending_data_for_delete()


 /***************************************************** FOR AUTO COMPLETE********************************************************************/

$('.for_auto_complete').chosen();


/***************************************************** FOR AUTO COMPLETE********************************************************************/

</script>



<div class="col-sm-12 col-md-12 col-lg-12">

		<div class="panel panel-default"> <!-- This div will create a block/panel for FORM -->

            <div id="element">

				<div class="panel-heading" style="color:#191970;"><b>Sewing Production Info</b></div> <!-- This will create a upper block for FORM (Just Beautification) -->

				<nav aria-label="breadcrumb">
					  <ol class="breadcrumb">
					    <li class="breadcrumb-item active" aria-current="page">Home</li>
					    <li class="breadcrumb-item"><a onclick="load_page('swing/swing_production_info.php')">Sewing Production Info</a></li>
					  </ol>
				 </nav>

				<form class="form-horizontal" action="" style="margin-top:10px;" name="swing_production_info_form" id="swing_production_info_form">

						<div class="form-group form-group-sm " id="form-group_for_pp_creation_date">
								<label class="control-label col-sm-3" for="swing_start_date" style="color:#00008B;">Sewing Start Date:<span style="color:red"> *</span></label>
								
								<div class="col-sm-3">
									<input type="text" class="form-control" id="swing_start_date" name="swing_start_date" placeholder="Enter Sewing Start Date" required>
								</div>
								<div class="col-sm-3 row nopadding">
									<input type="text" class="form-control" id="alternate_swing_start_date" name="alternate_swing_start_date" readonly>
								</div>
								<i class="glyphicon glyphicon-remove" onclick="Remove_Value_Of_This_Element('swing_start_date')"></i>
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
								
								<div class="col-sm-3">
									<input type="text" class="form-control" id="swing_end_date" name="swing_end_date" placeholder="Enter Sewing End Date" required>
								</div>
								<div class="col-sm-3 row nopadding">
									<input type="text" class="form-control" id="alternate_swing_end_date" name="alternate_swing_end_date" readonly>
								</div>
								<i class="glyphicon glyphicon-remove" onclick="Remove_Value_Of_This_Element('swing_end_date')"></i>
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
								<div class="col-sm-6">
									<input type="text" class="form-control" id="po_number" name="po_number" placeholder="Enter PO Numbar">
								</div>
								<i class="glyphicon glyphicon-remove" onclick="Remove_Value_Of_This_Element('po_number')"></i>
						</div> 

                         
						


						<div class="form-group form-group-sm" id="form-group_for_customer_name">
						<label class="control-label col-sm-3" for="buyer_name" style="margin-right:0px; color:#00008B;">Buyer Name:<span style="color:red"> *</span></label>
							<div class="col-sm-6">
								<select  class="form-control for_auto_complete" id="buyer_name" name="buyer_name">
											<option select="selected" value="select">Select Customer Name</option>
											<?php 
												 $sql = 'select * from `buyer` order by `buyer_name`';
												 $result= mysqli_query($con,$sql) or die(mysql_error);
												 while( $row = mysqli_fetch_array( $result))
												 {

													 echo '<option value="'.$row['buyer_id'].'">'.$row['buyer_name'].'</option>';

												 }

											 ?>
								</select>
							</div>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_customer_name"> -->


						<div class="form-group form-group-sm" id="form-group_for_style_name">
						<label class="control-label col-sm-3" for="style_no" style="margin-right:0px; color:#00008B;">Style No:<span style="color:red"> *</span></label>
							<div class="col-sm-6">
								<select  class="form-control for_auto_complete" id="style_no" name="style_no">
											<option select="selected" value="select">Select Style No</option>
											<?php 
												 $sql = 'select * from `style_name` order by `style_name`';
												 $result= mysqli_query($con,$sql) or die(mysql_error);
												 while( $row = mysqli_fetch_array( $result))
												 {

													 echo '<option value="'.$row['style_id'].'">'.$row['style_name'].'</option>';

												 }

											 ?>
								</select>
							</div>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_customer_name"> -->


						<div class="form-group form-group-sm" id="form-group_for_color_name">
						<label class="control-label col-sm-3" for="color" style="margin-right:0px; color:#00008B;">Color:<span style="color:red"> *</span></label>
							<div class="col-sm-6">
								<select  class="form-control for_auto_complete" id="color" name="color">
											<option select="selected" value="select">Select Color</option>
											<?php 
												 $sql = 'select * from `color` order by `color_name`';
												 $result= mysqli_query($con,$sql) or die(mysql_error);
												 while( $row = mysqli_fetch_array( $result))
												 {

													 echo '<option value="'.$row['color_id'].'">'.$row['color_name'].'</option>';

												 }

											 ?>
								</select>
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

							   
					               OP<input class="form-control input-sm" type="text" id="manpower_op" name="manpower_op">

					           </div>

					       

					           <div class="col-sm-1 text-center">
					               IM<input class="form-control input-sm" type="text" id="manpower_im" name="manpower_im">
					             
					           </div>
					            
					             
					          <div class="col-sm-1 text-center">
					               HP<input class="form-control input-sm" type="text" id="manpower_hp" name="manpower_hp" >
					              
					           </div>

							   <div class="col-sm-1 text-center">
					               MK<input class="form-control input-sm" type="text" id="manpower_mk" name="manpower_mk" >
					              
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
								<div class="col-sm-6">
									<input type="text" class="form-control" id="hourly_target" name="hourly_target" placeholder="Enter Hourly Target" required>
								</div>
								<i class="glyphicon glyphicon-remove" onclick="Remove_Value_Of_This_Element('hourly_target')"></i>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_pp_number"> -->

						<div class="form-group form-group-sm" id="form-group_for_pp_number">
								<label class="control-label col-sm-3" for="cumilitive_target" style="color:#00008B;">Cumulative Target:<span style="color:red"> *</span></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="cumilitive_target" name="cumilitive_target" placeholder="Enter Cumilitive Target" required>
								</div>
								<i class="glyphicon glyphicon-remove" onclick="Remove_Value_Of_This_Element('cumilitive_target')"></i>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_pp_number"> -->


						<div class="form-group form-group-sm">
								<div class="col-sm-offset-3 col-sm-6">
									<button type="button" class="btn btn-primary" onClick="sending_data_of_swing_production_info_form_for_saving_in_database()">Submit</button>
									<button type="reset" class="btn btn-success">Reset</button>
								</div>
						</div>

				</form>

		</div> <!-- End of <div class="panel panel-default"> -->



	  <div class="panel panel-default" id="div_table">

	  	
        <div class="form-group form-group-sm">
	          <label class="control-label col-sm-5" for="search">Sewing Production Info List</label>
	    </div> <!-- End of <div class="form-group form-group-sm" -->


        <div class="form-group form-group-sm"  id="database_table">
         <table id="datatable-buttons" class="table table-striped table-bordered">
         	<thead>
                 <tr>
                 <th>SI</th>
                 <th>PO Number</th>
                 <th>Buyer Name</th>
                 <th>Style No</th>
                 <th>Color</th>
                 <th>Man Power</th>
                 <th>Hourley Target</th>
                 <th>Cumulative Target</th>
                 <th>Action</th>
                 </tr>
            </thead>
            <tbody>
            <?php 
                $s1 = 1;
                $sql_for_color = "SELECT * FROM swing_production_info ORDER BY id DESC";

                $res_for_color = mysqli_query($con, $sql_for_color);

                while ($row = mysqli_fetch_assoc($res_for_color)) 
                {
             ?>

             <tr>
                <td width="50"><?php echo $s1; ?></td>
                <td><?php echo $row['po_number']; ?></td>
                <td width="50">
                	<?php 
                		$buyer_id = $row['buyer_id']; 
                		$sql2 = "SELECT * FROM buyer WHERE buyer_id='$buyer_id'";
                		$res2 = mysqli_query($con, $sql2);
                		$row2 = mysqli_fetch_assoc($res2);
                		echo $row2['buyer_name']; 
                	?>	
                </td>
                <td width="50">
                	<?php 
                		$style_id = $row['style_name_id']; 
                		$sql2 = "SELECT * FROM style_name WHERE style_id='$style_id'";
                		$res2 = mysqli_query($con, $sql2);
                		$row2 = mysqli_fetch_assoc($res2);
                		echo $row2['style_name']; 
                	?>
                </td>
                <td>
                	<?php 
                		$color_id = $row['color_id']; 
                		$sql2 = "SELECT * FROM color WHERE color_id='$color_id'";
                		$res2 = mysqli_query($con, $sql2);
                		$row2 = mysqli_fetch_assoc($res2);
                		echo $row2['color_name'];
                	?>
                </td>
        
                <td><?php echo $row['manpower']; ?></td>
                <td><?php echo $row['hourly_target']; ?></td>
                <td><?php echo $row['cumilitive_target']; ?></td>
                <td>  
	                <button type="submit" id="swing_production_info" name="swing_production_info"  class="btn btn-primary btn-xs" onclick="load_page('swing/edit_swing_production_info.php?swing_production_id=<?php echo $row['id'] ?>')"> Edit </button>
	                <span>  </span>
	                <button type="submit" id="delete_swing_production_info" name="delete_swing_production_info"  class="btn btn-danger btn-xs" onclick="sending_data_for_delete('<?php echo $row['id'] ?>')"> Delete </button>
                 </td>
                <?php
                              
                $s1++;
                                 }
                 ?> 
             </tr>
           </tbody>
          </table>
         </div> <!-- End of <div class="form-group form-group-sm" -->



       

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

        </div>  <!-- End of <div class="panel panel-default"> -->


      </div> <!-- End of  <div id="element"> -->

</div> <!-- End of <div class="col-sm-12 col-md-12 col-lg-12"> -->