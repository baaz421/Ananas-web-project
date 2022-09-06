<?php
//all-country-admins/admins-status-update.php
include "../db_connnection.php";

$id_status 			= $_POST["statusId"];
$status_value_one 	= 1;
$status_value_zero 	= 0;
$update 			= $date;

$sql_check ="SELECT a_status FROM admin WHERE AID = {$id_status}";
$result =mysqli_query($conn,$sql_check) or die("Query failed..!");

$sta_data = mysqli_fetch_assoc($result);
$str = implode('|', $sta_data);

if($str == 0){
	$sql ="UPDATE admin SET a_status = '{$status_value_one}', a_updatetime ='{$update}' WHERE AID = {$id_status}";
		if(mysqli_query($conn,$sql)){
			echo 1;
		}else{
			echo 0;
		}

}else{
	$sql ="UPDATE admin SET a_status = '{$status_value_zero}', a_updatetime ='{$update}' WHERE AID = {$id_status}";

		if(mysqli_query($conn,$sql)){
			echo 1;
		}else{
			echo 0;
		}
}