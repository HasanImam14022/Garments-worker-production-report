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

      $test_method_id=$_GET['test_method_id'];
      $sql = "select * from `test_method_name` WHERE `test_method_id`='$test_method_id'";
	  $result= mysqli_query($con,$sql) or die(mysqli_error($con));
	  $row = mysqli_fetch_array( $result);
?>
<script type='text/javascript' src='settings/test_method_name_form_validation.js'></script>

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
 function sending_data_of_test_method_name_form_for_saving_in_database()
 {


       var validate = Form_Validation();
       var url_encoded_form_data = $("#test_method_name_form").serialize(); //This will read all control elements value of the form	
       if(validate != false)
	   {


		  	 $.ajax({
			 		url: 'settings/edit_test_method_name_saving.php',
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

 }//End of function sending_data_of_test_method_name_form_for_saving_in_database()
/***************************************************** FOR AUTO COMPLETE********************************************************************/

$('.test_method_name').chosen();


/***************************************************** FOR AUTO COMPLETE********************************************************************/
</script>
<div class="col-sm-12 col-md-12 col-lg-12">

		<div class="panel panel-default"> <!-- This div will create a block/panel for FORM -->

				<div class="panel-heading" style="color:#191970;"><b>Edit Test Method Name</b></div> <!-- This will create a upper block for FORM (Just Beautification) -->

				<nav aria-label="breadcrumb">
					  <ol class="breadcrumb">
					    <li class="breadcrumb-item active" aria-current="page">Home</li>
					    <li class="breadcrumb-item"><a onclick="load_page('settings/test_method_name.php')">Add Test Method Name</a></li>
					    <li class="breadcrumb-item"><a>Edit Test Method Name</a></li>
					  </ol>
				 </nav>

				<form class="form-horizontal" action="" style="margin-top:10px;" name="test_method_name_form" id="test_method_name_form">

						<div class="form-group form-group-sm" id="form-group_for_test_name">
						<label class="control-label col-sm-3" for="test_name" style="margin-right:0px; color:#00008B;">Test Name:</label>
							<div class="col-sm-5">
								<select  class="form-control test_method_name" id="test_name" name="test_name">
										<option value="" selected="selected">Select Process Name</option>
		                                <?php
		                                  $test_name = $row['test_name'];

		                                  $test_name_sql = "SELECT * FROM test_name_and_method_for_all_process";
		                                  $test_name_res = mysqli_query($con, $test_name_sql) or die(mysqli_error($con));
		                                  while ($test_name_row = mysqli_fetch_assoc($test_name_res)) 
		                                  {
		                                      ?>

		                                      <option <?php if($test_name_row['test_name'] == $test_name ){echo "selected";}?> value="<?php echo $test_name_row['test_name'].'?fs?'.$test_name_row['test_id'];?>"> <?php echo $test_name_row['test_name'];?></option>

		                                      <?php
		                                  }
		                                ?>
								</select>
							</div>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_test_name"> -->

						<div class="form-group form-group-sm" id="form-group_for_test_method_name">
								<label class="control-label col-sm-3" for="test_method_name" style="color:#00008B;">Test Method Name:</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="test_method_name" name="test_method_name" value="<?php echo $row['test_method_name']?>" required>

									<input type="hidden" class="form-control" id="test_method_id" name="test_method_id" value="<?php echo $row['test_method_id']?>">
								</div>
								<i class="glyphicon glyphicon-remove" onclick="Remove_Value_Of_This_Element('test_method_name')"></i>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_test_method_name"> -->




					  <div class="form-group form-group-sm" id="form-group_for_iso_or_aatcc">

                          <label class="control-label col-sm-3" for="iso_or_aatcc" style="color:#00008B;">Test Method Type:</label>
                       	  <div class="col-sm-5">



                       	  	<?php $iso_or_aatcc = $row['iso_or_aatcc']; ?>
		                                <?php 
		                                  if ($iso_or_aatcc == 'iso')
		                                  {
		                                      ?>
		                                          
		                                        <input type="radio"  id="iso_or_aatcc" name="iso_or_aatcc" value="iso" checked>  ISO 
												<input type="radio"  id="iso_or_aatcc" name="iso_or_aatcc" value="aatcc">  AATCC
												<input type="radio"  id="iso_or_aatcc" name="iso_or_aatcc" value="other">  Other 
		                                      <?php 
		                                  } 

		                                  elseif ($iso_or_aatcc == 'aatcc') 
		                                  {
		                                      ?>
		                                        <input type="radio"  id="iso_or_aatcc" name="iso_or_aatcc" value="iso" >  ISO 
												<input type="radio"  id="iso_or_aatcc" name="iso_or_aatcc" value="aatcc" checked>  AATCC
												<input type="radio"  id="iso_or_aatcc" name="iso_or_aatcc" value="other">  Other 
		                                      <?php 
		                                  }

		                                  else
		                                  {
		                                      ?>
		                                        <input type="radio"  id="iso_or_aatcc" name="iso_or_aatcc" value="iso" >  ISO 
												<input type="radio"  id="iso_or_aatcc" name="iso_or_aatcc" value="aatcc" >  AATCC
												<input type="radio"  id="iso_or_aatcc" name="iso_or_aatcc" value="other" checked>  Other 
		                                      <?php 
		                                  }
		                                ?>
							
							 
						  </div>

						  <i class="glyphicon glyphicon-remove" onclick="Remove_Value_Of_This_Element('iso_or_aatcc')"></i>

                      </div>  <!-- End of <div class="form-group form-group-sm" id="form-group_for_iso_or_aatcc"> -->


                     <div class="form-group form-group-sm" id="form-group_for_test_name">
						<label class="control-label col-sm-3" for="test_name_same_as" style="margin-right:0px; color:#00008B;">Test Name Same As:</label>
							<div class="col-sm-5">
								<select  class="form-control test_method_name" id="test_name_same_as" name="test_name_same_as">
											<option select="selected" value="select">Select Test Name</option>
											<?php
		                                  $id = $row['test_name_and_method_for_process_id'];

		                                  $test_name_sql = "SELECT * FROM test_name_and_method_for_all_process  order by `id` LIMIT  74";
		                                  $test_name_res = mysqli_query($con, $test_name_sql) or die(mysqli_error($con));
		                                  while ($test_name_row = mysqli_fetch_assoc($test_name_res)) 
		                                  {
		                                      ?>

		                                      <option <?php if($test_name_row['id'] == $id ){echo "selected";}?> value="<?php echo $test_name_row['id'];?>"> <?php echo $test_name_row['test_name'];?></option>

		                                      <?php
		                                  }
		                                ?>
								</select>
							</div>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_test_name"> -->



						<div class="form-group form-group-sm" id="form-group_for_criteria_or_testing_lab">
						<label class="control-label col-sm-3" for="criteria_or_testing_lab" style="margin-right:0px; color:#00008B;">Testing Lab:</label>
							<div class="col-sm-5">
								<select  class="form-control test_method_name" id="criteria_or_testing_lab" name="criteria_or_testing_lab">
							 
									 <?php $criteria = $row['criteria_or_testing_lab']; ?>
		                                <?php 
		                                  if ($criteria == 'Physical Lab')
		                                  {
		                                      ?>
		                                          <option value="Physical Lab" selected >Physical Lab</option>
		                                          <option value="Washing Lab" >Washing Lab</option>
		                                          <option value="R&D Lab" >R&D Lab</option>
		                                      <?php 
		                                  } 

		                                  elseif ($criteria == 'Washing Lab') 
		                                  {
		                                      ?>
		                                          <option value="Physical Lab" >Physical Lab</option>
		                                          <option value="Washing Lab" selected >Washing Lab</option>
		                                          <option value="R&D Lab" >R&D Lab</option>
		                                      <?php 
		                                  }

		                                  else
		                                  {
		                                      ?>
		                                          <option value="Physical Lab" >Physical Lab</option>
		                                          <option value="Washing Lab" >Washing Lab</option>
		                                          <option value="R&D Lab" selected >R&D Lab</option>
		                                      <?php 
		                                  }
		                                ?>

		                                </select>
										
							</div>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_criteria_or_testing_lab"> -->

						<div class="form-group form-group-sm">
								<div class="col-sm-offset-3 col-sm-5">
									<button type="button" class="btn btn-primary" onClick="sending_data_of_test_method_name_form_for_saving_in_database()">Save</button>
									<button type="reset" class="btn btn-success">Reset</button>
								</div>
						</div>

				</form>

		</div> <!-- End of <div class="panel panel-default"> -->


</div> <!-- End of <div class="col-sm-12 col-md-12 col-lg-12"> -->