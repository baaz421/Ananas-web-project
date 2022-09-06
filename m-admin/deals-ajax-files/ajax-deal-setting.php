<?php 
//ajax-deal-setting.php
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

require_once "../db_connnection.php";

// orange zone update
if(isset($_POST['o_p']) AND isset($_POST['o_t'])){

	$o_p 	= mysqli_real_escape_string($conn,$_POST['o_p']);
	$o_t 	= mysqli_real_escape_string($conn,$_POST['o_t']);
	$o_id 	= mysqli_real_escape_string($conn,$_POST['o_id']);
	$o_m 	= mysqli_real_escape_string($conn,$_POST['o_m']);
	//echo $o_p ."--".$o_t."--".$o_m."--".$o_id."----";
	$sql_update_o_zone = "UPDATE deal_setting SET d_time = {$o_t}, d_percentage = {$o_p}, d_method = '{$o_m}' WHERE ID = {$o_id}";
	if(mysqli_query($conn,$sql_update_o_zone)){
		echo "1";
	}else{
		echo $sql_update_o_zone;
		//echo "0";
	}

}

// green zone update
if(isset($_POST['g_p']) AND isset($_POST['g_t'])){

	$g_p 	= mysqli_real_escape_string($conn,$_POST['g_p']);
	$g_t 	= mysqli_real_escape_string($conn,$_POST['g_t']);
	$g_id 	= mysqli_real_escape_string($conn,$_POST['g_id']);
	$g_m 	= mysqli_real_escape_string($conn,$_POST['g_m']);
	//echo $g_p ."--".$g_t."--".$g_m."--".$g_id."----";
	$sql_update_g_zone = "UPDATE deal_setting SET d_time = {$g_t}, d_percentage = {$g_p}, d_method = '{$g_m}' WHERE ID = {$g_id}";
	if(mysqli_query($conn,$sql_update_g_zone)){
		echo "1";
	}else{
		echo $sql_update_g_zone;
		//echo "0";
	}
	
}
?>