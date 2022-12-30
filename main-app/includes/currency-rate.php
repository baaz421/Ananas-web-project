<?php
// currency-rate.php

$time = time();

if (!isset($_COOKIE['cur'])){
	$_SESSION['currency'] = "USD";
	$_SESSION['cur_rate'] = 1;
	$expiry =(60*60*24)+$time;
		// set cookie for currency rate
	setcookie("curRate",1,$expiry,"/");
	setcookie("cur","USD",$expiry,"/");
	
}else if (isset($_GET['curType']) && $_SESSION['currency'] != $_GET['curType'] && !empty($_GET['curType'])) {
	if ($_GET['curType'] == "USD"){
		$_SESSION['currency'] = "USD";
		$_SESSION['cur_rate'] = 1;
		$expiry =(60*60*24)+$time;
			// set cookie for currency rate
		setcookie("curRate",1,$expiry,"/");
		setcookie("cur","USD",$expiry,"/");
	}else if ($_GET['curType'] == "QAR"){
		$want_cur = $_GET['curType'];
		$cur_rate = CallCurrencyAPI($want_cur);
		$expiry =(60*60*24)+$time;
		// set cookie for currency rate
		setcookie("curRate",$cur_rate,$expiry,"/");
		$_SESSION['cur_rate'] = $cur_rate;
		// set cookie for currency name
	  setcookie("cur",$want_cur,$expiry,"/");
	  $_SESSION['currency'] = $want_cur;
	}
}else{
	$_SESSION['currency'] = $_COOKIE['cur'];
}
// echo $_SESSION['currency']."--".$_SESSION['cur_rate']."--".$_COOKIE['cur']."--".$_COOKIE['curRate'];




// setcookie("cur",null,60,"/");
// setcookie("curRate",null,60,"/");


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


	// if(isset($_SESSION['currency']) && $_SESSION['currency'] != "USD"){

	// 	if(!isset($_SESSION['done']) || $_SESSION['done'] != "done"){
	// 		$want = $_SESSION['currency'];
	// 		$cur_rate = CallCurrencyAPI($want);
	// 		$expiry =(60*60*24)+$time;
	// 		setcookie("curRate",$cur_rate,$expiry,"/");
	// 		$_SESSION['cur_rate'] = $cur_rate;
	// 		$_SESSION['done'] = "done";
	// 	}	
		
	// }else{
	// 	$_SESSION['cur_rate'] = 1;
	// 	$expiry =(60*60*24)+$time;
	// 	setcookie("curRate",1,$expiry,"/");
	// 	unset($_SESSION['done']);
	// }
