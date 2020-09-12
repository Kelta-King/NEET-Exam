<?php

session_start();

//redirects to join if data is not inturrupted

if(isset($_SESSION['login']) && isset($_POST['rollno']) && isset($_POST['pass'])){

    if($_SESSION['login'] != "yes"){
        die("Something went wrong");
    }
    
    unset($_SESSION['register']);
    
    $rollno = $_POST['rollno'];
    $pass = $_POST['pass'];

    require_once("Db/dbconnect.php");
    
    $query = "SELECT `s_id`,`s_name` FROM `students` WHERE s_number = $rollno";
    
    if($data = $conn->query($query)){
        
        if($data->num_rows <= 0){
            echo "Incorrect Roll No";
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