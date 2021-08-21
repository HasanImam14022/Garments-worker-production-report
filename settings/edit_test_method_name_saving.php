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

$test_method_id= $_POST['test_method_id'];
$receive_test_name= $_POST['test_name'];
$splitted_receiving_date= explode("?fs?",$receive_test_name);
$test_name= $splitted_receiving_date[0];
$test_id= $splitted_receiving_date[1];

$id_for_same=$_POST['test_name_same_as'];

$test_method_name= $_POST['test_method_name'];
$iso_or_aatcc= $_POST['iso_or_aatcc'];
$criteria_or_testing_lab= $_POST['criteria_or_testing_lab'];

mysqli_query($con,"BEGIN");
mysqli_query($con,"START TRANSACTION") or die(mysql_error());

$select_sql_for_duplicacy="select * from `test_method_name` tmn 
INNER JOIN `transaction_test_name_and_method` ttnm ON tmn.`test_method_id`=ttnm.`test_method_id`  
where tmn.`test_name`='$test_name' and 
tmn.`test_method_name`='$test_method_name' and 
tmn.`iso_or_aatcc`='$iso_or_aatcc' and 
tmn.`criteria_or_testing_lab`='$criteria_or_testing_lab' and 
ttnm.`test_name_and_method_for_process_id`='$id_for_same'";

$result = mysqli_query($con,$select_sql_for_duplicacy) or die(mysqli_error($con));

if(mysqli_num_rows($result)>0)
{

	$data_previously_saved="Yes";

}
else if( mysqli_num_rows($result) < 1)
{


	$update_sql_statement="UPDATE `test_method_name` SET `test_id`='$test_id', `test_name`='$test_name',`test_method_name`='$test_method_name',`iso_or_aatcc`='$iso_or_aatcc',`criteria_or_testing_lab`='$criteria_or_testing_lab',`test_name_and_method_for_process_id`='$id_for_same',`recording_person_id`='$user_id',`recording_person_name`='$user_name',`recording_time`=NOW() WHERE `test_method_id`='$test_method_id'";

	mysqli_query($con,$update_sql_statement) or die(mysqli_error($con));

	if(mysqli_affected_rows($con)<>1)
	{
	
		$data_insertion_hampering = "Yes";
	
	}
	else
	{   $select_query_for_transaction="SELECT * FROM `transaction_test_name_and_method`  WHERE `test_method_id`='$test_method_id'";
		$result = mysqli_query($con,$select_query_for_transaction) or die(mysqli_error());

		if(mysqli_num_rows($result)>0)
		{
			$update_sql_statement_for_transaction="UPDATE `transaction_test_name_and_method` SET `test_name_and_method_for_process_id`='$id_for_same', `test_name_id`='$test_id',`iso_or_aatcc`='$iso_or_aatcc',`test_method_id`='$test_method_id' WHERE `test_method_id`='$test_method_id'";

	       mysqli_query($con,$update_sql_statement_for_transaction) or die(mysqli_error($con));

		}

		else 
		{

			$insert_sql_statement_for_transaaction_table="insert into `transaction_test_name_and_method` (`test_name_and_method_for_process_id`,`test_name_id`,`iso_or_aatcc`,`test_method_id`) values ('$id_for_same','$test_id','$iso_or_aatcc','$test_method_id')";

			mysqli_query($con,$insert_sql_statement_for_transaaction_table) or die(mysqli_error($con));
		}
		


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
