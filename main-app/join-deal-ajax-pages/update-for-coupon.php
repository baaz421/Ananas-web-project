<?php 
// update-for-coupon.php
require_once "../db_connnection.php";



$coupon_per = $_POST['c_per'];
$checkout_id = $_POST['checkout_id'];

$check_row = "SELECT * FROM checkout WHERE ID = '{$checkout_id}'";
$run_check_row = mysqli_query($conn, $check_row);
if(mysqli_num_rows($run_check_row) > 0){
	$fetch_order_id 	= mysqli_fetch_assoc($run_check_row);
	$sub_total 			= $fetch_order_id['sub_total'];
	$discount_amount 	= $sub_total / 100 * $coupon_per;
	$total 				= $sub_total-$discount_amount;
}


$insert_per_sql = "UPDATE checkout SET coupon_per = '{$coupon_per}', total = '{$total}' WHERE ID = '{$checkout_id}'";
mysqli_query($conn, $insert_per_sql);

echo $coupon_per;







