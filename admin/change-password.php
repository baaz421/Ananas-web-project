<?php 
//change-password.php
?>
<?php
//admin-profile.php
include 'header.php';
$a_id = $_SESSION['a_id'];
$sql_get_admin_data = "SELECT * FROM admin WHERE AID = {$a_id}";
$run_sql_get_admin_data = mysqli_query($conn,$sql_get_admin_data);
$admin_data = mysqli_fetch_assoc($run_sql_get_admin_data);


?>
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


<div class="content-inner">
  <!-- Page Header-->
  <header class="page-header">
    <div class="container-fluid">
      <h2 class="no-margin-bottom">Change Password</h2>
    </div>
  </header>

<!-- ERROR MESSAGE DIV-->
  <div id="error-message"></div>
  <div id="success-message">
  	<!-- <div class='alert alert-dismissible fade show alert-success ' role='alert'>
  		<?php
  		// echo 
  		// $admin_data['AID']."--".
  		// $admin_data['a_username']."--".
  		// $admin_data['a_fullname']."--".
  		// $admin_data['a_email']."--".
  		// $admin_data['a_gender']."--".
  		// $admin_data['a_country']."--".
  		// $admin_data['a_phonecode']."--".
  		// $admin_data['a_phone']."--".
  		// $admin_data['a_dateofbirth']."--".
  		// $admin_data['a_createtime']."--".
  		// $admin_data['a_profilepic'];

  		?>
  		<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
  			<span aria-hidden='true'>&times;</span>
  		</button>
  	</div> -->
  </div>
<!-- ERROR MESSAGE DIV CLOSE-->

  <!-- Dashboard Counts Section-->
  <section class="dashboard-counts no-padding-bottom">
    <div class="container-fluid">
      <div class="row bg-white has-shadow">

 		 <div class="container">
				<div class="row">
					<div class="col-sm-4">
					   <form method="post" id="password-change" > 
					    <label>Current Password</label>
					    <div class="form-group pass_show"> 
			                <input type="password" class="form-control" name="o_pass" id="o_pass" placeholder="Current Password"> 
			            </div> 
					       <label>New Password</label>
			            <div class="form-group pass_show"> 
			                <input type="password" class="form-control" name="n_pass" id="n_pass" placeholder="New Password"> 
			            </div> 
					       <label>Confirm Password</label>
			            <div class="form-group pass_show"> 
			                <input type="password" class="form-control" name="c_pass" id="c_pass" placeholder="Confirm Password"> 
			            </div> 
			            <div class="form-group"> 
			                <input type="submit" value="Submit" id="change-pass" class="btn btn-info w-100" > 
			            </div>
			           </form>
					</div>  
				</div>
			</div>	  
      	

      </div>
    </div>
  </section>


  
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/popper.js/umd/popper.min.js"> </script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
<script src="vendor/jquery-validation/jquery.validate.min.js"></script>
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


// submit password
$("#change-pass").on("click",function(e){
  e.preventDefault();
  var old_pass 	= $("#o_pass").val();
  var new_pass  = $("#n_pass").val();
  var con_pass 	= $("#c_pass").val();

  if(old_pass == "" || new_pass == "" || con_pass == ""){
    $("#error-message").html("<div class='alert alert-dismissible fade show alert-danger' role='alert'>Please fill all fields .<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
    $("#success-message").slideUp();
    setTimeout(function(){$("#error-message").fadeOut("slow")}, 3000);

  }else if(new_pass != con_pass){
  	$("#error-message").html("<div class='alert alert-dismissible fade show alert-danger' role='alert'>confirm Password not same<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
    $("#success-message").slideUp();
    setTimeout(function(){$("#error-message").fadeOut("slow")}, 3000);
  }else{
    $.ajax({
      url : "admin-profile-details/change-password-submit.php",
      type : "POST",
      data : $("#password-change").serialize(),
      beforesend: function(){
        $("#success-message").html("<div class='alert alert-dismissible fade show alert-info ' role='alert'>Please wait storing your details...<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
        $("#error-message").slideUp();
      },
      success : function(data){

        if(data == 2){
        	$("#success-message").html("<div class='alert alert-dismissible fade show alert-success ' role='alert'>new password saved.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
        	$("#error-message").slideUp();
        	//setTimeout(function() {$("#success-message").fadeOut("slow")}, 3000);  
        	//location.reload();
        }else if(data == 1){
          	$("#error-message").html("<div class='alert alert-dismissible fade show alert-danger ' role='alert'>password not matched with your current password.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
          	$("#success-message").slideUp();
          	//setTimeout(function(){$("#error-message").fadeOut("slow")}, 3000);
        }else{
        	$("#error-message").html("<div class='alert alert-dismissible fade show alert-danger ' role='alert'>password not changed.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
          	$("#success-message").slideUp();
        }
      }
    });
	                
  }
  

  
	  
	});


</script>





