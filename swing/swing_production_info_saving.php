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


$swing_start_date= $_POST['swing_start_date'];
$splitted_pp_creation_date= explode("/",$swing_start_date);
$swing_start_date= $splitted_pp_creation_date[2]."-".$splitted_pp_creation_date[1]."-".$splitted_pp_creation_date[0];

$swing_end_date= $_POST['swing_end_date'];
$splitted_pp_creation_date= explode("/",$swing_end_date);
$swing_end_date= $splitted_pp_creation_date[2]."-".$splitted_pp_creation_date[1]."-".$splitted_pp_creation_date[0];


$po_number = $_POST['po_number'];
$buyer_name= $_POST['buyer_name'];
$style_no =$_POST['style_no'];
$color= $_POST['color'];
$manpower_op = $_POST['manpower_op'];
$manpower_im = $_POST['manpower_im'];
$manpower_hp = $_POST['manpower_hp'];
$manpower_mk = $_POST['manpower_mk'];


$manpower= $manpower_op + $manpower_im + $manpower_hp + $manpower_mk;

$hourly_target= $_POST['hourly_target'];
$cumilitive_target= $_POST['cumilitive_target'];

mysqli_query($con,"BEGIN");
mysqli_query($con,"START TRANSACTION") or die(mysqli_error($con));

$select_sql_for_duplicacy="select * from `swing_production_info` where `buyer_id`='$buyer_name' and `style_name_id`='$style_no' and `color_id`='$color' and `po_number`='$po_number'";

$result = mysqli_query($con,$select_sql_for_duplicacy) or die(mysqli_error($con));

if(mysqli_num_rows($result)>0)
{

	$data_previously_saved="Yes";

}
else if( mysqli_num_rows($result) < 1)
{
   

	$insert_sql_statement="insert into `swing_production_info` ( `po_number`,`buyer_id`,`style_name_id`,`color_id`,`manpower_op`,`manpower_im`,`manpower_hp`,`manpower_mk`,`manpower`,`hourly_target`,`cumilitive_target`,`swing_start_time`,`swing_end_time`,`recording_person_id`,`recording_person_name`,`recording_time` ) values ('$po_number','$buyer_name','$style_no','$color','$manpower_op','$manpower_im','$manpower_hp','$manpower_mk','$manpower','$hourly_target','$cumilitive_target','$swing_start_date','$swing_end_date','$user_id','$user_name',NOW())";

	mysqli_query($con,$insert_sql_statement) or die(mysqli_error($con));

	if(mysqli_affected_rows($con)<>1)
	{
		$data_insertion_hampering = "Yes";
	}
	else
	{
		
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
