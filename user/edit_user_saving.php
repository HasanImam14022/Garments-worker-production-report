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

$session_user_id = $_SESSION['user_id'];
$session_password = $_SESSION['password'];
$session_user_name = $_SESSION['user_name'];
/*
$user_id = $_SESSION['user_id'];
$password = $_SESSION['password'];

$sql = "select * from hrm_info.user_login where user_id='$user_id' and `password`='$password'";
$result = mysqli_query($con,$sql) or die(mysqli_error());

if( mysqli_num_rows($result) < 1 )
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

$id= $_POST['id'];
$user_name= $_POST['user_name'];
$employee_name= $_POST['employee_name'];
$user_id= $_POST['user_id'];
$password= $_POST['password'];
$confirm_password= $_POST['confirm_password'];
$user_type= $_POST['user_type'];
$status= $_POST['status'];
$email= $_POST['email'];
$contact_no= $_POST['contact_no'];
$department= $_POST['department'];
$designation= $_POST['designation'];
 /*$profile_picture= $_POST['profile_picture'];*/

$image_files= $_FILES['profile_picture'];

$profile_picture_name= $_FILES['profile_picture']["name"];

$profile_picture_type= $_FILES['profile_picture']["type"];
$profile_picture_tmp_name= $_FILES['profile_picture']["tmp_name"];
$profile_picture_error= $_FILES['profile_picture']["error"];
$profile_picture_size= $_FILES['profile_picture']["size"];





if(empty($image_files) || $profile_picture_name == "" || $profile_picture_type == "" || $profile_picture_tmp_name == "" || $profile_picture_error == 4)
{
	$error_msg = "Sorry, No Image file is attached!";
	$profile_picture_name = "default.png";
}
else
{   
	
	/*$target_dir = "../img/";
	$target_file = $target_dir . basename($profile_picture_name);
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	echo $target_file;*/
	/*move_uploaded_file($profile_picture_name, $target_file);*/
	$target_file = move_uploaded_file($profile_picture_tmp_name,"../img/".$profile_picture_name);
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
	if(file_exists($target_file))
	{
		
	    $error_msg = "Sorry, image file already exists!";
	    $profile_picture_name = "default.png";
	}
	else
	{
		 if($profile_picture_size > 10000000)
		{
			echo "not ok";
		    $error_msg = "Sorry, your image file is too large. Maximum size is 10MB!";
		    $profile_picture_name = "default.png";
		}
	}
}

mysqli_query($con,"BEGIN");
mysqli_query($con,"START TRANSACTION") or die(mysqli_error());

$select_sql_for_duplicacy="select * from `user_info` where `user_name`='$user_name' and `employee_name`='$employee_name' and `user_id`='$user_id' and `password`='$password' and `confirm_password`='$confirm_password' and `user_type`='$user_type' and `status`='$status' and `email`='$email' and `contact_no`='$contact_no' and `department`='$department' and `designation`='$designation' and `profile_picture`='$profile_picture_name'";

$result = mysqli_query($con,$select_sql_for_duplicacy) or die(mysqli_error());

$select_sql_for_duplicacy_for_login="select * from `user_login` where `user_name`='$user_name'  and `user_id`='$user_id' and `password`='$password' and `user_type`='$user_type' and `status`='$status' and `email`='$email' and `contact_no`='$contact_no' and `department`='$department' and `designation`='$designation' and `profile_picture`='$profile_picture_name'";

$result_for_login = mysqli_query($con,$select_sql_for_duplicacy_for_login) or die(mysqli_error());

if(mysqli_num_rows($result)>0 && mysqli_num_rows($result_for_login)>0)
{

	$data_previously_saved="Yes";

}
else if( mysqli_num_rows($result) < 1)
{


	$update_sql_statement="UPDATE `user_info` SET `user_name`='$user_name',`employee_name`='$employee_name',`user_id`='$user_id',`password`='$password',`confirm_password`='$confirm_password',`user_type`='$user_type',`status`='$status',`email`='$email',`contact_no`='$contact_no',`department`='$department',`designation`='$designation',`profile_picture`='$profile_picture_name',`recording_person_id`='$session_user_id',`recording_person_name`='$session_user_name',`recording_time`=NOW() WHERE `user_id`='$user_id'";

	mysqli_query($con,$update_sql_statement) or die(mysqli_error($con));

	/*$update_sql_statement_for_login="UPDATE `user_login` SET `user_name`='$user_name',`user_id`='$user_id',`password`='$password',`user_type`='$user_type',`status`='$status',`email`='$email',`contact_no`='$contact_no',`department`='$department',`designation`='$designation',`profile_picture`='$profile_picture_name',`recording_person_id`='$session_user_id',`recording_person_name`='$session_user_name',`recording_time`=NOW() WHERE `user_id`='$user_id'";*/
  
  $update_sql_statement_for_login="UPDATE `user_login` SET `user_name`='$user_name',`user_id`='$user_id',`password`='$password',`user_type`='$user_type',`employee_name`='$employee_name',`status`='$status',`email`='$email',`contact_no`='$contact_no',`department`='$department',`designation`='$designation',`profile_picture`='$profile_picture_name',`recording_person_id`='$session_user_id',`recording_person_name`='$session_user_name',`recording_time`=NOW() WHERE `user_id`='$user_id'";

	mysqli_query($con,$update_sql_statement_for_login) or die(mysqli_error($con));

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
	echo "Data is successfully Updated.";

}
else
{

	mysqli_query($con,"ROLLBACK");
	echo "Data is not successfully Updated.";

}

$obj->disconnection();

?>
