<?php
//all-country-admins/admins-verify-update.php
include "../db_connnection.php";

$id_status = $_POST["verifyId"];
$status_value_one = 1;
$status_value_zero = 0;
$verify_status = 'verified';
$update = $date;

$sql_check ="SELECT a_vcode FROM admin WHERE AID = {$id_status}";
$result =mysqli_query($conn,$sql_check) or die("Query failed..!");

$sta_data = mysqli_fetch_assoc($result);
$str = implode('|', $sta_data);

if($str != 0){
	$sql ="UPDATE admin SET a_vcode = '{$status_value_zero}', a_vstatus = '{$verify_status}', a_updatetime = '{$update}'  WHERE AID = {$id_status}";
		if(mysqli_query($conn,$sql)){
			echo 1;
		}else{
			echo 0;
		}

}else{
	echo 0;
}
