<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con); 

?> 

<!DOCTYPE html>
<html>
<head>
	<title>My database project</title>
	<link rel="stylesheet" href="tabs.css">
</head>
<body>
    <!-- input: buyer | seller | product(mul) -->
		<!-- create an Order
	         check every product belongs to seller (Own) 
			 add multiple Contain -->
</body>