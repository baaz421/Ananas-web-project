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
            <h4 class="card-title">Deposite Transactions Details</h4>
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>
                      S.no
                    </th>
                    <th>
                      ID
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
$deposite_details = "SELECT * FROM deposite_amount WHERE u_id = '$u_id'";
$run_deposite_details = mysqli_query($conn, $deposite_details);
if(mysqli_num_rows($run_deposite_details) > 0){
	$sno = 1;

	while($row = mysqli_fetch_assoc($run_deposite_details)){
		$date = DateDisplayWithTime($row['d_date']);
		echo "<tr>
                <td>{$sno}</td>
                <td>2022{$row["da_id"]}</td>
                <td>{$row["d_amount"]}</td>
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
