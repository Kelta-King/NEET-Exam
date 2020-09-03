<?php
	session_start();
	function test_input($data) 
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	if(isset($_SESSION['admin_login_user']) && isset($_REQUEST['name']) && isset($_REQUEST['rollNo']) && isset($_REQUEST['email']) && isset($_REQUEST['mobile']) && isset($_REQUEST['gender'])){
		
		$name = test_input($_REQUEST['name']);
		$rollNo = test_input($_REQUEST['rollNo']);
		$email = test_input($_REQUEST['email']);
		$mobile = test_input($_REQUEST['mobile']);
		$gender = test_input($_REQUEST['gender']);
		
		require_once("../../AdminDb/dbconnect.php");
		
		$query = "SELECT s_id FROM students WHERE s_email = '$email'";
		
		if($data = $conn->query($query)){
		    if($data->num_rows > 0){
		        die("Already used email");
		    }
		}
		
		$query = "SELECT s_id FROM students WHERE s_number = $rollNo";
		
		if($data = $conn->query($query)){
		    if($data->num_rows > 0){
		        die("Already used number");
		    }
		}
		
		
		$opt = [
			'cost' => 12
		];
		$last_id = 0;

        function randomPassword($length,$count, $characters) {
     
        $symbols = array();
        $passwords = array();
        $used_symbols = '';
        $pass = '';
     
        $symbols["lower_case"] = 'abcdefghijklmnopqrstuvwxyz';
        $symbols["upper_case"] = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $symbols["numbers"] = '1234567890';
        $symbols["special_symbols"] = '';
     
        $characters = explode(",",$characters); 
        foreach ($characters as $key=>$value) {
            $used_symbols .= $symbols[$value]; 
        }
        $symbols_length = strlen($used_symbols) - 1; 
         
        for ($p = 0; $p < $count; $p++) {
            $pass = '';
            for ($i = 0; $i < $length; $i++) {
                $n = rand(0, $symbols_length); 
                $pass .= $used_symbols[$n]; 
            }
            $passwords[] = $pass;
        }
         
        return $passwords; 
    }
 
        $passwords = randomPassword(10,1,"lower_case,upper_case,numbers,special_symbols");
        
        $password = $passwords[0];

        $to = $email;
        $subject = 'Test details';
        $from = 'NEET_Mock_test@keltaking.co';
             
            // To send HTML mail, the Content-type header must be set
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
             
            // Create email headers
        $headers .= 'From: '.$from."\r\n".'Reply-To: '.$from."\r\n".'X-Mailer: PHP/' . phpversion();
             
            // Compose a simple HTML email message
        $message = '<html><body><h1 style="color:green">We have registered you for the NEET mock test</h1><p>Below is your login details:- <br><br>RollNo: '.$rollNo.'<br>password: '.$password.'<br><br>Visit <a href="https://keltaking.co/Exams/login">Exam page</a> accoring to your preference timing (between 6-8 September). Login to the site and answer the test. Results will be declrared on 9th September. <hr><br> You can give test on mobile, tablet or laptop but <b>We suggest you to attend test on Laptop for better experience.</b> <br><br>In case of any query <a href="https://keltaking.co/Exams/contact">Contact us</a>.<br><br>This is a software generated email. Do not reply to this email.</p></body></html>';
            

		$pass = password_hash($password, PASSWORD_BCRYPT, $opt);
		$msg = "Thanks for registering ".$name."\nWe have recieved your data and here is the login details and link for your exams.\nRollNo: ".$rollNo."\npassword: ".$password."\nvisit https://keltaking.co/Exams/login accoring to your preference time between 6-8 Sept. Login to the site and give answer the test. Results will be declrared on 9th Sept. \n\n You can give test on mobile, tablet or laptop but we suggest you to attend test on Laptop for better experience.";
		
		$query1 = "INSERT INTO students(s_name, s_number, s_pass, s_email, s_phone, gender, vkey, verified, msg, score, bio, phy, inc_count) VALUES('$name', $rollNo ,'$pass','$email','$mobile', '$gender', '123456789', '1', '$msg', 0, 0, 0, 0)";
		
		
		if($data1 = $conn->query($query1)){
			
			
			
			if(mail($to, $subject, $message, $headers)){
			    echo $msg;
            } else{
                echo "Date entered but mail not sent";
            }
			
		}
		else{
			echo "Already registered";
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