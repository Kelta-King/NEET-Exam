<?php
	session_start();
	function test_input($data) 
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	if(isset($_SESSION['admin_login_user']) && isset($_REQUEST['admin_name']) && isset($_REQUEST['admin_number']) && isset($_REQUEST['admin_pass']) && isset($_REQUEST['admin_type'])){
		
		$admin_name = test_input($_REQUEST['admin_name']);
		$admin_id = test_input($_REQUEST['admin_number']);
		$admin_pass = test_input($_REQUEST['admin_pass']);
		$admin_type = test_input($_REQUEST['admin_type']);
		
		require_once("../../AdminDb/dbconnect.php");
		$opt = [
			'cost' => 12
		];
		
		$admin_pass = password_hash($admin_pass, PASSWORD_BCRYPT, $opt);
		$query = "INSERT INTO `admins`(a_name, a_number, a_pass, a_type) VALUES ('$admin_name', $admin_id, '$admin_pass', '$admin_type')";
		if($conn->query($query)){
			
		}
		else{
			echo "Already registered";
		}
	}
	else{
		header('Location:https://keltaking.co/Exams/Ads/min/logout');
	}
?>