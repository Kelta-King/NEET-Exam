<!DOCTYPE html>
<html>
	<head>
		<title><?php echo TITLE ?></title>
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://keltaking.co/Exams/CSS/kel.css">
		<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css2?family=Literata&display=swap" rel="stylesheet"> 
		<style>
			.loader {
			  border: 5px solid #f3f3f3;
			  border-radius: 50%;
			  border-top: 5px solid #3498db;
			  width: 30px;
			  height: 30px;
			  -webkit-animation: spin 1s linear infinite; 
			  animation: spin 1s linear infinite;
			}

			@-webkit-keyframes spin {
			  0% { -webkit-transform: rotate(0deg); }
			  100% { -webkit-transform: rotate(360deg); }
			}

			@keyframes spin {
			  0% { transform: rotate(0deg); }
			  100% { transform: rotate(360deg); }
			}
			
			#mySidebar{
				background-color:#303030;
			}
		</style>
		<script>
		function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
}
 
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}
		</script>
	</head>
<body>
	<nav class="w3-sidebar w3-bar-block w3-animate-left w3-text-white w3-collapse w3-top" style="z-index:3;width:300px;font-weight:bold" id="mySidebar"><br>
		<h3 class="w3-padding-32 w3-center w3-xxlarge"><b>KEltaEdu</b></h3>
		<a href="javascript:void(0)" onclick="w3_close()" class="w3-display-topright w3-button w3-padding w3-hide-large w3-hover-white"><i class="fa fa-remove"></i></a>
		<a href="https://keltaking.co/Exams/Ads/Min/students" onclick="w3_close()" class="w3-bar-item w3-button w3-margin-top kel-hover-2 w3-hover-white">STUDENTS<i class="fa fa-caret-right w3-right"></i></a> 
		<a href="https://keltaking.co/Exams/Ads/Min/questions" onclick="w3_close()" class="w3-bar-item w3-button w3-margin-top kel-hover-2 w3-hover-white">QUESTIONS<i class="fa fa-caret-right w3-right"></i></a>
		<a href="https://keltaking.co/Exams/Ads/Min/admins" onclick="w3_close()" class="w3-bar-item w3-button w3-margin-top kel-hover-2 w3-hover-white">FEEDBACKS<i class="fa fa-caret-right w3-right"></i></a>
		<a href="https://keltaking.co/Exams/Ads/Min/contacts" onclick="w3_close()" class="w3-bar-item w3-button w3-margin-top kel-hover-2 w3-hover-white">SUPPORT<i class="fa fa-caret-right w3-right"></i></a>
		<a href="https://keltaking.co/Exams/Ads/Min/edit" onclick="w3_close()" class="w3-bar-item w3-button w3-margin-top kel-hover-2 w3-hover-white">EDIT<i class="fa fa-caret-right w3-right"></i></a> 
		<a href="https://keltaking.co/Exams/Ads/Min/logout" class="w3-bar-item w3-button w3-margin-top kel-hover-2 w3-hover-white" onclick="w3_close()" >lOGOUT</a>
		<a href="https://keltaking.co/" class="w3-display-bottommiddle w3-padding">&copy; KushangShah</a>
	</nav>

<!-- Top menu on small screens -->
<header class="w3-container w3-top w3-hide-large w3-blue w3-xlarge w3-padding-16">
  <span class="w3-left w3-padding">KEltaEdu</span>
  <a href="javascript:void(0)" class="w3-right w3-button w3-blue" onclick="w3_open()"><i class="fa fa-bars"></i></a>
</header>

