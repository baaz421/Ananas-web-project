<?php 
require "../db_connnection.php";
//require "../../config/functions.php";
session_start();

 if(isset($_POST['admin-login'])){
        $admin_email        =mysqli_real_escape_string($conn, $_POST['admin-user']);
        $admin_password     =mysqli_real_escape_string($conn, $_POST['admin-password']);
        $check_email = "SELECT * FROM admin WHERE a_email = '$admin_email'";
        $res = mysqli_query($conn, $check_email) or die("Connection failed");
        if(mysqli_num_rows($res) > 0){
            $fetch = mysqli_fetch_assoc($res);
            $fetch_pass = $fetch['a_password'];
            $admin_status = $fetch['a_status'];
            if(password_verify($admin_password, $fetch_pass)){
                if($admin_status == 0){
                  $error_message = "Sorry, you're blocked by Master Admin. Now you can't login.";
                  $_SESSION['e_msg'] = $error_message;
                  header("location: ../login.php"); 
                }else{
                  $_SESSION['a_email'] = $admin_email;
                  $_SESSION['a_password'] = $admin_password;
                  $_SESSION['a_id'] = $fetch['AID'];
                  $_SESSION['a_country'] = $fetch['a_country'];
                  $_SESSION['a_country_code'] = $fetch['a_country_code'];
                  //$status = $fetch['vstatus'];
                  // if($status == 'verified'){
                  //   $_SESSION['email'] = $email;
                  //   $_SESSION['password'] = $password;
                  //     header('location:'. $_GET["continue"]);
                  // }else{
                  //     $info = "It's look like you haven't still verify your email - $email";
                  //     $_SESSION['info'] = $info;
                  //     header('location: dashboard.php');
                  // }
                  header("location: ../index.php");
                  if(isset($_SESSION['e_msg'])){
                    unset($_SESSION['e_msg']);
                  }
                  exit();
                }
            }else{
                echo 1; // "Incorrect email or password!";
                $error_message = "Incorrect email or password!";
                $_SESSION['e_msg'] = $error_message;
                header("location: ../login.php");
            }
        }else{
            echo 2; // "It's look like you're not yet a member! Click on the bottom link to signup.";
            $error_message = "It's look like you're not yet a member!";
            $_SESSION['e_msg'] = $error_message;
            header("location: ../login.php");
        }
    }

?>