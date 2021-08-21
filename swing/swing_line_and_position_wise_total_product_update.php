<?php
session_start();
require_once("../login/session.php");
include('../login/db_connection_class.php');
$obj = new DB_Connection_Class();
$obj->connection();

$recording_person_id = $_SESSION['user_id'];

$po_number = $_POST['po_number'];
$current_line_value = $_POST['current_line'];
$current_position_value = $_POST['current_position'];
$updated_complete_product = $_POST['updated_complete_product'];

$select_sql_for_duplicacy="select * from `swing_line_and_position_wise_production_info` where `po_number`='$po_number' AND `line_number`='$current_line_value' AND `position_in_line` = '$current_position_value'";

$result = mysqli_query($con,$select_sql_for_duplicacy) or die(mysqli_error($con));
if(mysqli_num_rows($result) > 0)
{
        date_default_timezone_set("Asia/Dhaka");
        $date = date("d-m-Y");
        $hour = date("H");

       $sql = "UPDATE 
	           `swing_line_and_position_wise_production_info`
        SET    `total_completed_product` = '$updated_complete_product',
               `date` = '$date',
               `hour` = '$hour'       
		WHERE  `line_number` = '$current_line_value' 
        AND    `position_in_line` = '$current_position_value'
        AND   `po_number` = '$po_number'
		";

        $res = mysqli_query($con, $sql) or die(mysqli_error($con));
        
        //INSERT INTO `swing_position_and_hour_wise_production_info`(`id`, `date`, `hours`, `po_number`, `line_number`, `position_in_line`, `complete_product`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]')
        $sql1 = "INSERT INTO `swing_position_and_hour_wise_production_info`
                        (`date`,`hours`,`po_number`,`line_number`,`position_in_line`,`complete_product`)
                 VALUES ('$date','$hour','$po_number','$current_line_value','$current_position_value','$updated_complete_product')";
        $res1 = mysqli_query($con, $sql1) or die(mysqli_error($con));
        var_dump($res1);
        exit();

        mysqli_query($con,"COMMIT");

        echo "Data updated successfully.";


}
else
{
    date_default_timezone_set("Asia/Dhaka");
    $date = date("d-m-Y");
    $hour = date("H");
    $sql = "INSERT INTO `swing_line_and_position_wise_production_info`
                        (`date`,`hour`,`po_number`, `total_completed_product`, `line_number`, 
                        `position_in_line`, `recording_person_id`)
                 VALUES ('$date','$hour','$po_number','$updated_complete_product','$current_line_value',
                        '$current_position_value','$recording_person_id')";
        $res = mysqli_query($con, $sql) or die(mysqli_error($con));
        mysqli_query($con,"COMMIT");
        echo "Data insert successfully.";
}

$obj->disconnection();
?>