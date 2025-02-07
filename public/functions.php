<?php

function check_login($con)
{

	if(isset($_SESSION['user_id']))
	{
		$id = $_SESSION['user_id'];
		$query = "SELECT * FROM users WHERE user_id = '$id' limit 1";

		$result = mysqli_query($con, $query);
		if($result && mysqli_num_rows($result) > 0) {

			return mysqli_fetch_assoc($result);
		}
	}

	// redirect to login page
// 	header("Location: login.php");
// 	die;
}

function add() {
	return intval($_POST['number']) + 10;
}

// Check if the number is set
// Check if the number and operation are set
if (isset($_POST['number']) && isset($_POST['operation'])) {
	$number = intval($_POST['number']);
	$operation = $_POST['operation'];

	// Determine which operation to perform
	switch ($operation) {
			case 'add':
					$result = add($number);
					break;
			case 'subtract':
					$result = subtract($number);
					break;
			case 'multiply':
					$result = multiply($number);
					break;
			default:
					$result = "Invalid operation.";
					break;
	}

	// Return the result
	echo $result;
} else {
	echo "No number or operation provided.";
}