<?php 
require "../db_connnection.php";

$id_status = $_POST["statusId"];
$status_value_one = 1;
$status_value_zero = 0;

$sql_check ="SELECT coupon_status FROM coupons WHERE coupon_id = {$id_status}";
$result =mysqli_query($conn,$sql_check) or die("Query failed..!");

$sta_data = mysqli_fetch_assoc($result);
$str = implode('|', $sta_data);

if($str == 0){
	$sql ="UPDATE coupons SET coupon_status = '{$status_value_one}' WHERE coupon_id = {$id_status}";
		if(mysqli_query($conn,$sql)){
			echo 1;
		}else{
			echo 0;
		}

}else{
	$sql ="UPDATE coupons SET coupon_status = '{$status_value_zero}' WHERE coupon_id = {$id_status}";

		if(mysqli_query($conn,$sql)){
			echo 1;
		}else{
			echo 0;
		}
}




// $sql ="UPDATE categories SET status = '{$status_value}' WHERE ID = {$id_status}";
// //echo  $sql;
// //$result =mysqli_query($conn,$sql) or die("Query failed..!");

// if(mysqli_query($conn,$sql)){
// 	echo 1;
// }else{
// 	echo 0;
// }

?>