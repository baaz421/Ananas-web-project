<?php
// forgot-admin-password.php
session_start();
require "../db_connnection.php";
if(isset($_SESSION['e_msg'])){
  $error_msg = $_SESSION['e_msg'];
}else{
  $error_msg = "";
}


if(isset($_POST['admin-fp-submit'])){
  $admin_email =mysqli_real_escape_string($conn, $_POST['admin-email']);
  $check_email = "SELECT * FROM admin WHERE a_email = '$admin_email'";
  $res = mysqli_query($conn, $check_email) or die("Connection failed");
  if(mysqli_num_rows($res) > 0){
    $code = rand(999999, 111111);
    $status = "notverified";
    $insert_code = "UPDATE admin SET a_vcode = '$code', a_vstatus ='{$status}', a_updatetime = '{$date}' WHERE a_email = '{$admin_email}'";
    $run_query =  mysqli_query($conn, $insert_code);
      if($run_query){
        // $subject = "Forgot password Verification Code";
        // $msg_mobile = "Forgot password verification code is $code";
        // $msg_email = ForgotPasswordEmail($code);
        // $number = $fetch_m_code.$fetch_m_num;                 
        // $sms = send_sms($number, $msg_mobile);
        // $mail = smtp_mailer($email, $subject, $msg_email); 
        // if($mail == 0 || $sms != false){
        //   $_SESSION['a_email'] = $admin_email;
        //   header("location: admin-fp-verification-code.php");
        //   exit();
        // }
        $_SESSION['a_email'] = $admin_email;
        header("location: admin-fp-verification-code.php");

        unset($_SESSION['e_msg']);
      }else{
          // echo 1; // Something went wrong!
          $error_message = "Sorry, Something went wrong! ";
          $_SESSION['e_msg'] = $error_message;
          header("location: forgot-admin-password.php");
      }
  }else{
    // echo 2; // "It's look like you're not yet a member! Click on the bottom link to signup.";
    $error_message = "It's look like you're not yet a member! Click on the bottom link to signup.";
    $_SESSION['e_msg'] = $error_message;
    header("location: forgot-admin-password.php");
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
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
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
                  <p>Please enter your Email to Reset Password.</p>
                  <p>Goto Mainsite <a href="../" class="btn btn-light">Click Here..</a> </p>
                </div>
              </div>
            </div>
            <!-- Form Panel    -->
            <div class="col-lg-6 bg-white">
              <div class="form d-flex align-items-center">
                <div class="content" id="admin-login-form" >
                  <form action="forgot-admin-password.php" method="post" class="form-validate">
                    <div class="text-danger"><?php echo  $error_msg; ?></div><br>
                    <div class="form-group">
                      <input id="admin-email" type="email" name="admin-email" required data-msg="Please enter your email" class="input-material" placeholder="example@example.com">
                      <label for="admin-users" class="label-material"></label>
                    </div>
                    <button id="admin-fp-submit" name="admin-fp-submit" class="btn btn-primary">Submit</button>

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