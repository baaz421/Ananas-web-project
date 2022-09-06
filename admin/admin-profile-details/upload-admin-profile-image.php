<?php 
//upload-admin-profile-image.php
require "../db_connnection.php";
session_start();
$a_id = $_SESSION['a_id'];

$new_image_name = "A_".$a_id."_".time().".jpg";

if(isset($_POST['image'])){

if(isset($_POST['old_image']) AND $_POST['old_image'] != "null"){
		//echo $_POST['old_image'];
		
		$image_name_old = $_POST['old_image'];
		$path_name = "admin-profile-images/";
		$file_name = $path_name.$image_name_old;
		if(file_exists($file_name)){
			unlink($file_name);
		}
	}


	$data = $_POST['image'];

	$image_array_1 = explode(";", $data);

	$image_array_2 = explode(",", $image_array_1[1]);

	$data = base64_decode($image_array_2[1]);

	// $image_name = 'admin-profile-images/' . time() . 'bb.jpg';
	$image_name = 'admin-profile-images/'.$new_image_name;

	file_put_contents($image_name, $data);

	$sql_upload_admin_img = "UPDATE admin SET a_profilepic = '{$new_image_name}'  WHERE AID = {$a_id}";
    mysqli_query($conn,$sql_upload_admin_img) or die("Connection failed to DATABASE!");

	// echo "admin-profile-details/".$image_name;
	echo $image_name;
}else{
	echo "Failed";
}


?>