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
    define("TITLE", "change");
	include "Commen/header.php";
	
?>
<div class="w3-main" style="margin-left:300px">
<div class="w3-blue w3-bar w3-padding">
<a href="https://keltaking.co/Exams/Ads/Min/adminPanel" class="kel-hover"><div class="w3-left w3-bar-item w3-white w3-large w3-hover-green w3-round kel-hover">Home</div></a>
<a href="https://keltaking.co/Exams/Ads/Min/logout" class="kel-hover"><div class="w3-right w3-bar-item w3-white w3-large w3-hover-red w3-round kel-hover">logout</div></a>
</div>

<div class="w3-row">
<div class="w3-col l6">
<div class="w3-border w3-margin-top w3-margin-left w3-margin-right w3-round w3-card-2">
<div class="w3-container w3-green">
    <h2>Change password</h2>
</div>
<form id="changepassword" class="w3-margin w3-padding">
	<center><div class="loader" id="loader-pass" style="display:none;"></div></center>
	<div id="error-pass" class="w3-text-red w3-center"></div>
	<div class="w3-section">
		<input type="number" class="w3-input w3-border" placeholder="UserId" name="userId">
	</div>
	<div class="w3-section">
		<input type="password" class="w3-input w3-border" placeholder="current password" name="c_pass">
	</div>
	<div class="w3-section">
		<input type="password" class="w3-input w3-border" placeholder="new password" name="n_pass">
	</div>
	<div class="w3-section">
		<input type="button" value="Change password" class="w3-button w3-blue kel-hover w3-border" onclick="changepassword()">
	</div>
</form>
</div>
</div>

</div>
<script>


let changepassword = () => {
	
	if(!confirm('Do you really want to change password?')){
		return;
	}
	
	let form = document.getElementById('changepassword');
	let  old_pass = form.c_pass.value;
	let  userId = form.userId.value;
	let  new_pass = form.n_pass.value;
		
	if(old_pass == "" && new_pass == "" && userId == ""){
		alert("fill the details properly");
		document.getElementById('error-pass').innerHTML = "Fill the details";
		return;
	}
	if(new_pass.length < 4 || old_pass.length < 4 || userId < 4){
		alert("fill the correct details");
		document.getElementById('error-pass').innerHTML = "Fill the correct details";
		return;
	}
	
	if(old_pass.includes("$") || old_pass.includes("&") || old_pass.includes("=") || old_pass.includes("*") || old_pass.includes("`")){
		alert("incorrect details");
		document.getElementById('error-pass').innerHTML = "incorrect details";
		return;
	}
	
	if(new_pass.includes("$") || new_pass.includes("&") || new_pass.includes("=") || new_pass.includes("*") || new_pass.includes("`")){
		alert("incorrect details");
		document.getElementById('error-pass').innerHTML = "incorrect details";
		return;
	}
	
	if(userId.includes("$") || userId.includes("&") || userId.includes("=") || userId.includes("*") || userId.includes("`")){
		alert("incorrect details");
		document.getElementById('error-pass').innerHTML = "incorrect details";
		return;
	}
	
	let str = "userId="+userId+"&old_pass="+old_pass+"&new_pass="+new_pass;
	let xhttp = new XMLHttpRequest();
	let loader = document.getElementById('loader-pass');
		xhttp.onreadystatechange = function() {
			loader.style.display = "block";
			if(this.readyState == 4 && this.status == 200){
				document.getElementById('error-pass').innerHTML = this.responseText;
				loader.style.display = "none";
				if(this.responseText == ""){
					alert("Password Changed");
					form.c_pass.value = "";
					form.n_pass.value = "";
					location.reload();
				}
			}
		}
	xhttp.open("POST", "Change/changepassword", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(str);	
	
	
}

</script>
</div>
</body>
</html>
<?php
	}
	else{
		header('Location:logout');
	}
?>
