<?php
// change-profile-image.php
require_once "../db_connnection.php";
session_start();
// echo $date;

$u_id = $_SESSION['u_id'];
$new_image_name = "U_".$u_id."_".time().".jpg";
$path_name = "user-profile-images/";

if(isset($_POST['image'])){
	if(isset($_POST['image_name_exits']) AND $_POST['image_name_exits'] != ""){
		$image_name_old = $_POST['image_name_exits'];		
		$file_name = $path_name.$image_name_old;
		if(file_exists($file_name)){
			unlink($file_name);
		}
	}
	$data = $_POST['image'];
	$image_array_1 = explode(";", $data);
	$image_array_2 = explode(",", $image_array_1[1]);
	$data = base64_decode($image_array_2[1]);
	$image_name = $path_name.$new_image_name;
	file_put_contents($image_name, $data);
	$sql_upload_user_img = "UPDATE users SET profile_pic = '{$new_image_name}'  WHERE id = $u_id";  
	  if(mysqli_query($conn,$sql_upload_user_img)){
	  	echo $image_name;
	  }	
}else{
	echo "Failed";
}




?>