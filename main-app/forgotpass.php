<?php
include "includes/header.php";
?>

<main class="main">

    <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17" style="background-image: url('assets/images/backgrounds/login-bg.jpg')">
    	<div class="container">    		
    		<div class="form-box">
    			<div class="form-tab">
        			<ul class="nav nav-pills nav-fill" role="tablist">
					    <li class="nav-item">
					        <a class="nav-link active " >Forgot Password</a>

					    </li>
					    
					</ul>
					<p class="text-center">Enter your email address</p>
					<div class="tab-content">
						<!-- ERROR MESSAGE DIV-->
			              <div id="error-message">
			              </div>
			              <div id="success-message">
			              </div>
			            <!-- ERROR MESSAGE DIV CLOSE-->

					<!-- ================ sign in starts =========== -->
					    <div class="tab-pane fade show active">
					    	<form id="forgot-pass-form">
					    		<div class="form-group">
					    			<input type="email" class="form-control" id="u-email-f" name="u-email-f" required placeholder="Enter your Email Address">
					    		</div><!-- End .form-group -->

					    		<div class="form-footer">
					    			<button type="submit" name="check-email-f" id="check-email-f" class="btn btn-outline-primary-2">
	                					<span>Continue</span>
	            						<i class="icon-long-arrow-right"></i>
	                				</button>
					    	</form>
					    </div><!-- .End .tab-pane -->
					    <div class="row">
	                                <div class="col-sm">
	                                    <br>
	                                    <p class="text-center"> or if new member</p>
	                                    <a href="signup.php" class="btn btn-outline-primary-2 w-100">
	                                        <b>Register Here </b>
	                                    </a>
	                                </div>  
	                            </div>

					<!-- ================ sign in close =========== -->

                        
					</div><!-- End .tab-content -->
				</div><!-- End .form-tab -->
    		</div><!-- End .form-box -->

    	</div><!-- End .container -->
    </div><!-- End .login-page section-bg -->
</main><!-- End .main -->
<?php 
include "includes/footer.php";
?>
<!-- login-ajax-files/forgot-password.php -->
<script type="text/javascript">
$(document).ready(function(){
	$("#check-email-f").on("click",function(e) {
	e.preventDefault();
	var Uemail  = $("#u-email-f").val();

		if($.trim(Uemail).length == 0){
			$("#error-message").html("<div class='alert alert-dismissible fade show alert-danger mt-1 rounded ' role='alert'>Please enter your Username or email.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
            $("#success-message").slideUp();
            setTimeout(function(){$("#error-message").fadeOut("slow")}, 4000);
            e.preventDefault();
		}else if(!isEmail(Uemail)){
            	$("#error-message").html("<div class='alert alert-dismissible fade show alert-danger mt-1 rounded ' role='alert'>Please enter valid email.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
            	$("#success-message").slideUp();
            	setTimeout(function(){$("#error-message").fadeOut("slow")}, 4000);
		}else{
			$.ajax({
			 	url : "login-ajax-files/forgot-password.php",
			 	type : "POST",
			 	data : {f_u_email:Uemail},
			 	beforesend: function(){
			 		$("#success-message").html("<div class='alert alert-dismissible fade show alert-info mt-1 rounded' role='alert'>Please wait for verifying<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
            		$("#error-message").slideUp();
			 	},
			 	success : function(data){
			 		if(data == 3){
			 		$("#success-message").html("<div class='alert alert-dismissible fade show alert-success mt-1 rounded' role='alert'>verification code sent to your Email.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
            		$("#error-message").slideUp();	
            		$('#submit-user-login').trigger("reset");
            		setTimeout(function(){location.replace("reset_code.php")}, 4000);
            		//location.replace("reset_code.php");
            	}else if(data == 1){
            		$("#error-message").html("<div class='alert alert-dismissible fade show alert-danger mt-1 rounded' role='alert'>something went wrong.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
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
</script>