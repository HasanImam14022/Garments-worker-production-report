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

<script>

	/********************User Menu*********************/
	function change_create_user_button_color() {
		

		$('#create_user_list').css('background', 'black');
		$('#user_list').css('background', 'none');
		$('#department_info').css('background', 'none');

		$('#key_account_manager').css('background', 'none');
		$('#add_customer').css('background', 'none');
		$('#add_process_technique').css('background', 'none');
		$('#add_color').css('background', 'none');

		$('#add_process_name').css('background', 'none');
		$('#add_trolley').css('background', 'none');
		$('#add_machine').css('background', 'none');
		$('#add_machine_owner').css('background', 'none');
		$('#add_test_name').css('background', 'none');
		$('#add_test_method_name').css('background', 'none');
		$('#add_test_method_for_customer').css('background', 'none');
		$('#add_version_of_pp').css('background', 'none');
		$('#add_construction').css('background', 'none');
		$('#add_pp_creation').css('background', 'none');
		$('#pp_wise_version_creation').css('background', 'none');
		$('#adding_process_to_version').css('background', 'none');
		$('#pp_monitoring').css('background', 'none');
		$('#partial_test_trf').css('background', 'none');
		$('#all_test_trf').css('background', 'none');
		$('#reprocess_trf').css('background', 'none');
		$('#partial_test_result').css('background', 'none');
		$('#all_test_result').css('background', 'none');
		$('#reprocess_all_test').css('background', 'none');
		$('#partial_test_report').css('background', 'none');
		$('#all_test_report').css('background', 'none');
		$('#customized_report').css('background', 'none');
		$('#pp_progress_report').css('background', 'none');
		$('#pp_status_report').css('background', 'none');


		load_page('user/user_info.php');
	}

	function change_create_button_color() {
		$('#create_user_list').css('background', 'none');
		$('#user_list').css('background', 'black');
		$('#department_info').css('background', 'none');

		$('#key_account_manager').css('background', 'none');
		$('#add_customer').css('background', 'none');
		$('#add_process_technique').css('background', 'none');
		$('#add_color').css('background', 'none');

		$('#add_process_name').css('background', 'none');
		$('#add_trolley').css('background', 'none');
		$('#add_machine').css('background', 'none');
		$('#add_machine_owner').css('background', 'none');
		$('#add_test_name').css('background', 'none');
		$('#add_test_method_name').css('background', 'none');
		$('#add_test_method_for_customer').css('background', 'none');
		$('#add_version_of_pp').css('background', 'none');
		$('#add_construction').css('background', 'none');
		$('#add_pp_creation').css('background', 'none');
		$('#pp_wise_version_creation').css('background', 'none');
		$('#adding_process_to_version').css('background', 'none');
		$('#pp_monitoring').css('background', 'none');
		$('#partial_test_trf').css('background', 'none');
		$('#all_test_trf').css('background', 'none');
		$('#reprocess_trf').css('background', 'none');
		$('#partial_test_result').css('background', 'none');
		$('#all_test_result').css('background', 'none');
		$('#reprocess_all_test').css('background', 'none');
		$('#partial_test_report').css('background', 'none');
		$('#all_test_report').css('background', 'none');
		$('#customized_report').css('background', 'none');
		$('#pp_progress_report').css('background', 'none');
		$('#pp_status_report').css('background', 'none');


		load_page('user/user_list.php');
	}

	function change_department_info_button_color() {
		$('#create_user_list').css('background', 'none');
		$('#user_list').css('background', 'none');
		$('#department_info').css('background', 'black');

		$('#key_account_manager').css('background', 'none');
		$('#add_customer').css('background', 'none');
		$('#add_process_technique').css('background', 'none');
		$('#add_color').css('background', 'none');

		$('#add_process_name').css('background', 'none');
		$('#add_trolley').css('background', 'none');
		$('#add_machine').css('background', 'none');
		$('#add_machine_owner').css('background', 'none');
		$('#add_test_name').css('background', 'none');
		$('#add_test_method_name').css('background', 'none');
		$('#add_test_method_for_customer').css('background', 'none');
		$('#add_version_of_pp').css('background', 'none');
		$('#add_construction').css('background', 'none');
		$('#add_pp_creation').css('background', 'none');
		$('#pp_wise_version_creation').css('background', 'none');
		$('#adding_process_to_version').css('background', 'none');
		$('#pp_monitoring').css('background', 'none');
		$('#partial_test_trf').css('background', 'none');
		$('#all_test_trf').css('background', 'none');
		$('#reprocess_trf').css('background', 'none');
		$('#partial_test_result').css('background', 'none');
		$('#all_test_result').css('background', 'none');
		$('#reprocess_all_test').css('background', 'none');
		$('#partial_test_report').css('background', 'none');
		$('#all_test_report').css('background', 'none');
		$('#customized_report').css('background', 'none');
		$('#pp_progress_report').css('background', 'none');
		$('#pp_status_report').css('background', 'none');


		load_page('user/department_info.php');
	}
	/********************Settings Menu*********************/
	function change_key_account_manager_button_color() {
		$('#create_user_list').css('background', 'none');
		$('#user_list').css('background', 'none');
		$('#department_info').css('background', 'none');

		$('#key_account_manager').css('background', 'black');
		$('#add_customer').css('background', 'none');
		$('#add_customer').css('background', 'none');
		$('#add_process_technique').css('background', 'none');
		$('#add_color').css('background', 'none');

		$('#add_process_name').css('background', 'none');
		$('#add_trolley').css('background', 'none');
		$('#add_machine').css('background', 'none');
		$('#add_machine_owner').css('background', 'none');
		$('#add_test_name').css('background', 'none');
		$('#add_test_method_name').css('background', 'none');
		$('#add_test_method_for_customer').css('background', 'none');
		$('#add_version_of_pp').css('background', 'none');
		$('#add_construction').css('background', 'none');
		$('#add_pp_creation').css('background', 'none');
		$('#pp_wise_version_creation').css('background', 'none');
		$('#adding_process_to_version').css('background', 'none');
		$('#pp_monitoring').css('background', 'none');
		$('#partial_test_trf').css('background', 'none');
		$('#all_test_trf').css('background', 'none');
		$('#reprocess_trf').css('background', 'none');
		$('#partial_test_result').css('background', 'none');
		$('#all_test_result').css('background', 'none');
		$('#reprocess_all_test').css('background', 'none');
		$('#partial_test_report').css('background', 'none');
		$('#all_test_report').css('background', 'none');
		$('#customized_report').css('background', 'none');
		$('#pp_progress_report').css('background', 'none');
		$('#pp_status_report').css('background', 'none');


		load_page('settings/key_account_manager.php');
	}

	function change_add_buyer_button_color() {
		$('#create_user_list').css('background', 'none');
		$('#user_list').css('background', 'none');
		$('#department_info').css('background', 'none');
		
		$('#key_account_manager').css('background', 'none');
		$('#add_customer').css('background', 'black');
		$('#add_process_technique').css('background', 'none');
		$('#add_color').css('background', 'none');

		$('#add_process_name').css('background', 'none');
		$('#add_trolley').css('background', 'none');
		$('#add_machine').css('background', 'none');
		$('#add_machine_owner').css('background', 'none');
		$('#add_test_name').css('background', 'none');
		$('#add_test_method_name').css('background', 'none');
		$('#add_test_method_for_customer').css('background', 'none');
		$('#add_version_of_pp').css('background', 'none');
		$('#add_construction').css('background', 'none');
		$('#add_pp_creation').css('background', 'none');
		$('#pp_wise_version_creation').css('background', 'none');
		$('#adding_process_to_version').css('background', 'none');
		$('#pp_monitoring').css('background', 'none');
		$('#partial_test_trf').css('background', 'none');
		$('#all_test_trf').css('background', 'none');
		$('#reprocess_trf').css('background', 'none');
		$('#partial_test_result').css('background', 'none');
		$('#all_test_result').css('background', 'none');
		$('#reprocess_all_test').css('background', 'none');
		$('#partial_test_report').css('background', 'none');
		$('#all_test_report').css('background', 'none');
		$('#customized_report').css('background', 'none');
		$('#pp_progress_report').css('background', 'none');
		$('#pp_status_report').css('background', 'none');


		load_page('settings/buyer.php');
	}
	function change_add_process_technique_button_color() {
		$('#create_user_list').css('background', 'none');
		$('#user_list').css('background', 'none');
		$('#department_info').css('background', 'none');
		
		$('#key_account_manager').css('background', 'none');
		$('#add_customer').css('background', 'none');
		$('#add_process_technique').css('background', 'black');
		$('#add_color').css('background', 'none');

		$('#add_process_name').css('background', 'none');
		$('#add_trolley').css('background', 'none');
		$('#add_machine').css('background', 'none');
		$('#add_machine_owner').css('background', 'none');
		$('#add_test_name').css('background', 'none');
		$('#add_test_method_name').css('background', 'none');
		$('#add_test_method_for_customer').css('background', 'none');
		$('#add_version_of_pp').css('background', 'none');
		$('#add_construction').css('background', 'none');
		$('#add_pp_creation').css('background', 'none');
		$('#pp_wise_version_creation').css('background', 'none');
		$('#adding_process_to_version').css('background', 'none');
		$('#pp_monitoring').css('background', 'none');
		$('#partial_test_trf').css('background', 'none');
		$('#all_test_trf').css('background', 'none');
		$('#reprocess_trf').css('background', 'none');
		$('#partial_test_result').css('background', 'none');
		$('#all_test_result').css('background', 'none');
		$('#reprocess_all_test').css('background', 'none');
		$('#partial_test_report').css('background', 'none');
		$('#all_test_report').css('background', 'none');
		$('#customized_report').css('background', 'none');
		$('#pp_progress_report').css('background', 'none');
		$('#pp_status_report').css('background', 'none');


		load_page('settings/process_technique_or_program_type.php');
	}

	function change_add_color_button_color() {
		$('#create_user_list').css('background', 'none');
		$('#user_list').css('background', 'none');
		$('#department_info').css('background', 'none');
		
		$('#key_account_manager').css('background', 'none');
		$('#add_customer').css('background', 'none');
		$('#add_process_technique').css('background', 'none');
		$('#add_color').css('background', 'black');

		$('#add_style_name').css('background', 'none');

		$('#add_trolley').css('background', 'none');
		$('#add_machine').css('background', 'none');
		$('#add_machine_owner').css('background', 'none');
		$('#add_test_name').css('background', 'none');
		$('#add_test_method_name').css('background', 'none');
		$('#add_test_method_for_customer').css('background', 'none');
		$('#add_version_of_pp').css('background', 'none');
		$('#add_construction').css('background', 'none');
		$('#add_pp_creation').css('background', 'none');
		$('#pp_wise_version_creation').css('background', 'none');
		$('#adding_process_to_version').css('background', 'none');
		$('#pp_monitoring').css('background', 'none');
		$('#partial_test_trf').css('background', 'none');
		$('#all_test_trf').css('background', 'none');
		$('#reprocess_trf').css('background', 'none');
		$('#partial_test_result').css('background', 'none');
		$('#all_test_result').css('background', 'none');
		$('#reprocess_all_test').css('background', 'none');
		$('#partial_test_report').css('background', 'none');
		$('#all_test_report').css('background', 'none');
		$('#customized_report').css('background', 'none');
		$('#pp_progress_report').css('background', 'none');
		$('#pp_status_report').css('background', 'none');


		load_page('settings/color.php');
	}

/*	Need to paste buttons */

	function change_add_style_name_button_color() {
		$('#create_user_list').css('background', 'none');
		$('#user_list').css('background', 'none');
		$('#department_info').css('background', 'none');
		
		$('#key_account_manager').css('background', 'none');
		$('#add_customer').css('background', 'none');
		$('#add_process_technique').css('background', 'none');
		$('#add_color').css('background', 'none');
		$('#add_style_name').css('background', 'black');

		$('#add_trolley').css('background', 'none');
		$('#add_machine').css('background', 'none');
		$('#add_machine_owner').css('background', 'none');
		$('#add_test_name').css('background', 'none');
		$('#add_test_method_name').css('background', 'none');
		$('#add_test_method_for_customer').css('background', 'none');
		$('#add_version_of_pp').css('background', 'none');
		$('#add_construction').css('background', 'none');
		$('#add_pp_creation').css('background', 'none');
		$('#pp_wise_version_creation').css('background', 'none');
		$('#adding_process_to_version').css('background', 'none');
		$('#pp_monitoring').css('background', 'none');
		$('#partial_test_trf').css('background', 'none');
		$('#all_test_trf').css('background', 'none');
		$('#reprocess_trf').css('background', 'none');
		$('#partial_test_result').css('background', 'none');
		$('#all_test_result').css('background', 'none');
		$('#reprocess_all_test').css('background', 'none');
		$('#partial_test_report').css('background', 'none');
		$('#all_test_report').css('background', 'none');
		$('#customized_report').css('background', 'none');
		$('#pp_progress_report').css('background', 'none');
		$('#pp_status_report').css('background', 'none');

		load_page('settings/style_name.php');
	}

	function change_add_trolley_button_color() {
		$('#create_user_list').css('background', 'none');
		$('#user_list').css('background', 'none');
		$('#department_info').css('background', 'none');
		
		$('#key_account_manager').css('background', 'none');
		$('#add_customer').css('background', 'none');
		$('#add_process_technique').css('background', 'none');
		$('#add_color').css('background', 'none');
		
		$('#add_process_name').css('background', 'none');
		$('#add_trolley').css('background', 'black');
		$('#add_machine').css('background', 'none');
		$('#add_machine_owner').css('background', 'none');
		$('#add_test_name').css('background', 'none');
		$('#add_test_method_name').css('background', 'none');
		$('#add_test_method_for_customer').css('background', 'none');
		$('#add_version_of_pp').css('background', 'none');
		$('#add_construction').css('background', 'none');
		$('#add_pp_creation').css('background', 'none');
		$('#pp_wise_version_creation').css('background', 'none');
		$('#adding_process_to_version').css('background', 'none');
		$('#pp_monitoring').css('background', 'none');
		$('#partial_test_trf').css('background', 'none');
		$('#all_test_trf').css('background', 'none');
		$('#reprocess_trf').css('background', 'none');
		$('#partial_test_result').css('background', 'none');
		$('#all_test_result').css('background', 'none');
		$('#reprocess_all_test').css('background', 'none');
		$('#partial_test_report').css('background', 'none');
		$('#all_test_report').css('background', 'none');
		$('#customized_report').css('background', 'none');
		$('#pp_progress_report').css('background', 'none');
		$('#pp_status_report').css('background', 'none');

		load_page('settings/trolley.php');
	}

	function change_add_machine_button_color() {
		$('#create_user_list').css('background', 'none');
		$('#user_list').css('background', 'none');
		$('#department_info').css('background', 'none');
		
		$('#key_account_manager').css('background', 'none');
		$('#add_customer').css('background', 'none');
		$('#add_process_technique').css('background', 'none');
		$('#add_color').css('background', 'none');
		
		$('#add_process_name').css('background', 'none');
		$('#add_trolley').css('background', 'none');
		$('#add_machine').css('background', 'black');
		$('#add_machine_owner').css('background', 'none');
		$('#add_test_name').css('background', 'none');
		$('#add_test_method_name').css('background', 'none');
		$('#add_test_method_for_customer').css('background', 'none');
		$('#add_version_of_pp').css('background', 'none');
		$('#add_construction').css('background', 'none');
		$('#add_pp_creation').css('background', 'none');
		$('#pp_wise_version_creation').css('background', 'none');
		$('#adding_process_to_version').css('background', 'none');
		$('#pp_monitoring').css('background', 'none');
		$('#partial_test_trf').css('background', 'none');
		$('#all_test_trf').css('background', 'none');
		$('#reprocess_trf').css('background', 'none');
		$('#partial_test_result').css('background', 'none');
		$('#all_test_result').css('background', 'none');
		$('#reprocess_all_test').css('background', 'none');
		$('#partial_test_report').css('background', 'none');
		$('#all_test_report').css('background', 'none');
		$('#customized_report').css('background', 'none');
		$('#pp_progress_report').css('background', 'none');
		$('#pp_status_report').css('background', 'none');

		load_page('settings/machine_name.php');
	}

	function change_add_machine_owner_button_color() {
		$('#create_user_list').css('background', 'none');
		$('#user_list').css('background', 'none');
		$('#department_info').css('background', 'none');
		
		$('#key_account_manager').css('background', 'none');
		$('#add_customer').css('background', 'none');
		$('#add_process_technique').css('background', 'none');
		$('#add_color').css('background', 'none');
		
		$('#add_process_name').css('background', 'none');
		$('#add_trolley').css('background', 'none');
		$('#add_machine').css('background', 'none');
		$('#add_machine_owner').css('background', 'black');
		$('#add_test_name').css('background', 'none');
		$('#add_test_method_name').css('background', 'none');
		$('#add_test_method_for_customer').css('background', 'none');
		$('#add_version_of_pp').css('background', 'none');
		$('#add_construction').css('background', 'none');
		$('#add_pp_creation').css('background', 'none');
		$('#pp_wise_version_creation').css('background', 'none');
		$('#adding_process_to_version').css('background', 'none');
		$('#pp_monitoring').css('background', 'none');
		$('#partial_test_trf').css('background', 'none');
		$('#all_test_trf').css('background', 'none');
		$('#reprocess_trf').css('background', 'none');
		$('#partial_test_result').css('background', 'none');
		$('#all_test_result').css('background', 'none');
		$('#reprocess_all_test').css('background', 'none');
		$('#partial_test_report').css('background', 'none');
		$('#all_test_report').css('background', 'none');
		$('#customized_report').css('background', 'none');
		$('#pp_progress_report').css('background', 'none');
		$('#pp_status_report').css('background', 'none');

		load_page('settings/machine_owner_name.php');
	}

	function change_add_test_name_button_color() {
		$('#create_user_list').css('background', 'none');
		$('#user_list').css('background', 'none');
		$('#department_info').css('background', 'none');
		
		$('#key_account_manager').css('background', 'none');
		$('#add_customer').css('background', 'none');
		$('#add_process_technique').css('background', 'none');
		$('#add_color').css('background', 'none');
		
		$('#add_process_name').css('background', 'none');
		$('#add_trolley').css('background', 'none');
		$('#add_machine').css('background', 'none');
		$('#add_machine_owner').css('background', 'none');
		$('#add_test_name').css('background', 'black');
		$('#add_test_method_name').css('background', 'none');
		$('#add_test_method_for_customer').css('background', 'none');
		$('#add_version_of_pp').css('background', 'none');
		$('#add_construction').css('background', 'none');
		$('#add_pp_creation').css('background', 'none');
		$('#pp_wise_version_creation').css('background', 'none');
		$('#adding_process_to_version').css('background', 'none');
		$('#pp_monitoring').css('background', 'none');
		$('#partial_test_trf').css('background', 'none');
		$('#all_test_trf').css('background', 'none');
		$('#reprocess_trf').css('background', 'none');
		$('#partial_test_result').css('background', 'none');
		$('#all_test_result').css('background', 'none');
		$('#reprocess_all_test').css('background', 'none');
		$('#partial_test_report').css('background', 'none');
		$('#all_test_report').css('background', 'none');
		$('#customized_report').css('background', 'none');
		$('#pp_progress_report').css('background', 'none');
		$('#pp_status_report').css('background', 'none');

		load_page('settings/test_name.php');
	}

	function change_add_test_method_name_button_color() {
		$('#create_user_list').css('background', 'none');
		$('#user_list').css('background', 'none');
		$('#department_info').css('background', 'none');
		
		$('#key_account_manager').css('background', 'none');
		$('#add_customer').css('background', 'none');
		$('#add_process_technique').css('background', 'none');
		$('#add_color').css('background', 'none');
		
		$('#add_process_name').css('background', 'none');
		$('#add_trolley').css('background', 'none');
		$('#add_machine').css('background', 'none');
		$('#add_machine_owner').css('background', 'none');
		$('#add_test_name').css('background', 'none');
		$('#add_test_method_name').css('background', 'black');
		$('#add_test_method_for_customer').css('background', 'none');
		$('#add_version_of_pp').css('background', 'none');
		$('#add_construction').css('background', 'none');
		$('#add_pp_creation').css('background', 'none');
		$('#pp_wise_version_creation').css('background', 'none');
		$('#adding_process_to_version').css('background', 'none');
		$('#pp_monitoring').css('background', 'none');
		$('#partial_test_trf').css('background', 'none');
		$('#all_test_trf').css('background', 'none');
		$('#reprocess_trf').css('background', 'none');
		$('#partial_test_result').css('background', 'none');
		$('#all_test_result').css('background', 'none');
		$('#reprocess_all_test').css('background', 'none');
		$('#partial_test_report').css('background', 'none');
		$('#all_test_report').css('background', 'none');
		$('#customized_report').css('background', 'none');
		$('#pp_progress_report').css('background', 'none');
		$('#pp_status_report').css('background', 'none');

		load_page('settings/test_method_name.php');
	}

	function change_add_test_method_for_customer_button_color() {
		$('#create_user_list').css('background', 'none');
		$('#user_list').css('background', 'none');
		$('#department_info').css('background', 'none');
		
		$('#key_account_manager').css('background', 'none');
		$('#add_customer').css('background', 'none');
		$('#add_process_technique').css('background', 'none');
		$('#add_color').css('background', 'none');
		
		$('#add_process_name').css('background', 'none');
		$('#add_trolley').css('background', 'none');
		$('#add_machine').css('background', 'none');
		$('#add_machine_owner').css('background', 'none');
		$('#add_test_name').css('background', 'none');
		$('#add_test_method_name').css('background', 'none');
		$('#add_test_method_for_customer').css('background', 'black');
		$('#add_version_of_pp').css('background', 'none');
		$('#add_construction').css('background', 'none');
		$('#add_pp_creation').css('background', 'none');
		$('#pp_wise_version_creation').css('background', 'none');
		$('#adding_process_to_version').css('background', 'none');
		$('#pp_monitoring').css('background', 'none');
		$('#partial_test_trf').css('background', 'none');
		$('#all_test_trf').css('background', 'none');
		$('#reprocess_trf').css('background', 'none');
		$('#partial_test_result').css('background', 'none');
		$('#all_test_result').css('background', 'none');
		$('#reprocess_all_test').css('background', 'none');
		$('#partial_test_report').css('background', 'none');
		$('#all_test_report').css('background', 'none');
		$('#customized_report').css('background', 'none');
		$('#pp_progress_report').css('background', 'none');
		$('#pp_status_report').css('background', 'none');

		load_page('settings/test_method_for_customer.php');
	}

	function change_add_version_of_pp_button_color() {
		$('#create_user_list').css('background', 'none');
		$('#user_list').css('background', 'none');
		$('#department_info').css('background', 'none');
		
		$('#key_account_manager').css('background', 'none');
		$('#add_customer').css('background', 'none');
		$('#add_process_technique').css('background', 'none');
		$('#add_color').css('background', 'none');
		
		$('#add_process_name').css('background', 'none');
		$('#add_trolley').css('background', 'none');
		$('#add_machine').css('background', 'none');
		$('#add_machine_owner').css('background', 'none');
		$('#add_test_name').css('background', 'none');
		$('#add_test_method_name').css('background', 'none');
		$('#add_test_method_for_customer').css('background', 'none');
		$('#add_version_of_pp').css('background', 'black');
		$('#add_construction').css('background', 'none');
		$('#add_pp_creation').css('background', 'none');
		$('#pp_wise_version_creation').css('background', 'none');
		$('#adding_process_to_version').css('background', 'none');
		$('#pp_monitoring').css('background', 'none');
		$('#partial_test_trf').css('background', 'none');
		$('#all_test_trf').css('background', 'none');
		$('#reprocess_trf').css('background', 'none');
		$('#partial_test_result').css('background', 'none');
		$('#all_test_result').css('background', 'none');
		$('#reprocess_all_test').css('background', 'none');
		$('#partial_test_report').css('background', 'none');
		$('#all_test_report').css('background', 'none');
		$('#customized_report').css('background', 'none');
		$('#pp_progress_report').css('background', 'none');
		$('#pp_status_report').css('background', 'none');

		load_page('settings/version_name.php');   
	}

	function change_add_construction_button_color() {
		$('#create_user_list').css('background', 'none');
		$('#user_list').css('background', 'none');
		$('#department_info').css('background', 'none');
		
		$('#key_account_manager').css('background', 'none');
		$('#add_customer').css('background', 'none');
		$('#add_process_technique').css('background', 'none');
		$('#add_color').css('background', 'none');
		
		$('#add_process_name').css('background', 'none');
		$('#add_trolley').css('background', 'none');
		$('#add_machine').css('background', 'none');
		$('#add_machine_owner').css('background', 'none');
		$('#add_test_name').css('background', 'none');
		$('#add_test_method_name').css('background', 'none');
		$('#add_test_method_for_customer').css('background', 'none');
		$('#add_version_of_pp').css('background', 'none');
		$('#add_construction').css('background', 'black');
		$('#add_pp_creation').css('background', 'none');
		$('#pp_wise_version_creation').css('background', 'none');
		$('#adding_process_to_version').css('background', 'none');
		$('#pp_monitoring').css('background', 'none');
		$('#partial_test_trf').css('background', 'none');
		$('#all_test_trf').css('background', 'none');
		$('#reprocess_trf').css('background', 'none');
		$('#partial_test_result').css('background', 'none');
		$('#all_test_result').css('background', 'none');
		$('#reprocess_all_test').css('background', 'none');
		$('#partial_test_report').css('background', 'none');
		$('#all_test_report').css('background', 'none');
		$('#customized_report').css('background', 'none');
		$('#pp_progress_report').css('background', 'none');
		$('#pp_status_report').css('background', 'none');

		load_page('settings/construction_for_version.php');
	}

	/*******************Process Program*************************/

	function change_add_swing_production_info_button_color() {
		
		$('#create_user_list').css('background', 'none');
		$('#user_list').css('background', 'none');
		$('#department_info').css('background', 'none');
		
		$('#key_account_manager').css('background', 'none');
		$('#add_customer').css('background', 'none');
		$('#add_process_technique').css('background', 'none');
		$('#add_color').css('background', 'none');
		
		$('#add_process_name').css('background', 'none');
		$('#add_trolley').css('background', 'none');
		$('#add_machine').css('background', 'none');
		$('#add_machine_owner').css('background', 'none');
		$('#add_test_name').css('background', 'none');
		$('#add_test_method_name').css('background', 'none');
		$('#add_test_method_for_customer').css('background', 'none');
		$('#add_version_of_pp').css('background', 'none');
		$('#add_construction').css('background', 'none');

		$('#swing_floor_wise_report').css('background', 'none');
		$('#swing_line_and_position_wise_production_info').css('background', 'none');
		$('#swing_line_and_position_wise_production_info_hourly_basis_report').css('background', 'none');
		$('#swing_line_production_info_hourly_basis_report').css('background', 'none');
		$('#swing_line_and_position_wise_production_info_report').css('background', 'none');
		$('#swing_line_wise_production_info').css('background', 'none');
		$('#swing_line_wise_production_info_report').css('background', 'none');
		$('#add_swing_production_info').css('background', 'black');
		$('#swing_production_per_hour').css('background', 'none');
		//swing_line_and_position_wise_production_info_report
		

		$('#pp_wise_version_creation').css('background', 'none');
		$('#adding_process_to_version').css('background', 'none');
		$('#pp_monitoring').css('background', 'none');
		$('#partial_test_trf').css('background', 'none');
		$('#all_test_trf').css('background', 'none');
		$('#reprocess_trf').css('background', 'none');
		$('#partial_test_result').css('background', 'none');
		$('#all_test_result').css('background', 'none');
		$('#reprocess_all_test').css('background', 'none');
		$('#partial_test_report').css('background', 'none');
		$('#all_test_report').css('background', 'none');
		$('#customized_report').css('background', 'none');
		$('#pp_progress_report').css('background', 'none');
		$('#pp_status_report').css('background', 'none');

		load_page('swing/swing_production_info.php');
	}

	function change_swing_floor_wise_report() {
		$('#create_user_list').css('background', 'none');
		$('#user_list').css('background', 'none');
		$('#department_info').css('background', 'none');
		
		$('#key_account_manager').css('background', 'none');
		$('#add_customer').css('background', 'none');
		$('#add_process_technique').css('background', 'none');
		$('#add_color').css('background', 'none');
		
		$('#add_process_name').css('background', 'none');
		$('#add_trolley').css('background', 'none');
		$('#add_machine').css('background', 'none');
		$('#add_machine_owner').css('background', 'none');
		$('#add_test_name').css('background', 'none');
		$('#add_test_method_name').css('background', 'none');
		$('#add_test_method_for_customer').css('background', 'none');
		$('#add_version_of_pp').css('background', 'none');
		$('#add_construction').css('background', 'none');

		$('#add_pp_creation').css('background', 'none');

		$('#swing_floor_wise_report').css('background', 'black');
		$('#swing_line_and_position_wise_production_info').css('background', 'none');
		$('#swing_line_and_position_wise_production_info_hourly_basis_report').css('background', 'none');
		$('#swing_line_production_info_hourly_basis_report').css('background', 'none');
		$('#swing_line_and_position_wise_production_info_report').css('background', 'none');
		$('#swing_line_wise_production_info').css('background', 'none');
		$('#swing_line_wise_production_info_report').css('background', 'none');
		$('#add_swing_production_info').css('background', 'none');
		$('#swing_production_per_hour').css('background', 'none');
		

		$('#adding_process_to_version').css('background', 'none');
		$('#pp_monitoring').css('background', 'none');
		$('#partial_test_trf').css('background', 'none');
		$('#all_test_trf').css('background', 'none');
		$('#reprocess_trf').css('background', 'none');
		$('#partial_test_result').css('background', 'none');
		$('#all_test_result').css('background', 'none');
		$('#reprocess_all_test').css('background', 'none');
		$('#partial_test_report').css('background', 'none');
		$('#all_test_report').css('background', 'none');
		$('#customized_report').css('background', 'none');
		$('#pp_progress_report').css('background', 'none');
		$('#pp_status_report').css('background', 'none');

		load_page('swing/swing_day_wise_garments_report.php');
	}

	function change_adding_process_to_version_button_color() {
		$('#create_user_list').css('background', 'none');
		$('#user_list').css('background', 'none');
		$('#department_info').css('background', 'none');
		
		$('#key_account_manager').css('background', 'none');
		$('#add_customer').css('background', 'none');
		$('#add_process_technique').css('background', 'none');
		$('#add_color').css('background', 'none');
		
		$('#add_process_name').css('background', 'none');
		$('#add_trolley').css('background', 'none');
		$('#add_machine').css('background', 'none');
		$('#add_machine_owner').css('background', 'none');
		$('#add_test_name').css('background', 'none');
		$('#add_test_method_name').css('background', 'none');
		$('#add_test_method_for_customer').css('background', 'none');
		$('#add_version_of_pp').css('background', 'none');
		$('#add_construction').css('background', 'none');

		$('#add_pp_creation').css('background', 'none');
		$('#pp_wise_version_creation').css('background', 'none');
		$('#adding_process_to_version').css('background', 'black');
		$('#pp_monitoring').css('background', 'none');
		$('#partial_test_trf').css('background', 'none');
		$('#all_test_trf').css('background', 'none');
		$('#reprocess_trf').css('background', 'none');
		$('#partial_test_result').css('background', 'none');
		$('#all_test_result').css('background', 'none');
		$('#reprocess_all_test').css('background', 'none');
		$('#partial_test_report').css('background', 'none');
		$('#all_test_report').css('background', 'none');
		$('#customized_report').css('background', 'none');
		$('#pp_progress_report').css('background', 'none');
		$('#pp_status_report').css('background', 'none');
		

		load_page('process_program/version_wise_process_info.php');  
	}
    

   /******************************** PP Monitoring*******************************************/

	function change_pp_monitoring_button_color() {
		$('#create_user_list').css('background', 'none');
		$('#user_list').css('background', 'none');
		$('#department_info').css('background', 'none');
		
		$('#key_account_manager').css('background', 'none');
		$('#add_customer').css('background', 'none');
		$('#add_process_technique').css('background', 'none');
		$('#add_color').css('background', 'none');
		
		$('#add_process_name').css('background', 'none');
		$('#add_trolley').css('background', 'none');
		$('#add_machine').css('background', 'none');
		$('#add_machine_owner').css('background', 'none');
		$('#add_test_name').css('background', 'none');
		$('#add_test_method_name').css('background', 'none');
		$('#add_test_method_for_customer').css('background', 'none');
		$('#add_version_of_pp').css('background', 'none');
		$('#add_construction').css('background', 'none');

		$('#add_pp_creation').css('background', 'none');
		$('#pp_wise_version_creation').css('background', 'none');
		$('#adding_process_to_version').css('background', 'none');
		$('#pp_monitoring').css('background', 'black');
		$('#partial_test_trf').css('background', 'none');
		$('#all_test_trf').css('background', 'none');
		$('#reprocess_trf').css('background', 'none');
		$('#partial_test_result').css('background', 'none');
		$('#all_test_result').css('background', 'none');
		$('#reprocess_all_test').css('background', 'none');
		$('#partial_test_report').css('background', 'none');
		$('#all_test_report').css('background', 'none');
		$('#customized_report').css('background', 'none');
		$('#pp_progress_report').css('background', 'none');
		$('#pp_status_report').css('background', 'none');
		

	    load_page('pp_monitoring/pp_monitoring.php');
	}
	/********************************Sample & Test Result*******************************************/


	function change_swing_production_per_hour() {
		$('#create_user_list').css('background', 'none');
		$('#user_list').css('background', 'none');
		$('#department_info').css('background', 'none');
		
		$('#key_account_manager').css('background', 'none');
		$('#add_customer').css('background', 'none');
		$('#add_process_technique').css('background', 'none');
		$('#add_color').css('background', 'none');
		
		$('#add_process_name').css('background', 'none');
		$('#add_trolley').css('background', 'none');
		$('#add_machine').css('background', 'none');
		$('#add_machine_owner').css('background', 'none');
		$('#add_test_name').css('background', 'none');
		$('#add_test_method_name').css('background', 'none');
		$('#add_test_method_for_customer').css('background', 'none');
		$('#add_version_of_pp').css('background', 'none');
		$('#add_construction').css('background', 'none');

		$('#add_pp_creation').css('background', 'none');
		$('#pp_wise_version_creation').css('background', 'none');
		$('#adding_process_to_version').css('background', 'none');
		$('#pp_monitoring').css('background', 'none');
		
		$('#swing_floor_wise_report').css('background', 'none');
		$('#swing_line_and_position_wise_production_info').css('background', 'none');
		$('#swing_line_and_position_wise_production_info_hourly_basis_report').css('background', 'none');
		$('#swing_line_production_info_hourly_basis_report').css('background', 'none');
		$('#swing_line_and_position_wise_production_info_report').css('background', 'none');
		$('#swing_line_wise_production_info').css('background', 'none');
		$('#swing_line_wise_production_info_report').css('background', 'none');
		$('#add_swing_production_info').css('background', 'none');
		$('#swing_production_per_hour').css('background', 'black');

		$('#all_test_trf').css('background', 'none');
		$('#reprocess_trf').css('background', 'none');
		$('#partial_test_result').css('background', 'none');
		$('#all_test_result').css('background', 'none');
		$('#reprocess_all_test').css('background', 'none');
		$('#partial_test_report').css('background', 'none');
		$('#all_test_report').css('background', 'none');
		$('#customized_report').css('background', 'none');
		$('#pp_progress_report').css('background', 'none');
		$('#pp_status_report').css('background', 'none');
		

	    load_page('swing/hour.php');
	}

	function change_swing_line_and_position_wise_production_info() {
		$('#create_user_list').css('background', 'none');
		$('#user_list').css('background', 'none');
		$('#department_info').css('background', 'none');
		
		$('#key_account_manager').css('background', 'none');
		$('#add_customer').css('background', 'none');
		$('#add_process_technique').css('background', 'none');
		$('#add_color').css('background', 'none');
		
		$('#add_process_name').css('background', 'none');
		$('#add_trolley').css('background', 'none');
		$('#add_machine').css('background', 'none');
		$('#add_machine_owner').css('background', 'none');
		$('#add_test_name').css('background', 'none');
		$('#add_test_method_name').css('background', 'none');
		$('#add_test_method_for_customer').css('background', 'none');
		$('#add_version_of_pp').css('background', 'none');
		$('#add_construction').css('background', 'none');

		$('#add_pp_creation').css('background', 'none');
		$('#pp_wise_version_creation').css('background', 'none');
		$('#adding_process_to_version').css('background', 'none');
		$('#pp_monitoring').css('background', 'none');
		
		$('#swing_floor_wise_report').css('background', 'none');
		$('#swing_line_and_position_wise_production_info').css('background', 'black');
		$('#swing_line_and_position_wise_production_info_hourly_basis_report').css('background', 'none');
		$('#swing_line_production_info_hourly_basis_report').css('background', 'none');
		$('#swing_line_and_position_wise_production_info_report').css('background', 'none');
		$('#swing_line_wise_production_info').css('background', 'none');
		$('#swing_line_wise_production_info_report').css('background', 'none');
		$('#add_swing_production_info').css('background', 'none');
		$('#swing_production_per_hour').css('background', 'none');

		$('#all_test_trf').css('background', 'none');
		$('#reprocess_trf').css('background', 'none');
		$('#partial_test_result').css('background', 'none');
		$('#all_test_result').css('background', 'none');
		$('#reprocess_all_test').css('background', 'none');
		$('#partial_test_report').css('background', 'none');
		$('#all_test_report').css('background', 'none');
		$('#customized_report').css('background', 'none');
		$('#pp_progress_report').css('background', 'none');
		$('#pp_status_report').css('background', 'none');
		

	    load_page('swing/swing_line_and_position_wise_production_info_po_receiving.php');
	}

	function change_swing_line_and_position_wise_production_info_hourly_basis_report() {

		$('#create_user_list').css('background', 'none');
		$('#user_list').css('background', 'none');
		$('#department_info').css('background', 'none');
		
		$('#key_account_manager').css('background', 'none');
		$('#add_customer').css('background', 'none');
		$('#add_process_technique').css('background', 'none');
		$('#add_color').css('background', 'none');
		
		$('#add_process_name').css('background', 'none');
		$('#add_trolley').css('background', 'none');
		$('#add_machine').css('background', 'none');
		$('#add_machine_owner').css('background', 'none');
		$('#add_test_name').css('background', 'none');
		$('#add_test_method_name').css('background', 'none');
		$('#add_test_method_for_customer').css('background', 'none');
		$('#add_version_of_pp').css('background', 'none');
		$('#add_construction').css('background', 'none');

		$('#add_pp_creation').css('background', 'none');
		$('#pp_wise_version_creation').css('background', 'none');
		$('#adding_process_to_version').css('background', 'none');
		$('#pp_monitoring').css('background', 'none');

		$('#swing_floor_wise_report').css('background', 'none');
		$('#swing_line_and_position_wise_production_info').css('background', 'none');
		$('#swing_line_and_position_wise_production_info_hourly_basis_report').css('background', 'green');
		$('#swing_line_production_info_hourly_basis_report').css('background', 'none');
		$('#swing_line_and_position_wise_production_info_report').css('background', 'none');
		$('#swing_line_and_position_wise_production_info_report').css('background', 'none');
		$('#swing_line_wise_production_info').css('background', 'none');
		$('#swing_line_wise_production_info_report').css('background', 'none');
		$('#add_swing_production_info').css('background', 'none');
		$('#swing_production_per_hour').css('background', 'none');

		$('#all_test_trf').css('background', 'none');
		$('#reprocess_trf').css('background', 'none');
		$('#partial_test_result').css('background', 'none');
		$('#all_test_result').css('background', 'none');
		$('#reprocess_all_test').css('background', 'none');
		$('#partial_test_report').css('background', 'none');
		$('#all_test_report').css('background', 'none');
		$('#customized_report').css('background', 'none');
		$('#pp_progress_report').css('background', 'none');
		$('#pp_status_report').css('background', 'none');
		
	    load_page('swing/position_wise_hourly_basis_production_info_po_receiving.php');
	}

		function change_swing_production_info_hourly_basis_report() {

		$('#create_user_list').css('background', 'none');
		$('#user_list').css('background', 'none');
		$('#department_info').css('background', 'none');

		$('#key_account_manager').css('background', 'none');
		$('#add_customer').css('background', 'none');
		$('#add_process_technique').css('background', 'none');
		$('#add_color').css('background', 'none');

		$('#add_process_name').css('background', 'none');
		$('#add_trolley').css('background', 'none');
		$('#add_machine').css('background', 'none');
		$('#add_machine_owner').css('background', 'none');
		$('#add_test_name').css('background', 'none');
		$('#add_test_method_name').css('background', 'none');
		$('#add_test_method_for_customer').css('background', 'none');
		$('#add_version_of_pp').css('background', 'none');
		$('#add_construction').css('background', 'none');

		$('#add_pp_creation').css('background', 'none');
		$('#pp_wise_version_creation').css('background', 'none');
		$('#adding_process_to_version').css('background', 'none');
		$('#pp_monitoring').css('background', 'none');

		$('#swing_floor_wise_report').css('background', 'none');
		$('#swing_line_and_position_wise_production_info').css('background', 'none');
		$('#swing_line_and_position_wise_production_info_hourly_basis_report').css('background', 'none');
		$('#swing_line_production_info_hourly_basis_report').css('background', 'green');
		$('#swing_line_and_position_wise_production_info_report').css('background', 'none');
		$('#swing_line_and_position_wise_production_info_report').css('background', 'none');
		$('#swing_line_wise_production_info').css('background', 'none');
		$('#swing_line_wise_production_info_report').css('background', 'none');
		$('#add_swing_production_info').css('background', 'none');
		$('#swing_production_per_hour').css('background', 'none');

		$('#all_test_trf').css('background', 'none');
		$('#reprocess_trf').css('background', 'none');
		$('#partial_test_result').css('background', 'none');
		$('#all_test_result').css('background', 'none');
		$('#reprocess_all_test').css('background', 'none');
		$('#partial_test_report').css('background', 'none');
		$('#all_test_report').css('background', 'none');
		$('#customized_report').css('background', 'none');
		$('#pp_progress_report').css('background', 'none');
		$('#pp_status_report').css('background', 'none');

		load_page('swing/date_wise_hourly_basis_production_info.php');
		}

	function change_button_color_swing_line_and_position_wise_production_info_report() {
		$('#create_user_list').css('background', 'none');
		$('#user_list').css('background', 'none');
		$('#department_info').css('background', 'none');
		
		$('#key_account_manager').css('background', 'none');
		$('#add_customer').css('background', 'none');
		$('#add_process_technique').css('background', 'none');
		$('#add_color').css('background', 'none');
		
		$('#add_process_name').css('background', 'none');
		$('#add_trolley').css('background', 'none');
		$('#add_machine').css('background', 'none');
		$('#add_machine_owner').css('background', 'none');
		$('#add_test_name').css('background', 'none');
		$('#add_test_method_name').css('background', 'none');
		$('#add_test_method_for_customer').css('background', 'none');
		$('#add_version_of_pp').css('background', 'none');
		$('#add_construction').css('background', 'none');

		$('#add_pp_creation').css('background', 'none');
		$('#pp_wise_version_creation').css('background', 'none');
		$('#adding_process_to_version').css('background', 'none');
		$('#pp_monitoring').css('background', 'none');
		
		$('#swing_floor_wise_report').css('background', 'none');
		$('#swing_line_and_position_wise_production_info').css('background', 'none');
		$('#swing_line_and_position_wise_production_info_hourly_basis_report').css('background', 'none');
		$('#swing_line_production_info_hourly_basis_report').css('background', 'none');
		$('#swing_line_and_position_wise_production_info_report').css('background', 'black');
		$('#swing_line_wise_production_info').css('background', 'none');
		$('#swing_line_wise_production_info_report').css('background', 'none');
		$('#add_swing_production_info').css('background', 'none');
		$('#swing_production_per_hour').css('background', 'none');

		$('#all_test_trf').css('background', 'none');
		$('#reprocess_trf').css('background', 'none');
		$('#partial_test_result').css('background', 'none');
		$('#all_test_result').css('background', 'none');
		$('#reprocess_all_test').css('background', 'none');
		$('#partial_test_report').css('background', 'none');
		$('#all_test_report').css('background', 'none');
		$('#customized_report').css('background', 'none');
		$('#pp_progress_report').css('background', 'none');
		$('#pp_status_report').css('background', 'none');
		

	    load_page('swing/swing_line_and_position_wise_production_info_report_po_receiving.php');
	}

	function change_swing_line_wise_production_info() {
		$('#create_user_list').css('background', 'none');
		$('#user_list').css('background', 'none');
		$('#department_info').css('background', 'none');
		
		$('#key_account_manager').css('background', 'none');
		$('#add_customer').css('background', 'none');
		$('#add_process_technique').css('background', 'none');
		$('#add_color').css('background', 'none');
		
		$('#add_process_name').css('background', 'none');
		$('#add_trolley').css('background', 'none');
		$('#add_machine').css('background', 'none');
		$('#add_machine_owner').css('background', 'none');
		$('#add_test_name').css('background', 'none');
		$('#add_test_method_name').css('background', 'none');
		$('#add_test_method_for_customer').css('background', 'none');
		$('#add_version_of_pp').css('background', 'none');
		$('#add_construction').css('background', 'none');

		$('#add_pp_creation').css('background', 'none');
		$('#pp_wise_version_creation').css('background', 'none');
		$('#adding_process_to_version').css('background', 'none');
		$('#pp_monitoring').css('background', 'none');
		 
		$('#swing_floor_wise_report').css('background', 'none');
		$('#swing_line_and_position_wise_production_info').css('background', 'none');
		$('#swing_line_and_position_wise_production_info_hourly_basis_report').css('background', 'none');
		$('#swing_line_production_info_hourly_basis_report').css('background', 'none');
		$('#swing_line_and_position_wise_production_info_report').css('background', 'none');
		$('#swing_line_wise_production_info').css('background', 'black');
		$('#swing_line_wise_production_info_report').css('background', 'none');
		$('#add_swing_production_info').css('background', 'none');
		$('#swing_production_per_hour').css('background', 'none');

		$('#all_test_trf').css('background', 'none');
		$('#reprocess_trf').css('background', 'none');
		$('#partial_test_result').css('background', 'none');
		$('#all_test_result').css('background', 'none');
		$('#reprocess_all_test').css('background', 'none');
		$('#partial_test_report').css('background', 'none');
		$('#all_test_report').css('background', 'none');
		$('#customized_report').css('background', 'none');
		$('#pp_progress_report').css('background', 'none');
		$('#pp_status_report').css('background', 'none');
		

	    load_page('swing/swing_line_wise_production_info.php');
	}

	function change_swing_line_wise_production_info_report() {
		$('#create_user_list').css('background', 'none');
		$('#user_list').css('background', 'none');
		$('#department_info').css('background', 'none');
		
		$('#key_account_manager').css('background', 'none');
		$('#add_customer').css('background', 'none');
		$('#add_process_technique').css('background', 'none');
		$('#add_color').css('background', 'none');
		
		$('#add_process_name').css('background', 'none');
		$('#add_trolley').css('background', 'none');
		$('#add_machine').css('background', 'none');
		$('#add_machine_owner').css('background', 'none');
		$('#add_test_name').css('background', 'none');
		$('#add_test_method_name').css('background', 'none');
		$('#add_test_method_for_customer').css('background', 'none');
		$('#add_version_of_pp').css('background', 'none');
		$('#add_construction').css('background', 'none');

		$('#add_pp_creation').css('background', 'none');
		$('#pp_wise_version_creation').css('background', 'none');
		$('#adding_process_to_version').css('background', 'none');
		$('#pp_monitoring').css('background', 'none');
		 
		$('#swing_floor_wise_report').css('background', 'none');
		$('#swing_line_and_position_wise_production_info').css('background', 'none');
		$('#swing_line_and_position_wise_production_info_hourly_basis_report').css('background', 'none');
		$('#swing_line_production_info_hourly_basis_report').css('background', 'none');
		$('#swing_line_and_position_wise_production_info_report').css('background', 'none');
		$('#swing_line_wise_production_info').css('background', 'none');
		$('#swing_line_wise_production_info_report').css('background', 'black');
		$('#add_swing_production_info').css('background', 'none');
		$('#swing_production_per_hour').css('background', 'none');

		$('#all_test_trf').css('background', 'none');
		$('#reprocess_trf').css('background', 'none');
		$('#partial_test_result').css('background', 'none');
		$('#all_test_result').css('background', 'none');
		$('#reprocess_all_test').css('background', 'none');
		$('#partial_test_report').css('background', 'none');
		$('#all_test_report').css('background', 'none');
		$('#customized_report').css('background', 'none');
		$('#pp_progress_report').css('background', 'none');
		$('#pp_status_report').css('background', 'none');
		

	    load_page('swing/swing_line_wise_production_info_report_po_receiving.php');
	}

	function change_all_test_trf_button_color() {
		$('#create_user_list').css('background', 'none');
		$('#user_list').css('background', 'none');
		$('#department_info').css('background', 'none');
		
		$('#key_account_manager').css('background', 'none');
		$('#add_customer').css('background', 'none');
		$('#add_process_technique').css('background', 'none');
		$('#add_color').css('background', 'none');
		
		$('#add_process_name').css('background', 'none');
		$('#add_trolley').css('background', 'none');
		$('#add_machine').css('background', 'none');
		$('#add_machine_owner').css('background', 'none');
		$('#add_test_name').css('background', 'none');
		$('#add_test_method_name').css('background', 'none');
		$('#add_test_method_for_customer').css('background', 'none');
		$('#add_version_of_pp').css('background', 'none');
		$('#add_construction').css('background', 'none');

		$('#add_pp_creation').css('background', 'none');
		$('#pp_wise_version_creation').css('background', 'none');
		$('#adding_process_to_version').css('background', 'none');
		$('#pp_monitoring').css('background', 'none');
		$('#partial_test_trf').css('background', 'none');
		$('#all_test_trf').css('background', 'black');
		$('#reprocess_trf').css('background', 'none');
		$('#partial_test_result').css('background', 'none');
		$('#all_test_result').css('background', 'none');
		$('#reprocess_all_test').css('background', 'none');
		$('#partial_test_report').css('background', 'none');
		$('#all_test_report').css('background', 'none');
		$('#customized_report').css('background', 'none');
		$('#pp_progress_report').css('background', 'none');
		$('#pp_status_report').css('background', 'none');
		

	    load_page('trf/all_test_for_trf_info.php');
	}

	function change_reprocess_trf_button_color() {
		$('#create_user_list').css('background', 'none');
		$('#user_list').css('background', 'none');
		$('#department_info').css('background', 'none');
		
		$('#key_account_manager').css('background', 'none');
		$('#add_customer').css('background', 'none');
		$('#add_process_technique').css('background', 'none');
		$('#add_color').css('background', 'none');
		
		$('#add_process_name').css('background', 'none');
		$('#add_trolley').css('background', 'none');
		$('#add_machine').css('background', 'none');
		$('#add_machine_owner').css('background', 'none');
		$('#add_test_name').css('background', 'none');
		$('#add_test_method_name').css('background', 'none');
		$('#add_test_method_for_customer').css('background', 'none');
		$('#add_version_of_pp').css('background', 'none');
		$('#add_construction').css('background', 'none');

		$('#add_pp_creation').css('background', 'none');
		$('#pp_wise_version_creation').css('background', 'none');
		$('#adding_process_to_version').css('background', 'none');
		$('#pp_monitoring').css('background', 'none');
		$('#partial_test_trf').css('background', 'none');
		$('#all_test_trf').css('background', 'none');
		$('#reprocess_trf').css('background', 'black');
		$('#partial_test_result').css('background', 'none');
		$('#all_test_result').css('background', 'none');
		$('#reprocess_all_test').css('background', 'none');
		$('#partial_test_report').css('background', 'none');
		$('#all_test_report').css('background', 'none');
		$('#customized_report').css('background', 'none');
		$('#pp_progress_report').css('background', 'none');
		$('#pp_status_report').css('background', 'none');
		

	    load_page('trf/reporcess_partial_test_for_trf_info.php');
	}

	function change_partial_test_result_button_color() {
		$('#create_user_list').css('background', 'none');
		$('#user_list').css('background', 'none');
		$('#department_info').css('background', 'none');
		
		$('#key_account_manager').css('background', 'none');
		$('#add_customer').css('background', 'none');
		$('#add_process_technique').css('background', 'none');
		$('#add_color').css('background', 'none');
		
		$('#add_process_name').css('background', 'none');
		$('#add_trolley').css('background', 'none');
		$('#add_machine').css('background', 'none');
		$('#add_machine_owner').css('background', 'none');
		$('#add_test_name').css('background', 'none');
		$('#add_test_method_name').css('background', 'none');
		$('#add_test_method_for_customer').css('background', 'none');
		$('#add_version_of_pp').css('background', 'none');
		$('#add_construction').css('background', 'none');

		$('#add_pp_creation').css('background', 'none');
		$('#pp_wise_version_creation').css('background', 'none');
		$('#adding_process_to_version').css('background', 'none');
		$('#pp_monitoring').css('background', 'none');
		$('#partial_test_trf').css('background', 'none');
		$('#all_test_trf').css('background', 'none');
		$('#reprocess_trf').css('background', 'none');
		$('#partial_test_result').css('background', 'black');
		$('#all_test_result').css('background', 'none');
		$('#reprocess_all_test').css('background', 'none');
		$('#partial_test_report').css('background', 'none');
		$('#all_test_report').css('background', 'none');
		$('#customized_report').css('background', 'none');
		$('#pp_progress_report').css('background', 'none');
		$('#pp_status_report').css('background', 'none');
		

	    load_page('test_result/partial_test_for_test_result_info.php');
	}

	function change_all_test_result_button_color() {
		$('#create_user_list').css('background', 'none');
		$('#user_list').css('background', 'none');
		$('#department_info').css('background', 'none');
		
		$('#key_account_manager').css('background', 'none');
		$('#add_customer').css('background', 'none');
		$('#add_process_technique').css('background', 'none');
		$('#add_color').css('background', 'none');
		
		$('#add_process_name').css('background', 'none');
		$('#add_trolley').css('background', 'none');
		$('#add_machine').css('background', 'none');
		$('#add_machine_owner').css('background', 'none');
		$('#add_test_name').css('background', 'none');
		$('#add_test_method_name').css('background', 'none');
		$('#add_test_method_for_customer').css('background', 'none');
		$('#add_version_of_pp').css('background', 'none');
		$('#add_construction').css('background', 'none');

		$('#add_pp_creation').css('background', 'none');
		$('#pp_wise_version_creation').css('background', 'none');
		$('#adding_process_to_version').css('background', 'none');
		$('#pp_monitoring').css('background', 'none');
		$('#partial_test_trf').css('background', 'none');
		$('#all_test_trf').css('background', 'none');
		$('#reprocess_trf').css('background', 'none');
		$('#partial_test_result').css('background', 'none');
		$('#all_test_result').css('background', 'black');
		$('#reprocess_all_test').css('background', 'none');
		$('#partial_test_report').css('background', 'none');
		$('#all_test_report').css('background', 'none');
		$('#customized_report').css('background', 'none');
		$('#pp_progress_report').css('background', 'none');
		$('#pp_status_report').css('background', 'none');
		

	    load_page('test_result/all_test_for_test_result_info.php');
	}


	function change_reprocess_all_test_button_color() {
		$('#create_user_list').css('background', 'none');
		$('#user_list').css('background', 'none');
		$('#department_info').css('background', 'none');
		
		$('#key_account_manager').css('background', 'none');
		$('#add_customer').css('background', 'none');
		$('#add_process_technique').css('background', 'none');
		$('#add_color').css('background', 'none');
		
		$('#add_process_name').css('background', 'none');
		$('#add_trolley').css('background', 'none');
		$('#add_machine').css('background', 'none');
		$('#add_machine_owner').css('background', 'none');
		$('#add_test_name').css('background', 'none');
		$('#add_test_method_name').css('background', 'none');
		$('#add_test_method_for_customer').css('background', 'none');
		$('#add_version_of_pp').css('background', 'none');
		$('#add_construction').css('background', 'none');

		$('#add_pp_creation').css('background', 'none');
		$('#pp_wise_version_creation').css('background', 'none');
		$('#adding_process_to_version').css('background', 'none');
		$('#pp_monitoring').css('background', 'none');
		$('#partial_test_trf').css('background', 'none');
		$('#all_test_trf').css('background', 'none');
		$('#reprocess_trf').css('background', 'none');
		$('#partial_test_result').css('background', 'none');
		$('#all_test_result').css('background', 'none');
		$('#reprocess_all_test').css('background', 'black');

		$('#partial_test_report').css('background', 'none');
		$('#all_test_report').css('background', 'none');
		$('#customized_report').css('background', 'none');
		$('#pp_progress_report').css('background', 'none');
		$('#pp_status_report').css('background', 'none');
		

	    load_page('test_result/reprocess_partial_test_for_test_result_info.php');
	}
/***********************************Test Report*************************************/
	function change_partial_test_report_button_color() {
		$('#create_user_list').css('background', 'none');
		$('#user_list').css('background', 'none');
		$('#department_info').css('background', 'none');
		
		$('#key_account_manager').css('background', 'none');
		$('#add_customer').css('background', 'none');
		$('#add_process_technique').css('background', 'none');
		$('#add_color').css('background', 'none');
		
		$('#add_process_name').css('background', 'none');
		$('#add_trolley').css('background', 'none');
		$('#add_machine').css('background', 'none');
		$('#add_machine_owner').css('background', 'none');
		$('#add_test_name').css('background', 'none');
		$('#add_test_method_name').css('background', 'none');
		$('#add_test_method_for_customer').css('background', 'none');
		$('#add_version_of_pp').css('background', 'none');
		$('#add_construction').css('background', 'none');

		$('#add_pp_creation').css('background', 'none');
		$('#pp_wise_version_creation').css('background', 'none');
		$('#adding_process_to_version').css('background', 'none');
		$('#pp_monitoring').css('background', 'none');
		$('#partial_test_trf').css('background', 'none');
		$('#all_test_trf').css('background', 'none');
		$('#reprocess_trf').css('background', 'none');
		$('#partial_test_result').css('background', 'none');
		$('#all_test_result').css('background', 'none');
		$('#reprocess_all_test').css('background', 'none');

		$('#partial_test_report').css('background', 'black');
		$('#all_test_report').css('background', 'none');
		$('#customized_report').css('background', 'none');
		$('#pp_progress_report').css('background', 'none');
		$('#pp_status_report').css('background', 'none');
		

	    load_page('report/partial_test_report_form.php');
	}
	function change_all_test_report_button_color() {
		$('#create_user_list').css('background', 'none');
		$('#user_list').css('background', 'none');
		$('#department_info').css('background', 'none');
		
		$('#key_account_manager').css('background', 'none');
		$('#add_customer').css('background', 'none');
		$('#add_process_technique').css('background', 'none');
		$('#add_color').css('background', 'none');
		
		$('#add_process_name').css('background', 'none');
		$('#add_trolley').css('background', 'none');
		$('#add_machine').css('background', 'none');
		$('#add_machine_owner').css('background', 'none');
		$('#add_test_name').css('background', 'none');
		$('#add_test_method_name').css('background', 'none');
		$('#add_test_method_for_customer').css('background', 'none');
		$('#add_version_of_pp').css('background', 'none');
		$('#add_construction').css('background', 'none');

		$('#add_pp_creation').css('background', 'none');
		$('#pp_wise_version_creation').css('background', 'none');
		$('#adding_process_to_version').css('background', 'none');
		$('#pp_monitoring').css('background', 'none');
		$('#partial_test_trf').css('background', 'none');
		$('#all_test_trf').css('background', 'none');
		$('#reprocess_trf').css('background', 'none');
		$('#partial_test_result').css('background', 'none');
		$('#all_test_result').css('background', 'none');
		$('#reprocess_all_test').css('background', 'none');

		$('#partial_test_report').css('background', 'none');
		$('#all_test_report').css('background', 'black');
		$('#customized_report').css('background', 'none');
		$('#pp_progress_report').css('background', 'none');
		$('#pp_status_report').css('background', 'none');
		
	    load_page('report/all_test_report_form.php');
	}

	function change_customized_report_button_color() {
		$('#create_user_list').css('background', 'none');
		$('#user_list').css('background', 'none');
		$('#department_info').css('background', 'none');
		
		$('#key_account_manager').css('background', 'none');
		$('#add_customer').css('background', 'none');
		$('#add_process_technique').css('background', 'none');
		$('#add_color').css('background', 'none');
		
		$('#add_process_name').css('background', 'none');
		$('#add_trolley').css('background', 'none');
		$('#add_machine').css('background', 'none');
		$('#add_machine_owner').css('background', 'none');
		$('#add_test_name').css('background', 'none');
		$('#add_test_method_name').css('background', 'none');
		$('#add_test_method_for_customer').css('background', 'none');
		$('#add_version_of_pp').css('background', 'none');
		$('#add_construction').css('background', 'none');

		$('#add_pp_creation').css('background', 'none');
		$('#pp_wise_version_creation').css('background', 'none');
		$('#adding_process_to_version').css('background', 'none');
		$('#pp_monitoring').css('background', 'none');
		$('#partial_test_trf').css('background', 'none');
		$('#all_test_trf').css('background', 'none');
		$('#reprocess_trf').css('background', 'none');
		$('#partial_test_result').css('background', 'none');
		$('#all_test_result').css('background', 'none');
		$('#reprocess_all_test').css('background', 'none');

		$('#partial_test_report').css('background', 'none');
		$('#all_test_report').css('background', 'none');
		$('#customized_report').css('background', 'black');
		$('#pp_progress_report').css('background', 'none');
		$('#pp_status_report').css('background', 'none');
		

	    load_page('customized_report/customized_report_for_partial_test.php');   
	}

	function change_pp_progress_report_button_color() {
		$('#create_user_list').css('background', 'none');
		$('#user_list').css('background', 'none');
		$('#department_info').css('background', 'none');
		
		$('#key_account_manager').css('background', 'none');
		$('#add_customer').css('background', 'none');
		$('#add_process_technique').css('background', 'none');
		$('#add_color').css('background', 'none');
		
		$('#add_process_name').css('background', 'none');
		$('#add_trolley').css('background', 'none');
		$('#add_machine').css('background', 'none');
		$('#add_machine_owner').css('background', 'none');
		$('#add_test_name').css('background', 'none');
		$('#add_test_method_name').css('background', 'none');
		$('#add_test_method_for_customer').css('background', 'none');
		$('#add_version_of_pp').css('background', 'none');
		$('#add_construction').css('background', 'none');

		$('#add_pp_creation').css('background', 'none');
		$('#pp_wise_version_creation').css('background', 'none');
		$('#adding_process_to_version').css('background', 'none');
		$('#pp_monitoring').css('background', 'none');
		$('#partial_test_trf').css('background', 'none');
		$('#all_test_trf').css('background', 'none');
		$('#reprocess_trf').css('background', 'none');
		$('#partial_test_result').css('background', 'none');
		$('#all_test_result').css('background', 'none');
		$('#reprocess_all_test').css('background', 'none');

		$('#partial_test_report').css('background', 'none');
		$('#all_test_report').css('background', 'none');
		$('#customized_report').css('background', 'none');
		$('#pp_progress_report').css('background', 'black');
		$('#pp_status_report').css('background', 'none');
		

	     load_page('pp_progress_report/pp_progress_report.php');
	}

	function change_pp_status_report_button_color() {
		$('#create_user_list').css('background', 'none');
		$('#user_list').css('background', 'none');
		$('#department_info').css('background', 'none');
		
		$('#key_account_manager').css('background', 'none');
		$('#add_customer').css('background', 'none');
		$('#add_process_technique').css('background', 'none');
		$('#add_color').css('background', 'none');
		
		$('#add_process_name').css('background', 'none');
		$('#add_trolley').css('background', 'none');
		$('#add_machine').css('background', 'none');
		$('#add_machine_owner').css('background', 'none');
		$('#add_test_name').css('background', 'none');
		$('#add_test_method_name').css('background', 'none');
		$('#add_test_method_for_customer').css('background', 'none');
		$('#add_version_of_pp').css('background', 'none');
		$('#add_construction').css('background', 'none');

		$('#add_pp_creation').css('background', 'none');
		$('#pp_wise_version_creation').css('background', 'none');
		$('#adding_process_to_version').css('background', 'none');
		$('#pp_monitoring').css('background', 'none');
		$('#partial_test_trf').css('background', 'none');
		$('#all_test_trf').css('background', 'none');
		$('#reprocess_trf').css('background', 'none');
		$('#partial_test_result').css('background', 'none');
		$('#all_test_result').css('background', 'none');
		$('#reprocess_all_test').css('background', 'none');

		$('#partial_test_report').css('background', 'none');
		$('#all_test_report').css('background', 'none');
		$('#customized_report').css('background', 'none');
		$('#pp_progress_report').css('background', 'none');
		$('#pp_status_report').css('background', 'black');
		

	    load_page('pp_progress_report/pp_status_report_filtering.php');
	}
</script>

<div class="col-sm-3 col-md-3 col-lg-3" style="background-color:#0C2D48; min-height:100%; ">					
									
	<h3>
		<img src="img/ng_icon2.bmp" style="width: 30px; height:30px; margin-bottom: 4px; background: #ffffff;" class="img-circle"/>
		<span class="text-primary" style="color:#FFFFFF">Noman Group</span>
	</h3>
								
	<!-- <img src="img/8571-1.JPG" style="width: 30px; height:30px; margin-bottom: 4px; background: #ffffff;" class="img-circle" alt="100x100"> -->
	<img src="img/<?php echo $row['profile_picture'] ?>" alt="..." class="img-circle profile_img" style="width: 30px; height:30px; margin-bottom: 4px; background: #ffffff;">

	<span class="text-primary" style="color:#FFFFFF; margin-left:5px;">Welcome, <?php echo $user_name;?></span>
	<br/>
	<span class="text-primary" style="color:#FFFFFF; margin-left:5px;"><?php echo $user_type;?> View</span>

<!-- Add All Your Left Side Menu=>Submenu From Here in Accordion Menu -->
									
	<div id="accordion" class="accordion_menu">
		<h3 style="font-size: 13px; color:#FFFFFF; background:none;"><span class="glyphicon glyphicon-user"></span>&nbsp;User </h3>
		<div style="padding-left:7px;">
			<button class="sub_menu panel text-left"  onclick="change_create_user_button_color()" id='create_user_list'><span  style="font-size: 11px;" >Create User</span></button>
			<button class="sub_menu panel text-left" onclick="change_create_button_color()" id='user_list'><span style="font-size: 11px;">User List</span></button>
			<button class="sub_menu panel text-left" onclick="change_department_info_button_color()" id="department_info"><span style="font-size: 11px;">Department Info</span></button>
		</div>
		<h3 style="font-size: 13px; color:#FFFFFF; background:none;">Settings</h3>
		<div style="padding-left:7px;">
			<!-- <button class="sub_menu panel text-left" onclick="change_key_account_manager_button_color()" id="key_account_manager"><span style="font-size: 11px;">Add key Account Manager</span></button> -->

			<button class="sub_menu panel text-left" onclick="change_add_buyer_button_color()" id="add_customer"><span style="font-size: 11px;">Add Buyer</span></button>

			<!-- <button class="sub_menu panel text-left" onclick="change_add_process_technique_button_color()" id="add_process_technique"><span style="font-size: 11px;">Add Process Technique</span></button> -->

			<button class="sub_menu panel text-left" onclick="change_add_style_name_button_color()" id="add_style_name"><span style="font-size: 11px;">Add Style Name</span></button>

			<button class="sub_menu panel text-left" onclick="change_add_color_button_color()" id="add_color"><span style="font-size: 11px;">Add Color Name</span></button>
			
			

			<!-- <button class="sub_menu panel text-left" onclick="change_add_trolley_button_color()" id="add_trolley"><span style="font-size: 11px;">Add Trolley</span></button>
			<button class="sub_menu panel text-left"  onclick="change_add_machine_button_color()" id="add_machine"><span style="font-size: 11px;">Add Machine Name</span></button>
			<button class="sub_menu panel text-left" onclick="change_add_machine_owner_button_color()" id="add_machine_owner"><span style="font-size: 11px;">Add Machine Owner Name</span></button>
			<button class="sub_menu panel text-left" onclick="change_add_test_name_button_color()" id="add_test_name"><span style="font-size: 11px;">Add Test Name</span></button>
			<button class="sub_menu panel text-left" onclick="change_add_test_method_name_button_color()" id="add_test_method_name"><span style="font-size: 11px;">Add Test Method Name</span></button>
			<button class="sub_menu panel text-left" onclick="change_add_test_method_for_customer_button_color()" id="add_test_method_for_customer"><span style="font-size: 11px;">Add Test Method for Customer</span></button>
			<button class="sub_menu panel text-left" onclick="change_add_version_of_pp_button_color()" id="add_version_of_pp"><span style="font-size: 11px;">Add Version of PP</span></button>
			<button class="sub_menu panel text-left" onclick="change_add_construction_button_color()" id="add_construction"><span style="font-size: 11px;">Add Construction for Version</span></button> -->
			
		</div>
		<h3 style="font-size: 13px; color:#FFFFFF; background:none;">Sewing</h3>
		<div style="padding-left:7px;">

		<button class="sub_menu panel text-left" onclick="change_add_swing_production_info_button_color()" id="add_swing_production_info"><span style="font-size: 11px;">Sewing Production Info</span></button>

		<button class="sub_menu panel text-left" onclick="change_swing_production_per_hour()" id="swing_production_per_hour"><span style="font-size: 11px;">Sewing Production Per Hour</span></button>

		<button class="sub_menu panel text-left" onclick="change_swing_floor_wise_report()" id="swing_floor_wise_report"><span style="font-size: 11px;">Sewing Day Wise Floor Report</span></button>

		<button class="sub_menu panel text-left" onclick="change_swing_line_and_position_wise_production_info_hourly_basis_report()" id="swing_line_and_position_wise_production_info_hourly_basis_report"><span style="font-size: 11px;">Sewing Position Wise Hourly Basis Production Report</span></button>

		<button class="sub_menu panel text-left" onclick="change_swing_production_info_hourly_basis_report()" id="swing_line_production_info_hourly_basis_report"><span style="font-size: 11px;">Hourly Basis Production Report</span></button>

        <button class="sub_menu panel text-left" onclick="change_swing_line_and_position_wise_production_info()" id="swing_line_and_position_wise_production_info"><span style="font-size: 11px;">Sewing Position Wise Production Info</span></button>

		<button class="sub_menu panel text-left" onclick="change_button_color_swing_line_and_position_wise_production_info_report()" id="swing_line_and_position_wise_production_info_report"><span style="font-size: 11px;">Sewing Position Wise Production Info Report</span></button>
        
		<button class="sub_menu panel text-left" onclick="change_swing_line_wise_production_info()" id="swing_line_wise_production_info"><span style="font-size: 11px;">Sewing Linewise Production Info</span></button>

		<button class="sub_menu panel text-left" onclick="change_swing_line_wise_production_info_report()" id="swing_line_wise_production_info_report"><span style="font-size: 11px;">Sewing Linewise Production Info Report</span></button>
        
		<!-- <button class="sub_menu panel text-left" onclick="change_pp_wise_version_creation_button_color()" id="pp_wise_version_creation"><span style="font-size: 11px;">PP Wise Version Creation</span></button>
		
		<button class="sub_menu panel text-left" onclick="change_adding_process_to_version_button_color()" id="adding_process_to_version"><span style="font-size: 11px;">Adding Process to Version</span></button> -->

		<!-- <button class="sub_menu panel text-left" onClick="load_page('process_program/quickly_defining_qc_standard_for_individual_process.php')"><span style="font-size: 11px;">Quickly Defining Qc Standard for Individual Process</span></button>

		<button class="sub_menu panel text-left" onClick="load_page('copy/multiple_copy_form.php')"><span style="font-size: 11px;">Single/Multiple Copy </span></button>
		 -->
		
		</div>


		


		<!-- <h3 style="font-size: 13px; color:#FFFFFF; background:none;">PP Monitoring</h3>
		<div style="padding-left:7px;">
			
			<button class="sub_menu panel text-left" onclick="change_pp_monitoring_button_color()" id="pp_monitoring"><span style="font-size: 11px;">PP Monitoring</span></button>
          
		</div>

		<h3 style="font-size: 13px; color:#FFFFFF; background:none;">Sample & Test Result</h3>
		<div style="padding-left:7px;">
			<h3 style="font-size: 13px; color:#FFFFFF; background:none;"> TRF</h3>
			<button class="sub_menu panel text-left" onclick="change_partial_test_trf_button_color()" id="partial_test_trf"><span style="font-size: 11px;">Partial Test</span></button>
			<button class="sub_menu panel text-left" onclick="change_all_test_trf_button_color()" id="all_test_trf"><span style="font-size: 11px;">All Test</span></button>
			<button class="sub_menu panel text-left" onclick="change_reprocess_trf_button_color()" id="reprocess_trf"><span style="font-size: 11px;">Reprocess TRF</span></button>
           
			<h3 style="font-size: 13px; color:#FFFFFF; background:none;"> Test Result</h3>
		      <div style="padding-left:8px;">
			     <button class="sub_menu panel text-left" onclick="change_partial_test_result_button_color()"  id="partial_test_result"><span style="font-size: 11px;">Partial Test</span></button>
			     <button class="sub_menu panel text-left" onclick="change_all_test_result_button_color()" id="all_test_result"><span style="font-size: 11px;">All Test</span></button>
			     <button class="sub_menu panel text-left" onclick="change_reprocess_all_test_button_color()" id="reprocess_all_test"><span style="font-size: 11px;">Reprocess For Test Result</span></button>
		      </div>
		   
		</div> -->


		


	 

		<!-- <h3 style="font-size: 13px; color:#FFFFFF; background:none;">Report/Overview</h3>
		<div style="padding-left:7px;">
		  <h3 style="font-size: 13px; color:#FFFFFF; background:none;">Test Report</h3>
		     <div style="padding-left:7px;">
				<button class="sub_menu panel text-left" onclick="change_partial_test_report_button_color()" id="partial_test_report"><span style="font-size: 11px;">Partial Test Report</span></button>

				<button class="sub_menu panel text-left" onclick="change_all_test_report_button_color()" id="all_test_report"><span style="font-size: 11px;">All Test Report</span></button>
				
				<button class="sub_menu panel text-left" onclick="change_customized_report_button_color()" id="customized_report"><span style="font-size: 11px;">Customized Report</span></button>
			 </div>



		    <h3 style="font-size: 13px; color:#FFFFFF; background:none;">Production Report</h3>
		       <div style="padding-left:7px;">
			     <button class="sub_menu panel text-left" onclick="change_pp_progress_report_button_color()" id="pp_progress_report"><span style="font-size: 11px;">PP Progress Report</span></button>
			     <button class="sub_menu panel text-left"onclick="change_pp_status_report_button_color()" id="pp_status_report"><span style="font-size: 11px;">PP Status Report</span></button>

		     </div>	
		 </div> --> 

	</div> <!-- End of <div id="accordion"> -->
</div> <!--End of <div class="col-sm-3 col-md-3 col-lg-3" style="background-color:#add8e6; height:100%;"> -->
                
		