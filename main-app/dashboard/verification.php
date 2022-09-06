<!-- verification.php -->
<?php
include "header-user.php";
?>
<div class="main-panel">        
    <div class="content-wrapper">
    	<?php
if(isset($_SESSION['u_email'])){
    @$email = $_SESSION['u_email'];
    $check_verify = "SELECT * FROM users WHERE email = '$email'";
    $run_verify = mysqli_query($conn, $check_verify);
    if(mysqli_num_rows($run_verify) > 0){
        $fetch = mysqli_fetch_assoc($run_verify);
        $vstatus = $fetch['vstatus'];
        if($vstatus == "notverified"){

        echo"<div id='success-message'>
                <div class='alert alert-dismissible fade show alert-warning mb-1 rounded text-dark' role='alert'>
                    You account not verified, please verify you account. <a href='verification.php' class='ti-arrow-down'>Here</a>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>
              </div>";

        }
    }
}
?>
    	<!-- ERROR MESSAGE DIV-->
      	<div id="error-message">
      		<!-- <div class='alert alert-dismissible fade show alert-danger mt-1 rounded ' role='alert'>Please enter your Username.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div> -->
      	</div>
      	<div id="success-message">
      		<!-- <div class='alert alert-dismissible fade show alert-success mt-1 rounded' role='alert'>Successfully Deposited Amount. Please click <a href="index.php" class="text-dark">Dashboard</a> to view balance.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div> -->
      	</div>
    <!-- ERROR MESSAGE DIV CLOSE-->
      <div class="row">
        <div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Verification *</h4>
              <p class="card-description">
                Please enter the 6 digit code you received by email and phone , Thank you...
              </p>
              <form class="form-inline" id="submit-user-verify">
                <input type="number" class="form-control mb-2 mr-sm-2" name="otp" id="otp" placeholder="Enter verification code" step="any">
                <input type="number" id="u-id" value="<?php echo $u_id; ?>" hidden>
                <button type="submit" class="btn btn-primary mb-2" name="otp-submit" id="otp-submit">Submit</button>
              </form>
              <p class="text-danger">*note only numbers!</p>
              <p><a href="#">Resend Code</a></p>
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
<script type="text/javascript">
$(document).ready(function(){

	$("#otp-submit").on("click",function(e) {
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
			 	url : "user-amount-ajax/verify-user.php",
			 	type : "POST",
			 	data : {u_otp:v_code},
			 	beforesend: function(){
			 		$("#success-message").html("<div class='alert alert-dismissible fade show alert-info mt-1 rounded' role='alert'>Please wait for verification....<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
            		$("#error-message").slideUp();
			 	},
			 	success : function(data){
			 		if(data == 3){
			 		$("#success-message").html("<div class='alert alert-dismissible fade show alert-success mt-1 rounded' role='alert'>Successfully verified thank you.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
            		$("#error-message").slideUp();	
            		$('#submit-user-verify').trigger("reset");
            		setTimeout(function(){location.replace("index.php")}, 4000);
            	}else{
			 			$("#error-message").html("<div class='alert alert-dismissible fade show alert-danger mt-1 rounded ' role='alert'>"+data+"Code Doesn't match OR Incorrect code.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
            			$("#success-message").slideUp();
			 		}
			 	}
			 });

		}


	});

});	
</script>