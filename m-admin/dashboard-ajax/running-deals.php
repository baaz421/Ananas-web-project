<?php
// running-deals.php
require_once "../db_connnection.php";
include "function-for-dashboard.php";

$red =  countZone($conn,'red');
$orange =  countZone($conn,'orange');
$green =  countZone($conn,'green');
$totalDeals =  countTotalDeals($conn);
$totalCanceled =  countZone($conn,'cancelled',0);
$totalFailed =  countZone($conn,'fail',0);
$totalCompleted =  countZone($conn,'completed',0);


$output = [
'red' => $red,
'orange' => $orange,
'green' => $green,
'totalDeals' => $totalDeals,
'totalCanceled' => $totalCanceled,
'totalFailed' => $totalFailed,
'totalCompleted' => $totalCompleted,
];
$a = json_encode($output);
echo $a;