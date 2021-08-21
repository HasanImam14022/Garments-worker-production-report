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

$customer_id= $_POST['customer_id'];
$test_name= $_POST['test_name'];
$test_id= $_POST['test_id'];;
$test_name_for_use= $_POST['test_name_for_use'];;
$test_method_name= $_POST['test_method_name'];
$test_method_id= $_POST['test_method_id'];


$direction_or_type= $_POST['direction_or_type'];
$field_for_value= $_POST['field_for_value'];
$field_for_math_operator= $_POST['field_for_math_operator'];
$field_for_tolerance= $_POST['field_for_tolerance'];
$field_for_uom= $_POST['field_for_uom'];
$field_for_minimum_value= $_POST['field_for_minimum_value'];
$field_for_maximum_value= $_POST['field_for_maximum_value'];


mysqli_query($con,"BEGIN");
mysqli_query($con,"START TRANSACTION") or die(mysql_error());

$select_sql_for_duplicacy="select * from `field_selection_for_test_method` where `test_name`='$test_name' and `test_method_name`='$test_method_name' and `customer_id`='$customer_id'";

$result = mysqli_query($con,$select_sql_for_duplicacy) or die(mysqli_error());



if(mysqli_num_rows($result)>0)
{

	$data_previously_saved="Yes";

}
else if( mysqli_num_rows($result) < 1)
{
    $select_sql_max_primary_key="select MAX(max_field_id) as max_field_id FROM (select CONVERT(substring(field_id,7,LENGTH(field_id)),UNSIGNED) as max_field_id from field_selection_for_test_method) as temp_field_selection_for_test_method"; //converted into string and find max

    $result_for_max_primary_key = mysqli_query($con,$select_sql_max_primary_key) or die(mysqli_error($con));
    
    $row_for_max_primary_key = mysqli_fetch_array($result_for_max_primary_key);

    $row_id=$row_for_max_primary_key['max_field_id']+1;

    if($row_for_max_primary_key['max_field_id']==0)
    {

    	$current_field_id='field_1';

    }
    else
    {

    	$current_field_id ="field_".($row_for_max_primary_key['max_field_id']+1);

    }

	$insert_sql_statement="INSERT INTO `field_selection_for_test_method`(`row_id`,`field_id`, `customer_id` ,`test_name`,`test_name_for_use`, `test_id`, `test_method_name`, `test_method_id`, `direction_or_type`, `field_for_value`, `field_for_math_operator`, `field_for_tolerance`, `field_for_uom`, `field_for_minimum_value`, `field_for_maximum_value`, `recording_person_id`, `recording_person_name`, `recording_time`)  
	values 
	('$row_id','$current_field_id','$customer_id','$test_name','$test_name_for_use','$test_id','$test_method_name','$test_method_id','$direction_or_type','$field_for_value','$field_for_math_operator','$field_for_tolerance','$field_for_uom','$field_for_minimum_value','$field_for_maximum_value','$user_id','$user_name',NOW())";

	mysqli_query($con,$insert_sql_statement) or die(mysqli_error($con));

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
	echo "Data is successfully saved.";

}
else
{

	mysqli_query($con,"ROLLBACK");
	echo "Data is not successfully saved.";

}

$obj->disconnection();

?>
