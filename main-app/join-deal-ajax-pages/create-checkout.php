<?php
// create-checkout.php
session_start();
require_once "../db_connnection.php";

if(isset($_SESSION['u_id'])){
	$user_id = $_SESSION['u_id'];
	$status  = 0;
	$coupon_per = 0;
	$check_row = "SELECT * FROM checkout WHERE user_id = {$user_id} AND status = {$status}";
	$run_check_row = mysqli_query($conn, $check_row);

	if(mysqli_num_rows($run_check_row) > 0){
		$fetch_order_id 	= mysqli_fetch_assoc($run_check_row);
		$checkout_id 		= $fetch_order_id['ID'];
		$cou_per 			= $fetch_order_id['coupon_per'];		
		$deal_ids 			= combineDeal($conn,$user_id);
		$deal_qtys 			= combineQty($conn,$user_id);
		$sub_total 			= SubTotal($conn,$user_id);
		if($cou_per == 0){
			$total 	= $sub_total;
		}else{
			$discount_amount 	= $sub_total / 100 * $cou_per;
			$total 				= $sub_total-$discount_amount;
		}
		$update_checkout = "UPDATE checkout SET 
		deal_ids 	= '{$deal_ids}', 
		deal_qtys 	= '{$deal_qtys}',
		sub_total 	= '{$sub_total}',
		total 		= '{$total}'
		WHERE ID = $checkout_id";
		mysqli_query($conn,$update_checkout);
		$_SESSION['checkout_id'] = $checkout_id ;
		echo 1;
	}else{
		$deal_ids 			= combineDeal($conn,$user_id);
		$deal_qtys 			= combineQty($conn,$user_id);
		$sub_total 			= SubTotal($conn,$user_id);

		$create_row_checkout = "INSERT INTO checkout(user_id, deal_ids, deal_qtys, coupon_per, sub_total, total, status) VALUES('{$user_id}','{$deal_ids}','{$deal_qtys}','{$coupon_per}','{$sub_total}','{$sub_total}','{$status}')";
		$run_create_row_checkout = mysqli_query($conn, $create_row_checkout);
		if($run_create_row_checkout){
			$last_id_get = mysqli_insert_id($conn);
			$_SESSION['checkout_id'] = $last_id_get;
			echo 1;
		}else{
			echo 2;
		}
	}
}else{
	echo 2;
}


function combineDeal($conn,$user_id){
	$get_Cartlist = "SELECT * FROM cart WHERE user_id = '{$user_id}'";
	$run_get_Cartlist = mysqli_query($conn, $get_Cartlist);
	if(mysqli_num_rows($run_get_Cartlist) > 0){
	  $deal_ids = array();
	  while($row = mysqli_fetch_assoc($run_get_Cartlist)){			
			$ids_deal = $row['deal_id'];
			$deal_ids[]= $ids_deal;					
			}
		}
		$im_arr = implode("-",$deal_ids);
		return $im_arr;
}

function combineQty($conn,$user_id){
	$get_Cartlist = "SELECT * FROM cart WHERE user_id = '{$user_id}'";
	$run_get_Cartlist = mysqli_query($conn, $get_Cartlist);
	if(mysqli_num_rows($run_get_Cartlist) > 0){
	  $pro_qtys = array();
	  while($row = mysqli_fetch_assoc($run_get_Cartlist)){
			$c_qty 	= $row['qty'];
			$pro_qtys[]= $c_qty;			
			}
		}
		$im_arr = implode("-",$pro_qtys);
		return $im_arr;
}

function SubTotal($conn,$user_id){
	$cart_sub_total = "SELECT * FROM cart WHERE user_id = '{$user_id}'";
    $run_cart_sub_total = mysqli_query($conn, $cart_sub_total);
        if(mysqli_num_rows($run_cart_sub_total) > 0){
        	$sub_total = 0;
            while($row = mysqli_fetch_assoc($run_cart_sub_total)){
            	$qty = $row['qty'];
            	$amount = $row['unit_price'];
            	$sub_total = $sub_total + ($qty * $amount);
            } 
            $sub_total;  
        }else{
            $sub_total = 0;
        }
    return $sub_total;
}


