<?php

session_start();

if(isset($_SESSION['login_student']) && isset($_REQUEST['dtatm'])){
    
    $dts = explode("&",base64_decode($_SESSION['login_student']));
    $id = $dts[0];
    $name = $dts[1];
?>

<!DOCTYPE html>
<html>
<head>
<title>Test finished | NEET MOCK TEST</title>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css2?family=Literata&display=swap" rel="stylesheet"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../CSS/kel.css">
<style>
</style>

</head>
<body>
<?php
    $uri = $_SERVER['REQUEST_URI'];
    $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
?>
<header class="w3-bar w3-green w3-padding">
<div class="w3-bar-item w3-xlarge" style="margin-right:40px;">NEET Mock test</div>

<a href="../logout" class="w3-right kel-hover">
<div class="w3-button w3-border">
    <i class="fa fa-sign-out"></i> LogOut
</div>
</a>
</header>
<div class="w3-content w3-center w3-xlarge w3-padding-16">
    Test's results will be declare on 9th of September. Click the logout button above to logout.
</div>
</body>
</html>
<?php
}
else{
    header("Location:../logout"); 
}
?>