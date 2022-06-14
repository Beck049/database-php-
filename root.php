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
	<!-- modify position -->
	<div style = "padding: 16px; background-color: #FAEBD7">
		<h3 style="color:#4D0000">Modify Position</h3>
		<?php
		if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['ModPosition'])) {
			$modify_id = $_POST['modify_id'];
			$pos_num = 0;

			if( isset($_POST['member'])   ) { $pos_num += 1; }
			if( isset($_POST['driver'])   ) { $pos_num += 2; }
			if( isset($_POST['analyzer']) ) { $pos_num += 4; }
			if( isset($_POST['employee']) ) { $pos_num += 8; }
			if( isset($_POST['root'])     ) { $pos_num += 16;}

			$query = "update person set position = '$pos_num' where person.id = '$modify_id';";
			mysqli_query($con, $query);

			header("Refresh:0");
			die;
		}
		?>
		<form method="post">
			<input id="text" type="text" name="modify_id" placeholder="Enter the user ID"><br><br>
			<input id="checkbox" type="checkbox" name="member" value="member">
			<label for="member"> member </label>
			<input id="checkbox" type="checkbox" name="driver" value="driver">
			<label for="member"> driver </label>
			<input id="checkbox" type="checkbox" name="analyzer" value="analyzer">
			<label for="member"> analyzer </label>
			<input id="checkbox" type="checkbox" name="employee" value="employee">
			<label for="member"> employee </label>
			<input id="checkbox" type="checkbox" name="root" value="root">
			<label for="member"> root </label>
			<br><br>
			<input id="button" type="submit" name="ModPosition" value="submit">
		</form></div>
	</div>
	<br>
	<!-- delete Person -->
	<div style = "padding: 16px; background-color: #FAEBD7;">
		<h3 style="color:#4D0000">Delete User</h3>
		<?php
		if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['DeleteUser'])) {
			$delete_id = $_POST['on_delete_id'];

			$query = "delete from person where person.id = '$delete_id';";
			mysqli_query($con, $query);

			header("Refresh:0");
			die;
		}
		?>
		<form method="post">
			<input id="text" type="text" name="on_delete_id" placeholder="Enter the User ID"><br><br>
			<input id="button" type="submit" name="DeleteUser" value="Delete">
		</form>
	</div>
	<br>
	<!-- add product -->
	<div style = "padding: 16px; background-color: #FAEBD7;">
		<?php
		if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['AddProduct'])) {
			$seller_id = $_POST['add_sell_id'];
			$p_name = $_POST['add_p_name'];
			$p_price = $_POST['add_p_price'];

			$query = "insert into product (p_name,cost) values ('$p_name','$p_price')";
			mysqli_query($con, $query);

			$query = "select * from product where p_name = '$p_name' and cost = '$p_price'";
			$result = mysqli_query($con, $query);
			$data = mysqli_fetch_assoc($result);
			$data = $data['product_id'];

			$query = "insert into own (id, product_id) values ('$seller_id','$data')";
			mysqli_query($con, $query);

			header("Refresh:0");
			die;
		}
		?>
		<h3 style="color:#4D0000">Add Product</h3>
		<form method="post">
			<input id="text" type="text" name="add_sell_id" placeholder="Enter the seller ID"><br><br>
			<input id="text" type="text" name="add_p_name"  placeholder="Enter the product name"><br><br>
			<input id="text" type="text" name="add_p_price" placeholder="Enter the product price"><br><br>
			<input id="button" type="submit" name="AddProduct" value="Add">
		</form>
	</div>
</body>