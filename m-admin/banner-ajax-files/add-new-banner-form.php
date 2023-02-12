<?php
// add-new-banner-form.php
include "../db_connnection.php";
session_start();

$b_title = mysqli_real_escape_string($conn,$_POST['banner-title']);
$b_pro_link = mysqli_real_escape_string($conn,$_POST['pro-link']);
$b_country = mysqli_real_escape_string($conn,$_POST['ban-country']);
$b_id 	= $_SESSION['banner_id'];

if(isset($_POST['edit-banner'])){
	$sql ="UPDATE banners SET b_title = '{$b_title}', b_link= '{$b_pro_link}', b_country = '{$b_country}', b_proccess = '0', update_date = '{$date}' WHERE b_id = $b_id";
	// echo "this edit";
}else if($_POST['add-banner']){
	$sql ="UPDATE banners SET b_title = '{$b_title}', b_link= '{$b_pro_link}', b_country = '{$b_country}', b_proccess = '0', create_date = '{$date}' WHERE b_id = $b_id";
	// echo "this add";
}

if(mysqli_query($conn,$sql)){
	unset($_SESSION['banner_id']);
	echo 1;
}else{
	echo 0;
}