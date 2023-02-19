<!-- profile.php -->
<?php
include "header-user.php";

if(isset($_SESSION['u_email'])){
  @$email_u = $_SESSION['u_email'];
  $check_verify = "SELECT * FROM users WHERE email = '$email_u'";
  $run_verify = mysqli_query($conn, $check_verify);
  if(mysqli_num_rows($run_verify) > 0){
    $fetch      = mysqli_fetch_assoc($run_verify);
    $vstatus    = $fetch['vstatus'];
    if($vstatus == "notverified"){
    echo"<div id='success-message' style='position: absolute; top: 65px; width: 98%; margin:0 1%; z-index: 9999;'>
            <div class='alert alert-dismissible fade show alert-warning mb-1 rounded text-dark' role='alert'>
                You account not verified, please verify you account. <a href='verification.php'> Click Here</a>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>
          </div>";

    }
  }
}


?>
<style type="text/css">
	 .myAlert-bottom{
    position: fixed;
    z-index:999;
    /*top: 5px;*/
    bottom: 5px;
    left:2%;
    width: 96%;
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
  .image_area {
	  position: relative;
	  margin: 0 auto;
	}

	.imgsample {
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
	  bottom: 0;
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
</style>
<div class="main-panel">        
	<div class="content-wrapper">
		<div class="row">
			<div class="col-12 grid-margin">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Profile Details</h4>
						<form class="form-sample" id="user-edit-details">
							<p class="card-description">
								Profile Picture
							</p>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group row">
										<label for="upload_image">
										<div class="image_area w-50">
											<img src="<?php echo $profile_image ?>" id="uploaded_image" class="img-fluid rounded-circle" />
											<input type="text" name="image-name-old" id="image-name-old" value="<?php echo $old_pic?>" hidden>

											<div class="overlay">
													<img src="images/camera-icon.png" width="50" height="38" class="mx-auto d-block mt-4" />
											</div>

											<input type="file" name="image" class="image" id="upload_image" style="display:none" />
										</div>
										</label>
									</div>
								</div>
								<div class="col-md-6">
									<div class="row justify-content-center">
									<div class="card bg-light w-50 mb-2 text-center" style="max-width: 18rem;">
									  <div class="card-header">Join Date:</div>
									  <div class="card-body">
									    <p class="card-text"><?php	echo joinDate($createtime) ?></p>
									  </div>
									</div>
									</div>
								</div>
							</div>
							<p class="card-description">
								Personal info
							</p>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group row">
										<label class="col-sm-3 col-form-label">Full Name</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="full-name" value="<?php echo $name  ?>" required />
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group row">
										<label class="col-sm-3 col-form-label">Email</label>
										<div class="col-sm-9">
											<input type="email" class="form-control" id="user-email" value="<?php echo $email  ?>" required />
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group row">
										<label class="col-sm-3 col-form-label">mobile</label>
										<div class="col-sm-9">
											<input type="tel" class="form-control" id="phone" size="100%" name="phone" required value="<?php echo "+".$countrycode.$mobile ?>">		
                      <span id="valid-msg" class="hide">✓ Valid</span>
                      <span id="error-msg" class="hide"></span>							
                      <input type="text" class="form-control" id="ccodez" name="ccodez" hidden >
                      <input type="text" class="form-control" id="twoalph" name="twoalph" hidden >
                      <input type="text" class="form-control" id="cname" name="cname"  hidden>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group row">
										<label class="col-sm-3 col-form-label">Date of Birth</label>
										<div class="col-sm-9">
											<?php
		                  	$con_dob = strtotime($dob);
		                  	$dob_dis = date("Y-m-d",$con_dob);
	                  	?>
											<!-- <input class="form-control" placeholder="dd/mm/yyyy" required/> -->
											<input type="date" id="dob" name="dob" min="1950-01-02" max="2006-01-01" class="form-control" value="<?php echo $dob_dis ?>" >
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group row">
										<label class="col-sm-3 col-form-label">Country</label>
										<div class="col-sm-9">
											<!-- <select class="form-control" id="address-country" disabled> -->
											<input type="text" class="form-control" name="" id="c-name" value="<?php echo $country ?>" disabled>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group row">
										<div class="col-sm-9 offset-sm-3">
											<input class="btn btn-primary w-100" type="submit" name="submit" id="submit" value="Submit">
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- content-wrapper ends -->
</div>

<!-- model for crop image  start -->
  <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  	<div class="modal-dialog" role="document">
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
              		<div class="col-md-10">
                  		<img src="" id="sample_image" class="imgsample" />
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
 <!-- ERROR MESSAGE DIV-->
    <div id="error-message"> </div>
    <div id="success-message"></div>
  <!-- ERROR MESSAGE DIV CLOSE-->
<div class="backlayer" style="display: none;">
	<span class="loader"></span>
</div>

<!-- footer-user.php -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
  <!-- partial:../../partials/_footer.html -->
  <footer class="footer">
    <div class="d-sm-flex justify-content-center justify-content-sm-between">
      <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2022.<a href="../" target="_blank">Ananas.com.co</a>. All rights reserved.</span>
      <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Baaz Designer <i class="ti-heart text-danger ml-1"></i></span>
    </div>
  </footer>
  <!-- partial -->
<!-- plugins:js -->
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="vendors/js/vendor.bundle.base.js"></script>

<!-- endinject -->
<!-- inject:js -->
<script src="js/off-canvas.js"></script>
<script src="js/hoverable-collapse.js"></script>
<script src="js/template.js"></script>
<!-- endinject -->


<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
<script src="https://unpkg.com/dropzone"></script>
<script src="https://unpkg.com/cropperjs"></script>
<script src="../build/js/intlTelInput.js"></script>
</body>

</html>
<script type="text/javascript">

$(document).ready(function(){
  var input 					= document.querySelector("#phone"),
		  errorMsg 				= document.querySelector("#error-msg"),
		  validMsg 				= document.querySelector("#valid-msg"),
		  countryData 		= window.intlTelInputGlobals.getCountryData(),
		  addressDropdown = document.querySelector("#address-country");

  // here, the index maps to the error code returned from getValidationError - see readme
  var errorMap = ["Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];

  // initialise plugin
  var iti = window.intlTelInput(input, {
  //nationalMode: true,
  initialCountry: "auto",
  geoIpLookup: function(callback) {
    $.get('https://ipinfo.io/', function() {}, "jsonp").always(function(resp) {
      var countryCode = (resp && resp.country) ? resp.country : "qa";
      callback(countryCode);
    });
  },
  separateDialCode: true,
  utilsScript: "../build/js/utils.js"
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
      document.getElementById("c-name").value = document.getElementById("cname").value;
      // console.log($("#twoalph").val());
      // console.log($("#ccodez").val());
      
    });

  // on keyup / change flag: reset
  input.addEventListener('change', reset);
  input.addEventListener('keyup', reset);

	// ======== automatic country load ================//
		// // populate the country dropdown
		// for (var i = 0; i < countryData.length; i++) {
		//   var country = countryData[i];
		//   var optionNode = document.createElement("option");
		//   optionNode.value = country.iso2;
		//   var textNode = document.createTextNode(country.name);
		//   optionNode.appendChild(textNode);
		//   addressDropdown.appendChild(optionNode);
		// }
		// // set it's initial value
		// addressDropdown.value = iti.getSelectedCountryData().iso2;
		
		// // listen to the telephone input for changes
		// input.addEventListener('countrychange', function(e) {
		//   addressDropdown.value = iti.getSelectedCountryData().iso2;
		//   document.querySelector("#country-code").value = addressDropdown.value;
		// });

		// // listen to the address dropdown for changes
		// addressDropdown.addEventListener('change', function() {
		//   iti.setCountry(this.value);
		// });
	// ======== automatic country load ================//
// $(".backlayer").show();
	$("#submit").on("click", function(e){
		e.preventDefault();
		var mobile_code 	= $("#ccodez").val(),
				country_2alph	= $("#twoalph").val(),
				country_name 	= $("#cname").val(),
				full_name 		= $("#full-name").val(),
				user_email 		= $("#user-email").val(),
				user_dob			= $("#dob").val(),
				user_phone_no = $("#phone").val();
		if(iti.isValidNumber()){
    	if(full_name == "" || user_email == "" || user_phone_no == ""){
	      $("#error-message").html("<div class='myAlert-bottom alert alert-dismissible fade show alert-danger' role='alert'>Please fill all fields .<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
	      $("#success-message").slideUp();
	      setTimeout(function(){$("#error-message").fadeOut("slow")}, 3000);
    	}else{
       $.ajax({
        url : "user-ajax-files/update-user-details.php",
        type : "POST",
        data : {u_name:full_name,u_email:user_email,m_code:mobile_code,phone:user_phone_no,twoalph:country_2alph,country:country_name,dob:user_dob},
        beforesend: function(){
          $(".backlayer").show();
        },
        success : function(data){
          if(data != "0"){
	          $("#success-message").html("<div class='myAlert-bottom alert alert-dismissible fade show alert-success ' role='alert'>Successfully updated details.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
	          $("#error-message").slideUp();
	          $('#user-edit-details').trigger("reset");
          	// setTimeout(function() {$("#success-message").fadeOut("slow")}, 3000);  
          	setTimeout(function() {location.reload();}, 3000);
             }else{
                $("#error-message").html("<div class='myAlert-bottom alert alert-dismissible fade show alert-danger ' role='alert'>sorry updates failed.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
                $("#success-message").slideUp();
                // setTimeout(function(){$("#error-message").fadeOut("slow")}, 3000);
          }
        },
         complete: function () {
					$(".backlayer").hide();
					}
      });
	                
	  }
    }else{
    	$("#error-message").html("<div class='myAlert-bottom alert alert-dismissible fade show alert-danger' role='alert'>Please Enter corret phone number .<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
      $("#success-message").slideUp();
      setTimeout(function(){$("#error-message").fadeOut("slow")}, 3000);
    }
    
	});

	var modal = $('#modal');
	var image = document.getElementById('sample_image');
	var upload_image = $('#upload_image');
	var crop = $('#crop');
	var uploaded_image = $('#uploaded_image');
	var send_img = $("#image-name-old");
	modalCropAndUpload(modal,image,upload_image,crop,uploaded_image,send_img);
	// function for upload image
	function modalCropAndUpload(modal,image,upload_image,crop,uploaded_image,send_img){
			// var modal = modal1;
			var image = image;
			var cropper;
			upload_image.change(function(event){
				var files = event.target.files;
				var done = function(url){
					image.src = url;
					modal.modal('show');
				};
				if(files && files.length > 0){
					reader = new FileReader();
					reader.onload = function(event)
					{
						done(reader.result);
					};
					reader.readAsDataURL(files[0]);
				}
			});
			modal.on('shown.bs.modal', function() {
				cropper = new Cropper(image, {
					aspectRatio: 1,
					viewMode: 2,
				});
			}).on('hidden.bs.modal', function(){
				cropper.destroy();
		   		cropper = null;
			});
			crop.click(function(){
				canvas = cropper.getCroppedCanvas({
					width:500,
					height:500
				});
				canvas.toBlob(function(blob){
					url = URL.createObjectURL(blob);
					var reader = new FileReader();
					reader.readAsDataURL(blob);
					reader.onloadend = function(){
						var send_img_exist = send_img.val();
						var base64data = reader.result;
						$.ajax({
							url:'user-ajax-files/change-profile-image.php',
							method:'POST',
							data:{image:base64data,image_name_exits:send_img_exist},
							beforeSend: function () {
				      	$(".backlayer").show();
				      },
							success:function(data){
								console.log(data);
								modal.modal('hide');
								uploaded_image.attr('src',"user-ajax-files/"+data);
								$("#success-message").html("<div class='myAlert-bottom alert alert-dismissible fade show alert-success' role='alert'>Successfully Profile image changed.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
		        		$("#error-message").slideUp();
		        		setTimeout(function(){$("#success-message").fadeOut("slow")}, 3000);
		        		// location.reload();
							},
			        complete: function () {
								$(".backlayer").hide();
							}
						});
					};
				});
			});
		}	
})
</script>
