<?php 
// cart-page.php
session_start();
require "../db_connnection.php";
require "products-functions.php";
require "currency-set.php";
if(isset($_SESSION['u_id'])){
	$user_id = $_SESSION['u_id'];
}else{
	$user_id ="";
}


$get_Cartlist = "SELECT * FROM cart WHERE user_id = '{$user_id}'";
$run_get_Cartlist = mysqli_query($conn, $get_Cartlist);
if(mysqli_num_rows($run_get_Cartlist) > 0){
  $sub_total = 0;
  while($row = mysqli_fetch_assoc($run_get_Cartlist)){
		
		$pro_id = $row['product_id'];
		$c_qty 	= $row['qty'];
		$c_id = $row['ID'];		
		$p_amt = $row['unit_price'];
    $total_amount = $row['total'];
		$p_s = 1;

		$get_pro_detail = "SELECT * FROM products WHERE ID = '{$pro_id}' AND p_status = '$p_s'";
		$run_get_pro_details = mysqli_query($conn, $get_pro_detail);

		if(mysqli_num_rows($run_get_pro_details) > 0){
			$fetch_pro = mysqli_fetch_assoc($run_get_pro_details);

			$p_id = $fetch_pro['ID'];
			$p_name =$fetch_pro['product_name'];
			$link = "product-view.php?p_id=".$p_id;
			
			$img_path ="../All-Products-images/";
			$img_src = $img_path.$fetch_pro['image_0'];

      

			//echo CartTable($link,$img_src,$p_name,$p_amt,$c_qty,$c_id);
	echo '
	<tr>
	    <td class="product-col">
	        <div class="product">
	            <figure class="product-media">
	                <a href="'.$link.'">
	                    <img src="'.$img_src.'" alt="Product image">
	                </a>
	            </figure>

	            <h3 class="product-title">
	                <a href="'.$link.'">'.$p_name.'</a>
	            </h3>
	        </div>
	    </td>
	    <td class="price-col" id="cart-id" data-cart_id="'.$c_id.'">'.convertPrice($cur_rate,$p_amt).'</td>
	    
	    <td class="quantity-col">	     
	      	<div class="number">
				<span class="minus minus-span" data-cart_id="'.$c_id.'">
					<h5 class="plus-minus-text">-</h5>
				</span>
				<input class="input-num-format" id="cart-qty" type="text" value="'.$c_qty.'"/>
				<span class="plus minus-span" data-cart_id="'.$c_id.'">
					<h5 class="plus-minus-text">+</h5>
				</span>
			</div>	      
	    </td>
	    <td class="total-col text-center" id="total-col">
	    	<input type="text" id="total-amount" value="'.$total_amount.'" hidden />
	    		'.convertPrice($cur_rate,$total_amount).'
	    </td>
	    
	    <td class="remove-col">
	    	<button class="btn-remove" id="remove-cart-list" data-c_id='.$c_id.'>
	    		<i class="icon-close"></i>
	    	</button>
	    </td>
	</tr>
	';
			

		}// inside while loop if condition
	
	}//while loop end 
	

}else{
	echo "<h3>No records found.......!</h3>";
}

?>

