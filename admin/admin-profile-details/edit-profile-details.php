<?php 
//edit-profile-details.php

require "../db_connnection.php";
session_start();

//print_r($_POST)."<br>";

	$admin_name 		=mysqli_real_escape_string($conn, $_POST['admin-r-name']);
	$admin_username 	=mysqli_real_escape_string($conn, $_POST['admin-r-username']);
	$admin_email 		=mysqli_real_escape_string($conn, $_POST['admin-r-email']);
	$admin_gender 		=mysqli_real_escape_string($conn, $_POST['admin-r-gender']);

	$a_phone 			=mysqli_real_escape_string($conn, $_POST['admin-r-phone']);
	$admin_phone 		=str_replace(' ', '', $a_phone);
	$admin_phone_code 	=mysqli_real_escape_string($conn, $_POST['admin-r-phonecode']);
	$admin_country 		=mysqli_real_escape_string($conn, $_POST['admin-r-contryname']);

	$admin_dateofbirth 	=mysqli_real_escape_string($conn, $_POST['admin-r-birthdate']);
	$date_format 		= str_replace('-', '-', $admin_dateofbirth);
	$newDate_format 	= date("d-m-Y", strtotime($date_format));
	
	$update_time 		= $date;
	$admin_id			= $_SESSION['a_id'];


 	 //echo $admin_name."-".$admin_email ."-".$admin_gender ."-".$admin_username ."-".$admin_phone ."-". $update_time."-".$admin_phone_code."-". $admin_country ."-".$newDate_format."-".$admin_id;

   $sql_update_admin_details = "UPDATE admin SET 
   a_username 		='{$admin_username}',
   a_fullname			='{$admin_name}',
   a_email 				='{$admin_email}',
   a_gender 			='{$admin_gender}',
   a_phone 				='{$admin_phone}',	
   a_phonecode 		= {$admin_phone_code},
   a_country 			='{$admin_country}',
   a_dateofbirth 	='{$newDate_format}',
   a_updatetime		='{$update_time}'
   WHERE AID 			= {$admin_id}";
 //echo $sql_update_admin_details;
   if(mysqli_query($conn,$sql_update_admin_details)){
		echo 1;
	}else{
		echo 0;
	}



?>