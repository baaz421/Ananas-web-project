<?php
//add-to-Wishlist.php
require "../db_connnection.php";
require "products-functions.php";


if(isset($_POST['p_id']) && isset($_POST['u_id'])){
	$p_id = mysqli_real_escape_string($conn, $_POST['p_id']);
	$u_id = mysqli_real_escape_string($conn, $_POST['u_id']);
	$time = $date;

	$check_wishlist = "SELECT product_id FROM wishlist WHERE user_id = '{$u_id}'";
	$run_check_wishlist = mysqli_query($conn, $check_wishlist);
	$row_data = array();
	while($row = mysqli_fetch_array($run_check_wishlist))
    $row_data[] = $row;

	$check_pro = searchForPid($p_id,$row_data);

	if(mysqli_num_rows($run_check_wishlist) > 0){
		if($check_pro == ""){
			$add_to_wishlist = "INSERT INTO wishlist (user_id, product_id, time) VALUES ('{$u_id}','{$p_id}','$time')";
			$run_add_to =mysqli_query($conn, $add_to_wishlist);
			if($run_add_to){
				echo 1;
				exit();
			}
		}else{
				echo 2;
				exit;
			}

	}else{
		$add_to_wishlist = "INSERT INTO wishlist (user_id, product_id, time) VALUES ('{$u_id}','{$p_id}','$time')";
		$run_add_to =mysqli_query($conn, $add_to_wishlist);
		if($run_add_to){
			echo 1;
			exit();
		}
	}

}




// 	if(mysqli_num_rows($run_check_wishlist) > 0){
// 		$fetch_wishlist = mysqli_fetch_assoc($run_check_wishlist);
//     //     	if(in_array($p_id,$fetch_wishlist)){
//     //     		echo 2;
//     //     		exit();
//     //     	}else{
//     //     		$add_to_wishlist = "INSERT INTO wishlist (user_id, product_id, time) VALUES ('{$u_id}','{$p_id}','$time')";
// 				// $run_add_to =mysqli_query($conn, $add_to_wishlist);
// 				// if($run_add_to){
// 				// 	echo 1;
// 				// 	exit();
// 				// }
//     //     	}
// 	// }else{
// 	// 	$add_to_wishlist = "INSERT INTO wishlist (user_id, product_id, time) VALUES ('{$u_id}','{$p_id}','$time')";
// 	// 	$run_add_to =mysqli_query($conn, $add_to_wishlist);
// 	// 	if($run_add_to){
// 	// 		echo 1;
// 	// 		exit();
// 	// 	}
// 	// 	//echo "nooo";
// 	 }
