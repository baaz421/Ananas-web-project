<?php 
include "../db_connnection.php";
$id_status = $_POST["statusId"];
$status_value_one = 1;
$status_value_zero = 0;



$sql_check ="SELECT p_status FROM products WHERE ID = {$id_status}";
$result =mysqli_query($conn,$sql_check) or die("Query failed..!");

$sta_data = mysqli_fetch_assoc($result);
$str = implode('|', $sta_data);

if($str == 0){
	$sql ="UPDATE products SET p_status = '{$status_value_one}' WHERE ID = {$id_status}";
		if(mysqli_query($conn,$sql)){
			echo 1;
		}else{
			echo 0;
		}

}else{
	$sql ="UPDATE products SET p_status = '{$status_value_zero}' WHERE ID = {$id_status}";

		if(mysqli_query($conn,$sql)){
			$check_wishlist = "SELECT * FROM wishlist WHERE product_id = {$id_status}";
			$run_check_wishlist = mysqli_query($conn,$check_wishlist);
			if(mysqli_num_rows($run_check_wishlist) > 0){
				$sql_wishlist ="DELETE FROM wishlist WHERE product_id = {$id_status}";
				mysqli_query($conn,$sql_wishlist);
			}
			echo 1;
		}else{
			echo 0;
		}
}