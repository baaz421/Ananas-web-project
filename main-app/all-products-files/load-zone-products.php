<?php
// load-zone-products.php
session_start();
require "../db_connnection.php";
require "products-functions.php";
require "currency-set.php";
require "../../m-admin/deals-ajax-files/deals-functions.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(isset($_SESSION['u_id'])){
	$user_id = $_SESSION['u_id'];
	$country_iso = $_SESSION['u_iso'];
	$country_product = "AND d_country = '$country_iso'";
}else{
	$user_id ="";
	$country_product = "";
}


// <span class="product-label label-new">New</span>
// <span class="product-label label-sale">30% off</span>
// <span class="product-label label-out">Out of stock</span>
// <span class="product-label label-top">Top</span>

if(isset($_POST["limit"], $_POST["start"])){
	$zone = $_POST['z_name'];
 	
 	$sql = "SELECT * FROM deal WHERE zone = '{$zone}' AND deal_status = 1 $country_product ORDER BY zone DESC LIMIT ".$_POST["start"].", ".$_POST["limit"]."";
 	// echo $sql;

 	$result = mysqli_query($conn, $sql);

	 	while($row = mysqli_fetch_assoc($result)){

			// $p_id = $row['ID'];
			$p_id = $row['p_id'];	

			// check wishlist in database for user
			$w_disable =  DisableWishlistButton($user_id,$p_id,$conn);
			$cart_disable =  DisableCartButton($user_id,$p_id,$conn);			
					
			$deal_id = $row['DID']; // deal id
			$token_amt = $row['unit_price'];// unit price
			$label = "<span class='product-label label-new'>ON DEAL</span>";
			$p_bar = zoneProgress($deal_id,$conn,$date);
			$prod_price = "Unit Price:&nbsp&nbsp ".convertPrice($cur_rate,$token_amt);
			$c_disable = $cart_disable;

				$query = "SELECT * FROM products WHERE ID = $p_id";
	 			$result2 = mysqli_query($conn, $query);
		 		$p_row = mysqli_fetch_assoc($result2);
		 			$img_path ="../All-Products-images/";
					$img_src = $img_path.$p_row['image_0'];
					$p_cat = GetCatName($p_row['category_id'],$conn);
					$p_name =$p_row['product_name'];

			echo LoadProducts($label,$p_id,$img_src,$p_cat,$p_name,$p_bar,$prod_price,$w_disable,$c_disable,$deal_id);
		}
	
	
}
