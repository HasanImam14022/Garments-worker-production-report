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
?>
<script type='text/javascript' src='settings/sub_user_name_name_form_validation.js'></script>

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
 function sending_data_of_sub_user_name_name_form_for_saving_in_database()
 {


       var validate = sub_user_name_Name_Form_Validation();
       var url_encoded_form_data = $("#sub_user_name_name_form").serialize(); //This will read all control elements value of the form	
       if(validate != false)
	   {


		  	 $.ajax({
			 		url: 'settings/sub_user_name_name_saving.php',
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

 }//End of function sending_data_of_sub_user_name_name_form_for_saving_in_database()

</script>
<div class="col-sm-12 col-md-12 col-lg-12">

		<div class="panel panel-default"> <!-- This div will create a block/panel for FORM -->

				<div class="panel-heading" style="color:#191970;"><b>Sub User Name</b></div> <!-- This will create a upper block for FORM (Just Beautification) -->

				<nav aria-label="breadcrumb">
					  <ol class="breadcrumb">
					    <li class="breadcrumb-item active" aria-current="page">Home</li>
					     <li class="breadcrumb-item"><a onclick="load_page('settings/sub_user_name_name.php')">Add Sub User Name</a></li>
					  </ol>
				 </nav>

				<form class="form-horizontal" action="" style="margin-top:10px;" name="sub_user_name_name_form" id="sub_user_name_name_form">

						<div class="form-group form-group-sm" id="form-group_for_sub_user_name_name">
								<label class="control-label col-sm-3" for="sub_user_name_name" style="color:#00008B;">Sub User Name:</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="sub_user_name_name" name="sub_user_name_name" placeholder="Enter Sub User Name" required>
								</div>
								<i class="glyphicon glyphicon-remove" onclick="Remove_Value_Of_This_Element('sub_user_name_name')"></i>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_sub_user_name_name"> -->

							

						<div class="form-group form-group-sm" id="form-group_for_machine_name">
						<label class="control-label col-sm-3" for="machine_name" style="margin-right:0px; color:#00008B;">Machine Name:</label>
							<div class="col-sm-5">
								<select  class="form-control" id="machine_name" name="machine_name">
											<option select="selected" value="select">Select Machine Name</option>
											<?php 
												 $sql = "select * from `machine_name` order by row_id ASC";
												 $result= mysqli_query($con,$sql) or die(mysql_error);
												 while( $row = mysqli_fetch_array( $result))
												 {

													 echo '<option value="'.$row['machine_name']."?fs?".$row['machine_id'].'">'.$row['machine_name'].'</option>';

												 }

											 ?>
								</select>
							</div>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_machine_name"> -->

					

						<div class="form-group form-group-sm">
								<div class="col-sm-offset-3 col-sm-5">
									<button type="button" class="btn btn-primary" onClick="sending_data_of_sub_user_name_name_form_for_saving_in_database()">Submit</button>
									<button type="reset" class="btn btn-success">Reset</button>
								</div>
						</div>

				</form>

		</div> <!-- End of <div class="panel panel-default"> -->



    <div class="panel panel-default">


        <div class="form-group form-group-sm">
        

          <label class="col-sm-offset-7 control-label col-sm-1" for="search">Search</label>

          <div class="col-sm-4">
             <input type="text" id="my_input" class="form-control " onkeyup="my_function()" placeholder="Please Type Machine Name Keyword">
           </div>

       </div> <!-- End of <div class="form-group form-group-sm" -->

   
       <div class="form-group form-group-sm">
	            

	              <label class="control-label col-sm-5" for="search">Sub User List</label>

	   </div> <!-- End of <div class="form-group form-group-sm" -->




        <div class="form-group form-group-sm">

          <table id="datatable-buttons" class="table table-striped table-bordered">
         	<thead>
                 <tr>
                 <th>SI</th>
                 <th>Sub User Name</th>
                 <th>Machine Name</th>
                 <th>Action</th>
                 </tr>
            </thead>
            <tbody>
            <?php 
                            $s1 = 1;
                            $sql_for_color = "SELECT * FROM sub_user_name_name ORDER BY row_id ASC";

                            $res_for_color = mysqli_query($con, $sql_for_color);

                            while ($row = mysqli_fetch_assoc($res_for_color)) 
                            {
             ?>

             <tr>
                <td><?php echo $s1; ?></td>
                <td><?php echo $row['sub_user_name_name']; ?></td>
                <td><?php echo $row['machine_name']; ?></td>
                
                
                <td>
                     
                        <button type="submit" id="" name="" class="btn btn-primary btn-xs" onclick="load_page('settings/edit_sub_user_name_name.php?sub_user_name_id=<?php echo $row['sub_user_name_id']?>')"> Edit </button>


                        <button type="submit" id="" name="" class="btn btn-danger btn-xs" onclick="load_page('settings/sub_user_name_name_deleting.php?sub_user_name_id=<?php echo $row['sub_user_name_id']?>')"> Delete </button>
                     
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
	              function my_function() {
	                var input, filter, table, tr, td, i, txtValue;
	                input = document.getElementById("my_input");
	                filter = input.value.toUpperCase();
	                table = document.getElementById("datatable-buttons");
	                tr = table.getElementsByTagName("tr");
	                for (i = 0; i < tr.length; i++) {
	                  td = tr[i].getElementsByTagName("td")[2];
	                  if (td) {
	                    txtValue = td.textContent || td.innerText;
	                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
	                      tr[i].style.display = "";
	                    } else {
	                      tr[i].style.display = "none";
	                    }
	                  }       
	                }
	              }
		   </script>

        </div>  <!-- end of <div class="panel panel-default"> -->

</div> <!-- End of <div class="col-sm-12 col-md-12 col-lg-12"> -->