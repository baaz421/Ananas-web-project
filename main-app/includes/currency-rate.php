<?php
// currency-rate.php
$time = time();
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
			$_SESSION['currency'] 			= $currency;
			echo "set new cookie and new session";
		}else{
			$currency_rate 							= $_COOKIE['currency_rate'];
			$n_currency 								= $_COOKIE['currency'];
			$_SESSION['currency_rate'] 	= $currency_rate;
			$_SESSION['currency'] 			= $n_currency;
			echo "set old cookie and old session";
		}
	echo "set user id";
	// $_SESSION['currency'] = $currency;
}elseif(isset($_GET['curType']) && $_SESSION['currency_rate'] != $_GET['curType'] && !empty($_GET['curType'])){
	if($_GET['curType'] == "USD"){
		echo "get set USD";
	}else{
		echo "get set else currency";
	}
	
}else{
	$_SESSION['currency'] = "USD";
	$currency = $_SESSION['currency'];
	echo "nothing set ";
}


// changing currency from user 
// if(!isset($_SESSION['currency'])){
// 	$_SESSION['currency'] = "USD";
// }elseif(isset($_GET['curType']) && $_SESSION['currency'] != $_GET['curType'] && !empty($_GET['curType'])){
// 	if($_GET['curType'] == "USD"){
// 		$_SESSION['currency'] = "USD";
// 	}else{
// 		$_SESSION['currency'] = "ar";
// 	}
// }

// setcookie("cur",null,60,"/");
// setcookie("curRate",null,60,"/");

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
function displayCurrency($currency){
	if($currency != "USD"){
    $list_show = "
      <li><a href='?curType={$currency}'>{$currency}</a></li>
      <li><a href='?curType=USD'>USD</a></li>";                        
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

// if(!isset($_COOKIE['cur'])){
// 	$expiry =(60*60*24)+$time;
// 	setcookie("cur","USD",$expiry,"/");
// 	$_SESSION['currency'] = "USD";
// 	// echo 2;
// }elseif(isset($_GET['curType']) && $_COOKIE['cur'] != $_GET['curType'] && !empty($_GET['curType'])){
// 	$new_cur = $_GET['curType'];

// 	if(isset($_COOKIE['cur']) && $_COOKIE['cur'] != $_GET['curType']){	
// 	  $old_cookie = setcookie('cur', null, 60, '/');
// 	  $old_rate = setcookie("curRate", null, 60,"/");
// 	  if($old_cookie && $old_rate){
// 	  	$expiry =(60*60*24)+$time;
// 	  	setcookie("cur",$new_cur,$expiry,"/");
// 	  	$_SESSION['currency'] = $new_cur;
// 	  	// echo 3;
// 		}
// 	}
// }else{
// 	// echo 1;
// }


// 	if(isset($_SESSION['currency']) && $_SESSION['currency'] != "USD"){

// 		if(!isset($_SESSION['done']) || $_SESSION['done'] != "done"){
// 			$want = $_SESSION['currency'];
// 			$cur_rate = CallCurrencyAPI($want);
// 			$expiry =(60*60*24)+$time;
// 			setcookie("curRate",$cur_rate,$expiry,"/");
// 			$_SESSION['cur_rate'] = $cur_rate;
// 			$_SESSION['done'] = "done";
// 		}	
		
// 	}else{
// 		$_SESSION['cur_rate'] = 1;
// 		$expiry =(60*60*24)+$time;
// 		setcookie("curRate",1,$expiry,"/");
// 		unset($_SESSION['done']);
// 	}

// if (!isset($_COOKIE['cur'])){
// 	$_SESSION['currency'] = "USD";
// 	$_SESSION['cur_rate'] = 1;
// 	$expiry =(60*60*24)+$time;
// 		// set cookie for currency rate
// 	setcookie("curRate",1,$expiry,"/");
// 	setcookie("cur","USD",$expiry,"/");
	
// }else if (isset($_GET['curType']) && $_SESSION['currency'] != $_GET['curType'] && !empty($_GET['curType'])) {
// 	if ($_GET['curType'] == "USD"){
// 		$_SESSION['currency'] = "USD";
// 		$_SESSION['cur_rate'] = 1;
// 		$expiry =(60*60*24)+$time;
// 			// set cookie for currency rate
// 		setcookie("curRate",1,$expiry,"/");
// 		setcookie("cur","USD",$expiry,"/");
// 		echo "S-USD";
// 	}else if ($_GET['curType'] == "QAR"){
// 		$want_cur = $_GET['curType'];
// 		$cur_rate = CallCurrencyAPI($want_cur);
// 		$expiry =(60*60*24)+$time;
// 		// set cookie for currency rate
// 		setcookie("curRate",$cur_rate,$expiry,"/");
// 		$_SESSION['cur_rate'] = $cur_rate;
// 		// set cookie for currency name
// 	  setcookie("cur",$want_cur,$expiry,"/");
// 	  $_SESSION['currency'] = $want_cur;
// 	}
// }else{
// 	$_SESSION['currency'] = $_COOKIE['cur'];
// }