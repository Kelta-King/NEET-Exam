<?php

session_start();

function test_input($data) 
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

if(isset($_SESSION['login_student']) && isset($_REQUEST['Email']) && isset($_REQUEST['Id'])){
    
    require_once("../Db/dbconnect.php");
    $dts = explode("&",base64_decode($_SESSION['login_student']));
    $id = $dts[0];
    $name = $dts[2];
    $email = $_REQUEST['Email'];
    $idr = $_REQUEST['Id'];
    
    if($id != $idr){
        die("Things don't go well");
    }
    
    $query = "SELECT s_id FROM students WHERE s_email = '$email'";
    
	if($data = $conn->query($query)){
	    
	    if($data->num_rows > 0){
	        
	        $rslt = $data->fetch_assoc();
	        if($rslt['s_id'] != $id){
	            die("Already used email");
	        }
	        
	    }
	}
    
    $vkey = -1;
    $rollNo = 20201000;
    $query = "SELECT s_number, vkey FROM students WHERE s_id = $id";
    
    if($data = $conn->query($query)){
        
        $result = $data->fetch_assoc();
        $vkey = $result['vkey'];
        $rollNo = $result['s_number'];
        
    }
    else{
        die("something went wrong");
    }
    
    $opt = [
		'cost' => 12
	];
    
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
    
    $pass = password_hash($password, PASSWORD_BCRYPT, $opt);
	
    $query = "UPDATE students SET s_email = '$email', s_pass = '$pass' WHERE s_id = $id";
    
    if($conn->query($query)){
        
        $to = $email;
        $subject = 'Test details';
        $from = 'NEET_Mock_test@keltaking.co';
         
        // To send HTML mail, the Content-type header must be set
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
             
        // Create email headers
        $headers .= 'From: '.$from."\r\n".'Reply-To: '.$from."\r\n".'X-Mailer: PHP/' . phpversion();
             
        // Compose a simple HTML email message
        $message = '<html><body><h1 style="color:green">We have updated your email for the NEET mock test.</h1><br><p>To give test verify your email by clicking <a href="https://keltaking.co/Exams/verify?vkey='.$vkey.'">here</a>.<br><b>Note: Only varified students are allowed to attend the test</b><br><br>Below is your login details:- <br><br>RollNo: '.$rollNo.'<br>password: '.$password.'<br><br>Visit <a href="https://keltaking.co/Exams/login">Exam page</a> accoring to your preference timing (between 6-8 September). Login to the site and answer the test. Results will be declrared on 9th September. <hr><br> You can give test on mobile, tablet or laptop but <b>We suggest you to attend test on bigger screens (Laptop or PC) for better experience.</b> <br><br>In case of any query <a href="https://keltaking.co/Exams/contact">Contact us</a>.<br><br>This is a software generated email. Do not reply to this email.</p></body></html>';
            
        if(!mail($email,$subject,$message,$headers)){
            echo "Mail updated but not sent. Please try after some time";
        }
        
    }
    else{
        echo "Something went wrong2";
    }
    
    $conn->close();
    
}
else if(isset($_SESSION['login_student'])){
    die("Login first");
}
else{
    header("Location:../logout");   
}

?>