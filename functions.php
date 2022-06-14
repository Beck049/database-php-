<?php

include("connection.php");

function check_login($con)  {

	if(isset($_SESSION['user_id'])) {

		$id = $_SESSION['user_id'];
		$query = "select * from person where user_id = '$id' limit 1";

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0) {

			$user_data = mysqli_fetch_assoc($result);
			// associative array
			return $user_data;
		}
	}
	
	return NULL;

}

// set a random number with given length
function random_num($max_length) {

	$text = "";
	$min_length=4;
	if($max_length < 5) {
		$max_length = 5;
	}

	$len = rand($min_length,$max_length);

	for ($i=0; $i < $len; $i++) { 

		$text .= rand(0,9);
	}

	return $text;
}

//////////////////////////////////////////////////////////////////////////////////////////