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
    <!-- search Order
	         show seller data | buyer data | products -->
		<!-- select products to delete or delete all Order 
	         ( check if state is prepareing )  -->
</body>