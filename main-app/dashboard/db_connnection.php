<?php

$uri = $_SERVER['REQUEST_URI'];
$ex_link = explode("/", $uri);
//print_r($ex_link);

// file root or directry name declare here

$file_directry_user_amount_ajax       ="user-amount-ajax";



// provide condition above directry root for file back
if(in_array($file_directry_user_amount_ajax,$ex_link)){
  $file_back= "../";
}else{
  $file_back= "";
}

require_once "$file_back../../config.php";
$conn = mysqli_connect(HOST,USER,PASSWORD,DATABASE) or die("Connection failed to DATABASE!");

// if($conn){
// 	echo "connected to DATABASE";

// }else{
// 	echo "some thing is wrong";
// }

?>

