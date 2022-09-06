<?php 
$id_status = $_POST["verifyId"];
$status_value_one = 1;
$status_value_zero = 0;
$verify_status = 'verified';

require "../db_connnection.php";

$sql_check ="SELECT vcode FROM users WHERE id = {$id_status}";
$result =mysqli_query($conn,$sql_check) or die("Query failed..!");

$sta_data = mysqli_fetch_assoc($result);
$str = implode('|', $sta_data);

if($str != 0){
	$sql ="UPDATE users SET vcode = '{$status_value_zero}', vstatus = '{$verify_status}'  WHERE id = {$id_status}";
		if(mysqli_query($conn,$sql)){
			echo 1;
		}else{
			echo 0;
		}

}else{
	echo 0;
}