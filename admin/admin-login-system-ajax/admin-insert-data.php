<?php 
require "../db_connnection.php";
//require "../../config/functions.php";
session_start();

 if(isset($_POST['admin-signup'])){
	$admin_name 		=mysqli_real_escape_string($conn, $_POST['admin-r-name']);
	$admin_username 	=mysqli_real_escape_string($conn, $_POST['admin-r-username']);
	$admin_email 		=mysqli_real_escape_string($conn, $_POST['admin-r-email']);
	$admin_gender 		=mysqli_real_escape_string($conn, $_POST['admin-r-gender']);
	$admin_password		=mysqli_real_escape_string($conn, $_POST['admin-r-password']);
	$admin_phone 		=mysqli_real_escape_string($conn, $_POST['admin-r-phone']);
	$admin_phone_code 	=mysqli_real_escape_string($conn, $_POST['admin-r-phonecode']);
	$admin_country 		=mysqli_real_escape_string($conn, $_POST['admin-r-contryname']);

	$admin_dateofbirth 	=mysqli_real_escape_string($conn, $_POST['admin-r-birthdate']);
	$date_format 		= str_replace('-', '-', $admin_dateofbirth);
	$newDate_format 	= date("d-m-Y", strtotime($date_format));

	$create_time 		= $date;
	$update_time 		= null;
	$admin_status 		= 1;

    if($admin_gender == "male"){
        $pic = "male-avatar.jpg";
    }else{
        $pic = "female-avatar.jpg";
    }

	// echo $admin_name."-".$admin_email ."-".$admin_gender ."-".$admin_password ."-".$admin_phone ."-".$admin_phone_code."-". $admin_country ."-".$admin_dateofbirth;

    $email_check = "SELECT * FROM admin WHERE a_email = '$admin_email'";
    $res_check = mysqli_query($conn, $email_check);
    if(mysqli_num_rows($res_check) > 0){
        echo 0; //Email that you have entered is already exist!
        header('location: ../admin-register.php');
        die();
    }else{
        $encpass = password_hash($admin_password, PASSWORD_BCRYPT);
        $vcode = rand(999999, 111111);
        $vstatus = "notverified";
        $insert_data = "INSERT INTO admin (a_username,a_fullname,a_email,a_gender,a_password,a_phone,a_phonecode,a_country,a_vcode,a_vstatus,a_status,a_dateofbirth,a_createtime,a_updatetime,a_profilepic)
                        values('$admin_username', '$admin_name', '$admin_email', '$admin_gender', '$encpass', '$admin_phone', '$admin_phone_code', '$admin_country','$vcode', '$vstatus','$admin_status', '$newDate_format', '$create_time', '$update_time','$pic')";
        $data_check = mysqli_query($conn, $insert_data);
        if($data_check){
            $last_id = mysqli_insert_id($conn);
            // $subject = "Email new Admin Verification Code";
            // $message = "Your new Admin verification code is $code";
            // $number = $admin_phone_code.$admin_phone;                
            // $sms = send_sms($number,$message);
            // $mail = send_mail($admin_email, $subject, $message); 
            // if($mail || $sms){
                $info = "We've sent a verification code to your email - $email & $number";
                $_SESSION['a_info']     = $info;
                $_SESSION['a_email']    = $admin_email;
                $_SESSION['a_password'] = $admin_password;
                $_SESSION['a_id']       = $last_id;
                header('location: ../index.php');
                exit();
            // }else{
                // echo 1; //Failed while sending code!;
            // }
        }else{
            echo 2;  //Failed while sign up please fill all fields!

        }
    }

}



	//AID,a_username,a_fullname,a_email,a_gender,a_password,a_phone,a_phonecode,a_country,a_vcode,a_vstatus,a_status,a_dateofbirth,a_createtime,a_updatetime

?>