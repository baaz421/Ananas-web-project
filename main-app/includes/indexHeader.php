<?php

require "initial.php";
$actual_link = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

require_once "../langs/" . $_SESSION['lang'] . ".php" ;
require_once "includes/currency-rate.php";
@$u_id = $_SESSION['u_id'];

if(isset($_SESSION['currency']) || isset($_COOKIE['cur'])){
    $cur_name = isset($_SESSION['currency']) ? $_SESSION['currency'] : $_COOKIE['cur'];
    $cur_link = "?curType=$cur_name";
}else{
    $cur_name = "Currency";
    $cur_link = "#";
}
if(isset($_SESSION['currency']) || isset($_COOKIE['curRate'])){
    $cur_rate = isset($_SESSION['cur_rate']) ? $_SESSION['cur_rate'] : $_COOKIE['curRate'];
}else{
    $cur_rate = 1;
}
?>
<!DOCTYPE html>
<html lang="en">

<!-- molla/index-14.html  22 Nov 2019 09:59:31 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $title = $_SESSION['lang'] == "en" ? $title_en : $title_ar; ?></title>
    <meta name="keywords" content="Molla">
    <meta name="description" content="Molla - bidding site">
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
    <link rel="stylesheet" href="assets/vendor/line-awesome/line-awesome/line-awesome/css/line-awesome.min.css">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/plugins/owl-carousel/owl.carousel.css"> 
    <link rel="stylesheet" href="assets/css/plugins/magnific-popup/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/plugins/jquery.countdown.css">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/skins/skin-demo-14.css">
    <link rel="stylesheet" href="assets/css/demos/demo-14.css">    
    <link rel="stylesheet" href="assets/css/plugins/nouislider/nouislider.css">

    <link rel="stylesheet" href="build/css/intlTelInput.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
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
    }else{
        $user_status = "";
    }
    // wishlist count
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
    <!-- ===================================== header starts here============================== -->    
        <header class="header header-14">
        <!-- =====================================top header starts here============================== -->
            <div class="header-top">
                <div class="container">
                    <div class="header-left">
                        <a href="#"><i class="icon-phone"></i><?php echo $english['tel']; ?></a>                           
                    </div><!-- End .header-left -->

                    <div class="header-right">

                        <ul class="top-menu">
                            <li>
                                <a href="#"><?php echo $english['link']; ?></a>
                                <ul class="menus">
                                    <li>
                                        <div class="header-dropdown">
                                            <a href="<?php echo $cur_link;?>"><?php echo $cur_name;?></a>
                                            <div class="header-menu">
                                                <ul>
                                                    <li><a href="?curType=QAR">QAR</a></li>
                                                    <li><a href="?curType=USD">USD</a></li>
                                                </ul>
                                            </div><!-- End .header-menu -->
                                        </div><!-- End .header-dropdown -->
                                    </li>
                                    <li>   
                                        
                                            <?php
                                    if($_SESSION['lang'] == "ar"){
                                        $langname ='<a href="?lang=en">'.$english['english'].'</a>';
                                    }else{
                                        $langname ='<a href="?lang=ar">'.$english['arabic'].'</a>';
                                    }

                                    ?>
                                    <?php echo $langname; ?>
                                    </li>
                                <?php 
                                if(@$_SESSION['u_email'] == false){
                                ?>
                                    <li class="login">
                                        <a href="signup.php?continue=<?php echo $actual_link; ?>"><?php echo $english['signup']; ?></a>
                                    </li>
                                    <li class="login">
                                        <a href="login.php?continue=<?php echo $actual_link; ?>"><?php echo $english['login']; ?></a>
                                    </li>
                                <?php
                                }else{
                                ?>
                                <li class="login">
                                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                        <?php 
                                            @$email = $_SESSION['u_email'];
                                            $u_name_sql = "SELECT * FROM users WHERE email = '$email'";
                                            $run_u_name = mysqli_query($conn,$u_name_sql);
                                            $fetch_name = mysqli_fetch_assoc($run_u_name);
                                            echo "Welcome ".$fetch_name['name'];
                                        ?>                                            
                                    </a>
                                        <div class="dropdown-menu">
                                          <a class="dropdown-item" href="dashboard">Dashboard</a>
                                          <a class="dropdown-item" href="#">View My Orders</a>
                                          <a class="dropdown-item" href="#">My Profile</a>
                                          <div class="dropdown-divider"></div>
                                          <a class="dropdown-item" href="logout.php">Sign out</a>
                                        </div>
                                </li>
                                <?php
                                }
                                ?>
                                </ul>
                            </li>
                        </ul><!-- End .top-menu -->
                    </div><!-- End .header-right -->

                </div><!-- End .container -->
            </div><!-- End .header-top -->
        <!-- =====================================top header close here============================== -->

        <!-- =====================================middle header starts here============================== -->
            <div class="header-middle">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-auto col-lg-3 col-xl-3 col-xxl-2">
                            <button class="mobile-menu-toggler">
                                <span class="sr-only">Toggle mobile menu</span>
                                <i class="icon-bars"></i>
                            </button>

                            <a href="index.php" class="logo mb-1 mt-1">
                                <img src="assets/images/demos/demo-14/web-logo.png" alt="Molla Logo" width="150" height="30">
                            </a>
                            <!-- ==================== logo here ^ ============================== -->
                        </div><!-- End .col-xl-3 col-xxl-2 -->
                    
                        <div class="col col-lg-9 col-xl-9 col-xxl-10 header-middle-right">
                            <div class="row">
                                <div class="col-lg-8 col-xxl-4-5col d-none d-lg-block">
                                    <div class="header-search header-search-extended header-search-visible header-search-no-radius">
                                        <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                                        <form action="#" method="get">
                                            <div class="header-search-wrapper search-wrapper-wide">
                                                <label for="q" class="sr-only"><?php echo $english['search']; ?></label>
                                                <input type="search" class="form-control" name="q" id="q" placeholder="Search product ..." required>

                                                <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
                                            </div><!-- End .header-search-wrapper  ================ -->

                                        </form>
                                    </div><!-- End .header-search =========== -->
                                </div><!-- End .col-xxl-4-5col =========== -->

                                <div class="col-lg-4 col-xxl-5col d-flex justify-content-end align-items-center">
                                    <div class="header-dropdown-link">

                                        <a href="wishlist.php" class="wishlist-link">
                                            <i class="icon-heart-o"></i>
                                            <span class="wishlist-count" id='wishlist-num'><?php echo $wish_count; ?></span>
                                            <span class="wishlist-txt"><?php echo $english['wishlist']; ?></span>
                                        </a>
                                        <!-- ==============wishlist close here======================== -->

                                        <div class="dropdown cart-dropdown">
                                            <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                                                <i class="icon-shopping-cart"></i>
                                                <span class="cart-count" id="cart-num"><?php echo $cart_count; ?></span>
                                                <span class="cart-txt"><?php echo $english['hold']; ?></span>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right">
                                                <div class="dropdown-cart-products"  id="show-dropdown-cart">
                                                </div><!-- End .cart-product -->
                                                <div class="dropdown-cart-action">
                                                    <a href="cart.php" class="btn btn-primary"><?php echo $english['view_holds']; ?></a>
                                                    <a href="#" class="btn btn-outline-primary-2" id="participate"><span><?php echo $english['participate']; ?></span><i class="icon-long-arrow-right"></i></a>
                                                </div><!-- End .dropdown-cart-total -->
                                            </div><!-- End .dropdown-menu -->
                                        </div><!-- End .hold-dropdown ============-->
                                        <?php 
                                        if(@$_SESSION['u_email'] != false){
                                        ?>
                                        <div class="dropdown cart-dropdown">
                                            <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                                                <i class="icon-user"></i>
                                                <!-- <span class="cart-count">2</span> -->
                                                <span class="cart-txt"><?php echo $fetch_name['name']; ?></span>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right">
                                                <div class="dropdown-cart-total">
                                                    <span>Current Balance</span>

                                                    <span class="cart-total-price"><?php echo current_bal($u_id,$conn); ?></span>
                                                </div><!-- End .dropdown-cart-total -->

                                                <div class="dropdown-cart-action">
                                                    <a href="logout.php" class="btn btn-primary mr-1">Sign out</a>
                                                    <a href="dashboard" class="btn btn-outline-primary-2">
                                                        <span>Dashboard</span>
                                                        <i class="icon-long-arrow-right"></i>
                                                    </a>
                                                </div><!-- End .dropdown-cart-total -->
                                            </div><!-- End .dropdown-menu -->
                                        </div><!-- End .hold-dropdown ============-->
                                        <?php
                                        }
                                        ?>
                                     <!-- ==============My Account close here======================== -->

                                    </div>
                                </div><!-- End .col-xxl-5col -->

                            </div><!-- End .row -->
                        </div><!-- End .col-xl-9 col-xxl-10 -->
                    </div><!-- End .row -->
                </div><!-- End .container-fluid -->
            </div><!-- End .header-middle -->
        <!-- =====================================middel header close here============================== -->

        <!-- =====================================buttom header starts here============================== -->
            <div class="header-bottom sticky-header">    
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-auto col-lg-3 col-xl-3 col-xxl-2 header-left">
                            <div class="dropdown category-dropdown show is-on" data-visible="true">
                                <a href="catagories.php" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static" title="Browse Categories">
                                   <?php echo $english['categories']; ?>
                                </a>

                                <div class="dropdown-menu show">
                                    <nav class="side-nav">
                                        <ul class="menu-vertical sf-arrows">
                                            <?php
                                              LoadCategories($conn,$_SESSION['lang']);
                                            ?>                                            
                                        </ul><!-- End .menu-vertical -->
                                    </nav><!-- End .side-nav -->
                                </div><!-- End .dropdown-menu -->
                            </div><!-- End .category-dropdown -->
                        </div><!-- End .col-xl-3 col-xxl-2 -->

                        <!-- =====================================menus starts here============================== -->
                        <div class="col col-lg-6 col-xl-6 col-xxl-8 header-center">
                            <nav class="main-nav">
                                <ul class="menu sf-arrows">


                                    <li class="megamenu-container">
                                        <a href="#" class="sf-with-ul"><?php echo $english['home']; ?></a>
                                    </li>

                        <!-- =====================================home button here============================== -->
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
                                                            <!-- <li><a href="#" class="text-white bg-secondary text-center rounded-lg border border-light mb-1"><?php //echo $english['completed_products_zone']; ?> </a></li> -->
                                                            <!-- <li><a href="#" class="text-white bg-info text-center rounded-lg border border-light"><?php //echo $english['incompleted_products_zone']; ?></a></li> -->
                                                        </ul>
                                                        </div>
                                                    </div><!-- End .menu-col -->
                                                
                                            </div><!-- End .row -->
                                        </div><!-- End .megamenu megamenu-sm -->
                                    </li>

                        <!-- =====================================shop button here============================== -->

                                    <li>
                                        <a href="productsvall.php" class="sf-with-ul"><?php echo $english['products']; ?></a>

                                    </li>

                                    <li>
                                        <a href="faq.php" class="sf-with-ul"><?php echo $english['faq']; ?></a>
                                    </li>
                                    <li>
                                        <a href="#" class="sf-with-ul"><?php echo $english['company']; ?></a>

                                        <ul>
                                            <li><a href="about.php" class="text-dark"><?php echo $english['about']; ?></a></li>
                                            <li><a href="contact.php" class="text-dark"><?php echo $english['contact']; ?></a></li>
                                            <li><a href="services.php" class="text-dark"><?php echo $english['services']; ?></a></li>
                                            <li><a href="faq.php" class="text-dark"><?php echo $english['faq']; ?></a></li>
                                        </ul>
                                    </li>
                                </ul><!-- End .menu -->
                            </nav><!-- End .main-nav -->
                        </div><!-- End .col-xl-9 col-xxl-10 -->
                        <!-- =====================================menus close here============================== -->

                        <div class="col col-lg-3 col-xl-3 col-xxl-2 header-right">
                            <i class="la la-lightbulb-o"></i><p><strong><?php echo $english['try_your']; ?> </strong> </p>
                        </div>

                    </div><!-- End .row -->
                </div><!-- End .container-fluid -->
            </div><!-- End .header-bottom -->
        <!-- =====================================buttom header close here============================== -->    
        </header><!-- End .header -->
    <!-- ===================================== header close here============================== -->