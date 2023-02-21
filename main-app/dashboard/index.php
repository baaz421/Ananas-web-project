<?php
include "header-user.php";

?>
<!-- main-panel start -->
<div class="main-panel">
  <div class="content-wrapper">
          <?php
if(isset($_SESSION['u_email'])){
    @$email = $_SESSION['u_email'];
    $check_verify = "SELECT * FROM users WHERE email = '$email'";
    $run_verify = mysqli_query($conn, $check_verify);
    if(mysqli_num_rows($run_verify) > 0){
        $fetch      = mysqli_fetch_assoc($run_verify);
        $vstatus    = $fetch['vstatus'];
        $u_name     = $fetch['name'];
        $u_country  = $fetch['country'];
        if($vstatus == "notverified"){

        echo"<div id='success-message'>
                <div class='alert alert-dismissible fade show alert-warning mb-1 rounded text-dark' role='alert'>
                    You account not verified, please verify you account. <a href='verification.php'> Click Here</a>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>
              </div>";

        }
    }
}
?>
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="row">
          <div class="col-12 col-xl-8 mb-4 mb-xl-0">
            <h3 class="font-weight-bold">Welcome <?php echo $u_name ?></h3>
            <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span class="text-primary">3 unread alerts!</span></h6>
          </div>
          <div class="col-12 col-xl-4">
           <div class="justify-content-end d-flex">
            <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
              <button class="btn btn-sm btn-light bg-white" type="button" >
               <i class="mdi mdi-calendar"></i> <?php echo DateDisplay($date);  ?> <!-- Today (10 Jan 2021) -->
              </button>
            </div>
           </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 grid-margin stretch-card">
        <div class="card tale-bg">
          <div class="card-people mt-auto">
            <img src="images/dashboard/people.svg" alt="people">
            <div class="weather-info">
              <div class="d-flex">
                <div class="ml-2">
                  <h3 class="font-weight-normal"><?php echo $u_country ?></h3>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 grid-margin transparent">
        <div class="row">
          <div class="col-md-6 mb-4 stretch-card transparent">
            <div class="card card-tale">
              <div class="card-body">
                <p class="mb-4">Current Balance</p>
                <p class="fs-30 mb-2"><?php echo current_bal($u_id,$conn); ?> USD</p>
                <p><a href="add-amount.php" class="text-white"><u>Deposite More.</u></a></p>
              </div>
            </div>
          </div>
          <div class="col-md-6 mb-4 stretch-card transparent">
            <div class="card card-dark-blue">
              <div class="card-body">
                <p class="mb-4">Total Deals</p>
                <p class="fs-30 mb-2"><?php echo TotalDeals($conn,$u_id) ?></p>
                <p><a href="all-deals.php" class="text-white"><u>More Details</u></a></p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
            <div class="card card-light-blue">
              <div class="card-body">
                <p class="mb-4">Running Deals</p>
                <p class="fs-30 mb-2"><?php echo RunningDeals($conn,$u_id) ?></p>
                <p><a href="running-deals.php" class="text-white"><u>More Details</u></a></p>
              </div>
            </div>
          </div>
          <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
            <div class="card card-light-danger">
              <div class="card-body">
                <p class="mb-4">Completed Deals</p>
                <p class="fs-30 mb-2"><?php echo CompletedDeals($conn,$u_id) ?></p>
                <p><a href="completed-deal.php" class="text-white"><u>More Details</u></a></p>
              </div>
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