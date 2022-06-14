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
    <!-- serach order, show staus 
	         check status add status -->
	<div id="box">
		<form method="post">
			<input id="text" type="text" name="search_id" placeholder="Enter the order ID">
			<input id="button" type="submit" name="Search" value="Search"><br>
		</form>
	</div>
	<div style = "padding: 16px; background-color: #ccc;">
		<?php
		if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['Search'])) {
			$search_id = $_POST['search_id'];
			
			$query  = "select count(*) as cnt from states where states.order_id='$search_id'";
			$result = mysqli_query($con, $query);
			$data   = mysqli_fetch_assoc($result);
			$data   = $data['cnt'];
			$cur_state = 1;
			if($data == 2) {
                echo 'error message';
            }

            else {
                if( $data==0 ){
                    $cur_state = 1;
                    $query  = "select id as sell_id from sell where sell.order_id='$search_id'";
                    $result = mysqli_query($con,$query);
                    $addr_id  = mysqli_fetch_assoc($result);
                    $addr_id  = $addr_id['sell_id'];
					echo 'Delivering';
                }else if( $data==1 ){
                    $cur_state = 2;
                    $query  = "select id as buy_id from buy where buy.order_id='$search_id'";
                    $result = mysqli_query($con,$query);
                    $addr_id  = mysqli_fetch_assoc($result);
                    $addr_id  = $addr_id['buy_id'];
					echo 'arrived';
                }
                $query  = "select addr as address from person where person.id='$addr_id'";
                $result = mysqli_query($con,$query);
                $address = mysqli_fetch_assoc($result);
                $address = $address[ 'address' ];
            
				$id=random_num(20);
				$query = "insert into trans (id,cur_state,addr) values ('$id','$cur_state','$address')";
				mysqli_query($con, $query);

				$query = "select trans_id from trans where trans.id='$id'";
				$result= mysqli_query($con, $query);
				$result = mysqli_fetch_assoc($result);
				$trans_id = $result['trans_id'];

				$query = "insert into states(order_id,trans_id) values('$search_id','$trans_id')";
				mysqli_query($con,$query);

				$id=$user_data['id'];
				$query = "insert into work(id,trans_id) values('$id','$trans_id')";
				mysqli_query($con,$query);
			
				die;
			}
		}
		?>
	</div>
</body>