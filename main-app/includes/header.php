<?php 
@$u_id = $_SESSION['u_id'];
$actual_link = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
//echo $actual_link;
require "initial.php";
require "../langs/" . $_SESSION['lang'] . ".php" ;
require_once "includes/currency-rate.php";


if($_SESSION['lang'] == "ar"){
    $langdir ='rtl';
}else{
    $langdir ='ltr';
}

?>

<!DOCTYPE html>
<html lang="en" dir="<?php //echo $langdir; ?> ltr">


<!-- molla/about.html  22 Nov 2019 10:03:51 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Molla - Bootstrap eCommerce Template</title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Molla - Bootstrap eCommerce Template">
    <meta name="author" content="p-themes">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/icons/favicon-16x16.png">
    <link rel="manifest" href="assets/images/icons/site.html">
    <link rel="mask-icon" href="assets/images/icons/safari-pinned-tab.svg" color="#666666">
    <link rel="shortcut icon" href="assets/images/icons/favicon.ico">
    <meta name="apple-mobile-web-app-title" content="Molla">
    <meta name="application-name" content="Molla">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="assets/images/icons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/plugins/owl-carousel/owl.carousel.css">    
    <link rel="stylesheet" href="assets/css/plugins/magnific-popup/magnific-popup.css">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="assets/css/style.css"> 

    <link rel="stylesheet" href="assets/css/skins/skin-demo-14.css">
    <link rel="stylesheet" href="assets/css/demos/demo-14.css">    
    <link rel="stylesheet" href="assets/css/plugins/nouislider/nouislider.css">
    <!-- intltelinput links -->
    <link rel="stylesheet" href="build/css/intlTelInput.css">
    
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <style type="text/css">
       .myAlert-bottom{
          position: fixed;
          z-index:99999;
          /*top: 5px;*/
          bottom: 5px;
          left:2%;
          width: 96%;
        }
        .isDisabled {
          color: currentColor;
          cursor: not-allowed;
          opacity: 0.5;
          text-decoration: none;
        }
        .minus-span {cursor:pointer; }
        .number {
            width: 100%;
        }
        .minus, .plus{
          width:25%;
          height:34px;
          background:#f2f2f2;
          border-radius:4px;
          padding:8px 5px 8px 5px;
          border:1px solid #ddd;
          display: inline-block;
          vertical-align: middle;
          text-align: center;
        }
        .plus-minus-text{
            margin-top: -2px ;
        }
        .input-num-format{
          height:34px;
          width: 40%;
          text-align: center;
          font-size: 20px;
          border:1px solid #fcb941;
          border-radius:4px;
          display: inline-block;
          vertical-align: middle;
        }

    </style>
    <style type="text/css">
      .backlayer{
        position: fixed;
        top: 0;
        left: 0;
        z-index: 1000;
        width: 100%;
        height: 100%;
        background-color: black;
        filter: alpha(opacity=80);
        opacity: 0.8;

      }
    .loader {
      margin: 300px 50%;
      width: 48px;
      height: 48px;
      border: 3px solid #FFF;
      border-radius: 50%;
      display: inline-block;
      position: relative;
      box-sizing: border-box;
      animation: rotation 1s linear infinite;
    } 
    .loader::after {
      content: '';  
      box-sizing: border-box;
      position: absolute;
      left: 50%;
      top: 50%;
      transform: translate(-50%, -50%);
      width: 56px;
      height: 56px;
      border-radius: 50%;
      border: 3px solid transparent;
      border-bottom-color: #FF3D00;
    }

    @keyframes rotation {
      0% {
        transform: rotate(0deg);
      }
      100% {
        transform: rotate(360deg);
      }
    } 
    </style>
</head>

<body>

  <?php
    if(isset($_SESSION['u_email'])){
        @$email = $_SESSION['u_email'];
        $check_verify = "SELECT * FROM users WHERE email = '$email'";
        $run_verify = mysqli_query($conn, $check_verify);
        if(mysqli_num_rows($run_verify) > 0){
            $fetch = mysqli_fetch_assoc($run_verify);
            $vstatus = $fetch['vstatus'];
            if($vstatus == "notverified"){
                $user_status = "notverified";
  
            echo"<div>
                    <div class='alert alert-dismissible fade show alert-primary mb-1 rounded text-dark' role='alert'>
                        You account not verified, please verify you account. <a href='dashboard/verification.php'> Click Here</a>
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>
                  </div>";
   
            }else{
                $user_status = "verified";
            }
        }
    }
    // count wishlist of user 
    if(isset($_SESSION['u_id'])){
        $user_id = $_SESSION['u_id'];
        $count_wishlist = "SELECT * FROM wishlist WHERE user_id = '{$user_id}'";
        $run_count_wishlist = mysqli_query($conn, $count_wishlist);
        if(mysqli_num_rows($run_count_wishlist) > 0){
         $wish_count = mysqli_num_rows($run_count_wishlist);   
     }else{
        $wish_count = 0;
     }
        
    }else{
        $wish_count = 0;
    }

    // count cart of user 
    if(isset($_SESSION['u_id'])){
        $user_id = $_SESSION['u_id'];
        $count_cart = "SELECT * FROM cart WHERE user_id = '{$user_id}'";
        $run_count_cart = mysqli_query($conn, $count_cart);
        if(mysqli_num_rows($run_count_cart) > 0){
         $cart_count = mysqli_num_rows($run_count_cart);
     }else{
        $cart_count = 0;
     }
        
    }else{
        $cart_count = 0;
    }

    
  ?>
<div class="page-wrapper">
<!-- =========================header starts here======================-->
  <header class="header">
    <div class="header-top">
      <div class="container">
        <div class="header-left">
          <div class="header-dropdown">
            <a href="#"><?php echo $currency; ?></a>
            <div class="header-menu">
              <ul>
                <?php
                  echo displayCurrency($currency,$user_currency_set);
                ?>
              </ul>
            </div><!-- End .header-menu -->
          </div><!-- End .header-dropdown -->
          <div>
              <?php
                // if($_SESSION['lang'] == "ar"){
                //     $langname ='<a href="?lang=en">'.$english['english'].'</a>';
                // }else{
                //     $langname ='<a href="?lang=ar">'.$english['arabic'].'</a>';
                // }
                // echo "&nbsp &nbsp &nbsp &nbsp".$langname;
              ?>
          </div><!-- End .header-dropdown -->
          <div class="ml-5">
            <a href="#">
              <?php
                if(@$_SESSION['u_email'] != false){                              
                  @$email = $_SESSION['u_email'];
                  $u_name_sql = "SELECT * FROM users WHERE email = '$email'";
                  $run_u_name = mysqli_query($conn,$u_name_sql);
                  $fetch_name = mysqli_fetch_assoc($run_u_name);
                  $name= $fetch_name['name'];
                  echo "Welcome ".$name;
                }
              ?>
            </a>
          </div>
        </div><!-- End .header-left -->

        <div class="header-right">
            <ul class="top-menu">
                <li>
                    <a href="#"><?php echo $english['quick_links']; ?></a>
                    <ul>
                        <li><a href="tel:+97444880655"><i class="icon-phone"></i><?php echo $english['tel']; ?></a></li>

                        <li><a href="wishlist.php"><i class="icon-heart-o"></i><?php echo $english['wishlist']; ?> <span id='wishlist-num'>(<?php echo $wish_count; ?>)</span></a></li>
                        <?php
                        if(@$_SESSION['u_email'] != false){                                
                        ?>
                        <li><a href="dashboard">Dashboard</a></li>
                        <?php } ?>
                        <li><a href="about.php"><?php echo $english['about']; ?></a></li>
                        <li><a href="contact.php"><?php echo $english['contact']; ?></a></li>
                    <?php 
                    if(@$_SESSION['u_email'] == false){
                    ?>
                        <li><a href="login.php?continue=<?php echo $actual_link; ?>"><i class="icon-user"></i><?php echo $english['login']; ?></a></li>
                        <li><a href="signup.php?continue=<?php echo $actual_link; ?>"><i class="icon-user"></i><?php echo $english['signup']; ?></a></li>
                        <?php
                    }else{
                        ?>
                        <li><a href="logout.php"><i class="icon-user"></i><?php echo "Sign out"; ?></a></li>
                        <?php
                        }
                    ?>
                    </ul>
                </li>
            </ul><!-- End .top-menu -->
        </div><!-- End .header-right -->
      </div><!-- End .container -->
    </div><!-- End .header-top -->

    <div class="header-middle sticky-header">
        <div class="container">
            <div class="header-left">
                <button class="mobile-menu-toggler"> 
                    <span class="sr-only">Toggle mobile menu</span>
                    <i class="icon-bars"></i>
                </button>
                <a href="index.php" class="logo">
                    <img src="assets/images/logo.png" alt="Molla Logo" width="150" height="30">
                </a>

                <nav class="main-nav">
                    <ul class="menu sf-arrows">
                        <li class="megamenu-container active">
                            <a href="../"><?php echo $english['home']; ?></a>
                        </li>
                        <li>
                            <a href="catagories.php" class="sf-with-ul"><?php echo $english['categories']; ?></a>
                                <ul>
                                    <?php
                                      LoadCategories($conn,$_SESSION['lang']);
                                    ?>
                                </ul>
                        </li>
                        <li>
                            <a href="#" class="sf-with-ul"><?php echo $english['zones']; ?></a>

                             <div class="megamenu megamenu-sm">
                                    <div class="row no-gutters">
                                            <div class="menu col-12 p-4">
                                                <div class="menu-title w-100"><strong><?php echo $english['product_zone_details']; ?></strong><!-- End .menu-title -->
                                                <ul class="w-100">
                                                    <li><a href="zones.php?zone=red" class="bg-danger text-white text-center rounded-lg border border-light mb-1"><?php echo $english['red_zone_products']; ?></a></li>
                                                    <li><a href="zones.php?zone=orange" class="bg-warning text-dark text-center rounded-lg border border-light mb-1"><?php echo $english['orange_zone_products']; ?></a></li>
                                                    <li><a href="zones.php?zone=green" class="bg-success text-white text-center rounded-lg border border-light mb-1"><?php echo $english['green_zone_products']; ?></a></li>
                                                    <!-- <li><a href="#" class="text-white bg-primary text-center rounded-lg border border-light mb-1"><?php //echo $english['completed_products_zone']; ?> </a></li> -->
                                                    <!-- <li><a href="#" class="text-white bg-info text-center rounded-lg border border-light"><?php //echo $english['incompleted_products_zone']; ?></a></li> -->
                                                </ul>
                                                </div>
                                            </div><!-- End .menu-col -->
                                        
                                    </div><!-- End .row -->
                                </div><!-- End .megamenu megamenu-sm -->
                        </li>
                        <li>
                            <a href="productsvall.php"><?php echo $english['products']; ?></a>
                        </li>
                        <li>
                            <a href="faq.php"><?php echo $english['faq']; ?></a>
                        </li>
                    </ul><!-- End .menu -->
                </nav><!-- End .main-nav -->
            </div><!-- End .header-left -->

            <div class="header-right">
                <div class="header-search">
                    <a href="#" class="search-toggle" role="button" title="Search"><i class="icon-search"></i></a>
                    <form action="#" method="get">
                        <div class="header-search-wrapper">
                            <label for="q" class="sr-only"><?php echo $english['search']; ?></label>
                            <input type="search" class="form-control" name="q" id="q" placeholder="Search in..." required>
                        </div><!-- End .header-search-wrapper -->
                    </form>
                </div><!-- End .header-search -->

                <div class="dropdown cart-dropdown">
                    <a href="cart.php" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                        <i class="icon-shopping-cart"></i>
                        <span class="cart-count" id="cart-num"><?php echo $cart_count; ?></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-cart-products" id="show-dropdown-cart">
                            
                        </div><!-- End .cart-product -->

                        <!-- ======= cart bottons ======== -->
                        <div class="dropdown-cart-action">
                            <a href="cart.php" class="btn btn-primary"><?php echo $english['view_holds']; ?></a>
                            <a href="#" class="btn btn-outline-primary-2" id="participate"><span><?php echo $english['participate']; ?></span><i class="icon-long-arrow-right"></i></a>
                        </div><!-- End .dropdown-cart-total -->

                    </div><!-- End .dropdown-menu -->
                </div><!-- End .cart-dropdown -->
            </div><!-- End .header-right -->                    
        </div><!-- End .container -->                
    </div><!-- End .header-middle -->
  </header><!-- End .header -->
<!-- =========================header close here======================-->

