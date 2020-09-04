<?php

session_start();

if(isset($_REQUEST['rollno']) && isset($_REQUEST['pass'])){
    
    $rollno = $_REQUEST['rollno'];
    $pass = $_REQUEST['pass'];
    require_once("../Db/dbconnect.php");
    
    $query = "SELECT s_id, s_pass FROM students WHERE s_number = $rollno";
    
    if($data = $conn->query($query)){
	
		if($data->num_rows > 0){
			
			while($result = $data->fetch_assoc()){
				$dbpass = $result['s_pass'];
				
				if(password_verify($pass, $dbpass)){
					$_SESSION['login'] = "yes";
	    		}
	   			else{
					echo "incorrect password";
				}
			}	
		}
		else{
			echo "incorrect Roll No or Password";
		}
			
	}
	else{
		echo "something went wrong";
	}
		
	$conn->close();
	
}
else{
    die("Something went wrong");
}

?>