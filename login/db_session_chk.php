<?php
error_reporting(0);
require_once('login/db_connection_class.php');
$obj = new DB_Connection_Class();
$obj->connection();

date_default_timezone_set("Asia/Dhaka");

if(!(isset($_SESSION['first_name']) && isset($_SESSION['user_name']) && isset($_SESSION['password'])))
{
    header('Location: login/logout.php');
}
else
{
	/********** Session variable saved in other variable **********/
	
	$user_id 		= $_SESSION['user_id'];
	$user_name 		= $_SESSION['user_name'];
    $password       = $_SESSION['password'];
    $first_name 	= $_SESSION['first_name'];
    $last_name    	= $_SESSION['last_name'];
    $middle_name 	= $_SESSION['middle_name'];
    $user_type   	= $_SESSION['user_type'];
    $status 		= $_SESSION['status'];

	$sql_for_session_privilege = "SELECT * 
									FROM user_login 
								   WHERE user_name = '$user_name' 
								     AND password = '$password' 
								     AND status = 'Active'";
    $res_for_session_privilege = mysqli_query($con, $sql_for_session_privilege) or die(mysqli_error($con));
    

	if(mysqli_num_rows($res_for_session_privilege) < 1)
	{
	   	header('Location: login/logout.php');
	}
}
?>