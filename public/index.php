<?php
session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>My site</title>
</head>
<body>
	<a href="logout.php">Logout</a>
	<h1>Index page</h1>

	<br>
	hello, Username
</body>
</html>