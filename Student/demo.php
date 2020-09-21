<!DOCTYPE html>
<html>
	<head>
		<title>DemoPage | Demo NEET Exam</title>
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
    document.getElementById('bars').style.display='block';
  document.getElementById("mySidebar").style.display = "block";
}
 
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById('bars').style.display='none';
}
		</script>
	</head>
<body>
<div id="intro" class="w3-modal" style="z-index:3;">
    <div class="w3-modal-content w3-animate-zoom w3-card-4">
        <header class="w3-container w3-teal"> 
            <span onclick="document.getElementById('intro').style.display='none'" class="w3-button w3-display-topright">&times;</span>
        <h2>Introduction to interface</h2>
        </header>
        <div class="w3-container">
            <p>On this page, you will get introduction to the interface of exam. Click on anything. If it is necessary for exam interface then we will tell you about it.</p>
            <p class="w3-padding-16">
                Next click the Biology button (for mobile users click Bio button).
            </p>
        </div>
        <footer class="w3-container w3-teal">
            <p>Best of luck</p>
        </footer>
    </div>
</div>
<div id="bio_d" class="w3-modal" style="z-index:3;">
    <div class="w3-modal-content w3-animate-zoom w3-card-4">
        <header class="w3-container w3-teal"> 
            <span onclick="document.getElementById('bio_d').style.display='none'" class="w3-button w3-display-topright">&times;</span>
        <h2>Biology button</h2>
        </header>
        <div class="w3-container">
            <p>By clicking this button you will be redirected to the biology questions page.</p>
            <p class="w3-padding-16">
                Next click the Chemisty button (for mobile users click Chem button).
            </p>
        </div>
        <footer class="w3-container w3-teal">
            <p>Best of luck</p>
        </footer>
    </div>
</div>
<div id="chem_d" class="w3-modal" style="z-index:3;">
    <div class="w3-modal-content w3-animate-zoom w3-card-4">
        <header class="w3-container w3-teal"> 
            <span onclick="document.getElementById('chem_d').style.display='none'" class="w3-button w3-display-topright">&times;</span>
        <h2>Chemistry button</h2>
        </header>
        <div class="w3-container">
            <p>By clicking this button you will be redirected to the Chemistry questions page.</p>
            <p class="w3-padding-16">
                Next click the Physics button (for mobile users click Phy button).
            </p>
        </div>
        <footer class="w3-container w3-teal">
            <p>Best of luck</p>
        </footer>
    </div>
</div>
<div id="phy_d" class="w3-modal" style="z-index:3;">
    <div class="w3-modal-content w3-animate-zoom w3-card-4">
        <header class="w3-container w3-teal"> 
            <span onclick="document.getElementById('phy_d').style.display='none'" class="w3-button w3-display-topright">&times;</span>
        <h2>Physics button</h2>
        </header>
        <div class="w3-container">
            <p>By clicking this button you will be redirected to the Physics questions page.</p>
            <p class="w3-padding-16">
                Next click the timer below.
            </p>
        </div>
        <footer class="w3-container w3-teal">
            <p>Best of luck</p>
        </footer>
    </div>
</div>
<div id="snnext" class="w3-modal" style="z-index:3;">
    <div class="w3-modal-content w3-animate-zoom w3-card-4">
        <header class="w3-container w3-teal"> 
            <span onclick="document.getElementById('snnext').style.display='none'" class="w3-button w3-display-topright">&times;</span>
        <h2>Save & next button</h2>
        </header>
        <div class="w3-container">
            <p>By clicking this button this question's answer will get stored and you will be lead to next question. <br><b>Keep one thing in mind. To save your answer always click this button. Don't jump to another answer without saving it. It will not save your answer and the question will remain unattempted.</b><br> You can see all your answered questions from the question bar in left side. For mobile users you can open it by clicking on <span class="w3-light-gray"><i class="fa fa-bars"></i></span> button it in right top corner. Answered question will look like <span class="w3-badge w3-green" style="width:35px;">Q</span></p>
            <p class="w3-padding-16">
                Next click the Previous button.
            </p>
        </div>
        <footer class="w3-container w3-teal">
            <p>Best of luck</p>
        </footer>
    </div>
</div>
<div id="prev_d" class="w3-modal" style="z-index:3;">
    <div class="w3-modal-content w3-animate-zoom w3-card-4">
        <header class="w3-container w3-teal"> 
            <span onclick="document.getElementById('prev_d').style.display='none'" class="w3-button w3-display-topright">&times;</span>
        <h2>Previous button</h2>
        </header>
        <div class="w3-container">
            <p>By clicking this button you will be lead to the previous question. <br><b>Keep one thing in mind. To save your answer always click save and next button. Previous button will not save your answer and if you have selected any option still the question will remain unattempted</b></p>
            <p class="w3-padding-16">
                Next click the Mark for review button at bottom.
            </p>
        </div>
        <footer class="w3-container w3-teal">
            <p>Best of luck</p>
        </footer>
    </div>
</div>
<div id="mark_d" class="w3-modal" style="z-index:3;">
    <div class="w3-modal-content w3-animate-zoom w3-card-4">
        <header class="w3-container w3-teal"> 
            <span onclick="document.getElementById('mark_d').style.display='none'" class="w3-button w3-display-topright">&times;</span>
        <h2>Mark for review button</h2>
        </header>
        <div class="w3-container">
            <p>By clicking this button the current button will be marked for review. <br> Perticular number's question from the side question bar will be marked as <span class="w3-bar-item"><span class="w3-badge w3-orange" style="width:35px;">Q</span></span></p>
            <p class="w3-padding-16">
                Next click the 3 bars like <i class="fa fa-bars"></i> at the top right of the webpage (only for mobile users) Others click on the question button on question pallet in left side.
            </p>
        </div>
        <footer class="w3-container w3-teal">
            <p>Best of luck</p>
        </footer>
    </div>
</div>
<div id="timer" class="w3-modal" style="z-index:3;">
    <div class="w3-modal-content w3-animate-zoom w3-card-4">
        <header class="w3-container w3-teal"> 
            <span onclick="document.getElementById('timer').style.display='none'" class="w3-button w3-display-topright">&times;</span>
        <h2>Timer area</h2>
        </header>
        <div class="w3-container">
            <p>It is your timer for exam. It will start from 3:00:00 to 0:00:00 means total 3 hr during exams</p>
            <p class="w3-padding-16">
                Next click the Save and next button at bottom.
            </p>
        </div>
        <footer class="w3-container w3-teal">
            <p>Best of luck</p>
        </footer>
    </div>
</div>
<div id="bars" class="w3-modal" style="z-index:3;">
    <div class="w3-modal-content w3-animate-zoom w3-card-4">
        <header class="w3-container w3-teal"> 
            <span onclick="document.getElementById('bars').style.display='none'" class="w3-button w3-display-topright">&times;</span>
        <h2>Question panel area</h2>
        </header>
        <div class="w3-container">
            <p>This bars is for accessing the questions panel. Where you can see all your attemted and not attempted question.</p>
            <p class="w3-padding-16">
                Next click any question of the question bar.
            </p>
        </div>
        <footer class="w3-container w3-teal">
            <p>Best of luck</p>
        </footer>
    </div>
</div>
<div id="que_d" class="w3-modal" style="z-index:3;">
    <div class="w3-modal-content w3-animate-zoom w3-card-4">
        <header class="w3-container w3-teal"> 
            <span onclick="document.getElementById('que_d').style.display='none'" class="w3-button w3-display-topright">&times;</span>
        <h2>Question button</h2>
        </header>
        <div class="w3-container">
            <p>This button will redirect you to that perticular question of selected subject.</p>
            <p class="w3-padding-16">
                you learned all the necessary things. Click anyone again if you forgot about it. 
                <b>Remember to save your answer always click Save and next button. Don't jump to another answer without saving it. It will not save your answer and the question will remain unattempted</b>
            </p>
        </div>
        <footer class="w3-container w3-teal">
            <p>Best of luck</p>
        </footer>
    </div>
</div>
	<nav class="w3-sidebar w3-bar-block w3-animate-left w3-text-white w3-collapse w3-top w3-theme" style="z-index:2;width:350px;font-weight:bold" id="mySidebar"><br>
	<h3 class="w3-padding-32 w3-center w3-xxlarge"><b>Physics <span class="w3-badge">45</span></b></h3>
	<span class="w3-bar-item"><span class="w3-badge w3-green" style="width:35px;">Q</span> Answered</span>
	<span class="w3-bar-item"><span class="w3-badge w3-white" style="width:35px;">Q</span> Not Answered</span>
    <span class="w3-bar-item"><span class="w3-badge w3-orange" style="width:35px;">Q</span> Marked for review</span>
	<hr>
		<a href="javascript:void(0)" onclick="w3_close()" class="w3-display-topright w3-button w3-padding w3-hide-large w3-hover-white"><i class="fa fa-remove"></i></a>
<?php

for($i=1;$i<=45;$i++){
?>

<div class="w3-col l3 m3 s3 w3-center">
<button class="w3-center kel-button w3-circle w3-margin-top w3-white" style="width:35px;" onclick="document.getElementById('que_d').style.display='block'">
    <?php echo $i; ?>
</button>
</div>

<?php
}
?>
	</nav>

<!-- Top menu on small screens -->
<header class="w3-container w3-theme-dark w3-xlarge w3-padding-16">
  <a href="javascript:void(0)" class="w3-right w3-button w3-orange w3-text-white w3-round w3-margin-right kel-hover w3-hide-small w3-hide-medium" onclick="document.getElementById('phy_d').style.display='block'">Physics</a>
  <a href="javascript:void(0)" class="w3-right w3-button w3-blue w3-round w3-margin-right kel-hover w3-hide-small w3-hide-medium" onclick="document.getElementById('chem_d').style.display='block'">Chemistry</a>
  <a href="javascript:void(0)" class="w3-right w3-button w3-green w3-round w3-margin-right kel-hover w3-hide-small w3-hide-medium" onclick="document.getElementById('bio_d').style.display='block'">Biology</a>
  
  <a href="javascript:void(0)" class="w3-left w3-button w3-orange w3-text-white w3-round w3-margin-right kel-hover w3-hide-large" onclick="document.getElementById('phy_d').style.display='block'">Phy</a>
  <a href="javascript:void(0)" class="w3-left w3-button w3-blue w3-round w3-margin-right kel-hover w3-hide-large" onclick="document.getElementById('chem_d').style.display='block'">Chem</a>
  <a href="javascript:void(0)" class="w3-left w3-button w3-green w3-round w3-margin-right kel-hover w3-hide-large" onclick="document.getElementById('bio_d').style.display='block'">Bio</a>
  
  <a href="javascript:void(0)" class="w3-right w3-button w3-theme-dark w3-hide-large" onclick="w3_open()"><i class="fa fa-bars"></i></a>
</header>

<div class="w3-main" style="margin-left:350px;margin-bottom:50px;">
    
<div class="w3-padding w3-xlarge" id="que_no">
    Question 1
    <span class="w3-right w3-border" style="cursor:pointer" onclick="document.getElementById('timer').style.display='block'">3:00:00</span>
</div>
<div class="w3-padding w3-large w3-justify" id="question">
    National Testing Agency (NTA), the regulatory body will provide the code-wise question papers of NEET during the offlinence examination. NEET question paper consists of 180 multiple choice questions based on Physics, Chemistry and Biology. Candidates willing to appear for NEET UG entrance examination can practice using NEET previous year question papers. With the regular practice of NEET question papers with solutions, students will get familiarised with the exam pattern and structure of the exam. NEET question papers PDF can be downloaded from this page. In the timetable for 
</div>
<div class="w3-padding" id="options">
    
<form class="w3-large">
    <div class="w3-section">
        <input type="radio" name="que"> Option1
    </div>
    <div class="w3-section">
        <input type="radio" name="que"> Option2
    </div>
    <div class="w3-section">
        <input type="radio" name="que"> Option3
    </div>
    <div class="w3-section">
        <input type="radio" name="que"> Option4
    </div>
</form>
    
</div>
<hr style="border-top: 1px solid black;">
<div class="w3-bar" style="margin-bottom:50px;" id="buttons">
    
    <button class="w3-bar-item w3-left w3-button w3-light-gray kel-hover" onclick="document.getElementById('prev_d').style.display='block'"><i class="fa fa-arrow-left"></i> Previous</button>
    
    <button class="w3-bar-item w3-left w3-button w3-yellow w3-margin-left kel-hover w3-hover-yellow w3-hide-small" onclick="document.getElementById('mark_d').style.display='block'"><i class="fa fa-bookmark"></i> Mark for review</button>
    
    <button class="w3-bar-item w3-right w3-button w3-light-gray kel-hover" onclick="document.getElementById('snnext').style.display='block'"><i class="fa fa-arrow-right"></i> Save & Next</button>
    
</div>
<div class='w3-center w3-hide-large w3-hide-medium' style="margin-bottom:50px;" id="buttons">
    <button class="w3-button w3-yellow w3-margin-left kel-hover w3-hover-yellow" onclick="document.getElementById('mark_d').style.display='block'"><i class="fa fa-bookmark"></i> Mark for review</button>
</div>
</div>
<script>
    document.getElementById('intro').style.display = "block";
		
</script>
</body>
</html>