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
	define("TITLE", "Home | KeltAEdu");
	include "Commen/header.php";
?>
<div class="w3-main" style="margin-left:300px">
<div class="w3-blue w3-bar w3-padding">
<a href="logout" class="kel-hover"><div class="w3-right w3-bar-item w3-white w3-large w3-hover-red w3-round kel-hover">logout</div></a>
</div>
<?php

    require_once("../AdminDb/dbconnect.php");
    
?>
<div class="w3-row w3-row-padding w3-margin">
	<div class="w3-col l4 m6 s12 w3-margn-right w3-margin-top">
		<a href="students" style="text-decoration:none">
		<div class="w3-green w3-round kel-hover">
		<div class="w3-center w3-xxlarge w3-padding-32">
			STUDENTS
		</div>
		<div class=" w3-margin-left w3-large w3-padding-16">
<?php
        $qry = "SELECT COUNT(s_id) FROM students";
    	if($data = $conn->query($qry)){
    	    $rslt = $data->fetch_assoc();
    	    echo $rslt['COUNT(s_id)'];
    	}
    	else{
    	    echo "Error";
    	}
?>
		</div>
		</div>
		</a>
	</div>
	<div class="w3-col l4 m6 s12 w3-margn-right w3-margin-top">
		<a href="questions" style="text-decoration:none">
		<div class="w3-red w3-round kel-hover">
		<div class="w3-center w3-xxlarge w3-padding-32">
			QUESTIONS
		</div>
		<div class=" w3-margin-left w3-large w3-padding-16">
<?php
        $qry = "SELECT COUNT(q_id) FROM questions";
    	if($data = $conn->query($qry)){
    	    $rslt = $data->fetch_assoc();
    	    echo $rslt['COUNT(q_id)'];
    	}
    	else{
    	    echo "Error";
    	}
?>
		</div>
		</div>
		</a>
	</div>
	<div class="w3-col l4 m6 s12 w3-margn-right w3-margin-top">
		<a href="admins" style="text-decoration:none">
		<div class="w3-orange w3-round kel-hover">
		<div class="w3-center w3-xxlarge w3-padding-32">
			ADMINS
		</div>
		<div class=" w3-margin-left w3-large w3-padding-16">
<?php
	$qry = "SELECT COUNT(a_id) FROM admins";
	if($data = $conn->query($qry)){
	    $rslt = $data->fetch_assoc();
	    echo $rslt['COUNT(a_id)'];
	}
	else{
	    echo "Error";
	}
?>
		</div>
		</div>
		</a>
	</div>
</div>
</div>

</body>
</html>
<?php
		$conn->close();
	}
	else{
		header('Location:https://keltaking.co/Exams/Ads/Min/logout');
	}
?>