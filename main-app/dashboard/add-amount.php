<!-- add-amount.php -->
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
                    You account not verified, please verify you account. <a href='verification.php'> Click Here</a>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>
              </div>";
        $disable = "disabled";

        }else{
        	$disable = "";
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
              <h4 class="card-title">Pay Deposite Amount</h4>
              <p class="card-description">
                Please enter the amount value for deposite , Thank you...
              </p>
              <form class="form-inline" id="deposite-form">
                <input type="number" class="form-control mb-2 mr-sm-2" id="u-deposite" name="u-deposite" placeholder="Enter Amount Here" step="any">
                <input type="number" id="u-id" value="<?php echo $u_id; ?>" hidden>
                <button type="submit" class="btn btn-primary mb-2" name="u-d-pay" id="u-d-pay" <?php echo $disable; ?>>Deposite</button>
              </form>
              <p class="text-danger">*note don't add decimal numbers or dot!</p>
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

	$("#u-d-pay").on("click",function(e){
		e.preventDefault();
		var deposite_amt = $("#u-deposite").val().split('.')[0];
		var u_id = $("#u-id").val();
		if(deposite_amt.length == 0){
			$("#error-message").html("<div class='alert alert-dismissible fade show alert-danger mt-1 rounded ' role='alert'>Please enter Amount.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
            $("#success-message").slideUp();
            setTimeout(function(){$("#error-message").fadeOut("slow")}, 4000);
		}else if(deposite_amt > 500){
			$("#error-message").html("<div class='alert alert-dismissible fade show alert-danger mt-1 rounded ' role='alert'>you can't deposite morethan 500, Thank you.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
            $("#success-message").slideUp();
            setTimeout(function(){$("#error-message").fadeOut("slow")}, 4000);
		}else{
			$.ajax({
			 	url : "user-amount-ajax/deposite-amount.php",
			 	type : "POST",
			 	data : {u_dep:deposite_amt,u_id:u_id}, 
			 	success : function(data){
			 		if(data == 1){
						$("#success-message").html("<div class='alert alert-dismissible fade show alert-success mt-1 rounded' role='alert'>Amount added to you'r account (Successfully Deposited). Please click <a href='index.php' class='text-dark'>Dashboard</a> to view balance.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
			            $("#error-message").slideUp();
			            $("#deposite-form").trigger("reset");
			        }else{
			        	$("#error-message").html("<div class='alert alert-dismissible fade show alert-danger mt-1 rounded ' role='alert'>Something went wrong, Please try again.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
			            $("#success-message").slideUp();
			            //setTimeout(function(){$("#error-message").fadeOut("slow")}, 4000);
			        }
    			}
			});
		}

		
	});
});
</script>
