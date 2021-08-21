<?php
session_start();
require_once("../login/session.php");
include('../login/db_connection_class.php');
$obj = new DB_Connection_Class();
$obj->connection();

 ?>


 <div class="panel panel-default"> <!-- This div will create a block/panel for FORM -->

        <div id="element">

    <div class="panel-heading" style="color:#191970;"><b>Swing Production per Hour</b></div> <!-- This will create a upper block for FORM (Just Beautification) -->

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">Home</li>
          <li class="breadcrumb-item"><a onclick="load_page('swing/hour.php')">Swing Production Per Hour</a></li>
        </ol>
     </nav>

    <form class="form-horizontal" action="" style="margin-top:10px;" name="process_program_info_form" id="process_program_info_form">

        <div class="form-group form-group-sm " id="form-group_for_pp_creation_date">
            <label class="control-label col-sm-3" for="pp_creation_date" style="color:#00008B;">Production Date:<span style="color:red"> *</span></label>

            <div class="col-sm-3">
              <input type="text" class="form-control" id="pp_creation_date" name="pp_creation_date" placeholder="Enter Production Creation Date" required>
            </div>
            <div class="col-sm-3 row nopadding">
              <input type="text" class="form-control" id="alternate_pp_creation_date" name="alternate_pp_creation_date" readonly>
            </div>
            <i class="glyphicon glyphicon-remove" onclick="Remove_Value_Of_This_Element('pp_creation_date')"></i>
        </div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_pp_creation_date"> -->
            <script>
              $( function()
              {
                $( "#pp_creation_date" ).datepicker(
                {
                  showWeek: true, // This is for Showing Week in Datepicker Calender.
                  altField: "#alternate_pp_creation_date", // This is for Descriptive Date Showing in Alternative Field.
                  altFormat: "DD, d MM, yy" // This is for Descriptive Date Format in Alternative Field.
                }
                ); // End of $( "#pp_creation_date" ).datepicker(

                $( "#pp_creation_date" ).datepicker( "option", "dateFormat", "dd/mm/yy" ); // This is for Date Format in Actual Date Field.
                $( "#pp_creation_date" ).datepicker( "option", "showAnim", "drop" ); // This is for Datepicker Calender Animation in Actual Date Field.
              }
              ); // End of $( function()
            </script>



        <div class="form-group form-group-sm" id="form_group_for_buyer_name">
        <label class="control-label col-sm-3" for="buyer_name" style="margin-right:0px; color:#00008B;">Buyer Name:<span style="color:red"> *</span></label>
          <div class="col-sm-6">
            <select  class="form-control for_auto_complete" id="buyer_name" name="buyer_name">
                  <option select="selected" value="select">Select buyer Name</option>
                  <?php
                     $sql = 'select * from `buyer` order by `buyer_name`';
                     $result= mysqli_query($con,$sql) or die(mysql_error);
                     while( $row = mysqli_fetch_array( $result))
                     {

                       echo '<option value="'.$row['buyer_id'].'">'.$row['buyer_name'].'</option>';

                     }

                   ?>
            </select>

          </div>
        </div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_buyer_name"> -->
      <div class="" id="style_name_select">


          <div class="form-group form-group-sm" id="form-form-group_for_style">
          <label class="control-label col-sm-3" for="style" style="margin-right:0px; color:#00008B;">
            Select Style:<span style="color:red"> *</span></label>
            <div class="col-sm-6" >
              <select  class="form-control for_auto_complete" id="style_of_day" name="style_of_day">
                    <option select="selected" value="select">Select Style</option>

                    <?php

                       $sql = 'select * from `style_name` order by `style_name`';
                       $result= mysqli_query($con,$sql) or die(mysql_error);
                       while( $row = mysqli_fetch_array( $result))
                       {

                         echo '<option value="'.$row['style_name'].'?fs?'.$row['row_id'].'">'.$row['style_name'].'</option>';

                       }


                     ?>

              </select>

            </div>
          </div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_style"> -->


              <div class="form-group form-group-sm" id="form-form-group_for_color">
                      <label class="control-label col-sm-3" for="color" style="margin-right:0px; color:#00008B;">
                        Select Color:<span style="color:red"> *</span></label>
                        <div class="col-sm-6">
                          <select  class="form-control for_auto_complete" id="color_of_day" name="color_of_day">
                                <option select="selected" value="select">Select Color</option>

                                <?php

                                   $sql = 'select * from `color` order by `color_name`';
                                   $result= mysqli_query($con,$sql) or die(mysql_error);
                                   while( $row = mysqli_fetch_array( $result))
                                   {

                                     echo '<option value="'.$row['color_id'].'">'.$row['color_name'].'</option>';

                                   }

                                 ?>

                          </select>

                        </div>
                      </div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_color"> -->

      </div> <!-- End of <div id="style_name_select" Used for generating ajax content"> -->

        <div class="form-group form-group-sm" id="form_group_for_hour">
        <label class="control-label col-sm-3" for="line_number" style="margin-right:0px; color:#00008B;">Production Per Hour:<span style="color:red"> *</span></label>
          <div class="col-sm-6">
            <select  class="form-control for_auto_complete" id="line_number_of_hour" name="line_number_of_hour">
                  <option select="selected" value="select">Select Production Per Hour</option>
                  <option  value="01"> 01 </option>
                  <option  value="02"> 02 </option>
                  <option  value="03"> 03 </option>
                  <option  value="04"> 04 </option>
                  <option  value="05"> 05 </option>
                  <option  value="06"> 06 </option>
                  <option  value="07"> 07 </option>
                  <option  value="08"> 08 </option>
                  <option  value="09"> 09 </option>
                  <option  value="10"> 10 </option>
                  <option  value="11"> 11 </option>
                  <option  value="12"> 12 </option>
                  <option  value="13"> 13 </option>
                  <option  value="14"> 14 </option>
                  <option  value="15"> 15 </option>
                  <option  value="16"> 16 </option>
                  <option  value="17"> 17 </option>
                  <option  value="18"> 18 </option>
                  <option  value="19"> 19 </option>
                  <option  value="20"> 20 </option>
                  <option  value="21"> 21 </option>
                  <option  value="22"> 22 </option>
                  <option  value="23"> 23 </option>
                  <option  value="24"> 24 </option>

            </select>

          </div>
        </div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_hour"> -->

          <div class="form-group form-group-sm" id="form_group_for_garments">
          <label class="control-label col-sm-3" for="garments" style="margin-right:0px; color:#00008B;">Total Completed garments:<span style="color:red"> *</span></label>
            <div class="col-sm-6">
              <input type="text" class="form-control" id="garments"  name="garments" placeholder="Total Completed garments">
              <br>
              <button type="submit" class="btn btn-primary">Submit</button>


            </div>
          </div> <!-- End of <div class="form-group form-group-sm" id="form_group_for_garments"> -->

</form>
<script type="text/javascript">

$(document).ready(function ()
{
  $('.for_auto_complete').chosen();

  $('#buyer_name').change(function() {
      var data_k = $( "select#buyer_name" ).val();

      $.ajax({
          type:"GET",
          data : data_k,
          url : "swing/select_style.php?id='"+data_k+"'",
          async: false,
          success : function(response) {
             $("#style_name_select").html(response);

          },
          error: function() {
              alert('Error occured');
          }
      });
    });

$('#line_number_of_hour').change(function(){

  var buyer_name=$('#buyer_name').val();
  var style_of_day=$('#style_of_day').val();
  var color_of_day=$('#color_of_day').val();
  var line_number_of_hour=$('#line_number_of_hour').val();
  $.ajax({
      type:"GET",
      data:{buyer_name: buyer_name,
      style_of_day: style_of_day,
      color_of_day:color_of_day,
      line_number_of_hour:line_number_of_hour},
      url : "swing/hour_exits.php?buyer_name='"+buyer_name+"'&style_of_day='"+style_of_day+"'&color_of_day='"+color_of_day+"'&line_number_of_hour='"+line_number_of_hour+"'",
      async: false,
      success : function(response) {
      //allready selectd;]
      if (response==="") {

      }
      else {
        alert(response);

      }

      },
      error: function() {
          alert('Error occured');
      }
  });

});


    $("#process_program_info_form").on("submit", function(e)
    {
      e.preventDefault();
      // var formData = new FormData(this);
      $.ajax({
          url: 'swing/create_hour.php',
          type: "POST",
          data:  new FormData(this),
          contentType: false,
          cache: false,
          processData:false,
          success: function(data)
          {
              alert(data);
              document.getElementById("process_program_info_form").reset();
              return false; // Prevent page refresh
          },
          error: function()
          {

          }
      });

    });

});

</script>
