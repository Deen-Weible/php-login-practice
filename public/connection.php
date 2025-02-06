<?php
$servername = "localhost";
$username = "nginx";
$password = "";
$database = "logintest1";

// Create connection
if(!$con = new mysqli($servername, $username, $password, $database)) {

	die("Connection failed: " . mysqli_connect_error());
}
?>