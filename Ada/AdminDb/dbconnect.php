<?php

$servername = "localhost";
$password = "jaimin1968"; // enter the database user's password
$username = "keltakin_nt_min";
$database = "keltakin_NeetExam";

$conn = new mysqli($servername, $username, $password, $database);

if($conn->connect_error)
{
    die("something went wrong:$conn->connect_error");
}

?>
