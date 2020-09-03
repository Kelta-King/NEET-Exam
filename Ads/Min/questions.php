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
<h1 class="w3-center w3-xlarge w3-margin-top">Add questions</h1>
<div class="w3-center">
    <a href="Subs/physics" class="w3-button w3-orange kel-hover w3-margin w3-xxlarge">Physics <div class="w3-badge">
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
</div></a>
    <a href="Subs/chemistry" class="w3-button w3-blue kel-hover w3-margin w3-xxlarge">Chemistry <div class="w3-badge">
<?php
    $qry = "SELECT COUNT(q_id) FROM questions WHERE q_sub = 'Chem'";
    if($data = $conn->query($qry)){
        $rslt = $data->fetch_assoc();
        echo $rslt['COUNT(q_id)'];
    }
    else{
        echo "error";
    }
?>
</div></a>
    <a href="Subs/biology" class="w3-button w3-green kel-hover w3-margin w3-xxlarge">Biology <div class="w3-badge">
<?php
    $qry = "SELECT COUNT(q_id) FROM questions WHERE q_sub = 'Bio'";
    if($data = $conn->query($qry)){
        $rslt = $data->fetch_assoc();
        echo $rslt['COUNT(q_id)'];
    }
    else{
        echo "error";
    }
?>
</div></a>
</div>
</div>

</body>
</html>
<?php
	}
	else{
		header('Location:https://keltaking.co/Exams/Ads/Min/logout');
	}
?>