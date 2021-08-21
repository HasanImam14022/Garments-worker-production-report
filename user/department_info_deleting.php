<?php
session_start();
require_once("../login/session.php");
include('../login/db_connection_class.php');
$obj = new DB_Connection_Class();
$obj->connection();



$data_previously_saved = "No";
$data_deleteion_hampering = "No";


$id=$_GET['department_id'];


mysqli_query($con,"BEGIN");
mysqli_query($con,"START TRANSACTION") or die(mysqli_error());



	$delete_sql_statement="DELETE FROM `department_info` WHERE `id`='$id'";

	$result = mysqli_query($con,$delete_sql_statement) or die(mysqli_error());

	if(mysqli_affected_rows($con)<>1)
	{
	
		$data_deleteion_hampering = "Yes";
	
	}

if($data_deleteion_hampering == "No" )
{

	mysqli_query($con,"COMMIT");
	echo "Department Info is successfully Deleted.";


}
else
{

	mysqli_query($con,"ROLLBACK");
	echo "Department Info is not successfully Deleted.";

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
