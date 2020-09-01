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
    define("TITLE", 'admins');
	include "Commen/header.php";
	
?>
<div class="w3-main" style="margin-left:300px">
<div class="w3-blue w3-bar w3-padding">
<a href="https://keltaking.co/Exams/Ads/Min/home" class="kel-hover"><div class="w3-left w3-bar-item w3-white w3-large w3-hover-green w3-round kel-hover">Home</div></a>
<a href="https://keltaking.co/Exams/Ads/Min/logout" class="kel-hover"><div class="w3-right w3-bar-item w3-white w3-large w3-hover-red w3-round kel-hover">logout</div></a>
</div>

<?php

if(isset($_SESSION['admin_type']) && $_SESSION['admin_type'] == "main"){
	
?>

<div class="w3-row w3-margin-top">
<div class="w3-col l6">
<div class="w3-border w3-margin-top w3-margin-left w3-margin-right w3-round w3-card-2">
<div class="w3-container w3-green">
    <h2>Add Admin</h2>
</div>
<form id="addAdmin" class="w3-margin w3-padding">
	<center><div class="loader" id="loader-add" style="display:none;"></div></center>
	<div id="error-add" class="w3-text-red w3-center"></div>
	<div class="w3-section">
		<input type="number" class="w3-input w3-border" placeholder="admin_number" name="admin_id" value="1111">
	</div>
	<div class="w3-section">
		<input type="text" class="w3-input w3-border" placeholder="admin_name" name="admin_name" value="yoman">
	</div>
	<div class="w3-section">
		<input type="password" class="w3-input w3-border" placeholder="password" name="admin_pass" value="admin3">
		<input type="checkbox" name="show" value="off"> <span>show password?</span>
	</div>
	<div class="w3-section">
		<select class="w3-input w3-border" name="admin_type">
			<option class="w3-white" disabled selected>admin type</option>
			<option class="w3-white" value="main">Main</option>
			<option class="w3-white" value="general">General</option>
		</select>		
	</div>
	<div class="w3-section">
		<input type="button" value="Add" class="w3-button w3-blue kel-hover w3-border" onclick="addAdmin()">
	</div>
</form>
</div>
</div>
<div class="w3-col l6">
<div class="w3-border w3-margin-top w3-margin-left w3-margin-right w3-round w3-card-2">
<div class="w3-container w3-red">
    <h2>All Admin</h2>
</div>
<div class="w3-padding w3-margin">
	<center><div class="loader" id="loader-rmv" style="display:none;"></div></center>
	<div id="error-rmv" class="w3-text-red w3-center"></div>
	<table class="w3-table-all">
	<tr>
		<th>Admin_number</th>
		<th>Admin_name</th>
		<th>Admin_type</th>
		<th>Operation</th>
	</tr>
<?php
	require_once("../AdminDb/dbconnect.php");
	$query = "SELECT * FROM `admins` WHERE a_type = 'general' ORDER BY a_id";
	if($data = $conn->query($query)){

		if($data->num_rows <= 0){
			echo "<div class='w3-center w3-padding'>No General admins</div>";
		}
		else{
			while($result = $data->fetch_assoc())
			{
?>
	<tr><td><?php echo $result['a_number']."</td><td>".$result['a_name'] ?></td><td><?php echo $result['a_type'] ?></td><td><button class="w3-border-0 w3-hover-red kel-hover-2" onclick="removeAdmin(<?php echo $result['a_id'] ?>)"><i class="fa fa-remove"></i></button></td></tr>
<?php
			}
		}
	}
	else{
	    echo "Something went wrong";
	}

?>	
	</table>
</div>
</div>
</div>
</div>
<script>

setInterval(function(){
	let form =document.getElementById('addAdmin');
	if(form.show.checked){
		form.admin_pass.type="text";
	}
	else{
		form.admin_pass.type="password";
	}
}, 300);


let addAdmin = () => {
	
	if(!confirm('Want to really add?')){
		return;
	}
	
	let form = document.getElementById('addAdmin');
	let admin_name = form.admin_name.value;
	let admin_id = form.admin_id.value;
	let admin_pass = form.admin_pass.value;
	let admin_type = form.admin_type.value;
	
	if(admin_name == "" || admin_id == "" || admin_pass == ""){
		alert("fill the details properly");
		document.getElementById('error-add').innerHTML = "Fill the details";
		return;
	}
	if(admin_type == "admin type"){
		alert("select admin_type");
		document.getElementById('error-add').innerHTML = "please select admin_type";
		return;
	}
	
	if(admin_id.length < 4 || admin_name.length < 4 || admin_pass < 4){
		alert("fill the correct details");
		document.getElementById('error-add').innerHTML = "Fill the correct details";
		return;
	}
	
	if(admin_id.includes("$") || admin_id.includes("&") || admin_id.includes("=") || admin_id.includes("*") || admin_id.includes("`")){
		alert("incorrect details");
		document.getElementById('error-add').innerHTML = "incorrect details";
		return;
	}
	
	if(admin_name.includes("$") || admin_name.includes("&") || admin_name.includes("=") || admin_name.includes("*") || admin_name.includes("`")){
		alert("incorrect details");
		document.getElementById('error-add').innerHTML = "incorrect details";
		return;
	}
	
	if(admin_pass.includes("$") || admin_pass.includes("&") || admin_pass.includes("=") || admin_pass.includes("*") || admin_pass.includes("`")){
		alert("incorrect details");
		document.getElementById('error-add').innerHTML = "incorrect details";
		return;
	}
	
	let str = "admin_number="+admin_id+"&admin_name="+admin_name+"&admin_pass="+admin_pass+"&admin_type="+admin_type;
	let xhttp = new XMLHttpRequest();
	let loader = document.getElementById('loader-add');
		xhttp.onreadystatechange = function() {
			loader.style.display = "block";
			if(this.readyState == 4 && this.status == 200){
				document.getElementById('error-add').innerHTML = this.responseText;
				loader.style.display = "none";
				if(this.responseText == ""){
					alert("Admin added");
					form.admin_name.value = "";
					form.admin_id.value = "";
					form.admin_pass.value = "";
					location.reload();
					
				}
			}
		}
	xhttp.open("POST", "Action/addAdmin", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(str);
}

let removeAdmin = (index) => {
	
	if(!confirm('Want to really remove this admin?')){
		return;
	}
	
	let str = "admin_id="+index;
	let xhttp = new XMLHttpRequest();
	let loader = document.getElementById('loader-rmv');
		xhttp.onreadystatechange = function() {
			loader.style.display = "block";
			if(this.readyState == 4 && this.status == 200){
				document.getElementById('error-rmv').innerHTML = this.responseText;
				loader.style.display = "none";
				if(this.responseText == ""){
					alert("Admin removed");
					location.reload();
				}
			}
		}
	xhttp.open("POST", "Action/removeAdmin", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(str);
}
</script>



<?php
}
else{
	echo "<div class='w3-center w3-large w3-padding-32'>You are not authorised here</div>";
}

?>

</body>
</html>
<?php
	}
	else{
		header('Location:https://keltaking.co/Ads/min/logout');
	}
?>
