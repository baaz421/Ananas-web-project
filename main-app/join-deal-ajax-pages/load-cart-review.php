<?php 
// load-cart-review.php
session_start();
require_once "../db_connnection.php";
require "../all-products-files/products-functions.php";
require "../all-products-files/currency-set.php";

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
		$c_id 	= $row['ID'];
		$u_price 	= $row['unit_price'];
		$to_price  = $row['total'];
		$p_s = 1;

		$get_pro_detail = "SELECT * FROM products WHERE ID = '{$pro_id}' AND p_status = '$p_s'";
		$run_get_pro_details = mysqli_query($conn, $get_pro_detail);

		if(mysqli_num_rows($run_get_pro_details) > 0){
			$fetch_pro = mysqli_fetch_assoc($run_get_pro_details);
			$p_id = $fetch_pro['ID'];
			$p_name =$fetch_pro['product_name'];
			$link = "product-view.php?p_id=".$p_id; 

			echo "<tr>
				<td><a href='$link'>$p_name</a></td>
				<td class='text-center'>".convertPrice($cur_rate,$u_price)."</td>
				<td class='text-center'>$c_qty</td>
				<td>".convertPrice($cur_rate,$to_price)."</td>
				
			</tr>";

		}// inside while loop if condition
	
	}//while loop end 
}else{
	echo "cart is empty";
}


