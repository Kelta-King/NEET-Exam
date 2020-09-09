<?php
	session_start();
	function test_input($data) 
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	if(isset($_SESSION['admin_login_user']) && isset($_GET['id'])){

    define("TITLE", "Contact reply");
	include "Commen/header.php";
	require_once("../AdminDb/dbconnect.php");
	$c_id = $_GET['id'];
?>
<div class="w3-blue w3-bar w3-padding">
<a href="https://keltaking.co/Exams/Ads/Min/home" class="kel-hover"><div class="w3-left w3-bar-item w3-white w3-large w3-hover-green w3-round kel-hover">Home</div></a>
<a href="https://keltaking.co/Exams/Ads/Min/logout" class="kel-hover"><div class="w3-right w3-bar-item w3-white w3-large w3-hover-red w3-round kel-hover">logout</div></a>
</div>
<?php
	$query = "SELECT * FROM contacts WHERE c_id = $c_id";
	
	if($data = $conn->query($query)){
	    
	    $rslt = $data->fetch_assoc();
	    $c_id = $rslt['c_id'];
	    $s_name = $rslt['c_name'];
	    $s_email = $rslt['c_email'];
	
?>
<div class="w3-main" style="margin-left:300px">
    <div class="w3-center w3-margin-top w3-xxlarge">
        <b>Reply to <?php echo $s_name ?></b>
    </div>
<form id="addstudents" class="w3-margin w3-padding">
	<center><div class="loader" id="loader" style="display:none;"></div></center>
	<div id="error" class="w3-text-red w3-center"></div>
	<div class="w3-section">
		<b>Reply To:</b>
		<input type="email" class="w3-input w3-round w3-border" style="margin-top:5px;" placeholder="Reply to Email" value="<?php echo $s_email ?>" id="email" name="student_email">
	</div>
	<div>
	    <b>Reply Message:</b>
	    <textarea class="w3-input w3-round w3-border" placeholder="reply..." style="margin-top:5px;" name="reply" id="reply"></textarea>
	</div>
	<div class="w3-section">
		<input type="button" value="Send Reply" class="w3-button w3-blue kel-hover w3-border" onclick="yoman(<?php echo $c_id ?>)">
	</div>
</form>
</div>
<script>

let yoman = (c_id) => {
    
    if(!confirm('Are you sure?')){
		return;
	}
	
	let msg = document.getElementById("reply").value;
	let email = document.getElementById("email").value;
	
	if(email == ""){
	    document.getElementById('error').innerHTML = "please enter Email";
	    return;
	}
	
	
	if(msg == ""){
	    document.getElementById('error').innerHTML = "please enter reply message";
	    return;
	}
	
	let str = "c_id="+c_id+"&email="+email+"&msg="+msg;
	let xhttp = new XMLHttpRequest();
	let loader = document.getElementById('loader');
		xhttp.onreadystatechange = function() {
			loader.style.display = "block";
			if(this.readyState == 4 && this.status == 200){
				document.getElementById('error').innerHTML = this.responseText;
				loader.style.display = "none";
				if(this.responseText >= 30){
					
					document.getElementById('error').innerHTML = this.responseText;
				    document.getElementById("reply").value = "";
					
				}
			}
		}
	xhttp.open("POST", "Action/sendreply", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(str);
    
}

</script>
</body>
</html>
<?php
	}
	else{
	    echo "Something went wrong";
	}
    $conn->close();
	}
	else{
		header('Location:https://keltaking.co/Exams/Ads/Min/logout');
	}
?>