<?php
session_start();
require_once("../login/session.php");
include('../login/db_connection_class.php');
$obj = new DB_Connection_Class();
$obj->connection();

?>

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


function date_wise_hourly_basis_production_info_report()
{
    var po_number = document.getElementById("po_number").value;
    var swing_date = document.getElementById("swing_date").value;
   // var line_number = document.getElementById("line_number").value;
    var hour = document.getElementById("hour").value;

 	$.ajax({
        url: 'swing/date_wise_hourly_basis_production_info_report.php',
        dataType: 'text',
        type: 'post',
        contentType: 'application/x-www-form-urlencoded',
        data: {
            po_number: po_number,
            swing_date: swing_date,
            //line_number: line_number,
            hour : hour
        },
        success: function( data, textStatus, jQxhr )
        {
                // alert(data);
                document.getElementById('report_info').innerHTML=data;
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


 <div class="panel panel-default"> <!-- This div will create a block/panel for FORM -->

    <div id="element">

       <div class="panel-heading" style="color:#191970;"><b>Position Wise Hourly Production Info Report</b></div>
     </div>

    <form class="form-horizontal" action="" style="margin-top:10px;" name="process_program_info_form" id="process_program_info_form">



        <div class="form-group form-group-sm " id="form-group_for_report_creating_date">
                <label class="control-label col-sm-3" for="swing_date" style="color:#00008B;">Select Date:<span style="color:red"> *</span></label>
                
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="swing_date" name="swing_date" placeholder="Enter Sewing End Date" required>
                </div>
                <div class="col-sm-3 row nopadding">
                    <input type="text" class="form-control" id="alternate_swing_date" name="alternate_swing_date" readonly>
                </div>
                <i class="glyphicon glyphicon-remove" onclick="Remove_Value_Of_This_Element('swing_date')"></i>
        </div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_pp_creation_date"> -->
        <script>
            $( function()
            {
                $( "#swing_date" ).datepicker(
                {
                    showWeek: true, // This is for Showing Week in Datepicker Calender.
                    altField: "#alternate_swing_date", // This is for Descriptive Date Showing in Alternative Field.
                    altFormat: "DD, d MM, yy" // This is for Descriptive Date Format in Alternative Field.
                }
                ); // End of $( "#pp_creation_date" ).datepicker(

                $( "#swing_date" ).datepicker( "option", "dateFormat", "dd/mm/yy" ); // This is for Date Format in Actual Date Field.
                $( "#swing_date" ).datepicker( "option", "showAnim", "drop" ); // This is for Datepicker Calender Animation in Actual Date Field.
            }
            ); // End of $( function()
        </script>


       <div class="form-group form-group-sm" id="form_group_for_hour">
           <label class="control-label col-sm-3" for="hour" style="margin-right:0px; color:#00008B;">Hour :<span style="color:red"> *</span></label>
             <div class="col-sm-6">
               <select  class="form-control for_auto_complete" id="hour" name="hour">
                    <option select="selected" value="select">Select Hour</option>
                    <?php
                        for($hour = 8; $hour<= 24; $hour++)
                        {
                              if($hour < 10)
                              {
                                echo '<option value="0'.$hour.'">0'.$hour.'</option>';
                              }
                              else{
                                echo '<option value="'.$hour.'">'.$hour.'</option>';
                              }
                              

                        }

                    ?>
                </select>
             </div>
        </div>

           
        <div class="form-group form-group-sm" id="form_group_for_po_number">
           <label class="control-label col-sm-3" for="po_number" style="margin-right:0px; color:#00008B;">PO Number:<span style="color:red"> *</span></label>
             <div class="col-sm-6">
                <select  class="form-control for_auto_complete" id="po_number" name="po_number">
                    <option select="selected" value="select">Select PO Number</option>
                    <?php
                        $sql = 'select distinct(`po_number`) from `swing_position_and_hour_wise_production_info` order by `po_number`';
                        $result= mysqli_query($con,$sql) or die(mysqli_error($con));
                        while( $row = mysqli_fetch_array( $result))
                        {

                        echo '<option value="'.$row['po_number'].'">'.$row['po_number'].'</option>';

                        }

                    ?>
                </select>
             </div>
        </div>
    <div class="form-group form-group-sm">
        <div class="col-sm-offset-3 col-sm-6">
            <button type="button" class="btn btn-primary" onClick="date_wise_hourly_basis_production_info_report()">Show Report</button>
            <button type="reset" class="btn btn-success">Reset</button>
        </div>
    </div>
</form>
<div id="report_info">

</div>