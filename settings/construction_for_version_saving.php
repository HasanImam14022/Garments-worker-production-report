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

$warp_yarn_count= $_POST['warp_yarn_count'];
$no_of_ply_for_warp_yarn= $_POST['no_of_ply_for_warp_yarn'];
$uom_of_warp_yarn= $_POST['uom_of_warp_yarn'];
$weft_yarn_count= $_POST['weft_yarn_count'];
$no_of_ply_for_weft_yarn= $_POST['no_of_ply_for_weft_yarn'];
$uom_of_weft_yarn= $_POST['uom_of_weft_yarn'];
$no_of_threads_per_inch_in_warp= $_POST['no_of_threads_per_inch_in_warp'];
$warp_insertion= $_POST['warp_insertion'];
$no_of_threads_per_inch_in_weft= $_POST['no_of_threads_per_inch_in_weft'];
$weft_insertion= $_POST['weft_insertion'];

mysqli_query($con,"BEGIN");
mysqli_query($con,"START TRANSACTION") or die(mysql_error());

$select_sql_for_duplicacy="select * from `construction_for_version` where `warp_yarn_count`=$warp_yarn_count and `no_of_ply_for_warp_yarn`=$no_of_ply_for_warp_yarn and `uom_of_warp_yarn`='$uom_of_warp_yarn' and `weft_yarn_count`=$weft_yarn_count and `no_of_ply_for_weft_yarn`=$no_of_ply_for_weft_yarn and `uom_of_weft_yarn`='$uom_of_weft_yarn' and `no_of_threads_per_inch_in_warp`=$no_of_threads_per_inch_in_warp and `warp_insertion`=$warp_insertion and `no_of_threads_per_inch_in_weft`=$no_of_threads_per_inch_in_weft and `weft_insertion`=$weft_insertion";

$result = mysqli_query($con,$select_sql_for_duplicacy) or die(mysqli_error());

if(mysqli_num_rows($result)>0)
{

	$data_previously_saved="Yes";

}
else if( mysqli_num_rows($result) < 1)
{
     $select_sql_max_primary_key="select MAX(max_construction_id) as max_construction_id FROM (select CONVERT(substring(construction_id,14,LENGTH(construction_id)),UNSIGNED) as max_construction_id from construction_for_version) as temp_construction_for_version_table"; //converted into string and find max

    $result_for_max_primary_key = mysqli_query($con,$select_sql_max_primary_key) or die(mysqli_error($con));
    
    $row_for_max_primary_key = mysqli_fetch_array($result_for_max_primary_key);


    $row_id=$row_for_max_primary_key['max_construction_id']+1;

    if($row_for_max_primary_key['max_construction_id']==0)
    {

        $current_construction_id='constructver_1';

    }
    else
    {

        $current_construction_id ="constructver_".($row_for_max_primary_key['max_construction_id']+1);

    }

	$insert_sql_statement="insert into `construction_for_version` (`row_id`,`construction_id`,`warp_yarn_count`,`no_of_ply_for_warp_yarn`,`uom_of_warp_yarn`,`weft_yarn_count`,`no_of_ply_for_weft_yarn`,`uom_of_weft_yarn`,`no_of_threads_per_inch_in_warp`,`warp_insertion`,`no_of_threads_per_inch_in_weft`,`weft_insertion`,`recording_person_id`,`recording_person_name`,`recording_time` ) values ('$row_id','$current_construction_id',$warp_yarn_count,$no_of_ply_for_warp_yarn,'$uom_of_warp_yarn',$weft_yarn_count,$no_of_ply_for_weft_yarn,'$uom_of_weft_yarn',$no_of_threads_per_inch_in_warp,$warp_insertion,$no_of_threads_per_inch_in_weft,$weft_insertion,'$user_id','$user_name',NOW())";

	mysqli_query($con,$insert_sql_statement) or die(mysqli_error());

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
