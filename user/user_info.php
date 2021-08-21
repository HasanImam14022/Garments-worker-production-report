<?php
session_start();
include('../login/db_connection_class.php');
$obj = new DB_Connection_Class();
$obj->connection();
/*
$user_id = $_SESSION['user_id'];
$password = $_SESSION['password'];

$sql="select * from hrm_info.user_login where user_id='$user_id' and `password`='$password'";

$result=mysqli_query($con,$sql) or die(mysqli_error()());
if(mysql_num_rows($result)<1)
{

	header('Location:logout.php');

}
*/
?>
<script type='text/javascript' src='user/user_info_form_validation.js'></script>

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
 function sending_data_of_user_info_form_for_saving_in_database()
 {


       var validate = User_Info_Form_Validation();
       //var url_encoded_form_data = $("#user_info_form").serialize(); //This will read all control elements value of the form	
       var url_encoded_form_data = new FormData(document.getElementById('user_info_form'));
       url_encoded_form_data.append('profile_picture', document.getElementById('profile_picture'));
       if(validate != false)
	   {

	   		$.ajax({
			 		url: 'user/user_info_saving.php',
			 		type: 'post',
			 		data: url_encoded_form_data,
			 		processData: false,
			 		contentType: false,
			 		success: function( data, textStatus, jQxhr )
			 		{
			 				alert(data);
			 		},
			 		error: function( jqXhr, textStatus, errorThrown )
			 		{
			 				//console.log( errorThrown );
			 				alert(errorThrown);
			 		}
			 }); // End of $.ajax


		  // 	 $.ajax({
			 // 		url: 'user/user_info_saving.php',
			 // 		dataType: 'text',
			 // 		type: 'post',
			 // 		contentType: 'application/x-www-form-urlencoded',
			 // 		data: url_encoded_form_data,
			 // 		success: function( data, textStatus, jQxhr )
			 // 		{
			 // 				alert(data);
			 // 		},
			 // 		error: function( jqXhr, textStatus, errorThrown )
			 // 		{
			 // 				//console.log( errorThrown );
			 // 				alert(errorThrown);
			 // 		}
			 // }); // End of $.ajax({

       }//End of if(validate != false)

 }//End of function sending_data_of_user_info_form_for_saving_in_database()

 /***************************************************** FOR AUTO COMPLETE********************************************************************/

$('.for_auto_complete').chosen();


/***************************************************** FOR AUTO COMPLETE********************************************************************/


</script>
<div class="col-sm-12 col-md-12 col-lg-12">

		<div class="panel panel-default"> <!-- This div will create a block/panel for FORM -->

				<div class="panel-heading" style="color:#191970;"><b>Create User</b></div> <!-- This will create a upper block for FORM (Just Beautification) -->

				<nav aria-label="breadcrumb">
					  <ol class="breadcrumb">
					    <li class="breadcrumb-item active" aria-current="page">Home</li>
					     <li class="breadcrumb-item"><a onclick="load_page('user/user_info.php')">Create User</a></li>
					  </ol>
				</nav>

				<form class="form-horizontal" action="" style="margin-top:10px;" name="user_info_form" id="user_info_form" enctype="multipart/form-data" data-parsley-validate>

						<div class="form-group form-group-sm" id="form-group_for_user_name">
								<label class="control-label col-sm-3" for="user_name" style="color:#00008B;">User Name:</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="user_name" name="user_name" placeholder="Enter User Name" required>
								</div>
								<i class="glyphicon glyphicon-remove" onclick="Remove_Value_Of_This_Element('user_name')"></i>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_user_name"> -->

					  <div class="form-group form-group-sm" id="form-group_for_employee_name">
								<label class="control-label col-sm-3" for="employee_name" style="color:#00008B;">Employee Name:</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="employee_name" name="employee_name" placeholder="Enter Employee Name" required>
								</div>
								<i class="glyphicon glyphicon-remove" onclick="Remove_Value_Of_This_Element('employee_name')"></i>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_user_name"> -->

						<div class="form-group form-group-sm" id="form-group_for_user_id">
								<label class="control-label col-sm-3" for="user_id" style="color:#00008B;">User ID:</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="user_id" name="user_id" placeholder="Enter User ID" required>
								</div>
								<i class="glyphicon glyphicon-remove" onclick="Remove_Value_Of_This_Element('user_id')"></i>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_user_id"> -->

						<div class="form-group form-group-sm" id="form-group_for_password">
								<label class="control-label col-sm-3" for="password" style="color:#00008B;">Password:</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="password" name="password" placeholder="Enter Password" required>
								</div>
								<i class="glyphicon glyphicon-remove" onclick="Remove_Value_Of_This_Element('password')"></i>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_password"> -->

						<div class="form-group form-group-sm" id="form-group_for_confirm_password">
								<label class="control-label col-sm-3" for="confirm_password" style="color:#00008B;">Confirm Password:</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="confirm_password" name="confirm_password" placeholder="Enter Confirm Password" required>
								</div>
								<i class="glyphicon glyphicon-remove" onclick="Remove_Value_Of_This_Element('confirm_password')"></i>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_confirm_password"> -->

						<div class="form-group form-group-sm" id="form-group_for_user_type">
						<label class="control-label col-sm-3" for="user_type" style="margin-right:0px; color:#00008B;">User Type:</label>
							<div class="col-sm-5">
								<select  class="form-control for_auto_complete" id="user_type" name="user_type">
											<option select="selected" value="select">Select User Type</option>
											<option value="Super Admin">Super Admin</option>
											<option value="Admin">Admin</option>
											<option value="User">User</option>
											<option value="Sub_User">Sub User</option>
								</select>
							</div>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_user_type"> -->

						<div class="form-group form-group-sm" id="form-group_for_status">
						<label class="control-label col-sm-3" for="status" style="margin-right:0px; color:#00008B;">Status:</label>
							<div class="col-sm-5">
								<select  class="form-control for_auto_complete" id="status" name="status">
											<option select="selected" value="select">Select Status</option>
											<option value="Active">Active</option>
											<option value="Inactive">Inactive</option>
								</select>
							</div>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_status"> -->

						<div class="form-group form-group-sm" id="form-group_for_email">
								<label class="control-label col-sm-3" for="email" style="color:#00008B;">Email:</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="email" name="email" placeholder="Enter Email" required>
								</div>
								<i class="glyphicon glyphicon-remove" onclick="Remove_Value_Of_This_Element('email')"></i>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_email"> -->

						<div class="form-group form-group-sm" id="form-group_for_contact_no">
								<label class="control-label col-sm-3" for="contact_no" style="color:#00008B;">Contact No:</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="contact_no" name="contact_no" placeholder="Enter Contact No" required>
								</div>
								<i class="glyphicon glyphicon-remove" onclick="Remove_Value_Of_This_Element('contact_no')"></i>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_contact_no"> -->

						<div class="form-group form-group-sm" id="form-group_for_department">
						<label class="control-label col-sm-3" for="department" style="margin-right:0px; color:#00008B;">Department:</label>
							<div class="col-sm-5">
								<select  class="form-control for_auto_complete" id="department" name="department">
											<option select="selected" value="select">Select Department</option>
											<?php 
												 $sql = 'select department_name from `department_info` order by `department_name`';
												 $result= mysqli_query($con,$sql) or die(mysqli_error());
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
								<select  class="form-control for_auto_complete" id="designation" name="designation">
											<option select="selected" value="select">Select Designation</option>
											<?php 
												 $sql = 'select designation from `designation_info` order by `designation`';
												 $result= mysqli_query($con,$sql) or die(mysqli_error());
												 while( $row = mysqli_fetch_array( $result))
												 {

													 echo '<option value="'.$row['designation'].'">'.$row['designation'].'</option>';

												 }

											 ?>
								</select>
							</div>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_designation"> -->

                        <div class="form-group form-group-sm" id="form-group_for_profile_picture">
                        <label class="control-label col-sm-3" style="margin-right:0px; color:#00008B;">Profile Picture:</label>
							<div class="col-sm-5">
                          <input type="file" class="form-control" id="profile_picture" name="profile_picture" >
                           </div>
                        </div> <!-- end of <div class="form-group form-group-sm" id="form-group_for_profile_picture"> -->

						<div class="form-group form-group-sm">
								<div class="col-sm-offset-3 col-sm-5">
									<button type="button" class="btn btn-primary" onClick="sending_data_of_user_info_form_for_saving_in_database()">Submit</button>
									<button type="reset" class="btn btn-success">Reset</button>
								</div>
						</div>

				</form>

		</div> <!-- End of <div class="panel panel-default"> -->

</div> <!-- End of <div class="col-sm-12 col-md-12 col-lg-12"> -->