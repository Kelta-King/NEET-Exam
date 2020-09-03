<?php
	session_start();
	function test_input($data) 
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	if(isset($_SESSION['admin_login_user']) && isset($_REQUEST['q_no']) && isset($_REQUEST['q_data_e']) && isset($_REQUEST['q_op1_e']) && isset($_REQUEST['q_op2_e']) && isset($_REQUEST['q_op3_e']) && isset($_REQUEST['q_op4_e']) && isset($_REQUEST['q_ans_e']) && isset($_REQUEST['q_hint_e']) && isset($_REQUEST['q_data_g']) && isset($_REQUEST['q_op1_g']) && isset($_REQUEST['q_op2_g']) && isset($_REQUEST['q_op3_g']) && isset($_REQUEST['q_op4_g']) && isset($_REQUEST['q_ans_g']) && isset($_REQUEST['q_hint_g']) && isset($_REQUEST['q_type'])){
		
		$no = test_input($_REQUEST['q_no']);
		$q_data_e = test_input($_REQUEST['q_data_e']);
		$q_op1_e = test_input($_REQUEST['q_op1_e']);
		$q_op2_e = test_input($_REQUEST['q_op2_e']);
		$q_op3_e = test_input($_REQUEST['q_op3_e']);
		$q_op4_e = test_input($_REQUEST['q_op4_e']);
		$q_ans_e = test_input($_REQUEST['q_ans_e']);
		$q_hint_e = test_input($_REQUEST['q_hint_e']);
		$q_data_g = test_input($_REQUEST['q_data_g']);
		$q_op1_g = test_input($_REQUEST['q_op1_g']);
		$q_op2_g = test_input($_REQUEST['q_op2_g']);
		$q_op3_g = test_input($_REQUEST['q_op3_g']);
		$q_op4_g = test_input($_REQUEST['q_op4_g']);
		$q_ans_g = test_input($_REQUEST['q_ans_g']);
		$q_hint_g = test_input($_REQUEST['q_hint_g']);
		$q_type = test_input($_REQUEST['q_type']);
		
		require_once("../../AdminDb/dbconnect.php");
		
		$query = "INSERT INTO `questions`(q_number, q_data, q_op1, q_op2, q_op3, q_op4, q_answer, q_hint, q_data_guj, q_op1_guj, q_op2_guj, q_op3_guj, q_op4_guj, q_answer_guj, q_hint_guj, q_sub) VALUES($no, '$q_data_e', '$q_op1_e', '$q_op2_e', '$q_op3_e', '$q_op4_e', '$q_ans_e', '$q_hint_e', '$q_data_g', '$q_op1_g', '$q_op2_g', '$q_op3_g', '$q_op4_g', '$q_ans_g', '$q_hint_g', $q_type)";
		
		if($conn->query($query)){
		    
		}
		else{
		    echo $query;
		    echo "Something went wrong";
		}
		
		$conn->close();
		
	}
	elseif(isset($_SESSION['admin_login_user'])){
		echo "something went wrong";
	}
	else{
		header('Location:https://keltaking.co/Exams/Ads/Min/logout');
	}
?>