<?php
//login-ajax-files/rest-code.php
session_start();
require_once "../db_connnection.php";
 
   if(isset($_POST['u_otp'])){
        
        $otp_code = mysqli_real_escape_string($conn, $_POST['u_otp']);
        $check_code = "SELECT * FROM users WHERE vcode = $otp_code";
        $code_res = mysqli_query($conn, $check_code);
        //echo $otp_code;
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $email = $fetch_data['email'];
            $_SESSION['u_email'] = $email;

            echo 3; //redirect to enter new password
            // header('location: new_password.php');
            exit();
        
        }else{
            echo 2; // You've entered incorrect code!
        }
    }else{
    	echo 1; // if null value 
    }