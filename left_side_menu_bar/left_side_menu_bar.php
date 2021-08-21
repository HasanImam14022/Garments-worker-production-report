<?php
session_start();
require_once("login/db_session_chk.php");

$user_name=$_SESSION['user_name'];
$user_id=$_SESSION['user_id'];
$user_type=$_SESSION['user_type'];
$select_sql_for_user="SELECT `profile_picture` FROM `user_login` WHERE `user_name`='$user_name'";
$result= mysqli_query($con, $select_sql_for_user) or die(mysqli_error($con));
$row=mysqli_fetch_assoc($result);
?>

<style>
.sub_menu   /* This is for Sub Menu Button Styling */
{
	display:block;
	margin:1px;
	width:110%;
	
	background-color:#0C2D48; 
	color:#FFFFFF; 
	border-style: dotted;
	border-color: green; 
	margin-top:2px;

}


</style>
<div class="col-sm-3 col-md-3 col-lg-3" style="background-color:#0C2D48; height:100%; overflow:auto;">					
									
	<h3>
		<img src="img/ng_icon2.bmp" style="width: 30px; height:30px; margin-bottom: 4px; background: #ffffff;" class="img-circle"/>
		<span class="text-primary" style="color:#FFFFFF">Noman Group</span>
	</h3>
								
	<!-- <img src="img/8571-1.JPG" style="width: 30px; height:30px; margin-bottom: 4px; background: #ffffff;" class="img-circle" alt="100x100"> -->
	<img src="img/<?php echo $row['profile_picture'] ?>" alt="..." class="img-circle profile_img" style="width: 30px; height:30px; margin-bottom: 4px; background: #ffffff;">

	<span class="text-primary" style="color:#FFFFFF; margin-left:5px;">Welcome, <?php echo $user_name?></span>

<!-- Add All Your Left Side Menu=>Submenu From Here in Accordion Menu -->
									
	<div id="accordion" class="accordion_menu">
		<h3 style="font-size: 13px; color:#FFFFFF; background:none;"><span class="glyphicon glyphicon-user"></span>&nbsp;User </h3>
		<div style="padding-left:7px;">
			<button class="sub_menu panel text-left" onClick="load_page('user/user_info.php')"><span style="font-size: 11px;">Create User</span></button>
			<button class="sub_menu panel text-left" onClick="load_page('user/user_list.php')"><span style="font-size: 11px;">User List</span></button>
			<button class="sub_menu panel text-left" onClick="load_page('user/department_info.php')"><span style="font-size: 11px;">Department Info</span></button>
		</div>
		<h3 style="font-size: 13px; color:#FFFFFF; background:none;">Settings</h3>
		<div style="padding-left:7px;">
			<button class="sub_menu panel text-left" onClick="load_page('settings/key_account_manager.php')"><span style="font-size: 11px;">Add key Account Manager</span></button>
			<button class="sub_menu panel text-left" onClick="load_page('settings/customer.php')"><span style="font-size: 11px;">Add Customer</span></button>
			<button class="sub_menu panel text-left" onClick="load_page('settings/process_technique_or_program_type.php')"><span style="font-size: 11px;">Add Process Technique</span></button>
			<button class="sub_menu panel text-left" onClick="load_page('settings/color.php')"><span style="font-size: 11px;">Add Color Name</span></button>
			<button class="sub_menu panel text-left" onClick="load_page('settings/process_name.php')"><span style="font-size: 11px;">Add Process Name</span></button>
			<button class="sub_menu panel text-left" onClick="load_page('settings/machine_name.php')"><span style="font-size: 11px;">Add Machine Name</span></button>
			<button class="sub_menu panel text-left" onClick="load_page('settings/test_name.php')"><span style="font-size: 11px;">Add Test Name</span></button>
			<button class="sub_menu panel text-left" onClick="load_page('settings/test_method_name.php')"><span style="font-size: 11px;">Add Test Method Name</span></button>
			<button class="sub_menu panel text-left" onClick="load_page('settings/test_method_for_customer.php')"><span style="font-size: 11px;">Add Test Method for Customer</span></button>
			<button class="sub_menu panel text-left" onClick="load_page('settings/version_name.php')"><span style="font-size: 11px;">Add Version of PP</span></button>
			<button class="sub_menu panel text-left" onClick="load_page('settings/construction_for_version.php')"><span style="font-size: 11px;">Add Construction for Version</span></button>
			
		</div>
		<h3 style="font-size: 13px; color:#FFFFFF; background:none;">Process Program</h3>
		<div style="padding-left:7px;">
		<button class="sub_menu panel text-left" onClick="load_page('process_program/process_program_info.php')"><span style="font-size: 11px;">PP Creation</span></button>
		<button class="sub_menu panel text-left" onClick="load_page('process_program/pp_wise_version_creation_info.php')"><span style="font-size: 11px;">PP Wise Version Creation</span></button>
		<button class="sub_menu panel text-left" onClick="load_page('process_program/version_wise_process_info.php')"><span style="font-size: 11px;">Adding Process to Version</span></button>
		<button class="sub_menu panel text-left" onClick="load_page('process_program/quickly_defining_qc_standard_for_individual_process.php')"><span style="font-size: 11px;">Quickly Defining Qc Standard for Individual Process</span></button>

		<button class="sub_menu panel text-left" onClick="load_page('copy_process_program/copy_for_defining_qc_standard_for_individual_process.php')"><span style="font-size: 11px;">Copy From Existing Process</span></button>
		<!-- <button class="sub_menu panel text-left" onClick="load_page('process_program/version_wise_process_info_first.php')"><span style="font-size: 11px;">Adding Process to Version</span></button> -->
		<button class="sub_menu panel text-left" onClick="load_page('process_program/defining_qc_standard_for_greige_receiving_process.php')"><span style="font-size: 10px;">Defining QC Standard for Greige Receiving Process</span></button>
		<button class="sub_menu panel text-left" onClick="load_page('process_program/defining_qc_standard_for_singe_and_desize_process.php')"><span style="font-size: 10px;">Defining QC Standard for Singe and Desize  Process</span></button>
		<!-- <button class="sub_menu panel text-left" onClick="load_page('process_program/defining_qc_standard_for_steaming_process.php')"><span style="font-size: 11px;">Defining QC Standard for Steaming  Process</span></button>
 -->
		<button class="sub_menu panel text-left" onClick="load_page('process_program/defining_qc_standard_for_scouring_bleaching_process.php')"><span style="font-size: 11px;">Defining QC for Scouring Bleaching Process</span></button>
		<button class="sub_menu panel text-left" onClick="load_page('process_program/defining_qc_standard_for_scouring_process.php')"><span style="font-size: 11px;">Defining QC for Scouring Process</span></button>
		<!-- <button class="sub_menu panel text-left" onClick="load_page('process_program/defining_qc_standard_for_equalize_process.php')"><span style="font-size: 11px;">Defining QC Standard for Equalize Process</span></button> -->
		<button class="sub_menu panel text-left" onClick="load_page('process_program/defining_qc_standard_for_sanforizing_process.php')"><span style="font-size: 10px;">Defining QC Standard for Sanforize Process</span></button>
		<button class="sub_menu panel text-left" onClick="load_page('process_program/defining_qc_standard_for_ready_for_printing_process.php')"><span style="font-size: 10px;">Defining QC Standard for Ready for Printing Process</span></button>
		<button class="sub_menu panel text-left" onClick="load_page('process_program/defining_qc_standard_for_printing_process.php')"><span style="font-size: 10px;">Defining QC Standard for Printing Process</span></button>
		<button class="sub_menu panel text-left" onClick="load_page('process_program/defining_qc_standard_for_curing_process.php')"><span style="font-size: 10px;">Defining QC Standard for Curing Process</span></button>
		<button class="sub_menu panel text-left" onClick="load_page('process_program/defining_qc_standard_for_ready_for_raising_process.php')"><span style="font-size: 10px;">Defining QC Standard for Raedy for Raising Process</span></button>
		<button class="sub_menu panel text-left" onClick="load_page('process_program/defining_qc_standard_for_raising_process.php')"><span style="font-size: 11px;">Defining QC Standard for Raising Process</span></button>
		<button class="sub_menu panel text-left" onClick="load_page('process_program/defining_qc_standard_for_ready_for_mercerize_process.php')"><span style="font-size: 11px;">Defining QC Ready for Mercerize Process</span></button>
		<button class="sub_menu panel text-left" onClick="load_page('process_program/defining_qc_standard_for_mercerize_proces.php')"><span style="font-size: 11px;">Defining QC for Mercerize Process</span></button>
		<button class="sub_menu panel text-left" onClick="load_page('process_program/defining_qc_standard_for_washing_process.php')"><span style="font-size: 11px;">Defining QC for Washing Process</span></button>
		
		
		<button class="sub_menu panel text-left" onClick="load_page('process_program/defining_qc_standard_for_bleaching_process.php')"><span style="font-size: 11px;">Defining QC for Bleaching Process</span></button>
		<button class="sub_menu panel text-left" onClick="load_page('process_program/defining_qc_standard_for_calendering_process.php')"><span style="font-size: 11px;">Defining QC for Calendering Process</span></button>
		<button class="sub_menu panel text-left" onClick="load_page('process_program/defining_qc_standard_for_ready_for_dying_process.php')"><span style="font-size: 11px;">Defining QC Ready for Dying Process</span></button>
		<!-- <button class="sub_menu panel text-left" onClick="load_page('process_program/defining_qc_standard_for_finishing_process_old.php')"><span style="font-size: 11px;">Defining QC for Finishing Process</span></button> -->
		<button class="sub_menu panel text-left" onClick="load_page('process_program/defining_qc_standard_for_finishing_process.php')"><span style="font-size: 11px;">Defining QC for Finishing Process</span></button>
		
		</div>


		<h3 style="font-size: 13px; color:#FFFFFF; background:none;">Greige Receiving</h3>
		<div style="padding-left:7px;">
			<!-- <button class="sub_menu panel text-left" onClick="load_page('greige_receiving/greige_receiving.php')"><span style="font-size: 11px;">Version Wise Greige Receiving</span></button> -->
		</div>

		<h3 style="font-size: 13px; color:#FFFFFF; background:none;">Sample & Test Result</h3>
		<div style="padding-left:7px;">
			<button class="sub_menu panel text-left" onClick="load_page('trf/trf_info.php')"><span style="font-size: 11px;">TRF</span></button>
			<button class="sub_menu panel text-left" onClick="load_page('trf/partial_test/partial_test_info.php')"><span style="font-size: 11px;">Partial Test</span></button>
		</div>


	   <h3 style="font-size: 11px; color:#FFFFFF; background:none;">Process QC Result/PP Wise Process QC Result</h3>
		<div style="padding-left:7px;">	
			<!-- <button class="sub_menu panel text-left" onClick="load_page('settings/bootstrap_site_making.php')"><span style="font-size: 11px;">Add/Edit Process QC Result(PP Wise Process QC Result)</span></button> -->
			
           <!-- <button class="sub_menu panel text-left" onClick="load_page('process_qc_result/qc_result_for_singe_and_desize_process.php')"><span style="font-size: 11px;">QC Result for Singe and Desize Process</span></button>
           <button class="sub_menu panel text-left" onClick="load_page('process_qc_result/qc_result_for_sanforizing_process.php')"><span style="font-size: 11px;">QC Result for Sanforizing Process</span></button>
           <button class="sub_menu panel text-left" onClick="load_page('process_qc_result/qc_result_for_steaming_process.php')"><span style="font-size: 11px;">QC Result for Steaming Process</span></button>

           <button class="sub_menu panel text-left" onClick="load_page('process_qc_result/qc_result_for_ready_for_raising_process.php')"><span style="font-size: 11px;">QC Result for Ready For Raising Process</span></button>
           <button class="sub_menu panel text-left" onClick="load_page('process_qc_result/qc_result_for_raising_process.php')"><span style="font-size: 11px;">QC Result for Raising Process</span></button>

           <button class="sub_menu panel text-left" onClick="load_page('process_qc_result/qc_result_for_ready_for_mercerize_process.php')"><span style="font-size: 11px;">QC Result for Ready For Mercerize Process</span></button>
           <button class="sub_menu panel text-left" onClick="load_page('process_qc_result/qc_result_for_mercerize_process.php')"><span style="font-size: 11px;">QC Result for Mercerize Process</span></button>
           <button class="sub_menu panel text-left" onClick="load_page('process_qc_result/qc_result_for_bleaching_process.php')"><span style="font-size: 11px;">QC Result for Bleaching Process</span></button>
           <button class="sub_menu panel text-left" onClick="load_page('process_qc_result/qc_result_for_curing_process.php')"><span style="font-size: 11px;">QC Result for Curing Process</span></button>
           <button class="sub_menu panel text-left" onClick="load_page('process_qc_result/qc_result_for_calendering_process.php')"><span style="font-size: 11px;">QC Result for Calendering Process</span></button>
           <button class="sub_menu panel text-left" onClick="load_page('process_qc_result/qc_result_for_washing_process.php')"><span style="font-size: 11px;">QC Result for Washing Process</span></button>
            <button class="sub_menu panel text-left" onClick="load_page('process_qc_result/qc_result_for_scouring_process.php')"><span style="font-size: 11px;">QC Result for Scouring Process</span></button>
            <button class="sub_menu panel text-left" onClick="load_page('process_qc_result/qc_result_for_scouring_bleaching_process.php')"><span style="font-size: 11px;">QC Result for Scouring Bleaching Process</span></button>
           <button class="sub_menu panel text-left" onClick="load_page('process_qc_result/qc_result_for_printing_process.php')"><span style="font-size: 11px;">QC Result for  Printing Process</span></button>
           <button class="sub_menu panel text-left" onClick="load_page('process_qc_result/qc_result_for_ready_for_printing_process.php')"><span style="font-size: 11px;">QC Result for Ready for Printing Process</span></button>
           <button class="sub_menu panel text-left" onClick="load_page('process_qc_result/qc_result_for_ready_for_dying_process.php')"><span style="font-size: 11px;">QC Result for Ready for Dying Process</span></button>
           <button class="sub_menu panel text-left" onClick="load_page('process_qc_result/qc_result_for_equalize_process.php')"><span style="font-size: 11px;">QC Result for Equalize Process</span></button>
           <button class="sub_menu panel text-left" onClick="load_page('process_qc_result/qc_result_for_finishing_process.php')"><span style="font-size: 11px;">QC Result for Finishing Process</span></button> -->
			<
		</div>	

		<h3 style="font-size: 13px; color:#FFFFFF; background:none;">Report</h3>
		<div style="padding-left:7px;">
			<button class="sub_menu panel text-left" onClick="load_page('settings/checkbox_handling.php')"><span style="font-size: 11px;">PP Wise Report</span></button>
		</div>	

	</div> <!-- End of <div id="accordion"> -->
</div> <!--End of <div class="col-sm-3 col-md-3 col-lg-3" style="background-color:#add8e6; height:100%;"> -->
                
		