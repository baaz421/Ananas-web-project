<?php 
session_start();
$pro_id = $_GET['p_id'];
if(isset($_SESSION['u_id'])){
	$user_id = $_SESSION['u_id'];
}else{
	$user_id ="";
}
require "db_connnection.php";
require "all-products-files/products-functions.php";
require "../m-admin/deals-ajax-files/deals-functions.php";
 $query_s  = "SELECT * FROM products WHERE ID = '{$_GET['p_id']}'";
 $run_query_s = mysqli_query($conn, $query_s);
 $get_status = mysqli_fetch_assoc($run_query_s);
 $status_p = $get_status['p_status'];
 
if(isset($_GET['p_id']) && $status_p == 1){
  $query  = "SELECT * FROM products WHERE ID = '{$_GET['p_id']}'";
  $result = mysqli_query($conn, $query);
  $get 	  = mysqli_fetch_assoc($result);
  
  $p_id 		= $get['ID'];
  $p_name 		= $get['product_name'];
  $p_cat 		= GetCatName($get['category_id'],$conn);
  $p_name 		= $get['product_name'];
  $p_amt 		= $get['m_price'];
  $p_des 		= $get['description'];

  // image path and image name  for left side small image
  $img_path 	= "../All-Products-images/";
  $p_img_name1 	= $get['image_0'];
  $p_img_name2 	= $get['image_1'];
  $p_img_name3 	= $get['image_2'];
  $p_img_name4 	= $get['image_3'];

  // image name and path for singal image
  $p_img_src  = $img_path.$p_img_name1;

  // check wishlist in database for user
  $wq_disable =DisableWishlistButton($user_id,$p_id,$conn);
  // check cart in database for user
  $cq_disable =  DisableCartButton($user_id,$p_id,$conn);

  // check deal and disable cart button and show on deal button on image
  $check_pro_deal = "SELECT * FROM deal WHERE p_id ='$p_id'";
  $run_check_pro_deal = mysqli_query($conn, $check_pro_deal);
    if(mysqli_num_rows($run_check_pro_deal) > 0){
      while($deal_check = mysqli_fetch_assoc($run_check_pro_deal)){
        if($deal_check['deal_status'] == 1){
            $deal_id = $deal_check['DID'];
            $label = "<span class='product-label label-new'>ON DEAL</span>";
            // $p_bar = progressBarHtml();
            $p_bar = zoneProgress($deal_id,$conn,$date);
            $quick_cart_disable = $cq_disable;
        }else{
            $label = "<span class='product-label label-top'>UPCOMING DEAL</span>";
            $p_bar = "";
            $quick_cart_disable = "isDisabled";
            $deal_id = 0;

        }
      }
    }else{
        $label = "<span class='product-label label-top'>UPCOMING DEAL</span>";
        $p_bar = "";
        $quick_cart_disable = "isDisabled";
        $deal_id = 0;
    }

}

 // $p_bar = progressBarHtml(); // this is dame progress bar for test 

function check_img_left($img_name,$pro_img_src,$link){
    $img_path = $pro_img_src;
    $image_src = $img_path.$img_name;
    if($img_name == "null"){
        $left_image = "";
    }else{
        $left_image = '<a href="#'.$link.'" class="carousel-dot active">
							<img src="'.$image_src.'">
						</a>';
    }
  return $left_image;
}

function check_img_right($img_name,$pro_img_src,$link,$label){
    $img_path = $pro_img_src;
    $image_src = $img_path.$img_name;
    if($img_name == "null"){
        $right_image = "";
    }else{
        $right_image = '<div class="intro-slide" data-hash="'.$link.'">
        						'.$label.'
	                            <img src="'.$image_src.'" alt="Image Desc">
		                    </div>';
    }
  return $right_image;
}

 ?>
<div class="container quickView-container">
	<div class="quickView-content">
		<div class="row">
			<div class="col-lg-7 col-md-6">
				<div class="row">
					<div class="product-left">
						<!-- <a href="#one" class="carousel-dot active">
							<img src="assets/images/products/single/fullwidth/1-big.jpg">
						</a>
						<a href="#two" class="carousel-dot">
							<img src="assets/images/products/single/fullwidth/2-big.jpg">
						</a>
						<a href="#three" class="carousel-dot">
							<img src="assets/images/products/single/fullwidth/3-big.jpg">
						</a>
						<a href="#four" class="carousel-dot">
							<img src="assets/images/products/single/fullwidth/4-big.jpg">
						</a> -->
						<?php
                           echo check_img_left($p_img_name1,$img_path,"one");
                           echo check_img_left($p_img_name2,$img_path,"two");
                           echo check_img_left($p_img_name3,$img_path,"three");
                           echo check_img_left($p_img_name4,$img_path,"four");                           
                         ?>
					</div>
					<div class="product-right">
						<div class="owl-carousel owl-theme owl-nav-inside owl-light mb-0" data-toggle="owl" data-owl-options='{
	                        "dots": false,
	                        "nav": false, 
	                        "URLhashListener": true,
	                        "responsive": {
	                            "900": {
	                                "nav": true,
	                                "dots": true
	                            }
	                        }
	                    }'>	                    
							<!-- <div class="intro-slide" data-hash="one">
	                            <img src="assets/images/products/single/fullwidth/1-big.jpg" alt="Image Desc">
		                    </div>
		                    <div class="intro-slide" data-hash="two">
	                            <img src="assets/images/products/single/fullwidth/2-big.jpg" alt="Image Desc">
                                </a>
		                    </div>
		                    <div class="intro-slide" data-hash="three">
	                            <img src="assets/images/products/single/fullwidth/3-big.jpg" alt="Image Desc">
                                </a>
		                    </div>
		                    <div class="intro-slide" data-hash="four">
	                            <img src="assets/images/products/single/fullwidth/4-big.jpg" alt="Image Desc">
                                </a>
		                    </div> -->
		                    <?php
		                       echo check_img_right($p_img_name1,$img_path,"one",$label);
	                           echo check_img_right($p_img_name2,$img_path,"two",$label);
	                           echo check_img_right($p_img_name3,$img_path,"three",$label);
	                           echo check_img_right($p_img_name4,$img_path,"four",$label);
	                         ?>

		                </div>

					</div>
                </div>
			</div>
			<div class="col-lg-5 col-md-6">
				<?php echo $p_bar; ?>
				<h2 class="product-title"><?php echo $p_name; ?></h2>
				<h3 class="product-price"><?php echo $p_amt; ?></h3>

                <p class="product-txt"><?php echo $p_des; ?></p>

	            

                <div class="product-details-action">
                	<a href="#" class="btn-product btn-wishlist <?php echo $wq_disable; ?>" id="add-to-wishlist-quick" data-p_id="<?php echo $pro_id; ?>"><span>Add to Wishlist</span></a>
                    <a href="#" class="btn-product btn-cart <?php echo $quick_cart_disable; ?>" id="add-to-cart-qview" data-p_id="<?php echo $pro_id; ?>" data-d_id="<?php echo $deal_id; ?>"><span>add to cart</span></a>
                </div>

                <div class="product-details-footer">
                    <div class="product-cat">
                        <span>Category:</span>
                        <a href="#"><?php echo $p_cat ?></a>
                    </div><!-- End .product-cat -->

                    <div class="social-icons social-icons-sm">
                        <span class="social-label">Share:</span>
                        <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                        <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                        <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                        <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                    </div>
                </div>
			</div>
		</div>
	</div>
</div>