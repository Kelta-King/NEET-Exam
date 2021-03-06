<!DOCTYPE html>
<html>
	<head>
		<title>LogIn | NEET demo test</title>
		<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="icon" href="https://keltaking.co/favicon.ico" type="image/gif" sizes="20x20"> 
        <link href="https://keltaking.co/favicon.ico" rel="apple-touch-icon" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="CSS/kel.css">
        <style>
            .loader{
                border: 5px solid #f3f3f3;
  border-radius: 50%;
  border-top: 5px solid #3498db;
  width: 30px;
  height: 30px;
  -webkit-animation: spin 1s linear infinite; /* Safari */
  animation: spin 1s linear infinite;
            }
        </style>
	</head>
	<body>
	    
<div class="w3-theme">
    <div class="w3-content">
    <div class="w3-bar w3-padding" id="myNavbar">
    <a class="w3-bar-item w3-button w3-hover-black w3-hide-medium w3-hide-large w3-right kel-hover" href="javascript:void(0);" onclick="toggleFunction()" title="Toggle Navigation Menu">
      <i class="fa fa-bars"></i>
    </a>
    <a href="donate" class="w3-bar-item w3-button w3-hide-small kel-hover w3-hover-theme-dark w3-round w3-right"><i class="fa fa-rupee"></i> Donate</a>
    <a href="results" class="w3-bar-item w3-button w3-hide-small kel-hover w3-hover-theme-dark w3-round"><i class="fa fa-th"></i> Results</a>
    <a href="contact" class="w3-bar-item w3-button w3-hide-small kel-hover w3-hover-theme-dark w3-round w3-right"><i class="fa fa-envelope"></i> Contact</a>
    <a href="/Exams" class="w3-bar-item w3-button w3-hide-small kel-hover w3-round w3-right w3-white w3-hover-theme-dark"><i class="fa fa-sign-in"></i> Register</a>
    </div>
    
  <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-animate-top">
    <a href="donate" class="w3-bar-item w3-button w3-theme-l1 w3-hover-theme-dark kel-hover" onclick="toggleFunction()"><i class="fa fa-rupee"></i> Donate</a>
    <a href="results" class="w3-bar-item w3-button w3-theme-l1 w3-hover-theme-dark kel-hover" onclick="toggleFunction()"><i class="fa fa-th"></i> Results</a>
    <a href="contact" class="w3-bar-item w3-button w3-theme-l1 w3-hover-theme-dark kel-hover" onclick="toggleFunction()"><i class="fa fa-envelope"></i> Contact</a>
    <a href="/Exams" class="w3-bar-item w3-button w3-theme-l1 w3-hover-theme-dark kel-hover" onclick="toggleFunction()"><i class="fa fa-sign-in"></i> Register</a>
    
  </div>
</div>
</div>

<div class="w3-padding-64 w3-theme-l1 bgimg">
    <center>
	<h1 class="w3-xlarge">
	    <b>FREE <span class="w3-theme-dark">NEET</span> PRACTICE TEST</b>
	</h1>
	<div class="w3-content w3-margin w3-card w3-center" style="max-width:400px">
	
	<div class="w3-card w3-hover-shadow" style="margin-top:20px;">
	<div class="w3-light-gray w3-container w3-center" style="z-index:2;">
		<div class="w3-padding-16">
			
		<div class="w3-xlarge w3-bold w3-margin-top"><b>Login for test</b></div>
		<div>
		    You will find your login details in your registered email's inbox.
		</div>
		<div class="w3-center" style="padding-top:16px;">
		    <img src="https://www.w3schools.com/w3css/img_avatar3.png" class="w3-circle" style="width:150px">
		</div>
		<form class="w3-container w3-center w3-margin" id="register">
		<div class="w3-margin-bottom w3-text-red" >
		    <center><div class="loader" id="loader" style="display:none;"></div></center>
		<div id="error"></div>
		</div>
		
			<div class="w3-section">
				<input type="text" class="w3-padding w3-round-xxlarge w3-border w3-hover-border-black" name="rollno" placeholder="Roll No" style="margin:0;width:90%;" required><br>
			</div>
			<div class="w3-section" style="text-align:left">
			    <span>
				<input type="password" class="w3-padding w3-round-xxlarge w3-border w3-hover-border-black" name="pass" id='pass' placeholder="Password" style="margin:0;width:80%;margin-left:15px;" required>
			    </span>
			    <span class="" style="width:10%; margin-left:5px;cursor:pointer" onclick="see()"><i id="eye" class="fa fa-eye" title="watch"></i></span>
			</div>
			<br>
			<a href="/Exams" class="kel-hover-2 w3-center"><u>Not joined?</u></a>
			<div class="w3-section">
				<button type="button" class="kel-button w3-black w3-round w3-padding w3-border-black w3-black" onclick="login()">Log in</button>
			</div>
			
		</form>
		</div>
	</div>
	</div>
	</div>
	</center>
</div>
<script src="JS/login.js"></script>
	</body>
</html>