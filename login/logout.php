<?php

	session_start();

	function logout()
	{
		unset($_SESSION['user_id']);
		unset($_SESSION['user_name']);
		unset($_SESSION['password']);
		unset($_SESSION['login']);
		session_unset();
		session_destroy();
	}
	
	logout();
	
	header('Location:login.php');
	
?>

