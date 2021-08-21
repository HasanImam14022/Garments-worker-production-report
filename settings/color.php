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

$result=mysql_query($sql) or die(mysql_error());
if(mysql_num_rows($result)<1)
{

	header('Location:logout.php');

}
*/
?>


<script type='text/javascript' src='settings/color_form_validation.js'></script>

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


  function sending_data_for_delete_color(color_id)
 {
       var div=$('#table_load').html();
       var url_encoded_form_data = 'color_id='+color_id;
       
		  	 $.ajax({
			 		url: 'settings/color_deleting.php',
			 		dataType: 'text',
			 		type: 'post',
			 		contentType: 'application/x-www-form-urlencoded',
			 		data: url_encoded_form_data,
			 		success: function( data, textStatus, jQxhr )
			 		{
			 				alert(data);

			 				if(data=='Color is successfully Deleted.')
			 				{
			 					/*alert("ok");*/
                              
			 					
                              
                              /*$('#table_load').html(div);*/
                              /*$('#datatable-buttons').DataTable().ajax.reload();*/

			 					
			 				}
			 		},
			 		error: function( jqXhr, textStatus, errorThrown )
			 		{
			 				//console.log( errorThrown );
			 				alert(errorThrown);
			 		}
			 }); // End of $.ajax({



 }//End of function sending_data_of_color_form_for_delete_from_database()


 function sending_data_of_color_form_for_saving_in_database()
 {


       var validate = Form_Validation();
       var url_encoded_form_data = $("#color_form").serialize(); //This will read all control elements value of the form	
       if(validate != false)
	   {


		  	 $.ajax({
			 		url: 'settings/color_saving.php',
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

 }//End of function sending_data_of_color_form_for_saving_in_database()




</script>
<div class="col-sm-12 col-md-12 col-lg-12">
    <div id="for_all_page_load">
		<div class="panel panel-default"> <!-- This div will create a block/panel for FORM -->

				<div class="panel-heading" style="color:#191970;"><b>Color</b></div> <!-- This will create a upper block for FORM (Just Beautification) -->

				   <nav aria-label="breadcrumb">
					  <ol class="breadcrumb">
					    <li class="breadcrumb-item active" aria-current="page">Home</li>
					     <li class="breadcrumb-item"><a onclick="load_page('settings/color.php')">Add Color</a></li>
					  </ol>
					</nav>

				<form class="form-horizontal" action="" style="margin-top:10px;" name="color_form" id="color_form">

						<div class="form-group form-group-sm" id="form-group_for_color_name">
								<label class="control-label col-sm-3" for="color_name" style="color:#00008B;">Color Name:</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="color_name" name="color_name" placeholder="Enter Color Name" required>

								</div>

								<i class="glyphicon glyphicon-remove" onclick="Remove_Value_Of_This_Element('color_name')"></i>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_color_name"> -->

						<div class="form-group form-group-sm">
								<div class="col-sm-offset-3 col-sm-5">
									<button type="button" class="btn btn-primary" onClick="sending_data_of_color_form_for_saving_in_database()">Submit</button>
									<button type="reset" class="btn btn-success">Reset</button>
								</div>
						</div>

				</form>




		</div> <!-- End of <div class="panel panel-default"> -->
        






   <div class="panel panel-default" id="table_load">

        

   
       <div class="form-group form-group-sm">
	         <label class="control-label col-sm-5" for="search">Color List</label>
	   </div> <!-- End of <div class="form-group form-group-sm" -->


        <div class="form-group form-group-sm" >
          <table id="datatable-buttons" class="table table-striped table-bordered">
         	<thead>
                 <tr>
                 <th>SI</th>
                 <th>Color Name</th>
                 <th>Action</th>
                 </tr>
            </thead>
            <tbody>
            <?php 
                            $s1 = 1;
                            $sql_for_color = "SELECT * FROM color ORDER BY row_id ASC";

                            $res_for_color = mysqli_query($con, $sql_for_color);

                            while ($row = mysqli_fetch_assoc($res_for_color)) 
                            {
             ?>

             <tr>
                <td><?php echo $s1; ?></td>
                <td><?php echo $row['color_name']; ?></td>
                <td>
                      
                        
                        <button type="submit" id="edit_color" name="edit_color"  class="btn btn-primary btn-xs" onclick="load_page('settings/edit_color.php?color_id=<?php echo $row['color_id'] ?>')"> Edit </button>
                       <span>  </span>
              
                        <!-- <form action="" name="deleting_color_form" id="deleting_color_form">

                        	
                        <input type="hidden" class="form-control" id="color_id" name="color_id" value="<?php echo $row['color_id'] ?>">

                        <button type="submit" id="delete_color" name="delete_color"  class="btn btn-danger btn-xs" onclick="sending_data_of_color_form_for_deleting_in_database()"> Delete </button>

                        </form> -->
                        <!--  <button type="submit" id="delete_color" name="delete_color"  class="btn btn-danger btn-xs" onclick="load_page('settings/color_deleting.php?color_id=<?php echo $row['color_id'] ?>')"> Delete </button> -->


                        <button type="submit" id="delete_color" name="delete_color"  class="btn btn-danger btn-xs" onclick="sending_data_for_delete_color('<?php echo $row['color_id'] ?>')"> Delete </button>
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

      </div>  <!-- End of <div class="panel panel-default"> -->
    </div>  <!-- End of <div id="for_all_page_load"> -->
</div> <!-- End of <div class="col-sm-12 col-md-12 col-lg-12"> -->





