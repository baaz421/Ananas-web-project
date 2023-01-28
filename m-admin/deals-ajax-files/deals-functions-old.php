<?php
//deals-functions.php


// progres bar 
function progressBar($prog_percen,$prog_color){
  if($prog_color == "bg-danger"){
    $border_color = "border-danger";
  }elseif($prog_color == "bg-warning"){
    $border_color = "border-warning";
  }else{
    $border_color = "border-success";
  }
  $p = '
  <div class="progress border '.$border_color.'" style="height:18px; font-size: 14px" id="deal-progress">
    <div class="progress-bar progress-bar-striped progress-bar-animated '.$prog_color.' text-center" role="progressbar" style="width: '.$prog_percen.'%; height:20px" aria-valuemin="0" aria-valuemax="100"> 
      <span class="font-weight-bold text-dark" style = "position: absolute; right:0; left:0;">'.$prog_percen.' %</span>
    </div>
  </div>
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
    $admin_id = $row['a_id'];
    $create_time = $row['create_time'];    
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
              $change_red_sql = "UPDATE deal SET zone = '{$change_method}',e_time_red = '{$date}', s_time_oran = '{$date}', oran_am = '{$red_live_amt}', update_time = '{$date}' WHERE DID ={$d_id}";
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
              $change_red_sql = "UPDATE deal SET zone = '{$change_method}', e_time_red = '{$date}', s_time_oran = '{$date}', oran_am = '{$red_amt}', update_time = '{$date}' WHERE DID ={$d_id}";
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
            $change_oran_sql = "UPDATE deal SET zone = '{$change_method}', e_time_oran = '{$date}', s_time_green = '{$date}', green_am = '{$orange_amount}', update_time = '{$date}' WHERE DID ={$d_id}";
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
            $change_oran_sql = "UPDATE deal SET zone = '{$change_method}', s_time_green = '{$date}', green_am='{$oran_amt}', update_time = '{$date}' WHERE DID ={$d_id}";
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
          // if amount reached 100% this proccess
          if($prog_percen >= 100){ 
          // updating deal zone to completed in deal table           
            $change_green_sql = "UPDATE deal SET zone = '{$change_method}', deal_status = 0, update_time = '{$date}' WHERE DID ={$d_id}";

            // if deal table change done then in product table update
            if(mysqli_query($conn, $change_green_sql)){
              $update_pro_sql = "UPDATE products SET deal_check = 0 WHERE ID = {$pro_id}";
              mysqli_query($conn, $update_pro_sql);

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
                $winner_id = $user_winner_ids[0];

                // after winner get update deal table for winner.
                if($winner == null){
                  $update_winner_id = "UPDATE deal SET winner_id = $winner_id WHERE DID = $d_id";
                  
                  // inserting into winner table.
                  if(mysqli_query($conn,$update_winner_id)){
                    $winner_sql = "INSERT INTO winner (user_id, admin_id, deal_id, start_date, end_date, user_confirm, vendor_confirm, status, created_date) VALUES ('$winner_id','$admin_id','$d_id','$create_time','$date',1,1,0,'$date')";
                    mysqli_query($conn,$winner_sql);
                  }
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

          // if time reached 100% this proccess
          if($prog_percen >= 100){
            // updating deal zone to completed in deal table          
            $change_green_sql = "UPDATE deal SET zone = '{$change_method}', deal_status = 0, update_time = '{$date}' WHERE DID ={$d_id}";

            // if deal table change done then in product table update
            if(mysqli_query($conn, $change_green_sql)){
              $update_pro_sql = "UPDATE products SET deal_check = 0 WHERE ID = {$pro_id}";
              mysqli_query($conn, $update_pro_sql);

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
                $winner_id = $user_winner_ids[0];

                // after winner get update deal table for winner.
                if($winner == null){
                  $update_winner_id = "UPDATE deal SET winner_id = $winner_id WHERE DID = $d_id";

                  // inserting into winner table.
                  if(mysqli_query($conn,$update_winner_id)){
                    $winner_sql = "INSERT INTO winner (user_id, admin_id, deal_id, start_date, end_date, user_confirm, vendor_confirm, status, created_date) VALUES ('$winner_id','$admin_id','$d_id','$create_time','{$date}',1,1,0,'{$date}')";
                    mysqli_query($conn,$winner_sql);
                  }
                }
              
            }
          }          
        }
        break;
    }
  }
  return progressBar($prog_percen,$prog_color);
}


// function Progress bar for red, orange, green zone from user dashboard
function zoneProgress2($deal_id,$conn,$date){
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
              $change_red_sql = "UPDATE deal SET zone = '{$change_method}',e_time_red = '{$date}', s_time_oran = '{$date}', oran_am = '{$red_live_amt}', update_time = '{$date}' WHERE DID ={$d_id}";
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
              $change_red_sql = "UPDATE deal SET zone = '{$change_method}', e_time_red = '{$date}', s_time_oran = '{$date}', oran_am = '{$red_amt}', update_time = '{$date}' WHERE DID ={$d_id}";
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
            $change_oran_sql = "UPDATE deal SET zone = '{$change_method}', e_time_oran = '{$date}', s_time_green = '{$date}', green_am = '{$orange_amount}', update_time = '{$date}' WHERE DID ={$d_id}";
            mysqli_query($conn, $change_oran_sql);
          }

        }else{ // Orange Time method code 

          $start_date = strtotime($row['s_time_oran']);
          $days = $row['oran_days'];
          $add_days = "+$days day";
          $end_date = date('d-m-Y H:i',strtotime($add_days,$start_date));

          $oran_amt = $row['oran_am'];

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
            $change_oran_sql = "UPDATE deal SET zone = '{$change_method}', s_time_green = '{$date}', green_am='{$oran_amt}', update_time = '{$date}' WHERE DID ={$d_id}";
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
            $change_green_sql = "UPDATE deal SET zone = '{$change_method}', e_time_green = '{$date}', deal_status = 0, update_time = '{$date}' WHERE DID ={$d_id}";
            if(mysqli_query($conn, $change_green_sql)){
              $update_pro_sql = "UPDATE products SET deal_check = 0 WHERE ID = {$pro_id}";
              mysqli_query($conn, $update_pro_sql);

              $sql_participators = "SELECT * FROM participators WHERE deal_id = $deal_id AND status = 1";
              $run_sql_participators = mysqli_query($conn,$sql_participators);
              $user_winner_ids = array();
              while ($row = mysqli_fetch_assoc($run_sql_participators)) {
                $part_id = $row['part_id'];
                $sql_update_participator = "UPDATE participators SET status = 0 WHERE part_id = $part_id";
                mysqli_query($conn,$sql_update_participator);
                $user_winner_ids[] = $row['user_id'];
              }
              shuffle($user_winner_ids);
              $winner_id = $user_winner_ids[0];
              if($winner == null){
                $update_winner_id = "UPDATE deal SET winner_id = $winner_id WHERE DID = $d_id";
                mysqli_query($conn,$update_winner_id);
                while ($pa10 = mysqli_fetch_assoc($run_sql_participators)) {
                  $part_id = $pa['part_id'];
                  $sql_update_participator = "UPDATE participators SET status = 10 WHERE part_id = $part_id";
                  mysqli_query($conn,$sql_update_participator);
                }
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

              $sql_participators = "SELECT * FROM participators WHERE deal_id = $deal_id AND status = 1";
              $run_sql_participators = mysqli_query($conn,$sql_participators);
              $user_winner_ids = array();
              while ($row = mysqli_fetch_assoc($run_sql_participators)) {
                $part_id = $row['part_id'];
                $sql_update_participator = "UPDATE participators SET status = 0 WHERE part_id = $part_id";
                mysqli_query($conn,$sql_update_participator);
                $user_winner_ids[] = $row['user_id'];
              }
              shuffle($user_winner_ids);
              $winner_id = $user_winner_ids[0];
              if($winner == null){
                $update_winner_id = "UPDATE deal SET winner_id = $winner_id WHERE DID = $d_id";
                mysqli_query($conn,$update_winner_id);

                while ($pa10 = mysqli_fetch_assoc($run_sql_participators)) {
                  $part_id = $pa['part_id'];
                  $sql_update_participator = "UPDATE participators SET status = 10 WHERE part_id = $part_id";
                  mysqli_query($conn,$sql_update_participator);
                }
              }
              
            }


          } 
          
          
        }
        break;
    }
  }

  return progressBar($prog_percen,$prog_color);
}