<?php

$uri = $_SERVER['REQUEST_URI'];
$ex_link = explode("/", $uri);
//print_r($ex_link);

// file root or directry name declare here

$file_directry_user_amount_ajax       ="user-amount-ajax";
$file_directry_user_ajax_files        ="user-ajax-files";



// provide condition above directry root for file back
if(in_array($file_directry_user_amount_ajax,$ex_link)){
  $file_back= "../";
}else if(in_array($file_directry_user_ajax_files,$ex_link)){
  $file_back= "../";
}else{
  $file_back= "";
}

require_once "$file_back../../config.php";
$conn = mysqli_connect(HOST,USER,PASSWORD,DATABASE) or die("Connection failed to DATABASE!");
mysqli_set_charset($conn, 'utf8');

// if($conn){
// 	echo "connected to DATABASE";

// }else{
// 	echo "some thing is wrong";
// }

?>

