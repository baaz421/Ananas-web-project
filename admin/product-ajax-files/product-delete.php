<?php 
// product-delete.php
include "../db_connnection.php";
$p_id = $_POST["p_id"];
//$p_id = 3;
$path_img ="../../All-Products-images/";
if(isset($_POST["p_id"])){

$del_p_sql = "SELECT image_0,image_1,image_2,image_3,image_4 FROM products WHERE ID = $p_id";
$del_res = mysqli_query($conn,$del_p_sql);
$get_p_img = mysqli_fetch_assoc($del_res);

$img_1 = $get_p_img['image_0'];
$img_2 = $get_p_img['image_1'];
$img_3 = $get_p_img['image_2'];
$img_4 = $get_p_img['image_3'];
$img_5 = $get_p_img['image_4'];

 if($img_1 != ""){
	$remove_img1 = $path_img.$img_1;
	unlink($remove_img1);
 }
 if($img_2 != ""){
	$remove_img2 = $path_img.$img_2;
	unlink($remove_img2);
 }
 if($img_3 != ""){
	$remove_img3 = $path_img.$img_3;
	unlink($remove_img3);
 }
 if($img_4 != ""){
	$remove_img4 = $path_img.$img_4;
	unlink($remove_img4);
 }
 if($img_5 != ""){
	$remove_img5 = $path_img.$img_5;
	unlink($remove_img5);
 }
$sql ="DELETE FROM products WHERE ID = {$p_id}";
if(mysqli_query($conn,$sql)){
	echo 1;
}else{
	echo 0;
}
}


?>