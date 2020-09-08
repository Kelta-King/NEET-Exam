<?php

session_start();

if(isset($_SESSION['login_student']) && isset($_REQUEST['id']) && isset($_REQUEST['lang']) && isset($_REQUEST['dist'])){
    
    $dts = explode("&",base64_decode($_SESSION['login_student']));
    $id = $dts[0];
    $name = $dts[1];
    $lang = $_REQUEST['lang'];
    $dist = $_REQUEST['dist'];
    
    $str = base64_encode($id."&".$name."&".$lang."&".$dist);
    
    $_SESSION['student_lang'] = $_REQUEST['lang'];
    
    if($id != $_REQUEST['id']){
        die("Something went wrong. Please try after some time");
    }
    
    require_once("../../Db/dbconnect.php");
    
    $query = "SELECT verified FROM students WHERE s_id = $id";
    
    if($data = $conn->query($query)){
        
        $rslt = $data->fetch_assoc();
        
        if($rslt['verified'] == 1){
            
            $qry1 = "SELECT start_test, end_test FROM students WHERE s_id = $id";
            
            if($d = $conn->query($qry1)){
                
                $rslt1 = $d->fetch_assoc();
                if($rslt1['start_test'] == 1 && $rslt1['end_test'] == 1){
                    die("You have already attempted the test.");
                }
                else{
                    $qry = "UPDATE students SET	district = '$dist', language = '$lang', start_test = '1' WHERE s_id = $id";
                    if($conn->query($qry)){
                        
                        $qry2 = "SELECT q_id, q_number, q_answer, q_sub FROM questions";
                        
                        if($lang == "Gujarati"){
                            $qry2 = "SELECT q_id, q_number, q_answer_guj, q_sub FROM questions";
                        }
                        
                        if($dt2 = $conn->query($qry2)){
                            
                            while($rlt2 = $dt2->fetch_assoc()){
                                
                                $q_id = $rlt2['q_id'];
                                $qn = $rlt2['q_number'];
                                $q_sub = $rlt2['q_sub'];
                                $ans = "";
                                
                                if($lang == "Gujarati"){
                                    $ans = $rlt2['q_answer_guj'];
                                }
                                else{
                                    $ans = $rlt2['q_answer'];
                                }
                                
                                $ans = addslashes($ans);
                                
                                $qry3 = "INSERT INTO que_stu_asn (s_id, q_id, q_number, cor_ans, subject) VALUES($id, $q_id, $qn, '$ans', '$q_sub')";
                                
                                if($conn->query($qry3)){
                                            
                                }
                                else{
                                    die("You cannot attend test twice");
                                }
                                
                                
                            }
                            
                        }
                        else{
                            die("Something went wrong");
                        }
                        
                        $_SESSION['exam_start'] = $str;
                        $_SESSION['exam_subject'] = "Phy";
                        
                    }
                    else{
                        die("not updated");
                    }
                }
                
            }
            else{
                
                die("Something went wrong");
                   
            }
            
        }
        else{
            die("verify your eamil first");
        }
        
    }
    else{
        die("Something went wrong");
    }

    $conn->close();
}
else{
    header("Location:../../logout"); 
}

?>
