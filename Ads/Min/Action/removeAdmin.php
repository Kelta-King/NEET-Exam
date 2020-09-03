<?php
	session_start();
	function test_input($data) 
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	if(isset($_SESSION['admin_login_user']) || isset($_REQUEST['admin_id']) ){
		
		$admin_id = test_input($_REQUEST['admin_id']);
		
		require_once("../../AdminDb/dbconnect.php");
		
		$query = "DELETE FROM `admins` WHERE a_id = $admin_id";
		
		if($conn->query($query)){
			
		}
		else{
			echo "Something went wrong";
		}
	}
	else{
		header('Location:https://keltaking.co/Exams/Ads/min/logout');
	}
?>