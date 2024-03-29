<?php
session_start();

ini_set('display_errors', 1); 
error_reporting(E_ALL);

$title = "Dashboard";
require_once "db_connnection.php";
require_once "admin-function.php";

$uri = $_SERVER['REQUEST_URI'];
$ex_link = explode("/", $uri);
$file_directry ="product-ajax-files";

if(in_array($file_directry,$ex_link)){
  $file_back= "../";
}else{
  $file_back= "";
}

if(!isset($_SESSION['a_id'])){
  header("location: {$file_back}login.php");
}else{
  $get_img_sql = "SELECT a_profilepic, a_vstatus FROM admin WHERE AID = ".$_SESSION['a_id'];
  $run_get_img = mysqli_query($conn,$get_img_sql);
  $get_admin_pic = mysqli_fetch_assoc($run_get_img);
  $a_pro_pic =  $get_admin_pic['a_profilepic'];
  $vstatus   =  $get_admin_pic['a_vstatus'];
  if($a_pro_pic == "avatar.jpg" ){
    $fav_img  = "admin-profile-details/admin-profile-images/logo-icon.png";
  }else{
    $fav_img = "admin-profile-details/admin-profile-images/".$a_pro_pic;
  }
  if($vstatus == "notverified"){
    $user_status = "notverified";
    $alert_for_verify = "
          <div>
            <div class='alert alert-dismissible fade show alert-warning mb-1 rounded text-dark' role='alert'>
                You account is not verified, please verify you account. <a href='admin-login-system-ajax/admin-signup-verification.php'> Click Here</a>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>
          </div>";
    }else{
        $user_status = "verified";
        $alert_for_verify = "";
    }

}

if(isset($_SESSION['u_email'])){
        @$email = $_SESSION['u_email'];
        $check_verify = "SELECT * FROM users WHERE email = '$email'";
        $run_verify = mysqli_query($conn, $check_verify);
        if(mysqli_num_rows($run_verify) > 0){
            $fetch = mysqli_fetch_assoc($run_verify);
            $vstatus = $fetch['vstatus'];
            
        }
    }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ANANAS | Admin <?php echo $title; ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="<?php echo $file_back; ?>vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="<?php echo $file_back; ?>vendor/font-awesome/css/font-awesome.min.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="<?php echo $file_back; ?>css/fontastic.css">
    <!-- Google fonts - Poppins -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="<?php echo $file_back; ?>css/style.blue.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="<?php echo $file_back; ?>css/custom.css">
    <link rel="stylesheet" href="<?php echo $file_back; ?>css/dropzone.css?v=1">
    <link rel="stylesheet" href="<?php echo $file_back; ?>jqueryuiall/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="<?php echo $file_back; ?>build/css/intlTelInput.css">

    <!-- Favicon-->
    <link rel="shortcut icon" href="<?php echo $file_back.$fav_img; ?>">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">


    <!-- new link for jquery crop image -->
    <!-- <link rel="stylesheet" href="css/dropzoneCropper.css" />
    <link href="css/cropper.css" rel="stylesheet"/>
    <script src="js/dropzoneCopper.js"></script>
    <script src="js/cropperjs"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <!-- <link rel="stylesheet" href="https://unpkg.com/dropzone/dist/dropzone.css" /> -->
    <link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet"/>
    <style type="text/css">
      .myAlert-bottom{
        position: fixed;
        z-index:99999;
        /*top: 5px;*/
        bottom: 5px;
        left:2%;
        width: 96%;
      }
    </style>
    

    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <?php
    echo $alert_for_verify;
  ?>
  <body>
    <div class="page">
      <!-- Main Navbar-->
      <header class="header">
        <nav class="navbar">
          <!-- Search Box-->
          <div class="search-box">
            <button class="dismiss"><i class="icon-close"></i></button>
            <form id="searchForm" action="#" role="search">
              <input type="search" placeholder="What are you looking for..." class="form-control">
            </form>
          </div>

          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <!-- Navbar Header-->
              <div class="navbar-header">
                <!-- Navbar Brand --><a href="../admin" class="navbar-brand d-none d-sm-inline-block">
                  <div class="brand-text d-none d-lg-inline-block"><span>ANANAS ADMIN-</span><strong>Dashboard</strong></div>
                  <div class="brand-text d-none d-sm-inline-block d-lg-none"><strong>AAD</strong></div></a>
                <!-- Toggle Button--><a id="toggle-btn" href="#" class="menu-btn active"><span></span><span></span><span></span></a>
              </div>
              <!-- Navbar Menu -->
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <!-- Search-->
                <li class="nav-item d-flex align-items-center"><a id="search" href="#"><i class="icon-search"></i></a></li>

                <!-- Main page site page    -->
                <li class="nav-item"><a href="<?php echo $file_back; ?>index.php" class="nav-link logout"> <span class="d-none d-sm-inline">Home</span><i class="fa fa-home"></i></a></li>
                <!-- Logout    -->
                <li class="nav-item"><a href="<?php echo $file_back; ?>logout.php" class="nav-link logout"> <span class="d-none d-sm-inline">Logout</span><i class="fa fa-sign-out"></i></a></li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
      <div class="page-content d-flex align-items-stretch"> 
        <!-- Side Navbar -->
        <nav class="side-navbar">
          <!-- Sidebar Header-->
          <?php

          $view_sql = "SELECT * FROM admin WHERE AID='{$_SESSION['a_id']}'";
          $view_res = mysqli_query($conn, $view_sql);
          if(mysqli_num_rows($view_res) > 0 ){
            while ($row = mysqli_fetch_assoc($view_res)) {
              $admin_user_name = $row['a_username'];
              $admin_country = $row['a_country'];
              $admin_profilepic = $row['a_profilepic'];
              $gender = $row['a_gender'];
            }
          }
          
            if($admin_profilepic == "avatar.jpg"){
              $pic = $file_back."img/avatar.jpg";
            }else{
              $img_path = $file_back."admin-profile-details/admin-profile-images/";
              $img_name_path = $img_path.$admin_profilepic;
              if(file_exists($img_name_path)){
                  $pic = $file_back."admin-profile-details/admin-profile-images/$admin_profilepic";
                }else{
                  $pic = $file_back."img/avatar.jpg";
                }
            }
          ?>
          <div class="sidebar-header d-flex align-items-center">
            <div class="avatar"><img src="<?php echo $pic; ?>" alt="..." class="img-fluid rounded-circle"></div>
            <div class="title">
              <h1 class="h4"><?php echo $admin_user_name; ?></h1>
              <p><?php echo $admin_country; ?></p>
            </div>
          </div>
          <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
          <ul class="list-unstyled">
            <li class="active"><a href="<?php echo $file_back; ?>index.php"> <i class="icon-home"></i>Home </a></li>
            <li><a href="<?php echo $file_back; ?>products.php"> <i class="icon-interface-windows"></i>Products</a></li>
            <li><a href="<?php echo $file_back; ?>users.php"> <i class="icon-user"></i>Users</a></li>
            <!-- <li><a href="<?php echo $file_back; ?>coupon.php"> <i class="icon-bill"></i>Coupon's</a></li> -->
            <li><a href="<?php echo $file_back; ?>product-delivery.php"> <i class="icon-bill"></i>Product Delivery</a></li>
          </ul><span class="heading">Extras</span>
          <ul class="list-unstyled">
            <li> <a href="<?php echo $file_back; ?>admin-profile.php"> <i class="icon-screen"></i>My Profile </a></li>
            <li> <a href="<?php echo $file_back; ?>change-password.php"> <i class="icon-check"></i>Change Password </a></li>
            <li> <a href="<?php echo $file_back; ?>../"> <i class="icon-home"></i>Main Site </a></li>
            <li> <a href="<?php echo $file_back; ?>logout.php"> <i class="icon-paper-airplane"></i>Logout </a></li>
          </ul>
        </nav>