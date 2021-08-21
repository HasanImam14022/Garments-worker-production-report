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

  $user_id=$_GET['user_id'];
  $select_user="select * from `user_info` where `user_id`='$user_id'";
  $result = mysqli_query($con,$select_user) or die(mysqli_error());
  $row = mysqli_fetch_array( $result);
?>
<script type='text/javascript' src='user/edit_user_form_validation.js'></script>

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
 function sending_data_of_edit_user_form_for_saving_in_database()
 {


       var validate = Edit_User_Form_Validation();
       var url_encoded_form_data = new FormData(document.getElementById('edit_user_form'));
       url_encoded_form_data.append('profile_picture', document.getElementById('profile_picture'));
       if(validate != false)
	   {

	   		$.ajax({
			 		url: 'user/edit_user_saving.php',
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

       }//End of if(validate != false)

 }//End of function sending_data_of_edit_user_form_for_saving_in_database()

</script>
<div class="col-sm-12 col-md-12 col-lg-12">

		<div class="panel panel-default"> <!-- This div will create a block/panel for FORM -->

				<div class="panel-heading" style="color:#191970;"><b>Edit User Info</b></div> <!-- This will create a upper block for FORM (Just Beautification) -->

				<nav aria-label="breadcrumb">
					  <ol class="breadcrumb">
					    <li class="breadcrumb-item active" aria-current="page">Home</li>
					    <li class="breadcrumb-item"><a onclick="load_page('user/user_list.php')">User List</a></li>
					    <li class="breadcrumb-item"><a>Edit User</a></li>
					  </ol>
				</nav>

				<form class="form-horizontal" action="" style="margin-top:10px;" name="edit_user_form" id="edit_user_form" enctype="multipart/form-data" data-parsley-validate>

						<div class="form-group form-group-sm" id="form-group_for_user_name">
								<label class="control-label col-sm-3" for="user_name" style="color:#00008B;">User Name:</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="user_name" name="user_name" placeholder="Enter User Name" value="<?php echo $row['user_name']?>" required>
									<input type="hidden" class="form-control" id="id" name="id" >
								</div>
								<i class="glyphicon glyphicon-remove" onclick="Remove_Value_Of_This_Element('user_name')"></i>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_user_name"> -->


					   <div class="form-group form-group-sm" id="form-group_for_employee_name">
								<label class="control-label col-sm-3" for="employee_name" style="color:#00008B;">Employee Name:</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="employee_name" name="employee_name" placeholder="Enter Employee Name" value="<?php echo $row['employee_name']?>" required>
									
								</div>
								<i class="glyphicon glyphicon-remove" onclick="Remove_Value_Of_This_Element('employee_name')"></i>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_user_name"> -->



						<div class="form-group form-group-sm" id="form-group_for_user_id">
								<label class="control-label col-sm-3" for="user_id" style="color:#00008B;">User ID:</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="user_id" name="user_id" placeholder="Enter User ID" value="<?php echo $row['user_id']?>" required>
								</div>
								<i class="glyphicon glyphicon-remove" onclick="Remove_Value_Of_This_Element('user_id')"></i>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_user_id"> -->

						<div class="form-group form-group-sm" id="form-group_for_password">
								<label class="control-label col-sm-3" for="password" style="color:#00008B;">Password:</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="password" name="password" placeholder="Enter Password" value="<?php echo $row['password']?>" required>
								</div>
								<i class="glyphicon glyphicon-remove" onclick="Remove_Value_Of_This_Element('password')"></i>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_password"> -->

						<div class="form-group form-group-sm" id="form-group_for_confirm_password">
								<label class="control-label col-sm-3" for="confirm_password" style="color:#00008B;">Confirm Password:</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="confirm_password" name="confirm_password" placeholder="Enter Confirm Password" value="<?php echo $row['confirm_password']?>" required>
								</div>
								<i class="glyphicon glyphicon-remove" onclick="Remove_Value_Of_This_Element('confirm_password')"></i>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_confirm_password"> -->

						<div class="form-group form-group-sm" id="form-group_for_user_type">
						<label class="control-label col-sm-3" for="user_type" style="margin-right:0px; color:#00008B;">User Type:</label>
							<div class="col-sm-5">
								<select  class="form-control" id="user_type" name="user_type">
										<option value="" selected="selected">Select User Type</option>
                                        <?php
                                          $options=$row['user_type'];
                                          if($options==$row['user_type'])
                                          {

                                          }
                                        ?>

										<option value="Admin" <?php $options=$row['user_type']; if($options=="Admin") echo 'selected="selected"'; ?> >Admin</option>
										<option value="Super Admin" <?php $options=$row['user_type']; if($options=="Super Admin") echo 'selected="selected"'; ?> >Super Admin</option>
										<option value="User" <?php $options=$row['user_type']; if($options=="User") echo 'selected="selected"'; ?> >User</option>
										<option value="Sub_User" <?php $options=$row['user_type']; if($options=="Sub_User") echo 'selected="selected"'; ?> >Sub User</option>
		                              
								</select>
							</div>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_user_type"> -->

						<div class="form-group form-group-sm" id="form-group_for_status">
						<label class="control-label col-sm-3" for="status" style="margin-right:0px; color:#00008B;">Status:</label>
							<div class="col-sm-5">
								<select  class="form-control" id="status" name="status">
									<option value="" selected="selected">Select Process Name</option>
                                    <?php
                                      $status = $row['status'];
                                     ?>
                                     <?php 
                                          if($status=='Active')
                                          {
                                       ?>
                                          <option value="Active" selected> Active</option>
                                          <option value="Inactive"> Inactive</option>
                                      <?php
                                          }
                                          else
                                          {
                                         ?>
                                          <option value="Active" > Active</option>
                                          <option value="Inactive" selected> Inactive</option>
                                       <?php
                                          }
                                       ?>
								</select>
							</div>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_status"> -->

						<div class="form-group form-group-sm" id="form-group_for_email">
								<label class="control-label col-sm-3" for="email" style="color:#00008B;">Email:</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="email" name="email" placeholder="Enter Email" value="<?php echo $row['email']?>" required>
								</div>
								<i class="glyphicon glyphicon-remove" onclick="Remove_Value_Of_This_Element('email')"></i>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_email"> -->

						<div class="form-group form-group-sm" id="form-group_for_contact_no">
								<label class="control-label col-sm-3" for="contact_no" style="color:#00008B;">Contact No:</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="contact_no" name="contact_no" placeholder="Enter Contact No" value="<?php echo $row['contact_no']?>" required>
								</div>
								<i class="glyphicon glyphicon-remove" onclick="Remove_Value_Of_This_Element('contact_no')"></i>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_contact_no"> -->

						<div class="form-group form-group-sm" id="form-group_for_department">
						<label class="control-label col-sm-3" for="department" style="margin-right:0px; color:#00008B;">Department:</label>
							<div class="col-sm-5">
								<select  class="form-control" id="department" name="department">
									<option value="" selected="selected">Select Department Name</option>
                                    <?php
                                      $department = $row['department'];

                                      $department_sql = 'select department_name from `department_info`';;
                                      $department_res = mysqli_query($con, $department_sql) or die(mysqli_error($con));
                                      while ($department_row = mysqli_fetch_assoc($department_res)) 
                                      {
                                          ?>

                                          <option <?php if($department_row['department_name'] == $department ){echo "selected";}?> value="<?php echo $department_row['department_name'];?>"> <?php echo $department_row['department_name'];?></option>

                                          <?php
                                      }
                                    ?>
								</select>
							</div>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_department"> -->

						<div class="form-group form-group-sm" id="form-group_for_designation">
						<label class="control-label col-sm-3" for="designation" style="margin-right:0px; color:#00008B;">Designation:</label>
							<div class="col-sm-5">
								<select  class="form-control" id="designation" name="designation">
								   <option value="" selected="selected">Select Designation Name</option>
                                    <?php
                                      $designation = $row['designation'];

                                      $designation_sql = 'select designation from `designation_info` order by `designation`';;
                                      $designation_res = mysqli_query($con, $designation_sql) or die(mysqli_error($con));
                                      while ($designation_row = mysqli_fetch_assoc($designation_res)) 
                                      {
                                          ?>

                                          <option <?php if($designation_row['designation'] == $designation ){echo "selected";}?> value="<?php echo $designation_row['designation'];?>"> <?php echo $designation_row['designation'];?></option>

                                          <?php
                                      }
                                    ?>
								</select>
							</div>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_designation"> -->

                        <div class="form-group form-group-sm" id="form-group_for_profile_picture">
                        <label class="control-label col-sm-3" for="profile_picture" style="margin-right:0px; color:#00008B;">Profile Picture:</label>
							<div class="col-sm-5">
                          <input type='file' class="form-control" id="profile_picture" name="profile_picture" size='35' value="<?php echo $row['profile_picture']?>" style='height:26;border-radius: 4px;border: 1px solid #0AF1F0;'>
                           </div>
                        </div> <!-- end of <div class="form-group form-group-sm" id="form-group_for_profile_picture"> -->

						<div class="form-group form-group-sm">
								<div class="col-sm-offset-3 col-sm-5">
									<button type="button" class="btn btn-primary" onClick="sending_data_of_edit_user_form_for_saving_in_database()">Save</button>
									<button type="reset" class="btn btn-success">Reset</button>
								</div>
						</div>

				</form>

		</div> <!-- End of <div class="panel panel-default"> -->

</div> <!-- End of <div class="col-sm-12 col-md-12 col-lg-12"> -->