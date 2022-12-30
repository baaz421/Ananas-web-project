<?php
// admin-signup-verification.php
session_start();
// unset($_SESSION['e_msg']);
require "../db_connnection.php";
if(isset($_SESSION['e_msg'])){
	$error_msg = $_SESSION['e_msg'];
}else{
	$error_msg = "";
}
// echo $_SESSION['a_email'];
if(isset($_GET['admin-verify-submit'])){
	$admin_v_code =mysqli_real_escape_string($conn, trim($_GET['admin-verify-code']));	
	$v_code = (is_numeric($admin_v_code) ? (int)$admin_v_code : 0);
	if(is_int($v_code)){
		$code = 0;
		$status = 'verified';
		$admin_email = $_SESSION['a_email']; //getting this email using session
    $check_code = "SELECT * FROM admin WHERE a_vcode = '$v_code'";
    echo $check_code;
    $code_res = mysqli_query($conn, $check_code);
    if(mysqli_num_rows($code_res) > 0){
        $fetch_data = mysqli_fetch_assoc($code_res);
        $update_pass = "UPDATE admin SET a_vcode = $code, a_vstatus = '$status' WHERE a_email = '{$admin_email}'";
        mysqli_query($conn, $update_pass);
        unset($_SESSION['e_msg']);
        header("location: ../");
        exit();
    
    }else{
        $error_message = "Sorry, Wrong verification code. $admin_v_code ";
        $_SESSION['e_msg'] = $error_message;
        header("location: admin-signup-verification.php");
    }
	}
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Ananas | verification </title>
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
										<h1> Admin Verification</h1> 
									</div>
									<p>Please enter verification code. </p>
									<p>Goto Mainsite <a href="../" class="btn btn-light">Click Here..</a> </p>
								</div>
							</div>
						</div>
						<!-- Form Panel    -->
						<div class="col-lg-6 bg-white">
							<div class="form d-flex align-items-center">
								<div class="content" id="admin-login-form" >
									<form method="get" action="admin-signup-verification.php" class="form-validate">
										<div class="text-danger"><?php echo  $error_msg; ?></div><br>

										<div class="form-group">
											<input id="admin-verify-code" type="number" name="admin-verify-code" required data-msg="Please enter verification code" class="input-material" placeholder="Enter verification Code">
											<label for="admin-users" class="label-material"></label>
										</div>
										<button id="admin-verify-submit" name="admin-verify-submit" class="btn btn-primary">Submit</button>
										<a href="../" class="btn btn-primary">Skip</a>

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
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/popper.js/umd/popper.min.js"> </script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
		<script src="vendor/chart.js/Chart.min.js"></script>
		<script src="vendor/jquery-validation/jquery.validate.min.js"></script>
		<!-- Main File-->
		<script src="js/front.js"></script>
		<script type="text/javascript">
			


			

		</script>
	</body>
</html>