<?php

session_start();

if(isset($_SESSION['login_student']) && isset($_SESSION['exam_subject']) && isset($_SESSION['exam_start'])){
    
    $dts = explode("&",base64_decode($_SESSION['login_student']));
    $id = $dts[0];
    $name = $dts[1];
    $dts = explode("&",base64_decode($_SESSION['exam_start']));
    $id_s = $dts[0];
    $name_s = $dts[1];
    $lang = $dts[2];
    $dist = $dts[3];
    $q_no = 45;
    
    if($id != $id_s || $name != $name_s){
        die("Something went wrong");
    }
    
    require_once("../Db/dbconnect.php");

    $str = base64_encode($id."&".$name);

    if($lang == "English"){
        
        header("location:exam_eg?dtatm=".$str);
        
    }
    else{
        
        header("location:exam_gj?dtatm=".$str);
        
    }

    $conn->close();
}
else{
    header("Location:../logout"); 
}
?>
