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
    <!-- search Order show seller data | buyer data | products -->
	<!-- select products to delete or delete all Order ( check if state is prepareing )  -->
    <?php
    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['DelProduct'])) {
        $order_id = $_POST['order_id'];
        $p_name = $_POST['del_p_name'];
        $p_price = $_POST['del_p_price'];
        $amount = $_POST['mod_amount'];

        // get count
        $query = "select count(*) as total from contain where order_id = '$order_id'";
        $result = mysqli_query($con, $query);
        $count = mysqli_fetch_assoc($result);
        $count = $count['total'];

        echo $count;

        // 確認該order_id 的 states的數量為0 才可接著取消訂單
        $query = "select count(*) as cnt from states where states.order_id='$order_id'";
        $result = mysqli_query($con,$query);
        $states_cnt = mysqli_fetch_assoc($result);
        $states_cnt = $states_cnt['cnt'];

        // get product_id
        $query = "select product_id from product where p_name = '$p_name' and cost = '$p_price';";
        $result = mysqli_query($con, $query);
        $product_id = mysqli_fetch_assoc($result);
        $product_id = $product_id['product_id'];

        if( $states_cnt == 0 ){
            if( $count > 1 ) {
                // delete contain
                if($amount == 0) {
                    $query = "delete from contain where contain.order_id = '$order_id' and contain.product_id = '$product_id';";
			        mysqli_query($con, $query);
                }
                // mod
                else {
                    $query = "update contain set amount = '$amount' where contain.order_id = '$order_id' and contain.product_id = '$product_id';";
			        mysqli_query($con, $query);
                }
            }
            else if ( $count == 1 ) {
                // delete contain & order
                if($amount == 0) {
                    $query = "delete from contain where contain.order_id = '$order_id' and contain.product_id = '$product_id';";
			        mysqli_query($con, $query);

                    $query = "delete from orders where order.order_id = '$order_id';";
			        mysqli_query($con, $query);
                }
                // mod
                else {
                    $query = "update contain set amount = '$amount' where contain.order_id = '$order_id' and contain.product_id = '$product_id';";
			        mysqli_query($con, $query);
                }
            }
            else {
                echo '<p style="color:red;"> error </p>';
            }
        }else{
            echo '<<delivering>> You can not modify the order.';
            header("Refresh:0");

            die;
        }
    }
    ?>
    <div>
        <h3 style="color:#4D0000">Modify Order</h3>
        <form method="post">
			<input id="text" type="text" name="order_id" placeholder="Enter the seller ID"><br><br>
			<input id="text" type="text" name="del_p_name"  placeholder="Enter the product name"><br><br>
			<input id="text" type="text" name="del_p_price" placeholder="Enter the product price"><br><br>
			<input id="text" type="text" name="mod_amount" placeholder="Enter the ideal amount"><br><br>
			<input id="button" type="submit" name="DelProduct" value="Submit">
		</form>
    </div>
</body>