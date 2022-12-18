<?php
session_start();
if(isset($_SESSION['e_msg'])){
  $error_msg = $_SESSION['e_msg'];
}else{
  $error_msg = "";
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Bootstrap Material Admin by Bootstrapious.com</title>
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
    <link rel="stylesheet" href="css/style.sea.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">
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
                    <h1>Master Admin Signin</h1> 
                  </div>
                  <p>Please enter your login details to signin in dashboard </p>
                  <p>Goto Mainsite <a href="../" class="btn btn-light">Click Here..</a> </p>
                </div>
              </div>
            </div>
            <!-- Form Panel    -->
            <div class="col-lg-6 bg-white">
              <div class="form d-flex align-items-center">
                <div class="content" id="admin-login-form" >
                  <form method="post" action="admin-login-system-ajax/admin-login.php" class="form-validate">
                    <div class="text-danger"><?php echo  $error_msg; ?></div><br>

                    <div class="form-group">
                      <input id="admin-users" type="text" name="admin-user" required data-msg="Please enter your username" class="input-material">
                      <label for="admin-users" class="label-material">User Name</label>
                    </div>

                    <div class="form-group">
                      <input id="admin-password" type="password" name="admin-password" required data-msg="Please enter your password" class="input-material">
                      <label for="admin-password" class="label-material">Password</label>
                    </div>

                    <button id="admin-login" name="admin-login" class="btn btn-primary">Login</button>

                    <!-- This should be submit button but I replaced it with <a> for demo purposes-->
                  </form>
                  <a id="fgp" href="#"  class="forgot-pass">Forgot Password?</a>
                  <br>
                  <small>Do not have an account? </small><a href="admin-register.php" class="signup">Signup</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="copyrights text-center">
        <p>Design by <a href="https://bootstrapious.com/p/admin-template" class="external">Baaz Designer</a>
        </p>
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