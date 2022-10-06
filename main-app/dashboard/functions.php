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
  if(mysqli_num_rows($run_deal_sql) > 0){
    $row = mysqli_fetch_assoc($run_deal_sql);
    $zone = $row['zone'];
    $d_id = $row['DID'];
    $pro_id = $row['p_id'];
    $winner = $row['winner_id'];
    switch (true) {
      case ($zone == "red"): // case red zone
        $red_method = $row['red_method'];
          $change_method = "orange";

          if($red_method == "amount"){ // Red Amount method code 
            $red_estimate_amt = $row['e_value'];
         	  $red_amt = $row['red_am'];

              if($red_amt == ""){
                $red_live_amt = 0;
              }else{
                $red_live_amt = $red_amt;
              }
            $prog_percen = round(($red_live_amt/$red_estimate_amt)*100,2);
            $prog_color = "bg-danger";
            if($prog_percen >= 100){        
              $change_red_sql = "UPDATE deal SET zone = '{$change_method}', s_time_oran = '{$date}', update_time = '{$date}' WHERE DID ={$d_id}";
              mysqli_query($conn, $change_red_sql);
              
            }
            
          }else{ // Red Time method code 
            $red_amt = $row['red_am'];
            
            $start_date = strtotime($row['s_time_red']);
            $end_date = strtotime($row['e_time_red']);
            $current_date = strtotime($date);

            $range = $end_date-$start_date;
            $value = $current_date-$start_date;
            
            $calculation = round(($value/$range)*100,2);
            $prog_percen = $calculation;
            $prog_color = "bg-danger";

            if($prog_percen  >= 100){
              if($red_amt == ""){
                $change_red_sql = "UPDATE deal SET zone = 'fail', e_time_red = '{$date}', update_time = '{$date}', deal_status = 0, red_am = 0 WHERE DID ={$d_id}";
                if(mysqli_query($conn, $change_red_sql)){
                $update_pro_sql = "UPDATE products SET deal_check = 0 WHERE ID = {$pro_id}";
                mysqli_query($conn, $update_pro_sql);
                }
              }else{          
              $change_red_sql = "UPDATE deal SET zone = '{$change_method}', s_time_oran = '{$date}', update_time = '{$date}' WHERE DID ={$d_id}";
              mysqli_query($conn, $change_red_sql);
              }
            }
          }

          
        break;

      case ($zone == "orange"): // case orange zone
        $orange_method = $row['orange_method'];
        $change_method = "green";
        if($orange_method == "percentage"){ // Orange Percentage method code 

          $oran_per = $row['oran_per'];

          $oran_amt = $row['oran_am'];
            if($oran_amt == ""){
                $oran_live_amt = 0;
              }else{
                $oran_live_amt = $oran_amt;
              }

          $red_amt = $row['red_am'];
            if($red_amt == ""){
              $red_live_amt = 0;
            }else{
              $red_live_amt = $red_amt;
            }
          $orange_amount = $red_live_amt+(($oran_per/100)*$red_live_amt);
          $prog_percen = round(($oran_live_amt/$orange_amount)*100,2);
          $prog_color = "bg-warning";
          if($prog_percen >= 100){            
            $change_oran_sql = "UPDATE deal SET zone = '{$change_method}', s_time_green = '{$date}', update_time = '{$date}' WHERE DID ={$d_id}";
            mysqli_query($conn, $change_oran_sql);
          }

        }else{ // Orange Time method code 

          $start_date = strtotime($row['s_time_oran']);
          $days = $row['oran_days'];
          $add_days = "+$days day";
          $end_date = date('d-m-Y H:i',strtotime($add_days,$start_date));

          $orange_end_date = $row['e_time_oran'];
          if($orange_end_date == ""){
            $update_oran_end_date_sql = "UPDATE deal SET e_time_oran = '{$end_date}' WHERE DID = {$d_id}";
            mysqli_query($conn, $update_oran_end_date_sql);
          }        

          $end_date_o = strtotime($row['e_time_oran']);
          $current_date = strtotime($date);


          $range = $end_date_o - $start_date;
          $value = $current_date - $start_date;
          
          $calculation = round(($value/$range)*100,2);
          $prog_percen = $calculation;
          $prog_color = "bg-warning";

          if($prog_percen >= 100){            
            $change_oran_sql = "UPDATE deal SET zone = '{$change_method}', s_time_green = '{$date}', update_time = '{$date}' WHERE DID ={$d_id}";
            mysqli_query($conn, $change_oran_sql);
          }
          
        }
        break;

      case ($zone == "green"): // case green zone
        $green_method = $row['green_method']; // getting method
        $change_method = "completed";
        if($green_method == "percentage"){ // Green Percentage method code 

          $green_per = $row['green_per'];

          $green_amt = $row['green_am'];
            if($green_amt == ""){
                $green_live_amt = 0;
              }else{
                $green_live_amt = $green_amt;
              }

          $oran_amt = $row['oran_am'];
            if($oran_amt == ""){
              $oran_live_amt = 0;
            }else{
              $oran_live_amt = $oran_amt;
            }
          $green_amount = $oran_live_amt+(($green_per/100)*$oran_live_amt);
          $prog_percen = round(($green_live_amt/$green_amount)*100,2);
          $prog_color = "bg-success";

          if($prog_percen >= 100){            
            $change_green_sql = "UPDATE deal SET zone = '{$change_method}', deal_status = 0, update_time = '{$date}' WHERE DID ={$d_id}";
            if(mysqli_query($conn, $change_green_sql)){
              $update_pro_sql = "UPDATE products SET deal_check = 0 WHERE ID = {$pro_id}";
              mysqli_query($conn, $update_pro_sql);

              $sql_participators = "SELECT * FROM participators WHERE deal_id = $deal_id";
              $run_sql_participators = mysqli_query($conn,$sql_participators);
              $user_winner_ids = array();
              while ($row = mysqli_fetch_assoc($run_sql_participators)) {
                $part_id = $row['part_id'];
                $sql_update_participator = "UPDATE participators SET status = 0 WHERE part_id = $part_id";
                mysqli_query($conn,$sql_update_participator);
                $user_winner_ids[] = $row['user_id'];
              }
              $winner_id = $user_winner_ids[0];
              if($winner == null){
                $update_winner_id = "UPDATE deal SET winner_id = $winner_id WHERE DID = $d_id";
                mysqli_query($conn,$update_winner_id);
              }
            }
          }
          
        }else{ // Green Time method code

          $start_date = strtotime($row['s_time_green']);
          $days = $row['green_days'];
          $add_days = "+$days day";
          $end_date = date('d-m-Y H:i',strtotime($add_days,$start_date));

          $green_end_date = $row['e_time_green'];
          if($green_end_date == ""){
            $update_green_end_date_sql = "UPDATE deal SET e_time_green = '{$end_date}' WHERE DID = {$d_id}";
            mysqli_query($conn, $update_green_end_date_sql);
          }        

          $end_date_g = strtotime($row['e_time_green']);
          $current_date = strtotime($date);


          $range = $end_date_g - $start_date;
          $value = $current_date - $start_date;
          
          $calculation = round(($value/$range)*100,2);
          $prog_percen = $calculation;
          $prog_color = "bg-success";

          if($prog_percen >= 100){            
            $change_green_sql = "UPDATE deal SET zone = '{$change_method}', deal_status = 0, update_time = '{$date}' WHERE DID ={$d_id}";
            if(mysqli_query($conn, $change_green_sql)){
              $update_pro_sql = "UPDATE products SET deal_check = 0 WHERE ID = {$pro_id}";
              mysqli_query($conn, $update_pro_sql);

              $sql_participators = "SELECT * FROM participators WHERE deal_id = $deal_id";
              $run_sql_participators = mysqli_query($conn,$sql_participators);
              $user_winner_ids = array();
              while ($row = mysqli_fetch_assoc($run_sql_participators)) {
                $part_id = $row['part_id'];
                $sql_update_participator = "UPDATE participators SET status = 0 WHERE part_id = $part_id";
                mysqli_query($conn,$sql_update_participator);
                $user_winner_ids[] = $row['user_id'];
              }
              $winner_id = $user_winner_ids[0];
              if($winner == null){
                $update_winner_id = "UPDATE deal SET winner_id = $winner_id WHERE DID = $d_id";
                mysqli_query($conn,$update_winner_id);
              }
              
            }


          } 
          
          
        }
        break;
    }
  }

  return progressBar($prog_percen,$prog_color);
}

?>