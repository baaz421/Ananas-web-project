<?php 
//user-signup.php
session_start();
require_once "../db_connnection.php";
include('../../smtp/simple.php');

if(isset($_POST['u_email'])){

    $name           = mysqli_real_escape_string($conn, $_POST['u_name']);
    $email          = mysqli_real_escape_string($conn, $_POST['u_email']);
    $password       = mysqli_real_escape_string($conn, $_POST['u_pass']);
    $mobile         = $_POST['u_phone'];
    $mobileCode     = $_POST['u_ccode'];
    $countryname    = $_POST['u_cname'];
    $birthdate      = $_POST['u_dob'];
    $time           = $date;
    $update         = null; 
    $u_status       = 1;

    // check email if already exist or not 
    $email_check = "SELECT * FROM users WHERE email = '$email'";
    $res_email = mysqli_query($conn, $email_check);

    // check mobile number already exist or not
    $u_number_check = "SELECT * FROM users WHERE mobile = '$mobile'";
    $res_num = mysqli_query($conn, $u_number_check);


    if(mysqli_num_rows($res_email) > 0){
        echo 1; // Email that you have entered is already exist!
        exit();
    }elseif(mysqli_num_rows($res_num) > 0){
        echo 2; // mobile number that you have entered is already exist!
        exit();
    }else{
        $encpass = password_hash($password, PASSWORD_BCRYPT);
        $code = rand(999999, 111111);
        $status = "notverified";
        $insert_data = "INSERT INTO users (name, email, password, country, countrycode, mobile, dob, vcode, vstatus, createtime, updatetime, u_status)
                        values('$name', '$email', '$encpass', '$countryname', '$mobileCode', '$mobile', '$birthdate', '$code', '$status', '$time', '$update', '$u_status')";
        //echo $insert_data;                
        $data_check = mysqli_query($conn, $insert_data);
        if($data_check){

            $subject = "Verification Code";
            $msg_mobile = "Your new verification code is $code";
            $msg_email = EmailTemplateVerification($code);
            $number = $mobileCode.$mobile;                
            $sms = send_sms($number,$msg_mobile);
            $mail = smtp_mailer($email, $subject,$msg_email); 
            if($mail == 0 || $sms != false){
                $_SESSION['u_email'] = $email;
                $_SESSION['u_password'] = $password;
                echo 3;
                exit();

            }else{
                echo 4; // Failed while sending code!
            }
        }else{
            echo 5; // Failed while sign up please fill all fields!
        }
    }

}

//============================================
    // $name           = mysqli_real_escape_string($conn, $_POST['u_name']);
    // $email          = mysqli_real_escape_string($conn, $_POST['u_email']);
    // $password       = mysqli_real_escape_string($conn, $_POST['u_pass']);
    // $mobile         = $_POST['u_phone'];
    // $mobileCode     = $_POST['u_ccode'];
    // $countryname    = $_POST['u_cname'];
    // $birthdate      = $_POST['u_dob'];
    // $time           = $date;
    // $update         = null; 
    // $u_status       = 1;

    // echo $name."--".
    //      $email."--".
    //      $password."--".
    //      $mobile."--".
    //      $mobileCode."--".
    //      $countryname."--".
    //      $birthdate."--".
    //      $time;
// =============================================
