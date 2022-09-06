<?php 
// final-amt.php
session_start();
require_once "../db_connnection.php";

if(isset($_SESSION['checkout_id'])){
	$checkout_id = $_SESSION['checkout_id'];
}else{
	$checkout_id = "";
}

$get_per = "SELECT * FROM checkout WHERE ID = '{$checkout_id}'";
$run_get_per = mysqli_query($conn, $get_per);
$fetch_per = mysqli_fetch_assoc($run_get_per);
$percentage = $fetch_per['coupon_per'];

echo $percentage;


