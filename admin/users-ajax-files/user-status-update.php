<?php 
$id_status = $_POST["statusId"];
$status_value_one = 1;
$status_value_zero = 0;

require "../db_connnection.php";

$sql_check ="SELECT u_status FROM users WHERE id = {$id_status}";
$result =mysqli_query($conn,$sql_check) or die("Query failed..!");

$sta_data = mysqli_fetch_assoc($result);
$str = implode('|', $sta_data);

if($str == 0){
	$sql ="UPDATE users SET u_status = '{$status_value_one}' WHERE id = {$id_status}";
		if(mysqli_query($conn,$sql)){
			echo 1;
		}else{
			echo 0;
		}

}else{
	$sql ="UPDATE users SET u_status = '{$status_value_zero}' WHERE id = {$id_status}";

		if(mysqli_query($conn,$sql)){
			echo 1;
		}else{
			echo 0;
		}
}