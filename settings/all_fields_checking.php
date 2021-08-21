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
<script type='text/javascript' src='all_fields_checking_form_validation.js'></script>

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
 function sending_data_of_all_fields_checking_form_for_saving_in_database()
 {


       var validate = Form_Validation();
       var url_encoded_form_data = $("#all_fields_checking_form").serialize(); //This will read all control elements value of the form	
       if(validate != false)
	   {


		  	 $.ajax({
			 		url: 'all_fields_checking_saving.php',
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

 }//End of function sending_data_of_all_fields_checking_form_for_saving_in_database()

</script>
<div class="col-sm-12 col-md-12 col-lg-12">

		<div class="panel panel-default"> <!-- This div will create a block/panel for FORM -->

				<div class="panel-heading" style="color:#191970;"><b>All Fields Checking</b></div> <!-- This will create a upper block for FORM (Just Beautification) -->

				<form class="form-horizontal" action="" style="margin-top:10px;" name="all_fields_checking_form" id="all_fields_checking_form">

						<div class="form-group form-group-sm" id="form-group_for_name">
								<label class="control-label col-sm-3" for="name" style="color:#00008B;">Name:</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" required>
								</div>
								<i class="glyphicon glyphicon-remove" onclick="Remove_Value_Of_This_Element('name')"></i>

						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_name"> -->

						<div class="form-group form-group-sm" id="form-group_for_degination">
						<label class="control-label col-sm-3" for="degination" style="margin-right:0px; color:#00008B;">Degination:</label>
							<div class="col-sm-5">
								<select  class="form-control" id="degination" name="degination" style="height:27px;">
											<option select="selected" value="select">Select Degination</option>
											<option value="GM">GM</option>
											<option value="AGM">AGM</option>
											<option value="Maneger">Maneger</option>
											<option value="Executive">Executive</option>
								</select>
							</div>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_degination"> -->

						<div class="form-group form-group-sm" id="form-group_for_Sex">
						<label class="control-label col-sm-3" for="Sex" style="margin-right:0px;color:#00008B;">Sex:</label>
							<div class="col-sm-8">
								<input type="radio" class="form-check-input"  value="Male" id="Sex" name="Sex">
								<label class="form-check-label control-label" for="Sex" style="margin-right:15px;">Male</label>
								<input type="radio" class="form-check-input"  value="Female" id="Sex" name="Sex">
								<label class="form-check-label control-label" for="Sex" style="margin-right:15px;">Female</label>
								<i class="glyphicon glyphicon-remove" onclick="Reset_Radio_Button('Sex')"></i>
							</div>	
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_Sex"> -->

						<div class="form-group form-group-sm" id="form-group_for_hobby">
						<label class="control-label col-sm-3" for="hobby" style="margin-right:15px;color:#00008B;">Hobby:</label>
								<input type="checkbox" class="form-check-input"  value="Cricket" id="hobby" name="hobby[]">
								<label class="form-check-label control-label" for="hobby" style="margin-right:15px;">Cricket</label>
								<input type="checkbox" class="form-check-input"  value="Football" id="hobby" name="hobby[]">
								<label class="form-check-label control-label" for="hobby" style="margin-right:15px;">Football</label>
								<input type="checkbox" class="form-check-input"  value="Rugby" id="hobby" name="hobby[]">
								<label class="form-check-label control-label" for="hobby" style="margin-right:15px;">Rugby</label>
								<i class="glyphicon glyphicon-remove" onclick="Reset_Checkbox(document.all_fields_checking_form.hobby)"></i>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_hobby"> -->

						<div class="form-group form-group-sm" id="form-group_for_date_of_birth">
								<label class="control-label col-sm-3" for="date_of_birth" style="color:#00008B;">Date Of Birth:</label>
								<div class="col-sm-3">
									<input type="text" class="form-control" id="date_of_birth" name="date_of_birth" style="height:27px;" placeholder="Enter Date Of Birth" required>
								</div>
								<div class="col-sm-3">
									<input type="text" class="form-control" id="alternate_date_of_birth" name="alternate_date_of_birth" style="height:27px;" readonly>
								</div>
								<i class="glyphicon glyphicon-remove" onclick="Remove_Value_Of_This_Element('date_of_birth')"></i>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_date_of_birth"> -->
								<script>
									$( function()
									{
										$( "#date_of_birth" ).datepicker(
										{
											altField: "#alternate_date_of_birth", // This is for Descriptive Date Showing in Alternative Field.
											altFormat: "DD, d MM, yy" // This is for Descriptive Date Format in Alternative Field.
										}
										); // End of $( "#date_of_birth" ).datepicker(

										$( "#date_of_birth" ).datepicker( "option", "dateFormat", "dd/mm/yy" ); // This is for Date Format in Actual Date Field.
										$( "#date_of_birth" ).datepicker( "option", "showAnim", "drop" ); // This is for Datepicker Calender Animation in Actual Date Field.
									}
									); // End of $( function()
								</script>

						<div class="form-group form-group-sm" id="form-group_for_comments">
								<label class="control-label col-sm-3" for="comments" style="color:#00008B;">Comments:</label>
								<div class="col-sm-5">
									<textarea class='form-control' id='comments' name='comments' rows='5' placeholder="Enter Comments"></textarea>
								</div>
								<i class="glyphicon glyphicon-remove" onclick="Remove_Value_Of_This_Element('comments')"></i>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_comments"> -->

						<div class="form-group form-group-sm">
								<div class="col-sm-offset-3 col-sm-8">
									<button type="button" class="btn btn-primary" onClick="sending_data_of_all_fields_checking_form_for_saving_in_database()">Submit</button>
									<button type="reset" class="btn btn-success">Reset</button>
								</div>
						</div>

				</form>

		</div> <!-- End of <div class="panel panel-default"> -->

</div> <!-- End of <div class="col-sm-12 col-md-12 col-lg-12"> -->