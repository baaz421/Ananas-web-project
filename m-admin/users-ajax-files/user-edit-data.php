<?php 
include "../db_connnection.php";
$id_user = $_POST["id_user"];
$name_user = $_POST["name_user"];
$c_code_user = $_POST["c_code_user"];
$mobile_user = $_POST["mobile_user"];
$email_user = $_POST["email_user"];
$time = $date;

$sql ="UPDATE users SET name = '{$name_user}', email = '{$email_user}', countrycode = '{$c_code_user}', mobile = '{$mobile_user}', updatetime = '{$time}'  WHERE ID = {$id_user}";
//echo  $sql;
//$result =mysqli_query($conn,$sql) or die("Query failed..!");

if(mysqli_query($conn,$sql)){
	echo 1;
}else{
	echo 0;
}

?>