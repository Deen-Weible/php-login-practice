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