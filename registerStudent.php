<?php

session_start();

//redirects to join if data is not inturrupted

if(isset($_SESSION['register']) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['contno'])){

    unset($_SESSION['register']);
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['contno'];

    require_once("Db/dbconnect.php");
    
    $query = "SELECT `s_id`,`s_name` FROM `students` WHERE s_email = '$email'";
    
    if($data = $conn->query($query)){
        
        if($data->num_rows <= 0){
            echo "Incorrect email";
        }
        else if($data->num_rows == 1){
            
            $result = $data->fetch_assoc();
                
            $id = $result['s_id'];
            $name = $result['s_name'];
            $url = base64_encode($id."&".$name);
            
            $_SESSION['login_student'] = $url;
            header("Location:join?name=".$url);
            
        }
        else{
            echo "Incorrect details";
        }
        
    }
    else{
        echo "Something went wrong";
        
    }
    
    $conn->close();
}
else{
    header("Location:logout");
}

?>