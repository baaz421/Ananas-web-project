<?php
require "../db_connnection.php";
session_start();
// ==== image upload or move in directry (function) start ========// 
function upload_img($img_name,$tmp_img_name){
	if($img_name != ""){
		$file_extension = pathinfo($img_name,PATHINFO_EXTENSION);
		$valid_extension =["jpg","jpeg","png"];
			if(in_array($file_extension,$valid_extension)){
				$new_image_name = "p_".mt_rand().".".$file_extension;
				$path = "../../All-Products-images/".$new_image_name;
				move_uploaded_file($tmp_img_name, $path);
				return $new_image_name;
			}else{
				return "null";
			}
	}else{
		return "null";
	}
}
// ==== image upload or move in directry (function) close ========// 

// $image1 ="";
// $image2 ="";
// $image3 ="";
// $image4 ="";
// $image5 ="";

// $image_tmp1 = "";
// $image_tmp2 = "";
// $image_tmp3 = "";
// $image_tmp4 = "";
// $image_tmp5 = "";

if(isset($_FILES['file']['name']) || $_FILES['file']['name'] != ''){
	@$image1 = $_FILES['file']['name'][0];
	@$image2 = $_FILES['file']['name'][1];
	@$image3 = $_FILES['file']['name'][2];
	@$image4 = $_FILES['file']['name'][3];
	@$image5 = $_FILES['file']['name'][4];

	@$image_tmp1 = $_FILES['file']['tmp_name'][0];
	@$image_tmp2 = $_FILES['file']['tmp_name'][1];
	@$image_tmp3 = $_FILES['file']['tmp_name'][2];
	@$image_tmp4 = $_FILES['file']['tmp_name'][3];
	@$image_tmp5 = $_FILES['file']['tmp_name'][4];

	$img_1 = upload_img($image1,$image_tmp1);
	$img_2 = upload_img($image2,$image_tmp2);
	$img_3 = upload_img($image3,$image_tmp3);
	$img_4 = upload_img($image4,$image_tmp4);
	$img_5 = upload_img($image5,$image_tmp5);

	$sql_insert ="INSERT INTO products(image_0,image_1,image_2,image_3,image_4) VALUES('{$img_1}','{$img_2}','{$img_3}','{$img_4}','{$img_5}')";
	if(mysqli_query($conn,$sql_insert)){
		// $total_image = count($_FILES['file']['name']);
		$last_id = mysqli_insert_id($conn);
		$_SESSION['last_id']=$last_id;
		// $sql_view = "SELECT * FROM imges_upload_test WHERE ID = {$last_id}";
		// $view_result = mysqli_query($conn,$sql_view);
		// $img = mysqli_fetch_assoc($view_result);
		// $out_put = "<table>
		// 			<tr>";
		// for ($i=0; $i < $total_image; $i++) { 
		// 	$img_data_col = "image_".$i;
			 
		// 	$out_put .= "<td>
		// 			<img src='../../All-Products-images/$img[$img_data_col]' class='rounded img-thumbnail' >
		// 			<button type='submit' class='btn btn-secondary mt-3' data-path ='$img[$img_data_col]' id='delete_image' >Delete</button>
		// 		</td>";			

		// }
		// $out_put .="</tr>
		// 		</table>";

		
		// echo $out_put;
		echo "true";

		
	}else{
		echo "false";
	}

}else{
	echo "false";
}




 ?>