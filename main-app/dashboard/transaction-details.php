<!-- transaction-details.php -->
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
            <h4 class="card-title">Transactions Details</h4>
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>
                      S.no
                    </th>
                    <th>
                      Transaction Id
                    </th>
                    <th>
                      Amount
                    </th>
                    <th>
                      Date
                    </th>
                  </tr>
                </thead>
                <tbody>
<?php 
$checkout_details = "SELECT * FROM checkout WHERE user_id = $u_id AND status = 1";
$run_checkout_details = mysqli_query($conn, $checkout_details);
if(mysqli_num_rows($run_checkout_details) > 0){
	$sno = 1;

	while($row = mysqli_fetch_assoc($run_checkout_details)){
		$date = DateDisplayWithTime($row['created_date']);
    $current_bal_of_user = current_bal($u_id, $conn);
		echo "<tr>
            <td>{$sno}</td>
            <td>2022{$row["ID"]}</td>
            <td><span style='color : red'>-{$row["total"]}.00</span></td>
            <td>{$date}</td>
          </tr>";
          $sno ++;
	}

}else{
	echo "<tr><td><h3>No records found .....</h3>
	<p>To make a deal click here. <a href='../' >Deal now.</a></p></td></tr>";
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
