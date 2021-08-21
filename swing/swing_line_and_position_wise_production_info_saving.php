
<?php
session_start();
require_once("../login/session.php");
include('../login/db_connection_class.php');
$obj = new DB_Connection_Class();
$obj->connection();

$data_previously_saved = "No";
$data_insertion_hampering = "No";

$recording_person_id = $_SESSION['user_id'];
$password = $_SESSION['password'];
$recording_person_name = $_SESSION['user_name'];

$swing_date_value = $_POST['swing_date'];
$po_number_value = $_POST['po_number'];
$line_number_value = $_POST['line_number'];
$position_in_line_value = $_POST['position_in_line'];
$total_complete_value = $_POST['total_complete'];


mysqli_query($con,"BEGIN");
mysqli_query($con,"START TRANSACTION") or die(mysqli_error($con));

$select_sql_for_duplicacy="select * from `swing_line_and_position_wise_production_info` where `recording_person_id`='$recording_person_id' and `po_number`='$po_number_value' and `position_in_line`='$position_in_line_value'";

$result = mysqli_query($con,$select_sql_for_duplicacy) or die(mysqli_error($con));

if(mysqli_num_rows($result)>0)
{

	$data_previously_saved="Yes";

}
else if( mysqli_num_rows($result) < 1)
{
   

	$insert_sql_statement="insert into `swing_line_and_position_wise_production_info` ( `date`,`po_number`,`total_completed_product`,`line_number`,`position_in_line`,`recording_person_id` ) values (NOW(),'$po_number_value','$total_complete_value','$line_number_value','$position_in_line_value','$recording_person_id')";

	mysqli_query($con,$insert_sql_statement) or die(mysqli_error($con));

	if(mysqli_affected_rows($con)<>1)
	{
		$data_insertion_hampering = "Yes";
	}
	else
	{
		
	}
}

if($data_previously_saved == "Yes")
{

	mysqli_query($con,"ROLLBACK");
	echo "Data is previously saved.";

}
else if($data_insertion_hampering == "No" )
{

	mysqli_query($con,"COMMIT");
	echo "Data is successfully saved.";

}
else
{

	mysqli_query($con,"ROLLBACK");
	echo "Data is not successfully saved.";

}

$obj->disconnection();
 

?>