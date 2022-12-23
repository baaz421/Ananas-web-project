<?php 
include "../db_connnection.php";
$id_pro = $_POST["deal_pro_Id"];
$status_value_one = 1;
$status_value_zero = 0;
$current_date = $date;


$sql_check ="SELECT * FROM deal WHERE p_id = {$id_pro} AND deal_status = 1";
$result =mysqli_query($conn,$sql_check) or die("Query failed..!");

$deal_data = mysqli_fetch_assoc($result);

if($deal_data['zone'] == "red"){

	$deal_id = $deal_data['DID'];

	$sql ="UPDATE deal SET deal_status = '{$status_value_zero}', update_time = '{$current_date}' WHERE DID = {$deal_id}";

		if(mysqli_query($conn,$sql)){
			$sql_update_pro = "UPDATE products SET deal_check ='{$status_value_zero}' WHERE ID = {$id_pro}";
	    	mysqli_query($conn, $sql_update_pro);

	    	$sql_participators = "SELECT * FROM participators WHERE deal_id = $deal_id AND status = 1";
	    	$run_sql_participators = mysqli_query($conn, $sql_participators);
	    	if(mysqli_num_rows($run_sql_participators) > 0){
	    		while ($row = mysqli_fetch_assoc($run_sql_participators)) {
	    			$unit_price = $row['unit_price'];
	    			$user_id = $row['user_id'];
	    			$method = 0;//refund method
	    			$p_id = $row['part_id'];

	    			$insert_amount = "INSERT INTO deposite_amount (u_id, d_amount, refund_amount,method, d_date) VALUES('$user_id', '$unit_price', '$unit_price','$method', '$current_date')";
					$run_insert_amount = mysqli_query($conn, $insert_amount);
					if($run_insert_amount){
						$check_cb = "SELECT * FROM current_balance WHERE u_id = '$user_id'";
						$run_check_cb = mysqli_query($conn,$check_cb);
						if(mysqli_num_rows($run_check_cb) > 0){
							$fetch = mysqli_fetch_assoc($run_check_cb);
							$cb_amount = $fetch['cb_amount'];
							$new_cb = $cb_amount + $unit_price;
							$add_cb = "UPDATE current_balance SET cb_amount = '$new_cb', cb_date = '$current_date' WHERE u_id = '$user_id'";
							if(mysqli_query($conn, $add_cb)){
								$sql_update_participator = "UPDATE participators SET status = 2 WHERE part_id = $p_id";
								mysqli_query($conn,$sql_update_participator);
							}

						}
	    			}
	    		}
	    	}


			echo 1;
		}else{
			echo 0;
		}

}else{

	echo 2;
	
}