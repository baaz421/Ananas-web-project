<?php 
session_start();
require "../db_connnection.php";

$cou_code = $_POST['coupon_code'];
$cou_per = $_POST['coupon_per'];
$status = 0;
$country = "M-Admin";
$admin_id= 0;
$created_date = $date;
$expiry_date = $_POST['coupon_expiry'];


$sql ="INSERT INTO coupons(
	admin_id,
	coupon_code, 
	coupon_percentage, 
	coupon_country, 
	coupon_status, 
	expire_date,
	created_date
	) VALUES (
	'$admin_id' ,
	'{$cou_code}',
	'{$cou_per}',
	'{$country}' ,
	'$status' ,
	'{$expiry_date}' ,
	'{$created_date}' 
	)";
//$result =mysqli_query($conn,$sql) or die("Query failed..!");

if(mysqli_query($conn, $sql)){
	echo 1;
}else{
	echo 0;
}


?>