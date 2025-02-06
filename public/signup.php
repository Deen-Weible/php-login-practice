<?php
session_start();

	include("connection.php");
	include("functions.php");

	if($_SERVER["REQUEST_METHOD"] == "POST") {
		// Something was posted
		$user_name = $_POST['username'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name)) {
			// Check if user exists
			$user_check_query = "SELECT * FROM users WHERE user_name='$user_name'";
			$result = mysqli_query($con, $user_check_query);
			if(mysqli_num_rows($result) > 0) {
				echo "User exists.";
			} else {
			// Save to db
			$user_id = uniqid();
			$query = "insert into users (user_id, user_name, password) values ('$user_id', '$user_name', '$password')";
			mysqli_query($con, $query);
			header("Location: login.php");
			die;
			}

	} else {
		echo "Please enter all required fields.";
	}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Signup</title>
<style>
body {
	font-family: Arial, sans-serif;
	background-color: #f2f2f2;
	margin: 0;
	padding: 0;
}
h2 {
	text-align: center;
	color: #333;
}
form {
	max-width: 400px;
	margin: 50px auto;
	padding: 20px;
	background-color: #fff;
	box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
	border-radius: 5px;
}
label {
	display: block;
	font-weight: bold;
	margin-bottom: 5px;
	color: #333;
}
input[type="text"], input[type="password"] {
	width: 100%;
	padding: 10px;
	margin-bottom: 20px;
	border: 1px solid #ccc;
	border-radius: 3px;
	box-sizing: border-box;
}
input[type="submit"] {
	background-color: #28a745;
	color: white;
	padding: 10px 20px;
	border: none;
	border-radius: 3px;
	cursor: pointer;
	font-size: 16px;
}
input[type="submit"]:hover {
	background-color: #218838;
}
a {
	color:rgb(115, 199, 255);
	text-decoration: none;
	text-align: right;
}
</style>
</head>
<body>
	<h2>Sign up</h2>
	<form method="post">
		<label for="username">Username:</label>
		<input type="text" id="username" name="username" required><br><br>
		<label for="password">Password:</label>
		<input type="password" id="password" name="password" required><br><br>
		<input type="submit" value="Signup"></input>
			<a href="login.php">Login</a>

	</form>
</body>
</html>