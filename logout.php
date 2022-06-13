<?php

session_start();

// unset 'user_id'
if(isset($_SESSION['user_id']))
{
	unset($_SESSION['user_id']);
}

// redirect to index
header("Location: index.php");
die;