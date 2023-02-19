<?php
//update-user-details.php

require "../db_connnection.php";
include('../../../smtp/simple.php');

session_start();
$user_id = $_SESSION['u_id'];

$sql_user_details = "SELECT * FROM users WHERE id = $user_id";
$run_sql_user_details = mysqli_query($conn, $sql_user_details);
$fetch_data = mysqli_fetch_assoc($run_sql_user_details);
$email        = $fetch_data['email'];
$country      = $fetch_data['country'];
$mobile       = $fetch_data['mobile'];

$user_name 					= mysqli_real_escape_string($conn, $_POST['u_name']);
$user_email 				= mysqli_real_escape_string($conn, $_POST['u_email']);

$a_phone 						= mysqli_real_escape_string($conn, $_POST['phone']);
$user_phone 				= str_replace(' ', '', $a_phone);
$user_phone_code 		= $_POST['m_code'];
$user_country 			= $_POST['country'];
$twoalph_country    = strtoupper($_POST['twoalph']);
$user_country_code 	= CountryCurrencyCode($conn,$twoalph_country);

$user_dateofbirth 	= mysqli_real_escape_string($conn, $_POST['dob']);
// $date_format 				= str_replace('-', '-', $user_dateofbirth);
// $newDate_format 		= date("d-m-Y", strtotime($date_format));

$code = rand(999999, 111111);
$status = "notverified";
$mail = false;
if($user_phone == $mobile && $user_email == $email){
	$sql_update_user_details = "UPDATE users SET 
		name	      	='{$user_name}',
		email 	  		='{$user_email}',
		mobile 				='{$user_phone}',	
		countrycode 	= $user_phone_code,
		country 			='{$user_country}',
		currency			='{$user_country_code}',
		dob 					='{$user_dateofbirth}',
		updatetime		='{$date}'
		WHERE id 			= $user_id";
		$mail = false;	
	}else{
		$sql_update_user_details = "UPDATE users SET 
			name	      	='{$user_name}',
			email 	  		='{$user_email}',
			mobile 				='{$user_phone}',	
			countrycode 	= $user_phone_code,
			country 			='{$user_country}',
			currency			='{$user_country_code}',
			iso 					='{$twoalph_country}',
			dob 					='{$user_dateofbirth}',
			vcode 				='{$code}',
			vstatus 			='{$status}',
			updatetime		='{$date}'
			WHERE id 			= $user_id";
			$mail = true;
	}
if(mysqli_query($conn,$sql_update_user_details)){
	// $msg_mobile = "Your new verification code is $code";      
  // $number = $mobileCode.$mobile;                
  // $sms = send_sms($number,$msg_mobile);
  if($mail === true){
  	  $subject = "Verification Code";
  		$msg_email = EmailTemplateVerification($code);
  		$mail = smtp_mailer($user_email, $subject,$msg_email);
  		$_SESSION['u_email']        = $user_email;
      $_SESSION['u_country']      = $user_country;
      $_SESSION['u_name']         = $user_name;
  }
	echo 1;
}else{
	echo 0;
}

function CountryCurrencyCode($conn,$iso2){
	$sql = "SELECT * FROM countries WHERE iso = '{$iso2}'";
	$run = mysqli_query($conn, $sql);
	$get = mysqli_fetch_assoc($run);
	$output = $get['currency'];
	return $output;
}

?>