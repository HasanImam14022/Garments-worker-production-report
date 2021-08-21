<?php
session_start();
require_once("../login/session.php");
include('../login/db_connection_class.php');
$obj = new DB_Connection_Class();
$obj->connection();



$data_previously_saved = "No";
$data_deleteion_hampering = "No";

/*
$color_id=$_GET['color_id'];*/
$color_id=$_POST['color_id'];


mysqli_query($con,"BEGIN");
mysqli_query($con,"START TRANSACTION") or die(mysqli_error());



	$delete_sql_statement="DELETE FROM `color` WHERE `color_id`='$color_id'";

	mysqli_query($con,$delete_sql_statement) or die(mysqli_error());

	if(mysqli_affected_rows($con)<>1)
	{
	
		$data_deleteion_hampering = "Yes";
	
	}

if($data_deleteion_hampering == "No" )
{

	mysqli_query($con,"COMMIT");
	echo "Color is successfully Deleted.";


}
else
{

	mysqli_query($con,"ROLLBACK");
	echo "Color is not successfully Deleted.";

}

$obj->disconnection();

?>
