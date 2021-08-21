<?php
session_start();
require_once("login/db_session_chk.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Noman Group</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="jq-css/jquery-ui.css">
  <link rel="stylesheet" href="bs-css/bootstrap.min.css">
  <link rel="stylesheet" href="bs-css/dataTables.bootstrap.css">
  <link rel="stylesheet" href="fa-css/css/font-awesome.min.css">
  <link rel="stylesheet" href="bs-css/datatable.min.css">
  <link rel="stylesheet" href="bs-css/bootstrap-datetimepicker.css">
  <link rel="stylesheet" href="bs-css/bootstrap-datetimepicker.min.css">

  
  <script src="jq-js/jquery-3.5.1.min.js"></script>
  <script src="jq-js/jquery-ui.js"></script>
  <script src="jq-js/jquery.dataTable.min.js"></script>
  <script src="jq-js/html2pdf.bundle.min.js"></script>
  <script src="jq-js/jspdf.umd.min.js"></script>
  <script src="jq-js/jquery.table2excel.min.js"></script>

  <script src="jq-js/jszip.min.js"></script>
  <script src="jq-js/dataTables.buttons.min.js"></script>
  <script src="jq-js/pdfmake.min.js"></script>
  <script src="jq-js/vfs_fonts.js"></script>
  <script src="jq-js/buttons.html5.min.js"></script>
  <script src="jq-js/buttons.print.min.js"></script>
  
  
  <script src="bs-js/bootstrap.min.js"></script> <!-- for bootstrap -->
  <script src="bs-js/datatable.min.js"></script> <!-- for data table -->
  <script src="bs-js/datatable.fixedHeader.min.js"></script> <!-- for 
  data table -->
  <script src="bs-js/ddtf.js"></script> <!-- for data table -->
  
  <script src="js_barcode/js_barcode.all.min.js"></script> <!-- for barcode -->
  <!-- <script src="bs-js/datatables.fixedcolumns.min.js"></script> --> <!-- for data table -->

<!-- For Date -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<!--   <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


<!--   For AUTOCOMPLETE -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css">
 
 <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>





  <!-- This section is for jQuery Autocomplete Select/Combobox -->  
  
<!--   
  <link rel="stylesheet" href="autocomplete_combobox/style.css">
  <link rel="stylesheet" href="autocomplete_combobox/jquery_combobox.css">
  <script src="autocomplete_combobox/jquery_combobox.js"></script>
-->

  <style>
  
		html, body 
		{
			height: 100%;
		}
	

		#accordion .ui-accordion-content /* Just to make Accordion content as transparent */
		{
			  background:none;

		}


  </style>
  
  <script>
  
	  $( function() 
	  {
			$("#accordion").accordion(
			{
					 heightStyle: "content", //another are heightStyle: "fill or auto",
					 collapsible: true
			}
			);
	  } 
	  );
	  
	  $( "#accordion" ).accordion( "option", "animate", 400 );
	  
  	 //});
	 $(".accordion_menu").css({"color":"#C8D7E1","color":"#fff"});
		
	  function load_page(page_to_be_loaded)
	  {
		$("#row_for_display_bar").empty();
		$("#row_for_display_bar").load(page_to_be_loaded);
	  }
	  
  </script>
</head>
<body>

<!-- <div class="container"> -->
    <div class="container-fluid" style="height:100%; overflow:scroll; background-color:#F8F8F8;"> <!-- .container-fluid for width: 100% across all viewport and device sizes. -->
          
		  <div class="row" style="height:100%;" id='single_row_for_whole_page'> <!-- Whole Screen has a single ROW  -->
        <!-- Start of Menu Area -->
				<?php
				
					require_once('left_side_menu_bar/left_side_menu_bar_with_user_access.php');
				
				?>	
				<!-- End of Menu Area -->

            	<!-- Start of Content Area -->
                <div id="area_of_content" class="col-sm-9 col-md-9 col-lg-9">
                 
					<?php
				
						require_once('content_area/top_bar.php');
						require_once('content_area/display_section.php');
						
					?>	

				</div>   <!-- End of <div id="area_of_content" class="col-sm-9 col-md-9 col-lg-9" > -->
				
                <!-- End of Content Area -->
				
          </div> <!-- End of <div class="row"> -->
		  
    </div> <!-- End of <div class="container-fluid" style="height:100%;">  -->
    
</body>
</html>
