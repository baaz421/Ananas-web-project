<?php
//deal-success.php
ob_start();
include "includes/header.php";

if($_SESSION['u_email'] == false){
  header('Location: login.php');
}else{
  $user_email = $_SESSION['u_email'];
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
    		<h3 class="error-title">Deal Confirm Successfully</h3>	

			<!-- <div class="loader">
			  <span class="loader__element"></span>
			  <span class="loader__element"></span>
			  <span class="loader__element"></span>
			</div> -->

			<svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
			  <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
			  <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
			</svg>


        <p>Congratulations your deal is confirm and Thank you for paticipating.</p>
    		<p>Deal deatils sent to your email : <span class="text-primary"><u><?php echo $user_email; ?></u></span>.</p>
    		<a href="../index.php" class="btn btn-outline-primary-2 btn-minwidth-lg mt-1">
    			<span><?php echo $_404['btohg']; ?></span>
    			<i class="icon-long-arrow-right"></i>
    		</a>
    		<a href="dashboard" class="btn btn-outline-primary-2 btn-minwidth-lg mt-1">
    			<span>DASHBOARD</span>
    			<i class="icon-long-arrow-right"></i>
    		</a>
    	</div><!-- End .container -->
	</div><!-- End .error-content text-center -->
</main><!-- End .main -->

<?php 
include "includes/footer.php";
?>
<script type="text/javascript">
	// $(document).ready(function(){
	// 	 $(".loader").hide();
	// 	$("#loading").on("click",function(){			
	// 	    $(".loader").show();
	// 	    setTimeout(function(){$(".loader").hide()},3000);
	// 	});		  
		  
		 
	// });
</script>