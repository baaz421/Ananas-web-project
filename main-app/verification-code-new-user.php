<!-- verification-code-new-user.php -->
<?php 
ob_start();
include "includes/header.php";

@$email = $_SESSION['u_email'];
if($email != true){
	
	header('Location: index.php');
}
if(@$_GET['continue'] == ""){
    $linkTo = "";
}else{
    $linkTo = $_GET['continue'];
}

?>

<main class="main">

    <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17" style="background-image: url('assets/images/backgrounds/login-bg.jpg')">
    	<div class="container">    		
    		<div class="form-box">
    			<div class="form-tab">
        			<ul class="nav nav-pills nav-fill" role="tablist">
					    <li class="nav-item">
					        <a class="nav-link active" >Forgot Password</a>

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
					    	<form method="post" id="submit-user-verify">
					    		<div class="form-group">
					    			<input type="number" id="otp" class="form-control" placeholder="Enter verification code" name="otp" step="any" required>
					    		</div><!-- End .form-group -->

					    		<div class="form-footer">
					    			<button type="submit" name="check-reset-otp" id="check-reset-otp" class="btn btn-outline-primary-2">
	                					<span>Continue</span>
	            						<i class="icon-long-arrow-right"></i>
	                				</button>
	                			</div>
					    	</form>
					    </div><!-- .End .tab-pane -->
					    <div class="text-center">
					    	<h6>Let me verify Later, Go to</h6>
					    		<a href="dashboard">
					    			<button class="btn btn-outline-primary-2">
	                					<span>Dashboard</span>
	            						<i class="icon-long-arrow-right"></i>
	                				</button>
	                			</a>
	                			OR
	                			<a href="index.php">
					    			<button class="btn btn-outline-primary-2">
	                					<span>Home</span>
	            						<i class="icon-long-arrow-right"></i>
	                				</button>
	                			</a>
	                		
					    </div>
					<!-- ================ sign in close =========== -->
 
                        
					</div><!-- End .tab-content -->
				</div><!-- End .form-tab -->
    		</div><!-- End .form-box -->

    	</div><!-- End .container -->
    </div><!-- End .login-page section-bg -->
</main><!-- End .main -->
<div class="backlayer" style="display: none;">
  <span class="loader"></span>
</div>
<?php 
include "includes/footer.php";
?>
<!-- login-ajax-files/rest-code.php -->
<script type="text/javascript">
$(document).ready(function(){

	$("#check-reset-otp").on("click",function(e) {
	e.preventDefault();

	var v_code  = $("#otp").val();

		if(v_code.length == 0){
			$("#error-message").html("<div class='alert alert-dismissible fade show alert-danger mt-1 rounded ' role='alert'>Please enter verifiaction code.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
            $("#success-message").slideUp();
            setTimeout(function(){$("#error-message").fadeOut("slow")}, 4000);
		}else if(v_code.length != 6){
			$("#error-message").html("<div class='alert alert-dismissible fade show alert-danger mt-1 rounded ' role='alert'>Please enter 6 digit code not more not less.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
        	$("#success-message").slideUp();
        	setTimeout(function(){$("#error-message").fadeOut("slow")}, 4000);
		}else{
			$.ajax({
			 	url : "login-ajax-files/verification-code-new-user.php",
			 	type : "POST",
			 	data : {u_otp:v_code},
			 	beforeSend: function () {
		          $(".backlayer").show();
		        },
			 	success : function(data){
			 		if(data == 3){
			 		$("#success-message").html("<div class='alert alert-dismissible fade show alert-success mt-1 rounded' role='alert'>Successfully verified thank you.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
            		$("#error-message").slideUp();	
            		$('#submit-user-verify').trigger("reset");
            		setTimeout(function(){location.replace("<?php echo $linkTo; ?>")}, 4000);
            		//location.replace("reset_code.php");
            	}else if(data == 1){
            		$("#error-message").html("<div class='alert alert-dismissible fade show alert-danger mt-1 rounded' role='alert'>something went wrong.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
            		$("#success-message").slideUp();
			 		}else{
			 			$("#error-message").html("<div class='alert alert-dismissible fade show alert-danger mt-1 rounded ' role='alert'>Code Doesn't match OR Incorrect code.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
            			$("#success-message").slideUp();
			 		}
			 	},
			 	complete: function () {
		          $(".backlayer").hide();
		        }
			 });

		}


	});

});	

</script>
