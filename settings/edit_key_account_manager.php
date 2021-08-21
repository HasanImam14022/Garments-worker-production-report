<?php
session_start();
include('../login/db_connection_class.php');
$obj = new DB_Connection_Class();
$obj->connection();

/*$user_id = $_SESSION['user_id'];
$password = $_SESSION['password'];*/
/*
$sql="select * from hrm_info.user_login where user_id='$user_id' and `password`='$password'";

$result=mysqli_query($con,$sql) or die(mysql_error());
if(mysql_num_rows($result)<1)
{

	header('Location:logout.php');

}
*/

 
      $key_account_manager_id=$_GET['key_account_manager_id'];
      $sql = "select * from `key_account_manager` WHERE `key_account_manager_id`='$key_account_manager_id'";
	  $result= mysqli_query($con,$sql) or die(mysqli_error($con));
	  $row = mysqli_fetch_array( $result);
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
			 		url: 'settings/edit_key_account_manager_saving.php',
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

/***************************************************** FOR AUTO COMPLETE********************************************************************/

$('.key_account_manager').chosen();


/***************************************************** FOR AUTO COMPLETE********************************************************************/
</script>
<div class="col-sm-12 col-md-12 col-lg-12">

		<div class="panel panel-default"> <!-- This div will create a block/panel for FORM -->

				<div class="panel-heading" style="color:#191970;"><b>Edit Key Account Manager</b></div> <!-- This will create a upper block for FORM (Just Beautification) -->

				    <nav aria-label="breadcrumb">
					  <ol class="breadcrumb">
					    <li class="breadcrumb-item active" aria-current="page">Home</li>
					     <li class="breadcrumb-item"><a onclick="load_page('settings/key_account_manager.php')">Add Key Account Manager</a></li>
					     <li class="breadcrumb-item"><a>Edit Key Account Manager</a></li>
					  </ol>
				     </nav>

				<form class="form-horizontal" action="" style="margin-top:10px;" name="key_account_manager_form" id="key_account_manager_form">
                       
						<div class="form-group form-group-sm" id="form-group_for_key_account_manager_name">
								<label class="control-label col-sm-3" for="key_account_manager_name" style="color:#00008B;">Key Account Manager Name:</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="key_account_manager_name" name="key_account_manager_name" placeholder="Enter Key Account Manager Name" value="<?php echo $row['key_account_manager_name']?>" required>

								<input type="hidden" id="key_account_manager_id" name="key_account_manager_id" value="<?php echo $row['key_account_manager_id'] ?>">
								</div>
								<i class="glyphicon glyphicon-remove" onclick="Remove_Value_Of_This_Element('key_account_manager_name')"></i>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_key_account_manager_name"> -->

						<div class="form-group form-group-sm" id="form-group_for_department">
						<label class="control-label col-sm-3" for="department" style="margin-right:0px; color:#00008B;">Department:</label>
							<div class="col-sm-5">
								<select  class="form-control key_account_manager" id="department" name="department">
											<option value="" selected="selected">Select Department</option>
			                                <?php
			                                  $department = $row['department'];

			                                  $department_sql = "SELECT * FROM department_info";
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
								<select  class="form-control key_account_manager" id="designation" name="designation">
									<option value="" selected="selected">Select Designation </option>
		                                <?php
		                                  $designation = $row['designation'];

		                                  $designation_sql = "SELECT * FROM designation_info ";
		                                  $designation_res = mysqli_query($con, $designation_sql) or die(mysqli_error($con));
		                                  while ($designation_row = mysqli_fetch_assoc($designation_res)) 
		                                  {
		                                      ?>

		                                      <option <?php if($designation_row['designation'] == $designation ){echo "selected";}?> value="<?php echo $designation_row['designation'];?>"> <?php echo $designation_row['designation'];?>
		                                      	
		                            </option>

		                                 <?php
		                                  }
		                                ?>
								</select>
							</div>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_designation"> -->

						<div class="form-group form-group-sm" id="form-group_for_phone_number">
								<label class="control-label col-sm-3" for="phone_number" style="color:#00008B;">Phone Number:</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Enter Phone Number" value="<?php echo $row['phone_number'];?>" required>
								</div>
								<i class="glyphicon glyphicon-remove" onclick="Remove_Value_Of_This_Element('phone_number')"></i>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_phone_number"> -->

						<div class="form-group form-group-sm">
								<div class="col-sm-offset-3 col-sm-5">
									<button type="button" class="btn btn-primary" onClick="sending_data_of_key_account_manager_form_for_saving_in_database()">Save</button>
									<button type="reset" class="btn btn-success">Reset</button>
								</div>
						</div>

				</form>

		</div> <!-- End of <div class="panel panel-default"> -->

</div> <!-- End of <div class="col-sm-12 col-md-12 col-lg-12"> -->