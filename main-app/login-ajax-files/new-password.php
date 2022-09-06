<?php 
//new-password.php
session_start();
require_once "../db_connnection.php";


$password = mysqli_real_escape_string($conn, $_POST['u_password']);
$cpassword = mysqli_real_escape_string($conn, $_POST['u_cpassword']);

$time = $date;
$code = 0;
$status = 'verified';
$email = $_SESSION['u_email']; //getting this email using session
$encpass = password_hash($password, PASSWORD_BCRYPT);

$update_pass = "UPDATE users SET vcode = $code, vstatus = '$status', password = '$encpass', updatetime = '$time' WHERE email = '$email'";
$run_query = mysqli_query($conn, $update_pass);

if($run_query){
      $check_email = "SELECT * FROM users WHERE email = '$email'";
      $res = mysqli_query($conn, $check_email);
      $fetch = mysqli_fetch_assoc($res);
      $_SESSION['u_email']        = $email;
      $_SESSION['u_id']           = $fetch['id'];
      $_SESSION['u_country']      = $fetch['country'];
      $_SESSION['u_name']         = $fetch['name'];
      echo 3; // redirect to login page

    //header('Location: dashboard.php');
}else{
   echo 2; // Failed to change your password!
}



