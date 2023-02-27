<?php
//wishlist-page.php
// out-of-stock
// in-stock
session_start();
require "../db_connnection.php";
require "products-functions.php";
if(isset($_SESSION['u_id'])){
	$user_id = $_SESSION['u_id'];
}else{
	$user_id ="";
}


$get_wishlist = "SELECT * FROM wishlist WHERE user_id = '{$user_id}'";
$run_get_wishlist = mysqli_query($conn, $get_wishlist);
if(mysqli_num_rows($run_get_wishlist) > 0){

	while($row = mysqli_fetch_assoc($run_get_wishlist)){
		
		$pro_id = $row['product_id'];
		$w_id = $row['ID'];

		$p_s = 1;

		$get_pro_detail = "SELECT * FROM products WHERE ID = '{$pro_id}' AND p_status = '$p_s'";
		$run_get_pro_details = mysqli_query($conn, $get_pro_detail);

		if(mysqli_num_rows($run_get_pro_details) > 0){
			$fetch_pro = mysqli_fetch_assoc($run_get_pro_details);

			$p_id = $fetch_pro['ID'];
			$p_name =$fetch_pro['product_name'].$w_id;

			$link = "product-view.php?p_id=".$p_id;

			$img_path ="../All-Products-images/";
			$img_src = $img_path.$fetch_pro['image_0'];
			



			$check_pro_deal = "SELECT * FROM deal WHERE p_id ='$p_id'";
			$run_check_pro_deal = mysqli_query($conn, $check_pro_deal);
				if(mysqli_num_rows($run_check_pro_deal) > 0){
					while($deal_check = mysqli_fetch_assoc($run_check_pro_deal)){
						$disable_cart_btn = DisableCartButton($user_id,$p_id,$conn);
						if($deal_check['deal_status'] == 1){
							$deal_id = $deal_check['DID'];
							$status = "<span class='in-stock'>ON DEAL</span>";
							$cart_btn ="
								<button class='btn btn-block btn-outline-primary-2 $disable_cart_btn' id='add-cart-wish' data-deal_id='$deal_id' data-p_id='$p_id'>
									<i class='icon-cart-plus'></i>ADD TO CART
								</button>";
						}else{
							$status = "<span class='out-of-stock'>UPCOMING</span>";
							$cart_btn="";
						}
					}
				}else{
					$status = "<span class='in-stock'>UPCOMING</span>";
				}
			echo wishlistTable($link,$img_src,$p_name,$status,$w_id,$cart_btn);
		}
		
	}

}else{
	echo "<h3>No records found.......!</h3>";
}



