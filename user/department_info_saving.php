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

$location= $_POST['location'];
$department_name= $_POST['department_name'];
$section_name= $_POST['section_name'];
$contact_person_name= $_POST['contact_person_name'];
$contact_no= $_POST['contact_no'];
$email= $_POST['email'];

mysqli_query($con,"BEGIN");
mysqli_query($con,"START TRANSACTION") or die(mysqli_error());

$select_sql_for_duplicacy="select * from `department_info` where `location`='$location' and `department_name`='$department_name' and `section_name`='$section_name' and `contact_person_name`='$contact_person_name' and `contact_no`='$contact_no' and `email`='$email'";

$result = mysqli_query($con,$select_sql_for_duplicacy) or die(mysqli_error());

if(mysqli_num_rows($result)>0)
{

	$data_previously_saved="Yes";

}
else if( mysqli_num_rows($result) < 1)
{


	$insert_sql_statement="insert into `department_info` ( `location`,`department_name`,`section_name`,`contact_person_name`,`contact_no`,`email`,`recording_person_id`,`recording_person_name`,`recording_time` ) values ('$location','$department_name','$section_name','$contact_person_name','$contact_no','$email','$user_id','$user_name',NOW())";

	$result = mysqli_query($con,$insert_sql_statement) or die(mysqli_error());

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

if($result)
{
    //echo json_encode(array("statusCode"=>200));
    ?>
	 <div class="form-group form-group-sm">
         <table id="datatable-buttons" class="table table-striped table-bordered">

             

		 <thead>
                 <tr>
                 <th>SI</th>
                 <th>Department Name</th>
                 <th>Location</th>
                 <th>Section Name</th>
                 <th>Contact Person</th>
                 <th>Contact Number</th>
                 <th>Action</th>
                 </tr>
            </thead>
            <tbody>
            <?php 
				$s1 = 1;
				$sql_for_department = "SELECT * FROM department_info ORDER BY id ASC";

				$res_for_department = mysqli_query($con, $sql_for_department);

				while ($row = mysqli_fetch_assoc($res_for_department)) 
				{
             ?>

             <tr>
                <td><?php echo $s1; ?></td>
                <td><?php echo $row['department_name']; ?></td>
                <td><?php echo $row['location']; ?></td>
                <td><?php echo $row['section_name']; ?></td>
                <td><?php echo $row['contact_person_name']; ?></td>
                <td><?php echo $row['contact_no']; ?></td>
                <td>
                      
                        
                        <button type="submit" id="edit_department" name="edit_department"  class="btn btn-primary btn-xs" onclick="load_page('user/edit_department_info.php?department_id=<?php echo $row['id'] ?>')"> Edit </button>
                       <span>  </span>
              
                         <button type="submit" id="delete_department" name="delete_department"  class="btn btn-danger btn-xs" onclick="load_page('user/department_info_deleting.php?department_id=<?php echo $row['id'] ?>')"> Delete </button>
                 </td>
                <?php
                              
                $s1++;
                }
                 ?> 
             </tr>
            </tbody>
            

         </table>
	 </div>
     <?php
}
else
{
    //echo json_encode(array("statusCode"=>201));
}

$obj->disconnection();

?>
