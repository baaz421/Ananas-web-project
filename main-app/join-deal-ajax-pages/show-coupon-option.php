<?php 
// show-coupon-option.php
session_start();
require_once "../db_connnection.php";

if(isset($_SESSION['checkout_id'])){
	$checkout_id = $_SESSION['checkout_id'];
}else{
	$checkout_id = "";
}

$chec_orders_sql = "SELECT * FROM checkout WHERE ID = '{$checkout_id}'";
$run_above_sql = mysqli_query($conn, $chec_orders_sql);
if(mysqli_num_rows($run_above_sql) > 0){
	$fetch_details = mysqli_fetch_assoc($run_above_sql);
	$coupon_per = $fetch_details['coupon_per'];
	if($coupon_per == "0"){
		$c_field = '
		<td colspan="3">
	        <div class="cart-discount mt-1">
	        <form action="#">
        		<div class="input-group">
	        		<input type="text" class="form-control" required placeholder="coupon code" id="coupon-code" >
	        		<div class="input-group-append">
						<button class="form-control btn btn-outline-warning bg-secondary" type="submit" id="submit-coupon"><i class="icon-long-arrow-right"></i></button>
					</div>
    			</div>
	        </form>
	        </div>
		</td>
		<td id="coupon-percentage">-<span>0</span>%</td>
		';
	}else{
		$c_field = "
		<td colspan='3'>
			<p class='custom-control'>Coupon Discount</p>
		</td>
		<td id='coupon-percentage'>-<span>$coupon_per</span>%</td>
		";
	}
}else{
	$c_field = '
		<td colspan="3">
	        <div class="cart-discount mt-1">
	        <form action="#">
        		<div class="input-group">
	        		<input type="text" class="form-control" required placeholder="coupon code" id="coupon-code" >
	        		<div class="input-group-append">
						<button class="form-control btn btn-outline-warning bg-secondary" type="submit" id="submit-coupon"><i class="icon-long-arrow-right"></i></button>
					</div>
    			</div>
	        </form>
	        </div>
		</td>
		<td id="coupon-percentage">-<span>0</span>%</td>
		';
}
echo $c_field;