<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "beck0000";
$dbname = "database_project";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{
	// send error message
	die("failed to connect!");
}