
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
?>
<script type='text/javascript' src='settings/test_method_for_customer_form_validation.js'></script>

<style>

.form-group   /* This is for reducing Gap among Form's Fields */
{

  margin-bottom: 5px;

}

</style>

<script>

function change_up_down_arrow_icon_1(icon_lcation)
{
  
  
  //alert(icon_lcation);
  var class_name = $('#'+icon_lcation).attr('class');
    //alert(class_name);
  if(class_name=="glyphicon glyphicon-chevron-up text-right")
  {
    $('#'+icon_lcation).removeClass();
    $('#'+icon_lcation).addClass("glyphicon glyphicon-chevron-down text-right");
  }
  else
  {
    $('#'+icon_lcation).removeClass();
    $('#'+icon_lcation).addClass("glyphicon glyphicon-chevron-up text-right");
    
  }
  
  
} // End of function change_up_down_arrow_icon_1(icon_lcation)

function Remove_Value_Of_This_Element(element_name)
{

   document.getElementById(element_name).value='';
   var alternate_field_of_date = "alternate_"+element_name;

   if(typeof(alternate_field_of_date) != 'undefined' && alternate_field_of_date != null) // This is for deleting Alternative Field of Date if exists
   {
    document.getElementById(alternate_field_of_date).value='';
   }

}

function Reset_Radio_Button(radio_element)
{

    var radio_btn = document.getElementsByName(radio_element);
    for(var i=0;i<radio_btn.length;i++) 
    {
        radio_btn[i].checked = false;
    }


}

function Reset_Checkbox(checkbox_element)
{
    for(var i=0;i<checkbox_element.length;i++)
    {

        checkbox_element[i].checked = false;

    }
}
</script>



<div class="col-sm-12 col-md-12 col-lg-12">

   <div class="panel panel-default">
     <div class="row" data-toggle="collapse" data-target="#search_form_collpapsible_div_1" onClick="change_up_down_arrow_icon_1(this.childNodes[5].childNodes[1].id)">
                         

                       <div align="right" style="padding-right:13px;" id='test'> <i class="glyphicon glyphicon-chevron-up text-right"  id='panel_heading_icon_1'></i>
                      </div>


    </div>   <!-- End of <div class="row" data-toggle="collapse" data-target="#search_form_collpapsible_div" > -->

    <div id='search_form_collpapsible_div_1' class="collapse in"> <!-- For Making Collapsible Section -->

            
                  <div class="form-group form-group-sm">
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Home</li>
                        <li class="breadcrumb-item"><a onclick="load_page('settings/test_method_for_customer.php')">Add Test Method For Customer</a></li>
                        <li class="breadcrumb-item"><a >Customer List</a></li>
                      </ol>
                    </nav>
                  </div>

                 <div class="form-group form-group-sm">
                     <label class="control-label col-sm-5" for="search">Customer List</label>
                 </div> <!-- End of <div class="form-group form-group-sm" -->

             

                  <div class="form-group form-group-sm">
                          <table id="datatable-buttons-for-customer" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th>SI</th>
                                <th>Customer Name</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            
                            <tbody>
                              <?php 
                                $s1 = 1;
                                $sql_for_customers = "SELECT * FROM customer";

                                $res_for_customers = mysqli_query($con, $sql_for_customers);

                                while ($row_for_customer= mysqli_fetch_assoc($res_for_customers)) 
                                {
                              ?>
                              <tr>
                                <td><?php echo $s1; ?></td>
                                <td><?php echo $row_for_customer['customer_name'] ?></td>
                                <td>

                              
                                  <!--  <button type="submit" id="" name="" class="btn btn-primary btn-xs" onclick="load_page('settings/field_selection_for_test_method.php?customer_id=<?php echo $row_for_customer['customer_id'] ?>')"> Select Fields </button> -->


                                  <button type="submit" id="" name=""  class="btn btn-primary btn-xs" onclick="load_page('settings/test_method_for_customer_view.php?customer_id=<?php echo $row_for_customer['customer_id'] ?>')"> View Selected Test Method </button>

                                  <button type="submit" id="" name=""  class="btn btn-success btn-xs" onclick="load_page('settings/edit_test_method_for_customer.php?customer_id=<?php echo $row_for_customer['customer_id'] ?>')"> Edit</button>


                                
                                </td>
                              </tr>
                              <?php 
                                ++$s1;
                               }
                              ?>
                            </tbody>
                          </table>
                     </div> <!-- End of <div class="form-group form-group-sm" -->


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
              

     </div>  <!--  END of div id='search_form_collpapsible_div_1' class="collapse in"> --> 

  </div><!-- End of <div class="panel panel-default"> -->

    
			

</div> <!-- End of <div class="col-sm-12 col-md-12 col-lg-12"> -->