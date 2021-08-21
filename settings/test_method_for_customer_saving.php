<?php
session_start();
error_reporting(0);
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

$customer_name= $_POST['customer_name'];
$split_customer_data= explode("?fs?", $customer_name);
$customer_name=$split_customer_data[0];
$customer_id=$split_customer_data[1];


$test_method_name= $_POST['test_method_name'];

$temp_test_method_name= $test_method_name[0];

for($i=1;$i<count($test_method_name);$i++) // Making Checkbox Value Comma(,) Separated.
{    

	 $temp_test_method_name=$temp_test_method_name."?tttmn?".$test_method_name[$i];
     



}


mysqli_query($con,"BEGIN");
mysqli_query($con,"START TRANSACTION") or die(mysqli_error());
//in loop



$select_sql_for_duplicacy="select * from `test_method_for_customer` where `customer_name`='$customer_name' and `checking_field`='$temp_test_method_name'";

$result = mysqli_query($con,$select_sql_for_duplicacy) or die(mysqli_error());

if(mysqli_num_rows($result)>0)
{

	$data_previously_saved="Yes";

}
//in loop
else if( mysqli_num_rows($result) < 1)
{ 

	
    $delect_sql_for_customer_method="DELETE FROM `test_method_for_customer` WHERE `customer_name`='$customer_name'";
    $result_for_customer_method = mysqli_query($con,$delect_sql_for_customer_method) or die(mysqli_error($con));

  for($i=0; $i< count($test_method_name); $i++) // Making Checkbox Value Comma(,) Separated.
	{    
	

          $splitted_receiving_date= explode("?tttmn?",$temp_test_method_name);

   
			   for($i=0;$i<count($splitted_receiving_date);$i++) // Making Checkbox Value Comma(,) Separated.
			      { 
			         $individual_value_for_insert=$splitted_receiving_date[$i];
			       

			                      
			    $select_sql_max_primary_key="select MAX(max_test_method_for_customer_id) as max_test_method_for_customer_id FROM (select CONVERT(substring(test_method_for_customer_id,11,LENGTH(test_method_for_customer_id)),UNSIGNED) as max_test_method_for_customer_id from test_method_for_customer) as temp_test_method_for_customer_table"; //converted into string and find max

			    $result_for_max_primary_key = mysqli_query($con,$select_sql_max_primary_key) or die(mysqli_error($con));
			    
			    $row_for_max_primary_key = mysqli_fetch_array($result_for_max_primary_key);

			    $row_id=$row_for_max_primary_key['max_test_method_for_customer_id']+1;

			    if($row_for_max_primary_key['max_test_method_for_customer_id']==0)
			    {

			        $current_test_method_for_customer_id='testmcust_1';

			    }
			    else
			    {

			        $current_test_method_for_customer_id ="testmcust_".($row_for_max_primary_key['max_test_method_for_customer_id']+1);

			    }
			      


			   /* $receive_test_method_name=$receive_test_method_name.",".$temp_test_method_name[$i];


			    
				$splitted_receiving_date= explode(",",$receive_test_method_name);

				
				
				 $test_id=$splitted_receiving_date[0]; 
				 $test_name=$splitted_receiving_date[1]; 


				 $test_id=$test_id.",".$test_id;
				 $test_name=$test_name.",".$test_name;
				 $test_method_name=$test_method_name.",".$test_method_name;*/

				 
        /* echo $individual_value_for_insert;
         exit();*/
         $splitted_receiving_date_individual= explode("fs",$individual_value_for_insert);
         
          $test_id=$splitted_receiving_date_individual[0]; 
          $test_name=$splitted_receiving_date_individual[1]; 
          $test_method_name=$splitted_receiving_date_individual[2]; 
          $test_method_id=$splitted_receiving_date_individual[3]; 
          $test_name_for_use=$splitted_receiving_date_individual[4]; 
          $iso_or_aatcc=$splitted_receiving_date_individual[5]; 

               /* $splitting_test_name=explode(" ", $test_name);

				$test_name_in_single_word = "";

				for($i=0;$i<sizeof($splitting_test_name);$i++)
				{


					$test_name_in_single_word = $test_name_in_single_word."_".trim($splitting_test_name[$i]);

				}

				$test_name_for_use= substr($test_name_in_single_word,1,strlen($test_name_in_single_word));*/

          
		/*$insert_sql_statement="insert into `test_method_for_customer` ( `row_id`,`test_method_for_customer_id`,`customer_name`,`test_name`,`test_id`,`test_method_name`,`checking_field`,`recording_person_id`,`recording_person_name`,`recording_time` ) values ('$row_id','$current_test_method_for_customer_id','$customer_name','$splitted_receiving_date[$i]','$splitted_receiving_date[$i]','$splitted_receiving_date[$i]','$temp_test_method_name','$user_id','$user_name',NOW())";*/

		/*$insert_sql_statement="insert into `test_method_for_customer` ( `row_id`,`test_method_for_customer_id`,`customer_name`,`customer_id`,`test_name`,`test_name_for_use`,`test_id`,`test_method_id`,`test_method_name`,`checking_field`,`recording_person_id`,`recording_person_name`,`recording_time` ) values ('$row_id','$current_test_method_for_customer_id','$customer_name','$customer_id','$test_name','$test_name_for_use','$test_id','$test_method_id','$test_method_name','$temp_test_method_name','$user_id','$user_name',NOW())";*/

		$insert_sql_statement="insert into `test_method_for_customer` ( `row_id`,`test_method_for_customer_id`,`customer_name`,`customer_id`,`test_name`,`test_name_for_use`,`test_id`,`test_method_id`,`test_method_name`,`iso_or_aatcc`,`checking_field`,`recording_person_id`,`recording_person_name`,`recording_time` ) values ('$row_id','$current_test_method_for_customer_id','$customer_name','$customer_id','$test_name','$test_name_for_use','$test_id','$test_method_id','$test_method_name','$iso_or_aatcc','$temp_test_method_name','$user_id','$user_name',NOW())";

		

		mysqli_query($con,$insert_sql_statement) or die(mysqli_error($con));
       

		}

		if(mysqli_affected_rows($con)<>1)
		{
		
			$data_insertion_hampering = "Yes";
		
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
	echo "Data is successfully saved.";

}
else
{

	mysqli_query($con,"ROLLBACK");
	echo "Data is not successfully saved.";

}

$obj->disconnection();

?>
