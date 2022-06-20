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
	<div style = "padding: 10px; background-color: #FAEBD7;">
		<h3>Search by ID</h3>
            <form method="post">
            <input id="text" type="text" name="search_id" placeholder="Enter the search ID"><br>
			<input id="button" type="submit" name="Sell" value="Sell" ><br><br>
            <input id="button" type="submit" name="Buy" value="Buy"><br>
		</form>
	</div>
	<div style = "padding: 16px; background-color: #FFF8D7;">
    <?php
		    if( $_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['Sell']) ) {
                $search_id = $_POST['search_id'];

                //find order_id
                $query  = "select order_id from sell where id='$search_id'";
				$result = mysqli_query($con,$query);
                $cnt = mysqli_num_rows($result);

                if( $cnt > 0 ){
                        $row = mysqli_fetch_assoc($result);
                        $order_id = $row['order_id'];
                        //find product_id
                        $query  = "select product_id from contain where order_id='$order_id'";
				        $result = mysqli_query($con, $query);
				        $data   = mysqli_fetch_assoc($result);
				        $data   = $data['product_id'];
                        //find product detail
                        $query  = "select p_name , cost from product where product.product_id='$data'";
				        $result = mysqli_query($con, $query);
				        $data   = mysqli_fetch_assoc($result);
                        echo "name: ". $data['p_name']." - cost: ".$data['cost']."<br>";   
                        
                }else {
                    echo '0 results';
                }
		    }
		?>
    </div>
	<div style = "padding: 16px; background-color: #FFF8D7;">
    <?php
            if( $_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['Buy']) ) {
                $search_id = $_POST['search_id'];

                //find order_id
                $query  = "select order_id from buy where buy.id='$search_id'";
				$result = mysqli_query($con,$query);
                $cnt = mysqli_num_rows($result);
                if( $cnt >0 ){

                        $row = mysqli_fetch_assoc($result);

                        $order_id = $row['order_id'];
                        //find product_id
                        $query  = "select product_id from contain where order_id='$order_id'";
				        $result = mysqli_query($con, $query);
				        $data   = mysqli_fetch_assoc($result);
				        $data   = $data['product_id'];
                        //find product detail
                        $query  = "select p_name , cost from product where product.product_id='$data'";
				        $result = mysqli_query($con, $query);
				        $data   = mysqli_fetch_assoc($result);
                        echo "name: ". $data['p_name']." - cost: ".$data['cost']."<br>";                 
                }else {
                    echo '0 results';
                }
		    }
        ?>
    </div>
</body>
