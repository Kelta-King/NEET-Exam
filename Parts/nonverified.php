<!DOCTYPE html>
<html>
<head>
<title>Not verified email | NEET MOCK TEST</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="https://fonts.googleapis.com/css2?family=Literata&display=swap" rel="stylesheet"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="CSS/kel.css">
<style>
</style>
<script>
    function myFunction() {
      var x = document.getElementById("Demo");
      if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
      } else { 
        x.className = x.className.replace(" w3-show", "");
      }
    }
</script>
</head>
<body>
<?php
    $uri = $_SERVER['REQUEST_URI'];
    $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
?>

<header class="w3-bar w3-green w3-padding">
<div class="w3-bar-item w3-xlarge" style="margin-right:40px;">NEET Mock test</div>

<a href="logout" class="w3-right kel-hover">
<div class="w3-button w3-border">
    <i class="fa fa-sign-out"></i> LogOut
</div>
</a>

</header>

<div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

    <div class="w3-center"><br>
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
    </div>
    <div class="w3-xlarge w3-center">
        Email not received?
    </div>
    <div class="w3-padding w3-margin">
        Here is your solution.
        <ul>
            <li>Sometimes email take a while to get dilivered. Wait for 10 to 15 mins after registration.</li>
            <li>If you are unable to find mail after that time, then check in your spam mails. If you find it there then report it not spam. Because we are not spamming.</li>
        </ul>
      <form>
        <center>
            <b>
        If still you are unable to find the mail then you can again ask for another verification mail. Fill the below form to get a new 
        verification mail. 
        <div class="w3-text-red" id="error"></div>
			<div class="loader" id="loader" style="display:none"></div>
		
        <div class="w3-section">
            Email:<input type="text" class="w3-input w3-border" placeholder="name@email.com" style="max-width:450px;" id="email">
        </div>
        <div class="w3-section">
            <input type="button" class="w3-button w3-green" value="Send" onclick="update(<?php echo $id ?>)">
        </div>
        </center>
    </form>
    </div>
    </div>
  </div>

<center>
<div class='w3-content'>
    <div class="w3-padding w3-large">
       Check your mailbox to find our verification mail...
    </div>
    <hr>
    <div class="w3-padding">
        We have sent an email to your registered email address. That email contains the login details for the examination, exam link and email verification key. 
        <br>
        <centet>
            In case you haven't recieved the email, click the below function
            <div class="w3-padding-32">
                <button class="w3-button w3-theme kel-hover" onclick="document.getElementById('id01').style.display='block'">Email problem</button>
            </div>
        </centet>
        <br>
    </div>
    
</div>
</center>

<script src="JS/nonvarified.js"></script>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
<title>Not verified email | NEET MOCK TEST</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="https://fonts.googleapis.com/css2?family=Literata&display=swap" rel="stylesheet"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="CSS/kel.css">
<style>
</style>
<script>
    function myFunction() {
      var x = document.getElementById("Demo");
      if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
      } else { 
        x.className = x.className.replace(" w3-show", "");
      }
    }
</script>
</head>
<body>
<?php
    $uri = $_SERVER['REQUEST_URI'];
    $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
?>

<header class="w3-bar w3-green w3-padding">
<div class="w3-bar-item w3-xlarge" style="margin-right:40px;">NEET Mock test</div>

<a href="logout" class="w3-right kel-hover">
<div class="w3-button w3-border">
    <i class="fa fa-sign-out"></i> LogOut
</div>
</a>

</header>

<div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

    <div class="w3-center"><br>
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
    </div>
    <div class="w3-xlarge w3-center">
        Email not received?
    </div>
    <div class="w3-padding w3-margin">
        Here is your solution.
        <ul>
            <li>Sometimes email take a while to get dilivered. Wait for 10 to 15 mins after registration.</li>
            <li>If you are unable to find mail after that time, then check in your spam mails. If you find it there then report it not spam. Because we are not spamming.</li>
        </ul>
      <form>
        <center>
            <b>
        If still you are unable to find the mail then you can again ask for another verification mail. Fill the below form to get a new 
        verification mail. 
        <div class="w3-text-red" id="error"></div>
			<div class="loader" id="loader" style="display:none"></div>
		
        <div class="w3-section">
            Email:<input type="text" class="w3-input w3-border" placeholder="name@email.com" style="max-width:450px;" id="email">
        </div>
        <div class="w3-section">
            <input type="button" class="w3-button w3-green" value="Send" onclick="update(<?php echo $id ?>)">
        </div>
        </center>
    </form>
    </div>
    </div>
  </div>

<center>
<div class='w3-content'>
    <div class="w3-padding w3-large">
       Check your mailbox to find our verification mail...
    </div>
    <hr>
    <div class="w3-padding">
        We have sent an email to your registered email address. That email contains the login details for the examination, exam link and email verification key. 
        <br>
        <centet>
            In case you haven't recieved the email, click the below function
            <div class="w3-padding-32">
                <button class="w3-button w3-theme kel-hover" onclick="document.getElementById('id01').style.display='block'">Email problem</button>
            </div>
        </centet>
        <br>
    </div>
    
</div>
</center>

<script src="JS/nonvarified.js"></script>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
<title>Not verified email | NEET MOCK TEST</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="https://fonts.googleapis.com/css2?family=Literata&display=swap" rel="stylesheet"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="CSS/kel.css">
<style>
</style>
<script>
    function myFunction() {
      var x = document.getElementById("Demo");
      if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
      } else { 
        x.className = x.className.replace(" w3-show", "");
      }
    }
</script>
</head>
<body>
<?php
    $uri = $_SERVER['REQUEST_URI'];
    $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
?>

<header class="w3-bar w3-green w3-padding">
<div class="w3-bar-item w3-xlarge" style="margin-right:40px;">NEET Mock test</div>

<a href="logout" class="w3-right kel-hover">
<div class="w3-button w3-border">
    <i class="fa fa-sign-out"></i> LogOut
</div>
</a>

</header>

<div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

    <div class="w3-center"><br>
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
    </div>
    <div class="w3-xlarge w3-center">
        Email not received?
    </div>
    <div class="w3-padding w3-margin">
        Here is your solution.
        <ul>
            <li>Sometimes email take a while to get dilivered. Wait for 10 to 15 mins after registration.</li>
            <li>If you are unable to find mail after that time, then check in your spam mails. If you find it there then report it not spam. Because we are not spamming.</li>
        </ul>
      <form>
        <center>
            <b>
        If still you are unable to find the mail then you can again ask for another verification mail. Fill the below form to get a new 
        verification mail. 
        <div class="w3-text-red" id="error"></div>
			<div class="loader" id="loader" style="display:none"></div>
		
        <div class="w3-section">
            Email:<input type="text" class="w3-input w3-border" placeholder="name@email.com" style="max-width:450px;" id="email">
        </div>
        <div class="w3-section">
            <input type="button" class="w3-button w3-green" value="Send" onclick="update(<?php echo $id ?>)">
        </div>
        </center>
    </form>
    </div>
    </div>
  </div>

<center>
<div class='w3-content'>
    <div class="w3-padding w3-large">
       Check your mailbox to find our verification mail...
    </div>
    <hr>
    <div class="w3-padding">
        We have sent an email to your registered email address. That email contains the login details for the examination, exam link and email verification key. 
        <br>
        <centet>
            In case you haven't recieved the email, click the below function
            <div class="w3-padding-32">
                <button class="w3-button w3-theme kel-hover" onclick="document.getElementById('id01').style.display='block'">Email problem</button>
            </div>
        </centet>
        <br>
    </div>
    
</div>
</center>

<script src="JS/nonvarified.js"></script>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
<title>Not verified email | NEET MOCK TEST</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="https://fonts.googleapis.com/css2?family=Literata&display=swap" rel="stylesheet"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="CSS/kel.css">
<style>
</style>
<script>
    function myFunction() {
      var x = document.getElementById("Demo");
      if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
      } else { 
        x.className = x.className.replace(" w3-show", "");
      }
    }
</script>
</head>
<body>
<?php
    $uri = $_SERVER['REQUEST_URI'];
    $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
?>

<header class="w3-bar w3-green w3-padding">
<div class="w3-bar-item w3-xlarge" style="margin-right:40px;">NEET Mock test</div>

<a href="logout" class="w3-right kel-hover">
<div class="w3-button w3-border">
    <i class="fa fa-sign-out"></i> LogOut
</div>
</a>

</header>

<div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

    <div class="w3-center"><br>
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
    </div>
    <div class="w3-xlarge w3-center">
        Email not received?
    </div>
    <div class="w3-padding w3-margin">
        Here is your solution.
        <ul>
            <li>Sometimes email take a while to get dilivered. Wait for 10 to 15 mins after registration.</li>
            <li>If you are unable to find mail after that time, then check in your spam mails. If you find it there then report it not spam. Because we are not spamming.</li>
        </ul>
      <form>
        <center>
            <b>
        If still you are unable to find the mail then you can again ask for another verification mail. Fill the below form to get a new 
        verification mail. 
        <div class="w3-text-red" id="error"></div>
			<div class="loader" id="loader" style="display:none"></div>
		
        <div class="w3-section">
            Email:<input type="text" class="w3-input w3-border" placeholder="name@email.com" style="max-width:450px;" id="email">
        </div>
        <div class="w3-section">
            <input type="button" class="w3-button w3-green" value="Send" onclick="update(<?php echo $id ?>)">
        </div>
        </center>
    </form>
    </div>
    </div>
  </div>

<center>
<div class='w3-content'>
    <div class="w3-padding w3-large">
       Check your mailbox to find our verification mail...
    </div>
    <hr>
    <div class="w3-padding">
        We have sent an email to your registered email address. That email contains the login details for the examination, exam link and email verification key. 
        <br>
        <centet>
            In case you haven't recieved the email, click the below function
            <div class="w3-padding-32">
                <button class="w3-button w3-theme kel-hover" onclick="document.getElementById('id01').style.display='block'">Email problem</button>
            </div>
        </centet>
        <br>
    </div>
    
</div>
</center>

<script src="JS/nonvarified.js"></script>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
<title>Not verified email | NEET MOCK TEST</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="https://fonts.googleapis.com/css2?family=Literata&display=swap" rel="stylesheet"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="CSS/kel.css">
<style>
</style>
<script>
    function myFunction() {
      var x = document.getElementById("Demo");
      if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
      } else { 
        x.className = x.className.replace(" w3-show", "");
      }
    }
</script>
</head>
<body>
<?php
    $uri = $_SERVER['REQUEST_URI'];
    $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
?>

<header class="w3-bar w3-green w3-padding">
<div class="w3-bar-item w3-xlarge" style="margin-right:40px;">NEET Mock test</div>

<a href="logout" class="w3-right kel-hover">
<div class="w3-button w3-border">
    <i class="fa fa-sign-out"></i> LogOut
</div>
</a>

</header>

<div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

    <div class="w3-center"><br>
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
    </div>
    <div class="w3-xlarge w3-center">
        Email not received?
    </div>
    <div class="w3-padding w3-margin">
        Here is your solution.
        <ul>
            <li>Sometimes email take a while to get dilivered. Wait for 10 to 15 mins after registration.</li>
            <li>If you are unable to find mail after that time, then check in your spam mails. If you find it there then report it not spam. Because we are not spamming.</li>
        </ul>
      <form>
        <center>
            <b>
        If still you are unable to find the mail then you can again ask for another verification mail. Fill the below form to get a new 
        verification mail. 
        <div class="w3-text-red" id="error"></div>
			<div class="loader" id="loader" style="display:none"></div>
		
        <div class="w3-section">
            Email:<input type="text" class="w3-input w3-border" placeholder="name@email.com" style="max-width:450px;" id="email">
        </div>
        <div class="w3-section">
            <input type="button" class="w3-button w3-green" value="Send" onclick="update(<?php echo $id ?>)">
        </div>
        </center>
    </form>
    </div>
    </div>
  </div>

<center>
<div class='w3-content'>
    <div class="w3-padding w3-large">
       Check your mailbox to find our verification mail...
    </div>
    <hr>
    <div class="w3-padding">
        We have sent an email to your registered email address. That email contains the login details for the examination, exam link and email verification key. 
        <br>
        <centet>
            In case you haven't recieved the email, click the below function
            <div class="w3-padding-32">
                <button class="w3-button w3-theme kel-hover" onclick="document.getElementById('id01').style.display='block'">Email problem</button>
            </div>
        </centet>
        <br>
    </div>
    
</div>
</center>

<script src="JS/nonvarified.js"></script>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
<title>Not verified email | NEET MOCK TEST</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="https://fonts.googleapis.com/css2?family=Literata&display=swap" rel="stylesheet"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="CSS/kel.css">
<style>
</style>
<script>
    function myFunction() {
      var x = document.getElementById("Demo");
      if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
      } else { 
        x.className = x.className.replace(" w3-show", "");
      }
    }
</script>
</head>
<body>
<?php
    $uri = $_SERVER['REQUEST_URI'];
    $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
?>

<header class="w3-bar w3-green w3-padding">
<div class="w3-bar-item w3-xlarge" style="margin-right:40px;">NEET Mock test</div>

<a href="logout" class="w3-right kel-hover">
<div class="w3-button w3-border">
    <i class="fa fa-sign-out"></i> LogOut
</div>
</a>

</header>

<div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

    <div class="w3-center"><br>
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
    </div>
    <div class="w3-xlarge w3-center">
        Email not received?
    </div>
    <div class="w3-padding w3-margin">
        Here is your solution.
        <ul>
            <li>Sometimes email take a while to get dilivered. Wait for 10 to 15 mins after registration.</li>
            <li>If you are unable to find mail after that time, then check in your spam mails. If you find it there then report it not spam. Because we are not spamming.</li>
        </ul>
      <form>
        <center>
            <b>
        If still you are unable to find the mail then you can again ask for another verification mail. Fill the below form to get a new 
        verification mail. 
        <div class="w3-text-red" id="error"></div>
			<div class="loader" id="loader" style="display:none"></div>
		
        <div class="w3-section">
            Email:<input type="text" class="w3-input w3-border" placeholder="name@email.com" style="max-width:450px;" id="email">
        </div>
        <div class="w3-section">
            <input type="button" class="w3-button w3-green" value="Send" onclick="update(<?php echo $id ?>)">
        </div>
        </center>
    </form>
    </div>
    </div>
  </div>

<center>
<div class='w3-content'>
    <div class="w3-padding w3-large">
       Check your mailbox to find our verification mail...
    </div>
    <hr>
    <div class="w3-padding">
        We have sent an email to your registered email address. That email contains the login details for the examination, exam link and email verification key. 
        <br>
        <centet>
            In case you haven't recieved the email, click the below function
            <div class="w3-padding-32">
                <button class="w3-button w3-theme kel-hover" onclick="document.getElementById('id01').style.display='block'">Email problem</button>
            </div>
        </centet>
        <br>
    </div>
    
</div>
</center>

<script src="JS/nonvarified.js"></script>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
<title>Not verified email | NEET MOCK TEST</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="https://fonts.googleapis.com/css2?family=Literata&display=swap" rel="stylesheet"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="CSS/kel.css">
<style>
</style>
<script>
    function myFunction() {
      var x = document.getElementById("Demo");
      if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
      } else { 
        x.className = x.className.replace(" w3-show", "");
      }
    }
</script>
</head>
<body>
<?php
    $uri = $_SERVER['REQUEST_URI'];
    $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
?>

<header class="w3-bar w3-green w3-padding">
<div class="w3-bar-item w3-xlarge" style="margin-right:40px;">NEET Mock test</div>

<a href="logout" class="w3-right kel-hover">
<div class="w3-button w3-border">
    <i class="fa fa-sign-out"></i> LogOut
</div>
</a>

</header>

<div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

    <div class="w3-center"><br>
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
    </div>
    <div class="w3-xlarge w3-center">
        Email not received?
    </div>
    <div class="w3-padding w3-margin">
        Here is your solution.
        <ul>
            <li>Sometimes email take a while to get dilivered. Wait for 10 to 15 mins after registration.</li>
            <li>If you are unable to find mail after that time, then check in your spam mails. If you find it there then report it not spam. Because we are not spamming.</li>
        </ul>
      <form>
        <center>
            <b>
        If still you are unable to find the mail then you can again ask for another verification mail. Fill the below form to get a new 
        verification mail. 
        <div class="w3-text-red" id="error"></div>
			<div class="loader" id="loader" style="display:none"></div>
		
        <div class="w3-section">
            Email:<input type="text" class="w3-input w3-border" placeholder="name@email.com" style="max-width:450px;" id="email">
        </div>
        <div class="w3-section">
            <input type="button" class="w3-button w3-green" value="Send" onclick="update(<?php echo $id ?>)">
        </div>
        </center>
    </form>
    </div>
    </div>
  </div>

<center>
<div class='w3-content'>
    <div class="w3-padding w3-large">
       Check your mailbox to find our verification mail...
    </div>
    <hr>
    <div class="w3-padding">
        We have sent an email to your registered email address. That email contains the login details for the examination, exam link and email verification key. 
        <br>
        <centet>
            In case you haven't recieved the email, click the below function
            <div class="w3-padding-32">
                <button class="w3-button w3-theme kel-hover" onclick="document.getElementById('id01').style.display='block'">Email problem</button>
            </div>
        </centet>
        <br>
    </div>
    
</div>
</center>

<script src="JS/nonvarified.js"></script>
</body>
</html>
