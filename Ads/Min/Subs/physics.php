<?php
	session_start();
	function test_input($data) 
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	if(isset($_SESSION['admin_login_user'])){

    define("TITLE", "students");
	include "../Commen/header.php";
	require_once("../../AdminDb/dbconnect.php");
	
?>

<div class="w3-main" style="margin-left:300px">
<div class="w3-blue w3-bar w3-padding">
<a href="https://keltaking.co/Exams/Ads/Min/home" class="kel-hover"><div class="w3-left w3-bar-item w3-white w3-large w3-hover-green w3-round kel-hover">Home</div></a>
<a href="https://keltaking.co/Exams/Ads/Min/logout" class="kel-hover"><div class="w3-right w3-bar-item w3-white w3-large w3-hover-red w3-round kel-hover">logout</div></a>
</div>
<center>
<button class="w3-padding w3-large">
    <i class="fa fa-list-alt"></i> See all Physics questions <div class="w3-badge">
<?php
    $qry = "SELECT COUNT(q_id) FROM questions WHERE q_sub = 'Phy'";
    if($data = $conn->query($qry)){
        $rslt = $data->fetch_assoc();
        echo $rslt['COUNT(q_id)'];
    }
    else{
        echo "error";
    }
?>
</div>
</button>
</center>

<div class="w3-row">
<center>
<div class="loader" id="loader-add" style="display:none;"></div>
<div class="w3-text-red" id="error-add"></div>
</center>
<div class="w3-half w3-padding-16">
    <form class="w3-margin w3-padding w3-card">
        <div class="w3-center w3-xlarge w3-green">
            <b>English data</b>
        </div>
        <div class="w3-section">
            <input class="w3-input w3-border" type="number" id="no" placeholder="Question no." value="1" required>
        </div>
        <div class="w3-section">
            <textarea class="w3-input w3-border" id="question" placeholder="English question data..." value="que1" required></textarea>
        </div>
        <div class="w3-section">
            <input class="w3-input w3-border" type="text" id="op1" placeholder="English option 1" value="que1" required>
        </div>
        <div class="w3-section">
            <input class="w3-input w3-border" type="text" id="op2" placeholder="English option 2" value="que1" required>
        </div>
        <div class="w3-section">
            <input class="w3-input w3-border" type="text" id="op3" placeholder="English option 3" value="que1" required>
        </div>
        <div class="w3-section">
            <input class="w3-input w3-border" type="text" id="op4" placeholder="English option 4" value="que1" required>
        </div>
        <div class="w3-section">
            <input class="w3-input w3-border" type="text" id="ans" placeholder="English correct answer" value="que1" required>
        </div>
        <div class="w3-section">
            <textarea class="w3-input w3-border" id="hint" placeholder="Hint..." required></textarea>
        </div>
    </form>
</div>

<div class="w3-half w3-padding-16">
    
    <form class="w3-margin w3-padding w3-card">
        <div class="w3-center w3-xlarge w3-blue">
            <b>Gujarati data</b>
        </div>
        <div class="w3-section">
            <textarea class="w3-input w3-border" id="question_g" placeholder="Gujarati question data..." value="que1" required></textarea>
        </div>
        <div class="w3-section">
            <input class="w3-input w3-border" type="text" id="op1_g" placeholder="Gujarati option 1" value="que1" required>
        </div>
        <div class="w3-section">
            <input class="w3-input w3-border" type="text" id="op2_g" placeholder="Gujarati option 2" value="que1" required>
        </div>
        <div class="w3-section">
            <input class="w3-input w3-border" type="text" id="op3_g" placeholder="Gujarati option 3" value="que1" required>
        </div>
        <div class="w3-section">
            <input class="w3-input w3-border" type="text" id="op4_g" placeholder="Gujarati option 4" value="que1" required>
        </div>
        <div class="w3-section">
            <input class="w3-input w3-border" type="text" id="ans_g" placeholder="Gujarati correct answer" value="que1" required>
        </div>
        <div class="w3-section">
            <textarea class="w3-input w3-border" id="hint_g" placeholder="Hint..." value="que1" required></textarea>
        </div>
    </form>
</div>
<div class="w3-center">
    <button class="w3-button w3-blue w3-hover-green kel-hover" onclick="addQuestion()">
        <i class="fa fa-plus"></i> Add question
    </button>
</div>
</div>


</div>
<script>
    
let addQuestion = () => {
	
	let q_no = document.getElementById('no').value;
	let q_data_e = document.getElementById('question').value;
	let q_op1_e = document.getElementById('op1').value;
	let q_op2_e = document.getElementById('op2').value;
	let q_op3_e = document.getElementById('op3').value;
	let q_op4_e = document.getElementById('op4').value;
	let q_ans_e = document.getElementById('ans').value;
	let q_hint_e = document.getElementById('hint').value;
	let q_data_g = document.getElementById('question_g').value;
	let q_op1_g = document.getElementById('op1_g').value;
	let q_op2_g = document.getElementById('op2_g').value;
	let q_op3_g = document.getElementById('op3_g').value;
	let q_op4_g = document.getElementById('op4_g').value;
	let q_ans_g = document.getElementById('ans_g').value;
	let q_hint_g = document.getElementById('hint_g').value;
	
	if(q_no=="" || q_data_e=="" || q_op1_e=="" || q_op2_e=="" || q_op3_e=="" || q_op4_e=="" || q_ans_e=="" || q_hint_e==""){
	    alert("Fill all details");
	    return;
	}
	
	if(q_no=="" || q_data_g=="" || q_op1_g=="" || q_op2_g=="" || q_op3_g=="" || q_op4_g=="" || q_ans_g=="" || q_hint_g==""){
	    alert("Fill all details");
	    return;
	}
	
	let str = "q_no="+q_no+"&q_data_e="+q_data_e+"&q_op1_e="+q_op1_e+"&q_op2_e="+q_op2_e+"&q_op3_e="+q_op3_e+"&q_op4_e="+q_op4_e+"&q_ans_e="+q_ans_e+"&q_hint_e="+q_hint_e+"&q_data_g="+q_data_g+"&q_op1_g="+q_op1_g+"&q_op2_g="+q_op2_g+"&q_op3_g="+q_op3_g+"&q_op4_g="+q_op4_g+"&q_ans_g="+q_ans_g+"&q_hint_g="+q_hint_g+"&q_type='Phy'";
	let xhttp = new XMLHttpRequest();
	let loader = document.getElementById('loader-add');
		xhttp.onreadystatechange = function() {
			loader.style.display = "block";
			if(this.readyState == 4 && this.status == 200){
				loader.style.display = "none";
				if(this.responseText.length == ""){
					
					alert("question added");
					location.reload();
					
				}
				else{
				    document.getElementById('error-add').innerHTML = this.responseText;
				}
			}
		}
	xhttp.open("POST", "addquestion", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(str);
	
}
    
</script>
</body>
</html>
<?php
	}
	else{
		header('Location:https://keltaking.co/Exams/Ads/Min/logout');
	}
?>