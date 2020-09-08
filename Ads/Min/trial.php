<?php

require_once("../AdminDb/dbconnect.php");

$answers = array(0,3,12,1,4,4,1,3,1,3,2,4,2,1,4,3,2,3,4,1,1,1,1,4,4,1,3,3,4,2,3,4,1,3,1,3,2,4,3,4,3,4,3,4,1,3,2,1,3,2,3,2,1,4,3,4,2,3,2,1,4,1,2,3,1,2,3,3,4,3,3,1,1,4,1,3,4,4,4,3,1,4,4,4,1,1,2,4,1,3);

$j = 1;
for($i = 91;$i<=180;$i++){
    
    $q_data = addslashes("<center><img src='https://keltaking.co/Exams/Student/Imgs/Biology/English/qbio_eng_data_".$i.".jpg' class='w3-image'></center>");
    $q_op1 = addslashes("<img src='https://keltaking.co/Exams/Student/Imgs/Biology/English/qbio_eng_op1_".$i.".jpg' class='w3-image'>");
    $q_op2 = addslashes("<img src='https://keltaking.co/Exams/Student/Imgs/Biology/English/qbio_eng_op2_".$i.".jpg' class='w3-image'>");
    $q_op3 = addslashes("<img src='https://keltaking.co/Exams/Student/Imgs/Biology/English/qbio_eng_op3_".$i.".jpg' class='w3-image'>");
    $q_op4 = addslashes("<img src='https://keltaking.co/Exams/Student/Imgs/Biology/English/qbio_eng_op4_".$i.".jpg' class='w3-image'>");
    $q_answer = "";
    
    $q_data_guj = addslashes("<center><img src='https://keltaking.co/Exams/Student/Imgs/Biology/Gujarati/qbio_guj_data_".$i.".jpg' class='w3-image'></center>");
    $q_op1_guj = addslashes("<img src='https://keltaking.co/Exams/Student/Imgs/Biology/Gujarati/qbio_guj_op1_".$i.".jpg' class='w3-image'>");
    $q_op2_guj = addslashes("<img src='https://keltaking.co/Exams/Student/Imgs/Biology/Gujarati/qbio_guj_op2_".$i.".jpg' class='w3-image'>");
    $q_op3_guj = addslashes("<img src='https://keltaking.co/Exams/Student/Imgs/Biology/Gujarati/qbio_guj_op3_".$i.".jpg' class='w3-image'>");
    $q_op4_guj = addslashes("<img src='https://keltaking.co/Exams/Student/Imgs/Biology/Gujarati/qbio_guj_op4_".$i.".jpg' class='w3-image'>");
    $q_answer_guj = "";
    
    $q_sub = "Bio";
    
    switch($answers[$j]){
        
        case 1:
            $q_answer = $q_op1;
            $q_answer_guj = $q_op1_guj;
            echo "<br><br>$j answer is op1";
            break;
            
        case 2:
            $q_answer = $q_op2;
            $q_answer_guj = $q_op1_guj;
            echo "<br><br>$j answer is op2";
            break;
            
        case 3:
            $q_answer = $q_op3;
            $q_answer_guj = $q_op1_guj;
            echo "<br><br>$j answer is op3";
            break;
            
        case 4:
            $q_answer = $q_op4;
            $q_answer_guj = $q_op1_guj;
            echo "<br><br>$j answer is op4";
            break;
            
        default:
            $q_answer = $q_op1;
            $q_answer_guj = $q_op1_guj;
            echo "<br><br>$j answer is op1";
            break;

    }
    
    $j++;
    
    $qry = "INSERT INTO questions (`q_number`, `q_data`, `q_op1`, `q_op2`, `q_op3`, `q_op4`, q_answer, q_data_guj, q_op1_guj, q_op2_guj, q_op3_guj, q_op4_guj, q_answer_guj, q_sub) VALUES($i, '$q_data', '$q_op1', '$q_op2', '$q_op3','$q_op4', '$q_answer','$q_data_guj', '$q_op1_guj', '$q_op2_guj', '$q_op3_guj','$q_op4_guj', '$q_answer_guj', '$q_sub')";
    
    if($conn->query($qry)){
        echo "<br>$i inserted";
    }
    else{
        echo "<br>$i Not inserted";
    }
    
}

$conn->close();

?>