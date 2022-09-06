<?php 
// check-coupon-code.php
require "../db_connnection.php";

$cou_code = $_POST['c_code'];
// $cou_code = "MOLLASITe";


$check_cou_code = "SELECT * FROM coupons WHERE coupon_code = '{$cou_code}'";
$run_check_cou_code = mysqli_query($conn, $check_cou_code);
if(mysqli_num_rows($run_check_cou_code) > 0){
	$row = mysqli_fetch_assoc($run_check_cou_code);

	$expire_date = $row['expire_date'];
	$status      = $row['coupon_status'];
	$percentage  = $row['coupon_percentage'];

	if($status != 0){
		$current_date = date('d-m-Y',strtotime($date));
		$expired_date = date('d-m-Y',strtotime($expire_date." +1 days"));
		// echo $current_date."<br>";
		// echo $expired_date."<br>";
		if (strtotime($expired_date) <= strtotime($current_date)){
		    echo -1; // sorry code Expired 		    
		}else{
		    echo $percentage; // code accepted	
		}

	}else{
		$current_date = date('d-m-Y',strtotime($date));
		$expired_date = date('d-m-Y',strtotime($expire_date." +1 days"));
		// echo $current_date."<br>";
		// echo $expired_date."<br>";
		if (strtotime($expired_date) <= strtotime($current_date)){
		    echo -1; // sorry code Expired 		    
		}else{
		    echo -2; //"this coupon not available or diabled";
		}
		
	}

}else{
	echo -3; //"coupon code doesn't exist or wrong code";
}