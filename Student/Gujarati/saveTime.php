<?php

session_start();

if(isset($_SESSION['login_student']) && isset($_REQUEST['time'])){
    
    $dts = explode("&",base64_decode($_SESSION['login_student']));
    $id = $dts[0];
    $name = $dts[1];
    $time = $_REQUEST['time'];

    require_once("../../Db/dbconnect.php");
    
    $query = "UPDATE students SET timer = '$time' WHERE s_id = $id";
    
    if($conn->query($query)){
        
    }
    else{
        die("Something went wrong");
    }

    $conn->close();
}
else{
    die("Nope"); 
}

?>