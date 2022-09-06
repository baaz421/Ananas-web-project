<?php 

include "includes/header.php";
?> 
<!-- ========css styling starts here =============-->
<style type="text/css">
	.pass_show{position: relative} 

	.pass_show .ptxt { 

	position: absolute; 

	top: 50%; 

	right: 10px; 

	z-index: 1; 

	color: #193586; 

	margin-top: 5px; 

	cursor: pointer; 

	transition: .3s ease all; 

	} 

	.pass_show .ptxt:hover{color: #333333;} 
</style>
<!-- ========css styling close here =============-->

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
					    	<form action="new_password.php" method="post">					    		
					    		<div class="form-group pass_show">
					    			<label for="singin-password-2">Create new password*</label>
					    			<input type="password" class="form-control" id="password" name="password" required>
					    		</div><!-- End .form-group -->
					    		<div class="form-group pass_show">
					    			<label for="singin-password-2">Confirm your password*</label>
					    			<input type="password" class="form-control" id="cpassword" name="cpassword" required>
					    		</div><!-- End .form-group -->

					    		<div class="form-footer">
					    			<button type="submit" name="change-password" id="change-password" class="btn btn-outline-primary-2">
	                					<span>Continue</span>
	            						<i class="icon-long-arrow-right"></i>
	                				</button>
					    	</form>
					    </div><!-- .End .tab-pane -->

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
<script type="text/javascript">
$(document).ready(function(){

// show and hide password
$(document).ready(function(){
  $('.pass_show').append('<span class="ptxt">Show</span>');  
});  

$(document).on('click','.pass_show .ptxt', function(){ 
	$(this).text($(this).text() == "Show" ? "Hide" : "Show"); 
	$(this).prev().attr('type', function(index, attr){return attr == 'password' ? 'text' : 'password'; });
}); 

// submit password

	$("#change-password").on("click",function(e) {
	e.preventDefault();

	var pass = $("#password").val();
	var cpass = $("#cpassword").val();


		if($.trim(pass).length == 0){
			$("#error-message").html("<div class='alert alert-dismissible fade show alert-danger mt-1 rounded ' role='alert'>Please enter password.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
            $("#success-message").slideUp();
            setTimeout(function(){$("#error-message").fadeOut("slow")}, 4000);
		}else if($.trim(cpass).length == 0){
			$("#error-message").html("<div class='alert alert-dismissible fade show alert-danger mt-1 rounded ' role='alert'>Please enter confirm password.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
        	$("#success-message").slideUp();
        	setTimeout(function(){$("#error-message").fadeOut("slow")}, 4000);
		}else if(pass !== cpass){
			$("#error-message").html("<div class='alert alert-dismissible fade show alert-danger mt-1 rounded ' role='alert'>Confirm password doen't match please retry again.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
        	$("#success-message").slideUp();
        	setTimeout(function(){$("#error-message").fadeOut("slow")}, 4000);
		}else{
			$.ajax({
			 	url : "login-ajax-files/new-password.php",
			 	type : "POST",
			 	data : {u_password:pass,u_cpassword:cpass},
			 	beforesend: function(){
			 		$("#success-message").html("<div class='alert alert-dismissible fade show alert-info mt-1 rounded' role='alert'>Please wait for updating password.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
            		$("#error-message").slideUp();
			 	},
			 	success : function(data){
			 		if(data == 3){
			 		$("#success-message").html("<div class='alert alert-dismissible fade show alert-success mt-1 rounded' role='alert'>Successfully password changed.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
            		$("#error-message").slideUp();	
            		$('#submit-user-login').trigger("reset");
            		setTimeout(function(){location.replace("dashboard")}, 3000);
            		//location.replace("reset_code.php");
            	}else{
			 			$("#error-message").html("<div class='alert alert-dismissible fade show alert-danger mt-1 rounded ' role='alert'>Something went wrong, Failed to change your password!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
            			$("#success-message").slideUp();
			 		}
			 	}
			 });

		}


	});

});	
</script>