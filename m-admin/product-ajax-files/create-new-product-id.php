<?php
// create-new-product-id.php
session_start();

include "../db_connnection.php";

$admin_id = $_SESSION['ma_id'];
$adding_status = "incomplete"; // two stages incomplete or complete

$check_pro_id = "SELECT * FROM products WHERE admin_id = {$admin_id} AND adding = '{$adding_status}'";
$run_check_pro_id = mysqli_query($conn , $check_pro_id);
if(mysqli_num_rows($run_check_pro_id) > 0){
	$get_incom_data = mysqli_fetch_assoc($run_check_pro_id);
	$incomplete_id = $get_incom_data['ID'];
	$_SESSION['last_id'] = $incomplete_id;
	header("location: add-new-product-si.php?pid=$incomplete_id");
	// $_SESSION['new_incom_pro_id'];
}else{
  $insert_new_pro_sql = "INSERT INTO products(admin_id,adding) VALUES('{$admin_id}','{$adding_status}')";
  $run_insert_new_pro_sql = mysqli_query($conn, $insert_new_pro_sql);
	if($run_insert_new_pro_sql){
	  $new_pro_id = mysqli_insert_id($conn);
	  header("location: add-new-product-si.php?pid=$new_pro_id");
	  $_SESSION['last_id'] = $new_pro_id;
	}else{
		header("location: ../products.php");
	}

	
}


?>