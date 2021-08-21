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

     $construction_id=$_GET['construction_id'];
      $sql = "select * from `construction_for_version` WHERE `construction_id`='$construction_id'";
	  $result= mysqli_query($con,$sql) or die(mysqli_error($con));
	  $row = mysqli_fetch_array( $result);
?>
<script type='text/javascript' src='settings/construction_for_construction_form_validation.js'></script>

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
 function sending_data_of_construction_for_construction_form_for_saving_in_database()
 {


       var validate = Form_Validation();
       var url_encoded_form_data = $("#construction_for_construction_form").serialize(); //This will read all control elements value of the form	
       if(validate != false)
	   {


		  	 $.ajax({
			 		url: 'settings/edit_construction_for_version_saving.php',
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

 }//End of function sending_data_of_construction_for_construction_form_for_saving_in_database()
/***************************************************** FOR AUTO COMPLETE********************************************************************/

$('.construction_for_version').chosen();


/***************************************************** FOR AUTO COMPLETE********************************************************************/
</script>
<div class="col-sm-12 col-md-12 col-lg-12">

		<div class="panel panel-default"> <!-- This div will create a block/panel for FORM -->

				<div class="panel-heading" style="color:#191970;"><b>Edit Construction For Version</b></div> <!-- This will create a upper block for FORM (Just Beautification) -->


				<nav aria-label="breadcrumb">
					  <ol class="breadcrumb">
					    <li class="breadcrumb-item active" aria-current="page">Home</li>
					    <li class="breadcrumb-item"><a onclick="load_page('settings/construction_for_version.php')">Add Construction For Version</a></li>
					    <li class="breadcrumb-item"><a>Edit Construction For Version</a></li>
					  </ol>
				 </nav>

				<form class="form-horizontal" action="" style="margin-top:10px;" name="construction_for_construction_form" id="construction_for_construction_form">

						<div class="form-group form-group-sm" id="form-group_for_warp_yarn_count">
								<label class="control-label col-sm-3" for="warp_yarn_count" style="color:#00008B;">Warp Yarn Count:</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="warp_yarn_count" name="warp_yarn_count" value="<?php echo $row['warp_yarn_count'] ?>">
									<input type="hidden" class="form-control" id="construction_id" name="construction_id" value="<?php echo $row['construction_id'] ?>">
								</div>
								<i class="glyphicon glyphicon-remove" onclick="Remove_Value_Of_This_Element('warp_yarn_count')"></i>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_warp_yarn_count"> -->

						<div class="form-group form-group-sm" id="form-group_for_no_of_ply_for_warp_yarn">
						<label class="control-label col-sm-3" for="no_of_ply_for_warp_yarn" style="margin-right:0px; color:#00008B;">No Of Ply For Warp Yarn:</label>
							<div class="col-sm-5">
								<select  class="form-control construction_for_version" id="no_of_ply_for_warp_yarn" name="no_of_ply_for_warp_yarn">
									<option select="selected" value="select">Select No Of Ply For Warp Yarn</option>
									  <?php $no_of_ply_for_warp_yarn = $row['no_of_ply_for_warp_yarn']; ?>
		                                <?php 
		                                  if ($no_of_ply_for_warp_yarn == '1')
		                                  {
		                                      ?>
		                                          <option value="1" selected >1</option>
		                                          <option value="2" >2</option>
		                                          <option value="3" >3</option>
		                                          <option value="4" >4</option>
		                                          <option value="5" >5</option>
		                                      <?php 
		                                  } 

		                                  elseif ($no_of_ply_for_warp_yarn == '2') 
		                                  {
		                                      ?>
		                                          <option value="1" >1</option>
		                                          <option value="2" selected>2</option>
		                                          <option value="3" >3</option>
		                                          <option value="4" >4</option>
		                                          <option value="5" >5</option>
		                                      <?php 
		                                  }
		                                  elseif ($no_of_ply_for_warp_yarn == '3') 
		                                  {
		                                      ?>
		                                          <option value="1" >1</option>
		                                          <option value="2">2</option>
		                                          <option value="3" selected>3</option>
		                                          <option value="4" >4</option>
		                                          <option value="5" >5</option>
		                                      <?php 
		                                  }

		                                  elseif ($no_of_ply_for_warp_yarn == '4') 
		                                  {
		                                      ?>
		                                          <option value="1" >1</option>
		                                          <option value="2">2</option>
		                                          <option value="3" >3</option>
		                                          <option value="4" selected>4</option>
		                                          <option value="5" >5</option>
		                                      <?php 
		                                  }


		                                  else
		                                  {
		                                      ?>
		                                          <option value="1" >1</option>
		                                          <option value="2">2</option>
		                                          <option value="3" >3</option>
		                                          <option value="4" >4</option>
		                                          <option value="5" selected>5</option>
		                                      <?php 
		                                  }
		                                ?>
								</select>
								
							</div>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_no_of_ply_for_warp_yarn"> -->

						<div class="form-group form-group-sm" id="form-group_for_uom_of_warp_yarn">
						<label class="control-label col-sm-3" for="uom_of_warp_yarn" style="margin-right:0px; color:#00008B;">Uom Of Warp Yarn:</label>
							<div class="col-sm-5">
								<select  class="form-control construction_for_version" id="uom_of_warp_yarn" name="uom_of_warp_yarn">
											

									  <option select="selected" value="select">Select Uom Of Warp Yarn</option>
									       <?php $uom_of_warp_yarn = $row['uom_of_warp_yarn']; ?>
		                                <?php 
		                                  if ($uom_of_warp_yarn == 'Ne')
		                                  {
		                                      ?>
			                                    <option value="Ne" selected>Ne</option>
												<option value="Nm">Nm</option>
												<option value="Tex">Tex</option>
												<option value="Den">Den</option>
												<option value="Dtex">Dtex</option>
		                                      <?php 
		                                  } 

		                                  elseif ($uom_of_warp_yarn == 'Nm') 
		                                  {
		                                      ?>
		                                        <option value="Ne">Ne</option>
												<option value="Nm" selected>Nm</option>
												<option value="Tex">Tex</option>
												<option value="Den">Den</option>
												<option value="Dtex">Dtex</option>
		                                      <?php 
		                                  }
		                                  elseif ($uom_of_warp_yarn == 'Tex') 
		                                  {
		                                      ?>
		                                        <option value="Ne">Ne</option>
												<option value="Nm" >Nm</option>
												<option value="Tex" selected>Tex</option>
												<option value="Den">Den</option>
												<option value="Dtex">Dtex</option>
		                                      <?php 
		                                  }

		                                  elseif ($uom_of_warp_yarn == 'Den') 
		                                  {
		                                      ?>
		                                        <option value="Ne">Ne</option>
												<option value="Nm" >Nm</option>
												<option value="Tex" >Tex</option>
												<option value="Den" selected>Den</option>
												<option value="Dtex">Dtex</option>
		                                      <?php 
		                                  }


		                                  else
		                                  {
		                                      ?>
		                                         <option value="Ne">Ne</option>
												<option value="Nm" >Nm</option>
												<option value="Tex" >Tex</option>
												<option value="Den" >Den</option>
												<option value="Dtex" selected>Dtex</option>
		                                      <?php 
		                                  }
		                                ?>
											
								</select>
							</div>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_uom_of_warp_yarn"> -->

						<div class="form-group form-group-sm" id="form-group_for_weft_yarn_count">
								<label class="control-label col-sm-3" for="weft_yarn_count" style="color:#00008B;">Weft Yarn Count:</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="weft_yarn_count" name="weft_yarn_count" value="<?php echo $row['weft_yarn_count']?>" required>
								</div>
								<i class="glyphicon glyphicon-remove" onclick="Remove_Value_Of_This_Element('weft_yarn_count')"></i>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_weft_yarn_count"> -->

						<div class="form-group form-group-sm" id="form-group_for_no_of_ply_for_weft_yarn">
						<label class="control-label col-sm-3" for="no_of_ply_for_weft_yarn" style="margin-right:0px; color:#00008B;">No Of Ply For Weft Yarn:</label>
							<div class="col-sm-5">
								<select  class="form-control construction_for_version" id="no_of_ply_for_weft_yarn" name="no_of_ply_for_weft_yarn">
									<option select="selected" value="select">Select No Of Ply For Weft Yarn</option>
									 <?php $no_of_ply_for_weft_yarn = $row['no_of_ply_for_weft_yarn']; ?>
		                                <?php 
		                                  if ($no_of_ply_for_weft_yarn == '1')
		                                  {
		                                      ?>
		                                          <option value="1" selected >1</option>
		                                          <option value="2" >2</option>
		                                          <option value="3" >3</option>
		                                          <option value="4" >4</option>
		                                          <option value="5" >5</option>
		                                      <?php 
		                                  } 

		                                  elseif ($no_of_ply_for_weft_yarn == '2') 
		                                  {
		                                      ?>
		                                          <option value="1" >1</option>
		                                          <option value="2" selected>2</option>
		                                          <option value="3" >3</option>
		                                          <option value="4" >4</option>
		                                          <option value="5" >5</option>
		                                      <?php 
		                                  }
		                                  elseif ($no_of_ply_for_weft_yarn == '3') 
		                                  {
		                                      ?>
		                                          <option value="1" >1</option>
		                                          <option value="2">2</option>
		                                          <option value="3" selected>3</option>
		                                          <option value="4" >4</option>
		                                          <option value="5" >5</option>
		                                      <?php 
		                                  }

		                                  elseif ($no_of_ply_for_weft_yarn == '4') 
		                                  {
		                                      ?>
		                                          <option value="1" >1</option>
		                                          <option value="2">2</option>
		                                          <option value="3" >3</option>
		                                          <option value="4" selected>4</option>
		                                          <option value="5" >5</option>
		                                      <?php 
		                                  }


		                                  else
		                                  {
		                                      ?>
		                                          <option value="1" >1</option>
		                                          <option value="2">2</option>
		                                          <option value="3" >3</option>
		                                          <option value="4" >4</option>
		                                          <option value="5" selected>5</option>
		                                      <?php 
		                                  }
		                                ?>
								</select>
							</div>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_no_of_ply_for_weft_yarn"> -->

						<div class="form-group form-group-sm" id="form-group_for_uom_of_weft_yarn">
						<label class="control-label col-sm-3" for="uom_of_weft_yarn" style="margin-right:0px; color:#00008B;">Uom Of Weft Yarn:</label>
							<div class="col-sm-5">
								<select  class="form-control construction_for_version" id="uom_of_weft_yarn" name="uom_of_weft_yarn">
									<option select="selected" value="select">Select Uom Of Weft Yarn</option>
											
									    <?php $uom_of_weft_yarn = $row['uom_of_weft_yarn']; ?>
		                                <?php 
		                                  if ($uom_of_weft_yarn == 'Ne')
		                                  {
		                                      ?>
			                                    <option value="Ne" selected>Ne</option>
												<option value="Nm">Nm</option>
												<option value="Tex">Tex</option>
												<option value="Den">Den</option>
												<option value="Dtex">Dtex</option>
		                                      <?php 
		                                  } 

		                                  elseif ($uom_of_weft_yarn == 'Nm') 
		                                  {
		                                      ?>
		                                        <option value="Ne">Ne</option>
												<option value="Nm" selected>Nm</option>
												<option value="Tex">Tex</option>
												<option value="Den">Den</option>
												<option value="Dtex">Dtex</option>
		                                      <?php 
		                                  }
		                                  elseif ($uom_of_weft_yarn == 'Tex') 
		                                  {
		                                      ?>
		                                        <option value="Ne">Ne</option>
												<option value="Nm" >Nm</option>
												<option value="Tex" selected>Tex</option>
												<option value="Den">Den</option>
												<option value="Dtex">Dtex</option>
		                                      <?php 
		                                  }

		                                  elseif ($uom_of_weft_yarn == 'Den') 
		                                  {
		                                      ?>
		                                        <option value="Ne">Ne</option>
												<option value="Nm" >Nm</option>
												<option value="Tex" >Tex</option>
												<option value="Den" selected>Den</option>
												<option value="Dtex">Dtex</option>
		                                      <?php 
		                                  }


		                                  else
		                                  {
		                                      ?>
		                                         <option value="Ne">Ne</option>
												<option value="Nm" >Nm</option>
												<option value="Tex" >Tex</option>
												<option value="Den" >Den</option>
												<option value="Dtex" selected>Dtex</option>
		                                      <?php 
		                                  }
		                                ?>

                                       
								</select>
							</div>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_uom_of_weft_yarn"> -->

						<div class="form-group form-group-sm" id="form-group_for_no_of_threads_per_inch_in_warp">
								<label class="control-label col-sm-3" for="no_of_threads_per_inch_in_warp" style="color:#00008B;">No Of Threads Per Inch In Warp:</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="no_of_threads_per_inch_in_warp" name="no_of_threads_per_inch_in_warp" value="<?php echo $row['no_of_threads_per_inch_in_warp'] ?>" required>
								</div>
								<i class="glyphicon glyphicon-remove" onclick="Remove_Value_Of_This_Element('no_of_threads_per_inch_in_warp')"></i>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_no_of_threads_per_inch_in_warp"> -->

						<div class="form-group form-group-sm" id="form-group_for_warp_insertion">
						<label class="control-label col-sm-3" for="warp_insertion" style="margin-right:0px; color:#00008B;">Warp Insertion:</label>
							<div class="col-sm-5">
								<select  class="form-control construction_for_version" id="warp_insertion" name="warp_insertion">
									<option select="selected" value="select">Select Warp Insertion</option>
									 <?php $warp_insertion = $row['warp_insertion']; ?>
		                                <?php 
		                                  if ($warp_insertion == '1')
		                                  {
		                                      ?>
		                                          <option value="1" selected >1</option>
		                                          <option value="2" >2</option>
		                                          <option value="3" >3</option>
		                                          <option value="4" >4</option>
		                                          <option value="5" >5</option>
		                                      <?php 
		                                  } 

		                                  elseif ($warp_insertion == '2') 
		                                  {
		                                      ?>
		                                          <option value="1" >1</option>
		                                          <option value="2" selected>2</option>
		                                          <option value="3" >3</option>
		                                          <option value="4" >4</option>
		                                          <option value="5" >5</option>
		                                      <?php 
		                                  }
		                                  elseif ($warp_insertion == '3') 
		                                  {
		                                      ?>
		                                          <option value="1" >1</option>
		                                          <option value="2">2</option>
		                                          <option value="3" selected>3</option>
		                                          <option value="4" >4</option>
		                                          <option value="5" >5</option>
		                                      <?php 
		                                  }

		                                  elseif ($warp_insertion == '4') 
		                                  {
		                                      ?>
		                                          <option value="1" >1</option>
		                                          <option value="2">2</option>
		                                          <option value="3" >3</option>
		                                          <option value="4" selected>4</option>
		                                          <option value="5" >5</option>
		                                      <?php 
		                                  }


		                                  else
		                                  {
		                                      ?>
		                                          <option value="1" >1</option>
		                                          <option value="2">2</option>
		                                          <option value="3" >3</option>
		                                          <option value="4" >4</option>
		                                          <option value="5" selected>5</option>
		                                      <?php 
		                                  }
		                                ?>
								</select>
							</div>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_warp_insertion"> -->

						<div class="form-group form-group-sm" id="form-group_for_no_of_threads_per_inch_in_weft">
								<label class="control-label col-sm-3" for="no_of_threads_per_inch_in_weft" style="color:#00008B;">No Of Threads Per Inch In Weft:</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="no_of_threads_per_inch_in_weft" name="no_of_threads_per_inch_in_weft" value="<?php echo $row['no_of_threads_per_inch_in_weft'] ?>" required>
								</div>
								<i class="glyphicon glyphicon-remove" onclick="Remove_Value_Of_This_Element('no_of_threads_per_inch_in_weft')"></i>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_no_of_threads_per_inch_in_weft"> -->

						<div class="form-group form-group-sm" id="form-group_for_weft_insertion">
						<label class="control-label col-sm-3" for="weft_insertion" style="margin-right:0px; color:#00008B;">Weft Insertion:</label>
							<div class="col-sm-5">
								<select  class="form-control construction_for_version" id="weft_insertion" name="weft_insertion">
								  <option select="selected" value="select">Select Weft Insertion</option>
									<?php $weft_insertion = $row['weft_insertion']; ?>
		                                <?php 
		                                  if ($weft_insertion == '1')
		                                  {
		                                      ?>
		                                          <option value="1" selected >1</option>
		                                          <option value="2" >2</option>
		                                          <option value="3" >3</option>
		                                          <option value="4" >4</option>
		                                          <option value="5" >5</option>
		                                      <?php 
		                                  } 

		                                  elseif ($weft_insertion == '2') 
		                                  {
		                                      ?>
		                                          <option value="1" >1</option>
		                                          <option value="2" selected>2</option>
		                                          <option value="3" >3</option>
		                                          <option value="4" >4</option>
		                                          <option value="5" >5</option>
		                                      <?php 
		                                  }
		                                  elseif ($weft_insertion == '3') 
		                                  {
		                                      ?>
		                                          <option value="1" >1</option>
		                                          <option value="2">2</option>
		                                          <option value="3" selected>3</option>
		                                          <option value="4" >4</option>
		                                          <option value="5" >5</option>
		                                      <?php 
		                                  }

		                                  elseif ($weft_insertion == '4') 
		                                  {
		                                      ?>
		                                          <option value="1" >1</option>
		                                          <option value="2">2</option>
		                                          <option value="3" >3</option>
		                                          <option value="4" selected>4</option>
		                                          <option value="5" >5</option>
		                                      <?php 
		                                  }


		                                  else
		                                  {
		                                      ?>
		                                          <option value="1" >1</option>
		                                          <option value="2">2</option>
		                                          <option value="3" >3</option>
		                                          <option value="4" >4</option>
		                                          <option value="5" selected>5</option>
		                                      <?php 
		                                  }
		                                ?>

		                                </select>
								
							</div>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_weft_insertion"> -->

						<div class="form-group form-group-sm">
								<div class="col-sm-offset-3 col-sm-5">
									<button type="button" class="btn btn-primary" onClick="sending_data_of_construction_for_construction_form_for_saving_in_database()">Submit</button>
									<button type="reset" class="btn btn-success">Reset</button>
								</div>
						</div>

				</form>

		</div> <!-- End of <div class="panel panel-default"> -->

</div> <!-- End of <div class="col-sm-12 col-md-12 col-lg-12"> -->