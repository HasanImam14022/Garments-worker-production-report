<?php
session_start();
require_once("../login/session.php");
include('../login/db_connection_class.php');
$obj = new DB_Connection_Class();
$obj->connection();



$data_previously_saved = "No";
$data_insertion_hampering = "No";
/*$user_name ="Iftekhar";
$user_id ="Iftekhar";
$password ="1234";*/

$user_id = $_SESSION['user_id'];
$password = $_SESSION['password'];
$user_name = $_SESSION['user_name'];
/*
$user_id = $_SESSION['user_id'];
$password = $_SESSION['password'];

$sql = "select * from hrm_info.user_login where user_id='$user_id' and `password`='$password'";
$result = mysqli_query($con,$sql) or die(mysql_error());

if( mysql_num_rows($result) < 1 )
{

	header('Location:logout.php');

}
else
{
	while($row=mysql_fetch_array($result))
	{	
		 $user_name=$row['user_name'];	
	}
}

*/

$machine_owner_id= $_POST['machine_owner_id'];
$machine_owner_name= $_POST['machine_owner_name'];
$receive_process=$_POST['machine_name'];
$splitted_receiving_date= explode("?fs?",$receive_process);
$machine_name= $splitted_receiving_date[0];
$machine_id= $splitted_receiving_date[1];



mysqli_query($con,"BEGIN");
mysqli_query($con,"START TRANSACTION") or die(mysql_error());

$select_sql_for_duplicacy="select * from `machine_owner_name` where `machine_owner_name`='$machine_owner_name' and `machine_name`='$machine_name'";

$result = mysqli_query($con,$select_sql_for_duplicacy) or die(mysqli_error());

if(mysqli_num_rows($result)>0)
{

	$data_previously_saved="Yes";

}
else if( mysqli_num_rows($result) < 1)
{


	$update_sql_statement="UPDATE `machine_owner_name` SET `machine_owner_name`='$machine_owner_name',`machine_id`='$machine_id',`machine_name`='$machine_name',`recording_person_id`='$user_id',`recording_person_name`='$user_name',`recording_time`=NOW() WHERE  `machine_owner_id`='$machine_owner_id'";


	mysqli_query($con,$update_sql_statement) or die(mysqli_error());

	if(mysqli_affected_rows($con)<>1)
	{
	
		$data_insertion_hampering = "Yes";
	
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
	echo "Data is successfully updated.";

}
else
{

	mysqli_query($con,"ROLLBACK");
	echo "Data is not successfully updated.";

}

$obj->disconnection();

?>
