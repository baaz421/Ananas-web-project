<?php
// dispatch-product.php
require "../db_connnection.php";
require "../../m-admin/product-delivery-ajax/function.php";
include('../../smtp/simple.php');

if(isset($_POST['w_id'])){
	$w_id = $_POST['w_id'];

	// getting winner table information
	$winner_data 	= mysqli_fetch_assoc(GetWinnerData($conn, $w_id));
	$user_id 			= $winner_data['user_id'];
	$deal_id 			= $winner_data['deal_id'];
	// getting user table information
	$user_data = mysqli_fetch_assoc(GetUserData($conn, $user_id));
	$user_email= $user_data['email'];
	// sending user email  process
	$user_subject	= "Product Confirmation Notification";
	$link= "https://ananas.com.co/main-app/product-received-successfully.php?wid=".$w_id;
	$user_format 	= WinnerConfirmation($conn,$deal_id,$link);
	$user_mail 		= smtp_mailer($user_email, $user_subject, $user_format);
	if($user_mail == 0){
		$sql_update = "UPDATE winner SET vendor_confirm = 0, vendor_confirm_date = '$date' WHERE w_id = $w_id";
		$run_sql_update = mysqli_query($conn, $sql_update);
		if($run_sql_update){
			echo 1; // successfully dispatched
		}else{
			echo 2; // data not updated 
		}
	}else{
		echo 3; // email not send to user
	}
	

}