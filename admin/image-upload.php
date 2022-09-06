<?php

if($_FILES['image'] != ""){
$file_name = $_FILES['image']['name'];
$file_tmp_name = $_FILES['image']['tmp_name'];

$extenion = pathinfo($file_name,PATHINFO_EXTENSION);
$valid_extention = ["jpg","jpeg","png","gif"];
 
if(in_array($extenion, $valid_extention)){
	$new_name = rand().".".$extenion; 
	$path = "test-image-upload/".$new_name; 

	if(move_uploaded_file($file_tmp_name,$path)){
		echo "<img src='$path' class='rounded'>
			<div class='line'></div>
			<button type='submit' class='btn btn-secondary' data-path ='$path' id='delete_image' >Delete</button>";
	}
}else{
	echo "<script>alert('invalid file format')</script>";
}


}else{
	echo "<script>alert('please select or upload file')</script>";
}

?> 
