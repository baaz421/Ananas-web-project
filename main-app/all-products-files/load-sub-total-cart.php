<?php 
// load-sub-total-cart.php
session_start();
require "../db_connnection.php";

if(isset($_SESSION['u_id'])){
    $user_id = $_SESSION['u_id'];
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
}else{
    $sub_total = 0;
}

echo $sub_total;