<?php
//login-ajax-files/forgot-password.php
session_start();
require_once "../db_connnection.php";
include('../../smtp/simple.php');

 
	$email = mysqli_real_escape_string($conn, $_POST['f_u_email']);
	$check_email = "SELECT * FROM users WHERE email='$email'";
	$time = $date;
	$run_sql = mysqli_query($conn, $check_email);
	$fetch = mysqli_fetch_assoc($run_sql);
	$fetch_m_code = $fetch['countrycode'];
	$fetch_m_num = $fetch['mobile'];
	if(mysqli_num_rows($run_sql) > 0){
	    $code = rand(999999, 111111);
	    $status = "notverified";
	    $insert_code = "UPDATE users SET vcode = '$code', vstatus ='{$status}', updatetime = '$time' WHERE email = '$email'";
	    //echo $insert_code;
	    $run_query =  mysqli_query($conn, $insert_code);
	    if($run_query){
		    $subject = "Forgot password Verification Code";
		    $msg_mobile = "Forgot password verification code is $code";
		    $msg_email = EmailTemplateVerification($code);

		    $number = $fetch_m_code.$fetch_m_num;                 
		    $sms = send_sms($number, $msg_mobile);
	        $mail = smtp_mailer($email, $subject, $msg_email); 
			    if($mail == 0 || $sms != false){
			    	$_SESSION['u_email'] = $email;
			    	echo 3; // redirect to verifying code page
			        exit();
		        }
	    
	    }else{
	        echo 1; // Something went wrong!
	    }
	}else{
	   echo 2 ; //This email address does not exist!
	}
