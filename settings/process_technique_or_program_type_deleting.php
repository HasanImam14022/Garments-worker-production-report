<?php
session_start();
require_once("../login/session.php");
include('../login/db_connection_class.php');
$obj = new DB_Connection_Class();
$obj->connection();



$data_previously_saved = "No";
$data_deleteion_hampering = "No";


$process_technique_id=$_GET['process_technique_id'];


mysqli_query($con,"BEGIN");
mysqli_query($con,"START TRANSACTION") or die(mysqli_error());



	$delete_sql_statement="DELETE FROM `process_technique_or_program_type` WHERE `process_technique_id`='$process_technique_id'";

	mysqli_query($con,$delete_sql_statement) or die(mysqli_error($con));

	if(mysqli_affected_rows($con)<>1)
	{
	
		$data_deleteion_hampering = "Yes";
	
	}

if($data_deleteion_hampering == "No" )
{

	mysqli_query($con,"COMMIT");
	echo "Process Technique Type or Program Type is successfully Deleted.";


}
else
{

	mysqli_query($con,"ROLLBACK");
	echo "Process Technique or Program Type is not successfully Deleted.";

}

$obj->disconnection();

?>
