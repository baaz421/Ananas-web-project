<?php
session_start();

$uri = $_SERVER['REQUEST_URI'];
$ex_link = explode("/", $uri);
$file_directry ="product-ajax-files";

if(in_array($file_directry,$ex_link)){
  $file_back= "../";
}else{
  $file_back= "";
}

if(!isset($_SESSION['ma_id'])){
  header("location: {$file_back}login.php");
}


$title = "Dashboard";
require_once "db_connnection.php";
require_once "admin-function.php";
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin MOLLA <?php echo $title; ?></title>
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
    <link rel="stylesheet" href="<?php echo $file_back; ?>css/style.sea.css?v=1" id="theme-stylesheet">

    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="<?php echo $file_back; ?>css/custom.css?v=1">
    <!-- <link rel="stylesheet" href="<?php echo $file_back; ?>css/dropzone.css?v=1"> -->
    <link rel="stylesheet" href="<?php echo $file_back; ?>jqueryuiall/jquery-ui.css">
   
    <link rel="stylesheet" href="<?php echo $file_back; ?>build/css/intlTelInput.css?v=1">

    <!-- Favicon-->
    <link rel="shortcut icon" href="<?php echo $file_back; ?>img/logo-icon.png">


    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <!--  link for jquery cropper and with dropzone  -->
    <!-- <link rel="stylesheet" href="https://unpkg.com/dropzone/dist/dropzone.css" /> -->
    <!-- <link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet"/> -->
    <link  href="<?php echo $file_back; ?>css/dropzone.css" rel="stylesheet" />
    <link href="<?php echo $file_back; ?>css/cropper.css" rel="stylesheet"/>
    <link href="<?php echo $file_back; ?>css/dropzoneCropper.css" rel="stylesheet"/>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
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

  </head>
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
                <!-- Navbar Brand --><a href="../m-admin" class="navbar-brand d-none d-sm-inline-block">
                  <div class="brand-text d-none d-lg-inline-block"><span>ANANAS MASTER ADMIN-</span><strong>Dashboard</strong></div>
                  <div class="brand-text d-none d-sm-inline-block d-lg-none"><strong>AMA</strong></div></a>
                <!-- Toggle Button--><a id="toggle-btn" href="#" class="menu-btn active"><span></span><span></span><span></span></a>
              </div>
              <!-- Navbar Menu -->
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <!-- Search-->
                <li class="nav-item d-flex align-items-center">
                  <a id="search" href="#">
                    <i class="icon-search"></i>
                  </a>
                </li>
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

          $view_sql = "SELECT * FROM m_admin WHERE AID='{$_SESSION['ma_id']}'";
          $view_res = mysqli_query($conn, $view_sql);
          if(mysqli_num_rows($view_res) > 0 ){
            while ($row = mysqli_fetch_assoc($view_res)) {
              $admin_user_name = $row['a_username'];
              $admin_country = $row['a_country'];
              $admin_profilepic = $row['a_profilepic'];
              $gender = $row['a_gender'];
            }
          }
          
            if($admin_profilepic == "male-avatar.jpg"){
              $pic = $file_back."img/male-avatar.jpg";
            }elseif($admin_profilepic == "female-avatar.jpg"){
              $pic = $file_back."img/female-avatar.jpg";
            }else{
              $img_path = $file_back."admin-profile-details/admin-profile-images/";
              $img_name_path = $img_path.$admin_profilepic;
              if(file_exists($img_name_path)){
                  $pic = $file_back."admin-profile-details/admin-profile-images/$admin_profilepic";
                }else{
                  if($gender == 'male'){
                    $pic = $file_back."img/male-avatar.jpg"; 
                  }else{
                    $pic = $file_back."img/female-avatar.jpg";
                  }
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
            <li><a href="<?php echo $file_back; ?>categories.php"> <i class="icon-list-1"></i>Categories</a></li>
            <li><a href="<?php echo $file_back; ?>users.php"> <i class="icon-user"></i>Users</a></li>
            <li><a href="<?php echo $file_back; ?>all-admins.php"> <i class="fa fa-address-book-o"></i>Admin's</a></li>
            <li><a href="<?php echo $file_back; ?>view-all-deals.php"> <i class="icon-presentation"></i>View Deals</a></li>            
            <li><a href="<?php echo $file_back; ?>deal-setting.php"> <i class="icon-bill"></i>Deal Setting</a></li>
            <li> <a href="<?php echo $file_back; ?>banners.php"> <i class="icon-screen"></i>Banner's</a></li>
            <li><a href="<?php echo $file_back; ?>product-delivery.php"> <i class="icon-bill"></i>Product Delivery</a></li>
            <!-- <li><a href="<?php echo $file_back; ?>coupon.php"> <i class="icon-bill"></i>Coupon's</a></li> -->
          </ul><span class="heading">Extras</span>
          <ul class="list-unstyled">
            <li> <a href="<?php echo $file_back; ?>admin-profile.php"> <i class="icon-screen"></i>My Profile </a></li>
            <li> <a href="<?php echo $file_back; ?>change-password.php"> <i class="icon-check"></i>Change Password </a></li>
            <li> <a href="<?php echo $file_back; ?>../admin"> <i class="fa fa-address-book-o"></i>Admin Login</a></li>
            <li> <a href="<?php echo $file_back; ?>../"> <i class="icon-home"></i>Main Site </a></li>
            <li> <a href="<?php echo $file_back; ?>logout.php"> <i class="icon-paper-airplane"></i>Logout </a></li>
          </ul>
        </nav>