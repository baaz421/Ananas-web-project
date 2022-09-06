<?php 
// cart-quantity-update.php
require "../db_connnection.php";
require "products-functions.php";

if(isset($_POST['c_id'])&&isset($_POST['c_qty'])){
  $cart_id = $_POST['c_id'];
  $cart_qty = $_POST['c_qty'];

  $get_unit_price_sql = "SELECT * FROM cart WHERE ID = $cart_id";
  $run_get_unit_price_sql = mysqli_query($conn, $get_unit_price_sql);
  $fetch_unit = mysqli_fetch_assoc($run_get_unit_price_sql);
  $unit_price = $fetch_unit['unit_price'];

  $total = $cart_qty * $unit_price;
  
  	$update_cart = "UPDATE cart SET qty = $cart_qty, total = $total WHERE ID = $cart_id";
  	$run_update_cart = mysqli_query($conn,$update_cart);
  	if($run_update_cart){
  		echo 1;
  	}else{
  		echo 2;
  	}

}
