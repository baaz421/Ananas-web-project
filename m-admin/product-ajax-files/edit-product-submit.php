<?php 
//edit-product-submit.php
include "../db_connnection.php";
//print_r($_POST);
session_start();
$p_name 	= $_POST['Product-name'];
$p_cat 		= $_POST['category'];
$p_des 		= $_POST['description'];
$p_price 	= $_POST['market-price'];
$p_id 		= $_POST['pid'];
//$admin_id 	= $_SESSION['a_id'];

$sql ="UPDATE products SET product_name = '{$p_name}', category_id = {$p_cat}, description = '{$p_des}', m_price = {$p_price}  WHERE ID = {$p_id}";
//echo  $sql;
//$result =mysqli_query($conn,$sql) or die("Query failed..!");

if(mysqli_query($conn,$sql)){
	//unset($_SESSION['last_id']);
	echo 1;
}else{
	echo 0;
}



?>