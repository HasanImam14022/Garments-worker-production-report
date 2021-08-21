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
$result = mysqli_query($con,$sql) or die(mysqli_error());

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

$test_name= $_POST['test_name'];

//echo $test_name;

$splitting_test_name=explode(" ", $test_name);

$test_name_in_single_word = "";

for($i=0;$i<sizeof($splitting_test_name);$i++)
{


	$test_name_in_single_word = $test_name_in_single_word."_".trim($splitting_test_name[$i]);

}

$test_name_for_use= substr($test_name_in_single_word,1,strlen($test_name_in_single_word));




mysqli_query($con,"BEGIN");
mysqli_query($con,"START TRANSACTION") or die(mysqli_error());

$select_sql_for_duplicacy="select * from `test_name_and_method_for_all_process` where `test_name`='$test_name'";

$result = mysqli_query($con,$select_sql_for_duplicacy) or die(mysqli_error());

if(mysqli_num_rows($result)>0)
{

	$data_previously_saved="Yes";

}
else if( mysqli_num_rows($result) < 1)
{

    $select_sql_max_primary_key="select MAX(max_test_id) as max_test_id FROM (select CONVERT(substring(test_id,6,LENGTH(test_id)),UNSIGNED) as max_test_id from test_name_and_method_for_all_process) as temp_test_name_and_method_for_all_process_table"; //converted into string and find max

    $result_for_max_primary_key = mysqli_query($con,$select_sql_max_primary_key) or die(mysqli_error($con));
    
    $row_for_max_primary_key = mysqli_fetch_array($result_for_max_primary_key);

    $id=$row_for_max_primary_key['max_test_id']+1;

    if($row_for_max_primary_key['max_test_id']==0)
    {

    	$current_test_id='test_1';

    }
    else
    {

    	$current_test_id ="test_".($row_for_max_primary_key['max_test_id']+1);

    }

	/*$insert_sql_statement="insert into `test_name` (`id`,`test_id`,`test_name`,`recording_person_id`,`recording_person_name`,`recording_time` ) values ('$id','$current_test_id','$test_name','$user_id','$user_name',NOW())";*/

	

	$insert_sql_statement="insert into `test_name_and_method_for_all_process` (`id`,`test_id`,`test_name`,`recording_person_id`,`recording_person_name`,`recording_time` ) values ('$id','$current_test_id','$test_name','$user_id','$user_name',NOW())";


	/*print_r($insert_sql_statement);
	exit();*/

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
