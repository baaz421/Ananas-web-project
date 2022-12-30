<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Ananas | Admin Registration</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="robots" content="all,follow">
		<!-- Bootstrap CSS-->
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<!-- Font Awesome CSS-->
		<link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
		<!-- Fontastic Custom icon font-->
		<link rel="stylesheet" href="css/fontastic.css">
		<!-- Google fonts - Poppins -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
		<!-- theme stylesheet-->
		<link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
		<!-- Custom stylesheet - for your changes-->
		<link rel="stylesheet" href="css/custom.css">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/favicon.ico">
		<!-- Tweaks for older IEs--><!--[if lt IE 9]>
				<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
				<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->

		<!-- intltelinput links -->
		<link rel="stylesheet" href="build/css/intlTelInput.css">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>  
	</head>
	<body>
		<style type="text/css">
			.myAlert-bottom{
	      position: fixed;
	      z-index:99999;
	      /*top: 5px;*/
	      bottom: 5px;
	      left:2%;
	      width: 96%;
	    }
			#valid-msg {
				color: #00C900;
			} 

			.hide {
				display: none;
			}
			#error-msg {
				color: red;
			}
			#valid-msg {
				color: #00C900;
			}
			.fa:hover {
				opacity: 0.7;
			}

			.fa-facebook {
				background: #3B5998;
				color: white;
			}

			.fa-google {
				background: #dd4b39;
				color: white;
			}
		</style> 
<div class="page login-page">    
	<div class="container col-lg-6 bg-white"> 
	<div class="card">
	<img src="img/photos/signup-banner.jpg" class="card-img-top" alt="...">
	<div class="card-body">
		<h1 class="display-4" >Registration Form</h1>
		<p class="card-text">Fill all details about you and join us.</p>
	</div>
</div> 
<!-- ERROR MESSAGE DIV-->
	<div id="error-message"></div>
	<div id="success-message"></div>
<!-- ERROR MESSAGE DIV CLOSE-->       
		<div class="form-box mt-3">

				<div class="form-tab">

						<!-- <ul class="nav nav-pills nav-fill" role="tablist">
								
								<li class="nav-item">
									<div class=""></div>
										<h5 class="display-4">Registration Form</h5>
										<p>Fill all details about you and join us</p>

								</li>
						</ul> -->
						<div class="tab-content">
						<div id="viewdata"></div>

								<!-- ================ register starts =========== -->
										<!-- <form action="admin-login-system-ajax/admin-insert-data.php" method="post" id="submit-r-admin" > -->
										<form method="post" id="submit-r-admin" >
												<div class="form-group">
														<label for="admin-r-name">Your full name *</label>
														<input type="text" class="form-control" id="admin-r-name" name="admin-r-name" required="Please Enter Full Name">
												</div><!-- End .form-group -->
												<div class="form-group">
														<label for="admin-r-username">User name *</label>
														<input type="text" class="form-control" id="admin-r-username" name="admin-r-username" required="Please Enter User Name">
												</div><!-- End .form-group -->
												<div class="form-group">
														<label for="admin-r-email">Your email address *</label>
														<input type="email" class="form-control" id="admin-r-email" name="admin-r-email" required>
												</div><!-- End .form-group -->
												<div class="form-group">
														<label for="admin-r-gender">Select Gender * &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
														<div class="form-check form-check-inline">
															<input class="form-check-input" type="radio" name="admin-r-gender" id="inlineRadio1" value="male" required>
															<label class="form-check-label" for="inlineRadio1">Male</label>
														</div>
														<div class="form-check form-check-inline">
															<input class="form-check-input" type="radio" name="admin-r-gender" id="inlineRadio2" value="female" required>
															<label class="form-check-label" for="inlineRadio2">Female</label>
														</div>
												</div><!-- End .form-group -->
												<div class="form-group">
														<label for="admin-r-password">Password *</label>
														<input type="password" class="form-control" id="admin-r-password" name="admin-r-password" required >
												</div><!-- End .form-group -->
												<div class="form-group">
														<label for="admin-r-phone">Your mobile number*</label>  
														<input type="tel" class="form-control" id="phone" name="admin-r-phone" size="100%" required>
														<span id="valid-msg" class="hide">✓ Valid</span>
														<span id="error-msg" class="hide"></span>
														<input type="text" class="form-control error" id="ccodez" name="admin-r-phonecode" hidden >
														<input type="text" class="form-control" id="cname" name="admin-r-contryname"  hidden>
												</div><!-- End .form-group -->
												<div class="form-group">
														<label for="register-password">Date Of Birth *</label>
														<input type="date" id="admin-r-birthdate" name="admin-r-birthdate" min="1950-01-01" max="2003-12-31" class="form-control" >
												</div><!-- End .form-group -->

												<div class="form-footer">
														<button type="submit"  name="admin-signup" id="admin-signup" class="btn btn-outline-secondary w-100">
																<span>SIGN UP</span>
																<i class="icon-long-arrow-right"></i>
														</button>

														<div class="custom-control custom-checkbox">
																<input type="checkbox" class="custom-control-input" id="register-policy-2" ><br>
																<label class="custom-control-label" for="register-policy-2">I agree to the <a href="#">privacy policy</a> *</label>
														</div><!-- End .custom-checkbox -->
												</div><!-- End .form-footer -->
										</form>
										<div class="form-choice">
												<p class="text-center">or sign in with</p>
												<div class="row">
														<div class="col-sm-6 text-center mb-3">
																<a href="#" class="btn fa fa-google">
																		<i class="icon-google"></i>
																		Login With Google
																</a>
														</div><!-- End .col- -->
														<br>
														<div class="col-sm-6 text-center mb-3">
																<a href="#" class="btn fa fa-facebook">
																		<i class="icon-facebook-f"></i>
																		Login With Facebook
																</a>
														</div><!-- End .col-6 -->
												</div><!-- End .row -->
										</div><!-- End .form-choice -->
										<div class="row">
												<div class="col-sm">
														<br>
														<p class="text-center">or already member</p>
														<a href="login.php" class="btn btn-outline-secondary btn-login w-100"> Log in Here</a>
												</div>  
										</div>

								<!-- ================ register starts =========== -->
						</div><!-- End .tab-content -->
				</div><!-- End .form-tab -->
		</div><!-- End .form-box -->

	</div><!-- End .container -->
		</div>
		
	
		<!-- JavaScript files-->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/popper.js/umd/popper.min.js"> </script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
		<script src="vendor/chart.js/Chart.min.js"></script>
		<script src="vendor/jquery-validation/jquery.validate.min.js"></script>
		<!-- Main File-->
		<script src="js/front.js"></script>
		<script src="build/js/intlTelInput.js"></script>

<script type="text/javascript">      
$(document).ready(function(){
	// submit form 
		$("#admin-signup").on("click",function(e){
			var admin_name_r = $("#admin-r-name").val();
			var admin_email_r = $("#admin-r-email").val();
			var admin_password_r = $("#admin-r-password").val();
			var admin_phone_r = $("#phone").val();
			if(admin_name_r == "" || admin_email_r == "" || admin_phone_r == "" || admin_password_r == ""){
				$("#error-message").html("<div class='myAlert-bottom alert alert-dismissible fade show alert-danger' role='alert'>Please fill all fields .<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
				$("#success-message").slideUp();
				setTimeout(function(){$("#error-message").fadeOut("slow")}, 4000);
				e.preventDefault();
			}else if(!iti.isValidNumber()){
        $("#error-message").html("<div class='myAlert-bottom alert alert-dismissible fade show alert-danger mt-1 rounded ' role='alert'>Please enter Valid phone number.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
        $("#success-message").slideUp();
        setTimeout(function(){$("#error-message").fadeOut("slow")}, 4000);
        e.preventDefault();
	    }else if(!$('#register-policy-2').is(':checked')){
        $("#error-message").html("<div class='myAlert-bottom alert alert-dismissible fade show alert-danger mt-1 rounded ' role='alert'>Please click check box for agree to the privacy policy.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
        $("#success-message").slideUp();
        setTimeout(function(){$("#error-message").fadeOut("slow")}, 4000);
        e.preventDefault();
	    }else{
	    	e.preventDefault();
	    	$.ajax({
					url : "admin-login-system-ajax/admin-insert-data.php",
					type : "POST",
					data : $("#submit-r-admin").serialize(),
					beforesend: function(){
						$("#success-message").html("<div class='myAlert-bottom alert alert-dismissible fade show alert-info ' role='alert'>Please wait storing Data...<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
						$("#error-message").slideUp();
					},
					success : function(data){
						console.log(data);
						if(data == 1){
							$("#error-message").html("<div class='myAlert-bottom alert alert-dismissible fade show alert-danger ' role='alert'>Email that you have entered is already exist!. Please try with another Email.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
							$("#success-message").slideUp();
							setTimeout(function(){$("#error-message").fadeOut("slow")}, 4000);
						}else if(data == 2){
							$("#error-message").html("<div class='myAlert-bottom alert alert-dismissible fade show alert-danger ' role='alert'>Failed while Registeration, please fill all fields!.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
							$("#success-message").slideUp();
							setTimeout(function(){$("#error-message").fadeOut("slow")}, 4000);
						}else if(data == 0){
							$("#success-message").html("<div class='myAlert-bottom alert alert-dismissible fade show alert-success ' role='alert'>Successfully Registered. Thank you.!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
							$("#error-message").slideUp();  
							$('#submit-r-admin').trigger("reset");
							location.replace("admin-login-system-ajax/admin-signup-verification.php");
						}else{
							$("#error-message").html("<div class='myAlert-bottom alert alert-dismissible fade show alert-danger ' role='alert'>Sorry something went wrong.! please try again later.!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
							$("#success-message").slideUp();
							setTimeout(function(){$("#error-message").fadeOut("slow")}, 4000);
						}
					}//success
				 });//ajax
	    }
	    e.preventDefault();
		});


});

</script>

	<script>

		var input = document.querySelector("#phone"),
				errorMsg = document.querySelector("#error-msg"),
				validMsg = document.querySelector("#valid-msg");

		// here, the index maps to the error code returned from getValidationError - see readme
		var errorMap = ["Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];

		// initialise plugin
			var iti = window.intlTelInput(input, {
				//nationalMode: true,
				initialCountry: "auto",
				geoIpLookup: function(callback) {
					$.get('https://ipinfo.io', function() {}, "jsonp").always(function(resp) {
						var countryCode = (resp && resp.country) ? resp.country : "qa";
						callback(countryCode);
					});
				},
				separateDialCode: true,
				utilsScript: "build/js/utils.js"
			});

		var reset = function() {
			input.classList.remove("error");
			errorMsg.innerHTML = "";
			errorMsg.classList.add("hide");
			validMsg.classList.add("hide");
		};

		// on blur: validate
			input.addEventListener('blur', function() {
				reset();
				if (input.value.trim()) {
					if (iti.isValidNumber()) {
						validMsg.classList.remove("hide");
					} else {
						input.classList.add("error");
						var errorCode = iti.getValidationError();
						errorMsg.innerHTML = errorMap[errorCode];
						errorMsg.classList.remove("hide");
					}
				}
			});

		// on keyup / change flag: reset
		input.addEventListener('change', reset);
		input.addEventListener('keyup', reset);

		// $.ajax({
		// 			url : "admin-login-system-ajax/admin-insert-data.php",
		// 			type : "POST",
		// 			data : $("#submit-r-admin").serialize(),
		// 			beforesend: function(){
		// 				$("#success-message").html("<div class='myAlert-bottom alert alert-dismissible fade show alert-info ' role='alert'>Please wait storing product...<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
		// 							$("#error-message").slideUp();
		// 			},
		// 			success : function(data){
		// 				if(data != 0){
		// 					$("#viewdata").html(data);
		// 				$("#success-message").html("<div class='myAlert-bottom alert alert-dismissible fade show alert-success ' role='alert'>"+data+"Successfully Registered. Thank you.!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
		// 							$("#error-message").slideUp();  
		// 							$('#submit-product').trigger("reset");
		// 							//location.replace("admin-login-system-ajax/admin-insert-data.php");
		// 						}else{
		// 							$("#error-message").html("<div class='myAlert-bottom alert alert-dismissible fade show alert-danger ' role='alert'>"+data+"Inserting product failed.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
		// 							$("#success-message").slideUp();
		// 				}
		// 			}
		// 		 });

	</script>
	</body>
</html>