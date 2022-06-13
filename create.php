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
    <link rel="stylesheet" href="float.css">
</head>
<body>
    <!-- input: buyer | seller | product(mul) -->
		<!-- create an Order
	         check every product belongs to seller (Own) 
			 add multiple Contain -->
    <div class="clearfix">
		<?php
		if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['AddProduct'])) {
			$seller_id = $_POST['sell_id'];
            $buyer_id  = $_POST['buy_id'];
            $p_name    = $_POST['p_name_n'];
            $p_price   = $_POST['p_price_n'];
            $p_amount  = $_POST['p_amount_n'];
            $rand_id   = random_num(20);
            if( $seller_id != NULL ) {
                if( !empty($_POST['sell_id']) && !empty($_POST['p_name_n']) && !empty($_POST['p_price_n']) && !empty($_POST['p_amount_n']) ) {
                
                    $query = "insert into orders (id) values ('$radn_id')";
                    mysqli_query($con, $query);

                    $query = "select * from orders where id = '$rand_id'";
                    $result = mysqli_query($con, $query);
                    $order_id = mysqli_fetch_assoc($result);
                    $order_id = $order_id['order_id'];

                    $query = "insert into buy (id,order_id) value ('$buyer_id','$order_id')";
                    mysqli_query($con, $query);

                    $query = "insert into sell (id,order_id) value ('$seller_id','$order_id')";
                    mysqli_query($con, $query);

                    $query = "select * from product where p_name = '$p_name' and cost = '$p_price'";
                    $result = mysqli_query($con, $query);
                    $product_id = mysqli_fetch_assoc($result);
                    $product_id = $product_id['product_id'];

                    $query = "insert into contain (order_id, amount, product_id) value ('$order_id','$p_amount','$product_id')";
                    mysqli_query($con, $query);

                    header("Refresh:0");
			        die;
                }
            }
		}
		?>
		<h3>Add Product</h3>
        <div class="float_left">
		<form method="post">
			<input id="text" type="text" name="sell_id" placeholder="Enter the seller ID"><br><br>
            <input id="text" type="text" name="buy_id" placeholder="Enter the buyer ID"><br><br>
			<div>
            <input id="text" type="text" name="p_name_n"  placeholder="Enter the product name"><br>
			<input id="text" type="text" name="p_price_n" placeholder="Enter the product price"><br>
			<input id="text" type="text" name="p_amount_n" placeholder="Enter the product amount"><br>
            </div><br>
            <input id="button" type="submit" name="AddProduct" value="Add">
		</form>
        </div>
	</div>
</body>