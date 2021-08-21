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

$receive_test_name= $_POST['test_name'];
$splitted_receiving_date= explode("?fs?",$receive_test_name);
$test_name= $splitted_receiving_date[0];
$test_id= $splitted_receiving_date[1];

//$test_name_for_use= $splitted_receiving_date[2];

$id_for_same=$_POST['test_name_same_as'];

//$test_name_for_use= $splitted_receiving_date[2];


$test_method_name= $_POST['test_method_name'];
$iso_or_aatcc= $_POST['iso_or_aatcc'];
$criteria_or_testing_lab= $_POST['criteria_or_testing_lab'];

mysqli_query($con,"BEGIN");
mysqli_query($con,"START TRANSACTION") or die(mysql_error());

$select_sql_for_duplicacy="select * from `test_method_name` where `test_name`='$test_name' and `test_method_name`='$test_method_name' and `criteria_or_testing_lab`='$criteria_or_testing_lab'";

$result = mysqli_query($con,$select_sql_for_duplicacy) or die(mysqli_error());



if(mysqli_num_rows($result)>0)
{

	$data_previously_saved="Yes";

}
else if( mysqli_num_rows($result) < 1)
{
    $select_sql_max_primary_key="select MAX(max_test_method_id) as max_test_method_id FROM (select CONVERT(substring(test_method_id,9,LENGTH(test_method_id)),UNSIGNED) as max_test_method_id from test_method_name) as temp_test_method_name_table"; //converted into string and find max

    $result_for_max_primary_key = mysqli_query($con,$select_sql_max_primary_key) or die(mysqli_error($con));
    
    $row_for_max_primary_key = mysqli_fetch_array($result_for_max_primary_key);

    $row_id=$row_for_max_primary_key['max_test_method_id']+1;

    if($row_for_max_primary_key['max_test_method_id']==0)
    {

    	$current_test_method_id='testmet_1';

    }
    else
    {

    	$current_test_method_id ="testmet_".($row_for_max_primary_key['max_test_method_id']+1);

    }

	$insert_sql_statement="insert into `test_method_name` (`row_id`,`test_method_id`,`test_id`,`test_name`,`test_method_name`,`iso_or_aatcc`,`criteria_or_testing_lab`,`test_name_and_method_for_process_id`,`recording_person_id`,`recording_person_name`,`recording_time` ) values ('$row_id','$current_test_method_id','$test_id','$test_name','$test_method_name','$iso_or_aatcc','$criteria_or_testing_lab','$id_for_same','$user_id','$user_name',NOW())";

	mysqli_query($con,$insert_sql_statement) or die(mysqli_error($con));





	if(mysqli_affected_rows($con)<>1)
	{
	
		$data_insertion_hampering = "Yes";
	
	}
	else
	{

	$insert_sql_statement_for_transaaction_table="insert into `transaction_test_name_and_method` (`test_name_and_method_for_process_id`,`test_name_id`,`iso_or_aatcc`,`test_method_id`) values ('$id_for_same','$test_id','$iso_or_aatcc','$current_test_method_id')";

	mysqli_query($con,$insert_sql_statement_for_transaaction_table) or die(mysqli_error($con));
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
