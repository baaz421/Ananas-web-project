<?php 
//upload-singal-product-image.php
include "../db_connnection.php";
if(isset($_POST['image']) AND isset($_POST['p_id']) AND isset($_POST['col_name']))
{
	if(isset($_POST['image_name_exits']) AND $_POST['image_name_exits'] != null){
		//echo $_POST['image_name_exits'];
		
		$image_name_exits = $_POST['image_name_exits'];
		$path_name = "../../All-Products-images/";
		$file_name = $path_name.$image_name_exits;
		if(file_exists($file_name)){
			unlink($file_name);
		}
	}



	//echo $_POST['p_id'].$_POST['col_name'];

	// converting post to variable 
	$col_name 	= $_POST['col_name'];
	$pid 		= $_POST['p_id'];
	$data 		= $_POST['image'];

	//getting image data from post
	$image_array_1 = explode(";", $data);
	$image_array_2 = explode(",", $image_array_1[1]);
	$data = base64_decode($image_array_2[1]);

	// image name and path with name
	$new_image_name = "p_".mt_rand().".jpg";
	$path = "../../All-Products-images/".$new_image_name;
	$image_name = $path;

	// storing image in server folder
	file_put_contents($image_name, $data);

	
    $sql_upload_singal_img = "UPDATE products SET {$col_name} = '{$new_image_name}'  WHERE ID = {$pid}";
    mysqli_query($conn,$sql_upload_singal_img) or die("Connection failed to DATABASE!");
	
	echo $image_name;
}



?>