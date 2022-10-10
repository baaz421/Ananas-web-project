<?php 
// update-for-coupon.php
require_once "../db_connnection.php";



$coupon_per = $_POST['c_per'];
$checkout_id = $_POST['checkout_id'];
$coupon_code = $_POST['c_code'];

$check_row = "SELECT * FROM checkout WHERE ID = '{$checkout_id}'";
$run_check_row = mysqli_query($conn, $check_row);
if(mysqli_num_rows($run_check_row) > 0){
	$fetch_order_id 	= mysqli_fetch_assoc($run_check_row);
	$sub_total 			= $fetch_order_id['sub_total'];
	$discount_amount 	= $sub_total / 100 * $coupon_per;
	$total 				= $sub_total-$discount_amount;
}

$check_cou_code = "SELECT * FROM coupons WHERE coupon_code = '{$coupon_code}'";
$run_check_cou_code = mysqli_query($conn, $check_cou_code);
$row = mysqli_fetch_assoc($run_check_cou_code);
$coupon_id = $row['coupon_id'];


$insert_per_sql = "UPDATE checkout SET coupon_per = '{$coupon_per}', coupon_id = '{$coupon_id}', total = '{$total}' WHERE ID = '{$checkout_id}'";
mysqli_query($conn, $insert_per_sql);

echo $coupon_per;







