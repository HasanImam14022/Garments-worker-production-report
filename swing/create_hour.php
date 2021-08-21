<?php
session_start();
require_once("../login/session.php");
include('../login/db_connection_class.php');
$obj = new DB_Connection_Class();
$obj->connection();


$user_id = $_SESSION['user_id'];
$password = $_SESSION['password'];
$user_name = $_SESSION['user_name'];




$buyer_name=$_POST['buyer_name'];
//$alternate_pp_creation_date=$_POST['alternate_pp_creation_date'];

$alternate_pp_creation_date= $_POST['pp_creation_date'];
$splitted_pp_creation_date= explode("/",$alternate_pp_creation_date);
$alternate_pp_creation_date= $splitted_pp_creation_date[2]."-".$splitted_pp_creation_date[1]."-".$splitted_pp_creation_date[0];

//$line_number_of_day=$_POST['line_number_of_day'];
$style_of_day=$_POST['style_of_day'];
$color_of_day=$_POST['color_of_day'];
$line_number_of_hour=$_POST['line_number_of_hour'];
$garments=$_POST['garments'];


$data_sql = "select * from swing_production_info where buyer_id='".$buyer_name."'
and
style_name_id='".$style_of_day."'
and
color_id='".$color_of_day."'
";

$result = mysqli_query($con, $data_sql);
while($row=mysqli_fetch_array($result))
{
    $id=$row['id'];
    $line_id=$row['line_id'];

    $sql_hour = "select count(hour) as count_hour ,hour as hour from
    swing_production_per_hour where
    swing_production_info_id='".$id."' and hour='".$line_number_of_hour."'
    ";

    $res=mysqli_query($con,$sql_hour);
    while ($row_res=mysqli_fetch_array($res)) {

      $count_hour=$row_res['count_hour'];
      $hour=$row_res['hour'];
    }
    if ($count_hour>0) {
      // code...
        echo "Hour ".$hour." already entered";
    }
    else {
      // code...


         $recording_time= date("F j, Y, g:i a");

          $sql = "INSERT INTO `swing_production_per_hour`
          (`swing_production_info_id`, `production_date`, `line_id`,`hour`,`garments`,
          `recording_person_id`,`recording_person_name`)
          VALUES ( '$id', '$alternate_pp_creation_date', '$line_id', '$line_number_of_hour','$garments'
          ,'$user_id','$user_name')";

          //mysqli_query( $conn, $sql ) or die("Error in Query: " . mysqli_error());
          if (mysqli_query($con, $sql))
          {
            echo "Saved successfully";
          }
    }


}


 ?>
