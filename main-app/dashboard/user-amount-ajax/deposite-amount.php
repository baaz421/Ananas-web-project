<?php
// <!-- deposite-amount.php -->
require_once "../db_connnection.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


	$amount = mysqli_real_escape_string($conn,$_POST['u_dep']);
	$u_id = mysqli_real_escape_string($conn,$_POST['u_id']);
	$time = $date;
	$method = 1;

	$insert_amount = "INSERT INTO deposite_amount (u_id, d_amount, method, d_date) VALUES('$u_id', '$amount', '{$method}', '$time')";
	$run_insert_amount = mysqli_query($conn, $insert_amount);

	if($run_insert_amount){
		$check_cb = "SELECT * FROM current_balance WHERE u_id = '$u_id'";
		$run_check_cb = mysqli_query($conn,$check_cb);
		if(mysqli_num_rows($run_check_cb) > 0){
			$fetch = mysqli_fetch_assoc($run_check_cb);
			$cb_amount = $fetch['cb_amount'];
			$new_cb = $cb_amount + $amount;
			$add_cb = "UPDATE current_balance SET cb_amount = '$new_cb', cb_date = '$time' WHERE u_id = '$u_id'";
			$run_add_cb = mysqli_query($conn, $add_cb);
			if($run_add_cb){
				echo 1; // amount added to account
				exit();
			}
		}else{
			$dir_add_cb = "INSERT INTO current_balance (u_id, cb_amount, cb_date) VALUES('$u_id', '$amount', '$time')";
			$run_dir_add_cb = mysqli_query($conn, $dir_add_cb);
			if($run_dir_add_cb){
				echo 1; // amount added to account
				exit();
			}
		}
		
	}else{
		echo 2; // something went wrong
	}


?>
