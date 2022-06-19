<?php

$dbhost = "localhost";
$dbuser = "team3";
$dbpass = "rExeMa";
$dbname = "team3";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{
	// send error message
	die("failed to connect!");
}
