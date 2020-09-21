<?php

session_start();

if(isset($_SESSION['login_student']) && isset($_SESSION['exam_subject']) && isset($_SESSION['exam_start']) && isset($_SESSION['student_lang'])){
    
    $dts = explode("&",base64_decode($_SESSION['login_student']));
    $id = $dts[0];
    $name = $dts[1];
    
    require_once("../../Db/dbconnect.php");
    
    $query = "UPDATE students SET end_test = '1' WHERE s_id = $id";
    
    if($conn->query($query)){
        unset($_SESSION['exam_subject']);
        unset($_SESSION['exam_start']);
        unset($_SESSION['student_lang']);
    }
    else{
        echo "Something went wrong";
    }

    $conn->close();
}
else{
    die("Something went wrong"); 
}

?>