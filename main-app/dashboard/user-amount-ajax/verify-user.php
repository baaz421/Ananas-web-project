
<?php
// <!-- verify-user.php --> 
session_start();
require_once "../db_connnection.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
 

        
        $otp_code = mysqli_real_escape_string($conn, $_POST['u_otp']);
        $check_code = "SELECT * FROM users WHERE vcode = $otp_code";
        $code_res = mysqli_query($conn, $check_code);
        //echo $otp_code;
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $email = $fetch_data['email'];
            $time = $date;
			$code = 0;
			$status = 'verified';

            $update_verify = "UPDATE users SET vcode = $code, vstatus = '$status', updatetime = '$time' WHERE email = '$email'";
			$run_query = mysqli_query($conn, $update_verify);

            $_SESSION['u_email'] 		= $email;
            $_SESSION['u_id']           = $fetch_data['id'];
            $_SESSION['u_country']      = $fetch_data['country'];
            $_SESSION['u_name']         = $fetch_data['name'];

            echo 3; //redirect to dashboard
            // header('location: dashboard.php');
            exit();
        
        }else{
            echo 2; // You've entered incorrect code!
        }


?>