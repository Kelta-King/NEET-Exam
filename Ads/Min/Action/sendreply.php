<?php
	session_start();
	function test_input($data) 
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	if(isset($_SESSION['admin_login_user']) && isset($_REQUEST['c_id']) && isset($_REQUEST['msg']) && isset($_REQUEST['email'])){
		
		$c_id = test_input($_REQUEST['c_id']);
		$email = test_input($_REQUEST['email']);
		$msg = test_input($_REQUEST['msg']);
		
		require_once("../../AdminDb/dbconnect.php");
		
		$query = "SELECT c_msg FROM contacts WHERE c_id = $c_id";
		$c_msg = "Probllem statement";
		
		if($data = $conn->query($query)){
		    
		    $rslt = $data->fetch_assoc();
		    $c_msg = $rslt['c_msg'];
		    
		}
		else{
		    die("Something went wrong");
		}
		
		$to = $email;
        $subject = 'Reply from NEET Mock test';
        $from = 'NEET_Mock_test@keltaking.co';
             
            // To send HTML mail, the Content-type header must be set
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
             
            // Create email headers
        $headers .= 'From: '.$from."\r\n".'Reply-To: '.$from."\r\n".'X-Mailer: PHP/' . phpversion();
             
            // Compose a simple HTML email message
        $message = '<html><body><h1 style="color:green">We replied to your problem</h1><br><b>You contacted us for this reason:</b><br>'.$c_msg.'<br><br><b>Here is the response of it:</b><br>'.$msg.'<br><br>This is a software generated email. Please do not reply.</body></html>';
        
        if(mail($to, $subject, $message, $headers)){
		    echo "<div class='w3-round w3-center w3-padding' style='background-color:#66ff66;color:green;border:1px solid white'>Reply sent</div>";
        } 
        else{
            echo "Date entered but mail not sent";
        }
		
		$query = "UPDATE contacts SET solve = '1' WHERE c_id = $c_id";
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