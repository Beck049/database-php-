<?php

$dbhost = "localhost";
$dbuser = "team3";
$dbpass = "rExeMa";
$dbname = "database_project";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{
	// send error message
	die("failed to connect!");
}
