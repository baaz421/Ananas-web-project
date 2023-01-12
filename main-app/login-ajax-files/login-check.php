<?php 
//login-check.php
session_start();
require_once "../db_connnection.php";


        $user_email        =mysqli_real_escape_string($conn, $_POST['u-email']);
        $user_password     =mysqli_real_escape_string($conn, $_POST['u-password']);
        $check_email = "SELECT * FROM users WHERE email = '$user_email'";
        $res = mysqli_query($conn, $check_email) or die("Connection failed");
        if(mysqli_num_rows($res) > 0){
            $fetch = mysqli_fetch_assoc($res);
            $fetch_pass = $fetch['password'];

            if(password_verify($user_password, $fetch_pass)){
                $_SESSION['u_email']        = $user_email;
                $_SESSION['u_password']     = $user_password;
                $_SESSION['u_id']           = $fetch['id'];
                $_SESSION['u_country']      = $fetch['country'];
                $_SESSION['u_name']         = $fetch['name'];

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
                //header("location: ../index.php");
                echo 3;
                exit();
            }else{
                echo 1; // "Incorrect email or password!";
            }

        }else{
            echo 2; // "It's look like you're not yet a member! Click on the bottom link to signup.";
        }
