<?php
// send-email-user-vendor.php
require "../db_connnection.php";
require "function.php";
include('../../smtp/simple.php');


if(isset($_POST['w_id'])){
	$w_id = $_POST['w_id'];

	// getting winner table information
	$winner_data 	= mysqli_fetch_assoc(GetWinnerData($conn, $w_id));
	$user_id 			= $winner_data['user_id'];
	$admin_id 		= $winner_data['admin_id'];
	$deal_id 			= $winner_data['deal_id'];
	$start_date 	= $winner_data['start_date'];
	$end_date 		= $winner_data['end_date'];
	// getting user table information
	$user_data = mysqli_fetch_assoc(GetUserData($conn, $user_id));
	$user_name = $user_data['name'];
	$user_email= $user_data['email'];
	// getting admin table information
	$admin_data = mysqli_fetch_assoc(GetAdminData($conn, $admin_id));
	$admin_name = $admin_data['a_fullname'];
	$admin_email= $admin_data['a_email'];
	// sending user email  process
	$user_subject	= "Congratulations you Won!";
	$user_format 	= DealWinner($conn,$deal_id);
	$user_mail 		= smtp_mailer($user_email, $user_subject, $user_format);
	// sending vendor email  process
	$vendor_subject	= "Congratulations you product sold!";
	$vendor_format 	= Winner_to_vendor($conn,$deal_id);
	$vendor_mail 	= smtp_mailer($admin_email, $vendor_subject, $vendor_format);
	// checking for email send or not
	if($user_mail == 0){
		$out_put_user = 1;
	}else{
		$out_put_user = "fail";
	}
	if($vendor_mail == 0){
		$out_put_admin = 1;
	}else{
		$out_put_admin = "fail";
	}
	// display msg what happen
	if($out_put_admin == 1 && $out_put_user == 1){
		echo 1; // successfully sent both emails
	}elseif($out_put_user == 1 && $out_put_admin == "fail"){
		echo 2; // admin email not send
	}elseif($out_put_user == "fail" && $out_put_admin == 1){
		echo 3; // user email not send
	}elseif($out_put_user == "fail" && $out_put_admin == "fail"){
		echo 4; // sorry both emails not 
	}

}
