<?php
session_start();
include('db_connection_class.php');
$obj = new DB_Connection_Class();
$obj->connection();

/*$user_id = $_SESSION['user_id'];
$password = $_SESSION['password'];*/
/*
$sql="select * from hrm_info.user_login where user_id='$user_id' and `password`='$password'";

$result=mysql_query($sql) or die(mysql_error());
if(mysql_num_rows($result)<1)
{

	header('Location:logout.php');

}
*/
?>
<script type='text/javascript' src='settings/department_info_form_validation.js'></script>

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
 function sending_data_of_department_info_form_for_saving_in_database()
 {


       var validate = Form_Validation();
       var url_encoded_form_data = $("#department_info_form").serialize(); //This will read all control elements value of the form	
       if(validate != false)
	   {


		  	 $.ajax({
			 		url: 'settings/department_info_saving.php',
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

 }//End of function sending_data_of_department_info_form_for_saving_in_database()

</script>
<div class="col-sm-12 col-md-12 col-lg-12">

		<div class="panel panel-default"> <!-- This div will create a block/panel for FORM -->

				<div class="panel-heading" style="color:#191970;"><b>Department Info</b></div> <!-- This will create a upper block for FORM (Just Beautification) -->

				<form class="form-horizontal" action="" style="margin-top:10px;" name="department_info_form" id="department_info_form">

						<div class="form-group form-group-sm" id="form-group_for_location">
								<label class="control-label col-sm-3" for="location" style="color:#00008B;">Location:</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="location" name="location" placeholder="Enter Location" required>
								</div>
								<i class="glyphicon glyphicon-remove" onclick="Remove_Value_Of_This_Element('location')"></i>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_location"> -->

						<div class="form-group form-group-sm" id="form-group_for_department_name">
								<label class="control-label col-sm-3" for="department_name" style="color:#00008B;">Department Name:</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="department_name" name="department_name" placeholder="Enter Department Name" required>
								</div>
								<i class="glyphicon glyphicon-remove" onclick="Remove_Value_Of_This_Element('department_name')"></i>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_department_name"> -->

						<div class="form-group form-group-sm" id="form-group_for_section_name">
								<label class="control-label col-sm-3" for="section_name" style="color:#00008B;">Section Name:</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="section_name" name="section_name" placeholder="Enter Section Name" required>
								</div>
								<i class="glyphicon glyphicon-remove" onclick="Remove_Value_Of_This_Element('section_name')"></i>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_section_name"> -->

						<div class="form-group form-group-sm" id="form-group_for_contact_person_name">
								<label class="control-label col-sm-3" for="contact_person_name" style="color:#00008B;">Contact Person Name:</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="contact_person_name" name="contact_person_name" placeholder="Enter Contact Person Name" required>
								</div>
								<i class="glyphicon glyphicon-remove" onclick="Remove_Value_Of_This_Element('contact_person_name')"></i>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_contact_person_name"> -->

						<div class="form-group form-group-sm" id="form-group_for_contact_no">
								<label class="control-label col-sm-3" for="contact_no" style="color:#00008B;">Contact No:</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="contact_no" name="contact_no" placeholder="Enter Contact No" required>
								</div>
								<i class="glyphicon glyphicon-remove" onclick="Remove_Value_Of_This_Element('contact_no')"></i>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_contact_no"> -->

						<div class="form-group form-group-sm" id="form-group_for_email">
								<label class="control-label col-sm-3" for="email" style="color:#00008B;">Email:</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="email" name="email" placeholder="Enter Email" required>
								</div>
								<i class="glyphicon glyphicon-remove" onclick="Remove_Value_Of_This_Element('email')"></i>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_email"> -->

						<div class="form-group form-group-sm">
								<div class="col-sm-offset-3 col-sm-5">
									<button type="button" class="btn btn-primary" onClick="sending_data_of_department_info_form_for_saving_in_database()">Submit</button>
									<button type="reset" class="btn btn-success">Reset</button>
								</div>
						</div>

				</form>

		</div> <!-- End of <div class="panel panel-default"> -->

</div> <!-- End of <div class="col-sm-12 col-md-12 col-lg-12"> -->