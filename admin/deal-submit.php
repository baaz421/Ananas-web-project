<?php
// include data base file 
include "db_connnection.php";

// get data by post method with this variable
$unit_price 	= mysqli_real_escape_string($conn, $_POST['u-price']);
$estimate_price = mysqli_real_escape_string($conn, $_POST['e-amount']);
$method_of_deal = $_POST['d-method'];
$market_value 	= $_POST['market-value'];
$product_id 	= $_POST['product_id'];
$admin_id 		= $_POST['admin-id'];
$admin_country 	= $_POST['admin-country'];
$deal_zone 		= "red";
$deal_status 	= 1;
$current_date 	= $date;
$zero 			= 0;

//date condition if its null or not and  convert from form to data
$red_date_from_form = mysqli_real_escape_string($conn, $_POST['red-date']);
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
	$orange_days = 0;
	$orange_method = "percentage";
	$orange_c_amt = GetAmountAsPerPercenatge($orange_per,$estimate_price);
}else{
	$orange_per = "";
	$orange_days = $orange_deal_setting['d_time'];
	$orange_method = "time";
	$orange_c_amt = 0;
}

// green deal setting from master admin
$sql_green_deal_setting = "SELECT * FROM deal_setting where ID = 9";
$sql_green_deal_setting_result = mysqli_query($conn, $sql_green_deal_setting);
$green_deal_setting = mysqli_fetch_assoc($sql_green_deal_setting_result);
if($green_deal_setting['d_method'] == 'p'){
	$green_per = $green_deal_setting['d_percentage'];
	$green_days = 0;
	$green_method = "percentage";
	$green_c_amt = GetAmountAsPerPercenatge($green_per,$estimate_price);
}else{
	$green_per = "";
	$green_days = $green_deal_setting['d_time'];
	$green_method = "time";
	$green_c_amt = 0;
}

// red deal setting from form
if($method_of_deal == "Amount"){
	$red_method = "amount";
}else{
	$red_method = "time";
}

if(isset($_POST['confirm-deal'])){
	$deal_sql_insert = "
		INSERT INTO deal(
			a_id, p_id, zone, deal_status, m_value, e_value, unit_price, 
			red_method, s_time_red,	red_am, e_time_red, 
			orange_method, oran_per, oran_days, s_time_oran, oran_am, oran_c_amt,
			green_method, green_per, green_days, green_am, green_c_amt,
			d_country, 
			create_time
			)VALUES(
			'{$admin_id }','{$product_id}','{$deal_zone}','{$deal_status}','{$market_value}','{$estimate_price}','{$unit_price}',
			'{$red_method}','{$current_date}','{$zero}','{$red_date}',
			'{$orange_method}','{$orange_per}','{$orange_days}','{$red_date}','{$zero}','{$orange_c_amt}',
			'{$green_method}','{$green_per}','{$green_days}','{$zero}','{$green_c_amt}',
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

// getting amount as per percenatge mentioned
function GetAmountAsPerPercenatge($per,$estimate_amount){
	$a = round(($per/100)*$estimate_amount,2);
	return $a;
}
?>