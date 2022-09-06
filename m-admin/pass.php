<?php 



function encryptPass($password) {
    $sSalt = '20adeb83e85f03cfc84d0fb7e5f4d290';
    $sSalt = substr(hash('sha256', $sSalt, true), 0, 32);
    $method = 'aes-256-cbc';

    $iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);

    $encrypted = base64_encode(openssl_encrypt($password, $method, $sSalt, OPENSSL_RAW_DATA, $iv));
    return $encrypted;
}

function decryptPass($password) {
    $sSalt = '20adeb83e85f03cfc84d0fb7e5f4d290';
    $sSalt = substr(hash('sha256', $sSalt, true), 0, 32);
    $method = 'aes-256-cbc';

    $iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);

    $decrypted = openssl_decrypt(base64_decode($password), $method, $sSalt, OPENSSL_RAW_DATA, $iv);
    return $decrypted;
}

function FormatDateFromDB($date){
	$join_date = $date;
	$date = substr($join_date,0,-12);
	$date_rep = str_replace(" ", "-", $date);
	$str_to_time = strtotime($date_rep);
	$create_time = date("l, F d-Y",$str_to_time);
	return $create_time;
}

require "db_connnection.php";

$sql_old_pass_check = "SELECT * FROM admin WHERE AID = 4";
$run_check_pass = mysqli_query($conn, $sql_old_pass_check);
$get_old_pass = mysqli_fetch_assoc($run_check_pass);
$old_pass_db = $get_old_pass['a_username'];

echo "<pre>";
echo "enc:-   ".$old_pass_db;
echo "</pre>";

// $my = "baaz421";
// if(password_verify($my,$old_pass_db)){
// 	echo "password matched";
// }else{
// 	echo " sorry not matched";
// }



echo "<pre>";

$cre_date = $get_old_pass['a_createtime'];

echo $cre_date."<br>";

$str_to_time = strtotime($cre_date);
echo $str_to_time."<br>";

$sho_date = date("l, F d-y",$str_to_time);
echo $sho_date."<br>";

echo "</pre>";

function joinDate($date){
	$a = strtotime($date);
	$b = date("l, F d-y",$a);
	return $b;
}


echo joinDate($cre_date);


























?>