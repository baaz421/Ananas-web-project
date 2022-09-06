<?php 
require "../db_connnection.php";


$id_cou 	= $_POST["id_cou"];
$code_cou 	= $_POST["code_cou"];
$per_cou 	= $_POST["per_cou"];
$expire_cou = $_POST["expire_cou"];


$sql ="UPDATE coupons SET coupon_code = '{$code_cou}', coupon_percentage = '{$per_cou}', expire_date = '{$expire_cou}'  WHERE coupon_id = {$id_cou}";
//echo  $sql;
//$result =mysqli_query($conn,$sql) or die("Query failed..!");

if(mysqli_query($conn,$sql)){
	echo 1;
}else{
	echo 0;
}

?>