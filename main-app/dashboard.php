<?php
ob_start();
require_once "includes/header.php";

if($_SESSION['u_email'] == false){
  header('Location: login.php');
 
}
?>



<main class="main">
<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
	<div class="container">
		<h1 class="page-title"><?php echo $english['my_accout']; ?></h1>
	</div><!-- End .container -->
</div><!-- End .page-header -->
<nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../index.php"><?php echo $english['home']; ?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $english['my_accout']; ?></li>
        </ol>
    </div><!-- End .container -->
</nav><!-- End .breadcrumb-nav -->

<div class="page-content">
	<div class="dashboard">
        <div class="container">
        	<div class="row">
        	<!-- ==================== left side space start ================ -->
        		<div class="col-md-8 col-lg-9">
        			<div class="tab-content">
        			<!-- ========================  main tab start ===================== -->
					    <div class="tab-pane fade show active" id="tab-dashboard" role="tabpanel" aria-labelledby="tab-dashboard-link">
					    	<!-- ERROR MESSAGE DIV-->
				              	<div id="error-message"><div class='alert alert-dismissible fade show alert-danger mt-1 rounded ' role='alert'>Please enter your Username.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div></div>
				              	<div id="success-message"><div class='alert alert-dismissible fade show alert-info mt-1 rounded' role='alert'>Please wait for login...<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div></div>
				            <!-- ERROR MESSAGE DIV CLOSE-->
					    	<form action="dashboard.php" method="POST" autocomplete="off">
						        <div class="row">
                					<div class="col-sm-6">
                						<label>Enter Verification Code *</label>
                						<input type="number" class="form-control" placeholder="Enter verification code" name="otp" id="otp" required>
	                					<button type="submit" class="btn btn-outline-primary-2" name="otp-submit" id="otp-submit">
	                					<span>Submit</span>
	            						<i class="icon-long-arrow-right"></i></button>
	            					</div>
		                		</div><!-- End .row -->
						    </form>
					    </div><!-- .End .tab-pane -->
					<!-- ========================  main tab close ===================== -->

					<!-- ========================  order tab start ===================== -->
					    <div class="tab-pane fade" id="tab-orders" role="tabpanel" aria-labelledby="tab-orders-link">
					    	<p>No order has been made yet.</p>
					    	<a href="category.html" class="btn btn-outline-primary-2"><span>GO SHOP</span><i class="icon-long-arrow-right"></i></a>
					    </div><!-- .End .tab-pane -->
					<!-- ========================  order tab close ===================== -->

					<!-- ========================  change password tab start ===================== -->
					    <div class="tab-pane fade" id="tab-downloads" role="tabpanel" aria-labelledby="tab-downloads-link">
					    	<form action="dashboard.php">
					    		<div class="row">
                					<div class="col-sm-6">
                						<label>New Password</label>
                						<input type="password" class="form-control" name="password" required>
                					</div><!-- End .col-sm-6 -->

                					<div class="col-sm-6">
                						<label>Confirm Password</label>
                						<input type="password" class="form-control" name="cpassword" required>
                					</div><!-- End .col-sm-6 -->
                				</div><!-- End .row -->
                				<button type="submit" class="btn btn-outline-primary-2" name="change-password">
                					<span>CHANGE PASSWORD</span>
            						<i class="icon-long-arrow-right"></i>
                				</button>
                			</form>
					    </div><!-- .End .tab-pane -->
					<!-- ========================  change password tab close ===================== -->

					<!-- ========================  address tab start ===================== -->
					    <div class="tab-pane fade" id="tab-address" role="tabpanel" aria-labelledby="tab-address-link">
					    	<p>The following addresses will be used on the checkout page by default.</p>

					    	<div class="row">
					    		<div class="col-lg-6">
					    			<div class="card card-dashboard">
					    				<div class="card-body">
					    					<h3 class="card-title">Billing Address</h3><!-- End .card-title -->

											<p>User Name<br>
											User Company<br>
											John str<br>
											New York, NY 10001<br>
											1-234-987-6543<br>
											yourmail@mail.com<br>
											<a href="#">Edit <i class="icon-edit"></i></a></p>
					    				</div><!-- End .card-body -->
					    			</div><!-- End .card-dashboard -->
					    		</div><!-- End .col-lg-6 -->

					    		<div class="col-lg-6">
					    			<div class="card card-dashboard">
					    				<div class="card-body">
					    					<h3 class="card-title">Shipping Address</h3><!-- End .card-title -->

											<p>You have not set up this type of address yet.<br>
											<a href="#">Edit <i class="icon-edit"></i></a></p>
					    				</div><!-- End .card-body -->
					    			</div><!-- End .card-dashboard -->
					    		</div><!-- End .col-lg-6 -->
					    	</div><!-- End .row -->
					    </div><!-- .End .tab-pane -->
					<!-- ========================  address tab close ===================== -->

					<!-- ========================  account details tab start ===================== -->
					    <div class="tab-pane fade" id="tab-account" role="tabpanel" aria-labelledby="tab-account-link">
					    	<form action="#">
                				<div class="row">
                					<div class="col-sm-6">
                						<label>First Name *</label>
                						<input type="text" class="form-control" required>
                					</div><!-- End .col-sm-6 -->

                					<div class="col-sm-6">
                						<label>Last Name *</label>
                						<input type="text" class="form-control" required>
                					</div><!-- End .col-sm-6 -->
                				</div><!-- End .row -->

        						<label>Display Name *</label>
        						<input type="text" class="form-control" required>
        						<small class="form-text">This will be how your name will be displayed in the account section and in reviews</small>

            					<label>Email address *</label>
    							<input type="email" class="form-control" required>

        						<label>Current password (leave blank to leave unchanged)</label>
        						<input type="password" class="form-control">

        						<label>New password (leave blank to leave unchanged)</label>
        						<input type="password" class="form-control">

        						<label>Confirm new password</label>
        						<input type="password" class="form-control mb-2">

            					<button type="submit" class="btn btn-outline-primary-2">
                					<span>SAVE CHANGES</span>
            						<i class="icon-long-arrow-right"></i>
                				</button>
                			</form>
					    </div><!-- .End .tab-pane -->
					<!-- ========================  account details tab close ===================== -->
					</div>
        		</div><!-- End .col-lg-9 -->
        	<!-- ==================== left side space close ================ -->

        	<!-- ==================== right side menu start ================ -->
        		<aside class="col-md-4 col-lg-3">
        			<ul class="nav nav-dashboard flex-column mb-3 mb-md-0" role="tablist">
					    <li class="nav-item">
					        <a class="nav-link active" id="tab-dashboard-link" data-toggle="tab" href="#tab-dashboard" role="tab" aria-controls="tab-dashboard" aria-selected="true">Dashboard</a>
					    </li>
					    <li class="nav-item">
					        <a class="nav-link" id="tab-orders-link" data-toggle="tab" href="#tab-orders" role="tab" aria-controls="tab-orders" aria-selected="false">Orders</a>
					    </li>
					    <li class="nav-item">
					        <a class="nav-link" id="tab-downloads-link" data-toggle="tab" href="#tab-downloads" role="tab" aria-controls="tab-downloads" aria-selected="false">Change password</a>
					    </li>
					    <li class="nav-item">
					        <a class="nav-link" id="tab-address-link" data-toggle="tab" href="#tab-address" role="tab" aria-controls="tab-address" aria-selected="false">Adresses</a>
					    </li>
					    <li class="nav-item">
					        <a class="nav-link" id="tab-account-link" data-toggle="tab" href="#tab-account" role="tab" aria-controls="tab-account" aria-selected="false">Account Details</a>
					    </li>
					    <li class="nav-item">
					        <a class="nav-link" href="logout.php">Sign Out</a>
					    </li>
					</ul>
        		</aside><!-- End .col-lg-3 -->
        	<!-- ==================== right side menu close ================ -->
        	</div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .dashboard -->
</div><!-- End .page-content -->
</main><!-- End .main -->

<?php 
include "includes/footer.php";
?>
