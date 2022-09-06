<?php
// include data base file 
include "db_connnection.php";

// get data by post method with this variable
$unit_price = $_POST['u-price'];
$estimate_price = $_POST['e-amount'];
$method_of_deal = $_POST['d-method'];
$market_value = $_POST['market-value'];
$product_id = $_POST['product_id'];
$admin_id = $_POST['admin-id'];
$admin_country = $_POST['admin-country'];
$deal_zone = "red";
$deal_status = 1;
$current_date = $date;



//date condition if its null or not and  convert from form to data
$red_date_from_form = $_POST['red-date'];
if($red_date_from_form == ""){
	$red_date = "";
}else{
	$red_date = date('d-m-Y H:i',strtotime($red_date_from_form));
}



// orange deal setting from master admin
$sql_orange_deal_setting = "SELECT * FROM deal_setting where ID = 8";
$sql_orange_deal_setting_result = mysqli_query($conn, $sql_orange_deal_setting);
$orange_deal_setting = mysqli_fetch_assoc($sql_orange_deal_setting_result);
if($orange_deal_setting['d_method'] == 'p'){
	$orange_per = $orange_deal_setting['d_percentage'];
	$orange_days = "";
	$orange_method = "percentage";
}else{
	$orange_per = "";
	$orange_days = $orange_deal_setting['d_time'];
	$orange_method = "time";
}

// green deal setting from master admin
$sql_green_deal_setting = "SELECT * FROM deal_setting where ID = 9";
$sql_green_deal_setting_result = mysqli_query($conn, $sql_green_deal_setting);
$green_deal_setting = mysqli_fetch_assoc($sql_green_deal_setting_result);
if($green_deal_setting['d_method'] == 'p'){
	$green_per = $green_deal_setting['d_percentage'];
	$green_days = "";
	$green_method = "percentage";
}else{
	$green_per = "";
	$green_days = $green_deal_setting['d_time'];
	$green_method = "time";
}

// red deal setting from form
if($method_of_deal == "Amount"){
	$red_method = "amount";
}else{
	$red_method = "time";
}

//echo for view the data which coming from post data 
// echo "variables data coming from post method.<br>";
// echo 	$unit_price 	."--".
// 		$estimate_price	."--".
// 		$method_of_deal ."--".
// 		$red_date 		."--".
// 		$market_value 	."--".
// 		$admin_id 		."--".
// 		$product_id 	."--".
// 		$admin_country 	."--".
// 		$deal_zone		."--".
// 		$red_method 	."--".
// 		$orange_method 	."--".
// 		$green_method	."--".
// 		$current_date."<br>";
//		

if(isset($_POST['confirm-deal'])){
	$deal_sql_insert = "
		INSERT INTO deal(
			a_id, p_id, zone, deal_status, m_value, e_value, unit_price, 
			red_method, s_time_red,	e_time_red, 
			orange_method, oran_per, oran_days, s_time_oran, 
			green_method, green_per, green_days,
			d_country, 
			create_time
			)VALUES(
			'{$admin_id }','{$product_id}','{$deal_zone}','{$deal_status}','{$market_value}','{$estimate_price}','{$unit_price}',
			'{$red_method}','{$current_date}','{$red_date}',
			'{$orange_method}','{$orange_per}','{$orange_days}','{$red_date}',
			'{$green_method}','{$green_per}','{$green_days}',
			'{$admin_country}','{$current_date}'
		)";

	$deal_result_insert = mysqli_query($conn, $deal_sql_insert);
	if($deal_result_insert){
		
		$sql_update_pro = "UPDATE products SET deal_check ='{$deal_status}' WHERE ID = {$product_id}";
	    $update_pro_res = mysqli_query($conn, $sql_update_pro);
		header('location: products.php');
	}else{
		echo 0;
	}

}else{
	header('location: products.php');
}

//echo $deal_sql_insert;




































?>