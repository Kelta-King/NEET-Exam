<?php
	session_start();
	function test_input($data) 
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	if(isset($_SESSION['admin_login_user']) || isset($_REQUEST['userId']) || isset($_REQUEST['old_pass']) || isset($_REQUEST['new_pass'])){
	
		$userId = $_REQUEST['userId'];
		$old_pass = $_REQUEST['old_pass'];
		$new_pass = $_REQUEST['new_pass'];
		
		$query = "SELECT `a_id`, `a_pass` FROM `admins` WHERE a_number = $userId";
		
		require_once("../../AdminDb/dbconnect.php");
		
		if($data = $conn->query($query)){
			
			if($data->num_rows <= 0){
				echo "userId is incorrect";
			}
			else{
				
				while($result = $data->fetch_assoc()){
					
					$dbpass = $result['a_pass'];
					
					if(password_verify($old_pass,$dbpass)){
						
						$opt = [
							'cost' => 12
						];
						$pass = password_hash($new_pass, PASSWORD_BCRYPT, $opt);
						$query1 = "UPDATE admins SET a_pass = '$pass' WHERE a_number = $userId";
						if($conn->query($query1)){
							
						}
						else{
							echo "something went wrong1";
						}
						
					}
					else{
						echo "password didn't match";
					}
					
				}
				
			}
			
		}
		else{
			echo "something went wrong2";
		}
	
	}
	else{
		header('Location:https://keltaking.co/Exams/Ads/Min/logout');
	}
?>