<?php
session_start();
require_once("../login/session.php");
include('../login/db_connection_class.php');
$obj = new DB_Connection_Class();
$obj->connection();



$data_previously_saved = "No";
$data_deleteion_hampering = "No";


$construction_id=$_POST['construction_id'];


mysqli_query($con,"BEGIN");
mysqli_query($con,"START TRANSACTION") or die(mysqli_error());



	$delete_sql_statement="DELETE FROM `construction_for_version` WHERE `construction_id`='$construction_id'";

	mysqli_query($con,$delete_sql_statement) or die(mysqli_error());

	if(mysqli_affected_rows($con)<>1)
	{
	
		$data_deleteion_hampering = "Yes";
	
	}

if($data_deleteion_hampering == "No" )
{

	mysqli_query($con,"COMMIT");
	echo "Construction Name is successfully Deleted.";


}
else
{

	mysqli_query($con,"ROLLBACK");
	echo "Construction Name is not successfully Deleted.";

}

$obj->disconnection();

?>
