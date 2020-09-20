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
<script src="https://www.chartjs.org/dist/2.9.3/Chart.min.js"></script>
	<script src="https://www.chartjs.org/samples/latest/utils.js"></script>
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
		    1432
<?php
/*
        $qry = "SELECT COUNT(s_id) FROM students";
    	if($data = $conn->query($qry)){
    	    $rslt = $data->fetch_assoc();
    	    echo $rslt['COUNT(s_id)'];
    	}
    	else{
    	    echo "Error";
    	}
*/
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
			CONTACT
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
<div>
    <center>
    <select class="w3-input w3-border" style="width:20%">
        <option>08/09/2020</option>
    </select>
    </center>
</div>
</div>
<div style="width:75%;margin-left:300px;">
		<canvas id="canvas"></canvas>
	</div>
	<br>
	<br>
	
	<script>
		var MONTHS = ['9-10', '10-11', '11-12', '12-1', '1-2', '2-3', '3-4', '4-5', '5-6','7-8','8-9','9-10'];
		var config = {
			type: 'line',
			data: { 
				labels: ['9-10 AM', '10-11 AM', '11-12 AM', '12-1 PM', '1-2 PM', '2-3 PM', '3-4 PM', '4-5 PM', '5-6 PM', '6-7 PM', '7-8 PM', '8-9 PM','9-10'],
				datasets: [{
					label: 'Unique user count on 08/09/2020',
					backgroundColor: window.chartColors.green,
					borderColor: window.chartColors.green,
					data: [
						23,
						35,
						76,
						334,
						221,
						458,
						649,
						1023,
						1657,
						434,
						234,
						112,
						89
					],
					fill: false,
				}]
			},
			options: {
				responsive: true,
				title: {
					display: true,
					text: 'Website stats of keltaking.co/Exams'
				},
				tooltips: {
					mode: 'index',
					intersect: false,
				},
				hover: {
					mode: 'nearest',
					intersect: true
				},
				scales: {
					xAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Time periods'
						}
					}],
					yAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Unique user counts'
						}
					}]
				}
			}
		};

		window.onload = function() {
			var ctx = document.getElementById('canvas').getContext('2d');
			window.myLine = new Chart(ctx, config);
		};

	
		
	</script>
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
	</div><div class="w3-col l4 m6 s12 w3-margn-right w3-margin-top">
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
	</div><div class="w3-col l4 m6 s12 w3-margn-right w3-margin-top">
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
	</div><div class="w3-col l4 m6 s12 w3-margn-right w3-margin-top">
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
	</div><div class="w3-col l4 m6 s12 w3-margn-right w3-margin-top">
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
	</div><div class="w3-col l4 m6 s12 w3-margn-right w3-margin-top">
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
	</div><div class="w3-col l4 m6 s12 w3-margn-right w3-margin-top">
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
	</div><div class="w3-col l4 m6 s12 w3-margn-right w3-margin-top">
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
	</div><div class="w3-col l4 m6 s12 w3-margn-right w3-margin-top">
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
	</div><div class="w3-col l4 m6 s12 w3-margn-right w3-margin-top">
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
	</div><div class="w3-col l4 m6 s12 w3-margn-right w3-margin-top">
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
	</div><div class="w3-col l4 m6 s12 w3-margn-right w3-margin-top">
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
	</div><div class="w3-col l4 m6 s12 w3-margn-right w3-margin-top">
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
	</div><div class="w3-col l4 m6 s12 w3-margn-right w3-margin-top">
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
	</div><div class="w3-col l4 m6 s12 w3-margn-right w3-margin-top">
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
	</div><div class="w3-col l4 m6 s12 w3-margn-right w3-margin-top">
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
	</div><div class="w3-col l4 m6 s12 w3-margn-right w3-margin-top">
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
	</div><div class="w3-col l4 m6 s12 w3-margn-right w3-margin-top">
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
	</div><div class="w3-col l4 m6 s12 w3-margn-right w3-margin-top">
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
	</div><div class="w3-col l4 m6 s12 w3-margn-right w3-margin-top">
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
</body>
</html>
<?php
		$conn->close();
	}
	else{
		header('Location:https://keltaking.co/Exams/Ads/Min/logout');
	}
?>