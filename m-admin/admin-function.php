<?php
//admin-function.php

// date from data base with time and am and pm
function FormatDateFromDB($date){
	$join_date = $date;
	$date1 = substr($join_date,0,-12);
	$date_rep = str_replace(" ", "-", $date1);
	$str_to_time = strtotime($date_rep);
	$create_time = date("l, F d-Y",$str_to_time);//Thursday, January 01-1970
	return $create_time;
}

function joinDate($date){
	$a = strtotime($date);
	$b = date("l, F d-y",$a);//Saturday, March 18-23 
	return $b;
}

?>