<?php
	session_start();
	function test_input($data) 
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	if(isset($_SESSION['admin_login_user'])){

    require_once("../AdminDb/dbconnect.php");
	
	$qry = "SELECT s_id, s_name, s_email, vkey FROM students";
	
	if($data = $conn->query($qry)){
	
	while($rslt = $data->fetch_assoc()){
    	
    	$to = $rslt['s_email'];
    	$subject = 'Test is live';
        $from = 'NEET_Mock_test@keltaking.co';
        $name = $rslt['s_name'];
        $vkey = $rslt['vkey'];
        
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'From: '.$from."\r\n".'Reply-To: '.$from."\r\n".'X-Mailer: PHP/' . phpversion();
    
        $d = $id%5;
    
        switch($d){
            
            case 0:
                $str = "Attempt the test in between 7 to 12 PM on 06/09/2020 evening is preferable for you.";
                break;
                
            case 1:
                $str = "Attempt the test in between 7 to 12 PM on 07/09/2020 evening is preferable for you.";
                break;
                
            case 2:
                $str = "Attempt the test in between 7 to 11 PM on 08/09/2020 evening is preferable for you. <b>But remember that test will not accept responses after 11:59 PM on 08/09/2020.</b>";
                break;
                
            case 3:
                $str = "Attempt the test in between 7 to 11 AM on 07/09/2020 morning is preferable for you.";
                break;
                
            case 4:
                $str = "Attempt the test in between 7 to 11 AM on 08/09/2020 morning is preferable for you.";
                break;
            
        }
    
        $message = '<html><body><h1 style="color:green">Test is live now.</h1><p>Dear '.$name.',<br>'.$str.'<br><br>If you have not verified your email then visit this <a href="https://keltaking.co/Exams/verify?vkey='.$vkey.'"><button style="background-color:blue;color:white">verification link</button></a> <br><b>Non varified students are not allowed to attend the test.</b><br> Test will stop accepting responses of exams after the 11:59 PM of 08/09/2020. Results will be declrare on 9th September. You can give the test on mobile, tablet or laptop but <b>We suggest you to attend test on Laptop for better experience.</b> <br><br>In case of any query <a href="https://keltaking.co/Exams/contact">Contact us</a>.<br><br>This is a software generated email. Do not reply to this email.</p></body></html>';
            
        if(mail($to, $subject, $message, $headers)){
            echo "<br><br>mail sent to ".$name;
        }
        else{
            echo "<br><br>not sent to ".$name;
        }
	}
	}
	$conn->close();

}
?>