<?php 
ob_start();
// flush(); // Flush the buffer
// ob_flush();

include "includes/header.php";

@$email = $_SESSION['u_email'];
if($email == true){
	
	header('Location: dashboard/');
}

if(@$_GET['continue'] == ""){
	$linkTo = "";
}else{
	$linkTo = $_GET['continue'];
}
?>
<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../index.php"><?php echo $english['home']; ?></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $english['login']; ?></li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17" style="background-image: url('assets/images/backgrounds/login-bg.jpg')">
    	<div class="container">
    	  <!-- =================== from box starts here ========================-->
    		<div class="form-box">
    			<div class="form-tab">
        			<ul class="nav nav-pills nav-fill" role="tablist">
					    <li class="nav-item">
					        <a class="nav-link active " >Log In</a>
					    </li>					    
					</ul>
					<div class="tab-content">						
						<!-- ERROR MESSAGE DIV-->
			              <div id="error-message">
			              </div>
			              <div id="success-message">
			              </div>
			            <!-- ERROR MESSAGE DIV CLOSE-->

					<!-- ================ sign in starts =========== -->
					    <div class="tab-pane fade show active">
					    	<!-- <form action="login.php?continue=<?php echo $_GET['continue']; ?>"method="post" id="submit-user-login"> -->
					    	<form id="submit-user-login">
					    		<div class="form-group">
					    			<label for="singin-email-2">Username *</label>
					    			<input type="email" class="form-control" id="u-email" name="u-email" required placeholder="Enter your Email Address">
					    		</div><!-- End .form-group -->

					    		<div class="form-group">
					    			<label for="singin-password-2">Password *</label>
					    			<input type="password" class="form-control" id="u-password" name="u-password" required>
					    		</div><!-- End .form-group -->

					    		<div class="form-footer">
					    			<button type="submit" name="u-login" id="u-login" class="btn btn-outline-primary-2">
	                					<span>LOG IN</span>
	            						<i class="icon-long-arrow-right"></i>
	                				</button>

	                				<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="signin-remember-2">
										<label class="custom-control-label" for="signin-remember-2">Remember Me</label>
									</div><!-- End .custom-checkbox -->

									<a href="forgotpass.php" class="forgot-link">Forgot Your Password?</a>
					    		</div><!-- End .form-footer -->
					    	</form>
					    	<div class="form-choice">
						    	<p class="text-center">or sign in with</p>
						    	<div class="row">
						    		<div class="col-sm-6">
						    			<a href="#" class="btn btn-login btn-g">
						    				<i class="icon-google"></i>
						    				Login With Google
						    			</a>
						    		</div><!-- End .col-6 -->
						    		<div class="col-sm-6">
						    			<a href="#" class="btn btn-login btn-f">
						    				<i class="icon-facebook-f"></i>
						    				Login With Facebook
						    			</a>
						    		</div><!-- End .col-6 -->
						    	</div><!-- End .row -->
						    	<div class="row">
	                                <div class="col-sm">
	                                    <br>
	                                    <p class="text-center"> or if new member</p>
	                                    <a href="signup.php" class="btn btn-outline-primary-2 w-100">
	                                        <b>Register Here </b>
	                                    </a>
	                                </div>  
	                            </div>
					    	</div><!-- End .form-choice -->
					    </div><!-- .End .tab-pane -->
					<!-- ================ sign in close =========== -->

                        
					</div><!-- End .tab-content -->
				</div><!-- End .form-tab -->
    		</div><!-- End .form-box -->
    	  <!-- =================== from box close here ========================-->
    	</div><!-- End .container -->
    </div><!-- End .login-page section-bg -->

</main><!-- End .main -->
<?php 
include "includes/footer.php";
?>
<script type="text/javascript">

$(document).ready(function(){
	$("#u-login").on("click",function(e) {
	e.preventDefault();
	var Uemail  = $("#u-email").val();
	var Upassword = $("#u-password").val();

		if($.trim(Uemail).length == 0){
			$("#error-message").html("<div class='alert alert-dismissible fade show alert-danger mt-1 rounded ' role='alert'>Please enter your Username or email.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
            $("#success-message").slideUp();
            setTimeout(function(){$("#error-message").fadeOut("slow")}, 4000);
            e.preventDefault();
		}else if(!isEmail(Uemail)){
            	$("#error-message").html("<div class='alert alert-dismissible fade show alert-danger mt-1 rounded ' role='alert'>Please enter valid email.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
            	$("#success-message").slideUp();
            	setTimeout(function(){$("#error-message").fadeOut("slow")}, 4000);
            }else if(Upassword == ""){
			$("#error-message").html("<div class='alert alert-dismissible fade show alert-danger mt-1 rounded ' role='alert'>Please enter your password.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
            $("#success-message").slideUp();
            setTimeout(function(){$("#error-message").fadeOut("slow")}, 4000);
		}else{
			$.ajax({
			 	url : "login-ajax-files/login-check.php",
			 	type : "POST",
			 	data : $("#submit-user-login").serialize(),
			 	beforesend: function(){
			 		$("#success-message").html("<div class='alert alert-dismissible fade show alert-info mt-1 rounded' role='alert'>Please wait for login...<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
            		$("#error-message").slideUp();
			 	},
			 	success : function(data){
		 		if(data == 3){
			 		$("#success-message").html("<div class='alert alert-dismissible fade show alert-success mt-1 rounded' role='alert'>Successfully Logedin.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
	        		$("#error-message").slideUp();	
	        		$('#submit-user-login').trigger("reset");
	        		location.replace("<?php echo $linkTo; ?>");
            	}else if(data == 1){
            		$("#error-message").html("<div class='alert alert-dismissible fade show alert-danger mt-1 rounded' role='alert'>Incorrect Password.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
            		$("#success-message").slideUp();
		 		}else if(data == 4){
            		$("#error-message").html("<div class='alert alert-dismissible fade show alert-danger mt-1 rounded' role='alert'>Sorry you can't login, You blocked by Admin!.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
            		$("#success-message").slideUp();
		 		}else{
		 			$("#error-message").html("<div class='alert alert-dismissible fade show alert-danger mt-1 rounded ' role='alert'>Email Doesn't match OR Incorrect Email OR It's look like you're not yet a member! Click on the bottom to Register.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
        			$("#success-message").slideUp();
		 		}
			 	}
			 });
		}


	});

});	

function isEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}

// function validateEmail(sEmail) {
// var filter = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
// if (filter.test(sEmail)) {
// return true;
// }
// else {
// return false;
// }
// }

// $(document).ready(function(e) {
// $('#btnValidate').click(function() {
// var sEmail = $('#txtEmail').val();
// // Checking Empty Fields
// if ($.trim(sEmail).length == 0 ) {
// alert('All fields are mandatory');
// e.preventDefault();
// }
// if (validateEmail(sEmail)) {
// alert('Nice!! your Email is valid, now you can continue..');
// }
// else {
// alert('Invalid Email Address');
// e.preventDefault();
// }
// });
// });
// // Function that validates email address through a regular expression.
// function validateEmail(sEmail) {
// var filter = /^[w-.+]+@[a-zA-Z0-9.-]+.[a-zA-z0-9]{2,4}$/;
// if (filter.test(sEmail)) {
// return true;
// }
// else {
// return false;
// }
// }


</script>