<?php

session_start();

if(isset($_SESSION['login_student']) && isset($_REQUEST['number']) && isset($_SESSION['exam_subject'])){
    
    $dts = explode("&",base64_decode($_SESSION['login_student']));
    $id = $dts[0];
    $name = $dts[1];
    $number = $_REQUEST['number'];

    require_once("../../Db/dbconnect.php");
    
    $s_ans = "none";
    
    $qry = "SELECT attempt, s_ans FROM que_stu_asn WHERE q_number = $number AND s_id = $id AND subject = '".$_SESSION['exam_subject']."'";
    
    if($d = $conn->query($qry)){
        
        $r = $d->fetch_assoc();
        if($r['attempt'] == 0){
            $s_ans = "none";
        }
        else{
            $s_ans = $r['s_ans'];
        }
        
    }
    else{
        $s_ans = "none";
    }
    
    $query = "SELECT q_number, q_data_guj, q_op1_guj, q_op2_guj, q_op3_guj, q_op4_guj FROM questions WHERE q_number = $number AND q_sub = '".$_SESSION['exam_subject']."'";

    
    if($data = $conn->query($query)){
        
        $rslt = $data->fetch_assoc();
        $op1 = $rslt['q_op1_guj'];
        $op2 = $rslt['q_op2_guj'];
        $op3 = $rslt['q_op3_guj'];
        $op4 = $rslt['q_op4_guj'];
        
        if($s_ans == "none"){
            $op1 = "<input type=\"radio\" name=\"op\" id=\"o1\" onclick=\"save()\" value=\"$op1\"> ".$op1;
            $op2 = "<input type=\"radio\" name=\"op\" id=\"o2\" onclick=\"save()\" value=\"$op2\"> ".$op2;
            $op3 = "<input type=\"radio\" name=\"op\" id=\"o3\" onclick=\"save()\" value=\"$op3\"> ".$op3;
            $op4 = "<input type=\"radio\" name=\"op\" id=\"o4\" onclick=\"save()\" value=\"$op4\"> ".$op4;
        }
        else{
            if($s_ans == $op1){
                $op1 = "<input type=\"radio\" name=\"op\" id=\"o1\" onclick=\"save()\" value=\"$op1\" checked> ".$op1;
            }
            else{
                $op1 = "<input type=\"radio\" name=\"op\" id=\"o1\" onclick=\"save()\" value=\"$op1\" > ".$op1;
            }
            
            if($s_ans == $op2){
                $op2 = "<input type=\"radio\" name=\"op\" id=\"o2\" onclick=\"save()\" value=\"$op2\" checked> ".$op2;
            }
            else{
                $op2 = "<input type=\"radio\" name=\"op\" id=\"o2\" onclick=\"save()\" value=\"$op2\"> ".$op2;
            }
            
            if($s_ans == $op3){
                $op3 = "<input type=\"radio\" name=\"op\" id=\"o3\" onclick=\"save()\" value=\"$op3\" checked> ".$op3;
            }
            else{
                $op3 = "<input type=\"radio\" name=\"op\" id=\"o3\" onclick=\"save()\" value=\"$op3\"> ".$op3;
            }
            
            if($s_ans == $op4){
                $op4 = "<input type=\"radio\" name=\"op\" id=\"o4\" onclick=\"save()\" value=\"$op4\" checked> ".$op4;
            }
            else{
                $op4 = "<input type=\"radio\" name=\"op\" id=\"o4\" onclick=\"save()\" value=\"$op4\"> ".$op4;
            }
            
        }
        echo $rslt['q_data_guj']."#".$op1."#".$op2."#".$op3."#".$op4."#"."Question ".$rslt['q_number']."#";
        
    }
    else{
        die("Something went wrong");
    }

    $conn->close();
    
}
else{
    die("Nothing changed");
}

?>