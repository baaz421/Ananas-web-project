<?php
// test-pro-email.php
session_start();
require_once "../db_connnection.php";
// get user id 
// $user = $_SESSION['u_id'];
// $checkout_id =$_SESSION['checkout_id'];
$product_image_path = "http://localhost/molla/All-Products-images/";
// $user_detail = Get_User_Email_And_Name($user,$conn);

// function for get user information like email, name, user id.
function Get_User_Email_And_Name($user_id,$conn){
	$get_email_sql = "SELECT id,email, name FROM users WHERE id = $user_id";
	$run_get_email_sql = mysqli_query($conn, $get_email_sql);
	$email = mysqli_fetch_assoc($run_get_email_sql);
	return $email;
}

$deal_id = 37;
function get_user_ids_for_email($deal_id,$conn){
$sql_participators = "SELECT * FROM participators WHERE deal_id = $deal_id AND status = 1";
  $run_sql_participators = mysqli_query($conn, $sql_participators);
  if(mysqli_num_rows($run_sql_participators) > 0){
    $user_ids = array();
    while ($row = mysqli_fetch_assoc($run_sql_participators)) {
      $user_ids[]=$row['user_id'];
    }
    $users = array_unique($user_ids);
  }
  return $users;
}
$get_ids_of_user = get_user_ids_for_email($deal_id,$conn);
$sno = 0;
foreach ($get_ids_of_user as $key => $value) {
  $user_detail = Get_User_Email_And_Name($value,$conn);
  $user_name = $user_detail['name'];
  $user_email = $user_detail['email'];
  $sno += 1;
  echo $sno."user Ids = ".$value." and name is".$user_name."<br>";
}

// $sql = 'SELECT m_admin.a_username AS m_name, m_admin.a_country AS m_country, users.name, users.country, deal.a_id, admin.a_username, admin.a_country, deal.winner_id, deal.DID, deal.create_time, deal.update_time FROM deal LEFT JOIN admin ON deal.a_id = admin.AID INNER JOIN users ON deal.winner_id = users.id LEFT JOIN m_admin ON deal.a_id = m_admin.AID ORDER BY deal.DID DESC'; 
// // echo $sql;
// $run = mysqli_query($conn, $sql);
// $a = array();
// while($row = mysqli_fetch_assoc($run)){
// $a[] = $row;
// }
// echo "<pre>";
// print_r($a);
