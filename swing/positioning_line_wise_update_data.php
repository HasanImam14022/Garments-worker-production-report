
<?php
session_start();
require_once("../login/session.php");
include('../login/db_connection_class.php');
$obj = new DB_Connection_Class();
$obj->connection();

 $po_number = $_POST['po_number'];
 $line_number_value = $_POST['current_line'];
 $position_in_line = $_POST['current_position'];
 //$complete_garments = $_POST['updated_complete_product'];


 $complete_garments = 0;

 $select_sql_for_duplicacy="select * from `swing_line_and_position_wise_production_info` where `line_number`='$line_number_value' AND `position_in_line` = '$position_in_line' AND `po_number` = '$po_number'";
 $result = mysqli_query($con,$select_sql_for_duplicacy) or die(mysqli_error($con));
 if(mysqli_num_rows($result) > 0)
 {
    while($row = mysqli_fetch_assoc($result)) 
    {     
         $complete_garments = $row['total_completed_product'];
       
    }
 }

?>
                        

<div class="form-group form-group-sm" id="form-group_for_line_number">
    <label class="control-label col-sm-3" for="buyer_name" style="margin-right:0px; color:#00008B;">Total Complete :<span style="color:red"> *</span></label>
    <div class="col-sm-6">
        <input type="text" id="total_complete" name="total_complete" value="<?php echo $complete_garments; ?>" readonly> 
        <button type="button" class="btn btn-danger" onClick="increase_the_number_of_total_number_of_product(<?php echo $complete_garments; ?>)"><b>+</b></button>
    </div>
</div> 

                        




