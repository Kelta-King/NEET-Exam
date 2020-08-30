    <html>
	<head>
		<title>LogIn | Student Login</title>
		<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="Kel-CSS/kel.css">
		<link rel="icon" href="https://keltaking.co/favicon.ico" type="image/gif" sizes="20x20"> 
        <link href="https://keltaking.co/favicon.ico" rel="apple-touch-icon" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="CSS/kel.css">
	</head>
	<body>
	    
<div class="w3-theme">
    <div class="w3-content">
    <div class="w3-bar w3-padding" id="myNavbar">
    <a class="w3-bar-item w3-button w3-hover-black w3-hide-medium w3-hide-large w3-right kel-hover" href="javascript:void(0);" onclick="toggleFunction()" title="Toggle Navigation Menu">
      <i class="fa fa-bars"></i>
    </a>
    <a href="" class="w3-bar-item w3-button w3-hide-small kel-hover w3-hover-theme-dark w3-round w3-right"><i class="fa fa-rupee"></i> Donate</a>
    <a href="" class="w3-bar-item w3-button w3-hide-small kel-hover w3-hover-theme-dark w3-round"><i class="fa fa-th"></i> Results</a>
    <a href="" class="w3-bar-item w3-button w3-hide-small kel-hover w3-hover-theme-dark w3-round w3-right"><i class="fa fa-envelope"></i> Contact</a>
    <a href="" class="w3-bar-item w3-button w3-hide-small kel-hover w3-round w3-right w3-white w3-hover-theme-dark"><i class="fa fa-sign-in"></i> Log in</a>
    </div>
    
  <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-animate-top">
    <a href="" class="w3-bar-item w3-button w3-theme-l1 w3-hover-theme-dark kel-hover" onclick="toggleFunction()"><i class="fa fa-rupee"></i> Donate</a>
    <a href="" class="w3-bar-item w3-button w3-theme-l1 w3-hover-theme-dark kel-hover" onclick="toggleFunction()"><i class="fa fa-th"></i> Results</a>
    <a href="" class="w3-bar-item w3-button w3-theme-l1 w3-hover-theme-dark kel-hover" onclick="toggleFunction()"><i class="fa fa-envelope"></i> Contact</a>
    <a href="" class="w3-bar-item w3-button w3-theme-l1 w3-hover-theme-dark kel-hover" onclick="toggleFunction()"><i class="fa fa-sign-in"></i> Log in</a>
    
  </div>
</div>
</div>

<div class="w3-padding-64 w3-theme-l1 bgimg">
    <center>
	<div class="w3-content w3-margin w3-card w3-center" style="max-width:400px">
	<div class="w3-card w3-hover-shadow" style="margin-top:20px;">
	<div class="w3-light-gray w3-container w3-center w3-animate-fade" style="z-index:2;">
		<div class="w3-padding-16">
			
		<div class="w3-xlarge w3-bold w3-margin-top">Register and Begin</div>
		<div class="w3-small w3-center" style="padding-top:16px;">
		    After filling this form, you will recieve an email containing the link of exams and your login details.
		</div>
		<form class="w3-container w3-center w3-margin" id="login">
		<div class="w3-margin-bottom w3-text-red" >
		<center><div class="loader" id="loader" style="display:none;"></div></center>
		<div id="error"></div>
		</div>
		
			<div class="w3-section">
				<input type="text" class="w3-padding w3-round-xxlarge w3-border w3-hover-border-black" name="name" placeholder="Full Name" style="margin:0;width:90%;" required><br>
			</div>
			<div class="w3-section">
				<input type="email" class="w3-padding w3-round-xxlarge w3-border w3-hover-border-black" name="email" placeholder="Email Id" style="margin:0;width:90%;" required><br>
			</div>
			<div class="w3-section">
				<input type="number" class="w3-padding w3-round-xxlarge w3-border w3-hover-border-black" name="contno" placeholder="Mobile number" style="margin:0;width:90%;" required><br>
			</div>
			<div class="w3-section">
				<input type="text" class="w3-padding w3-round-xxlarge w3-border w3-hover-border-black" name="pass1" placeholder="Password" style="margin:0;width:90%;" required><br>
			</div>
			<div class="w3-section">
				<input type="password" class="w3-padding w3-round-xxlarge w3-border w3-hover-border-black" name="pass2" placeholder="Password again" style="margin:0;width:90%;" required>
			</div>
			<a href="" class="kel-hover-2"><u>Already joined?</u></a>
			<div class="w3-section">
				<button type="button" class="kel-button w3-black w3-round w3-padding w3-border-black w3-black" onclick="login()">LogIn</button>
			</div>
			
		</form>
		</div>
	</div>
	</div>
	</div>
	</center>
</div>


<script>
// Modal Image Gallery
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}

// Change style of navbar on scroll
window.onscroll = function() {myFunction()};
function myFunction() {
    var navbar = document.getElementById("myNavbar");
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        navbar.className = "w3-bar" + " w3-card" + " w3-animate-top" + " w3-white";
    } else {
        navbar.className = navbar.className.replace(" w3-card w3-animate-top w3-white", "");
    }
}

// Used to toggle the menu on small screens when clicking on the menu button
function toggleFunction() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>


	    
	</body>
</html>
