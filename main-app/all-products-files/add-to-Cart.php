<?php
//add-to-Cart.php
require "../db_connnection.php";
require "products-functions.php";


if(isset($_POST['p_id']) && isset($_POST['u_id'])){
	$p_id = mysqli_real_escape_string($conn, $_POST['p_id']);
	$u_id = mysqli_real_escape_string($conn, $_POST['u_id']);
	$d_id = mysqli_real_escape_string($conn, $_POST['d_id']);
	// $p_id = 4;
	// $u_id = 42;
	$time = $date;

	if(isset($_POST['qty'])){
		$qty = mysqli_real_escape_string($conn, $_POST['qty']);
	}else{
		$qty  = 1;	
	}

	// check cart tabel if already product added
	$check_cart = "SELECT product_id FROM cart WHERE user_id = '{$u_id}'";
	$run_check_cart = mysqli_query($conn, $check_cart);
	$row_data = array();
	while($row = mysqli_fetch_array($run_check_cart))
    $row_data[] = $row;
	$check_pro = searchForPid($p_id,$row_data);

	// get data from deal table
	$deal_unit_sql = "SELECT * FROM deal WHERE DID = {$d_id}";
	$run_deal_unit_sql = mysqli_query($conn, $deal_unit_sql);
	$get_data = mysqli_fetch_assoc($run_deal_unit_sql);
	$unit_price = $get_data['unit_price'];

	$total = $qty * $unit_price;

	if(mysqli_num_rows($run_check_cart) > 0){
		if($check_pro == ""){			
			$add_to_cart = "INSERT INTO cart (user_id, product_id, deal_id, qty, unit_price, total, time) VALUES ('{$u_id}','{$p_id}','{$d_id}','$qty','{$unit_price}','{$total}','$time')";
			$run_add_to =mysqli_query($conn, $add_to_cart);
			if($run_add_to){
				echo 1;
				exit();
			}
		}else{
				echo 2;
				exit;
			}

	}else{
		$add_to_cart = "INSERT INTO cart (user_id, product_id, deal_id, qty, unit_price, total, time) VALUES ('{$u_id}','{$p_id}','{$d_id}','$qty','{$unit_price}','{$total}','$time')";
		$run_add_to =mysqli_query($conn, $add_to_cart);
		if($run_add_to){
			echo 1;
			exit();
		}
	}

}
