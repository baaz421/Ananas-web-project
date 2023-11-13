<?php
// function-for-dashboard.php

function countZone($conn,$zone,$status = 1){
	$sql = "SELECT zone FROM deal WHERE zone = '{$zone}' AND deal_status = $status";
	$run = mysqli_query($conn, $sql);
	$no_of = mysqli_num_rows($run);
	return $no_of;
}

function countTotalDeals($conn){
	$sql = "SELECT * FROM deal";
	$run = mysqli_query($conn, $sql);
	$no_of = mysqli_num_rows($run);
	return $no_of;
}