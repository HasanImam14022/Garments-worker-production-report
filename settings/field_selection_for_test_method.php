<?php
session_start();
require_once("../login/session.php");
include('../login/db_connection_class.php');
$obj = new DB_Connection_Class();
$obj->connection();
/*
$user_id = $_SESSION['user_id'];
$password = $_SESSION['password'];

$sql="select * from hrm_info.user_login where user_id='$user_id' and `password`='$password'";

$result=mysql_query($sql) or die(mysql_error());s
if(mysql_num_rows($result)<1)
{

	header('Location:logout.php');

}
*/

/*$test_method_id=$_GET['test_method_id'];
$splitted_data=explode("?fs?", $test_method_id);
$test_method_id=$splitted_data[0];
$test_id=$splitted_data[1];*/


$customer_id=$_GET['customer_id'];
$splitted_data_for_selection=explode("?fs?", $customer_id);
$customer_id=$splitted_data_for_selection[0];
$test_id=$splitted_data_for_selection[1];


/*$sql_for_field_selection="select * from `test_method_name` where `test_method_id`='$test_method_id' ";*/

$sql_for_field_selection="select * from `test_method_for_customer` where `customer_id`='$customer_id' AND `test_id`='$test_id' ";

$res_for_field_selection = mysqli_query($con, $sql_for_field_selection);

$row = mysqli_fetch_assoc($res_for_field_selection);

?>


<style>

.form-group		/* This is for reducing Gap among Form's Fields */
{

	margin-bottom: 5px;

}

</style>

<script>


	function printContent(el){
    var restorepage = document.body.innerHTML;
    var printcontent = document.getElementById(el).innerHTML;
    document.body.innerHTML = printcontent;
    window.print();
    document.body.innerHTML = restorepage;
}

</script>



<script>
 function sending_data_of_field_selection_for_test_method_form_for_saving_in_database()
 {


       var url_encoded_form_data = $("#field_selection_form").serialize(); //This will read all control elements value of the form	


		  	 $.ajax({
			 		url: 'settings/field_selection_for_test_method_saving.php',
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


 }//End of function sending_data_of_test_method_name_form_for_saving_in_database()

</script>

     <div class="col-sm-12 col-md-12 col-lg-12">
       <div class="panel panel-default">

				<form class="form-horizontal" action="" style="margin-top:10px;" name="field_selection_form" id="field_selection_form"> 
                   <div class="form-group form-group-sm" id="form-group_for_field_selection">




                   	<div class="form-group form-group-sm" id="form-group_for_test_name">
		                <label class="control-label col-sm-3" for="test_name" style="color:#00008B;">Test Name:</label>
		                <div class="col-sm-5">
		                  <input type="text" class="form-control" id="test_name" name="test_name" value="<?php echo $row['test_name'] ?>" readonly>

		                  <input type="hidden" class="form-control" id="test_id" name="test_id" value="<?php echo $row['test_id'] ?>" required>
		                  <input type="hidden" class="form-control" id="test_name_for_use" name="test_name_for_use" value="<?php echo $row['test_name_for_use'] ?>" >
		                  <input type="hidden" class="form-control" id="customer_id" name="customer_id" value="<?php echo $row['customer_id'] ?>" required>
		                </div>
		                
		            </div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_test_name"> -->



                   	 <div class="form-group form-group-sm" id="form-group_for_test_method_name">
								<label class="control-label col-sm-3" for="test_method_name" style="color:#00008B;">Test Method Name:</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="test_method_name" name="test_method_name" value="<?php echo $row['test_method_name'] ?>" readonly>

									<input type="hidden" class="form-control" id="test_method_id" name="test_method_id" value="<?php echo $row['test_method_id'] ?>" required>
								</div>
								
					</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_test_method_name"> -->


					

					    	
                      <div class="form-group form-group-sm" id="form-group_for_direction_or_type">
						<label class="control-label col-sm-3" for="direction_or_type" style="margin-right:0px; color:#00008B;">Direction/Type:</label>
							<div class="col-sm-5">
								<input type="radio" name="direction_or_type"
								<?php if (isset($direction_or_type) && $direction_or_type=="0") echo "checked";?>
								value="0">Don't Need
								<input type="radio" name="direction_or_type"
								<?php if (isset($direction_or_type) && $direction_or_type=="1") echo "checked";?>
								value="1">Needed
							</div>
					</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_direction_or_type"> -->


					<div class="form-group form-group-sm" id="form-group_for_field_for_value">
		              <label class="control-label col-sm-3" for="field_for_value" style="margin-right:0px; color:#00008B;">Value :</label>
		              <div class="col-sm-5">
		                <input type="radio" name="field_for_value"
		                <?php if (isset($field_for_value) && $field_for_value=="0") echo "checked";?>
		                value="0">Don't Need
		                <input type="radio" name="field_for_value"
		                <?php if (isset($field_for_value) && $field_for_value=="1") echo "checked";?>
		                value="1">Needed
		              </div>
		          </div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_field_for_value"> -->


		          <div class="form-group form-group-sm" id="form-group_for_field_for_math_operator">
	                 <label class="control-label col-sm-3" for="field_for_math_operator" style="margin-right:0px; color:#00008B;">Math Operator :</label>
	                  <div class="col-sm-5">
	                    <input type="radio" name="field_for_math_operator"
	                    <?php if (isset($field_for_math_operator) && $field_for_math_operator=="0") echo "checked";?>
	                    value="0">Don't Need
	                    <input type="radio" name="field_for_math_operator"
	                    <?php if (isset($field_for_math_operator) && $field_for_math_operator=="1") echo "checked";?>
	                    value="1">Needed
	                  </div>
	              </div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_field_for_math_operator"> -->


	              <div class="form-group form-group-sm" id="form-group_for_field_for_tolerance">
	                 <label class="control-label col-sm-3" for="field_for_tolerance" style="margin-right:0px; color:#00008B;">tolerance :</label>
	                  <div class="col-sm-5">
	                    <input type="radio" name="field_for_tolerance"
	                    <?php if (isset($field_for_tolerance) && $field_for_tolerance=="0") echo "checked";?>
	                    value="0">Don't Need
	                    <input type="radio" name="field_for_tolerance"
	                    <?php if (isset($field_for_tolerance) && $field_for_tolerance=="1") echo "checked";?>
	                    value="1">Needed
	                  </div>
	              </div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_field_for_tolerance"> -->


	              <div class="form-group form-group-sm" id="form-group_for_field_for_uom">
	                 <label class="control-label col-sm-3" for="field_for_uom" style="margin-right:0px; color:#00008B;">Unit :</label>
	                  <div class="col-sm-5">
	                    <input type="radio" name="field_for_uom"
	                    <?php if (isset($field_for_uom) && $field_for_uom=="0") echo "checked";?>
	                    value="0">Don't Need
	                    <input type="radio" name="field_for_uom"
	                    <?php if (isset($field_for_uom) && $field_for_uom=="1") echo "checked";?>
	                    value="1">Needed
	                  </div>
	              </div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_field_for_uom"> -->


	              <div class="form-group form-group-sm" id="form-group_for_field_for_minimum_value">
	                 <label class="control-label col-sm-3" for="field_for_minimum_value" style="margin-right:0px; color:#00008B;">Minimum Value :</label>
	                  <div class="col-sm-5">
	                    <input type="radio" name="field_for_minimum_value"
	                    <?php if (isset($field_for_minimum_value) && $field_for_minimum_value=="0") echo "checked";?>
	                    value="0">Don't Need
	                    <input type="radio" name="field_for_minimum_value"
	                    <?php if (isset($field_for_minimum_value) && $field_for_minimum_value=="1") echo "checked";?>
	                    value="1">Needed
	                  </div>
	              </div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_field_for_minimum_value"> -->


	             <div class="form-group form-group-sm" id="form-group_for_field_for_maximum_value">
	                 <label class="control-label col-sm-3" for="field_for_maximum_value" style="margin-right:0px; color:#00008B;">Maximum Value :</label>
	                  <div class="col-sm-5">
	                    <input type="radio" name="field_for_maximum_value"
	                    <?php if (isset($field_for_maximum_value) && $field_for_maximum_value=="0") echo "checked";?>
	                    value="0">Don't Need
	                    <input type="radio" name="field_for_maximum_value"
	                    <?php if (isset($field_for_maximum_value) && $field_for_maximum_value=="1") echo "checked";?>
	                    value="1">Needed
	                  </div>
	              </div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_field_for_maximum_value"> -->



	              <div class="form-group form-group-sm">
								<div class="col-sm-offset-3 col-sm-5">
									<button type="button" class="btn btn-primary" onClick="sending_data_of_field_selection_for_test_method_form_for_saving_in_database()">Submit</button>
									<button type="reset" class="btn btn-success">Reset</button>
								</div>
				    </div>


				</form>

				    
            </div>

         </div>   <!-- End of <div class="panel panel-default"> -->
     </div>   <!-- End of <div class="col-sm-12 col-md-12 col-lg-12"> -->





