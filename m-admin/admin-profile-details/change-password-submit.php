<?php
//change-password-submit.php
//print_r($_POST);
require "../db_connnection.php";
session_start();
$a_id = $_SESSION['ma_id'];

if(isset($_POST['o_pass']) AND isset($_POST['n_pass'])){
	$old_pass 	=mysqli_real_escape_string($conn, $_POST['o_pass']);
    $new_pass	=mysqli_real_escape_string($conn, $_POST['n_pass']);

	$sql_old_pass_check = "SELECT a_password FROM m_admin WHERE AID = {$a_id}";

	$run_check_pass = mysqli_query($conn, $sql_old_pass_check);

		if(mysqli_num_rows($run_check_pass) > 0){
		$get_old_pass = mysqli_fetch_assoc($run_check_pass);
		$old_pass_db = $get_old_pass['a_password'];

			if(password_verify($old_pass, $old_pass_db)){
				$enc_new_pass = password_hash($new_pass, PASSWORD_BCRYPT);
				$update_time = $date;
				$sql_change_pass = "UPDATE m_admin SET a_password = '{$enc_new_pass}', a_updatetime = '{$update_time}' WHERE AID = {$a_id}";
				$run_change_pass = mysqli_query($conn,$sql_change_pass);
				echo 2;
				exit();
		    }else{
		        echo 1; // "Incorrect password!";
		    }
		}	

}else{
	echo 0;
}

?>