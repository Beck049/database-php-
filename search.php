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
<!-- input: Order_ID 
	    	output:  buyer | state | products | cost | amount | seller | time -->
	<div style = "padding: 16px; background-color: #ccc;">
		<h3>Search by ID</h3>
            <form method="post">
			<input id="text" type="text" name="search_id" placeholder="Enter the order ID">
			<input id="button" type="submit" name="Search" value="Search"><br>
		</form>
	</div>
	<div  style = "padding: 15px;" >
		<?php
		if( $_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['Search']) ) {
			$search_id = $_POST['search_id'];

			// seller --> buyer 
			// $seller = search_seller($search_id);
			$query = "select id from sell where order_id = '$search_id' limit 1";
			$result = mysqli_query($con, $query);
			$seller = mysqli_fetch_assoc($result);
			$seller = $seller['id'];
			$query = "select user_name from person where id = '$seller';";
			$result = mysqli_query($con, $query);
			$seller = mysqli_fetch_assoc($result);
			$seller = $seller['user_name'];
			// $buyer  = search_buyer($search_id);
			$query = "select id from sell where order_id = '$search_id' limit 1";
			$result = mysqli_query($con, $query);
			$buyer = mysqli_fetch_assoc($result);
			$buyer = $buyer['id'];
			$query = "select user_name from person where id = '$buyer';";
			$result = mysqli_query($con, $query);
			$buyer = mysqli_fetch_assoc($result);
			$buyer = $buyer['user_name'];

			echo '<h4>' . $buyer . ' --> ' . $seller . '</h4>';

			// table
			echo '<table style = "border: 1px solid;" >';
				echo '<tr>';
					echo '<th style = "border: 1px solid;" >Item</th>';
					echo '<th style = "border: 1px solid;" >Amount</th>';
					echo '<th style = "border: 1px solid;" >cost</th>';
				echo '</tr>';

				$query = "select * from contain where order_id = '$search_id';";
				$result = mysqli_query($con, $query); 
				while($row = mysqli_fetch_row($result)) {
					$product = get_product($row[0]);
					echo '<tr>';
					echo '<td style = "border: 1px solid;" >' . $product['name'] . '</th>';
					echo '<td style = "border: 1px solid;" >' . $product['cost'] . '</th>';
					echo '<td style = "border: 1px solid;" >' . get_amount($search_id) . '</th>';
					echo '</tr>';
				}
			echo '</table><br><br>';

			// state
			echo '<p style = "font_size: 8px; color: green;"> preapring ---> ';
			$query = "select count(*) as state from states where trans_id = '$search_id';";
			$result = mysqli_query($con, $query);
			$cnt = mysqli_fetch_assoc($cnt);
			$cnt = $cnt['state'];
			if($cnt >= 1) {
				echo '<p style = "font_size: 8px; color: green;"> sending ---> </p>';
			}
			else {
				echo '<p style = "font_size: 8px; color: black;"> sending ---> </p>';
			}
			if($cnt == 2) {
				echo '<p style = "font_size: 8px; color: green;"> arrived </p>';
			}
			else {
				echo '<p style = "font_size: 8px; color: black;"> arrived </p>';
			}
		}
		?>
    </div>
</body>