<?php 
session_start();

	include("connection.php");
	include("functions.php");

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$addr  = $_POST['addr'];

		if(!empty($user_name) && !empty($password) && !empty($phone) && !empty($email) && !empty($addr) && !is_numeric($user_name))
		{
			//save to database
			$user_id = random_num(20);
			$query = "insert into person (user_id,user_name,phone,email,addr,password) values ('$user_id','$user_name','$phone','$email','$addr','$password')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die; 

		} else {

			echo "Please enter some valid information!";
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Signup</title>
		<link rel="stylesheet" href="login_form.css">
	</head>
	<body>
		<div id="box">
			<a href="index.php" style="float: right; font-size: 20px;">&times</a>
			<form method="post">
				<div style="font-size: 20px;margin: 10px;color: white;">Signup</div>

				<input id="text" type="text" name="user_name" placeholder="user_name"><br><br>
				<input id="text" type="password" name="password" placeholder="password"><br><br>
				<input id="text" type="text" name="phone" placeholder="phone 0912123123" pattern="[0-9]{10}"><br><br>
				<input id="text" type="text" name="email" placeholder="test123@gmail.com" ><br><br>
				<input id="text" type="text" name="addr"  placeholder="address"><br><br>

				<input id="button" type="submit" value="Signup"><br><br>

				<a href="login.php">Click to Login</a><br><br>
			</form>
		</div>
	</body>
</html>