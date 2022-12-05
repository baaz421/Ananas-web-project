<?php
// load-categories-product.php
session_start();
require "../db_connnection.php";
require "products-functions.php";
require "../../m-admin/deals-ajax-files/deals-functions.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(isset($_SESSION['u_id'])){
	$user_id = $_SESSION['u_id'];
}else{
	$user_id ="";
}


// <span class="product-label label-new">New</span>
// <span class="product-label label-sale">30% off</span>
// <span class="product-label label-out">Out of stock</span>
// <span class="product-label label-top">Top</span>

if(isset($_POST["limit"], $_POST["start"])){

 	$cat_id = $_POST['cat_id'];
 	$query = "SELECT * FROM products WHERE p_status = '1' AND category_id = $cat_id  ORDER BY ID DESC LIMIT ".$_POST["start"].", ".$_POST["limit"]."";
 	$result = mysqli_query($conn, $query);
	 	while($row = mysqli_fetch_array($result)){



		$p_id = $row['ID'];
		$img_path ="../All-Products-images/";
		$img_src = $img_path.$row['image_0'];
		$p_cat = GetCatName($row['category_id'],$conn);
		$p_name =$row['product_name'];
		$p_amt =$row['m_price'];

		// check wishlist in database for user
		$w_disable =  DisableWishlistButton($user_id,$p_id,$conn);
		$cart_disable =  DisableCartButton($user_id,$p_id,$conn);

		$check_pro_deal = "SELECT * FROM deal WHERE p_id ='$p_id'";
		$run_check_pro_deal = mysqli_query($conn, $check_pro_deal);
		// check in deal database for running or not
		if(mysqli_num_rows($run_check_pro_deal) > 0){
			while($deal_check = mysqli_fetch_assoc($run_check_pro_deal)){
				if($deal_check['deal_status'] == 1){
					$deal_id = $deal_check['DID']; // deal id
					$token_amt = $deal_check['unit_price'];// unit price
					$label = "<span class='product-label label-new'>ON DEAL</span>";
					$p_bar = zoneProgress($deal_id,$conn,$date);
					$prod_price = "Token Price: ".$token_amt;
					$c_disable = $cart_disable;
					// $p_bar = progressBarHtml();
				}else{
					$label = "<span class='product-label label-top'>UPCOMING DEAL</span>";
					$p_bar = "";
					$prod_price = "Market Price: ".$p_amt;
					$c_disable = "isDisabled";
					$deal_id = 0;
				}
			}
		}else{
				$label = "<span class='product-label label-top'>UPCOMING DEAL</span>";
				$p_bar = "";
				$prod_price = "Market Price: ".$p_amt;
				$c_disable = "isDisabled";
				$deal_id = 0;
			}
		
		

		echo LoadProducts($label,$p_id,$img_src,$p_cat,$p_name,$p_bar,$prod_price,$w_disable,$c_disable,$deal_id);


		}
	
}