<?php
// verification-code-new-user.php
session_start();
require_once "../db_connnection.php";
include('../../smtp/simple.php');

 
   if(isset($_POST['u_otp'])){
        
        $otp_code = mysqli_real_escape_string($conn, $_POST['u_otp']);
        $check_code = "SELECT * FROM users WHERE vcode = $otp_code";
        $code_res = mysqli_query($conn, $check_code);
        //echo $otp_code;
        if(mysqli_num_rows($code_res) > 0){
        	$fetch_data	= mysqli_fetch_assoc($code_res);
            $email 		= $fetch_data['email'];
        	$time = $date;
			$code = 0;
			$status = 'verified';
            $fetch_m_code = $fetch_data['countrycode'];
            $fetch_m_num = $fetch_data['mobile'];
        	$update_verify = "UPDATE users SET vcode = $code, vstatus = '$status', updatetime = '$time' WHERE email = '$email'";
			$run_query = mysqli_query($conn, $update_verify);

			if($run_query){            
            $_SESSION['u_email']		= $email;
            $_SESSION['u_id']           = $fetch_data['id'];
            $_SESSION['u_country']      = $fetch_data['country'];
            $_SESSION['u_name']         = $fetch_data['name'];

            $subject = "Registration completed successfully.";
            $msg_mobile = "Registration completed successfully.Thank you.";
            $msg_email = WelcomeEmail($fetch_data['name']);

            $number = $fetch_m_code.$fetch_m_num;                 
            $sms = send_sms($number, $msg_mobile);
            $mail = smtp_mailer($email, $subject, $msg_email); 
                if($mail == 0 || $sms != false){
                    $_SESSION['u_email'] = $email;
                    echo 3; // redirect to verifying code page
                    exit();
                }
            exit();
        	}
        }else{
            echo 2; // You've entered incorrect code!
        }
    }else{
    	echo 1; // if null value 
    }