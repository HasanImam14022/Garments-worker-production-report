<?php
session_start();
require_once("../login/session.php");
include('../login/db_connection_class.php');
$obj = new DB_Connection_Class();
$obj->connection();

//error_reporting(0);

$data_previously_saved = "No";
$data_insertion_hampering = "No";

$recording_person_id = $_SESSION['user_id'];
$password = $_SESSION['password'];
$recording_person_name = $_SESSION['user_name'];

$po_no= $_POST['po_number'];


$possible_number_of_line = '20';



mysqli_query($con,"BEGIN");
mysqli_query($con,"START TRANSACTION") or die(mysqli_error($con));


$select_sql_for_duplicacy="select * from `swing_line_wise_production_info` where `po_no`='$po_no'";

$result = mysqli_query($con,$select_sql_for_duplicacy) or die(mysqli_error($con));

if(mysqli_num_rows($result)> 0)
{
	$data_previously_saved="Yes";

}

else if( mysqli_num_rows($result)==0)
{
	

 for($i=1;$i<=20;$i++)
 {
	
	$line_number = "line_number_".$i;
    $start_line = "start_line_".$i;
    $end_line = "end_line_".$i;
    
	 
	if( isset($_POST[$start_line]) && $_POST[$end_line]) 
	{
           $line_number_value = $_POST[$line_number]; 
		   $start_line_value = $_POST[$start_line];
           $end_line_value = $_POST[$end_line];

		  if(isset($line_number))
		  {
			  $insert_sql_statement="insert into `swing_line_wise_production_info` ( `po_no`,`line_number`,`start_line`,`end_line`,`recording_person_id`,`recording_person_name`,`recording_time`) values ('$po_no','$line_number_value','$start_line_value','$end_line_value','$recording_person_id','$recording_person_name',NOW())";
			  $result = mysqli_query($con,$insert_sql_statement) or die(mysqli_error($con));
			  
		  }

	}	  
	
 }
}

if($data_previously_saved == "Yes")
{

	mysqli_query($con,"ROLLBACK");
	echo "Sorry you have already created record against this PO.";

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
