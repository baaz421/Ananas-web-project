<!-- functions.php -->
<?php 
function DateDisplay($date){
	$a = strtotime($date);
	$b = date("l, d F Y",$a);
	return $b;
}
function DateDisplayWithTime($date){
	$a = strtotime($date);
	$b = date("l, d F Y : h i A",$a);
	return $b;
}

function current_bal($u_id, $conn)
{
	$check_u_cb = "SELECT * FROM current_balance WHERE u_id ='$u_id'";
	$run_check_u_cb = mysqli_query($conn,$check_u_cb);
	if(mysqli_num_rows($run_check_u_cb) > 0){
		$fetch = mysqli_fetch_assoc($run_check_u_cb);
		$amount = $fetch['cb_amount'];
		return $amount;
	}else{
		$amount = 0;
		return $amount;
	}
}
 ?>