<?php
session_start();
include('../login/db_connection_class.php');
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
<script type='text/javascript' src='settings/process_technique_or_program_type_form_validation.js'></script>

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
 function sending_data_of_process_technique_or_program_type_form_for_saving_in_database()
 {


       var validate = Form_Validation();
       var url_encoded_form_data = $("#process_technique_or_program_type_form").serialize(); //This will read all control elements value of the form	
       if(validate != false)
	   {


		  	 $.ajax({
			 		url: 'settings/process_technique_or_program_type_saving.php',
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

 }//End of function sending_data_of_process_technique_or_program_type_form_for_saving_in_database()


 function sending_data_for_delete(process_technique_id)
 {
      
       var url_encoded_form_data = 'process_technique_id='+process_technique_id;
       
		  	 $.ajax({
			 		url: 'settings/process_technique_or_program_type_deleting.php',
			 		dataType: 'text',
			 		type: 'GET',
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

</script>
<div class="col-sm-12 col-md-12 col-lg-12">

		<div class="panel panel-default"> <!-- This div will create a block/panel for FORM -->

				<div class="panel-heading" style="color:#191970;"><b>Process Technique Or Program Type</b></div> <!-- This will create a upper block for FORM (Just Beautification) -->

				<nav aria-label="breadcrumb">
					  <ol class="breadcrumb">
					    <li class="breadcrumb-item active" aria-current="page">Home</li>
					    <li class="breadcrumb-item"><a onclick="load_page('settings/process_technique_or_program_type.php')">Process Name</a></li>
					    
					  </ol>
				 </nav>

				<form class="form-horizontal" action="" style="margin-top:10px;" name="process_technique_or_program_type_form" id="process_technique_or_program_type_form">

						<div class="form-group form-group-sm" id="form-group_for_process_technique_name">
								<label class="control-label col-sm-3" for="process_technique_name" style="color:#00008B;">Process Technique Name:</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="process_technique_name" name="process_technique_name" placeholder="Enter Process Technique Name" required>
								</div>
								<i class="glyphicon glyphicon-remove" onclick="Remove_Value_Of_This_Element('process_technique_name')"></i>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_process_technique_name"> -->

						<div class="form-group form-group-sm">
								<div class="col-sm-offset-3 col-sm-5">
									<button type="button" class="btn btn-primary" onClick="sending_data_of_process_technique_or_program_type_form_for_saving_in_database()">Submit</button>
									<button type="reset" class="btn btn-success">Reset</button>
								</div>
						</div>

				</form>

		</div> <!-- End of <div class="panel panel-default"> -->



      <div class="panel panel-default">
 
       
       
	       <div class="form-group form-group-sm">
		            

		              <label class="control-label col-sm-5" for="search">Process Technique or Program Type List</label>

		  </div> <!-- End of <div class="form-group form-group-sm" -->



        <div class="form-group form-group-sm">
     
          <table id="datatable-buttons" class="table table-striped table-bordered">
         	<thead>
                 <tr>
                 <th>SI</th>
                 <th>Process Technique(Program Type) Name</th>
                 <th>Action</th>
                 </tr>
            </thead>
            <tbody>
            <?php 
                            $s1 = 1;
                            $sql_for_color = "SELECT * FROM process_technique_or_program_type ORDER BY row_id ASC";

                            $res_for_color = mysqli_query($con, $sql_for_color);

                            while ($row = mysqli_fetch_assoc($res_for_color)) 
                            {
             ?>

             <tr>
                <td><?php echo $s1; ?></td>
                <td><?php echo $row['process_technique_name']; ?></td>
                <td>
                     
                        <button type="submit" id="edit_process_technique" name="edit_process_technique" class="btn btn-primary btn-xs" onclick="load_page('settings/edit_process_technique_or_program_type.php?process_technique_id=<?php  echo $row['process_technique_id']?>')"> Edit </button>

                        <button type="submit" id="" name="" class="btn btn-danger btn-xs" onclick="sending_data_for_delete('<?php  echo $row['process_technique_id']?>')"> Delete </button>
                    
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

        </div> <!-- End of <div class="panel panel-default"> -->

</div> <!-- End of <div class="col-sm-12 col-md-12 col-lg-12"> -->