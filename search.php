<!-- input: Order_ID 
	    	output:  buyer | state | products | cost | amount | seller | time -->
            <form method="post">
			<input id="text" type="text" name="search_id" placeholder="Enter the order ID">
			<input id="button" type="submit" name="Search" value="Search"><br>
		</form>
		<div  style = "padding: 15px;" >
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
				// 		echo '<th style = "border: 1px solid;" >' . $product['name'] . '</th>';
				// 		echo '<th style = "border: 1px solid;" >' . $product['cost'] . '</th>';
				// 		echo '<th style = "border: 1px solid;" >' . get_amount($search_id) . '</th>';
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