<?php
	session_start();
	function test_input($data) 
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	if(isset($_SESSION['admin_login_user']) && isset($_SESSION['admin_login_process']))
	{
		unset($_SESSION['admin_login_process']);
		header("Location:home");
	}
	else{
		header("Location:logout");
	}
?>