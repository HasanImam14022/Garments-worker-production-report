<?php
session_start();
require_once("../login/session.php");
include('../login/db_connection_class.php');
$obj = new DB_Connection_Class();
$obj->connection();
?>
<script type='text/javascript' src='swing/swing_line_wise_production_info_form_validation.js'></script>
<script>

    
function sending_data_of_swing_line_wise_production_info_form_for_saving_in_database()
{


       var validate = swing_line_wise_production_info_form_validation();
       var url_encoded_form_data = $("#swing_line_wise_production_info_form").serialize(); //This will read all control elements value of the form	
       if(validate != false)
	   {


		  	 $.ajax({
			 		url: 'swing/swing_line_wise_production_info_saving.php',
			 		dataType: 'text',
			 		type: 'post',
			 		contentType: 'application/x-www-form-urlencoded',
			 		data: url_encoded_form_data,
			 		success: function( data, textStatus, jQxhr )
			 		{
			 				alert(data);
			 				//$("#database_table").load("swing_production_info.php")
			 				
			 		},
			 		error: function( jqXhr, textStatus, errorThrown )
			 		{
			 				//console.log( errorThrown );
			 				alert(errorThrown);
			 		}
			 }); // End of $.ajax({

       }//End of if(validate != false)

 }//End of function sending_data_of_swing_line_wise_production_info_form_for_saving_in_database()


</script>
<div class="col-sm-12 col-md-12 col-lg-12">


    <div id="div_full_form">
		<div class="panel panel-default"> <!-- This div will create a block/panel for FORM -->

				<div class="panel-heading" style="color:#191970;"><b>Adding Line Wise Production Info</b></div> <!-- This will create a upper block for FORM (Just Beautification) -->

				<nav aria-label="breadcrumb">
						  <ol class="breadcrumb">
						    <li class="breadcrumb-item active" aria-current="page" >Home</li>
						    <li class="breadcrumb-item"><a onclick="load_page('swing/swing_line_wise_production_info.php')">Adding Linewise Production Info</a></li>
						  </ol>
			    </nav>
			    
				<form class="form-horizontal" action="" style="margin-top:10px;" name="swing_line_wise_production_info_form" id="swing_line_wise_production_info_form">
				
                
                <div class="form-group form-group-sm" id="">
						<label class="control-label col-sm-2" for="po_no" style="margin-right:0px; color:#00008B;">PO No :<span style="color:red"> *</span></label>
							<div class="col-sm-7">
								<select  class="form-control for_auto_complete" id="po_number" name="po_number">
                                    <option select="selected" value="select">Select PO No</option>
                                    <?php 
                                         $sql = 'select po_number from `swing_production_info`';
                                         $result= mysqli_query($con,$sql) or die(mysql_error);
                                         while( $row = mysqli_fetch_array( $result))
                                         {

                                        	 echo '<option value="'.$row['po_number'].'">'.$row['po_number'].'</option>';

                                         }

                                    ?>
								</select>
							</div>
				</div>
                <br>
				<input type="hidden" id="possible_line_number" name="possible_line_number" value="20">	
				 <div class="form-group form-group-sm">
                         <div class="col-sm-2"></div>
					<div class="col-sm-7">
						
                        <table id="swing_line_wise_production_info_table" class="table table-striped table-bordered" style="padding:0px; margin:0px;">
                             <thead>
                                   <tr>
                                     <th style="width:10px;">SI</th>
                                     <th style="width:100px; text-align:center !important;">Line No</th>
                                     <th style="width:130px; text-align:center">Start Line</th>
                                     <th style="width:100px; text-align:center;">End Line</th>
                                     <th style="width:100px; text-align:center;">Action</th>
                                   </tr>
                             </thead>
                                
                             <tbody>
                                 
                 
                              <tr id='row_1_for_line'>
                              	 <td>1</td>
                              	 <td class="align-middle">
                                   <input type="text" class="form-control" value="1" placeholder="Unit:1, Line: L-01, 3rd Floor(A)" id="line_number_1" name="line_number_1" readonly>
									 
                                 </td>

                                    <td align="center">
                                        <input type="text" class="form-control"  id="start_line_1" name="start_line_1">
                                    </td>

                                    <td>
                                        <input type="text" class="form-control"  id="end_line_1" name="end_line_1">
                                    </td>
                              
                              
                                    <td align="center" style="padding-left:0px; padding-right:0px;">

                                        <button type="button" class="btn-primary" style="padding-top:1px;" onClick="adding_specific_row_of_process_adding_table(this.parentNode.parentNode.rowIndex)">Add</button>
                                        <button type="button" class="btn-primary" style="padding-top:1px;" onClick="deleting_specific_row_of_process_adding_table(this.parentNode.parentNode.rowIndex)">Del</button>
                                   </td>
                              </tr>   
                              	
                              <tr id='row_2_for_line'>
                                    <td>2</td>
                                    <td>
                                        <input type="text" class="form-control" value="2" placeholder="Unit:1, Line: L-02, 3rd Floor(A)" id="line_number_2" name="line_number_2" readonly>
                                    </td>

                                    <td align="center">
                                        <input type="text" class="form-control"  id="start_line_2" name="start_line_2">
                                    </td>

                                    <td>
                                        <input type="text" class="form-control"  id="end_line_2" name="end_line_2">
                                    </td>
                                
                                
                                    <td align="center" style="padding-left:0px; padding-right:0px;">

                                        <button type="button" class="btn-primary" style="padding-top:1px;" onClick="adding_specific_row_of_process_adding_table(this.parentNode.parentNode.rowIndex)">Add</button>
                                        <button type="button" class="btn-primary" style="padding-top:1px;" onClick="deleting_specific_row_of_process_adding_table(this.parentNode.parentNode.rowIndex)">Del</button>
                                    </td>
                              </tr>

                              <tr id='row_3_for_line'>
                              	  <td>3</td>
                              	  <td>
                                      <input type="text" class="form-control" value="3" placeholder="Unit:1, Line: L-03, 3rd Floor(A)" id="line_number_3" name="line_number_3" readonly>
                                  </td>

                                    <td align="center">
                                        <input type="text" class="form-control"  id="start_line_3" name="start_line_3">
                                    </td>

                                    <td>
                                        <input type="text" class="form-control"  id="end_line_3" name="end_line_3">
                                    </td>
                              
                              
                                    <td align="center" style="padding-left:0px; padding-right:0px;">

                                        <button type="button" class="btn-primary" style="padding-top:1px;" onClick="adding_specific_row_of_process_adding_table(this.parentNode.parentNode.rowIndex)">Add</button>
                                        <button type="button" class="btn-primary" style="padding-top:1px;" onClick="deleting_specific_row_of_process_adding_table(this.parentNode.parentNode.rowIndex)">Del</button>
                                   </td>
                              </tr>

                              <tr id='row_4_for_line'>
                              	 <td>4</td>
                              	   <td>
                
                                      <input type="text" class="form-control" value="4" placeholder="Unit:1, Line: L-04, 3rd Floor(A)" id="line_number_4" name="line_number_4" readonly>
                                    </td>

                                    <td align="center">
                                        <input type="text" class="form-control"  id="start_line_4" name="start_line_4">
                                    </td>

                                    <td>
                                        <input type="text" class="form-control"  id="end_line_4" name="end_line_4">
                                    </td>
                              
                              
                                    <td align="center" style="padding-left:0px; padding-right:0px;">

                                        <button type="button" class="btn-primary" style="padding-top:1px;" onClick="adding_specific_row_of_process_adding_table(this.parentNode.parentNode.rowIndex)">Add</button>
                                        <button type="button" class="btn-primary" style="padding-top:1px;" onClick="deleting_specific_row_of_process_adding_table(this.parentNode.parentNode.rowIndex)">Del</button>
                                   </td>
                              </tr>

                              <tr id='row_5_for_line'>
                              	 <td>5</td>
                              	 <td>
                
                                   <input type="text" class="form-control" value="5" placeholder="Unit:1, Line: L-05, 3rd Floor(A)" id="line_number_5" name="line_number_5" readonly>
                                  </td>

                                    <td align="center">
                                        <input type="text" class="form-control"  id="start_line_5" name="start_line_5">
                                    </td>

                                    <td>
                                        <input type="text" class="form-control"  id="end_line_5" name="end_line_5">
                                    </td>
                              
                              
                                    <td align="center" style="padding-left:0px; padding-right:0px;">

                                        <button type="button" class="btn-primary" style="padding-top:1px;" onClick="adding_specific_row_of_process_adding_table(this.parentNode.parentNode.rowIndex)">Add</button>
                                        <button type="button" class="btn-primary" style="padding-top:1px;" onClick="deleting_specific_row_of_process_adding_table(this.parentNode.parentNode.rowIndex)">Del</button>
                                   </td>
                              </tr>

                              <tr id='row_6_for_line'>
                              	 <td>6</td>
                              	 <td>
                
                                   <input type="text" class="form-control" value="6" placeholder="Unit:1, Line: L-06, 5th Floor(B) " id="line_number_6" name="line_number_6" readonly>
                                  </td>

                                    <td align="center">
                                        <input type="text" class="form-control"  id="start_line_6" name="start_line_6">
                                    </td>

                                    <td>
                                        <input type="text" class="form-control"  id="end_line_6" name="end_line_6">
                                    </td>
                              
                              
                                    <td align="center" style="padding-left:0px; padding-right:0px;">

                                        <button type="button" class="btn-primary" style="padding-top:1px;" onClick="adding_specific_row_of_process_adding_table(this.parentNode.parentNode.rowIndex)">Add</button>
                                        <button type="button" class="btn-primary" style="padding-top:1px;" onClick="deleting_specific_row_of_process_adding_table(this.parentNode.parentNode.rowIndex)">Del</button>
                                   </td>
                              </tr>

                              <tr id='row_7_for_line'>
                              	 <td>7</td>
                              	 <td>
                
                                   <input type="text" class="form-control" value="7" placeholder="Unit:1, Line: L-07, 5th Floor(B)" id="line_number_7" name="line_number_7" readonly>
                                  </td>

                                    <td align="center">
                                        <input type="text" class="form-control"  id="start_line_7" name="start_line_7">
                                    </td>

                                    <td>
                                        <input type="text" class="form-control"  id="end_line_7" name="end_line_7">
                                    </td>
                              
                              
                                    <td align="center" style="padding-left:0px; padding-right:0px;">

                                        <button type="button" class="btn-primary" style="padding-top:1px;" onClick="adding_specific_row_of_process_adding_table(this.parentNode.parentNode.rowIndex)">Add</button>
                                        <button type="button" class="btn-primary" style="padding-top:1px;" onClick="deleting_specific_row_of_process_adding_table(this.parentNode.parentNode.rowIndex)">Del</button>
                                   </td>
                              </tr>

                              <tr id='row_8_for_line'>
                              	 <td>8</td>
                              	  <td>
                                     <input type="text" class="form-control" value="8" placeholder="Unit:1, Line: L-08, 5th Floor(B)" id="line_number_8" name="line_number_8" readonly>
                                  </td>

                                    <td align="center">
                                        <input type="text" class="form-control"  id="start_line_8" name="start_line_8">
                                    </td>

                                    <td>
                                        <input type="text" class="form-control"  id="end_line_8" name="end_line_8">
                                    </td>
                              
                              
                                    <td align="center" style="padding-left:0px; padding-right:0px;">

                                        <button type="button" class="btn-primary" style="padding-top:1px;" onClick="adding_specific_row_of_process_adding_table(this.parentNode.parentNode.rowIndex)">Add</button>
                                        <button type="button" class="btn-primary" style="padding-top:1px;" onClick="deleting_specific_row_of_process_adding_table(this.parentNode.parentNode.rowIndex)">Del</button>
                                   </td>
                              </tr>

                              <tr id='row_9_for_line'>
                              	 <td>9</td>
                              	 <td>
                
                                   <input type="text" class="form-control" value="9" placeholder="Unit:1, Line: L-09, 5th Floor(B)" id="line_number_9" name="line_number_9" readonly>
                                  </td>
                                    <td align="center">
                                        <input type="text" class="form-control"  id="start_line_9" name="start_line_9">
                                    </td>

                                    <td>
                                        <input type="text" class="form-control"  id="end_line_9" name="end_line_9">
                                    </td>
                              
                              
                                    <td align="center" style="padding-left:0px; padding-right:0px;">

                                        <button type="button" class="btn-primary" style="padding-top:1px;" onClick="adding_specific_row_of_process_adding_table(this.parentNode.parentNode.rowIndex)">Add</button>
                                        <button type="button" class="btn-primary" style="padding-top:1px;" onClick="deleting_specific_row_of_process_adding_table(this.parentNode.parentNode.rowIndex)">Del</button>
                                   </td>
                              </tr>

                              <tr id='row_10_for_line'>
                              	 <td>10</td>
                              	  <td>                
                                     <input type="text" class="form-control" value="10" placeholder="Unit:1, Line: L-10, 5th Floor(B)" id="line_number_10" name="line_number_10" readonly>
                                  </td>

                                    <td align="center">
                                        <input type="text" class="form-control"  id="start_line_10" name="start_line_10">
                                    </td>

                                    <td>
                                        <input type="text" class="form-control"  id="end_line_10" name="end_line_10">
                                    </td>
                              
                              
                                    <td align="center" style="padding-left:0px; padding-right:0px;">

                                        <button type="button" class="btn-primary" style="padding-top:1px;" onClick="adding_specific_row_of_process_adding_table(this.parentNode.parentNode.rowIndex)">Add</button>
                                        <button type="button" class="btn-primary" style="padding-top:1px;" onClick="deleting_specific_row_of_process_adding_table(this.parentNode.parentNode.rowIndex)">Del</button>
                                   </td>
                              </tr>

                              <tr id='row_11_for_line'>
                              	 <td>11</td>
                              	  <td>               
                                     <input type="text" class="form-control" value="11" placeholder="Unit:2, Line: L-11, 6th Floor(A)" id="line_number_11" name="line_number_11" readonly>
                                  </td>

                                    <td align="center">
                                        <input type="text" class="form-control"  id="start_line_11" name="start_line_11">
                                    </td>

                                    <td>
                                        <input type="text" class="form-control"  id="end_line_11" name="end_line_11">
                                    </td>
                              
                              
                                    <td align="center" style="padding-left:0px; padding-right:0px;">

                                        <button type="button" class="btn-primary" style="padding-top:1px;" onClick="adding_specific_row_of_process_adding_table(this.parentNode.parentNode.rowIndex)">Add</button>
                                        <button type="button" class="btn-primary" style="padding-top:1px;" onClick="deleting_specific_row_of_process_adding_table(this.parentNode.parentNode.rowIndex)">Del</button>
                                   </td>
                              </tr>

                              <tr id='row_12_for_line'>
                              	 <td>12</td>
                              	  <td>
                                      <input type="text" class="form-control" value="12" placeholder="Unit:2, Line: L-12, 6th Floor(A)" id="line_number_12" name="line_number_12" readonly>
                                  </td>

                                    <td align="center">
                                        <input type="text" class="form-control"  id="start_line_12" name="start_line_12">
                                    </td>

                                    <td>
                                        <input type="text" class="form-control"  id="end_line_12" name="end_line_12">
                                    </td>
                              
                              
                                    <td align="center" style="padding-left:0px; padding-right:0px;">

                                        <button type="button" class="btn-primary" style="padding-top:1px;" onClick="adding_specific_row_of_process_adding_table(this.parentNode.parentNode.rowIndex)">Add</button>
                                        <button type="button" class="btn-primary" style="padding-top:1px;" onClick="deleting_specific_row_of_process_adding_table(this.parentNode.parentNode.rowIndex)">Del</button>
                                   </td>
                              </tr>

                              <tr id='row_13_for_line'>
                              	 <td>13</td>
                              	 <td>
                
                                   <input type="text" class="form-control" value="13" placeholder="Unit:2, Line: L-13, 6th Floor(A)" id="line_number_13" name="line_number_13" readonly>
                                  </td>

                                    <td align="center">
                                        <input type="text" class="form-control"  id="start_line_13" name="start_line_13">
                                    </td>

                                    <td>
                                        <input type="text" class="form-control"  id="end_line_13" name="end_line_13">
                                    </td>
                              
                              
                                    <td align="center" style="padding-left:0px; padding-right:0px;">

                                        <button type="button" class="btn-primary" style="padding-top:1px;" onClick="adding_specific_row_of_process_adding_table(this.parentNode.parentNode.rowIndex)">Add</button>
                                        <button type="button" class="btn-primary" style="padding-top:1px;" onClick="deleting_specific_row_of_process_adding_table(this.parentNode.parentNode.rowIndex)">Del</button>
                                   </td>
                              </tr>

                              <tr id='row_14_for_line'>
                              	 <td>14</td>
                              	 <td>
                
                                   <input type="text" class="form-control" value="14" placeholder="Unit:2, Line: L-14, 6th Floor(A)" id="line_number_14" name="line_number_14" readonly>
                                  </td>

                                    <td align="center">
                                        <input type="text" class="form-control"  id="start_line_14" name="start_line_14">
                                    </td>

                                    <td>
                                        <input type="text" class="form-control"  id="end_line_14" name="end_line_14">
                                    </td>
                              
                              
                                    <td align="center" style="padding-left:0px; padding-right:0px;">

                                        <button type="button" class="btn-primary" style="padding-top:1px;" onClick="adding_specific_row_of_process_adding_table(this.parentNode.parentNode.rowIndex)">Add</button>
                                        <button type="button" class="btn-primary" style="padding-top:1px;" onClick="deleting_specific_row_of_process_adding_table(this.parentNode.parentNode.rowIndex)">Del</button>
                                   </td>
                              </tr>

                              <tr id='row_15_for_line'>
                              	 <td>15</td>
                              	  <td>  
                                     <input type="text" class="form-control" value="15" placeholder="Unit:2, Line: L-15, 6th Floor(A)" id="line_number_15" name="line_number_15" readonly>
                                  </td>

                                    <td align="center">
                                        <input type="text" class="form-control"  id="start_line_15" name="start_line_15">
                                    </td>

                                    <td>
                                        <input type="text" class="form-control"  id="end_line_15" name="end_line_15">
                                    </td>
                              
                              
                                    <td align="center" style="padding-left:0px; padding-right:0px;">

                                        <button type="button" class="btn-primary" style="padding-top:1px;" onClick="adding_specific_row_of_process_adding_table(this.parentNode.parentNode.rowIndex)">Add</button>
                                        <button type="button" class="btn-primary" style="padding-top:1px;" onClick="deleting_specific_row_of_process_adding_table(this.parentNode.parentNode.rowIndex)">Del</button>
                                   </td>
                              </tr>

                              <tr id='row_16_for_line'>
                              	 <td>16</td>
                              	 <td>
                
                                   <input type="text" class="form-control" value="16" placeholder="Unit:2, Line: L-16, 6th Floor(B)" id="line_number_16" name="line_number_16" readonly>
                                  </td>

                                    <td align="center">
                                        <input type="text" class="form-control"  id="start_line_16" name="start_line_16">
                                    </td>

                                    <td>
                                        <input type="text" class="form-control"  id="end_line_16" name="end_line_16">
                                    </td>
                              
                              
                                    <td align="center" style="padding-left:0px; padding-right:0px;">

                                        <button type="button" class="btn-primary" style="padding-top:1px;" onClick="adding_specific_row_of_process_adding_table(this.parentNode.parentNode.rowIndex)">Add</button>
                                        <button type="button" class="btn-primary" style="padding-top:1px;" onClick="deleting_specific_row_of_process_adding_table(this.parentNode.parentNode.rowIndex)">Del</button>
                                   </td>
                              </tr>

                              <tr id='row_17_for_line'>
                              	 <td>17</td>
                              	  <td>                
                                   <input type="text" class="form-control" value="17" placeholder="Unit:2, Line: L-17, 6th Floor(B)" id="line_number_17" name="line_number_17" readonly>
                                  </td>

                                  <td align="center">
                                        <input type="text" class="form-control"  id="start_line_17" name="start_line_17">
                                    </td>

                                    <td>
                                        <input type="text" class="form-control"  id="end_line_17" name="end_line_17">
                                    </td>
                              
                              
                                    <td align="center" style="padding-left:0px; padding-right:0px;">

                                        <button type="button" class="btn-primary" style="padding-top:1px;" onClick="adding_specific_row_of_process_adding_table(this.parentNode.parentNode.rowIndex)">Add</button>
                                        <button type="button" class="btn-primary" style="padding-top:1px;" onClick="deleting_specific_row_of_process_adding_table(this.parentNode.parentNode.rowIndex)">Del</button>
                                   </td>
                              </tr>

                              <tr id='row_18_for_line'>
                              	 <td>18</td>
                              	  <td>               
                                   <input type="text" class="form-control" value="18" placeholder="Unit:2, Line: L-18, 6th Floor(B)" id="line_number_18" name="line_number_18" readonly>
                                  </td>

                                  <td align="center">
                                        <input type="text" class="form-control"  id="start_line_18" name="start_line_18">
                                    </td>

                                    <td>
                                        <input type="text" class="form-control"  id="end_line_18" name="end_line_18">
                                    </td>
                              
                              
                                    <td align="center" style="padding-left:0px; padding-right:0px;">

                                        <button type="button" class="btn-primary" style="padding-top:1px;" onClick="adding_specific_row_of_process_adding_table(this.parentNode.parentNode.rowIndex)">Add</button>
                                        <button type="button" class="btn-primary" style="padding-top:1px;" onClick="deleting_specific_row_of_process_adding_table(this.parentNode.parentNode.rowIndex)">Del</button>
                                   </td>
                              </tr>


                              

                              <tr id='row_19_for_line'>
                              	 <td>19</td>
                              	  <td>               
                                     <input type="text" class="form-control" value="19" placeholder="Unit:2, Line: L-19, 6th Floor(B)" id="line_number_19" name="line_number_19" readonly>
                                  </td>

                                    <td align="center">
                                        <input type="text" class="form-control"  id="start_line_19" name="start_line_19">
                                    </td>

                                    <td>
                                        <input type="text" class="form-control"  id="end_line_19" name="end_line_19">
                                    </td>
                              
                              
                                    <td align="center" style="padding-left:0px; padding-right:0px;">

                                        <button type="button" class="btn-primary" style="padding-top:1px;" onClick="adding_specific_row_of_process_adding_table(this.parentNode.parentNode.rowIndex)">Add</button>
                                        <button type="button" class="btn-primary" style="padding-top:1px;" onClick="deleting_specific_row_of_process_adding_table(this.parentNode.parentNode.rowIndex)">Del</button>
                                   </td>
                              </tr>

                              <tr id='row_20_for_line'>
                              	 <td>20</td>
                              	 <td>               
                                     <input type="text" class="form-control" value="20" placeholder="Unit:2, Line: L-20, 6th Floor(B)" id="line_number_20" name="line_number_20" readonly>
                                  </td>

                                    <td align="center">
                                        <input type="text" class="form-control"  id="start_line_20" name="start_line_20">
                                    </td>

                                    <td>
                                        <input type="text" class="form-control"  id="end_line_20" name="end_line_20">
                                    </td>
                              
                              
                                    <td align="center" style="padding-left:0px; padding-right:0px;">

                                        <button type="button" class="btn-primary" style="padding-top:1px;" onClick="adding_specific_row_of_process_adding_table(this.parentNode.parentNode.rowIndex)">Add</button>
                                        <button type="button" class="btn-primary" style="padding-top:1px;" onClick="deleting_specific_row_of_process_adding_table(this.parentNode.parentNode.rowIndex)">Del</button>
                                   </td>
                              </tr>
                               
                              
                              

                          </tbody>
                        </table>

					</div>  <!-- End of <div class="col-sm-7"> -->
                        
				  </div>
					
					<div class="form-group form-group-sm" id='form-group_div_for_submit_button'>
								<div class="col-sm-offset-2 col-sm-5">
									<button type="button" class="btn btn-primary" onClick="sending_data_of_swing_line_wise_production_info_form_for_saving_in_database()">Submit</button>
									<button type="reset" class="btn btn-success">Reset</button>
								</div>
					</div> <!-- End of <div class="form-group form-group-sm" id='form-group_div_for_submit_button'> -->
				</form>
				
            
				
		</div> <!-- End of <div class="panel panel-default"> -->
           	     

	</div> <!-- End of <div class="col-sm-12 col-md-12 col-lg-12"> -->

</div>	