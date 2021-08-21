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
?>
<script type='text/javascript' src='settings/construction_for_version_form_validation.js'></script>

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
 function sending_data_of_construction_for_version_form_for_saving_in_database()
 {


       var validate = Form_Validation();
       var url_encoded_form_data = $("#construction_for_version_form").serialize(); //This will read all control elements value of the form	
       if(validate != false)
	   {


		  	 $.ajax({
			 		url: 'settings/construction_for_version_saving.php',
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

 }//End of function sending_data_of_construction_for_version_form_for_saving_in_database()


   function sending_data_for_delete(construction_id)
 {
       var div=$('#table_load').html();
       var url_encoded_form_data = 'construction_id='+construction_id;
       
		  	 $.ajax({
			 		url: 'settings/construction_for_version_deleting.php',
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



 }//End of function sending_data_of_color_form_for_delete_from_database()

/***************************************************** FOR AUTO COMPLETE********************************************************************/

$('.construction_for_version').chosen();


/***************************************************** FOR AUTO COMPLETE********************************************************************/
</script>
<div class="col-sm-12 col-md-12 col-lg-12">

		<div class="panel panel-default"> <!-- This div will create a block/panel for FORM -->

				<div class="panel-heading" style="color:#191970;"><b>Construction For Version</b></div> <!-- This will create a upper block for FORM (Just Beautification) -->


				<nav aria-label="breadcrumb">
					  <ol class="breadcrumb">
					    <li class="breadcrumb-item active" aria-current="page">Home</li>
					    <li class="breadcrumb-item"><a onclick="load_page('settings/construction_for_version.php')">Add Construction For Version</a></li>
					  </ol>
				 </nav>

				<form class="form-horizontal" action="" style="margin-top:10px;" name="construction_for_version_form" id="construction_for_version_form">

						<div class="form-group form-group-sm" id="form-group_for_warp_yarn_count">
								<label class="control-label col-sm-3" for="warp_yarn_count" style="color:#00008B;">Warp Yarn Count:</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="warp_yarn_count" name="warp_yarn_count" placeholder="Enter Warp Yarn Count" required>
								</div>
								<i class="glyphicon glyphicon-remove" onclick="Remove_Value_Of_This_Element('warp_yarn_count')"></i>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_warp_yarn_count"> -->

						<div class="form-group form-group-sm" id="form-group_for_no_of_ply_for_warp_yarn">
						<label class="control-label col-sm-3" for="no_of_ply_for_warp_yarn" style="margin-right:0px; color:#00008B;">No of Ply For Warp Yarn:</label>
							<div class="col-sm-5">
								<select  class="form-control construction_for_version" id="no_of_ply_for_warp_yarn" name="no_of_ply_for_warp_yarn">
											<option select="selected" value="select">Select No Of Ply For Warp Yarn</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
								</select>
							</div>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_no_of_ply_for_warp_yarn"> -->

						<div class="form-group form-group-sm" id="form-group_for_uom_of_warp_yarn">
						<label class="control-label col-sm-3" for="uom_of_warp_yarn" style="margin-right:0px; color:#00008B;">Uom of Warp Yarn:</label>
							<div class="col-sm-5">
								<select  class="form-control construction_for_version" id="uom_of_warp_yarn" name="uom_of_warp_yarn">
											<option select="selected" value="select">Select Uom Of Warp Yarn</option>
											<option value="Ne">Ne</option>
											<option value="Nm">Nm</option>
											<option value="Tex">Tex</option>
											<option value="Den">Den</option>
											<option value="Dtex">Dtex</option>
								</select>
							</div>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_uom_of_warp_yarn"> -->

						<div class="form-group form-group-sm" id="form-group_for_weft_yarn_count">
								<label class="control-label col-sm-3" for="weft_yarn_count" style="color:#00008B;">Weft Yarn Count:</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="weft_yarn_count" name="weft_yarn_count" placeholder="Enter Weft Yarn Count" required>
								</div>
								<i class="glyphicon glyphicon-remove" onclick="Remove_Value_Of_This_Element('weft_yarn_count')"></i>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_weft_yarn_count"> -->

						<div class="form-group form-group-sm" id="form-group_for_no_of_ply_for_weft_yarn">
						<label class="control-label col-sm-3" for="no_of_ply_for_weft_yarn" style="margin-right:0px; color:#00008B;">No of Ply For Weft Yarn:</label>
							<div class="col-sm-5">
								<select  class="form-control construction_for_version" id="no_of_ply_for_weft_yarn" name="no_of_ply_for_weft_yarn">
											<option select="selected" value="select">Select No Of Ply For Weft Yarn</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
								</select>
							</div>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_no_of_ply_for_weft_yarn"> -->

						<div class="form-group form-group-sm" id="form-group_for_uom_of_weft_yarn">
						<label class="control-label col-sm-3" for="uom_of_weft_yarn" style="margin-right:0px; color:#00008B;">Uom of Weft Yarn:</label>
							<div class="col-sm-5">
								<select  class="form-control construction_for_version" id="uom_of_weft_yarn" name="uom_of_weft_yarn">
											<option select="selected" value="select">Select Uom Of Weft Yarn</option>
											<option value="Ne">Ne</option>
											<option value="Nm">Nm</option>
											<option value="Tex">Tex</option>
											<option value="Den">Den</option>
											<option value="Dtex">Dtex</option>
								</select>
							</div>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_uom_of_weft_yarn"> -->

						<div class="form-group form-group-sm" id="form-group_for_no_of_threads_per_inch_in_warp">
								<label class="control-label col-sm-3" for="no_of_threads_per_inch_in_warp" style="color:#00008B;">No of Threads Per Inch (Warp):</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="no_of_threads_per_inch_in_warp" name="no_of_threads_per_inch_in_warp" placeholder="Enter No Of Threads Per Inch In Warp" required>
								</div>
								<i class="glyphicon glyphicon-remove" onclick="Remove_Value_Of_This_Element('no_of_threads_per_inch_in_warp')"></i>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_no_of_threads_per_inch_in_warp"> -->

						<div class="form-group form-group-sm" id="form-group_for_warp_insertion">
						<label class="control-label col-sm-3" for="warp_insertion" style="margin-right:0px; color:#00008B;">Warp Insertion:</label>
							<div class="col-sm-5">
								<select  class="form-control construction_for_version" id="warp_insertion" name="warp_insertion">
											<option select="selected" value="select">Select Warp Insertion</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
								</select>
							</div>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_warp_insertion"> -->

						<div class="form-group form-group-sm" id="form-group_for_no_of_threads_per_inch_in_weft">
								<label class="control-label col-sm-3" for="no_of_threads_per_inch_in_weft" style="color:#00008B;">No of Threads Per Inch (Weft):</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="no_of_threads_per_inch_in_weft" name="no_of_threads_per_inch_in_weft" placeholder="Enter No Of Threads Per Inch In Weft" required>
								</div>
								<i class="glyphicon glyphicon-remove" onclick="Remove_Value_Of_This_Element('no_of_threads_per_inch_in_weft')"></i>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_no_of_threads_per_inch_in_weft"> -->

						<div class="form-group form-group-sm" id="form-group_for_weft_insertion">
						<label class="control-label col-sm-3" for="weft_insertion" style="margin-right:0px; color:#00008B;">Weft Insertion:</label>
							<div class="col-sm-5">
								<select  class="form-control construction_for_version" id="weft_insertion" name="weft_insertion">
											<option select="selected" value="select">Select Weft Insertion</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
								</select>
							</div>
						</div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_weft_insertion"> -->

						<div class="form-group form-group-sm">
								<div class="col-sm-offset-3 col-sm-5">
									<button type="button" class="btn btn-primary" onClick="sending_data_of_construction_for_version_form_for_saving_in_database()">Submit</button>
									<button type="reset" class="btn btn-success">Reset</button>
								</div>
						</div>

				</form>

		</div> <!-- End of <div class="panel panel-default"> -->


       

       <div class="form-group form-group-sm" id="form-group_for_warp_yarn_count">

      
          <div class="form-group form-group-sm">
	          <label class="control-label col-sm-5" for="search">Construction List</label>
	      </div> <!-- End of <div class="form-group form-group-sm" -->


          <div class="form-group form-group-sm">
            <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th>SI</th>
                                <th>Construction Name</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            
                            <tbody>
                              <?php 
                                $s1 = 1;
                                $sql_for_construction = "SELECT * FROM construction_for_version";

                                $res_for_construction = mysqli_query($con, $sql_for_construction);

                                while ($row = mysqli_fetch_assoc($res_for_construction)) 
                                {
                              ?>
                              <tr>
                                <td><?php echo $s1; ?></td>
                                <td>
                                    <?php
                                      $yarn_count_warp_total = "";
                                      $yarn_count_weft_total = "";
                                      $thread_count_warp_insertion_total = "";
                                      $yarn_count_warp_total = "";

                                      $yarn_count_warp_ply = $row['no_of_ply_for_warp_yarn'];
                                      $yarn_count_weft_ply = $row['no_of_ply_for_weft_yarn'];
                                      $thread_count_warp_insertion = $row['warp_insertion'];
                                      $thread_count_weft_insertion = $row['weft_insertion'];
                                      $uom_of_warp_yarn = $row['uom_of_warp_yarn'];
                                      $uom_of_weft_yarn = $row['uom_of_weft_yarn'];
                                      if($uom_of_warp_yarn=="Ne" && $uom_of_weft_yarn=="Ne")

                                      {
                                      	if ($yarn_count_warp_ply == '1') 
                                      {
                                          $yarn_count_warp_total = $row['warp_yarn_count'].".";
                                      }

                                      else
                                      {
                                          $yarn_count_warp_total = $row['warp_yarn_count']."<sup>".$row['no_of_ply_for_warp_yarn']."</sup>.";
                                      }

                                      if ($yarn_count_weft_ply == '1') 
                                      {
                                          $yarn_count_weft_total = $row['weft_yarn_count']."/";
                                      }

                                      else
                                      {
                                          $yarn_count_weft_total = $row['weft_yarn_count']."<sup>".$row['no_of_ply_for_weft_yarn']."</sup>/";
                                      }



                                      if ($thread_count_warp_insertion == '1') 
                                      {
                                          $thread_count_warp_insertion_total = $row['no_of_threads_per_inch_in_warp'].".";
                                      }

                                      else
                                      {
                                          $thread_count_warp_insertion_total = $row['no_of_threads_per_inch_in_warp']."(".$row['warp_insertion'].").";
                                      }

                                      if ($thread_count_weft_insertion == '1') 
                                      {
                                          $thread_count_weft_insertion_total = $row['no_of_threads_per_inch_in_weft'];
                                      }

                                      else
                                      {
                                          $thread_count_weft_insertion_total = $row['no_of_threads_per_inch_in_weft']."(".$row['weft_insertion'].")";
                                      }

                                      echo $display = $yarn_count_warp_total. $yarn_count_weft_total. $thread_count_warp_insertion_total . $thread_count_weft_insertion_total;
                                  }

                                  else if($uom_of_warp_yarn=="Ne" && $uom_of_weft_yarn!="Ne")
                                  {
                                  	if ($yarn_count_warp_ply == '1') 
                                      {
                                          $yarn_count_warp_total = $row['warp_yarn_count'].".";
                                      }

                                      else
                                      {
                                          $yarn_count_warp_total = $row['warp_yarn_count']."<sup>".$row['no_of_ply_for_warp_yarn']."</sup>.";
                                      }

                                      if ($yarn_count_weft_ply == '1') 
                                      {
                                          $yarn_count_weft_total = $row['weft_yarn_count']."(".$row['uom_of_weft_yarn'].")/";
                                      }

                                      else
                                      {
                                          $yarn_count_weft_total = $row['weft_yarn_count']."(".$row['uom_of_weft_yarn'].")<sup>".$row['no_of_ply_for_weft_yarn']."</sup>/";
                                      }



                                      if ($thread_count_warp_insertion == '1') 
                                      {
                                          $thread_count_warp_insertion_total = $row['no_of_threads_per_inch_in_warp'].".";
                                      }

                                      else
                                      {
                                          $thread_count_warp_insertion_total = $row['no_of_threads_per_inch_in_warp']."(".$row['warp_insertion'].").";
                                      }

                                      if ($thread_count_weft_insertion == '1') 
                                      {
                                          $thread_count_weft_insertion_total = $row['no_of_threads_per_inch_in_weft'];
                                      }

                                      else
                                      {
                                          $thread_count_weft_insertion_total = $row['no_of_threads_per_inch_in_weft']."(".$row['weft_insertion'].")";
                                      }

                                      echo $display = $yarn_count_warp_total. $yarn_count_weft_total. $thread_count_warp_insertion_total . $thread_count_weft_insertion_total;
                                  }

                                  else if($uom_of_warp_yarn!="Ne" && $uom_of_weft_yarn!="Ne")
                                  {
                                  	if ($yarn_count_warp_ply == '1') 
                                      {
                                          $yarn_count_warp_total = $row['warp_yarn_count']."(".$row['uom_of_warp_yarn'].").";
                                      }

                                      else
                                      {
                                          $yarn_count_warp_total = $row['warp_yarn_count']."<sup>".$row['no_of_ply_for_warp_yarn']."</sup>(".$row['uom_of_warp_yarn'].").";
                                      }


                                      if ($yarn_count_weft_ply == '1') 
                                      {
                                          $yarn_count_weft_total = $row['weft_yarn_count']."(".$row['uom_of_weft_yarn'].")/";
                                      }

                                      else
                                      {
                                          $yarn_count_weft_total = $row['weft_yarn_count']."<sup>".$row['no_of_ply_for_weft_yarn']."</sup>"."(".$row['uom_of_weft_yarn'].")/";
                                      }




                                      if ($thread_count_warp_insertion == '1') 
                                      {
                                          $thread_count_warp_insertion_total = $row['no_of_threads_per_inch_in_warp'].".";
                                      }

                                      else
                                      {
                                          $thread_count_warp_insertion_total = $row['no_of_threads_per_inch_in_warp']."(".$row['warp_insertion'].").";
                                      }

                                      if ($thread_count_weft_insertion == '1') 
                                      {
                                          $thread_count_weft_insertion_total = $row['no_of_threads_per_inch_in_weft'];
                                      }

                                      else
                                      {
                                          $thread_count_weft_insertion_total = $row['no_of_threads_per_inch_in_weft']."(".$row['weft_insertion'].")";
                                      }

                                      echo $display = $yarn_count_warp_total. $yarn_count_weft_total. $thread_count_warp_insertion_total . $thread_count_weft_insertion_total;
                                  }



                                  else if($uom_of_warp_yarn!="Ne" && $uom_of_weft_yarn=="Ne")
                                  {
                                  	if ($yarn_count_warp_ply == '1') 
                                      {
                                          $yarn_count_warp_total = $row['warp_yarn_count']."(".$row['uom_of_warp_yarn'].").";
                                      }

                                      else
                                      {
                                          $yarn_count_warp_total = $row['warp_yarn_count']."(".$row['uom_of_warp_yarn'].")<sup>".$row['no_of_ply_for_warp_yarn']."</sup>.";
                                      }

                                      if ($yarn_count_weft_ply == '1') 
                                      {
                                          $yarn_count_weft_total = $row['weft_yarn_count']."/";
                                      }

                                      else
                                      {
                                          $yarn_count_weft_total = $row['weft_yarn_count']."<sup>".$row['no_of_ply_for_weft_yarn']."</sup>/";
                                      }




                                      if ($thread_count_warp_insertion == '1') 
                                      {
                                          $thread_count_warp_insertion_total = $row['no_of_threads_per_inch_in_warp'].".";
                                      }

                                      else
                                      {
                                          $thread_count_warp_insertion_total = $row['no_of_threads_per_inch_in_warp']."(".$row['warp_insertion'].").";
                                      }

                                      if ($thread_count_weft_insertion == '1') 
                                      {
                                          $thread_count_weft_insertion_total = $row['no_of_threads_per_inch_in_weft'];
                                      }

                                      else
                                      {
                                          $thread_count_weft_insertion_total = $row['no_of_threads_per_inch_in_weft']."(".$row['weft_insertion'].")";
                                      }

                                      echo $display = $yarn_count_warp_total. $yarn_count_weft_total. $thread_count_warp_insertion_total . $thread_count_weft_insertion_total;
                                  }


                                      

                                    
                                    ?>
                                <td>
                                  
                                    <button type="submit" id="gray_issue_add_btn" name="gray_issue_add_btn" class="btn btn-primary btn-xs"  onclick="load_page('settings/edit_construction_for_version.php?construction_id=<?php echo $row['construction_id'] ?>')"> Edit </button>


                                    <button type="submit" id="" name="" class="btn btn-danger btn-xs"  onclick="sending_data_for_delete('<?php echo $row['construction_id'] ?>')"> Delete </button>
                               
                                </td>
                              </tr>
                              <?php 
                                ++$s1;
                               }
                              ?>
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

		</div> <!-- end of <div class="form-group form-group-sm" id="form-group_for_warp_yarn_count"> -->

</div> <!-- End of <div class="col-sm-12 col-md-12 col-lg-12"> -->