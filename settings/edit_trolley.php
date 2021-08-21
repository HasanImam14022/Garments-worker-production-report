<?php
session_start();
include('../login/db_connection_class.php');
$obj = new DB_Connection_Class();
$obj->connection();
/*
$user_id = $_SESSION['user_id'];
$password = $_SESSION['password'];


$sql="select * from hrm_info.user_login where user_id='$user_id' and `password`='$password'";

$result=mysql_query($sql) or die(mysql_error());
if(mysql_num_rows($result)<1)
{

	header('Location:logout.php');

}
*/

      $trolley_id=$_GET['trolley_id'];
      $sql = "select * from `trolley` WHERE `trolley_id`='$trolley_id'";
	  $result= mysqli_query($con,$sql) or die(mysqli_error($con));
	  $row = mysqli_fetch_array( $result);

?>
<script type='text/javascript' src='settings/trolley_form_validation.js'></script>

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
 function sending_data_of_trolley_form_for_saving_in_database()
 {


       var validate = Form_Validation();
       var url_encoded_form_data = $("#trolley_form").serialize(); //This will read all control elements value of the form	
       if(validate != false)
	   {


		  	 $.ajax({
			 		url: 'settings/edit_trolley_saving.php',
			 		dataType: 'text',
			 		type: 'post',
			 		contentType: 'application/x-www-form-urlencoded',
			 		data: url_encoded_form_data,
			 		success: function( data, textStatus, jQxhr )
			 		{
			 				alert(data);
			 				/*window.location = "settings/trolley.php";*/

			 		},
			 		error: function( jqXhr, textStatus, errorThrown )
			 		{
			 				//console.log( errorThrown );
			 				alert(errorThrown);
			 		}
			 }); // End of $.ajax({

       }//End of if(validate != false)

 }//End of function sending_data_of_trolley_form_for_saving_in_database()

</script>
<div class="col-sm-12 col-md-12 col-lg-12">

		<div class="panel panel-default"> <!-- This div will create a block/panel for FORM -->

				<div class="panel-heading" style="trolley:#191970;"><b>Edit trolley</b></div> <!-- This will create a upper block for FORM (Just Beautification) -->

				<nav aria-label="breadcrumb">
					  <ol class="breadcrumb">
					    <li class="breadcrumb-item active" aria-current="page" onclick="load_page('../framework.php')">Home</li>
					     <li class="breadcrumb-item"><a onclick="load_page('settings/trolley.php')">Add trolley</a></li>
					     <li class="breadcrumb-item"><a>Edit trolley</a></li>
					  </ol>
			   </nav>

				<form class="form-horizontal" action="" style="margin-top:10px;" name="trolley_form" id="trolley_form">
					                       
				  
						<div class="form-group form-group-sm" id="form-group_for_trolley_no">
								<label class="control-label col-sm-3" for="trolley_no" style="trolley:#00008B;">trolley Name:</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="trolley_no" name="trolley_no" placeholder="Enter trolley Name" value="<?php echo $row['trolley_no']?>" required>
									<input type="hidden" id="trolley_id" name="trolley_id" value="<?php echo $row['trolley_id'] ?>">
								</div>
								<i class="glyphicon glyphicon-remove" onclick="Remove_Value_Of_This_Element('trolley_no')"></i>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_trolley_no"> -->

						<div class="form-group form-group-sm">
								<div class="col-sm-offset-3 col-sm-5">
									<button type="button" class="btn btn-primary" onClick="sending_data_of_trolley_form_for_saving_in_database()">Save</button>
									<button type="reset" class="btn btn-success">Reset</button>
								</div>
						</div>

				</form>

		</div> <!-- End of <div class="panel panel-default"> -->

</div> <!-- End of <div class="col-sm-12 col-md-12 col-lg-12"> -->