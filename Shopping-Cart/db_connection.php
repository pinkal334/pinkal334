<?php

$servername = "172.104.166.158";
$username = "training_harshkumard";
$password = "t4laxgJExSuUz8V8";
$dbname = "training_harshkumard";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

session_start();
?>