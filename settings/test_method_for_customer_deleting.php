<?php
session_start();
require_once("../login/session.php");
include('../login/db_connection_class.php');
$obj = new DB_Connection_Class();
$obj->connection();



$data_previously_saved = "No";
$data_deleteion_hampering = "No";
 
/*
$customer_id=$_GET['customer_id'];*/


$customer_name=$_GET['customer_name'];


mysqli_query($con,"BEGIN");
mysqli_query($con,"START TRANSACTION") or die(mysqli_error());



	$delete_sql_statement="DELETE FROM `test_method_for_customer` WHERE `customer_name`='$customer_name'";

	mysqli_query($con,$delete_sql_statement) or die(mysqli_error($con));

	if(mysqli_affected_rows($con)<>1)
	{
	
		$data_deleteion_hampering = "Yes";
	
	}

if($data_deleteion_hampering == "No" )
{

	mysqli_query($con,"COMMIT");
	echo "Test Method For Customer  is successfully Deleted.";


}
else
{

	mysqli_query($con,"ROLLBACK");
	echo " Test Method Customer is not successfully Deleted.";

}

$obj->disconnection();

?>
