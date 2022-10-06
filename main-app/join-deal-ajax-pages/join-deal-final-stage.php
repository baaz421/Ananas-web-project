<?php 
// join-deal-final-stage.php
require_once "../db_connnection.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(isset($_POST['user_id']) && $_POST['user_id'] != null && isset($_POST['checkout_id'])){
  $checkout_id = $_POST['checkout_id'];

  $get_checkout_data = "SELECT * FROM checkout WHERE ID = '{$checkout_id}'";
  $run_checkout_data = mysqli_query($conn,$get_checkout_data);
  if(mysqli_num_rows($run_checkout_data) > 0){
    $fetch_checkout_data = mysqli_fetch_assoc($run_checkout_data);
    // variables to update deal table and participate table
    $deal_ids 	   = $fetch_checkout_data['deal_ids'];
    $deal_qtys 	   = $fetch_checkout_data['deal_qtys'];
    $user_id 		   = $fetch_checkout_data['user_id'];
    $percentage    = $fetch_checkout_data['coupon_per'];
    $total_amount  = $fetch_checkout_data['total'];

    $deal_explode       = explode("-",$deal_ids);
    $qtys_explode       = explode("-",$deal_qtys);
    $combine_deals_qtys = array_combine($deal_explode, $qtys_explode);

    $user_current_bal = user_current_bal($user_id, $conn);
    $user_new_bal = $user_current_bal - $total_amount;
    // check user current balance 
    if($user_current_bal >= $total_amount){
      // updating deal table and inserting in participate table 
        foreach ($combine_deals_qtys as $d_id => $d_qty) {
          $check_dealTable_updated = CheckZone($d_id,$conn,$d_qty,$percentage);
          $unit_price_singal = get_unit_price($d_id,$conn,$percentage);
          $s_f_p = 1;
            if($check_dealTable_updated == "error"){
              echo "error";//data not updated or server down
            }else{
              while ($d_qty>=1){
                // instering participating table for user 
                $insert_participate = "INSERT INTO 
                participators(user_id, deal_id, deal_zone, unit_price, status, join_date) 
                VALUES('{$user_id}','{$d_id}','{$check_dealTable_updated}','{$unit_price_singal}','{$s_f_p}','{$date}')";
                mysqli_query($conn,$insert_participate);
                $d_qty--;
              }            
            } 
        }
      // update user balance after deal confirm
        $update_user_bal = "UPDATE current_balance SET cb_amount = '{$user_new_bal}', cb_date = '{$date}' WHERE u_id ={$user_id}";
        if(mysqli_query($conn,$update_user_bal)){
          // insert into deposite table for amount
          $method = 2;
          $insert_amount = "INSERT INTO deposite_amount (u_id, d_amount, method, d_date) VALUES('$user_id', '$total_amount','$method', '$date')";
          mysqli_query($conn, $insert_amount);

          // udate check out table with balance and status
          $status = 1;
          $update_checkout_data = "UPDATE checkout SET current_bal = '{$user_current_bal}',   available_bal = '{$user_new_bal}', status = '{$status}', created_date = '{$date}' WHERE ID ={$checkout_id}";
          mysqli_query($conn,$update_checkout_data);

          // remove from cart table
          $all_cart_ids = combine_cart_ids($conn,$user_id);
            foreach ($all_cart_ids as $cart_id){
              $remove_from_cart = "DELETE FROM cart WHERE ID = {$cart_id}";
              mysqli_query($conn,$remove_from_cart);
            }
            echo 0; // deal successfully confirmed
        }
    }else{
      echo -1; // not enough balance
    }   

  }else{
    echo -3; // record not found
  }
}else{
  echo "error"; // something went wrong msg
}


// function Progress bar for red, orange, green zone
function CheckZone($deal_id,$conn,$qty,$per){
  $deal_sql = "SELECT * FROM deal WHERE DID = {$deal_id}";
  $run_deal_sql = mysqli_query($conn, $deal_sql);
    $deal_row     = mysqli_fetch_assoc($run_deal_sql);
    $zone         = $deal_row['zone'];
    $d_id         = $deal_row['DID'];
    $unit_price   = $deal_row['unit_price'];
    $user_amount  = cal_unit_price_with_qty($unit_price,$qty,$per);
      if($zone == "red"){ // case red zone
        // update amount to specific zone
          $red_amt     = $deal_row['red_am'];
            if($red_amt == ""){
              $red_amount = 0;
            }else{
              $red_amount = $red_amt;
            }
          $update_amount  = $red_amount + $user_amount;

        // update number of members for specific zone
          $red_members = $deal_row['total_m_red'];
            if($red_members == ""){
              $red_member = $qty;
            }else{
              $red_member = $red_members + $qty;
            }
        $change_red_sql = "UPDATE deal SET red_am = '{$update_amount}', total_m_red = '{$red_member}' WHERE DID ={$d_id}";
          if(mysqli_query($conn, $change_red_sql)){
            $output_zone = "red";
          }else{
            $output_zone = "error";
          }
      }elseif($zone == "orange"){ // case orange zone
        // update amount to specific zone
          $orange_amt = $deal_row['oran_am'];        
            if($orange_amt == ""){
              $orange_amount = 0;
            }else{
              $orange_amount = $orange_amt;
            }
          $update_amount = $orange_amount + $user_amount;

        // update number of members for specific zone
          $orange_members = $deal_row['total_m_oran'];
            if($orange_members == ""){
              $orange_member = $qty;
            }else{
              $orange_member = $orange_members + $qty;
            }
        $change_orange_sql = "UPDATE deal SET oran_am = '{$update_amount}', total_m_oran = '{$orange_member}' WHERE DID ={$d_id}";
          if(mysqli_query($conn, $change_orange_sql)){
            $output_zone = "orange";
          }else{
            $output_zone = "error";
          }
      }elseif($zone == "green"){ // case green zone
        // update amount to specific zone
          $green_amt   = $deal_row['green_am'];        
            if($green_amt == ""){
              $green_amount = 0;
            }else{
              $green_amount = $green_amt;
            }
          $update_amount  = $green_amount + $user_amount;

        // update number of members for specific zone
          $green_members = $deal_row['total_m_green'];
            if($green_members == ""){
              $green_member = $qty;
            }else{
              $green_member = $green_members + $qty;
            }
        $change_green_sql = "UPDATE deal SET green_am = '{$update_amount}', total_m_green = '{$green_member}' WHERE DID ={$d_id}";
          if(mysqli_query($conn, $change_green_sql)){
            $output_zone = "green";
          }else{
            $output_zone = "error";
          }
      }
  return $output_zone;
}

// calculate unit price with quantity and if  percentage applies 
function cal_unit_price_with_qty($unit_price,$qty,$percentage){
  if($percentage == 0){
    $amount = $unit_price * $qty;
  }else{
    $discount_amount = $unit_price / 100 * $percentage;
    $multipy_amount = $unit_price - $discount_amount;
    $amount = $multipy_amount * $qty;
  }
  return $amount;
}

// retrive user's current balance 
function user_current_bal($u_id, $conn){
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

// combine cart ids 
function combine_cart_ids($conn,$user_id){
  $get_Cartlist = "SELECT * FROM cart WHERE user_id = '{$user_id}'";
  $run_get_Cartlist = mysqli_query($conn, $get_Cartlist);
  if(mysqli_num_rows($run_get_Cartlist) > 0){
    $cart_ids = array();
    while($row = mysqli_fetch_assoc($run_get_Cartlist)){      
      $ids_cart = $row['ID'];
      $cart_ids[]= $ids_cart;         
      }
    }
    return $cart_ids;
}

// get singal unit price with percentage
function get_unit_price($deal_id,$conn,$percentage){
  $deal_sql = "SELECT * FROM deal WHERE DID = {$deal_id}";
  $run_deal_sql = mysqli_query($conn, $deal_sql);
    $deal_row     = mysqli_fetch_assoc($run_deal_sql);
    $unit_price   = $deal_row['unit_price'];

    if($percentage == 0){
      $amount = $unit_price;
    }else{
      $discount_amount = $unit_price / 100 * $percentage;
      $multipy_amount = $unit_price - $discount_amount;
      $amount = $multipy_amount;
    }
      
  return $amount;
}