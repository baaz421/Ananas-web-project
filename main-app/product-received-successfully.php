<?php
// product-received-successfully.php
ob_start();
include "includes/header.php";
include('../smtp/simple.php');

if(isset($_GET['wid']) && !empty($_GET['wid'])){
	$w_id = $_GET['wid'];
	// get winner table 
	$sql3 = "SELECT * FROM winner WHERE w_id = $w_id";
	$run_sql3 = mysqli_query($conn, $sql3);
	if(mysqli_num_rows($run_sql3) > 0){
		$winner_date = mysqli_fetch_assoc($run_sql3);
		$admin_id = $winner_date['admin_id'];
		$user_id = $winner_date['user_id'];
		$deal_id = $winner_date['deal_id'];
		$user_confirm = $winner_date['user_confirm'];
		// get vendor or seller data
		  $sql4 = "SELECT * FROM admin WHERE AID = $admin_id";
		  $run_sql4 = mysqli_query($conn, $sql4);
		  $fetch4 = mysqli_fetch_assoc($run_sql4);
	    $admin_name     = $fetch4['a_fullname'];
	    $admin_email    = $fetch4['a_email'];
    // get user information
		  $sql2 = "SELECT * FROM users WHERE id = $user_id";
		  $run_sql2 = mysqli_query($conn, $sql2);
		  $fetch2 = mysqli_fetch_assoc($run_sql2);
		  $user_name    = $fetch2['name'];

		// check if user alredy confirm or not
		  if($user_confirm == 1){
		  	//update winner table that user confirm
		    $update_sql = "UPDATE winner SET user_confirm = 0, user_confirm_date = '$date', status = 1 WHERE w_id = $w_id";
		    $run_update_sql = mysqli_query($conn, $update_sql);
			    if($run_update_sql){
			    	$vendor_subject	= $user_name."Confirmed Successfully";
						$vendor_format 	= vendorConfirmation($conn,$deal_id);
						smtp_mailer($admin_email, $vendor_subject, $vendor_format);
			    }
			  $msg = "Thank you, for your confirmation.";
			  }else{
			  	$msg = "You already Confirmed the product";
			  }
    
	}else{
		header('Location: ../');
	}
	
}else{
	header('Location: ../');
}


?>
<style type="text/css">
	:root {
		--main-color: #ecf0f1;
	  --point-color: #555;
	  --size: 5px;
	}
	.loader {
	  background-color: var(--main-color);
	  overflow: hidden;
	  width: 100%;
	  height: 100%;
	  position: fixed;
	  top: 0; left: 0;
	  display: flex;
	  align-items: center;
	  align-content: center; 
	  justify-content: center;  
	  z-index: 100000;
	}
	.loader__element {
	  border-radius: 100%;
	  border: var(--size) solid var(--point-color);
	  margin: calc(var(--size)*2);
	}
	.loader__element:nth-child(1) {
	  animation: preloader .6s ease-in-out alternate infinite;
	}
	.loader__element:nth-child(2) {
	  animation: preloader .6s ease-in-out alternate .2s infinite;
	}
	.loader__element:nth-child(3) {
	  animation: preloader .6s ease-in-out alternate .4s infinite;
	}
	@keyframes preloader {
	  100% { transform: scale(2); }
	}
	.checkmark__circle {
	  stroke-dasharray: 166;
	  stroke-dashoffset: 166;
	  stroke-width: 2;
	  stroke-miterlimit: 10;
	  stroke: #7ac142;
	  fill: none;
	  animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards;
	}
	.checkmark {
	  width: 56px;
	  height: 56px;
	  border-radius: 50%;
	  display: block;
	  stroke-width: 2;
	  stroke: #fff;
	  stroke-miterlimit: 10;
	  margin: auto;
	  margin-top: 20px;
	  margin-bottom: 20px;
	  box-shadow: inset 0px 0px 0px #7ac142;
	  animation: fill .4s ease-in-out .4s forwards, scale .3s ease-in-out .9s both;
	}
	.checkmark__check {
	  transform-origin: 50% 50%;
	  stroke-dasharray: 48;
	  stroke-dashoffset: 48;
	  animation: stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards;
	}
	.loader-wrapper {
	  width: 100%;
	  height: 100%;
	  position: absolute;
	  top: 0;
	  left: 0;
	  background-color: #242f3f;
	  display:flex;
	  justify-content: center;
	  align-items: center;
	}
	.loader {
	  display: inline-block;
	  width: 30px;
	  height: 30px;
	  position: relative;
	  border: 4px solid #Fff;
	  animation: loader 2s infinite ease;
	}
	@keyframes stroke {
	  100% {
	    stroke-dashoffset: 0;
	  }
	}
	@keyframes scale {
	  0%, 100% {
	    transform: none;
	  }
	  50% {
	    transform: scale3d(1.1, 1.1, 1);
	  }
	}
	@keyframes fill {
	  100% {
	    box-shadow: inset 0px 0px 0px 30px #7ac142;
	  }
	}
</style>

<main class="main">
	<div class="error-content text-center" style="background-image: url(../assets/images/backgrounds/error-bg.jpg)">
  	<div class="container">
  		<h3 class="error-title"><?php echo $msg; ?></h3>
				<svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
				  <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
				  <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
				</svg>
      <p>Successfully confirmed that you recevied the product from this seller <u><?php echo $admin_name; ?></u></p>
  		<a href="../index.php" class="btn btn-outline-primary-2 btn-minwidth-lg mt-1">
  			<span><?php echo $_404['btohg']; ?></span>
  			<i class="icon-long-arrow-right"></i>
  		</a>
  	</div><!-- End .container -->
	</div><!-- End .error-content text-center -->
</main><!-- End .main -->
<div class="loader-wrapper">
    <span class="loader"><span class="loader-inner"></span></span>
</div>

<?php 
include "includes/footer.php";
?>
<script type="text/javascript">
	$(window).on("load",function(){
     $(".loader-wrapper").fadeOut("slow");
});
</script>