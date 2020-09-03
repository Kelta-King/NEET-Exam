<?php
	session_start();

	//if loginprocess is not started then user cannot access this page
	if(isset($_SESSION['admin_login_process']) && ($_SESSION['admin_login_process'] == "start")) {
		
		function test_input($data) 
		{
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

	if(isset($_REQUEST['RollNo']) && isset($_REQUEST['Pass'])){
		$RollNo = test_input($_POST['RollNo']);
		$Pass = test_input($_POST['Pass']);
	
		$query1 = "SELECT * FROM `admins` WHERE a_number = $RollNo";
		$query1 = sprintf("SELECT * FROM `admins` WHERE a_number = %d", $RollNo);

    require_once("../AdminDb/dbconnect.php");

	if($data = $conn->query($query1)){
			
    	if($data->num_rows <= 0){
    		echo "incorrect details";
    	}
	    else{
	    	while($result = $data->fetch_assoc()){
				
    			$dbpass = $result['a_pass'];
    			if(password_verify($Pass, $dbpass)){
    					$_SESSION['admin_login_user'] = $result['a_id']."&".$result['a_type'];
    					$_SESSION['admin_type'] = $result['a_type'];
    			}
    			else{
    				echo "incorrect details";
    			}
			}
		}
	}
	else{
		echo "something went wrong";
	}
	    $conn->close();
	}
	else{
		echo "Something went wrong";
	}

	}
	else{
		header("Location:logout.php");
	}
?>
