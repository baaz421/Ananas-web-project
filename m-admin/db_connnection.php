
<?php


$uri = $_SERVER['REQUEST_URI'];
$ex_link = explode("/", $uri);
//print_r($ex_link);

$file_directry_categories     ="categories-ajax-files";
$file_directry_product        ="product-ajax-files";
$file_directry_admin_login    ="admin-login-system-ajax";
$file_directry_admin_profile  ="admin-profile-details";
$file_directry_user_ajax      ="users-ajax-files";
$file_directry_deal_ajax      ="deals-ajax-files";
$file_directry_admins_ajax    ="all-country-admins";
$file_directry_coupons_ajax   ="coupons-ajax-files";
$file_directry_pro_delivery   ="product-delivery-ajax";
$file_directry_Banner_ajax    ="banner-ajax-files";
$file_directry_Dashboard_ajax ="dashboard-ajax";



if(in_array($file_directry_product,$ex_link)){
  $file_back= "../";
}elseif (in_array($file_directry_admin_login,$ex_link)) {
  $file_back= "../";
}elseif (in_array($file_directry_admin_profile,$ex_link)) {
  $file_back= "../";
}elseif (in_array($file_directry_user_ajax,$ex_link)) {
  $file_back= "../";
}elseif (in_array($file_directry_deal_ajax,$ex_link)) {
  $file_back= "../";
}elseif (in_array($file_directry_admins_ajax,$ex_link)) {
  $file_back= "../";
}elseif (in_array($file_directry_categories,$ex_link)) {
  $file_back= "../";
}elseif (in_array($file_directry_coupons_ajax,$ex_link)) {
  $file_back= "../";
}elseif (in_array($file_directry_pro_delivery,$ex_link)) {
  $file_back= "../";
}elseif (in_array($file_directry_Banner_ajax,$ex_link)) {
  $file_back= "../";
}elseif (in_array($file_directry_Dashboard_ajax,$ex_link)) {
  $file_back= "../";
}else{
  $file_back= "";
}

require_once "$file_back../config.php";
$conn = mysqli_connect(HOST,USER,PASSWORD,DATABASE) or die("Connection failed to DATABASE!");
mysqli_set_charset($conn, 'utf8');
?>
