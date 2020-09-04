<?php

session_start();

if(isset($_REQUEST['name']) && isset($_REQUEST['email']) && isset($_REQUEST['problem']) && isset($_REQUEST['msg'])){
    
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $problem = $_REQUEST['problem'];
    $msg = $_REQUEST['msg'];
    
    require_once("../Db/dbconnect.php");
    
    $query = "INSERT INTO contacts(c_name, c_email, c_problem, c_msg) VALUES('$name', '$email', '$problem', '$msg')";
    
    if($data = $conn->query($query)){
	
		$r = "<div class='w3-round w3-center w3-padding' style='background-color:#66ff66;color:green;border:1px solid white'>We have received your query.</div>";
		
		$to = "kshitijpanchal131@gmail.com";
        $subject = 'NEET demo test contact';
        $from = 'assistant1@keltaking.co';
             
        // To send HTML mail, the Content-type header must be set
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
             
        // Create email headers
        $headers .= 'From: '.$from."\r\n".'Reply-To: '.$from."\r\n".'X-Mailer: PHP/' . phpversion();
             
        // Compose a simple HTML email message
        $message = '<html><body><h1 style="color:black">'.$name.' has problem is NEET site</h1><br><hr><p><b>The contact details are: </b><br><br>Name: '.$name.'<br>Email: '.$email.'<br>problem: '.$problem.'<br>Message: '.$msg.'</p></body></html>';
         
        if(mail($to, $subject, $message, $headers)){
            echo $r;
        }
        else{
            echo "<div class='w3-round w3-center w3-padding' style='background-color:#66ff66;color:green;border:1px solid white'>Your message has been recorded</div>";
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