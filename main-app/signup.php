<?php 

include "includes/header.php";
if(@$_GET['continue'] == ""){
    $linkTo = "";
}else{
    $linkTo = $_GET['continue'];
}
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

    /*for phone number validation css*/
    #valid-msg {
          color: #00C900;
      } 
      .hide {
          display: none;
      }
      #error-msg {
          color: red;
      }
      #valid-msg {
          color: #00C900;
      }
</style>
<!-- ========css styling close here =============-->


<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../index.php"><?php echo $english['home']; ?></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $english['signup']; ?></li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17" style="background-image: url('assets/images/backgrounds/login-bg.jpg')">
        <div class="container">         
            <div class="form-box">
                <div class="form-tab">
                    <ul class="nav nav-pills nav-fill" role="tablist">
                        
                        <li class="nav-item">
                            <a class="nav-link active">Register</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                    
                        <!-- ERROR MESSAGE DIV-->
                          <div id="error-message">
                          </div>
                          <div id="success-message">
                          </div>
                        <!-- ERROR MESSAGE DIV CLOSE-->
                        <!-- ================ register starts =========== -->

                        <div class="tab-pane fade show active" >
                            <form id="signup-form">
                                <div class="form-group">
                                    <label for="register-email-2">Your name *</label>
                                    <input type="text" class="form-control" name="username" id="username" required="Please enter your name">
                                </div><!-- End .form-group -->
                                <div class="form-group">
                                    <label for="register-email-2">Your email address *</label>
                                    <input type="email" class="form-control" name="useremail" id="useremail" required >
                                </div><!-- End .form-group -->

                                <div class="form-group pass_show">
                                    <label for="register-password-2">Password *</label>
                                    <input type="password" class="form-control" name="userpass" id="userpass" required >
                                </div><!-- End .form-group -->
                                <div class="form-group">
                                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
                                    <label for="register-password">Your mobile number*</label>                                           
                                    <input type="tel" class="form-control" id="phone" size="100%" name="phone" required >
                                    <span id="valid-msg" class="hide">✓ Valid</span>
                                    <span id="error-msg" class="hide"></span>
                                    <input type="text" class="form-control" id="ccodez" name="ccodez" hidden >
                                    <input type="text" class="form-control" id="twoalph" name="twoalph" hidden >
                                    <input type="text" class="form-control" id="cname" name="cname"  hidden>
                                </div><!-- End .form-group -->
                                <div class="form-group">
                                    <label for="register-password">Date Of Birth *</label>
                                    <input type="date" id="dob" name="dob" min="1950-01-02" max="2006-01-01" class="form-control" >
                                </div><!-- End .form-group -->

                                <div class="form-footer">
                                    <button type="submit" id="signup" name="signup" class="btn btn-outline-primary-2">
                                        <span>SIGN UP</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="register-policy-2" >
                                        <label class="custom-control-label" for="register-policy-2">I agree to the <a href="#">privacy policy</a> *</label>
                                    </div><!-- End .custom-checkbox -->
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
                                        <a href="#" class="btn btn-login  btn-f">
                                            <i class="icon-facebook-f"></i>
                                            Login With Facebook
                                        </a>
                                    </div><!-- End .col-6 -->
                                </div><!-- End .row -->
                            </div><!-- End .form-choice -->
                            <div class="row">
                                <div class="col-sm">
                                    <br>
                                    <p class="text-center">or if already member</p>
                                    <a href="login.php" class="btn btn-login">
                                        <b>Log in Here</b>
                                    </a>
                                </div>  
                            </div>
                        </div><!-- .End .tab-pane -->

                        <!-- ================ register starts =========== -->
                    </div><!-- End .tab-content -->
                </div><!-- End .form-tab -->
            </div><!-- End .form-box -->

        </div><!-- End .container -->
        
    </div><!-- End .login-page section-bg -->
</main><!-- End .main -->
<div class="backlayer" style="display: none;">
  <span class="loader"></span>
</div>
<script src="build/js/intlTelInput.js"></script>
<script>
  var input = document.querySelector("#phone"),
  errorMsg = document.querySelector("#error-msg"),
  validMsg = document.querySelector("#valid-msg");

  // here, the index maps to the error code returned from getValidationError - see readme
  var errorMap = ["Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];

  // initialise plugin
  var iti = window.intlTelInput(input, {
  //nationalMode: true,
  initialCountry: "auto",
  geoIpLookup: function(callback) {
    $.get('https://ipinfo.io/', function() {}, "jsonp").always(function(resp) {
      var countryCode = (resp && resp.country) ? resp.country : "qa";
      console.log(resp.country);
      callback(countryCode);
    });
  },
  separateDialCode: true,
  utilsScript: "build/js/utils.js"
  });

  var reset = function() {
    input.classList.remove("error");
    errorMsg.innerHTML = "";
    errorMsg.classList.add("hide");
    validMsg.classList.add("hide");
  };

  // on blur: validate
    input.addEventListener('blur', function() {
      reset();
      if (input.value.trim()) {
        if (iti.isValidNumber()) {
          validMsg.classList.remove("hide");
        } else {
          input.classList.add("error");
          var errorCode = iti.getValidationError();
          errorMsg.innerHTML = errorMap[errorCode];
          errorMsg.classList.remove("hide");
        }
      }
      // console.log($("#twoalph").val());
      // console.log($("#ccodez").val());
      
    });

  // on keyup / change flag: reset
  input.addEventListener('change', reset);
  input.addEventListener('keyup', reset);
</script>
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

    $("#signup").on("click",function(e){
        e.preventDefault();

        var u_name      = $("#username").val();
        var u_email     = $("#useremail").val();
        var u_pass      = $("#userpass").val();
        var u_phone     = $("#phone").val();
        var u_ccodez    = $("#ccodez").val();
        var u_cname     = $("#cname").val();
        var u_dob       = $("#dob").val();
        var u_iso2      = $("#twoalph").val();
        // console.log($("#twoalph").val());


        // closes
            if($.trim(u_name).length == 0 || $.trim(u_email).length == 0 || $.trim(u_pass).length == 0 || $.trim(u_phone).length ==0 ){
                $("#error-message").html("<div class='alert alert-dismissible fade show alert-danger mt-1 rounded ' role='alert'>Please fill all fields .<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
                $("#success-message").slideUp();
                setTimeout(function(){$("#error-message").fadeOut("slow")}, 4000);
                e.preventDefault();
            }else if(!iti.isValidNumber()){
                $("#error-message").html("<div class='alert alert-dismissible fade show alert-danger mt-1 rounded ' role='alert'>Please enter Valid phone number.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
                $("#success-message").slideUp();
                setTimeout(function(){$("#error-message").fadeOut("slow")}, 4000);
                e.preventDefault();
            }else if(!$('#register-policy-2').is(':checked')){
                $("#error-message").html("<div class='alert alert-dismissible fade show alert-danger mt-1 rounded ' role='alert'>Please click check box for agree to the privacy policy.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
                $("#success-message").slideUp();
                //setTimeout(function(){$("#error-message").fadeOut("slow")}, 4000);
                e.preventDefault();
            }else{
                $.ajax({
                    url : "login-ajax-files/user-signup.php",
                    type : "POST",
                    data : {u_name:u_name,u_email:u_email,u_pass:u_pass,u_phone:u_phone,u_ccode:u_ccodez,u_cname:u_cname,u_dob:u_dob, u_iso2:u_iso2},
                    beforeSend: function () {
                      $(".backlayer").show();
                    },
                    success : function(data){
                        if(data == 3){
                            $("#success-message").html("<div class='alert alert-dismissible fade show alert-success mt-1 rounded' role='alert'>Successfull, thank you.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
                            $("#error-message").slideUp();  
                            $('#submit-user-login').trigger("reset");
                            setTimeout(function(){location.replace("verification-code-new-user.php?continue=<?php echo $linkTo; ?>")}, 3000);
                            //location.replace("reset_code.php");
                        }else if(data == 1){
                            $("#error-message").html("<div class='alert alert-dismissible fade show alert-danger mt-1 rounded ' role='alert'>Email that you have entered is already exist!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
                            $("#success-message").slideUp();
                        }else if(data == 2){
                            $("#error-message").html("<div class='alert alert-dismissible fade show alert-danger mt-1 rounded ' role='alert'>Phone number that you have entered is already exist!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
                            $("#success-message").slideUp();
                        }else if(data == 4){
                            $("#error-message").html("<div class='alert alert-dismissible fade show alert-danger mt-1 rounded ' role='alert'>Failed while sending code!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
                            $("#success-message").slideUp();
                        }else{
                            $("#error-message").html("<div class='alert alert-dismissible fade show alert-danger mt-1 rounded ' role='alert'>Failed while sign up please try again.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
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