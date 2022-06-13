<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con); 


// func for create.php
    // function set_order($order_id, $seller_id, $buyer_id, $product_name, $product_cost, $amount) {
        //  if( !empty($product_name) && !empty($product_cost) && !empty($amount) ) {
            // 	// get product_id
            // 	$query = "select * from product where p_name = '$product_name' and cost = '$product_cost';";
            // 	$result   = mysqli_query($con, $query);
            //  $product_id = mysqli_fetch_assoc($result);
            //  $product_id = $product_id['product_id'];
            //
            // 	// contain
            // 	$query = "insert into contain (order_id, amount, product_id) values ('$order_id','$amount','$product_id');";
            // 	mysqli_query($con, $query);
        // 	    }
    // }
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
    <div class="clearfix">
		<?php
		if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['AddOrder'])) {
			$seller_id = $_POST['sell_id'];
            $buyer_id  = $_POST['buy_id'];
            $p_name1    = $_POST['p_name_n1'];    $p_name2    = $_POST['p_name_n2'];
            $p_name3    = $_POST['p_name_n3'];    $p_name4    = $_POST['p_name_n4'];
            $p_name5    = $_POST['p_name_n5'];
            $p_price1   = $_POST['p_price_n1'];   $p_price2   = $_POST['p_price_n2'];
            $p_price3   = $_POST['p_price_n3'];   $p_price4   = $_POST['p_price_n4'];
            $p_price5   = $_POST['p_price_n5'];
            $p_amount1  = $_POST['p_amount_n1'];  $p_amount2  = $_POST['p_amount_n2'];
            $p_amount3  = $_POST['p_amount_n3'];  $p_amount4  = $_POST['p_amount_n4'];
            $p_amount5  = $_POST['p_amount_n5'];
            $rand_id   = random_num(20);
            if( !empty($seller_id) && !empty($buyer_id) ) {
                
                // orders
                $query = "insert into orders (id) values ('$rand_id')";
                mysqli_query($con, $query);

                // get order_id
                $query    = "select * from orders where id = '$rand_id'";
                $result   = mysqli_query($con, $query);
                $order_id = mysqli_fetch_assoc($result);
                $order_id = $order_id['order_id'];

                // buy
                $query = "insert into buy (id, order_id) values ('$buyer_id', '$order_id')";
                mysqli_query($con, $query);

                // sell
                $query = "insert into sell (id, order_id) values ('$seller_id', '$order_id')";
                mysqli_query($con, $query);

                // 1
                // set_order($order_id, $seller_id, $buyer_id, $p_name1, $p_price1, $p_amount1);
                if( !empty($p_name1) && !empty($p_price1) && !empty($p_amount1) ) {

                    // get product_id
                    $query = "select * from product where p_name = '$p_name1' and cost = '$p_price1';";
                    $result   = mysqli_query($con, $query);
                    $product_id = mysqli_fetch_assoc($result);
                    $product_id = $product_id['product_id'];
            
                    // contain
                    $query = "insert into contain (order_id, amount, product_id) values ('$order_id','$p_amount1','$product_id');";
                    mysqli_query($con, $query);
                }
                // 2
                // set_order($order_id, $seller_id, $buyer_id, $p_name2, $p_price2, $p_amount2);
                if( !empty($p_name2) && !empty($p_price2) && !empty($p_amount2) ) {

                    // get product_id
                    $query = "select * from product where p_name = '$p_name2' and cost = '$p_price2';";
                    $result   = mysqli_query($con, $query);
                    $product_id = mysqli_fetch_assoc($result);
                    $product_id = $product_id['product_id'];
            
                    // contain
                    $query = "insert into contain (order_id, amount, product_id) values ('$order_id','$p_amount2','$product_id');";
                    mysqli_query($con, $query);
                }
                // 3
                // set_order($order_id, $seller_id, $buyer_id, $p_name3, $p_price3, $p_amount3);
                if( !empty($p_name3) && !empty($p_price3) && !empty($p_amount3) ) {

                    // get product_id
                    $query = "select * from product where p_name = '$p_name3' and cost = '$p_price3';";
                    $result   = mysqli_query($con, $query);
                    $product_id = mysqli_fetch_assoc($result);
                    $product_id = $product_id['product_id'];
            
                    // contain
                    $query = "insert into contain (order_id, amount, product_id) values ('$order_id','$p_amount3','$product_id');";
                    mysqli_query($con, $query);
                }
                // 4
                // set_order($order_id, $seller_id, $buyer_id, $p_name4, $p_price4, $p_amount4);
                if( !empty($p_name4) && !empty($p_price4) && !empty($p_amount4) ) {

                    // get product_id
                    $query = "select * from product where p_name = '$p_name4' and cost = '$p_price4';";
                    $result   = mysqli_query($con, $query);
                    $product_id = mysqli_fetch_assoc($result);
                    $product_id = $product_id['product_id'];
            
                    // contain
                    $query = "insert into contain (order_id, amount, product_id) values ('$order_id','$p_amount4','$product_id');";
                    mysqli_query($con, $query);
                }
                // 5
                // set_order($order_id, $seller_id, $buyer_id, $p_name5, $p_price5, $p_amount5);
                if( !empty($p_name5) && !empty($p_price5) && !empty($p_amount5) ) {

                    // get product_id
                    $query = "select * from product where p_name = '$p_name5' and cost = '$p_price5';";
                    $result   = mysqli_query($con, $query);
                    $product_id = mysqli_fetch_assoc($result);
                    $product_id = $product_id['product_id'];
            
                    // contain
                    $query = "insert into contain (order_id, amount, product_id) values ('$order_id','$p_amount5','$product_id');";
                    mysqli_query($con, $query);
                }

                header("Refresh:0");
			    die;
            }
		}
		?>
		<h3>Add Product</h3>
        <div>
		<form method="post">
			<input id="text" type="text" name="sell_id" placeholder="Enter the seller ID"><br><br>
            <input id="text" type="text" name="buy_id" placeholder="Enter the buyer ID"><br><br>
			<div class="float_left">
                <div>
                <input id="text" type="text" name="p_name_n1"  placeholder="Enter the product name"><br>
                <input id="text" type="text" name="p_price_n1" placeholder="Enter the product price"><br>
                <input id="text" type="text" name="p_amount_n1" placeholder="Enter the product amount"><br>
                </div><br>
                <div>
                <input id="text" type="text" name="p_name_n2"  placeholder="Enter the product name"><br>
                <input id="text" type="text" name="p_price_n2" placeholder="Enter the product price"><br>
                <input id="text" type="text" name="p_amount_n2" placeholder="Enter the product amount"><br>
                </div><br>
                <div>
                <input id="text" type="text" name="p_name_n3"  placeholder="Enter the product name"><br>
                <input id="text" type="text" name="p_price_n3" placeholder="Enter the product price"><br>
                <input id="text" type="text" name="p_amount_n3" placeholder="Enter the product amount"><br>
                </div><br>
            </div>
            <div class="float_left">
                <div>
                <input id="text" type="text" name="p_name_n4"  placeholder="Enter the product name"><br>
                <input id="text" type="text" name="p_price_n4" placeholder="Enter the product price"><br>
                <input id="text" type="text" name="p_amount_n4" placeholder="Enter the product amount"><br>
                </div><br>
                <div>
                <input id="text" type="text" name="p_name_n5"  placeholder="Enter the product name"><br>
                <input id="text" type="text" name="p_price_n5" placeholder="Enter the product price"><br>
                <input id="text" type="text" name="p_amount_n5" placeholder="Enter the product amount"><br>
                </div><br>
                <div>
                <input id="button" type="submit" name="AddOrder" value="Submit">
                </div>
            </div>
		</form>
        </div>
	</div>
    <script></script>
</body>