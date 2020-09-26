<?php 

$ansOp = array(0,1,1,4,4,1,4,4,4,3,3,1,3,1,3,3,1,1,1,4,3,3,1,3,1,2,1,4,4,1,1,3,3,1,4,2,3,3,2,3,2,1,4,3,1,4,3,1,3,4,1,2,3,4,4,1,4,4,2,4,3,4,3,2,3,1,4,4,4,2,3,3,2,1,1,3,4,3,2,2,4,2,1,1,3,3,4,1,2,2,4,2,3,1,2,1,3,4,4,4,3,1,4,3,4,4,1,2,3,1,3,1,1,4,1,3,4,1,3,1,3,4,3,2,4,2,4,3,4,1,3,2,1,4,1,3,4,4,1,4,4,3,2,4,1,3,2,4,1,2,3,1,4,2,3,2,3,1,2,3,3,4,3,1,3,2,3,3,1,4,4,2,3,4,1,1,2,1,1,3,4);

$ansEng = array(0);
$ansGuj = array(0);
require_once("Db/dbconnect.php");

$query = "SELECT * FROM questions";

$j = 1;

if($data = $conn->query($query)){

    while($rslt = $data->fetch_assoc()){
        
        $op1 = $rslt['q_op1'];
        $op1_guj = $rslt['q_op1_guj'];
        $op2 = $rslt['q_op2'];
        $op2_guj = $rslt['q_op2_guj'];
        $op3 = $rslt['q_op3'];
        $op3_guj = $rslt['q_op3_guj'];
        $op4 = $rslt['q_op4'];
        $op4_guj = $rslt['q_op4_guj'];
        
        switch($ansOp[$j]){
            
            case 1:
                $ansEng[$j] = $op1;
                $ansGuj[$j] = $op1_guj;
                break;
                
            case 2:
                $ansEng[$j] = $op2;
                $ansGuj[$j] = $op2_guj;
                break;
                
            case 3:
                $ansEng[$j] = $op3;
                $ansGuj[$j] = $op3_guj;
                break;
                
            case 4:
                $ansEng[$j] = $op4;
                $ansGuj[$j] = $op4_guj;
                break;
                
            default:
                $ansEng[$j] = $op1;
                $ansGuj[$j] = $op1_guj;
                break;
        }
        
        $j++;
        
    }
    
    
}
else{
    echo "Somethonh went wrong";
}





function calc_mark($id, $ansEng, $ansGuj){
    
    $servername = "localhost";
    $dbpassword = "Mita1969"; // enter the database user's password
    $username = "keltakin_nt_student";
    $database = "keltakin_NeetExam";
    
    $con = new mysqli($servername, $username, $dbpassword, $database);
    
    if($con->connect_error)
    {
        die("something went wrong:$conn->connect_error");
    }

    $total = 0;
    $pos = 4;
    $neg = -1;
    
    $bio_count = 0;
    $phy_count = 0;
    $inc_count = 0;
    
    //$qry = ;
    //echo $qry;
    if($d = $con -> query("SELECT * FROM que_stu_asn WHERE s_id = $id")){
        
        $i = 1;
        
        while($rslt = $d->fetch_assoc()){
            
            if($rslt['s_ans'] != null){
                
                $sans = $rslt['s_ans'];
                
                $sub = $rslt['subject'];
                
                //echo $sans;
                //echo $ansEng[$i]."<br><br>";
                
                if($sans == $ansEng[$i] || $sans == $ansGuj[$i]){
                    
                    $total += $pos;
                    
                    if($sub == "Phy"){
                        
                        $phy_count++;
                        
                    }
                    else if($sub == "Bio"){
                        
                        $bio_count++;
                        
                    }
                    
                }
                else{
                    /*echo "question<br>";
                    echo $sans."";
                    echo $cans;
                    echo "<br><br><br>";*/
                    
                    $total +=$neg;
                    $inc_count += 1;
                    
                }
                
            }
            
            $i++;
            
            
        }
        $total += 5;
        
        
        $qry = "SELECT s_name, s_email FROM students WHERE s_id = $id";
        
        if($dt = $con->query($qry)){
            
            $rs = $dt->fetch_assoc();
            $name = $rs['s_name'];
            $email = $rs['s_email'];
            
            $to = $email;
            $from = 'NEET_Mock_test@keltaking.co';
            $fromName = 'NEET_Mock_test'; 
            
            $subject = 'NEET mock results';  
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                 
            // Create email headers
            $headers .= 'From: '.$from."\r\n".'Reply-To: '.$from."\r\n".'X-Mailer: PHP/' . phpversion();
                 
            // Compose a simple HTML email message
            $message = '<html><body><h1 style="color:green">Your results of NEET demo test is here.</h1><br><p>Dear '.$name.',<br>Your results for NEET demo test is '.$total.'/720<br>Your rank is 121th among the all test attempters. Total 676 students attempted test and highest marks are 634. Best of luck to you for your NEET exam. Be safe and stay happy. <br><br>Regard Kushang Shah<br>This is a software generated email. Do not reply to this email.</p></body></html>';
                
            if(mail($to, $subject,$message, $headers)){
                echo "Mail sent";
            }
            else{
                echo "Not sent";
            }
            
        }
        else{
            
            echo "Something went wrong";
            
        }
        
        
        
        echo "<b>Results of $id :</b><br>Total marks:".$total."<br>IncCount:".$inc_count."<br>BioCount:".$bio_count."<br>PhyCount:".$phy_count."<br><br>";
        
    }
    else{
        echo "Something went wrong";
    }
    
    $con->close();

}

/*$query = "SELECT DISTINCT s_id FROM que_stu_asn";

if($data = $conn->query($query)){

    while($result = $data->fetch_assoc()){
        
        $id = $result['s_id'];
        
        calc_mark($id);
        
    }
    
}*/

calc_mark(128, $ansEng, $ansGuj);


$conn->close();
    
?>