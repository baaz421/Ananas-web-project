<?php 
include "../db_connnection.php";
$id_pro = $_POST["deal_pro_Id"];
$status_value_one = 1;
$status_value_zero = 0;
$current_date = date("d-m-Y H:i");


$sql_check ="SELECT deal_status, zone FROM deal WHERE p_id = {$id_pro} AND deal_status = 1";
$result =mysqli_query($conn,$sql_check) or die("Query failed..!");

$deal_data = mysqli_fetch_assoc($result);

if($deal_data['zone'] == "red"){

	$sql ="UPDATE deal SET deal_status = '{$status_value_zero}', update_time = '{$current_date}' WHERE p_id = {$id_pro}";

		if(mysqli_query($conn,$sql)){
			$sql_update_pro = "UPDATE products SET deal_check ='{$status_value_zero}' WHERE ID = {$id_pro}";
	    	$update_pro_res = mysqli_query($conn, $sql_update_pro);
			echo 1;
		}else{
			echo 0;
		}

}else{

	echo 2;
	
}







// $sql_check ="SELECT deal_status FROM deal WHERE p_id = {$id_pro}";
// $result =mysqli_query($conn,$sql_check) or die("Query failed..!");

// $sta_data = mysqli_fetch_assoc($result);
// $str = implode('|', $sta_data);

// if($str == 0){
// 	$sql ="UPDATE deal SET deal_status = '{$status_value_one}' WHERE p_id = {$id_pro}";

// 		if(mysqli_query($conn,$sql)){
// 			$sql_update_pro = "UPDATE products SET deal_check ='{$status_value_one}' WHERE ID = {$id_pro}";
// 	    	$update_pro_res = mysqli_query($conn, $sql_update_pro);
// 			echo 1;
// 		}else{
// 			echo 0;
// 		}

// }else{
// 	$sql ="UPDATE deal SET deal_status = '{$status_value_zero}' WHERE p_id = {$id_pro}";

// 		if(mysqli_query($conn,$sql)){
// 			$sql_update_pro = "UPDATE products SET deal_check ='{$status_value_zero}' WHERE ID = {$id_pro}";
// 	    	$update_pro_res = mysqli_query($conn, $sql_update_pro);
// 			echo 1;
// 		}else{
// 			echo 0;
// 		}
// }