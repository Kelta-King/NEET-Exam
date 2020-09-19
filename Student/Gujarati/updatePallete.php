<?php

session_start();

if(isset($_SESSION['login_student'])&& isset($_SESSION['exam_subject'])){
    
    $dts = explode("&",base64_decode($_SESSION['login_student']));
    $id = $dts[0];
    $name = $dts[1];
    $number = $_REQUEST['number'];
    $subject = $_SESSION['exam_subject'];

    require_once("../../Db/dbconnect.php");
    
    $q = "SELECT q_id, q_number,attempt, mark FROM que_stu_asn WHERE s_id = $id AND subject = '".$_SESSION['exam_subject']."'";
    if($dd = $conn->query($q))
    {
        while($rr = $dd->fetch_assoc()){
?>
        <div class="w3-col l3 m3 s3 w3-center">
        <button class="w3-center kel-button w3-circle w3-margin-top <?php if($rr['attempt'] == 1){ echo "w3-green"; }elseif($rr['mark'] == 1){ echo "w3-yellow";}else{ echo "w3-white"; } ?>" style="width:35px;color:black" onclick="jump(<?php echo $rr['q_number'] ?>)">
            <?php echo $rr['q_number'] ?>
        </button>
        </div>
<?php
        }
    }
    else{
        die("Nothing happened");
    }
    
    $conn->close();
    
}
else{
    die("Nothing changed");
}

?>