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
<script type='text/javascript' src='settings/test_method_name_form_validation.js'></script>

<style>

.form-group		/* This is for reducing Gap among Form's Fields */
{

	margin-bottom: 5px;

}

</style>

<!-- For Auto Complete -->
<!-- <script type="text/javascript">

$(document).ready(function() {
    $(".form-control test-name").select2();
});
</script> -->

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
			 		url: 'settings/test_method_name_saving.php',
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

  function sending_data_for_delete(test_method_id)
 {
      
       var url_encoded_form_data = 'test_method_id='+test_method_id;
       
         $.ajax({
          url: 'settings/test_method_name_deleting.php',
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



 }//End of function sending_data_for_delete()

/***************************************************** FOR AUTO COMPLETE********************************************************************/

$('.test_mathod_name').chosen();


/***************************************************** FOR AUTO COMPLETE********************************************************************/
</script>
<div class="col-sm-12 col-md-12 col-lg-12">

		<div class="panel panel-default"> <!-- This div will create a block/panel for FORM -->

				<div class="panel-heading" style="color:#191970;"><b>Test Method Name</b></div> <!-- This will create a upper block for FORM (Just Beautification) -->

				<nav aria-label="breadcrumb">
					  <ol class="breadcrumb">
					    <li class="breadcrumb-item active" aria-current="page">Home</li>
					    <li class="breadcrumb-item"><a onclick="load_page('settings/test_method_name.php')">Add Test Method Name</a></li>
					  </ol>
				 </nav>

				<form class="form-horizontal" action="" style="margin-top:10px;" name="test_method_name_form" id="test_method_name_form">

						<div class="form-group form-group-sm" id="form-group_for_test_name">
						<label class="control-label col-sm-3" for="test_name" style="margin-right:0px; color:#00008B;">Test Name:</label>
							<div class="col-sm-5">
								<select  class="form-control test_mathod_name" id="test_name" name="test_name">
											<option select="selected" value="select">Select Test Name</option>
											<?php 
												 $sql = "select * from `test_name_and_method_for_all_process` order by `id` asc";
												 $result= mysqli_query($con,$sql) or die(mysqli_error());
												 while( $row = mysqli_fetch_array( $result))
												 {

													 echo '<option value="'.$row['test_name'].'?fs?'.$row['test_id'].'">'.$row['test_name'].'</option>';

												 }

											 ?>
								</select>
							</div>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_test_name"> -->

						<div class="form-group form-group-sm" id="form-group_for_test_method_name">
								<label class="control-label col-sm-3" for="test_method_name" style="color:#00008B;">Test Method Name:</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="test_method_name" name="test_method_name" placeholder="Enter Test Method Name" required>
								</div>
								<i class="glyphicon glyphicon-remove" onclick="Remove_Value_Of_This_Element('test_method_name')"></i>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_test_method_name"> -->


                       <div class="form-group form-group-sm" id="form-group_for_iso_or_aatcc">

                          <label class="control-label col-sm-3" for="iso_or_aatcc" style="color:#00008B;">Test Method Type:</label>
                       	  <div class="col-sm-5">
							<input type="radio"  id="iso_or_aatcc" name="iso_or_aatcc" value="iso">  ISO 
							
							<input type="radio"  id="iso_or_aatcc" name="iso_or_aatcc" value="aatcc">  AATCC
							

							<input type="radio"  id="iso_or_aatcc" name="iso_or_aatcc" value="other">  Other 
							 
						  </div>

						  <i class="glyphicon glyphicon-remove" onclick="Remove_Value_Of_This_Element('iso_or_aatcc')"></i>

                      </div>  <!-- End of <div class="form-group form-group-sm" id="form-group_for_iso_or_aatcc"> -->



					<div class="form-group form-group-sm" id="form-group_for_test_name">
						<label class="control-label col-sm-3" for="test_name_same_as" style="margin-right:0px; color:#00008B;">Test Name Same As:</label>
							<div class="col-sm-5">
								<select  class="form-control test_mathod_name" id="test_name_same_as" name="test_name_same_as">
											<option select="selected" value="select">Select Test Name</option>
											<?php 
												 $sql = "select * from `test_name_and_method_for_all_process` order by `id` asc LIMIT 74";
												 $result= mysqli_query($con,$sql) or die(mysqli_error());
												 while( $row = mysqli_fetch_array( $result))
												 {

													 echo '<option value="'.$row['id'].'">'.$row['test_name'].'</option>';

												 }

											 ?>
								</select>
							</div>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_test_name"> -->

						<div class="form-group form-group-sm" id="form-group_for_criteria_or_testing_lab">
						<label class="control-label col-sm-3" for="criteria_or_testing_lab" style="margin-right:0px; color:#00008B;">Testing Lab:</label>
							<div class="col-sm-5">
								<select  class="form-control test_mathod_name" id="criteria_or_testing_lab" name="criteria_or_testing_lab">
											<option select="selected" value="select">Select Criteria Or Testing Lab</option>
											<option value="Physical Lab">Physical Lab</option>
											<option value="Washing Lab">Washing Lab</option>
											<option value="R&D Lab">R&D Lab</option>
								</select>
							</div>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_criteria_or_testing_lab"> -->

						<div class="form-group form-group-sm">
								<div class="col-sm-offset-3 col-sm-5">
									<button type="button" class="btn btn-primary" onClick="sending_data_of_test_method_name_form_for_saving_in_database()">Submit</button>
									<button type="reset" class="btn btn-success">Reset</button>
								</div>
						</div>


				</form>

		</div> <!-- End of <div class="panel panel-default"> -->



     <div class="panel panel-default">

     	
   
        <div class="form-group form-group-sm">
	              <label class="control-label col-sm-5" for="search">Test Method List</label>
	    </div> <!-- End of <div class="form-group form-group-sm" -->


        <div class="form-group form-group-sm">
          <table id="datatable-buttons" class="table table-striped table-bordered">
         	<thead>
                 <tr>
                 <th>SI</th>
                 <th>Test Name</th>
                 <th>Test Method Name</th>
                 <th>Testing Lab</th>
                 <th>Action</th>
                 </tr>
            </thead>
            <tbody>
            <?php 
                            $s1 = 1;
                            $sql_for_color = "SELECT * FROM test_method_name ORDER BY row_id ASC";

                            $res_for_color = mysqli_query($con, $sql_for_color);

                            while ($row = mysqli_fetch_assoc($res_for_color)) 
                            {
             ?>

             <tr>
                <td><?php echo $s1; ?></td>
                <td><?php echo $row['test_name']; ?></td>
                <td><?php echo $row['test_method_name']; ?></td>
                <td><?php echo $row['criteria_or_testing_lab']; ?></td>
                
                
                
                <td>
                      <form  method="post" style="display: inline;">
                        <input type="hidden" id="" name="" value="<?php echo $row['']; ?>">


                       <!--  <button type="submit" id="" name="" class="btn btn-primary btn-xs" onclick="load_page('settings/field_selection_for_test_method.php?test_method_id=<?php echo $row['test_method_id']."?fs?".$row['test_id'] ?>')"> Select Fields </button> -->

                        <button type="submit" id="" name="" class="btn btn-primary btn-xs" onclick="load_page('settings/edit_test_method_name.php?test_method_id=<?php echo $row['test_method_id'] ?>')"> Edit </button>

                        <button type="submit" id="" name="" class="btn btn-danger btn-xs" onclick="sending_data_for_delete('<?php echo $row['test_method_id'] ?>')"> Delete </button>
                      </form>
                    </td>
                <?php
                              
                $s1++;
                          }
                 ?>
             </tr>
           </tbody>
          </table>
         </div> <!-- End of <div class="form-group form-group-sm" -->

         	        <script>
                            $(document).ready(function() {
                          $('#datatable-buttons').DataTable( {
                              initComplete: function () {
                                  this.api().columns().every( function () {
                                      var column = this;
                                      var select = $('<select><option value=""></option></select>')
                                          .appendTo( $(column.footer()).empty() )
                                          .on( 'change', function () {
                                              var val = $.fn.dataTable.util.escapeRegex(
                                                  $(this).val()
                                              );
                       
                                              column
                                                  .search( val ? '^'+val+'$' : '', true, false )
                                                  .draw();
                                          } );
                       
                                      column.data().unique().sort().each( function ( d, j ) {
                                          select.append( '<option value="'+d+'">'+d+'</option>' )
                                      } );
                                  } );
                              }
                           } );
                        } );
                   </script>

		 

        </div>  <!-- end of <div class="panel panel-default"> -->

</div> <!-- End of <div class="col-sm-12 col-md-12 col-lg-12"> -->