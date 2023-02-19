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

function joinDate($date){
  $a = strtotime($date);
  $b = date("l, dS F Y",$a);
  return $b;
}

function current_bal($u_id, $conn){
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

function RunningDeals($conn,$u_id){
  $sql_running_deal = "SELECT DISTINCT deal_id FROM participators WHERE user_id = $u_id AND status = 1";
  $run_sql_running_deal = mysqli_query($conn,$sql_running_deal);
  return mysqli_num_rows($run_sql_running_deal);
}

function TotalDeals($conn,$u_id){
  $sql_running_deal = "SELECT DISTINCT deal_id FROM participators WHERE user_id = $u_id";
  $run_sql_running_deal = mysqli_query($conn,$sql_running_deal);
  return mysqli_num_rows($run_sql_running_deal);
}

function CompletedDeals($conn,$u_id){
  $sql_running_deal = "SELECT DISTINCT deal_id FROM participators WHERE user_id = $u_id AND status= 0";
  $run_sql_running_deal = mysqli_query($conn,$sql_running_deal);
  return mysqli_num_rows($run_sql_running_deal);
}

// progres bar 
// function progressBar($prog_percen,$prog_color){
//   $p = '
//   <div class="progress" style="height:18px; font-size: 14px" id="deal-progress">
//     <div class="progress-bar progress-bar-striped progress-bar-animated '.$prog_color.' text-center" role="progressbar" style="width: '.$prog_percen.'%; height:20px" aria-valuemin="0" aria-valuemax="100"> 
//       <span class="font-weight-bold text-dark" style = "position: absolute; right:0; left:0;">'.$prog_percen.' %</span>
//     </div>
//   </div>
//   ';
//   return $p;
// }

// calculate multiple qty with unit price and if  percentage applies 
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

// calculate unit price if percentage is given
function cal_unit_price_with_percentage($unit_price,$percentage){
  if($percentage == 0){
    $amount = $unit_price;
  }else{
    $discount_amount = $unit_price / 100 * $percentage;
    $multipy_amount = $unit_price - $discount_amount;
    $amount = $multipy_amount;
  }
  return $amount;
}

function progressBar($prog_percen,$prog_color){
  if($prog_color == "bg-danger"){
    $name = "Red Zone";
    $text_class = "text-danger";
    $prog_border =  "border-danger";
  }else if($prog_color == "bg-warning"){
    $name = "Orange Zone";
    $text_class = "text-warning";
    $prog_border = "border-warning";
  }else{
    $name = "Green Zone";
    $text_class = "text-success";
    $prog_border = "border-success";
  }
  $p = '<p class ="'.$text_class.'">'.$name.'</p>
        <div class="progress border '.$prog_border.'">        
	        <div class="progress-bar '.$prog_color.'" role="progressbar" style="width: '.$prog_percen.'%"  aria-valuemin="0" aria-valuemax="100">
	        </div>
	      </div>
	      <p class = "mt-1">'.$prog_percen.'%</p>
  ';
  return $p;
}

// function Progress bar for red, orange, green zone
function zoneProgress($deal_id,$conn,$date){
  $deal_sql = "SELECT * FROM deal WHERE DID = {$deal_id}";
  $run_deal_sql = mysqli_query($conn, $deal_sql);

  // $run_deal_sql = GetDealData($conn,$deal_id);
  if(mysqli_num_rows($run_deal_sql) > 0){
    $row          = mysqli_fetch_assoc($run_deal_sql);
    $zone         = $row['zone'];
    $d_id         = $row['DID'];
    $pro_id       = $row['p_id'];
    $admin_id     = $row['a_id'];
    $estimate_amt = $row['e_value'];
    $create_time  = $row['create_time'];    
    $winner       = $row['winner_id'];
    switch (true) {
      case ($zone == "red"): // case red zone
        $red_method     = $row['red_method'];
        $red_live_amt   = $row['red_am'];
        $change_method  = "orange";
        if($red_method == "amount"){ // Red Amount method code          
          $percent  = GetPercentage($red_live_amt,$estimate_amt);          
          if($percent >= 100){        
            $change_red_sql = "UPDATE deal SET zone = '{$change_method}',e_time_red = '{$date}', s_time_oran = '{$date}', update_time = '{$date}' WHERE DID ={$d_id}";
            mysqli_query($conn, $change_red_sql);
            $prog_percen  = 100;
            $prog_color   = "bg-danger";  
          }else{
            $prog_percen  = $percent;
            $prog_color   = "bg-danger";
          }        
        }else{ // Red Time method code
          $percent = DatePercentage($row['s_time_red'],$row['e_time_red'],$date);
          if($percent >= 100){
            if($red_live_amt == ""){
              $change_red_sql = "UPDATE deal SET zone = 'fail', e_time_red = '{$date}', update_time = '{$date}', deal_status = 0, red_am = 0 WHERE DID ={$d_id}";
              if(mysqli_query($conn, $change_red_sql)){
              $update_pro_sql = "UPDATE products SET deal_check = 0 WHERE ID = {$pro_id}";
              mysqli_query($conn, $update_pro_sql);
              $prog_percen  = 0;
              $prog_color   = "bg-danger";
              }
            }else{          
            $change_red_sql = "UPDATE deal SET zone = '{$change_method}', e_time_red = '{$date}', s_time_oran = '{$date}', update_time = '{$date}' WHERE DID ={$d_id}";
            mysqli_query($conn, $change_red_sql);
            $prog_percen  = 100;
            $prog_color   = "bg-danger";
            }
          }else{
            $prog_percen = $percent;
            $prog_color = "bg-danger";
          }
        }          
      break;// red zone case close here
      case ($zone == "orange"): // case orange zone
        $orange_method = $row['orange_method'];
        $oran_live_amt = $row['oran_am'];
        $change_method = "green";
        if($orange_method == "percentage"){ // Orange Percentage method code
          $orange_amount = $row['oran_c_amt'];
          $percent = GetPercentage($oran_live_amt,$orange_amount);          
          if($percent >= 100){            
            $change_oran_sql = "UPDATE deal SET zone = '{$change_method}', e_time_oran = '{$date}', s_time_green = '{$date}', update_time = '{$date}' WHERE DID ={$d_id}";
            mysqli_query($conn, $change_oran_sql);
            $prog_percen = 100;
            $prog_color = "bg-warning";
          }else{
            $prog_percen = $percent;
            $prog_color = "bg-warning";
          }
        }else{ // Orange Time method code
          $days             = $row['oran_days'];
          $end_date         = AddDays($row['s_time_oran'],$days);
          $orange_end_date  = $row['e_time_oran'];
          if($orange_end_date == ""){
            $update_oran_end_date_sql = "UPDATE deal SET e_time_oran = '{$end_date}' WHERE DID = {$d_id}";
            mysqli_query($conn, $update_oran_end_date_sql);
          }
          $percent = DatePercentage($row['s_time_oran'],$end_date,$date);
          if($percent >= 100){            
            $change_oran_sql = "UPDATE deal SET zone = '{$change_method}', s_time_green = '{$date}', update_time = '{$date}' WHERE DID ={$d_id}";
            mysqli_query($conn, $change_oran_sql);
            $prog_percen = 100;
            $prog_color = "bg-warning";
          }else{
            $prog_percen =$percent;
            $prog_color = "bg-warning";
          }          
        }
      break;
      case ($zone == "green"): // case green zone
        $green_method   = $row['green_method']; // getting method
        $green_live_amt = $row['green_am'];
        $change_method  = "completed";
        if($green_method == "percentage"){ // Green Percentage method code
          $green_amount = $row['green_c_amt'];
          $percent = GetPercentage($green_live_amt,$green_amount);
          // if amount reached 100% this proccess
          if($percent >= 100){
            // now get data from participator table to get winner
            $winner_id = PickWinner($d_id,$conn);
            // after winner get update deal table for winner.
            if($winner == null){
              $update_winner_id = "UPDATE deal SET zone = '{$change_method}', winner_id = $winner_id, deal_status = 0, update_time = '{$date}' WHERE DID = $d_id";           
              // inserting into winner table.
              if(mysqli_query($conn,$update_winner_id)){
                $winner_sql = "INSERT INTO winner (user_id, admin_id, deal_id, start_date, end_date, user_confirm, vendor_confirm, status, created_date) VALUES ('$winner_id','$admin_id','$d_id','$create_time','$date',1,1,0,'$date')";
                mysqli_query($conn,$winner_sql);
                // if deal table change done then in product table update
                $update_pro_sql = "UPDATE products SET deal_check = 0 WHERE ID = {$pro_id}";
                mysqli_query($conn, $update_pro_sql);
              }
            }
            $prog_percen = 100;
            $prog_color = "bg-success";         
          }else{
            $prog_percen = $percent;
            $prog_color = "bg-success";
          }          
        }else{ // Green Time method code);
          $days           = $row['green_days'];
          $end_date       = AddDays($row['s_time_green'],$days);
          $green_end_date = $row['e_time_green'];
          if($green_end_date == ""){
            $update_green_end_date_sql = "UPDATE deal SET e_time_green = '{$end_date}' WHERE DID = {$d_id}";
            mysqli_query($conn, $update_green_end_date_sql);
          }
          $percent = DatePercentage($row['s_time_green'],$end_date,$date);
          // if time reached 100% this proccess
          if($prog_percen >= 100){
            // now get data from participator table to get winner
            $winner_id = PickWinner($d_id,$conn);
            // after winner get update deal table for winner.
            if($winner == null){
              $update_winner_id = "UPDATE deal SET zone = '{$change_method}', winner_id = $winner_id, deal_status = 0, update_time = '{$date}' WHERE DID = $d_id";           
              // inserting into winner table.
              if(mysqli_query($conn,$update_winner_id)){
                $winner_sql = "INSERT INTO winner (user_id, admin_id, deal_id, start_date, end_date, user_confirm, vendor_confirm, status, created_date) VALUES ('$winner_id','$admin_id','$d_id','$create_time','$date',1,1,0,'$date')";
                mysqli_query($conn,$winner_sql);
                // if deal table change done then in product table update
                $update_pro_sql = "UPDATE products SET deal_check = 0 WHERE ID = {$pro_id}";
                mysqli_query($conn, $update_pro_sql);
              }
            }
            $prog_percen = 100;
            $prog_color = "bg-success";
          }else{
            $prog_percen = $percent;
            $prog_color = "bg-success";
          }          
        }
      break;
    }
  }
  return progressBar($prog_percen,$prog_color);
}

// Selecting from participators for winner 
function PickWinner($d_id,$conn){
  // now get data from participator table to get winner
  $sql_participators = "SELECT * FROM participators WHERE deal_id = $d_id AND status = 1";
  $run_sql_participators = mysqli_query($conn,$sql_participators);
  $user_winner_ids = array();
  while ($row = mysqli_fetch_assoc($run_sql_participators)) {
    $part_id = $row['part_id'];
    $sql_update_participator = "UPDATE participators SET status = 0 WHERE part_id = $part_id";
    mysqli_query($conn,$sql_update_participator);
    $user_winner_ids[] = $row['user_id'];
  }
    shuffle($user_winner_ids);
    return $user_winner_ids[0];
}

// getting percentage of two amounts with comparing amount
function GetPercentage($present_amt,$compare_amt){
  $prog_percen = round(($present_amt/$compare_amt)*100,2);
  return $prog_percen;
}

// adding days for which runs on time method
function AddDays($s_date,$days = 0){
  $start_date   = strtotime($s_date);
  $add_days     = " + $days day";
  $add_end_date = date('d-m-Y H:i',strtotime($add_days, $start_date));
  return $add_end_date;
}

// date percentage function
function DatePercentage($s_date,$e_date,$c_date){
  $start_date   = strtotime($s_date);
  $end_date     = strtotime($e_date);
  $current_date = strtotime($c_date);
  $range        = $end_date-$start_date;
  $value        = $current_date-$start_date;
  $calculation  = round(($value/$range)*100,2);
  return $calculation;
}

?>