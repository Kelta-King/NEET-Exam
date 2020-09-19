<?php

session_start();

if(isset($_SESSION['login_student']) && isset($_REQUEST['sub']) && isset($_SESSION['exam_subject'])){
    
    $dts = explode("&",base64_decode($_SESSION['login_student']));
    $id = $dts[0];
    $name = $dts[1];
    $sub = $_REQUEST['sub'];

    require_once("../../Db/dbconnect.php");

    $_SESSION['exam_subject'] = $sub;

    $query = "SELECT COUNT(q_id) FROM questions WHERE q_sub = '".$_SESSION['exam_subject']."'";
    
    if($d = $conn->query($query)){
        
        $rslt = $d->fetch_assoc();
        echo $rslt['COUNT(q_id)'];
        
    }
    else{
        echo "Something went wrong";
    }

    $conn->close();
    
}
else{
    die("Nothing changed");
}

?>