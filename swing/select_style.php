<?php
session_start();
require_once("../login/session.php");
include('../login/db_connection_class.php');
$obj = new DB_Connection_Class();
$obj->connection();


$buyer_id=$_GET['id'];


$sql="select style_name.style_name as style_name,swing_production_info.style_name_id as style_id
 from swing_production_info,style_name where
  swing_production_info.style_name_id=style_name.style_id
  and
   buyer_id=".$buyer_id."";


		$result = mysqli_query($con, $sql);
?>
  <div class="form-group form-group-sm" id="form-form-group_for_style">
  <label class="control-label col-sm-3" for="style" style="margin-right:0px; color:#00008B;">
    Select Style:<span style="color:red"> *</span></label>
    <div class="col-sm-6" id="style_name_select">

   <select  class="form-control for_auto_complete" id="style_of_day" name="style_of_day"><?php
        while( $row = mysqli_fetch_array( $result))
        {


          echo '<option value="'.$row['style_id'].'">'.$row['style_name'].'</option>';
        }


   ?>
  </select>

  </div>
  </div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_style"> -->


          <div class="form-group form-group-sm" id="form-form-group_for_color">
          <label class="control-label col-sm-3" for="color" style="margin-right:0px; color:#00008B;">
            Select Color:<span style="color:red"> *</span></label>
            <div class="col-sm-6">
              <?php
              $sql_color="select swing_production_info.style_name_id as style_id,
              color.color_name as color_name,color.color_id as color_id
               from swing_production_info,style_name,color where
                swing_production_info.style_name_id=style_name.style_id and
                swing_production_info.color_id=color.color_id
                and
                 swing_production_info.buyer_id=".$buyer_id."";


              		$result_color = mysqli_query($con, $sql_color);

                   ?>
              <select  class="form-control for_auto_complete" id="color_of_day" name="color_of_day">
                    <option select="selected" value="select">Select Color</option>

                    <?php

                    while( $row = mysqli_fetch_array( $result_color))
                    {


                      echo '<option value="'.$row['color_id'].'">'.$row['color_name'].'</option>';
                    }


                     ?>

              </select>

            </div>
          </div> <!-- End of <div class="form-group form-group-sm" id="form-group_for_color"> -->
