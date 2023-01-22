<?php
// login-ajax-files/test-email.php
// 
// include('../../smtp/simple.php');

//========== sending sms function ==========//
function api_sms_message ($url) {
        $ch = curl_init( );
        $headers = array(
            'Accept: application/json',
            'Content-Type: application/json',);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1 );
        $output = array();
        $output['server_response'] = curl_exec( $ch );
        $curl_info = curl_getinfo( $ch );
        $output['http_status'] = $curl_info[ 'http_code' ];
        $output['error'] = curl_error($ch);
        curl_close( $ch );
        return $output;
    }
function send_sms($num,$msg){
        $msg = urlencode($msg);
        $result = api_sms_message(
            "http://api.smscountry.com/SMSCwebservice_bulk.aspx?User=imh662&passwd=Juman@05&mobilenumber=$num&message=".$msg."&DR=Y&Sid=Qgifts&Mtype=LNG");
        if ($result['http_status'] != 200) {
            return false;
        }
        echo"msg sent successfully to $num";
    }
//========= sending sms function close here ===========//
    
    $num = "919110703891";
    $msg = "testing msg hi baaz";

    // echo send_sms($num,$msg);
