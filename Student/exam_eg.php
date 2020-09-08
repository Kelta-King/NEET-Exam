<?php

session_start();

if(isset($_SESSION['login_student']) && isset($_REQUEST['dtatm']) && isset($_SESSION['exam_subject']) && isset($_SESSION['exam_start']) && isset($_SESSION['student_lang'])){
    
    $dts = explode("&",base64_decode($_SESSION['login_student']));
    $id = $dts[0];
    $name = $dts[1];
    $dts = explode("&",base64_decode($_SESSION['exam_start']));
    $id_s = $dts[0];
    $name_s = $dts[1];
    $lang = $dts[2];
    $dist = $dts[3];
    $q_no = 45;
    $timer = "3:00:00";
    if($id != $id_s || $name != $name_s){
        die("Something went wrong");
    }
    
    require_once("../Db/dbconnect.php");
    
    $query = "SELECT COUNT(q_id) FROM questions WHERE q_sub = '".$_SESSION['exam_subject']."'";
    
    if($data = $conn->query($query)){
        
        $rslt = $data->fetch_assoc();
        $q_no = $rslt['COUNT(q_id)'];
        
    }
    else{
        die("Something went wrong, close the window and then try again");
    }
    
    $qry = "SELECT timer FROM students WHERE s_id = $id";
    if($dt3 = $conn->query($qry)){
        
        $r=$dt3->fetch_assoc();
        $timer = $r['timer'];
        
    }
    else{
        $timer = "3:00:00";
    }
    
    $q_number = 1;
    if($_SESSION['exam_subject'] == "Phy"){
        $q_number = 1;
    }
    else if($_SESSION['exam_subject'] == "Chem"){
        $q_number = 46;
    }
    else if($_SESSION['exam_subject'] == "Bio"){
        $q_number = 91;
    }
    else{
        $q_number = 1;
    }
    
    $q_data = "hey";
    $op1 = "hey";
    $op2 = "hey";
    $op3 = "hey";
    $op4 = "hey";
    
    $qry = "SELECT q_number, q_data, q_op1, q_op2, q_op3, q_op4 FROM questions WHERE q_number = $q_number AND q_sub = '".$_SESSION['exam_subject']."'";

    if($dt = $conn->query($qry)){
        
        $rlt = $dt->fetch_assoc();
        $q_number = $rlt['q_number'];
        $q_data = $rlt['q_data'];
        $op1 = $rlt['q_op1'];
        $op2 = $rlt['q_op2'];
        $op3 = $rlt['q_op3'];
        $op4 = $rlt['q_op4'];
        
    }
    else{
        
        die("Something went wrong, start test again");
        
    }
    
    $s_ans = "none";
    
    $qry = "SELECT attempt, s_ans FROM que_stu_asn WHERE q_number = $q_number AND s_id = $id AND subject = '".$_SESSION['exam_subject']."'";
    
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
    
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Exam live | NEET demo test</title>
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://keltaking.co/Exams/CSS/kel.css">
		<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script id="MathJax-script" src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
        <link href="https://fonts.googleapis.com/css2?family=Literata&display=swap" rel="stylesheet"> 
		<style>
			.loader {
			  border: 5px solid #f3f3f3;
			  border-radius: 50%;
			  border-top: 5px solid #3498db;
			  width: 30px;
			  height: 30px;
			  -webkit-animation: spin 1s linear infinite; 
			  animation: spin 1s linear infinite;
			}

			@-webkit-keyframes spin {
			  0% { -webkit-transform: rotate(0deg); }
			  100% { -webkit-transform: rotate(360deg); }
			}

			@keyframes spin {
			  0% { transform: rotate(0deg); }
			  100% { transform: rotate(360deg); }
			}
			
			#mySidebar{
				background-color:#303030;
			}
		</style>
		<script>
		function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
}
 
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}
		</script>
	</head>
<body>
	<nav class="w3-sidebar w3-bar-block w3-animate-left w3-text-white w3-collapse w3-top w3-theme" style="z-index:3;width:350px;font-weight:bold" id="mySidebar"><br>
	<h3 class="w3-padding-32 w3-center w3-xxlarge"><b><span id="sub"><?php echo $_SESSION['exam_subject'] ?></span> <span class="w3-badge" id="sub_no"><?php echo $q_no ?></span></b></h3>
	<span class="w3-bar-item"><span class="w3-badge w3-green" style="width:35px;">Q</span> Answered</span><span class="w3-bar-item"><span class="w3-badge w3-white" style="width:35px;">Q</span> Not Answered</span>
    <span class="w3-bar-item"><span class="w3-badge w3-yellow" style="width:35px;">Q</span> Marked for review</span>
	<hr>
		<a href="javascript:void(0)" onclick="w3_close()" class="w3-display-topright w3-button w3-padding w3-hide-large w3-hover-white"><i class="fa fa-remove"></i></a>
<div id="question_pallete">
<?php

$q = "SELECT q_id, q_number,attempt, mark FROM que_stu_asn WHERE s_id = $id AND subject = '".$_SESSION['exam_subject']."'";
if($dd = $conn->query($q))
{
    while($rr = $dd->fetch_assoc()){
?>
    <div class="w3-col l3 m3 s3 w3-center">
    <button class="w3-center kel-button w3-circle w3-margin-top <?php if($rr['attempt'] == 1){ echo "w3-green"; }elseif($rr['mark'] == 1){ echo "w3-yellow";}else{ echo "w3-white"; } ?>" style="color:black;width:35px;" onclick="jump(<?php echo $rr['q_number'] ?>)">
        <?php echo $rr['q_number'] ?>
    </button>
    </div>

<?php
    }
}
?>
</div>
	</nav>

<!-- timer -->
<div class="w3-theme-d1">
    <center>
        <div class="w3-bar-item w3-border w3-xxlarge" id="timer"><?php echo $timer ?></div>
    </center>
    <div class="w3-button kel-hover w3-display-topright w3-red" style="margin-top:5px;margin-right:5px;" onclick="endTest()">End test</div>
</div>

<!-- Top menu on small screens -->

<header class="w3-container w3-theme-dark w3-xlarge w3-padding-16">
  <a href="javascript:void(0)" class="w3-right w3-button w3-orange w3-text-white w3-round w3-margin-right kel-hover w3-hide-small w3-hide-medium" onclick="open_phy()">Physics</a>
  <a href="javascript:void(0)" class="w3-right w3-button w3-blue w3-round w3-margin-right kel-hover w3-hide-small w3-hide-medium" onclick="open_chem()">Chemistry</a>
  <a href="javascript:void(0)" class="w3-right w3-button w3-green w3-round w3-margin-right kel-hover w3-hide-small w3-hide-medium" onclick="open_bio()">Biology</a>
  
  <a href="javascript:void(0)" class="w3-left w3-button w3-orange w3-text-white w3-round w3-margin-right kel-hover w3-hide-large" onclick="open_phy()">Phy</a>
  <a href="javascript:void(0)" class="w3-left w3-button w3-blue w3-round w3-margin-right kel-hover w3-hide-large" onclick="open_chem()">Chem</a>
  <a href="javascript:void(0)" class="w3-left w3-button w3-green w3-round w3-margin-right kel-hover w3-hide-large" onclick="open_bio()">Bio</a>
  
  <a href="javascript:void(0)" class="w3-right w3-button w3-theme-dark w3-hide-large" onclick="w3_open()"><i class="fa fa-bars"></i></a>
</header>


<div class="w3-main" style="margin-left:350px;margin-bottom:50px;">
    <center>
<div class="loader" id="loader" style="display:none"></div>
    </center>
<div id="q" style="display:block">
<div class="w3-padding w3-xlarge" id="que_no">
    <spam id="question_no">Question <?php echo $q_number ?></spam>
</div>
<div class="w3-padding w3-large w3-justify" id="question">
<?php echo $q_data ?>
</div>
<div class="w3-padding" id="options">
<div class="loader" id="op-loader" style="display:none"></div>
<form class="w3-large" id="frm">
    <div class="w3-section">
        <span id="op1"><input type="radio" name="op" id="o1" onclick="save()" value="<?php echo $op1 ?>" <?php if($op1 == $s_ans){ echo "checked"; } ?> > <?php echo $op1 ?></span>
    </div>
    <div class="w3-section">
        <span id="op2"><input type="radio" name="op" id="o2"  onclick="save()" value="<?php echo $op2 ?>" <?php if($op2 == $s_ans){ echo "checked"; } ?> > <?php echo $op2 ?></span>
    </div>
    <div class="w3-section">
        <span id="op3"><input type="radio" name="op" id="o3" onclick="save()"  value="<?php echo $op3 ?>" <?php if($op3 == $s_ans){ echo "checked"; } ?> > <?php echo $op3 ?></span>
    </div>
    <div class="w3-section">
        <span id="op4"><input type="radio" name="op" id="o4"  onclick="save()" value="<?php echo $op4 ?>" <?php if($op4 == $s_ans){ echo "checked"; } ?> > <?php echo $op4 ?></span>
    </div>
</form>
<div class="w3-center w3-padding">
    <button class="w3-button kel-hover w3-light-gray" onclick="clearRes()">Clear response</button>
</div>
</div>

<hr style="border-top: 1px solid black;">
<div class="w3-bar" style="margin-bottom:50px;" id="buttons">
    
    <button class="w3-bar-item w3-left w3-button w3-light-gray kel-hover" onclick="prev()"><i class="fa fa-arrow-left"></i> Previous</button>
    
    <button class="w3-bar-item w3-left w3-button w3-yellow w3-margin-left kel-hover w3-hover-yellow w3-hide-small" onclick="mark()"><i class="fa fa-bookmark"></i> Mark for review</button>
    
    <button class="w3-bar-item w3-right w3-button w3-light-gray kel-hover" onclick="next()"><i class="fa fa-arrow-right"></i> Next</button>
    
</div>
<div class='w3-center' style="margin-bottom:50px;" id="buttons">
    <button class="w3-button w3-yellow w3-margin-left kel-hover w3-hover-yellow w3-hide-large w3-hide-medium" onclick="mark()"><i class="fa fa-bookmark"></i> Mark for review</button>
</div>
</div>
</div>
<script>
<?php

    if($_SESSION['exam_subject'] == "Phy"){
        echo "let cur_number = 1;";
    }
    else if($_SESSION['exam_subject'] == "Chem"){
        echo "let cur_number = 46;";
    }
    else if($_SESSION['exam_subject'] == "Bio"){
        echo "let cur_number = 91;";
    }
    else{
        echo "let cur_number = 1;";
    }

?>
    
</script>
<script src="JS/exam_eg.js"></script>
</body>
</html>
<?php
    $conn->close();
}
else if(isset($_SESSION['login_student'])){
    header("Location:thanks?dtatm=".$_REQUEST['dtatm']);
}
else{
    header("Location:../logout");
}
?><?php

session_start();

if(isset($_SESSION['login_student']) && isset($_REQUEST['dtatm']) && isset($_SESSION['exam_subject']) && isset($_SESSION['exam_start']) && isset($_SESSION['student_lang'])){
    
    $dts = explode("&",base64_decode($_SESSION['login_student']));
    $id = $dts[0];
    $name = $dts[1];
    $dts = explode("&",base64_decode($_SESSION['exam_start']));
    $id_s = $dts[0];
    $name_s = $dts[1];
    $lang = $dts[2];
    $dist = $dts[3];
    $q_no = 45;
    $timer = "3:00:00";
    if($id != $id_s || $name != $name_s){
        die("Something went wrong");
    }
    
    require_once("../Db/dbconnect.php");
    
    $query = "SELECT COUNT(q_id) FROM questions WHERE q_sub = '".$_SESSION['exam_subject']."'";
    
    if($data = $conn->query($query)){
        
        $rslt = $data->fetch_assoc();
        $q_no = $rslt['COUNT(q_id)'];
        
    }
    else{
        die("Something went wrong, close the window and then try again");
    }
    
    $qry = "SELECT timer FROM students WHERE s_id = $id";
    if($dt3 = $conn->query($qry)){
        
        $r=$dt3->fetch_assoc();
        $timer = $r['timer'];
        
    }
    else{
        $timer = "3:00:00";
    }
    
    $q_number = 1;
    if($_SESSION['exam_subject'] == "Phy"){
        $q_number = 1;
    }
    else if($_SESSION['exam_subject'] == "Chem"){
        $q_number = 46;
    }
    else if($_SESSION['exam_subject'] == "Bio"){
        $q_number = 91;
    }
    else{
        $q_number = 1;
    }
    
    $q_data = "hey";
    $op1 = "hey";
    $op2 = "hey";
    $op3 = "hey";
    $op4 = "hey";
    
    $qry = "SELECT q_number, q_data, q_op1, q_op2, q_op3, q_op4 FROM questions WHERE q_number = $q_number AND q_sub = '".$_SESSION['exam_subject']."'";

    if($dt = $conn->query($qry)){
        
        $rlt = $dt->fetch_assoc();
        $q_number = $rlt['q_number'];
        $q_data = $rlt['q_data'];
        $op1 = $rlt['q_op1'];
        $op2 = $rlt['q_op2'];
        $op3 = $rlt['q_op3'];
        $op4 = $rlt['q_op4'];
        
    }
    else{
        
        die("Something went wrong, start test again");
        
    }
    
    $s_ans = "none";
    
    $qry = "SELECT attempt, s_ans FROM que_stu_asn WHERE q_number = $q_number AND s_id = $id AND subject = '".$_SESSION['exam_subject']."'";
    
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
    
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Exam live | NEET demo test</title>
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://keltaking.co/Exams/CSS/kel.css">
		<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script id="MathJax-script" src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
        <link href="https://fonts.googleapis.com/css2?family=Literata&display=swap" rel="stylesheet"> 
		<style>
			.loader {
			  border: 5px solid #f3f3f3;
			  border-radius: 50%;
			  border-top: 5px solid #3498db;
			  width: 30px;
			  height: 30px;
			  -webkit-animation: spin 1s linear infinite; 
			  animation: spin 1s linear infinite;
			}

			@-webkit-keyframes spin {
			  0% { -webkit-transform: rotate(0deg); }
			  100% { -webkit-transform: rotate(360deg); }
			}

			@keyframes spin {
			  0% { transform: rotate(0deg); }
			  100% { transform: rotate(360deg); }
			}
			
			#mySidebar{
				background-color:#303030;
			}
		</style>
		<script>
		function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
}
 
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}
		</script>
	</head>
<body>
	<nav class="w3-sidebar w3-bar-block w3-animate-left w3-text-white w3-collapse w3-top w3-theme" style="z-index:3;width:350px;font-weight:bold" id="mySidebar"><br>
	<h3 class="w3-padding-32 w3-center w3-xxlarge"><b><span id="sub"><?php echo $_SESSION['exam_subject'] ?></span> <span class="w3-badge" id="sub_no"><?php echo $q_no ?></span></b></h3>
	<span class="w3-bar-item"><span class="w3-badge w3-green" style="width:35px;">Q</span> Answered</span><span class="w3-bar-item"><span class="w3-badge w3-white" style="width:35px;">Q</span> Not Answered</span>
    <span class="w3-bar-item"><span class="w3-badge w3-yellow" style="width:35px;">Q</span> Marked for review</span>
	<hr>
		<a href="javascript:void(0)" onclick="w3_close()" class="w3-display-topright w3-button w3-padding w3-hide-large w3-hover-white"><i class="fa fa-remove"></i></a>
<div id="question_pallete">
<?php

$q = "SELECT q_id, q_number,attempt, mark FROM que_stu_asn WHERE s_id = $id AND subject = '".$_SESSION['exam_subject']."'";
if($dd = $conn->query($q))
{
    while($rr = $dd->fetch_assoc()){
?>
    <div class="w3-col l3 m3 s3 w3-center">
    <button class="w3-center kel-button w3-circle w3-margin-top <?php if($rr['attempt'] == 1){ echo "w3-green"; }elseif($rr['mark'] == 1){ echo "w3-yellow";}else{ echo "w3-white"; } ?>" style="color:black;width:35px;" onclick="jump(<?php echo $rr['q_number'] ?>)">
        <?php echo $rr['q_number'] ?>
    </button>
    </div>

<?php
    }
}
?>
</div>
	</nav>

<!-- timer -->
<div class="w3-theme-d1">
    <center>
        <div class="w3-bar-item w3-border w3-xxlarge" id="timer"><?php echo $timer ?></div>
    </center>
    <div class="w3-button kel-hover w3-display-topright w3-red" style="margin-top:5px;margin-right:5px;" onclick="endTest()">End test</div>
</div>

<!-- Top menu on small screens -->

<header class="w3-container w3-theme-dark w3-xlarge w3-padding-16">
  <a href="javascript:void(0)" class="w3-right w3-button w3-orange w3-text-white w3-round w3-margin-right kel-hover w3-hide-small w3-hide-medium" onclick="open_phy()">Physics</a>
  <a href="javascript:void(0)" class="w3-right w3-button w3-blue w3-round w3-margin-right kel-hover w3-hide-small w3-hide-medium" onclick="open_chem()">Chemistry</a>
  <a href="javascript:void(0)" class="w3-right w3-button w3-green w3-round w3-margin-right kel-hover w3-hide-small w3-hide-medium" onclick="open_bio()">Biology</a>
  
  <a href="javascript:void(0)" class="w3-left w3-button w3-orange w3-text-white w3-round w3-margin-right kel-hover w3-hide-large" onclick="open_phy()">Phy</a>
  <a href="javascript:void(0)" class="w3-left w3-button w3-blue w3-round w3-margin-right kel-hover w3-hide-large" onclick="open_chem()">Chem</a>
  <a href="javascript:void(0)" class="w3-left w3-button w3-green w3-round w3-margin-right kel-hover w3-hide-large" onclick="open_bio()">Bio</a>
  
  <a href="javascript:void(0)" class="w3-right w3-button w3-theme-dark w3-hide-large" onclick="w3_open()"><i class="fa fa-bars"></i></a>
</header>


<div class="w3-main" style="margin-left:350px;margin-bottom:50px;">
    <center>
<div class="loader" id="loader" style="display:none"></div>
    </center>
<div id="q" style="display:block">
<div class="w3-padding w3-xlarge" id="que_no">
    <spam id="question_no">Question <?php echo $q_number ?></spam>
</div>
<div class="w3-padding w3-large w3-justify" id="question">
<?php echo $q_data ?>
</div>
<div class="w3-padding" id="options">
<div class="loader" id="op-loader" style="display:none"></div>
<form class="w3-large" id="frm">
    <div class="w3-section">
        <span id="op1"><input type="radio" name="op" id="o1" onclick="save()" value="<?php echo $op1 ?>" <?php if($op1 == $s_ans){ echo "checked"; } ?> > <?php echo $op1 ?></span>
    </div>
    <div class="w3-section">
        <span id="op2"><input type="radio" name="op" id="o2"  onclick="save()" value="<?php echo $op2 ?>" <?php if($op2 == $s_ans){ echo "checked"; } ?> > <?php echo $op2 ?></span>
    </div>
    <div class="w3-section">
        <span id="op3"><input type="radio" name="op" id="o3" onclick="save()"  value="<?php echo $op3 ?>" <?php if($op3 == $s_ans){ echo "checked"; } ?> > <?php echo $op3 ?></span>
    </div>
    <div class="w3-section">
        <span id="op4"><input type="radio" name="op" id="o4"  onclick="save()" value="<?php echo $op4 ?>" <?php if($op4 == $s_ans){ echo "checked"; } ?> > <?php echo $op4 ?></span>
    </div>
</form>
<div class="w3-center w3-padding">
    <button class="w3-button kel-hover w3-light-gray" onclick="clearRes()">Clear response</button>
</div>
</div>

<hr style="border-top: 1px solid black;">
<div class="w3-bar" style="margin-bottom:50px;" id="buttons">
    
    <button class="w3-bar-item w3-left w3-button w3-light-gray kel-hover" onclick="prev()"><i class="fa fa-arrow-left"></i> Previous</button>
    
    <button class="w3-bar-item w3-left w3-button w3-yellow w3-margin-left kel-hover w3-hover-yellow w3-hide-small" onclick="mark()"><i class="fa fa-bookmark"></i> Mark for review</button>
    
    <button class="w3-bar-item w3-right w3-button w3-light-gray kel-hover" onclick="next()"><i class="fa fa-arrow-right"></i> Next</button>
    
</div>
<div class='w3-center' style="margin-bottom:50px;" id="buttons">
    <button class="w3-button w3-yellow w3-margin-left kel-hover w3-hover-yellow w3-hide-large w3-hide-medium" onclick="mark()"><i class="fa fa-bookmark"></i> Mark for review</button>
</div>
</div>
</div>
<script>
<?php

    if($_SESSION['exam_subject'] == "Phy"){
        echo "let cur_number = 1;";
    }
    else if($_SESSION['exam_subject'] == "Chem"){
        echo "let cur_number = 46;";
    }
    else if($_SESSION['exam_subject'] == "Bio"){
        echo "let cur_number = 91;";
    }
    else{
        echo "let cur_number = 1;";
    }

?>
    
</script>
<script src="JS/exam_eg.js"></script>
</body>
</html>
<?php
    $conn->close();
}
else if(isset($_SESSION['login_student'])){
    header("Location:thanks?dtatm=".$_REQUEST['dtatm']);
}
else{
    header("Location:../logout");
}
?>
