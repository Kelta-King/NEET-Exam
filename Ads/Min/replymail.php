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
	    $s_name = $rslt['c_name'];
	    $s_email = $rslt['c_email'];
	
?>
<div class="w3-main" style="margin-left:300px">
    <div class="w3-center w3-margin-top w3-xxlarge">
        <b>Reply to <?php echo $s_name ?></b>
    </div>
<form id="addstudents" class="w3-margin w3-padding">
	<center><div class="loader" id="loader-add" style="display:none;"></div></center>
	<div id="error-add" class="w3-text-red w3-center"></div>
	<div class="w3-section">
		<input type="email" class="w3-input w3-round w3-border" placeholder="Email" value="<?php echo $s_email ?>" name="student_email">
	</div>
	<div>
	    <textarea class="w3-input w3-round w3-border" placeholder="reply..." name="reply" id="reply"></textarea>
	</div>
	<div class="w3-section">
		<input type="button" value="Reply" class="w3-button w3-blue kel-hover w3-border" onclick="addStudent()">
	</div>
</form>
</div>
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