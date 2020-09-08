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
<div class="w3-margin w3-padding-32">
<table class="w3-table-all">
    <thead>
        <tr class="w3-blue"><th>Name</th><th>email</th><th>Catagory</th><th>problem</th><th>Reply</th></tr>
    </thead>
<?php

$query = "SELECT * FROM contacts WHERE solve = '0'";

if($data = $conn->query($query)){
  
  while($rslt = $data->fetch_assoc()){  
?>
<tr><td><?php echo $rslt['c_name'] ?></td><td><?php echo $rslt['c_email'] ?></td><td><?php echo $rslt['c_problem'] ?></td>
<td>
<?php 
echo substr($rslt['c_msg'],0,13)."...";
?>
</td>
<td>
    <button class="w3-button w3-red kel-hover" onclick = "window.open('replymail?id=<?php echo $rslt['c_id'] ?>','_self')">
        <i class="fa fa-reply"></i> Reply
    </button>
</td>
</tr>
<?php
  }
}
else{
    echo "Something went wrong";
}

?>
</table>
</div>
</div>
<script>
    
</script>
</body>
</html>
<?php
    $conn->close();
	}
	else{
		header('Location:https://keltaking.co/Exams/Ads/Min/logout');
	}
?>