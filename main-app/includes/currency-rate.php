<?php
// currency-rate.php
$today_date = date("Y-m-d")." 24:00:00";
$expiry = TodayRemainingTime($today_date);

// checking session for user id for currency
if(isset($_SESSION['u_id'])){
	$sql_u_cur 	= "SELECT * FROM users WHERE id = ".$_SESSION['u_id'];
	$run_u_cur 	= mysqli_query($conn, $sql_u_cur);
	$get_u_cur 	= mysqli_fetch_assoc($run_u_cur);
	$currency 	= $get_u_cur['currency'];
	$u_iso	 		= $get_u_cur['iso'];
		if(!isset($_COOKIE['currency_rate'])){
			$currency_rate = CallCurrencyAPI($currency);
			setcookie("currency_rate",$currency_rate,$expiry,"/");
			setcookie("currency",$currency,$expiry,"/");
			$_SESSION['currency_rate'] 	= $currency_rate;
			$_SESSION['currency'] 		= $currency;
		}else{
			$currency_rate 		= $_COOKIE['currency_rate'];
			$n_currency 		= $_COOKIE['currency'];
			$_SESSION['currency_rate'] 	= $currency_rate;
			$_SESSION['currency'] 		= $n_currency;
		}
	$user_currency_set = $currency;
}else{
	$_SESSION['currency'] = "USD";
	$user_currency_set = "USD";
}

if(isset($_GET['curType']) && $_SESSION['currency'] != $_GET['curType'] && !empty($_GET['curType'])){
	if($_GET['curType'] == "USD"){
		$currency_name = $_GET['curType'];
		$currency_rate = 1;
		setcookie("currency_rate",$currency_rate,$expiry,"/");
		setcookie("currency",$currency_name,$expiry,"/");
		$_SESSION['currency_rate'] 	= $currency_rate;
		$_SESSION['currency'] 			= $currency_name;
	}else{
		$currency_name = $_GET['curType'];
		$currency_rate = CallCurrencyAPI($currency_name);
		setcookie("currency_rate",$currency_rate,$expiry,"/");
		setcookie("currency",$currency_name,$expiry,"/");
		$_SESSION['currency_rate'] 	= $currency_rate;
		$_SESSION['currency'] 			= $currency_name;
	}
}

if(isset($_SESSION['currency_rate']) || isset($_COOKIE['currency_rate'])){
    $cur_rate = isset($_SESSION['currency_rate']) ? $_SESSION['currency_rate'] : $_COOKIE['currency_rate'];
    $currency = $_SESSION['currency'];
}else{
    $cur_rate = 1;
    $currency = $_SESSION['currency'];
}


// function for to get currency rate from API
function CallCurrencyAPI($want){
	$curl = curl_init();
	curl_setopt_array($curl, [
		CURLOPT_URL => "https://currency-converter-by-api-ninjas.p.rapidapi.com/v1/convertcurrency?have=USD&want=$want&amount=1",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "GET",
		CURLOPT_HTTPHEADER => [
			"X-RapidAPI-Host: currency-converter-by-api-ninjas.p.rapidapi.com",
			"X-RapidAPI-Key: 663e972d7amsh2861a4550ddb000p16da26jsnf2a10b4faf1d"
		],
	]);

	$response = curl_exec($curl);
	$result = json_decode($response,true);
	$err = curl_error($curl);
	curl_close($curl);

	if (!$err){
		// print_r($result);
		$want = $result['new_amount'];
	}
	return $want;
}

// function to display currency tab or button 
function displayCurrency($currency,$user_set){
	if($currency == "USD" && $user_set != "USD"){
    $list_show = "
      <li><a href='?curType={$user_set}'>{$user_set}</a></li>";                        
  }else{
  	$list_show ="<li><a href='?curType=USD'>USD</a></li>";
  }
 	return $list_show;
}



// remaining time for today for cookie expiry time
function TodayRemainingTime($today_date){
	$now = new DateTime();
	$future_date = new DateTime($today_date);
	$interval = $future_date->diff($now);
	$b =  $interval->format("%a days, %h hours, %i minutes, %s seconds");
	return strtotime($b);
}
?>

