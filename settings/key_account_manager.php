<?php
session_start();
require_once("../login/session.php");
include('../login/db_connection_class.php');
$obj = new DB_Connection_Class();
$obj->connection();
/*$obj = new DB_Connection_Class();
$obj->connection();*/
/*
$user_name = $_SESSION['user_name'];
$password = $_SESSION['password'];

$sql="select * from user_login where user_name='$user_name' and `password`='$password'";

$result=mysqli_query($con,$sql) or die(mysqli_error());
if(mysqli_num_rows($result)<1)
{

	header('Location:logout.php');

}*/

?>
<script type='text/javascript' src='settings/key_account_manager_form_validation.js'></script>

<style>

.form-group		/* This is for reducing Gap among Form's Fields */
{

	margin-bottom: 5px;

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
</script>

<script>
 function sending_data_of_key_account_manager_form_for_saving_in_database()
 {


       var validate = key_Account_Manager_Form_Validation();
       var url_encoded_form_data = $("#key_account_manager_form").serialize(); //This will read all control elements value of the form	
       if(validate != false)
	   {


		  	 $.ajax({
			 		url: 'settings/key_account_manager_saving.php',
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

       }//End of if(validate != false)

 }//End of function sending_data_of_key_account_manager_form_for_saving_in_database() 


 function sending_data_for_delete(key_account_manager_id)
 {
      
       var url_encoded_form_data = 'key_account_manager_id='+key_account_manager_id;
       
		  	 $.ajax({
			 		url: 'settings/key_account_manager_deleting.php',
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



 }//End of function sending_data_of_color_form_for_delete_from_database()

/***************************************************** FOR AUTO COMPLETE********************************************************************/

$('.key_account_manager').chosen();


/***************************************************** FOR AUTO COMPLETE********************************************************************/
</script>
<div class="col-sm-12 col-md-12 col-lg-12">

		<div class="panel panel-default"> <!-- This div will create a block/panel for FORM -->

				<div class="panel-heading" style="color:#191970;"><b>Key Account Manager</b></div> <!-- This will create a upper block for FORM (Just Beautification) -->
                

                 <nav aria-label="breadcrumb">
					  <ol class="breadcrumb">
					    <li class="breadcrumb-item active" aria-current="page">Home</li>
					     <li class="breadcrumb-item"><a onclick="load_page('settings/key_account_manager.php')">Add Key Account Manager</a></li>
					  </ol>
				 </nav>

				<form class="form-horizontal" action="" style="margin-top:10px;" name="key_account_manager_form" id="key_account_manager_form">

						<div class="form-group form-group-sm" id="form-group_for_key_account_manager_name">
								<label class="control-label col-sm-3" for="key_account_manager_name" style="color:#00008B;">Key Account Manager Name:</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="key_account_manager_name" name="key_account_manager_name" placeholder="Enter Key Account Manager Name" required>
								</div>
								<i class="glyphicon glyphicon-remove" onclick="Remove_Value_Of_This_Element('key_account_manager_name')"></i>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_key_account_manager_name"> -->

						<div class="form-group form-group-sm" id="form-group_for_department">
						<label class="control-label col-sm-3" for="department" style="margin-right:0px; color:#00008B;">Department:</label>
							<div class="col-sm-5">
								<select  class="form-control key_account_manager" id="department" name="department">
											<option select="selected" value="select">Select Department</option>
											<?php 
												 $sql = 'select department_name from `department_info` order by `department_name`';
												 $result= mysqli_query($con,$sql) or die(mysql_error);
												 while( $row = mysqli_fetch_array( $result))
												 {

													 echo '<option value="'.$row['department_name'].'">'.$row['department_name'].'</option>';

												 }

											 ?>
								</select>
							</div>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_department"> -->

						<div class="form-group form-group-sm" id="form-group_for_designation">
						<label class="control-label col-sm-3" for="designation" style="margin-right:0px; color:#00008B;">Designation:</label>
							<div class="col-sm-5">
								<select  class="form-control key_account_manager" id="designation" name="designation">
											<option select="selected" value="select">Select Designation</option>
											<?php 
												 $sql = 'select designation from `designation_info` order by `designation`';
												 $result= mysqli_query($con,$sql) or die(mysql_error);
												 while( $row = mysqli_fetch_array( $result))
												 {

													 echo '<option value="'.$row['designation'].'">'.$row['designation'].'</option>';

												 }

											 ?>
								</select>
							</div>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_designation"> -->

						<div class="form-group form-group-sm" id="form-group_for_phone_number">
								<label class="control-label col-sm-3" for="phone_number" style="color:#00008B;">Phone Number:</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Enter Phone Number" required>
								</div>
								<i class="glyphicon glyphicon-remove" onclick="Remove_Value_Of_This_Element('phone_number')"></i>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_phone_number"> -->

						<div class="form-group form-group-sm">
								<div class="col-sm-offset-3 col-sm-5">
									<button type="button" class="btn btn-primary" onClick="sending_data_of_key_account_manager_form_for_saving_in_database()">Submit</button>
									<button type="reset" class="btn btn-success">Reset</button>
								</div>
						</div>

				</form>

		</div> <!-- End of <div class="panel panel-default"> -->




        <div class="panel panel-default">

        
       
	       <div class="form-group form-group-sm">
		            

		              <label class="control-label col-sm-5" for="search">Key Account Manager List</label>

		   </div> <!-- End of <div class="form-group form-group-sm" -->



        <div class="form-group form-group-sm">

         <table id="datatable-buttons" class="table table-striped table-bordered">
         	<thead>
                 <tr>
                 <th>SI</th>
                 <th>Key Account Manager Name</th>
                 <th>Department</th>
                 <th>Designation</th>
                 <th>Phone Number</th>
                 <th>Action</th>
                 </tr>
            </thead>
            <tbody>
            <?php 
                            $s1 = 1;
                            $sql_for_color = "SELECT * FROM key_account_manager ORDER BY row_id ASC ";

                            $res_for_color = mysqli_query($con, $sql_for_color);

                            while ($row = mysqli_fetch_assoc($res_for_color)) 
                            {
             ?>

               <tr>
                <td><?php echo $s1; ?></td>
                <td><?php echo $row['key_account_manager_name']; ?></td>
                <td><?php echo $row['department']; ?></td>
                <td><?php echo $row['designation']; ?></td>
                <td><?php echo $row['phone_number']; ?></td>
                
                <td>
                    
                        <button type="submit" id="" name="" class="btn btn-primary btn-xs" onclick="load_page('settings/edit_key_account_manager.php?key_account_manager_id=<?php echo $row['key_account_manager_id'] ?>')"> Edit </button>

                        <button type="submit" id="" name="" class="btn btn-danger btn-xs" onclick="sending_data_for_delete('<?php echo $row['key_account_manager_id'] ?>')"> Delete </button>
                    
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

       </div>  <!-- end of <div class="panel panel-default"> -->

</div> <!-- End of <div class="col-sm-12 col-md-12 col-lg-12"> -->