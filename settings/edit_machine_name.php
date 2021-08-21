<?php
session_start();
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


      $machine_id=$_GET['machine_id'];
      $sql = "select * from `machine_name` WHERE `machine_id`='$machine_id'";
	  $result= mysqli_query($con,$sql) or die(mysqli_error($con));
	  $row = mysqli_fetch_array( $result);

?>
<script type='text/javascript' src='settings/machine_name_form_validation.js'></script>

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
 function sending_data_of_machine_name_form_for_saving_in_database()
 {


       var validate = Form_Validation();
       var url_encoded_form_data = $("#machine_name_form").serialize(); //This will read all control elements value of the form	
       if(validate != false)
	   {


		  	 $.ajax({
			 		url: 'settings/edit_machine_name_saving.php',
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

 }//End of function sending_data_of_machine_name_form_for_saving_in_database()

/***************************************************** FOR AUTO COMPLETE********************************************************************/

$('.machine_name').chosen();


/***************************************************** FOR AUTO COMPLETE********************************************************************/
</script>
<div class="col-sm-12 col-md-12 col-lg-12">

		<div class="panel panel-default"> <!-- This div will create a block/panel for FORM -->

				<div class="panel-heading" style="color:#191970;"><b>Edit Machine Name</b></div> <!-- This will create a upper block for FORM (Just Beautification) -->

				<nav aria-label="breadcrumb">
					  <ol class="breadcrumb">
					    <li class="breadcrumb-item active" aria-current="page">Home</li>
					    <li class="breadcrumb-item"><a onclick="load_page('settings/machine_name.php')">Add Machine Name</a></li>
					    <li class="breadcrumb-item"><a>Edit Machine Name</a></li>
					  </ol>
				 </nav>


				<form class="form-horizontal" action="" style="margin-top:10px;" name="machine_name_form" id="machine_name_form">

						<div class="form-group form-group-sm" id="form-group_for_machine_name">
								<label class="control-label col-sm-3" for="machine_name" style="color:#00008B;">Machine Name:</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="machine_name" name="machine_name" value="<?php echo $row['machine_name'] ?>" required>
									<input type="hidden" class="form-control" id="machine_id" name="machine_id" value="<?php echo $row['machine_id'] ?>">
								</div>
								<i class="glyphicon glyphicon-remove" onclick="Remove_Value_Of_This_Element('machine_name')"></i>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_machine_name"> -->

						<div class="form-group form-group-sm" id="form-group_for_process_name">
                            
						<label class="control-label col-sm-3" for="process_name" style="margin-right:0px; color:#00008B;">Process Name:</label>
							<div class="col-sm-5">
								<select  class="form-control machine_name" id="process_name" name="process_name">
											
										<option value="" selected="selected">Select Process Name</option>
		                                <?php
		                                  $process_name = $row['process_name'];

		                                  $process_name_sql = "SELECT * FROM process_name";
		                                  $process_name_res = mysqli_query($con, $process_name_sql) or die(mysqli_error($con));
		                                  while ($process_name_row = mysqli_fetch_assoc($process_name_res)) 
		                                  {
		                                      ?>

		                                      <option <?php if($process_name_row['process_name'] == $process_name ){echo "selected";}?> value="<?php echo $process_name_row['process_name'].'?fs?'.$process_name_row['process_id'];?>"> <?php echo $process_name_row['process_name'];?></option>

		                                      <?php
		                                  }
		                                ?>
								</select>
							</div>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_process_name"> -->

						<div class="form-group form-group-sm">
								<div class="col-sm-offset-3 col-sm-5">
									<button type="button" class="btn btn-primary" onClick="sending_data_of_machine_name_form_for_saving_in_database()">Save</button>
									<button type="reset" class="btn btn-success">Reset</button>
								</div>
						</div>

				</form>

		</div> <!-- End of <div class="panel panel-default"> -->


</div> <!-- End of <div class="col-sm-12 col-md-12 col-lg-12"> -->