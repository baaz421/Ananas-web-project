<?php

$uri = $_SERVER['REQUEST_URI'];
$ex_link = explode("/", $uri);
//print_r($ex_link);

// file root or directry name declare here
$file_directry_login            ="login-ajax-files";
$file_directry_products         ="all-products-files";
$file_directry_join_deal        ="join-deal-ajax-pages";
$file_directry_home_page_ajax   ="home-page-ajax";




// provide condition above directry root for file back
if(in_array($file_directry_login,$ex_link)){
  $file_back= "../";
}else if(in_array($file_directry_products,$ex_link)){
  $file_back= "../";
}else if(in_array($file_directry_join_deal,$ex_link)){
  $file_back= "../";
}else if(in_array($file_directry_home_page_ajax,$ex_link)){
  $file_back= "../";
}else{
  $file_back= "";
}


require_once "$file_back../config.php";
$conn = mysqli_connect(HOST,USER,PASSWORD,DATABASE) or die("Connection failed to DATABASE!");
mysqli_set_charset($conn, 'utf8');

// if($conn){
// 	echo "connected to DATABASE";

// }else{
// 	echo "some thing is wrong";
// }

?>

