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
	include "Commen/header.php";
	require_once("../AdminDb/dbconnect.php");
	
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<div class="w3-main" style="margin-left:300px">
<div class="w3-blue w3-bar w3-padding">
<a href="https://keltaking.co/Exams/Ads/Min/home" class="kel-hover"><div class="w3-left w3-bar-item w3-white w3-large w3-hover-green w3-round kel-hover">Home</div></a>
<a href="https://keltaking.co/Exams/Ads/Min/logout" class="kel-hover"><div class="w3-right w3-bar-item w3-white w3-large w3-hover-red w3-round kel-hover">logout</div></a>
</div>


<div>
<div class="w3-border w3-margin-top w3-margin-left w3-margin-right w3-round w3-card-2">
<div class="w3-row">
<div class="w3-half">
<div class="w3-container w3-green">
    <h2>Add Student</h2>
</div>
<form id="addstudents" class="w3-margin w3-padding">
	<center><div class="loader" id="loader-add" style="display:none;"></div></center>
	<div id="error-add" class="w3-text-red w3-center"></div>
	<div class="w3-section">
		<input type="number" class="w3-input w3-border" placeholder="RollNo" name="student_rollNo">
	</div>
	<div class="w3-section">
		<input type="text" class="w3-input w3-border" placeholder="Name" name="student_name">
	</div>
	<div class="w3-section">
		<input type="email" class="w3-input w3-border" placeholder="Email" name="student_email">
	</div>
	<div class="w3-section">
		<input type="tel" class="w3-input w3-border" placeholder="mobile" pattern="[6-9]{1}[0-9]{9}" name="student_mobile_no">
	</div>
	<div class="w3-section">
		<select class="w3-input w3-border" name="student_gender">
		    <option disabled selected>Gender</option>
		    <option value="male">Male</option>
		    <option value="female">Female</option>
		</select>
	</div>
		<div class="w3-section">
		<input type="button" value="Add Student" class="w3-button w3-blue kel-hover w3-border" onclick="addStudent()">
	</div>
</form>
</div>
<div class="w3-half">
<textarea class="w3-input w3-border-gray" style="border:5px solid;" placeholder="student send message will generate here..."
rows="10" id="msgs" value="fcghvhjj"></textarea>
<button class="w3-margin-top w3-button w3-blue kel-hover" style="cursor:copy" onclick="copymsg()">
<i class="fa fa-copy"></i> Copy
</button>
<div id="link">
    
</div>
</div>
</div>
</div>
</div>
<?php
/*
?>
<div class="w3-center">
<p>Search Student</p>  
<input id="myInput" class="w3-padding w3-center" type="text" placeholder="Search..">
<br><br>
</div>


<div class="w3-row w3-margin-top w3-margin-bottom">
    <table class="w3-table">
<thead class="w3-theme-dark">
    <tr>
        <th>Name</th>
        <th>Number</th>
        <th>Score</th>
        <th>Operation</th>
    </tr>
</thead>
<tbody>
<?php

$qry = 'SELECT * FROM students';

if($data = $conn->query($qry)){
    
    while($rslt = $data->fetch_assoc()){
        
?>
<tr>
    <td><?php echo $rslt['s_name'] ?></td>
    <td><?php echo $rslt['s_number'] ?></td>
    <td>
<?php 
    if($rslt['score'] == null){
        echo "-";
    }
    else{
        echo $rslt['score'];
    }
?>
    </td>
    <td><button class="w3-button w3-theme-l2" onclick="window.open('editStu?id=<?php echo $rslt['s_id'] ?>','_blank')">Edit</button></td>
</tr>
<?php
        
    }
    
}
else{
    echo "Something went wrong";
}
*/
?>
</tbody>
    </table>
</div>
</div>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

let emailCheck = (email) => {
    
    var s1 = email.split("@");
    var s3 = email.split(" ");
    if(s3.length > 1)
    {
        return false;
    }
    if(s1.length == 2)
    {
    	var s2 = s1[1].split(".");
        if(s2.length == 2 || s2.length == 3)
        {
        	if(s1[0].length < 6 || s2[0].length < 4 || s2[1].length > 4 || s2[1].length < 2)
            {
                return false;
            }
        }
        else
        {
        	return false;
        }
    }
    else
    {
      	return false;
    }
    
    return true;
}

function copymsg(){
    
    let text = document.getElementById("msgs");
    text.select();
    text.setSelectionRange(0, 99999);
    document.execCommand("copy");
    
}

let editStudent = (index) => {
	
	window.open("editStudent?s_id="+index); 
	
}


let removeStudent = (c_id, s_id) => {
	
	if(!confirm('Want to really remove?')){
		return;
	}
	let str = "c_id="+c_id+"&s_id="+s_id;
	let xhttp = new XMLHttpRequest();
	let loader = document.getElementById('loader-rmv-'+c_id);
		xhttp.onreadystatechange = function() {
			loader.style.display = "block";
			if(this.readyState == 4 && this.status == 200){
				document.getElementById('error-rmv-'+c_id).innerHTML = this.responseText;
				loader.style.display = "none";
				if(this.responseText == ""){
					alert("Student removed");
					location.reload();
				}
			}
		}
	xhttp.open("POST", "Action/removestudent", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(str);
	
	
}


let addStudent = () => {
	
	let form = document.getElementById('addstudents');
	let name = form.student_name.value;
	let rollNo = form.student_rollNo.value;
	let gender = form.student_gender.value;
	let email = form.student_email.value;
	let mob = form.student_mobile_no.value;

	if(name =="" || rollNo == "" || email == "" || mob == ""){
		alert("fill the details properly");
		document.getElementById('error-add').innerHTML = "Fill the details";
		return;
	}
	
	if(gender == "gender"){
		alert("Please, select a gender");
		document.getElementById('error-add').innerHTML = "please select a gender";
		return;
	}
	
	if(name.length < 4 || rollNo.length <= 4){
		alert("fill the correct details");
		document.getElementById('error-add').innerHTML = "Fill the correct details";
		return;
	}
	
	if(name.includes("$") || name.includes("&") || name.includes("=") || name.includes("*") || name.includes("`")){
		alert("incorrect name details");
		document.getElementById('error-add').innerHTML = "incorrect name details";
		return;
	}
	
	if(rollNo.includes("$") || rollNo.includes("&") || rollNo.includes("=") || rollNo.includes("*") || rollNo.includes("`")){
		alert("incorrect roll no details");
		document.getElementById('error-add').innerHTML = "incorrect roll no. details";
		return;
	}
	
	if(!emailCheck(email)){
	    alert("incorrect email");
		document.getElementById('error-add').innerHTML = "incorrect email";
		return;
	}
	
	
	let str = "rollNo="+rollNo+"&name="+name+"&email="+email+"&mobile="+mob+"&gender="+gender;
	let xhttp = new XMLHttpRequest();
	let loader = document.getElementById('loader-add');
		xhttp.onreadystatechange = function() {
			loader.style.display = "block";
			if(this.readyState == 4 && this.status == 200){
				loader.style.display = "none";
				if(this.responseText.length > 30){
					alert("Student added");
					form.student_name.value = "";
					form.student_rollNo.value = "";
					form.student_email.value = "";
                    form.student_mobile_no.value = "";
					document.getElementById('msgs').value = this.responseText;
					document.getElementById('link').innerHTML = '<a href="https://api.whatsapp.com/send?phone=91'+mob+'&text=" target="_blank" />'+ name +'\'s Whatsapp Link </a>';
				
				}
				else{
				    document.getElementById('error-add').innerHTML = this.responseText;
				}
			}
		}
	xhttp.open("POST", "Action/addStudent", true);
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
?><?php
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
	include "Commen/header.php";
	require_once("../AdminDb/dbconnect.php");
	
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<div class="w3-main" style="margin-left:300px">
<div class="w3-blue w3-bar w3-padding">
<a href="https://keltaking.co/Exams/Ads/Min/home" class="kel-hover"><div class="w3-left w3-bar-item w3-white w3-large w3-hover-green w3-round kel-hover">Home</div></a>
<a href="https://keltaking.co/Exams/Ads/Min/logout" class="kel-hover"><div class="w3-right w3-bar-item w3-white w3-large w3-hover-red w3-round kel-hover">logout</div></a>
</div>


<div>
<div class="w3-border w3-margin-top w3-margin-left w3-margin-right w3-round w3-card-2">
<div class="w3-row">
<div class="w3-half">
<div class="w3-container w3-green">
    <h2>Add Student</h2>
</div>
<form id="addstudents" class="w3-margin w3-padding">
	<center><div class="loader" id="loader-add" style="display:none;"></div></center>
	<div id="error-add" class="w3-text-red w3-center"></div>
	<div class="w3-section">
		<input type="number" class="w3-input w3-border" placeholder="RollNo" name="student_rollNo">
	</div>
	<div class="w3-section">
		<input type="text" class="w3-input w3-border" placeholder="Name" name="student_name">
	</div>
	<div class="w3-section">
		<input type="email" class="w3-input w3-border" placeholder="Email" name="student_email">
	</div>
	<div class="w3-section">
		<input type="tel" class="w3-input w3-border" placeholder="mobile" pattern="[6-9]{1}[0-9]{9}" name="student_mobile_no">
	</div>
	<div class="w3-section">
		<select class="w3-input w3-border" name="student_gender">
		    <option disabled selected>Gender</option>
		    <option value="male">Male</option>
		    <option value="female">Female</option>
		</select>
	</div>
		<div class="w3-section">
		<input type="button" value="Add Student" class="w3-button w3-blue kel-hover w3-border" onclick="addStudent()">
	</div>
</form>
</div>
<div class="w3-half">
<textarea class="w3-input w3-border-gray" style="border:5px solid;" placeholder="student send message will generate here..."
rows="10" id="msgs" value="fcghvhjj"></textarea>
<button class="w3-margin-top w3-button w3-blue kel-hover" style="cursor:copy" onclick="copymsg()">
<i class="fa fa-copy"></i> Copy
</button>
<div id="link">
    
</div>
</div>
</div>
</div>
</div>
<?php
/*
?>
<div class="w3-center">
<p>Search Student</p>  
<input id="myInput" class="w3-padding w3-center" type="text" placeholder="Search..">
<br><br>
</div>


<div class="w3-row w3-margin-top w3-margin-bottom">
    <table class="w3-table">
<thead class="w3-theme-dark">
    <tr>
        <th>Name</th>
        <th>Number</th>
        <th>Score</th>
        <th>Operation</th>
    </tr>
</thead>
<tbody>
<?php

$qry = 'SELECT * FROM students';

if($data = $conn->query($qry)){
    
    while($rslt = $data->fetch_assoc()){
        
?>
<tr>
    <td><?php echo $rslt['s_name'] ?></td>
    <td><?php echo $rslt['s_number'] ?></td>
    <td>
<?php 
    if($rslt['score'] == null){
        echo "-";
    }
    else{
        echo $rslt['score'];
    }
?>
    </td>
    <td><button class="w3-button w3-theme-l2" onclick="window.open('editStu?id=<?php echo $rslt['s_id'] ?>','_blank')">Edit</button></td>
</tr>
<?php
        
    }
    
}
else{
    echo "Something went wrong";
}
*/
?>
</tbody>
    </table>
</div>
</div>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

let emailCheck = (email) => {
    
    var s1 = email.split("@");
    var s3 = email.split(" ");
    if(s3.length > 1)
    {
        return false;
    }
    if(s1.length == 2)
    {
    	var s2 = s1[1].split(".");
        if(s2.length == 2 || s2.length == 3)
        {
        	if(s1[0].length < 6 || s2[0].length < 4 || s2[1].length > 4 || s2[1].length < 2)
            {
                return false;
            }
        }
        else
        {
        	return false;
        }
    }
    else
    {
      	return false;
    }
    
    return true;
}

function copymsg(){
    
    let text = document.getElementById("msgs");
    text.select();
    text.setSelectionRange(0, 99999);
    document.execCommand("copy");
    
}

let editStudent = (index) => {
	
	window.open("editStudent?s_id="+index); 
	
}


let removeStudent = (c_id, s_id) => {
	
	if(!confirm('Want to really remove?')){
		return;
	}
	let str = "c_id="+c_id+"&s_id="+s_id;
	let xhttp = new XMLHttpRequest();
	let loader = document.getElementById('loader-rmv-'+c_id);
		xhttp.onreadystatechange = function() {
			loader.style.display = "block";
			if(this.readyState == 4 && this.status == 200){
				document.getElementById('error-rmv-'+c_id).innerHTML = this.responseText;
				loader.style.display = "none";
				if(this.responseText == ""){
					alert("Student removed");
					location.reload();
				}
			}
		}
	xhttp.open("POST", "Action/removestudent", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(str);
	
	
}


let addStudent = () => {
	
	let form = document.getElementById('addstudents');
	let name = form.student_name.value;
	let rollNo = form.student_rollNo.value;
	let gender = form.student_gender.value;
	let email = form.student_email.value;
	let mob = form.student_mobile_no.value;

	if(name =="" || rollNo == "" || email == "" || mob == ""){
		alert("fill the details properly");
		document.getElementById('error-add').innerHTML = "Fill the details";
		return;
	}
	
	if(gender == "gender"){
		alert("Please, select a gender");
		document.getElementById('error-add').innerHTML = "please select a gender";
		return;
	}
	
	if(name.length < 4 || rollNo.length <= 4){
		alert("fill the correct details");
		document.getElementById('error-add').innerHTML = "Fill the correct details";
		return;
	}
	
	if(name.includes("$") || name.includes("&") || name.includes("=") || name.includes("*") || name.includes("`")){
		alert("incorrect name details");
		document.getElementById('error-add').innerHTML = "incorrect name details";
		return;
	}
	
	if(rollNo.includes("$") || rollNo.includes("&") || rollNo.includes("=") || rollNo.includes("*") || rollNo.includes("`")){
		alert("incorrect roll no details");
		document.getElementById('error-add').innerHTML = "incorrect roll no. details";
		return;
	}
	
	if(!emailCheck(email)){
	    alert("incorrect email");
		document.getElementById('error-add').innerHTML = "incorrect email";
		return;
	}
	
	
	let str = "rollNo="+rollNo+"&name="+name+"&email="+email+"&mobile="+mob+"&gender="+gender;
	let xhttp = new XMLHttpRequest();
	let loader = document.getElementById('loader-add');
		xhttp.onreadystatechange = function() {
			loader.style.display = "block";
			if(this.readyState == 4 && this.status == 200){
				loader.style.display = "none";
				if(this.responseText.length > 30){
					alert("Student added");
					form.student_name.value = "";
					form.student_rollNo.value = "";
					form.student_email.value = "";
                    form.student_mobile_no.value = "";
					document.getElementById('msgs').value = this.responseText;
					document.getElementById('link').innerHTML = '<a href="https://api.whatsapp.com/send?phone=91'+mob+'&text=" target="_blank" />'+ name +'\'s Whatsapp Link </a>';
				
				}
				else{
				    document.getElementById('error-add').innerHTML = this.responseText;
				}
			}
		}
	xhttp.open("POST", "Action/addStudent", true);
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
?><?php
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
	include "Commen/header.php";
	require_once("../AdminDb/dbconnect.php");
	
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<div class="w3-main" style="margin-left:300px">
<div class="w3-blue w3-bar w3-padding">
<a href="https://keltaking.co/Exams/Ads/Min/home" class="kel-hover"><div class="w3-left w3-bar-item w3-white w3-large w3-hover-green w3-round kel-hover">Home</div></a>
<a href="https://keltaking.co/Exams/Ads/Min/logout" class="kel-hover"><div class="w3-right w3-bar-item w3-white w3-large w3-hover-red w3-round kel-hover">logout</div></a>
</div>


<div>
<div class="w3-border w3-margin-top w3-margin-left w3-margin-right w3-round w3-card-2">
<div class="w3-row">
<div class="w3-half">
<div class="w3-container w3-green">
    <h2>Add Student</h2>
</div>
<form id="addstudents" class="w3-margin w3-padding">
	<center><div class="loader" id="loader-add" style="display:none;"></div></center>
	<div id="error-add" class="w3-text-red w3-center"></div>
	<div class="w3-section">
		<input type="number" class="w3-input w3-border" placeholder="RollNo" name="student_rollNo">
	</div>
	<div class="w3-section">
		<input type="text" class="w3-input w3-border" placeholder="Name" name="student_name">
	</div>
	<div class="w3-section">
		<input type="email" class="w3-input w3-border" placeholder="Email" name="student_email">
	</div>
	<div class="w3-section">
		<input type="tel" class="w3-input w3-border" placeholder="mobile" pattern="[6-9]{1}[0-9]{9}" name="student_mobile_no">
	</div>
	<div class="w3-section">
		<select class="w3-input w3-border" name="student_gender">
		    <option disabled selected>Gender</option>
		    <option value="male">Male</option>
		    <option value="female">Female</option>
		</select>
	</div>
		<div class="w3-section">
		<input type="button" value="Add Student" class="w3-button w3-blue kel-hover w3-border" onclick="addStudent()">
	</div>
</form>
</div>
<div class="w3-half">
<textarea class="w3-input w3-border-gray" style="border:5px solid;" placeholder="student send message will generate here..."
rows="10" id="msgs" value="fcghvhjj"></textarea>
<button class="w3-margin-top w3-button w3-blue kel-hover" style="cursor:copy" onclick="copymsg()">
<i class="fa fa-copy"></i> Copy
</button>
<div id="link">
    
</div>
</div>
</div>
</div>
</div>
<?php
/*
?>
<div class="w3-center">
<p>Search Student</p>  
<input id="myInput" class="w3-padding w3-center" type="text" placeholder="Search..">
<br><br>
</div>


<div class="w3-row w3-margin-top w3-margin-bottom">
    <table class="w3-table">
<thead class="w3-theme-dark">
    <tr>
        <th>Name</th>
        <th>Number</th>
        <th>Score</th>
        <th>Operation</th>
    </tr>
</thead>
<tbody>
<?php

$qry = 'SELECT * FROM students';

if($data = $conn->query($qry)){
    
    while($rslt = $data->fetch_assoc()){
        
?>
<tr>
    <td><?php echo $rslt['s_name'] ?></td>
    <td><?php echo $rslt['s_number'] ?></td>
    <td>
<?php 
    if($rslt['score'] == null){
        echo "-";
    }
    else{
        echo $rslt['score'];
    }
?>
    </td>
    <td><button class="w3-button w3-theme-l2" onclick="window.open('editStu?id=<?php echo $rslt['s_id'] ?>','_blank')">Edit</button></td>
</tr>
<?php
        
    }
    
}
else{
    echo "Something went wrong";
}
*/
?>
</tbody>
    </table>
</div>
</div>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

let emailCheck = (email) => {
    
    var s1 = email.split("@");
    var s3 = email.split(" ");
    if(s3.length > 1)
    {
        return false;
    }
    if(s1.length == 2)
    {
    	var s2 = s1[1].split(".");
        if(s2.length == 2 || s2.length == 3)
        {
        	if(s1[0].length < 6 || s2[0].length < 4 || s2[1].length > 4 || s2[1].length < 2)
            {
                return false;
            }
        }
        else
        {
        	return false;
        }
    }
    else
    {
      	return false;
    }
    
    return true;
}

function copymsg(){
    
    let text = document.getElementById("msgs");
    text.select();
    text.setSelectionRange(0, 99999);
    document.execCommand("copy");
    
}

let editStudent = (index) => {
	
	window.open("editStudent?s_id="+index); 
	
}


let removeStudent = (c_id, s_id) => {
	
	if(!confirm('Want to really remove?')){
		return;
	}
	let str = "c_id="+c_id+"&s_id="+s_id;
	let xhttp = new XMLHttpRequest();
	let loader = document.getElementById('loader-rmv-'+c_id);
		xhttp.onreadystatechange = function() {
			loader.style.display = "block";
			if(this.readyState == 4 && this.status == 200){
				document.getElementById('error-rmv-'+c_id).innerHTML = this.responseText;
				loader.style.display = "none";
				if(this.responseText == ""){
					alert("Student removed");
					location.reload();
				}
			}
		}
	xhttp.open("POST", "Action/removestudent", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(str);
	
	
}


let addStudent = () => {
	
	let form = document.getElementById('addstudents');
	let name = form.student_name.value;
	let rollNo = form.student_rollNo.value;
	let gender = form.student_gender.value;
	let email = form.student_email.value;
	let mob = form.student_mobile_no.value;

	if(name =="" || rollNo == "" || email == "" || mob == ""){
		alert("fill the details properly");
		document.getElementById('error-add').innerHTML = "Fill the details";
		return;
	}
	
	if(gender == "gender"){
		alert("Please, select a gender");
		document.getElementById('error-add').innerHTML = "please select a gender";
		return;
	}
	
	if(name.length < 4 || rollNo.length <= 4){
		alert("fill the correct details");
		document.getElementById('error-add').innerHTML = "Fill the correct details";
		return;
	}
	
	if(name.includes("$") || name.includes("&") || name.includes("=") || name.includes("*") || name.includes("`")){
		alert("incorrect name details");
		document.getElementById('error-add').innerHTML = "incorrect name details";
		return;
	}
	
	if(rollNo.includes("$") || rollNo.includes("&") || rollNo.includes("=") || rollNo.includes("*") || rollNo.includes("`")){
		alert("incorrect roll no details");
		document.getElementById('error-add').innerHTML = "incorrect roll no. details";
		return;
	}
	
	if(!emailCheck(email)){
	    alert("incorrect email");
		document.getElementById('error-add').innerHTML = "incorrect email";
		return;
	}
	
	
	let str = "rollNo="+rollNo+"&name="+name+"&email="+email+"&mobile="+mob+"&gender="+gender;
	let xhttp = new XMLHttpRequest();
	let loader = document.getElementById('loader-add');
		xhttp.onreadystatechange = function() {
			loader.style.display = "block";
			if(this.readyState == 4 && this.status == 200){
				loader.style.display = "none";
				if(this.responseText.length > 30){
					alert("Student added");
					form.student_name.value = "";
					form.student_rollNo.value = "";
					form.student_email.value = "";
                    form.student_mobile_no.value = "";
					document.getElementById('msgs').value = this.responseText;
					document.getElementById('link').innerHTML = '<a href="https://api.whatsapp.com/send?phone=91'+mob+'&text=" target="_blank" />'+ name +'\'s Whatsapp Link </a>';
				
				}
				else{
				    document.getElementById('error-add').innerHTML = this.responseText;
				}
			}
		}
	xhttp.open("POST", "Action/addStudent", true);
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
