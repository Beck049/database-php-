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
<<<<<<< HEAD
		<div  style = "class=clearfix;padding: 15px;" >
			<?php
			// if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['Search']))
			// {
			// 	$search_id = $_POST['search_id'];
			// 	$seller = search_seller($search_id);
			// 	$buyer  = search_buyer($search_id);
			// 	echo '<h4>' . search_name_by_id(buyer) . ' --> ' . search_name_by_id(seller) . '</h4>';
			// }
			?>
			<table style = "border: 1px solid;" >
				<tr>
					<th style = "border: 1px solid;" >Item</th>
					<th style = "border: 1px solid;" >Amount</th>
					<th style = "border: 1px solid;" >cost</th>
				</tr>
				<?php
				// if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['Search']))
				// {
				// 	$query = "select product_id from contain where order_id = '$search_id';";
				// 	$result = mysqli_query($con, $query); 
				// 	while($row = mysqli_fetch_row($result)) {
				// 		$product = get_product($row[0]);
				// 		echo '<tr>';
				// 		echo '<td style = "border: 1px solid;" >' . $product['name'] . '</th>';
				// 		echo '<td style = "border: 1px solid;" >' . $product['cost'] . '</th>';
				// 		echo '<td style = "border: 1px solid;" >' . get_amount($search_id) . '</th>';
				// 		echo '</tr>';
				// 	}
				// }
				?>
			</table><br>
			
			<?php
			// if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['Search']))
			// {
			// 	$is_send = 0;
			// 	$is_arrive = 0;
			// 	$query = "select * from states where order_id = '$search_id';";
			// 	$result = mysqli_query($con, $query); 
			// 	echo '<p style = "font_size: 8px; color: green;"> preapring ---> ';
			// 	while($row = mysqli_fetch_row($result)) {
			// 		if( get_state($row[0]) == 1 ) { $is_send = 1; }
			// 		else if( get_state($row[0]) == 2 ) { $is_arrive = 1; }
			// 	}
			// 	if( $is_send == 0) {
			// 		echo '<a style = "color: black;">';
			// 	}
			// 	else {
			// 		echo '<a>';
			// 	}
			// 	echo 'sending ---> </a>';
				
			// 	if( $is_arrive == 0) {
			// 		echo '<a style = "color: black;">';
			// 	}
			// 	else {
			// 		echo '<a>';
			// 	}
			// 	echo 'arrived </a>';
			// }
			?> </p>
        </div>
=======
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
			$query = "select id from buy where order_id = '$search_id' limit 1";
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

				$len = 0;
				$query = "select count(*) as cnt from contain where order_id = '$search_id';";
				$result = mysqli_query($con, $query); 
				$data = mysqli_fetch_assoc($result);
				$len = $data['cnt'];

				$query = "select product_id from contain where order_id = '$search_id';";
				$result = mysqli_query($con, $query); 
				$row = mysqli_fetch_row($result);
				for($i = 0; $i < $len; $i++) {
					// $product = get_product($row[0]);
					$p_id = $row[$i];
					//
					$query = "select * from product where product_id = '$p_id';";
					$result = mysqli_query($con, $query);
					$product = mysqli_fetch_assoc($result);
					echo '<tr>';
					echo '<td style = "border: 1px solid;" >' . $product['p_name'] . '</th>';
					echo '<td style = "border: 1px solid;" >' . $product['cost'] . '</th>';
					echo '<td style = "border: 1px solid;" >';
					$query = "select * from contain where product_id = '$p_id';";
					$result = mysqli_query($con, $query);
					$amount = mysqli_fetch_assoc($result);
					$amount = $amount['amount'];
					echo $amount; 
					echo '</th>';
					echo '</tr>';
				}
			echo '</table><br><br>';

			// state
			$cnt = 0;
			echo '<p style = "font_size: 8px; color: green;"> preapring ---> ';
			$query = "select count(*) as state from states where trans_id = '$search_id';";
			$result = mysqli_query($con, $query);
			$cnt = mysqli_fetch_assoc($result);
			$cnt = $cnt['state'];
			if($cnt >= 1) {
				echo '<a style = "font_size: 8px; color: green;"> sending ---> </a>';
			}
			else {
				echo '<a style = "font_size: 8px; color: black;"> sending ---> </a>';
			}
			if($cnt == 2) {
				echo '<a style = "font_size: 8px; color: green;"> arrived </a>';
			}
			else {
				echo '<a style = "font_size: 8px; color: black;"> arrived </a>';
			}
			echo '</p>';
		}
		?>
    </div>
</body>
>>>>>>> 7a6e4750710efc07956bb1b327297d8bec69fd10
