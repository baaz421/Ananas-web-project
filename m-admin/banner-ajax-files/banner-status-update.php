<?php
//all-country-admins/admins-status-update.php
include "../db_connnection.php";

$id_status 			= $_POST["statusId"];
$status_value_one 	= 1;
$status_value_zero 	= 0;

$sql_check ="SELECT b_status FROM banners WHERE b_id = {$id_status}";
$result =mysqli_query($conn,$sql_check) or die("Query failed..!");

$sta_data = mysqli_fetch_assoc($result);
$str = $sta_data['b_status'];

if($str == 0){
	$sql ="UPDATE banners SET b_status = '{$status_value_one}', update_date ='{$date}' WHERE b_id = {$id_status}";
		if(mysqli_query($conn,$sql)){
			echo 1;
		}else{
			echo 0;
		}

}else{
	$sql ="UPDATE banners SET b_status = '{$status_value_zero}', update_date ='{$date}' WHERE b_id = {$id_status}";

		if(mysqli_query($conn,$sql)){
			echo 1;
		}else{
			echo 0;
		}
}