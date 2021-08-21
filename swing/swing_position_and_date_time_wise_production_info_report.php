<?php
session_start();
require_once("../login/session.php");
include('../login/db_connection_class.php');
$obj = new DB_Connection_Class();
$obj->connection();

$po_number_value = $_POST['po_number'];
$line_number_value = $_POST['line_number'];
$swing_date_value = $_POST['swing_date'];

$orderdate = explode('/', $swing_date_value);

$month = $orderdate[0];
$day   = $orderdate[1];
$year  = $orderdate[2];

$swing_date = implode('-',$orderdate);

?>



	
<div class="form-group form-group-sm"  id="database_table">
        <table id="datatable-buttons" class="table table-striped table-bordered">
            <thead>
                <tr>
                <th>SI</th>
                <th>Line Number</th>
                <th>Position In Line</th>
                <th>Total Completed Product</th>
                </tr>
            </thead>
            <tbody>

                <?php 
                    $s1 = 1;
                    $sql_for_production = "SELECT * FROM `swing_line_and_position_wise_production_info`  where  `date` = '$swing_date' AND `po_number` = '$po_number_value' AND `line_number` = '$line_number_value'  ";

                    $result_production_report = mysqli_query($con, $sql_for_production);

                    while ($row = mysqli_fetch_array($result_production_report)) 
                    {
                ?>

                <tr>
                    <td width="45"><?php echo $s1; ?></td>

                        <td class="align-middle">
                            <input type="text" class="form-control" value="<?php echo $row['line_number']?>"  readonly>	
                        </td>

                        <td align="center">
                            <input type="text" class="form-control"  value="<?php echo $row['position_in_line']?>" readonly>
                        </td>

                        <td>
                            <input type="text" class="form-control"  value="<?php echo $row['total_completed_product']?>" readonly>
                        </td>
                    
                    <?php
                            
                    $s1++;
                    }
                ?> 
                </tr>
            </tbody>
        </table>
    </div>  	

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
