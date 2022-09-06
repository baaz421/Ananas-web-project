<!-- location.php -->
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>location</title>
</head>
<body>
<h4>City:-  <span id="city"></span></h4>
<h4>Ip Adress:-  <span id="ip"></span></h4>
<h4>Location:-  <span id="loc"></span></h4>
</body>
</html>
<script src="assets/js/jquery.min.js"></script>
<script type="text/javascript">
	$.get('https://ipinfo.io/',function(data){
		$('#city').append(data.city);
		$('#ip').append(data.ip);
		$('#loc').append(data.loc);

		console.log('city: ',data.city);
		console.log('IP Adress: ',data.ip);
		console.log('loaction: ',data.loc);

		console.log(data);
	},'json');
	
</script>
<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function getClientIP(){
  if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
  } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
  } else {
    $ip = $_SERVER['REMOTE_ADDR'];
  }
  return $ip;
}

$ipaddress = getClientIP();

function ip_details($ip) {
  $json = file_get_contents("http://ipinfo.io/{$ip}/geo");
  $details = json_decode($json, true);
  return $details;
}

$details = ip_details($ipaddress);
echo $details['city'];

$ip = $_SERVER['REMOTE_ADDR'];
echo $ip;
$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
echo $details->city;

 ?>