<?php

session_start();

if(isset($_SESSION['login_student']) && isset($_REQUEST['name'])){
    
    $dts = explode("&",base64_decode($_SESSION['login_student']));
    $id = $dts[0];
    $name = $dts[1];
    
    require_once("Db/dbconnect.php");
    
    $q = "SELECT verified FROM students WHERE s_id = $id";
    
    if($d = $conn->query($q)){
        
        $rslt = $d->fetch_assoc();
        
        if($rslt['verified'] == '1'){
            header("Location:Student/startTest");
        }
        else{
?>

<!-- Notverified account area -->

<?php
            include("Parts/nonverified.php");
        }
        
    }
    else{
        echo "Something went wrong, Please try again later"; 
    }
    
    
?>
<?php
    
    $conn->close();
}
else{
    header("Location:logout"); 
}

?>
