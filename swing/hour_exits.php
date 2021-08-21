<?php
session_start();
require_once("../login/session.php");
include('../login/db_connection_class.php');
$obj = new DB_Connection_Class();
$obj->connection();


$buyer_name=$_GET['buyer_name'];
$style_of_day=$_GET['style_of_day'];
$color_of_day=$_GET['color_of_day'];
$line_number_of_hour=$_GET['line_number_of_hour'];


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

  $sql = "select count(hour) as count_hour ,hour as hour from swing_production_per_hour where swing_production_info_id='".$id."' and hour='".$line_number_of_hour."'
  ";

  $res=mysqli_query($con,$sql);
  while ($row_res=mysqli_fetch_array($res)) {

    $count_hour=$row_res['count_hour'];
    $hour=$row_res['hour'];
  }
  if ($count_hour>0) {
    // code...
      echo "Hour ".$hour." already entered";
  }


}

?>
