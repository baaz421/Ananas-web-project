<?php 
//delete-signal-image.php
//p_289962050.jpg
include "../db_connnection.php";

$p_id 		= $_POST["p_id"];
$image_name = $_POST["image_name"];
$null		= "null";
$path_img ="../../All-Products-images/";
if(isset($_POST["image_name"]) AND isset($_POST['p_id'])){

	$del_p_sql = "SELECT image_0,image_1,image_2,image_3,image_4 FROM products WHERE ID = $p_id";
	$del_res = mysqli_query($conn,$del_p_sql);
	$get_p_img = mysqli_fetch_assoc($del_res);

	$img_1 = $get_p_img['image_0'];
	$img_2 = $get_p_img['image_1'];
	$img_3 = $get_p_img['image_2'];
	$img_4 = $get_p_img['image_3'];
	$img_5 = $get_p_img['image_4'];

	if($img_1 == $image_name){
		$remove_img1 = $path_img.$img_1;
		unlink($remove_img1);
		$sql_update_img1 ="UPDATE products SET image_0 = '{$null}'  WHERE ID = {$p_id}";
		mysqli_query($conn,$sql_update_img1);
		echo 1;
	}elseif($img_2 == $image_name){
		$remove_img2 = $path_img.$img_2;
		unlink($remove_img2);
		$sql_update_img2 ="UPDATE products SET image_1 = '{$null}'  WHERE ID = {$p_id}";
		mysqli_query($conn,$sql_update_img2);
		echo 1;
	}elseif($img_3 == $image_name){
		$remove_img3 = $path_img.$img_3;
		unlink($remove_img3);
		$sql_update_img3 ="UPDATE products SET image_2 = '{$null}'  WHERE ID = {$p_id}";
		mysqli_query($conn,$sql_update_img3);
		echo 1;
	}elseif($img_4 == $image_name){
		$remove_img4 = $path_img.$img_4;
		unlink($remove_img4);
		$sql_update_img4 ="UPDATE products SET image_3 = '{$null}'  WHERE ID = {$p_id}";
		mysqli_query($conn,$sql_update_img4);
		echo 1;
	}elseif($img_5 == $image_name){
		$remove_img5 = $path_img.$img_5;
		unlink($remove_img5);
		$sql_update_img5 ="UPDATE products SET image_4 = '{$null}'  WHERE ID = {$p_id}";
		mysqli_query($conn,$sql_update_img5);
		echo 1;
	}else{
		echo 0;
	}

}else{

	echo 0;
}


?>