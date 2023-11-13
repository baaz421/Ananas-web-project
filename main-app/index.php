<?php

$title_en = "Home";
$title_ar = "Arabic Home";
include "includes/indexHeader.php";
require "all-products-files/products-functions.php";
require "../m-admin/deals-ajax-files/deals-functions.php";
if(isset($_SESSION['u_id'])){
	$user_id = $_SESSION['u_id'];
	$country_iso = $_SESSION['u_iso'];
	$country_product = "AND d_country = '$country_iso'";
}else{
	$user_id ="";
	$country_product = "";
}

function matchCountryCurrency($c_id,$conn){
	$sql ="SELECT * FROM countries WHERE id = $c_id";
	$run = mysqli_query($conn, $sql);
	$fetch = mysqli_fetch_assoc($run);
	$c_name = $fetch['currency'];
	return $c_name;
}
function matchUserCurrency($id,$conn){
	if($id == ""){
		$user_currency = "USD";
	}else{
		$sql ="SELECT * FROM users WHERE id = $id";
		$run = mysqli_query($conn, $sql);
		$fetch = mysqli_fetch_assoc($run);
		$user_currency = $fetch['currency'];	
	}
	
	return $user_currency;
}


?>
<main class="main">
	<input type="text" id="u-id" value="<?php echo $user_id; ?>" hidden>
	<div class="mb-lg-2"></div><!-- End .mb-lg-2 --> 
	<!-- ==== Slider big banners starts here ==== -->  
	<?php
	$sql_get_banner = "SELECT * FROM banners WHERE b_status = 1";
	$run_sql_get_banner = mysqli_query($conn, $sql_get_banner);
	if(mysqli_num_rows($run_sql_get_banner) > 0){			
		?> 
		<div class="container-fluid">          
			<div class="row">        
				<div class="col-xl-9 col-xxl-10 offset-lg-3 offset-xxl-2">
					<div class="intro-slider-container slider-container-ratio mb-2">
						<div class="intro-slider owl-carousel owl-simple owl-nav-inside" data-toggle="owl" data-owl-options='{
							"nav": false, 
							"dots": true
						}'>


						<?php
						while($banner = mysqli_fetch_assoc($run_sql_get_banner)) {
							$view_country = matchCountryCurrency($banner['b_country'],$conn);
							$view_user_country = matchUserCurrency($user_id,$conn);
							if($view_user_country == $view_country){

								?>
								<div class="intro-slide">
									<figure class="slide-image">
										<picture>
											<source media="(max-width: 480px)" srcset="../m-admin/banner-ajax-files/banner-images/<?php echo $banner['mob_img']; ?>">
												<img src="../m-admin/banner-ajax-files/banner-images/<?php echo $banner['des_img']; ?>" alt="Image Desc">
											</picture>
										</figure><!-- End .slide-image -->

										<div class="intro-content">
											<h1 class="intro-title">
												<span><?php echo $banner['b_title']; ?></span>
											</h1><!-- End .intro-title -->

											<a href="product-view.php?p_id=<?php echo $banner['b_link']; ?>" class="btn btn-primary">
												<span>Discover Here</span>
												<i class="icon-long-arrow-right"></i>
											</a>
										</div><!-- End .intro-content -->
									</div><!-- End .intro-slide -->
									<?php
								}
							}
							?>
						</div><!-- End .intro-slider owl-carousel owl-simple -->

						<span class="slider-loader"></span><!-- End .slider-loader -->
					</div><!-- End .intro-slider-container -->
				</div><!-- End .col-xl-9 col-xxl-10 -->                    
			</div><!-- End .row -->            
		</div><!-- End .container-fluid -->
		<?php
	}
	?>
	<!-- ==== Slider big banners close here ==== -->          
	<div class="container-fluid">
		<div class="row">
			<div class="col-xl-9 col-xxl-10">
				<!-- ==== how its works starts here ==== -->
				<h2 class="title mb-4 text-center" >HOW IT WORKS ? Follow These Steps!</h2><!-- End .title text-center -->
				<div class="row justify-content-center">
					<div class="col-6 col-lg-3">
						<div class="icon-box icon-box-circle text-center">
							<span class="icon-box-icon">
								<i class="font-weight-bold">1</span></i>
							</span>
							<div class="icon-box-content">
								<h3 class="icon-box-title">REGISTER</h3><!-- End .icon-box-title -->
								<p>To start using our units, you’ll need to register. It’s completely free! </p>
							</div><!-- End .icon-box-content -->
						</div><!-- End .icon-box -->
					</div><!-- End .col-lg-3 col-sm-6 -->

					<div class="col-6 col-lg-3">
						<div class="icon-box icon-box-circle text-center">
							<span class="icon-box-icon">
								<i class="font-weight-bold">2</i>
							</span>
							<div class="icon-box-content">
								<h3 class="icon-box-title">GET UNITS</h3><!-- End .icon-box-title -->
								<p>You can instantly get units on a desired product right after registration.</p>
							</div><!-- End .icon-box-content -->
						</div><!-- End .icon-box -->
					</div><!-- End .col-lg-3 col-sm-6 -->

					<div class="col-6 col-lg-3">
						<div class="icon-box icon-box-circle text-center">
							<span class="icon-box-icon">
								<i class="font-weight-bold">3</i>
							</span>
							<div class="icon-box-content">
								<h3 class="icon-box-title">SUBMIT AN UNITS</h3><!-- End .icon-box-title -->
								<p>Submitting a units is fast and easy. The process takes winthin a minute.</p>
							</div><!-- End .icon-box-content -->
						</div><!-- End .icon-box -->
					</div><!-- End .col-lg-3 col-sm-6 -->

					<div class="col-6 col-lg-3">
						<div class="icon-box icon-box-circle text-center">
							<span class="icon-box-icon">
								<i class="font-weight-bold">4</i>
							</span>
							<div class="icon-box-content">
								<h3 class="icon-box-title">WIN</h3><!-- End .icon-box-title -->
								<p>Easily win at our site and enjoy owning the product you dream of.</p>
							</div><!-- End .icon-box-content -->
						</div><!-- End .icon-box -->
					</div><!-- End .col-lg-3 col-sm-6 -->
				</div><!-- End .row -->
				<!-- ==== how its works close here ==== -->
				<div class="mb-3"></div><!-- End .mb-3 -->
				<!-- ==== green zone products start here ==== -->
					<?php
					$get_deal_by_zone = GetDealDataByZone($conn, 'green', $country_product);
						if(mysqli_num_rows($get_deal_by_zone) > 0){
							$w_id = 1;
					?>
					<div class="row cat-banner-row electronics">
						<div class="col-xl-12 col-xxl-12">
							<h2 class="title rounded-pill text-center bg-success p-2 ml-auto mr-auto text-white ">GREEN ZONE PRODUCTS</h2>
							<div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl" 
								data-owl-options='{
									"nav": true, 
									"dots": false,
									"margin": 20,
									"loop": false,
									"responsive": {
										"0": {
											"items":2
										},
										"480": {
											"items":2
										},
										"768": {
											"items":3
										},
										"992": {
											"items":4
										},
										"1200": {
											"items":3
										},
										"1600": {
											"items":4
										}
									}
								}'>
							<!-- ==== green zone single product start here ==== -->

								<?php
									while($row = mysqli_fetch_array($get_deal_by_zone)){
										$pro_id               = $row['p_id'];
										$deal_id              = $row['DID'];
										$get_product_data     = GetProductData($conn, $pro_id);//connecting database
										$fetch_poduct_data    = mysqli_fetch_assoc($get_product_data);
										$img_path             ="../All-Products-images/";
										$img_src              = $img_path.$fetch_poduct_data['image_0'];
										$p_cat                = GetCatName($fetch_poduct_data['category_id'],$conn);
										$p_name               = $fetch_poduct_data['product_name'];
										$u_price              = $row['unit_price'];
										$bc_disable           = DisableCartButton($user_id,$pro_id,$conn);
										$bw_disable           = DisableWishlistButton($user_id,$pro_id,$conn);
								?>
									<div class="product text-center">
										<figure class="product-media">
											<!-- <span class="product-label label-top">Top</span> -->
											<!-- <span class="product-label label-sale">Sale</span> -->
											<span class="product-label label-new">Green Zone</span>
											<a href="product-view.php?p_id=<?php echo $pro_id; ?>">
												<img src="<?php echo $img_src; ?>" alt="Product image" class="product-image">
											</a>

											<div class="product-action-vertical">
												<a href="#" class="btn-product-icon btn-wishlist <?php echo $bw_disable; ?>" title="Add to wishlist" id="wishlist-buttom-g<?php echo $w_id; ?>" data-pro_id="<?php echo $pro_id; ?>"><span>add to wishlist</span></a>
												<a href="quickview.php?p_id=<?php echo $pro_id; ?>" class="btn-product-icon btn-quickview q-view" title="Quick view"><span>Quick view</span></a>
											</div><!-- End .product-action-vertical -->

											<div class="product-action">
												<a href="#" class="btn-product btn-cart <?php echo $bc_disable; ?>" id="cart-buttom-g<?php echo $w_id; ?>" data-pro_id="<?php echo $pro_id; ?>" data-deal_id="<?php echo $deal_id; ?>" title="Add to cart"><span>add to cart</span></a>
											</div><!-- End .product-action -->
										</figure><!-- End .product-media -->

										<div class="product-body">
											<div class="product-cat">
												<a href="#"><?php echo $p_cat; ?></a>
											</div><!-- End .product-cat -->
											<h3 class="product-title"><a href="product-view.php?p_id=<?php echo $pro_id; ?>"><?php echo $p_name; ?></a></h3><!-- End .product-title -->
											<div class="product-price font-weight-bold">
												UNIT PRICE:&nbsp&nbsp <?php echo convertPrice($cur_rate,$u_price); ?>
											</div><!-- End .product-price -->
											<?php echo zoneProgress($deal_id,$conn,$date)?>
										</div><!-- End .product-body -->
									</div><!-- End .product -->
								<?php
										$w_id ++;
									}
								?>
							<!-- ==== green zone single product close here ==== -->
							</div><!-- End .owl-carousel -->
						</div><!-- End .col-xl-10 -->
					</div><!-- End .row cat-banner-row -->
					<?php
						}else{
						// echo"no green zone products found";
						}        
					?>
				<!-- ==== green zone products close here ==== -->
				<div class="mb-3"></div><!-- End .mb-3 -->
				<!-- ==== orange zone products start here ==== -->
					<?php
					$get_deal_by_zone = GetDealDataByZone($conn, 'orange', $country_product);
					if(mysqli_num_rows($get_deal_by_zone) > 0){
						$w_id = 1;
						?>
						<div class="row cat-banner-row furniture"> 
							<div class="col-xl-12 col-xxl-12">
								<h2 class="title rounded-pill text-center bg-primary p-2 ml-auto mr-auto text-white ">ORANGE ZONE PRODUCTS</h2>
								<div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl" 
								data-owl-options='{
									"nav": true, 
									"dots": false,
									"margin": 20,
									"loop": false,
									"responsive": {
										"0": {
											"items":2
										},
										"480": {
											"items":2
										},
										"768": {
											"items":3
										},
										"992": {
											"items":4
										},
										"1200": {
											"items":3
										},
										"1600": {
											"items":4
										}
									}
								}'>
								<!-- ==== orange zone single product start here ==== -->

								<?php
								while($row = mysqli_fetch_array($get_deal_by_zone)){
									$pro_id               = $row['p_id'];
									$deal_id              = $row['DID'];
										$get_product_data     = GetProductData($conn, $pro_id);//connecting database
										$fetch_poduct_data    = mysqli_fetch_assoc($get_product_data);
										$img_path             ="../All-Products-images/";
										$img_src              = $img_path.$fetch_poduct_data['image_0'];
										$p_cat                = GetCatName($fetch_poduct_data['category_id'],$conn);
										$p_name               =$fetch_poduct_data['product_name'];
										$u_price              =$row['unit_price'];
										$bc_disable           = DisableCartButton($user_id,$pro_id,$conn);
										$bw_disable           = DisableWishlistButton($user_id,$pro_id,$conn);
										?>
										<div class="product text-center">
											<figure class="product-media">
												<!-- <span class="product-label label-top">Orange Zone</span> -->
												<!-- <span class="product-label label-sale bg-primary">Orange Zone</span> -->
												<span class="product-label label-secondary">Orange Zone</span>
												<!-- <span class="product-label label-new">Orange Zone</span>-->
												<a href="product-view.php?p_id=<?php echo $pro_id; ?>">
													<img src="<?php echo $img_src; ?>" alt="Product image" class="product-image">
												</a>

												<div class="product-action-vertical">
													<a href="#" class="btn-product-icon btn-wishlist <?php echo $bw_disable; ?>" title="Add to wishlist" id="wishlist-buttom-o<?php echo $w_id; ?>" data-pro_id="<?php echo $pro_id; ?>"><span>add to wishlist</span></a>
													<a href="quickview.php?p_id=<?php echo $pro_id; ?>" class="btn-product-icon btn-quickview q-view" title="Quick view"><span>Quick view</span></a>
												</div><!-- End .product-action-vertical -->

												<div class="product-action">
													<a href="#" class="btn-product btn-cart <?php echo $bc_disable; ?>" id="cart-buttom-o<?php echo $w_id; ?>" data-pro_id="<?php echo $pro_id; ?>" data-deal_id="<?php echo $deal_id; ?>" title="Add to cart"><span>add to cart</span></a>
												</div><!-- End .product-action -->
											</figure><!-- End .product-media -->

											<div class="product-body">
												<div class="product-cat">
													<a href="#"><?php echo $p_cat; ?></a>
												</div><!-- End .product-cat -->
												<h3 class="product-title"><a href="product-view.php?p_id=<?php echo $pro_id; ?>"><?php echo $p_name; ?></a></h3><!-- End .product-title -->
												<div class="product-price font-weight-bold">
													UNIT PRICE:&nbsp&nbsp <?php echo convertPrice($cur_rate,$u_price); ?>
												</div><!-- End .product-price -->
												<?php echo zoneProgress($deal_id,$conn,$date)?>
											</div><!-- End .product-body -->
										</div><!-- End .product -->
										<?php
										$w_id ++;
									}
									?>
									<!-- ==== orange zone single product close here ==== -->
								</div><!-- End .owl-carousel -->
							</div><!-- End .col-xl-10 -->
						</div><!-- End .row cat-banner-row -->
						<?php
					}else{
							// echo"no orange zone products found";
					}        
					?>
				<!-- ==== orange zone products close here ==== -->
				<div class="mb-3"></div><!-- End .mb-3 -->
				<!-- ==== red zone products start here ==== -->
					<?php
					$get_deal_by_zone = GetDealDataByZone($conn, 'red', $country_product);
					if(mysqli_num_rows($get_deal_by_zone) > 0){
						$w_id = 1;
						?>
						<div class="row cat-banner-row clothing">
							<div class="col-xl-12 col-xxl-12">
								<h2 class="title rounded-pill text-center bg-danger p-2 ml-auto mr-auto text-white ">RED ZONE PRODUCTS</h2>
								<div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl" 
								data-owl-options='{
									"nav": true, 
									"dots": false,
									"margin": 20,
									"loop": false,
									"responsive": {
										"0": {
											"items":2
										},
										"480": {
											"items":2
										},
										"768": {
											"items":3
										},
										"992": {
											"items":4
										},
										"1200": {
											"items":3
										},
										"1600": {
											"items":4
										}
									}
								}'>
								<!-- ==== red zone single product start here ==== -->

								<?php
								while($row = mysqli_fetch_array($get_deal_by_zone)){
									$pro_id               = $row['p_id'];
									$deal_id              = $row['DID'];
										$get_product_data     = GetProductData($conn, $pro_id);//connecting database
										$fetch_poduct_data    = mysqli_fetch_assoc($get_product_data);
										$img_path             ="../All-Products-images/";
										$img_src              = $img_path.$fetch_poduct_data['image_0'];
										$p_cat                = GetCatName($fetch_poduct_data['category_id'],$conn);
										$p_name               =$fetch_poduct_data['product_name'];
										$u_price              =$row['unit_price'];
										$bc_disable           = DisableCartButton($user_id,$pro_id,$conn);
										$bw_disable           = DisableWishlistButton($user_id,$pro_id,$conn);
										?>
										<div class="product text-center">
											<figure class="product-media">
												<!-- <span class="product-label label-top">Red Zone</span> -->
												<span class="product-label label-sale">Red Zone</span>
												<!-- <span class="product-label label-new bg-danger">Red Zone</span> -->
												<a href="product-view.php?p_id=<?php echo $pro_id; ?>">
													<img src="<?php echo $img_src; ?>" alt="Product image" class="product-image">
												</a>

												<div class="product-action-vertical">
													<a href="#" class="btn-product-icon btn-wishlist <?php echo $bw_disable; ?>" title="Add to wishlist" id="wishlist-buttom-r<?php echo $w_id; ?>" data-pro_id="<?php echo $pro_id; ?>"><span>add to wishlist</span></a>
													<a href="quickview.php?p_id=<?php echo $pro_id; ?>" class="btn-product-icon btn-quickview q-view" title="Quick view"><span>Quick view</span></a>
												</div><!-- End .product-action-vertical -->

												<div class="product-action">
													<a href="#" class="btn-product btn-cart <?php echo $bc_disable; ?>" id="cart-buttom-r<?php echo $w_id; ?>" data-pro_id="<?php echo $pro_id; ?>" data-deal_id="<?php echo $deal_id; ?>" title="Add to cart"><span>add to cart</span></a>
												</div><!-- End .product-action -->
											</figure><!-- End .product-media -->

											<div class="product-body">
												<div class="product-cat">
													<a href="#"><?php echo $p_cat; ?></a>
												</div><!-- End .product-cat -->
												<h3 class="product-title"><a href="product-view.php?p_id=<?php echo $pro_id; ?>"><?php echo $p_name; ?></a></h3><!-- End .product-title -->
												<div class="product-price font-weight-bold">
													UNIT PRICE:&nbsp&nbsp <?php echo convertPrice($cur_rate,$u_price) ?>
												</div><!-- End .product-price -->
												<?php echo zoneProgress($deal_id,$conn,$date)?>
											</div><!-- End .product-body -->
										</div><!-- End .product -->
										<?php
										$w_id ++;
									}
									?>
									<!-- ==== red zone single product close here ==== -->
								</div><!-- End .owl-carousel -->
							</div><!-- End .col-xl-9 -->
						</div><!-- End .row cat-banner-row -->
						<?php
					}else{
							// echo"no red zone products found";
					}        
					?>
				<!-- ==== red zone products close here ==== -->
				<div class="mb-3"></div><!-- End .mb-3 -->
				<!-- ==== ribbon start here ==== -->
					<div class="icon-boxes-container">
						<div class="container-fluid">
							<div class="row">
								<div class="col-6 col-lg-3">
									<div class="icon-box icon-box-side">
										<span class="icon-box-icon text-dark">
											<i class="icon-rocket"></i>
										</span>
										<div class="icon-box-content">
											<h3 class="icon-box-title">Free Shipping</h3><!-- End .icon-box-title -->
											<p>Orders $50 or more</p>
										</div><!-- End .icon-box-content -->
									</div><!-- End .icon-box -->
								</div><!-- End .col-sm-6 col-lg-3 -->

								<div class="col-6 col-lg-3">
									<div class="icon-box icon-box-side">
										<span class="icon-box-icon text-dark">
											<i class="icon-rotate-left"></i>
										</span>

										<div class="icon-box-content">
											<h3 class="icon-box-title">Free Returns</h3><!-- End .icon-box-title -->
											<p>Within 30 days</p>
										</div><!-- End .icon-box-content -->
									</div><!-- End .icon-box -->
								</div><!-- End .col-sm-6 col-lg-3 -->

								<div class="col-6 col-lg-3">
									<div class="icon-box icon-box-side">
										<span class="icon-box-icon text-dark">
											<i class="icon-info-circle"></i>
										</span>

										<div class="icon-box-content">
											<h3 class="icon-box-title">Get 20% Off 1 Item</h3><!-- End .icon-box-title -->
											<p>When you sign up</p>
										</div><!-- End .icon-box-content -->
									</div><!-- End .icon-box -->
								</div><!-- End .col-sm-6 col-lg-3 -->

								<div class="col-6 col-lg-3">
									<div class="icon-box icon-box-side">
										<span class="icon-box-icon text-dark">
											<i class="icon-life-ring"></i>
										</span>

										<div class="icon-box-content">
											<h3 class="icon-box-title">We Support</h3><!-- End .icon-box-title -->
											<p>24/7 amazing services</p>
										</div><!-- End .icon-box-content -->
									</div><!-- End .icon-box -->
								</div><!-- End .col-sm-6 col-lg-3 -->
							</div><!-- End .row -->
						</div><!-- End .container-fluid -->
					</div><!-- End .icon-boxes-container -->
				<!-- ==== ribbon close here ==== -->
				<div class="mb-5"></div><!-- End .mb-5 -->
			</div><!-- End .col-lg-9 col-xxl-10 -->
			<!-- ==== side banners and content starts here ==== -->
				<aside class="col-xl-3 col-xxl-2 order-xl-first">
					<div class="sidebar sidebar-home">                            
						<div class="row">
							<!-- ==== side winner board starts here ==== -->
								<div id="winner-details" class="col-sm-6 col-xl-12">
									<div class="widget widget-products">
										<h4 class="widget-title"><span> Recent Winners </span></h4><!-- End .widget-title -->

										<div class="products">
											<?php
											$sql_get_deal_data = "SELECT * FROM deal WHERE winner_id != '' $country_product ORDER BY STR_TO_DATE(update_time, '%d-%m-%Y %H:%i') DESC LIMIT 4"; 
											$run_sql_get_deal_data = mysqli_query($conn,$sql_get_deal_data);
											if(mysqli_num_rows($run_sql_get_deal_data) > 0){
												while($row = mysqli_fetch_assoc($run_sql_get_deal_data)){
													$product_id     = $row['p_id'];
													$sql_get_product_details = "SELECT * FROM products WHERE ID = $product_id ";
													$run_sql_get_product_details = mysqli_query($conn, $sql_get_product_details);
													$get_pro = mysqli_fetch_assoc($run_sql_get_product_details);
																// $winner_date     = $row['EndDate'];
													$winner_date    = $row['update_time'];
													$convert_date   = strtotime($winner_date);
													$img_name       = $get_pro['image_0'];
													$pro_link       = "product-view.php?p_id=".$product_id;
													$code           = date("Ymd",$convert_date);
													$user_info      = "User-ID -".$code.$row['winner_id'];
													$unit_price     =convertPrice($cur_rate,$row['unit_price']);        
													$closing_time   = date("jS \of F Y",$convert_date);
													echo winner_small_product_show($img_name,$pro_link,$user_info,$unit_price,$closing_time);
												}
											}
											function winner_small_product_show($img_name,$pro_link,$user_info,$unit_price,$closing_time){
																// $img_src = "assets/images/demos/demo-14/products/small/".$img_name;
												$img_src = "../All-Products-images/".$img_name;
												$show = "
												<div class='product product-sm'>
												<figure class='product-media'>
												<a href='{$pro_link}'>
												<img src='{$img_src}' alt='Product image' class='product-image'>
												</a>
												</figure>
												<div class='product-body'>
												<h5 class='product-title'><a href='{$pro_link}'>{$user_info}</a></h5>
												<div class='product-price'>Unit Price:&nbsp&nbsp {$unit_price}</div>
												<div class='product-title'>{$closing_time}</div>
												</div>
												</div>
												";
												return $show;
											}                               
											?>

										</div><!-- End .products -->
									</div><!-- End .widget widget-products -->
								</div><!-- End .col-sm-6 col-xl-12 -->
							<!-- ==== side winner board close here ==== -->
							<!-- ==== side countdown product starts here ==== -->
								<div class="col-12">
									<div class="widget widget-deals">														
										<?php 
											// $get_deal_by_zone = GetDealDataByZone($conn, 'red');
											$get_deal_by_zone = GetEndDealData($conn, 'green', $country_product);
											if(mysqli_num_rows($get_deal_by_zone) > 0){
											$w_id = 1;
											while($row = mysqli_fetch_array($get_deal_by_zone)){
											$green_end_date = $row['e_time_green'];
											$given_end_date=date_create($green_end_date);
											date_sub($given_end_date,date_interval_create_from_date_string("1 days"));
											$one_day_minus = date_format($given_end_date,"d-m-Y H:i");
											$a = strtotime($one_day_minus);
											$b = strtotime($green_end_date);
											$c = strtotime($date);
											if($c >= $a && $c <= $b){																				
											$pro_id               = $row['p_id'];
											$deal_id              = $row['DID'];
											$end_date             = $row['e_time_green'];
											// $end_date             = "30-11-2022 04:00";
											// $end_date             = $row['e_time_red'];
											$get_product_data     = GetProductData($conn, $pro_id);//connecting database
											$fetch_poduct_data    = mysqli_fetch_assoc($get_product_data);
											$img_path             ="../All-Products-images/";
											$img_src              = $img_path.$fetch_poduct_data['image_0'];
											$p_cat                = GetCatName($fetch_poduct_data['category_id'],$conn);
											$p_name               =$fetch_poduct_data['product_name'];
											$u_price              =$row['unit_price'];
											$bc_disable           = DisableCartButton($user_id,$pro_id,$conn);
											$bw_disable           = DisableWishlistButton($user_id,$pro_id,$conn);

											$datetime1 = new DateTime($date);
											$datetime2 = new DateTime($end_date);
											$interval = $datetime1->diff($datetime2);
											// $days = $interval->format('%d');                              
											// $hour = $interval->format('%h');
											// $minutes = $interval->format('%i');
											$total_hours = $interval->days * 24 + $interval->h;
											$minutes = $interval->i;
											$count_down_time = "+".$total_hours."h,+".$minutes."m";

											// echo $interval->format('%h')." Hours ".$interval->format('%i')." Minutes";

											// $hourdiff = round((strtotime($end_date) - strtotime($date))/3600);

										?>
										<h4 class="widget-title"><span>Finishig Deals</span></h4><!-- End .widget-title -->
										<div class="row">
											<div class="col-sm-6 col-xl-12">
												<div class="product text-center">
													<figure class="product-media p-0">
														<span class="product-label label-new">Ending Deal</span>
														<a href="product-view.php?p_id=<?php echo $pro_id; ?>">
															<img src="<?php echo $img_src; ?>" alt="Product image" class="product-image">
														</a>

														<div class="product-action-vertical">
															<a href="#" class="btn-product-icon btn-wishlist <?php echo $bw_disable; ?>" title="Add to wishlist" id="wishlist-buttom-fd<?php echo $w_id; ?>" data-pro_id="<?php echo $pro_id; ?>"><span>add to wishlist</span></a>
															<a href="quickview.php?p_id=<?php echo $pro_id; ?>" class="btn-product-icon btn-quickview q-view" title="Quick view"><span>Quick view</span></a>
														</div><!-- End .product-action-vertical -->

														<div class="product-action">
															<a href="#" class="btn-product btn-cart <?php echo $bc_disable; ?>" id="cart-buttom-fd<?php echo $w_id; ?>" data-pro_id="<?php echo $pro_id; ?>" data-deal_id="<?php echo $deal_id; ?>" title="Add to cart"><span>add to cart</span></a>
														</div><!-- End .product-action -->
													</figure><!-- End .product-media -->

													<div class="product-body" style="margin-bottom: -40px">
														<div class="product-cat mb-0">
															<a href="#"><?php echo $p_cat; ?></a>
														</div><!-- End .product-cat -->
														<h3 class="product-title mt-0"><a href="product-view.php?p_id=<?php echo $pro_id; ?>"><?php echo $p_name; ?></a></h3><!-- End .product-title -->
														<div class="product-price">
															<span class="new-price">UNIT PRICE:&nbsp&nbsp <?php echo convertPrice($cur_rate,$u_price); ?></span>
														</div><!-- End .product-price -->
													</div><!-- End .product-body -->

													<div class="product-countdown" data-until="<?php echo $count_down_time;?>" data-relative="true" data-labels-short="true" style="margin-bottom: -20px">
													</div><!-- End .product-countdown -->
												</div><!-- End .product -->
											</div><!-- End .col-sm-6 col-xl-12 -->
										<?php
												$w_id ++;
												}														
											}
										?>
											<!-- ==== product 1 close here ==== -->
										</div><!-- End .row -->

										<?php
										}        
										?>

									</div><!-- End .widget widget-deals -->
								</div><!-- End .col-sm-6 col-lg-xl -->
							<!-- ==== side countdown product close here ==== -->
						</div><!-- End .row -->
					</div><!-- End .sidebar sidebar-home -->
				</aside><!-- End .col-lg-3 col-xxl-2 -->
			<!-- ==== side banners and content close here ==== -->
		</div><!-- End .row -->
	</div><!-- End .container-fluid -->
</main><!-- End .main -->

<!-- ERROR MESSAGE DIV-->
<div id="error-message">
</div>
<div id="success-message">
</div>
<!-- ERROR MESSAGE DIV CLOSE-->
				


<?php
include "includes/indexFooter.php"

?>

<script src="home-page-ajax/whishlist-ajax.js"></script>
<script src="home-page-ajax/add-to-cart-ajax.js?v=1"></script>

<script type="text/javascript">
	
</script>