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

<script>
 function sending_data_of_test_method_for_customer_form_for_saving_in_database()
 {


       var validate = Form_Validation();
       var url_encoded_form_data = $("#test_method_for_customer_form").serialize(); //This will read all control elements value of the form 
       if(validate != false)
     {


         $.ajax({
          url: 'settings/test_method_for_customer_saving.php',
          dataType: 'text',
          type: 'post',
          contentType: 'application/x-www-form-urlencoded',
          data: url_encoded_form_data,
          success: function( data, textStatus, jQxhr )
          {
              alert(data);
          },
          error: function( jqXhr, textStatus, errorThrown )
          {
              //console.log( errorThrown );
              alert(errorThrown);
          }
       }); // End of $.ajax({

       }//End of if(validate != false)

 }//End of function sending_data_of_test_method_for_customer_form_for_saving_in_database()

/***************************************************** FOR AUTO COMPLETE********************************************************************/

$('.test_method_for_customer').chosen();


/***************************************************** FOR AUTO COMPLETE********************************************************************/
  

</script>


<div class="col-sm-12 col-md-12 col-lg-12">

  

    <div class="panel panel-default"> <!-- This div will create a block/panel for FORM -->

        <div class="panel-heading" style="customer:#191970;"><b>Test Method For Customer</b></div> <!-- This will create a upper block for FORM (Just Beautification) -->

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active" aria-current="page">Home</li>
              <li class="breadcrumb-item"><a onclick="load_page('settings/test_method_for_customer.php')">Add Test Method For Customer</a></li>
            </ol>
         </nav>



        <form class="form-horizontal" action="" style="margin-top:10px;" name="test_method_for_customer_form" id="test_method_for_customer_form">

          <div class="form-group form-group-sm" id="form-group_for_customer_name">
            <label class="control-label col-sm-3" for="customer_name" style="margin-right:0px; customer:#00008B;">Customer Name:</label>
              <div class="col-sm-4">
                  <select  class="form-control test_method_for_customer" id="customer_name" name="customer_name">
                      <option select="selected" value="select">Select Customer Name</option>
                      <?php 
                         $sql = 'select * from `customer` order by `customer_name`';
                         $result= mysqli_query($con,$sql) or die(mysql_error());
                         while( $row = mysqli_fetch_array( $result))
                         {

                           echo '<option value="'.$row['customer_name']."?fs?".$row['customer_id'].'">'.$row['customer_name'].'</option>';

                         }

                       ?>
                   </select>

                 </div>
                 
              
      
                 <div class="col-sm-2">
                   <!-- onclick="load_page('settings/test_method_for_customer_view.php?customer_id=<?php echo $customer_view_row['customer_id'] ?>')"  -->
                 <button type="reset" class="btn btn-success" onclick="load_page('settings/test_method_for_customer_list.php')"   >Show Test MEthod For Customer List</button>
                 </div>

            </div>  <!-- end of <div class="form-group form-group-sm" id="form-group_for_customer_name"> -->
                            <br> 
                   
                         
                             <br>

            <div class="panel panel-default">

                          <div class="form-group form-group-sm">
                          

                            <label class="col-sm-offset-7 control-label col-sm-1" for="search">Search</label>

                            <div class="col-sm-4">
                               <input type="text" id="my_input" class="form-control " onkeyup="my_function()" placeholder="Please Type Test Name Keyword">
                             </div>

                        </div> <!-- End of <div class="form-group form-group-sm" -->
                        <div class="form-group form-group-sm" id="form-group_for_test_method_name">


                          <div class="col-sm-3">
                           <!-- For spacing -->
                           </div>
                          <div class="col-sm-6">
                            <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th>Test Names</th>
                                <th>Test Method</th>
                                <th>Selection</th>

                              </tr>
                            </thead>
                            
                            <tbody>
                              <?php                                
                                $s1 = 1;
                                $customer_name_check= $row['customer_name'] ;
                                $sql_for_test_method_name = "SELECT * FROM test_method_name";
                                $res_for_test_method_name = mysqli_query($con, $sql_for_test_method_name);

                                while ($row = mysqli_fetch_assoc($res_for_test_method_name)) 
                                {
                              ?>
                              <tr>
                                                             
                                <td><?php echo $row['test_name'] ?></td>
                                <td><?php echo $row['test_method_name'] ?></td>

                                <td> <input id="test_method_name" class="form-check-input" type="checkbox"  name="test_method_name[]" value="<?php echo $row['test_id'].'fs'.$row['test_name'].'fs'.$row['test_method_name'].'fs'.$row['test_method_id'].'fs'.$row['test_name_and_method_for_process_id'].'fs'.$row['iso_or_aatcc'];?>" 

                                  <?php     
                                    $test_method_name=$row['test_method_name'];
                                    

                                   $sql_for_duplicate = "SELECT * FROM `test_method_for_customer` WHERE `test_method_name`='$test_method_name' and `customer_name`='$customer_name_check' "; 
                                    $res_for_duplicate = mysqli_query($con, $sql_for_duplicate);
                                    $row_for_duplicate = mysqli_num_rows($res_for_duplicate);

                                       if ($row_for_duplicate >= 1) 
                                        {
                                          echo "checked='checked'";
                                    

                                        }
                                        else{
                                         
                                        }

                                   ?>
                                   >
                                   
                                </td> 
                                  
                                 
                              </tr>
                              <?php 
                                ++$s1;
                               }

                              ?>
                              
                            </tbody>
                          </table>
                        </div> <!-- End of <div class="col-sm-6"> -->
            </div>  <!-- End of <div class="form-group form-group-sm" id="form-group_for_test_method_name"> -->
          </div> <!-- end of  <div class="panel panel-default">   -->
          <script>
                function my_function() {
                  var input, filter, table, tr, td, i, txtValue;
                  input = document.getElementById("my_input");
                  filter = input.value.toUpperCase();
                  table = document.getElementById("datatable-buttons");
                  tr = table.getElementsByTagName("tr");
                  for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[0];
                    if (td) {
                      txtValue = td.textContent || td.innerText;
                      if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                      } else {
                        tr[i].style.display = "none";
                      }
                    }       
                  }
                }
       </script>
          

            <!-- <div class="form-group form-group-sm" id="form-group_for_test_method_name"> -->
            
                <!-- <input type="checkbox" class="form-check-input"  value="ISO-1044" id="test_method_name" name="test_method_name[]">
                <label class="form-check-label control-label" for="test_method_name" style="margin-right:15px;">ISO-1044</label>
                <input type="checkbox" class="form-check-input"  value="ISO 105 X12" id="test_method_name" name="test_method_name[]">
                <label class="form-check-label control-label" for="test_method_name" style="margin-right:15px;">ISO 105 X12</label>
                <input type="checkbox" class="form-check-input"  value="ISO-1456" id="test_method_name" name="test_method_name[]">
                <label class="form-check-label control-label" for="test_method_name" style="margin-right:15px;">ISO-1456</label>
                <i class="glyphicon glyphicon-remove" onclick="Reset_Checkbox(document.test_method_for_customer_form.test_method_name)"></i> -->

            
            
            <div class="form-group form-group-sm">
                <div class="col-sm-offset-3 col-sm-5">
                  <button type="button" class="btn btn-primary" onClick="sending_data_of_test_method_for_customer_form_for_saving_in_database()">Submit</button>
                  <button type="reset" class="btn btn-success">Reset</button>
                  
                     </div>
              </div>

                        <br/>
          
                        <br/>


        </form>  <!-- End of <form class="form-horizontal" action="" style="margin-top:10px;" name="test_method_for_customer_form" id="test_method_for_customer_form"> -->

        
     </div>  <!--  end of <div class="form-group form-group-sm"> -->


</div> <!-- End of <div class="col-sm-12 col-md-12 col-lg-12"> -->