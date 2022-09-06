<?php
// verification-code-new-user.php
session_start();
require_once "../db_connnection.php";

 
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
        	$update_verify = "UPDATE users SET vcode = $code, vstatus = '$status', updatetime = '$time' WHERE email = '$email'";
			$run_query = mysqli_query($conn, $update_verify);

			if($run_query){            
            $_SESSION['u_email']		= $email;
            $_SESSION['u_id']           = $fetch_data['id'];
            $_SESSION['u_country']      = $fetch_data['country'];
            $_SESSION['u_name']         = $fetch_data['name'];

            echo 3; //redirect to previous page
            exit();
        	}
        }else{
            echo 2; // You've entered incorrect code!
        }
    }else{
    	echo 1; // if null value 
    }