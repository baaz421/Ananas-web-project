<?php
//all-country-admins/edit-admins-data.php
include "../db_connnection.php";
$id_user = $_POST["id_user"];
$name_user = $_POST["name_user"];
$c_code_user = $_POST["c_code_user"];
$mobile_user = $_POST["mobile_user"];
$email_user = $_POST["email_user"];
$time = $date;


$sql ="UPDATE admin SET a_fullname = '{$name_user}', a_email = '{$email_user}', a_phonecode = '{$c_code_user}', a_phone = '{$mobile_user}', a_updatetime = '{$time}'  WHERE AID = {$id_user}";
//echo  $sql;
//$result =mysqli_query($conn,$sql) or die("Query failed..!");

if(mysqli_query($conn,$sql)){
	echo 1;
}else{
	echo 0;
}

?>