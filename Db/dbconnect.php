<?php

$servername = "localhost";
$dbpassword = "Mita1969"; // enter the database user's password
$username = "keltakin_nt_student";
$database = "keltakin_NeetExam";

$conn = new mysqli($servername, $username, $dbpassword, $database);

if($conn->connect_error)
{
    die("something went wrong:$conn->connect_error");
}

?>