<?php
session_start();
include('../login/db_connection_class.php');
$obj = new DB_Connection_Class();
$obj->connection();
/*
$user_id = $_SESSION['user_id'];
$password = $_SESSION['password'];

$sql="select * from hrm_info.user_login where user_id='$user_id' and `password`='$password'";

$result=mysqli_query($con,$sql) or die(mysql_error());
if(mysql_num_rows($result)<1)
{

	header('Location:logout.php');

}
*/
 $customer_id=$_GET['customer_id'];

$sql = "SELECT * FROM customer WHERE customer_id = '$customer_id'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

?>
<script type='text/javascript' src='settings/test_method_for_customer_form_validation.js'></script>

<style>

.form-group		/* This is for reducing Gap among Form's Fields */
{

	margin-bottom: 5px;

}

</style>

<script>


</script>
<div class="col-sm-12 col-md-12 col-lg-12">

		<div class="panel panel-default"> <!-- This div will create a block/panel for FORM -->

				<div class="panel-heading" style="test_method_for_customer:#191970;"><b>Test Method For Customer</b></div> <!-- This will create a upper block for FORM (Just Beautification) -->


        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active" aria-current="page">Home</li>
              <li class="breadcrumb-item"><a onclick="load_page('settings/test_method_for_customer.php')">Add Test Method For Customer</a></li>
              <li class="breadcrumb-item"><a>View Test Method For Customer</a></li>
            </ol>
         </nav>



				<form class="form-horizontal" action="" style="margin-top:10px;" name="test_method_for_customer_view_form" id="test_method_for_customer_view_form">

						  <div class="form-group">
                   
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="customer">Customer Name<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="customer" readonly name="customer" value="<?php echo $row['customer_name'] ?>" class="form-control col-md-7 col-xs-12">
                    <input type="hidden" id="customer_id" name="customer_id" value="<?php echo $row['customer_id'] ?>">
                    <input type="hidden"  type="text" id="demo2" name="demo2" value="">



                 </div>

               </div>  <!-- end  <div class="form-group"> -->

            
          <div class="panel panel-default"> <!-- This div will create a block/panel for FORM -->


              <div class="form-group form-group-sm" id="form-group_for_test_method_name">
                <div class="col-sm-3">
                           <!-- For spacing -->
                </div>

                 <div class="col-sm-6">
                            <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <!-- <th>SI</th> -->
                                <th>Test Name</th>
                                <th>Test Method</th>
                               

                              </tr>
                             </thead>
                            
                            <tbody>


                              <?php                                
                                $s1 = 1;
                                $customer_name= $row['customer_name'] ;


                                $sql_for_test_method_for_customer = "SELECT * FROM test_method_for_customer";

                                $res_for_test_method_for_customer = mysqli_query($con, $sql_for_test_method_for_customer);

                                while ($row_test_method_for_customer = mysqli_fetch_assoc($res_for_test_method_for_customer)) 
                                {
                                    $test_method_for_customer_id=$row_test_method_for_customer['test_method_for_customer_id'];
                                    $sql_for_test_method = "SELECT * FROM `test_method_for_customer` WHERE `test_method_for_customer_id`='$test_method_for_customer_id' and `customer_name`='$customer_name'"; 

                                    
                                    $res_for_test_method = mysqli_query($con, $sql_for_test_method) or die(mysqli_error($con));
                                    $row_for_test_method = mysqli_fetch_assoc($res_for_test_method) ;
                                    if ($row_for_test_method >= 1) 
                                    {
                                        ?>
                                          <tr>
                                            <!-- <td><?php echo $s1; ?></td>  -->                               
                                            <td><?php echo $row_for_test_method['test_name'] ?></td>
                                            <td><?php echo $row_for_test_method['test_method_name'] ?></td>
                                            <!-- <td>
                                              <button type="submit" id="" name="" class="btn btn-primary btn-xs" onclick="load_page('settings/field_selection_for_test_method.php?customer_id=<?php echo $row_for_test_method['customer_id']."?fs?".$row_for_test_method['test_id'] ?>')"> Select Fields </button>
                                            </td> -->
                                          </tr>  
                                        <?php
                                    }
                                    ++$s1;
                               }

                              ?>
                              <?php

                              ?>

                            </tbody>
                          </table>



                              <!-- <button type="button" name="submit" id="submit" class="btn btn-success" onclick="selection12()">ADD</button> -->
                          <!-- <p id="text" style="display:none">Checkbox is CHECKED!</p> -->

                          <?php 
                            
                            
                          /* echo "<p id='demo'></p>";*/


                          ?> 
                     </div>  <!-- end of <div class="form-group">> -->
               </div>  <!-- End of   <div class="panel panel-default">  -->

                      <script>
                            $(document).ready(function() {
                          $('#datatable-buttons').DataTable( {
                              initComplete: function () {
                                  this.api().columns().every( function () {
                                      var column = this;
                                      var select = $('<select><option value=""></option></select>')
                                          .appendTo( $(column.footer()).empty() )
                                          .on( 'change', function () {
                                              var val = $.fn.dataTable.util.escapeRegex(
                                                  $(this).val()
                                              );
                       
                                              column
                                                  .search( val ? '^'+val+'$' : '', true, false )
                                                  .draw();
                                          } );
                       
                                      column.data().unique().sort().each( function ( d, j ) {
                                          select.append( '<option value="'+d+'">'+d+'</option>' )
                                      } );
                                  } );
                              }
                           } );
                        } );
                   </script>

                  </div>  <!-- end of  <div class="form-group form-group-sm" id="form-group_for_test_method_name"> -->
				</form> <!--  end of <form class="form-horizontal" action="" style="margin-top:10px;" name="test_method_for_customer_view_form" id="test_method_for_customer_view_form"> -->

		</div> <!-- End of <div class="panel panel-default"> -->

</div> <!-- End of <div class="col-sm-12 col-md-12 col-lg-12"> -->