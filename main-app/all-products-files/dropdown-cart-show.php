<?php 
//dropdown-cart-show.php
session_start();
require "../db_connnection.php";
require "products-functions.php";
if(isset($_SESSION['u_id'])){
	$user_id = $_SESSION['u_id'];
}else{
	$user_id ="";
}



if($user_id != ""){
	$get_cart_drowdown = "SELECT * FROM cart WHERE user_id = '{$user_id}'";
	$run_get_cart_drowdown = mysqli_query($conn, $get_cart_drowdown);
	if(mysqli_num_rows($run_get_cart_drowdown) > 0){

		while($row = mysqli_fetch_assoc($run_get_cart_drowdown)){
			
			$pro_id = $row['product_id'];
			$c_id 	= $row['ID'];
			$c_qty 	= $row['qty'];
			$p_s 	= 1;

			$get_pro_detail = "SELECT * FROM products WHERE ID = '{$pro_id}' AND p_status = '$p_s'";
			$run_get_pro_details = mysqli_query($conn, $get_pro_detail);

			if(mysqli_num_rows($run_get_pro_details) > 0){
				$fetch_pro = mysqli_fetch_assoc($run_get_pro_details);

				$p_id 		= $fetch_pro['ID'];
				$p_name 	= $fetch_pro['product_name'];
				$p_m_price 	= $fetch_pro['m_price'];
				$link 		= "product-view.php?p_id=".$p_id;
				$img_path 	= "../All-Products-images/";
				$img_src 	= $img_path.$fetch_pro['image_0'];

				echo $show = '<div class="product" id="ForRemove">
					        <div class="product-cart-details">
					            <h4 class="product-title">
					                <a href="'.$link.'">'.$p_name.'</a>
					            </h4>

					            <span class="cart-product-info">
					                <span class="cart-product-qty">Quantity - '.$c_qty.'</span>
					                <br>
					                <span class="cart-product-qty">Market Value - '.$p_m_price.'</span>
					            </span>
					        </div>

					        <figure class="product-image-container">
					            <a href="'.$link.'" class="product-image">
					                <img src="'.$img_src.'" alt="product">
					            </a>
					        </figure>
					        <a href="#" class="btn-remove" id="remove-cartlist" data-c_id="'.$c_id.'" title="Remove Product"><i class="icon-close"></i></a>
					    </div>';
				
			}else{
				echo "<h4>No Records Found.......!</h4>";
			}
		}
	}else{
		echo "<h5>No Product Added in Cart list.......!</h5>
		<p>Please <a href='productsvall.php'>Add Product</a> to Cart List.</p>";
	}
}else{
	echo "<h5>No Records Found.......!</h5>
			<p>Please <a href='#' id='login-cart'>Login</a> to Add to Cart List.</p>";
}



