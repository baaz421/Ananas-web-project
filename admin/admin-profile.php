<?php
//admin-profile.php
include 'header.php';
$a_id = $_SESSION['a_id'];
$sql_get_admin_data = "SELECT * FROM admin WHERE AID = {$a_id}";
$run_sql_get_admin_data = mysqli_query($conn,$sql_get_admin_data);
$admin_data = mysqli_fetch_assoc($run_sql_get_admin_data);

$gender_pic = $admin_data['a_gender'];
$admin_data_pic = $admin_data['a_profilepic'];


	if($admin_data_pic == "male-avatar.jpg"){
		$pic = "img/male-avatar.jpg";
	}elseif($admin_data_pic == "feamle-avatar.jpg"){
		$pic = "img/female-avatar.jpg";
	}else{
  	$img_path = "admin-profile-details/admin-profile-images/";
    $img_name_path = $img_path.$admin_data_pic;
    if(file_exists($img_name_path)){
        $pic = "admin-profile-details/admin-profile-images/$admin_data_pic";
      }else{
        if($gender_pic == 'male'){
          $pic = "img/male-avatar.jpg";
        }else{
          $pic = "img/female-avatar.jpg";
        }
      }
	}


?>


<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->

<!-- ========css styling starts here =============-->
	<style type="text/css">

			.image_area {
			  position: relative;
			}

			img {
			  	display: block;
			  	max-width: 100%;
			}

			.preview {
	  			overflow: hidden;
	  			width: 160px; 
	  			height: 160px;
	  			margin: 10px;
	  			border: 1px solid red;
			}

			.modal-lg{
	  			max-width: 1000px !important;
			}

			.overlay {
			  position: absolute;
			  bottom: 10px;
			  left: 0;
			  right: 0;
			  background-color: rgba(255, 255, 255, 0.5);
			  overflow: hidden;
			  height: 0;
			  transition: .5s ease;
			  width: 100%;
			}

			.image_area:hover .overlay {
			  height: 50%;
			  cursor: pointer;
			}

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


<div class="content-inner">
  <!-- Page Header-->
  <header class="page-header">
    <div class="container-fluid">
      <h2 class="no-margin-bottom">My Profile (Edit)</h2>
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

<!-- ========== profile image and details area starts here ============= -->
      	<div class="col-md-6">
          <div class="client card">

            <div class="card-close">
              <div class="dropdown">
                <button type="button" id="closeCard2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                <div aria-labelledby="closeCard2" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
              </div>
            </div>
						<br>
            <div class="card-body text-center">
              <div class="client-avatar w-50">
              	<form method="post">
              		<div class="image_area">
										<label for="upload_image">
											<img src="<?php echo $pic;?>" id="uploaded_image" class="img-fluid rounded-circle" />
											<input type="text" name="image-name-old" id="image-name-old" value="<?php echo $admin_data['a_profilepic'];?>" hidden>

											<div class="overlay">
													<img src="img/camera-icon.png" width="50" height="38" class="mx-auto d-block mt-4" />
											</div>

											<input type="file" name="image" class="image" id="upload_image" style="display:none" />
										</label>
									</div>
								</form>                
              </div>
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>
             <hr class="rounded">
              <div class="client-title m-3">
                <h3><?php echo $admin_data['a_fullname']; ?></h3>
                <span>ADMINISTRATOR (<?php echo $admin_data['a_country']; ?>) </span>
                <a href="#" class="bg-success">Joined Date : <?php	echo joinDate($admin_data['a_createtime']);?></a>
                
                
              </div>
              <div class="client-info">
                <div class="row">
                  
                </div>
              </div>
            </div>

          </div>
 			  </div>
<!-- ========== profile image and details area close here ============= -->

<!-- ========== Admin details edit and submit area starts here ============= -->
			  <div class="col-md-6">
          <div class="client card">

            <div class="card-close">
              <div class="dropdown">
                <button type="button" id="closeCard2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                <div aria-labelledby="closeCard2" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
              </div>
            </div>
            <div class="card-body">
               <form method="post" id="submit-r-admin" >
                  <div class="form-group">
                      <label for="admin-r-name">Full name *</label>
                      <input type="text" class="form-control" id="admin-r-name" name="admin-r-name" value="<?php echo $admin_data['a_fullname']; ?>" required="Please Enter Full Name">
                  </div><!-- End .form-group -->
                  <div class="form-group">
                      <label for="admin-r-username">User name *</label>
                      <input type="text" class="form-control" id="admin-r-username" name="admin-r-username" value="<?php echo $admin_data['a_username']; ?>" required="Please Enter User Name">
                  </div><!-- End .form-group -->
                  <div class="form-group">
                      <label for="admin-r-email">Email address *</label>
                      <input type="email" class="form-control" id="admin-r-email" name="admin-r-email" value="<?php echo $admin_data['a_email']; ?>"  required>
                  </div><!-- End .form-group -->
                  <div class="form-group">
                      <label for="admin-r-gender">Select Gender * &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
                      <?php
	                      if($admin_data['a_gender'] == "male"){
	                      	$genderm = "checked";
	                      }else{
	                      	$genderm = "";
	                      }

	                      if($admin_data['a_gender'] == "female"){
	                      	$genderf = "checked";
	                      }else{                      	
	                      	$genderf = "";
	                      }

                       ?>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="admin-r-gender" id="inlineRadio1" value="male" required <?php echo $genderm; ?>>
                        <label class="form-check-label" for="inlineRadio1">Male</label>
                      </div>

                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="admin-r-gender" id="inlineRadio2" value="female" required <?php echo $genderf; ?>>
                        <label class="form-check-label" for="inlineRadio2">Female</label>
                      </div>

                  </div><!-- End .form-group -->
                  <div class="form-group">
                  		<?php
	                  		$p_code = $admin_data['a_phonecode'];
	                  		$p_number = $admin_data['a_phone'];
                  		?>
                      <label for="admin-r-phone">Your mobile number*</label>  
                      <input type="tel" class="form-control" id="phone" name="admin-r-phone" value="<?php echo "+".$p_code.$p_number ?>" size="100%" required>
                      <span id="valid-msg" class="hide">✓ Valid</span>
                      <span id="error-msg" class="hide"></span>
                      <input type="text" class="form-control error" id="ccodez" name="admin-r-phonecode" hidden >
                      <input type="text" class="form-control" id="cname" name="admin-r-contryname"  hidden>
                  </div><!-- End .form-group -->

                  <div class="form-group">
	                  	<?php
		                  	$dob = $admin_data['a_dateofbirth'];
		                  	$con_dob = strtotime($dob);
		                  	$dob_dis = date("Y-m-d",$con_dob);
	                  	?>
                      <label for="register-password">Date Of Birth *</label>
                      <input type="date" id="admin-r-birthdate" name="admin-r-birthdate" value="<?php echo $dob_dis;  ?>" min="1950-01-01" max="2003-12-31" class="form-control" >
                  </div><!-- End .form-group -->

                  <div class="form-footer">
                      <button type="submit"  name="save-changes" id="save-changes" value="save-changes" class="btn btn-outline-info w-100">
                          <span>Save Changes</span>
                      </button>
                      <!-- <input type="submit" name="save_changes" id="save_changes" class="btn btn-outline-info w-100" value="Save Changes" > -->
                  </div><!-- End .form-footer -->
              </form>
            </div>

          </div>
 			  </div>
<!-- ========== Admin details edit and submit area close here ============= -->
 			  
      	

      </div>
    </div>
  </section>
<!-- model for crop image  start -->
  <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  	<div class="modal-dialog modal-lg" role="document">
    	<div class="modal-content">
    		<div class="modal-header">
      		<h5 class="modal-title">Crop Image Before Upload</h5>
      		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
        			<span aria-hidden="true">×</span>
      		</button>
    		</div>
    		<div class="modal-body">
      		<div class="img-container">
          		<div class="row">
              		<div class="col-md-8">
                  		<img src="" id="sample_image" />
              		</div>
              		<div class="col-md-4">
                  		<div class="preview"></div>
              		</div>
          		</div>
      		</div>
    		</div>
    		<div class="modal-footer">
    			<button type="button" id="crop" class="btn btn-primary">Crop</button>
      		<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
    		</div>
    	</div>
  	</div>
	</div>
<!-- model for crop image  close -->


  

<?php
include 'footer.php';
?>
<script src="https://unpkg.com/dropzone"></script>
<script src="https://unpkg.com/cropperjs"></script>
<script src="build/js/intlTelInput.js"></script>
<script type="text/javascript">

$(document).ready(function(){

	var $modal = $('#modal');

	var image = document.getElementById('sample_image');

	var cropper;
	var old_img_val = $("#image-name-old").val();

	$('#upload_image').change(function(event){
		var files = event.target.files;

		var done = function(url){
			image.src = url;
			$modal.modal('show');
		};

		if(files && files.length > 0)
		{
			reader = new FileReader();
			reader.onload = function(event)
			{
				done(reader.result);
			};
			reader.readAsDataURL(files[0]);
		}
	});

	$modal.on('shown.bs.modal', function() {
		cropper = new Cropper(image, {
			aspectRatio: 1,
			viewMode: 2,
			preview:'.preview'
		});
	}).on('hidden.bs.modal', function(){
		cropper.destroy();
   		cropper = null;
	});

	$('#crop').click(function(){
		canvas = cropper.getCroppedCanvas({
			width:800,
			height:800
		});

		canvas.toBlob(function(blob){
			url = URL.createObjectURL(blob);
			var reader = new FileReader();
			
			reader.readAsDataURL(blob);
			reader.onloadend = function(){
				var base64data = reader.result;
				$.ajax({
					url:'admin-profile-details/upload-admin-profile-image.php',
					method:'POST',
					data:{image:base64data,old_image:old_img_val},
					success:function(data)
					{
						$modal.modal('hide');
						$('#uploaded_image').attr('src',"admin-profile-details/"+data);
						 
						$("#success-message").html("<div class='alert alert-dismissible fade show alert-success' role='alert'>Successfully image changed.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
			      $("#error-message").slideUp();
						//setTimeout(function() {$("#success-message").fadeOut("slow")}, 3000);

						setTimeout(function() {location.reload();}, 3000);

						//location.reload();
					}
				});
			};
		});
	});
	
});

$(document).ready(function(){

		// telephone number 
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
		        $.get('https://ipinfo.io', function() {}, "jsonp").always(function(resp) {
		          var countryCode = (resp && resp.country) ? resp.country : "in";
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
		    
		  	//input.addEventListener('blur', function() {
		  	//input.addEventListener('mouseleave', function() {
		    input.addEventListener('focusout', function() {
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
		      });

		    // on keyup / change flag: reset
		    input.addEventListener('change', reset);
		    input.addEventListener('keyup', reset);

		// submit form update

		$("#admin-r-username").keydown(function(k){
	      			if(k.keyCode == 32){
	      				$("#error-message").html("<div class='alert alert-dismissible fade show alert-danger' role='alert'>Spaces Not allowed in username.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
	        			$("#success-message").slideUp();
	        			setTimeout(function(){$("#error-message").fadeOut("slow")}, 3000);
	        			k.preventDefault();
	      			}
	      		});

			$("#save-changes").on("click",function(e){

	      e.preventDefault();
	      var admin_name_r 			= $("#admin-r-name").val();
	      var admin_user_name_r = $("#admin-r-username").val();
	      var admin_email_r 		= $("#admin-r-email").val();
	      var admin_phone_r 		= $("#phone").val();

	      if(iti.isValidNumber()){
	      	if(admin_name_r == "" || admin_email_r == "" || admin_phone_r == "" || admin_user_name_r == ""){

	        $("#error-message").html("<div class='alert alert-dismissible fade show alert-danger' role='alert'>Please fill all fields .<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
	        $("#success-message").slideUp();
	        setTimeout(function(){$("#error-message").fadeOut("slow")}, 3000);
	      	}else{
	         $.ajax({
	          url : "admin-profile-details/edit-profile-details.php",
	          type : "POST",
	          data : $("#submit-r-admin").serialize(),
	          beforesend: function(){
	            $("#success-message").html("<div class='alert alert-dismissible fade show alert-info ' role='alert'>Please wait storing your details...<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
	            $("#error-message").slideUp();
	          },
	          success : function(data){
	            if(data != "0"){
	            $("#success-message").html("<div class='alert alert-dismissible fade show alert-success ' role='alert'>Successfully updated details.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
	            $("#error-message").slideUp();
	            setTimeout(function() {$("#success-message").fadeOut("slow")}, 3000);  
	            setTimeout(function() {location.reload();}, 3000);
	                  //$('#submit-product').trigger("reset");
	                  //location.replace("admin-login-system-ajax/admin-insert-data.php");
	               }else{
	                  $("#error-message").html("<div class='alert alert-dismissible fade show alert-danger ' role='alert'>sorry updates failed.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
	                  $("#success-message").slideUp();
	                  setTimeout(function(){$("#error-message").fadeOut("slow")}, 3000);
	            }
	          }
	        });
			                
			  }
	      }else{
	      	$("#error-message").html("<div class='alert alert-dismissible fade show alert-danger' role='alert'>Please Enter corret phone number .<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
	        $("#success-message").slideUp();
	        setTimeout(function(){$("#error-message").fadeOut("slow")}, 3000);
	      }

	      
			  
			});


	
});




 

</script>




