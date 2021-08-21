<?php
session_start();
require_once("../login/session.php");
include('../login/db_connection_class.php');
$obj = new DB_Connection_Class();
$obj->connection();



$data_previously_saved = "No";
$data_deleteion_hampering = "No";


$test_method_id=$_POST['test_method_id'];


mysqli_query($con,"BEGIN");
mysqli_query($con,"START TRANSACTION") or die(mysqli_error());



	$delete_sql_statement="DELETE FROM `test_method_name` WHERE `test_method_id`='$test_method_id'";

	mysqli_query($con,$delete_sql_statement) or die(mysqli_error());






	if(mysqli_affected_rows($con)<>1)
	{
	
		$data_deleteion_hampering = "Yes";
	
	}
	else
	{
		$delete_sql_statement_for_transaction="DELETE FROM `transaction_test_name_and_method` WHERE `test_method_id`='$test_method_id'";

	mysqli_query($con,$delete_sql_statement_for_transaction) or die(mysqli_error());
	}

if($data_deleteion_hampering == "No" )
{

	mysqli_query($con,"COMMIT");
	echo "Test Method Name is successfully Deleted.";


}
else
{

	mysqli_query($con,"ROLLBACK");
	echo " Test Method Name is not successfully Deleted.";

}

$obj->disconnection();

?>
