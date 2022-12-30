<?php
// admin-fp-new_password.php
session_start();
require "../db_connnection.php";
if(isset($_SESSION['e_msg'])){
  $error_msg = $_SESSION['e_msg'];
}else{
  $error_msg = "";
}
if(isset($_POST['admin-new-password-submit'])){
	
  $pass =mysqli_real_escape_string($conn, $_POST['admin-new-password']);
  $c_pass =mysqli_real_escape_string($conn, $_POST['admin-new-c-password']);

  if($pass === $c_pass){
  	$time = $date;
		$code = 0;
		$status = 'verified';
		$admin_email = $_SESSION['a_email']; //getting this email using session
		$encpass = password_hash($pass, PASSWORD_BCRYPT);

		$update_pass = "UPDATE admin SET a_vcode = $code, a_vstatus = '$status', a_password = '$encpass', a_updatetime = '$time' WHERE a_email = '{$admin_email}'";

		if(mysqli_query($conn, $update_pass)){
			$check_email = "SELECT * FROM admin WHERE a_email = '$admin_email'";
			$res = mysqli_query($conn, $check_email) or die("Connection failed");
			$fetch = mysqli_fetch_assoc($res);
			$_SESSION['a_email'] 		= $admin_email;
			$_SESSION['a_password'] = $fetch['a_password'];
			$_SESSION['a_id'] 			= $fetch['AID'];
			$_SESSION['a_country'] 	= $fetch['a_country'];
			header("location: ../");
		}else{
			$error_message = "Sorry!. Something went wrong.";
    	$_SESSION['e_msg'] = $error_message;
    	header("location: admin-fp-new_password.php");
		}    
  }else{
    $error_message = "Confirm Password not matched, Please Check.";
    $_SESSION['e_msg'] = $error_message;
    header("location: admin-fp-new_password.php");
  }
}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ananas | Forgot Password</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="../vendor/font-awesome/css/font-awesome.min.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="../css/fontastic.css">
    <!-- Google fonts - Poppins -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="../css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="../css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="../img/favicon.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

		<!-- ========css styling starts here =============-->
		<style type="text/css">
			.pass_show{position: relative} 
			.pass_show .ptxt { 
				position: absolute;
				top: 50%; 
				right: 10px; 
				z-index: 1; 
				color: #193586; 
				margin-top: -10px;
				cursor: pointer; 
				transition: .3s ease all; 
			} 

			.pass_show .ptxt:hover{color: #333333;} 
		</style>
		<!-- ========css styling close here =============-->
  </head>
  <body>
    <div class="page login-page">
      <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
          <div class="row">
            <!-- Logo & Information Panel-->
            <div class="col-lg-6">
              <div class="info d-flex align-items-center">
                <div class="content">
                  <div class="logo">
                    <h1> Admin Forgot Password.</h1> 
                  </div>
                  <p>Please enter new password and confirm password</p>
                  <p>Goto Mainsite <a href="../" class="btn btn-light">Click Here..</a> </p>
                </div>
              </div>
            </div>
            <!-- Form Panel    -->
            <div class="col-lg-6 bg-white">
              <div class="form d-flex align-items-center">
                <div class="content" id="admin-login-form" >
                  <form action="admin-fp-new_password.php" method="post" class="form-validate">
                    <div class="text-danger"><?php echo  $error_msg; ?></div><br>
                    <div class="form-group pass_show">
                      <input id="admin-new-password" type="password" name="admin-new-password" required data-msg="Please enter new password" class="input-material" placeholder="New Password">
                    </div>
                    <div class="form-group pass_show">
                      <input id="admin-new-c-password" type="password" name="admin-new-c-password" required data-msg="Please enter new password" class="input-material" placeholder="Confirm Password">
                    </div>
                    <button id="admin-new-password-submit" name="admin-new-password-submit" class="btn btn-primary">Submit</button>

                    <!-- This should be submit button but I replaced it with <a> for demo purposes-->
                  </form>
                  <br>
                  <small>Do not have an account? </small><a href="../admin-register.php" class="signup">Signup</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="copyrights text-center">
        <p>Design by <a href="#" class="external">Baaz Designer</a></p>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/popper.js/umd/popper.min.js"> </script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="../vendor/chart.js/Chart.min.js"></script>
    <script src="../vendor/jquery-validation/jquery.validate.min.js"></script>
    <!-- Main File-->
    <script src="js/front.js"></script>
    <script type="text/javascript">     
	// show and hide password
		$(document).ready(function(){
		  $('.pass_show').append('<span class="ptxt">Show</span>'); 
		}); 
		$(document).on('click','.pass_show .ptxt', function(){ 
			$(this).text($(this).text() == "Show" ? "Hide" : "Show"); 
			$(this).prev().attr('type', function(index, attr){return attr == 'password' ? 'text' : 'password'; });
		}); 

 
    </script>
  </body>
</html>