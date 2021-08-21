<?php
session_start();
require_once("../login/session.php");
include('../login/db_connection_class.php');
$obj = new DB_Connection_Class();
$obj->connection();

?>
<script type='text/javascript' src='swing/swing_line_and_position_wise_production_info_form_validation.js'></script>
<script>
function swing_line_and_position_wise_production_info_savaing()
{
       var validate = swing_line_and_position_wise_production_info_form_validation();
       var url_encoded_form_data = $("#swing_line_and_position_wise_production_info_form").serialize();	
       if(validate != false)
	   {
             


		  	 $.ajax({
			 		url: 'swing/swing_line_and_position_wise_production_info_saving.php',
			 		dataType: 'text',
			 		type: 'post',
			 		contentType: 'application/x-www-form-urlencoded',
			 		data: url_encoded_form_data,
			 		success: function( data, textStatus, jQxhr )
			 		{
			 				alert(data);
			 				//$("#details_info").load("swing_line_and_position_wise_production_info.php");
			 				$('.for_auto_complete').chosen(); 
			 		},
			 		error: function( jqXhr, textStatus, errorThrown )
			 		{
			 				//console.log( errorThrown );
			 				alert(errorThrown);
			 		}
			 }); 

       }
}

function change_po_number_for_line_and_position_wise_production_info()
{
	var po_number = document.getElementById("po_number").value;
    //var po_number = document.getElementById("po_number").value;
 	$.ajax({
	 		url: 'swing/swing_line_and_position_wise_production_info_po_and_line_receiving.php',
	 		dataType: 'text',
	 		type: 'post',
	 		contentType: 'application/x-www-form-urlencoded',
	 		data: {po_number: po_number},
	 		success: function( data, textStatus, jQxhr )
	 		{
	 				// alert(data);
	 				document.getElementById('details_info').innerHTML=data;
	 				$('.for_auto_complete').chosen();
	 		},
	 		error: function( jqXhr, textStatus, errorThrown )
	 		{
	 				//console.log( errorThrown );
	 				alert(errorThrown);
	 		}
	 }); // End of $.ajax({
}

function swing_line_and_position_wise_production_info_show_position()
{
    var line_number1 = document.getElementById("line_number").value;
    var po_number = document.getElementById("po_number").value;
    $.ajax({
        url: 'swing/swing_line_and_position_wise_production_info.php',
        dataType: 'text',
        type: 'post',
        contentType: 'application/x-www-form-urlencoded',
        data: {
                line_number : line_number1,
                po_number: po_number               
              },
        success: function( data, textStatus, jQxhr )
        {
                //alert(data);
                document.getElementById('details_info').innerHTML=data;
                $('.for_auto_complete').chosen();
        },
        error: function( jqXhr, textStatus, errorThrown )
        {
                //console.log( errorThrown );
                alert(errorThrown);
        }
    });
}

function positioning_line_wise_update_data()
{
	
    var po_number = document.getElementById("po_number").value;
	var current_line = document.getElementById('line_number').value;
	var current_position = document.getElementById('position_in_line').value;

	$.ajax({
        url: 'swing/positioning_line_wise_update_data.php',
        dataType: 'text',
        type: 'post',
        contentType: 'application/x-www-form-urlencoded',
        data: {
				po_number : po_number,
                current_line : current_line,
				current_position : current_position            
              },
        success: function( data, textStatus, jQxhr )
        {
			//alert(data);
			document.getElementById('details_info2').innerHTML=data;
			$('.for_auto_complete').chosen();
        },
        error: function( jqXhr, textStatus, errorThrown )
        {
			//console.log( errorThrown );
			alert(errorThrown);
        }
    });
}


function increase_the_number_of_total_number_of_product(previous_value)
{  
	var sub_total = previous_value + 1;
    var po_number = document.getElementById("po_number").value;
	var current_line = document.getElementById('line_number').value;
	var current_position = document.getElementById('position_in_line').value;
	var updated_complete_product = sub_total;
	$.ajax({
          url: 'swing/swing_line_and_position_wise_total_product_update.php',
	    // url: 'swing/positioning_line_wise_update_data.php',
        dataType: 'text',
        type: 'post',
        contentType: 'application/x-www-form-urlencoded',
        data: {
				po_number : po_number,
                current_line : current_line,
				current_position : current_position,
				updated_complete_product : updated_complete_product            
              },
        success: function( data, textStatus, jQxhr )
        {
			//alert(data);
			//document.getElementById('details_info').innerHTML=data;
			positioning_line_wise_update_data();
			$('.for_auto_complete').chosen();
        },
        error: function( jqXhr, textStatus, errorThrown )
        {
			//console.log( errorThrown );
			alert(errorThrown);
        }
    });
}

</script>

<div class="col-sm-12 col-md-12 col-lg-12">

		<div class="panel panel-default"> <!-- This div will create a block/panel for FORM -->

				<div class="panel-heading" style="color:#191970;"><b>Showing Line And Position Wise Production Info</b></div> <!-- This will create a upper block for FORM (Just Beautification) -->

				<form class="form-horizontal" action="" style="margin-top:10px;" name="item_receiving_form" id="item_receiving_form">

					<div class="form-group form-group-md" id="form-group_for_received_by">
						<label class="control-label col-md-3" for="po_number" style="margin-right:0px; color:#00008B;">PO Number:</label>
							<div class="col-md-5 field_container">
								<select  class="form-control for_auto_complete" id="po_number" name="po_number" onchange="change_po_number_for_line_and_position_wise_production_info()">
											<option selected="selected" value="select">Select PO Number</option>
											<?php 
												 $sql = 'select * from `swing_production_info` order by `id`';
												 $result= mysqli_query($con,$sql) or die(mysqli_error($con));
												 while( $row = mysqli_fetch_array($result))
												 {

													 echo '<option value="'.$row['po_number'].'">'.$row['po_number'].'</option>';

												 }

											 ?>
								</select>
							</div>
					</div>

					
					<div id="details_info">
						
					</div>  
                       
                </form> 
        </div>
</div>                 
