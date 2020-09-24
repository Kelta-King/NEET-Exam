<?php

if(isset($_REQUEST['vkey'])){
    
    require_once("Db/dbconnect.php");
    
    $vkey = $_REQUEST['vkey'];
    $query = "SELECT verified, s_name FROM students WHERE vkey = '$vkey'";
    
    if($data = $conn->query($query)){
        
        if($data->num_rows <= 0){
            echo "<span style='color:red;'>Not verified. Please signup to verify</span>";
        }
        else if($data->num_rows == 1){
            
            $result = $data->fetch_assoc();
            $u_name = $result['s_name'];
            $qry = "UPDATE students SET verified = '1' WHERE vkey = '$vkey'";
            
            if($conn->query($qry)){
                
                echo "<span style='color:green;'>Your email address has been verified. You can give test through <a href='https://keltaking.co/Exams/login'>this exam link</a></span>";
            }
            else{
                echo "<span style='color:red;'>Not verified. Please try again later</span>";
            }
            
        }
        else{
            echo "<span style='color:green;'>This email is already varified</span>";
        }
        
    }
    else{
        echo "<span style='color:red;'>Not verified. Please contact Exam organizers</span>";
    }
    
    $conn->close();
    
}
else{
    header("Location:logout");
}

?>