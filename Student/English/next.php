<?php

session_start();

if(isset($_SESSION['login_student']) && isset($_REQUEST['number']) && isset($_SESSION['exam_subject'])){
    
    $dts = explode("&",base64_decode($_SESSION['login_student']));
    $id = $dts[0];
    $name = $dts[1];
    $number = $_REQUEST['number'];
    $subject = $_SESSION['exam_subject'];
    
    if(($subject == "Phy" && $number == 45) || ($subject == "Chem" && $number == 90) || ($subject == "Bio" && $number == 180)){
        
        die("not");
        
    }
    else{
    
        die("ok");    
        
    }
        
    
    
}
else{
    die("Nothing changed");
}

?>