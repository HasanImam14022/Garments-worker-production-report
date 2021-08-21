<?php
session_start();
require_once("../login/session.php");
include('../login/db_connection_class.php');
$obj = new DB_Connection_Class();
$obj->connection();



$data_previously_saved = "No";
$data_deleteion_hampering = "No";


$key_account_manager_id=$_POST['key_account_manager_id'];


mysqli_query($con,"BEGIN");
mysqli_query($con,"START TRANSACTION") or die(mysqli_error());



	$delete_sql_statement="DELETE FROM `key_account_manager` WHERE `key_account_manager_id`='$key_account_manager_id'";

	mysqli_query($con,$delete_sql_statement) or die(mysqli_error());

	if(mysqli_affected_rows($con)<>1)
	{
	
		$data_deleteion_hampering = "Yes";
	
	}

if($data_deleteion_hampering == "No" )
{

	mysqli_query($con,"COMMIT");
	echo "Key Account Manager is successfully Deleted.";


}
else
{

	mysqli_query($con,"ROLLBACK");
	echo "key_account_manager is not successfully Deleted.";

}

$obj->disconnection();

?>
