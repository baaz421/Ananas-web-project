<?php 
//upload-banner-image.php
require "../db_connnection.php";
session_start();
$b_id = $_SESSION['banner_id'];
$new_image_name = "B_".$b_id."_".time().".jpg";

if(isset($_POST['image'])){
	if(isset($_POST['old_image']) AND $_POST['old_image'] != "null"){
		
		$image_name_old = $_POST['old_image'];
		$path_name 			= "banner-images/";
		$file_name 			= $path_name.$image_name_old;
		if(file_exists($file_name)){
			unlink($file_name);
		}
	}
	$data 					= $_POST['image'];
	$image_array_1 	= explode(";", $data);
	$image_array_2 	= explode(",", $image_array_1[1]);
	$data 					= base64_decode($image_array_2[1]);
	$image_name 		= 'banner-images/'.$new_image_name;
	file_put_contents($image_name, $data);

	if($_POST['which'] == "big"){
		$sql_upload_banner_img = "UPDATE banners SET des_img = '{$new_image_name}'  WHERE b_id = $b_id";
    mysqli_query($conn,$sql_upload_banner_img);
	}elseif ($_POST['which'] == "small") {
		$sql_upload_banner_img = "UPDATE banners SET mob_img = '{$new_image_name}'  WHERE b_id = $b_id";
    mysqli_query($conn,$sql_upload_banner_img);
	}
	echo $image_name;
}else{
	echo "Failed";
}
?>