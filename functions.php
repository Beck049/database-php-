<?php

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

// for div id = search
function search_seller($search_id) {
	$query = "select id from sell where order_id = '$search_id' limit 1";

	$result = mysqli_query($con, $query);
	if($result && mysqli_num_rows($result) > 0) {

		$data = mysqli_fetch_assoc($result);
		// associative array
		$ret = $data['id'];
		return $ret;
	}

	return NULL;
}

function search_buyer($search_id) {
	$query = "select id from buy where order_id = '$search_id' limit 1";

	$result = mysqli_query($con, $query);
	if($result && mysqli_num_rows($result) > 0) {

		$data = mysqli_fetch_assoc($result);
		// associative array
		$ret = $data['id'];
		return $ret;
	}

	return NULL;
}

function search_name_by_id($id) {
	$query = "select name from person where id = '$id' limit 1";

	$result = mysqli_query($con, $query);
	if($result && mysqli_num_rows($result) > 0) {

		$data = mysqli_fetch_assoc($result);
		// associative array
		$ret = $data['name'];
		return $ret;
	}

	return NULL;
}

function get_product($product_id) {
	$query = "select * from product where product_id = '$product_id';";

	if($result && mysqli_num_rows($result) > 0) {

		$data = mysqli_fetch_assoc($result);
		// associative array
		return $data;
	}

	return NULL;
}

function get_amount($order_id) {
	$query = "select amount from contain where order_id = '$order_id';";

	if($result && mysqli_num_rows($result) > 0) {

		$data = mysqli_fetch_assoc($result);
		// associative array
		$ret = $data['amount'];
		return $ret;
	}

	return NULL;
}

function get_state($trans_id) {
	$query = "select cur_state from trans where trans_id = '$trans_id';";

	if($result && mysqli_num_rows($result) > 0) {

		$data = mysqli_fetch_assoc($result);
		// associative array
		$ret = $data['cur_state'];
		return $ret;
	}

	return NULL;
}