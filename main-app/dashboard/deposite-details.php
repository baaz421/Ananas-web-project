<!-- deposite-details.php -->
<?php
include "header-user.php";
?>
<!-- main-panel start -->
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Detail Transactions of Deposite's </h4>
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>S.no</th>
                    <th>ID</th>
                    <th>USD</th>
                    <th>Method</th>
                    <th>Date</th>
                  </tr>
                </thead>
                <tbody>
<?php 
$deposite_details = "SELECT * FROM deposite_amount WHERE u_id = '$u_id'";
$run_deposite_details = mysqli_query($conn, $deposite_details);
if(mysqli_num_rows($run_deposite_details) > 0){
	$sno = 1;
  $total = 0;
	while($row = mysqli_fetch_assoc($run_deposite_details)){

		$date = DateDisplayWithTime($row['d_date']);
    $db_amount = $row["d_amount"];

    if($row['method'] != null && $row['method'] == 0){
      $refund = "<span style='color : blue'>Refund</span>";
    }else if($row['method'] != null && $row['method'] == 2){
      $refund ="<span style='color : red'>Deduct</span>";
    }else{
      $refund ="<span style='color : green'>Deposite</span>";
    }

    if($row['method'] != null && $row['method'] == 2){
      $total -= $db_amount;
      $show_amount = "<span style='color : red'>-{$db_amount}</span> <p><u class = font-weight-bold>".number_format(round((float)$total,2),2)."</u></p>";
      
    }else if($row['method'] != null && $row['method'] == 0){
      $total += $db_amount;
      $show_amount ="<span style='color : blue'>+{$db_amount}</span><p><u class = font-weight-bold>".number_format(round((float)$total,2),2)."</u></p>";
      
    }else{
      $total += $db_amount;
      $show_amount ="<span style='color : green'>+{$db_amount}</span><p><u class = font-weight-bold>".number_format(round((float)$total,2),2)."</u></p>";
    }
		echo "<tr>
            <td>{$sno}</td>
            <td>2022{$row["da_id"]}</td>
            <td>$show_amount</td>
            <td>$refund</td>
            <td>{$date}</td>
          </tr>";
          $sno ++;
          
	}

}else{
	echo "<tr><td><h3>No records for Deposite .....</h3>
	<p>To Deposite Amount Click Here. <a href='add-amount.php' >Add Amount.</a></p></td></tr>";
}
?>
                  

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- content-wrapper ends -->
</div>
<!-- main-panel ends -->
<?php
include "footer-user.php";
?>
