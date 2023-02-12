<?php
//banner-add-new.php
include 'header.php';

$path_for_demo = "banner-ajax-files/";
$path_for_real = "banner-ajax-files/banner-images/";
$demo_img_desk = "1180x500.jpg";
$demo_img_mob  = "480x400.jpg";

	$sql_check = "SELECT * FROM banners WHERE b_proccess = 1";
	$run_sql_check = mysqli_query($conn, $sql_check);
	if(mysqli_num_rows($run_sql_check) > 0){
		$fetch_data = mysqli_fetch_assoc($run_sql_check);
		$_SESSION['banner_id'] = $fetch_data['b_id'];
		if($fetch_data['des_img'] == null){
			$path_b = $path_for_demo;
			$banner_name_b = $demo_img_desk;
		}else{
			$path_b = $path_for_real;
			$banner_name_b = $fetch_data['des_img'];
		}
		if($fetch_data['mob_img'] == null){
			$path_s = $path_for_demo;
			$banner_name_s = $demo_img_mob;
		}else{
			$path_s = $path_for_real;
			$banner_name_s = $fetch_data['mob_img'];
		}
		$src_b = $path_b.$banner_name_b;
		$src_s = $path_s.$banner_name_s;
	}else{
		$sql_enter_banner = "INSERT INTO banners (b_status, b_proccess) VALUES ('0','1')";
		$run_sql_enter_banner = mysqli_query($conn,$sql_enter_banner);
		if($run_sql_enter_banner){
			$last_id = mysqli_insert_id($conn);
			$_SESSION['banner_id'] = $last_id;
			$banner_name_b = $demo_img_desk;
			$banner_name_s = $demo_img_mob;
			$path = $path_for_demo;
			$src_b = $path.$banner_name_b;
			$src_s = $path.$banner_name_s;
		}
	}

	

// $banner_name = "B_5_1675626687.jpg";
// $path = "banner-ajax-files/banner-images/";
// $src = $path.$banner_name;
?>
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
			<h2 class="no-margin-bottom">Add New Banner</h2>
		</div>
	</header>
	<!-- ERROR MESSAGE DIV-->
	<div id="error-message"></div>
	<div id="success-message"></div>
	<!-- ERROR MESSAGE DIV CLOSE-->

	<!-- Dashboard Counts Section-->
	<section class="dashboard-counts no-padding-bottom">
		<div class="container-fluid">
			<div class="row bg-white has-shadow">
				<!-- ========== profile image and details area starts here ============= -->
				<div class="col-md-7">
					<div class="client card">
						<div class="card-body text-center">
							<form method="post">
								<div class="image_area">
									<label for="upload_image1">
										<img src="<?php echo $src_b;?>" id="uploaded_image1" class="img-fluid" />
										<input type="text" name="image-name-old" id="image-name-old1" value="<?php echo $banner_name_b; ?>" hidden>
										<div class="overlay">
											<img src="img/camera-icon.png" width="50" height="38" class="mx-auto d-block mt-1" />
										</div>
										<input type="file" name="image" class="image" id="upload_image1" style="display:none" />
									</label>
								</div>
							</form>                
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="client card">
						<div class="card-body text-center">
							<form method="post">
								<div class="image_area">
									<label for="upload_image2">
										<img src="<?php echo $src_s;?>" id="uploaded_image2" class="img-fluid" />
										<input type="text" name="image-name-old" id="image-name-old1" value="<?php echo $banner_name_s; ?>" hidden>
										<div class="overlay">
											<img src="img/camera-icon.png" width="50" height="38" class="mx-auto d-block mt-1" />
										</div>
										<input type="file" name="image" class="image" id="upload_image2" style="display:none" />
									</label>
								</div>
							</form>                
						</div>
					</div>
				</div>
				<!-- ========== profile image and details area close here ============= -->
				<div class="col-lg-12">
		      <form id="submit-banner-data">
        		<div class="form-group row">
              <label class="col-sm-2 form-control-label">Banner Title:</label>
              <div class="col-sm-9">
                <input type="text" name="banner-title" id="banner-title" class="form-control" required>
              </div>
            </div>
            <div class="form-group row" style="margin-top: -35px;">
              <label class="col-sm-2 form-control-label">Link to Product:</label>
              <div class="col-sm-9">
                <select name="pro-link" class="form-control" id="pro-link"required>
                	<option value="none">Select Product For Link</option>
                  <?php 
                	$sql_get_products ="SELECT * FROM products WHERE p_status = 1 ORDER BY ID DESC ";
									$result_get_products = mysqli_query($conn,$sql_get_products);
									if(mysqli_num_rows($result_get_products) > 0){
										while($pro_row = mysqli_fetch_assoc($result_get_products)){
										echo '<option value="'.$pro_row['ID'].'" data-icon="../All-Products-images/'.$pro_row['image_0'].'">
										'.$pro_row['product_name'].'
										</option>';
										}
									}
                	?>
                </select>
              </div>
            </div>
            <div class="form-group row" style="margin-top: -35px;">
              <label class="col-sm-2 form-control-label">Link to Country:</label>
              <div class="col-sm-9">
                <select name="ban-country" class="form-control" id="ban-country"required>
                	<option value="none">Select Country</option>
                  <?php 
                	$sql_get_cont ="SELECT * FROM countries";
									$result_get_cont = mysqli_query($conn,$sql_get_cont);
									if(mysqli_num_rows($result_get_cont) > 0){
										while($cont_row = mysqli_fetch_assoc($result_get_cont)){
										echo '<option id="selected-cat_id" value="'.$cont_row['id'].'">'.$cont_row['name'].'</option>';
										}
									}
                	?>
                </select>
              </div>
            </div>
            <div class="form-group row" style="margin-top: -35px;">
              <div class="col-sm-12 offset-sm-3"> 
                <button type="submit" name="submit-banner" id="submit-banner" class="btn btn-primary">Submit Product</button>
                <input type="text" name="add-banner" value="add-banner" hidden>
              </div>
            </div>
		      </form>
        </div>
			</div>
		</div>
	</section>
	<!-- model for crop image  start -->
	<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
		<div class="modal-dialog modal-md" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Crop Image Before Upload</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="img-container">
						<img src="" id="sample_image1" />
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" id="crop1" class="btn btn-primary">Crop</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				</div>
			</div>
		</div>
	</div>
	<!-- model for crop image  close -->
	<!-- model for crop image  start -->
	<div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
		<div class="modal-dialog modal-md" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Crop Image Before Upload</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="img-container">
						<img src="" id="sample_image2"/>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" id="crop2" class="btn btn-primary">Crop</button>
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
	<script src="banner-ajax-files/drop-down-for-select-option-with-image.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	// submit form 
	$("#submit-banner").on("click",function(e){
		e.preventDefault();
		var b_title = $("#banner-title").val();
		var b_pro_link = $("#pro-link").val();
		var b_country = $("#ban-country").val();
		if(b_title == "" || b_pro_link == "none" || b_country == "none"){
			$("#error-message").html("<div class='myAlert-bottom alert alert-dismissible fade show alert-danger' role='alert'>Please fill all fields .<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
            $("#success-message").slideUp();
            //setTimeout(function(){$("#error-message").fadeOut("slow")}, 4000);
		}else{
			 $.ajax({
			 	url : "banner-ajax-files/add-new-banner-form.php",
			 	type : "POST",
			 	data : $("#submit-banner-data").serialize(),
			 	beforesend: function(){
			 		$("#success-message").html("<div class='myAlert-bottom alert alert-dismissible fade show alert-info ' role='alert'>Please wait storing product...<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
            		$("#error-message").slideUp();
			 	},
			 	success : function(data){
			 		if(data == 1){
			 		$("#success-message").html("<div class='myAlert-bottom alert alert-dismissible fade show alert-success ' role='alert'>Successfully uploaded product.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
            		$("#error-message").slideUp();	
            		$('#submit-banner-data').trigger("reset");
            		location.replace("banners.php");
            	}else{
            		$("#error-message").html("<div class='myAlert-bottom alert alert-dismissible fade show alert-danger ' role='alert'>Inserting product failed.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
            		$("#success-message").slideUp();
			 		}
			 	}
			 });
            	
		}
	});



	function modalCropAndUpload(modal,image,upload_image,crop,uploaded_image,send_img) {
		var $modal = modal;
		var image = image;
		var cropper;
		var which;
		upload_image.change(function(event){
			if(this.id == "upload_image1"){
				which = "big";
			}else if(this.id == "upload_image2"){
				which = "small";
			}
			var files = event.target.files;
			var done = function(url){
				image.src = url;
				$modal.modal('show');
			};
			if(files && files.length > 0){
				reader = new FileReader();
				reader.onload = function(event){
					done(reader.result);
				};
				reader.readAsDataURL(files[0]);
			}
		});

		$modal.on('shown.bs.modal', function() {
			if(which == "big"){
				cropper = new Cropper(image, {
					aspectRatio: 2.36,
					viewMode: 3
				});
			}else if(which == "small"){
				cropper = new Cropper(image, {
					aspectRatio: 1.2,
					viewMode: 3
				});
			}
		}).on('hidden.bs.modal', function(){
			cropper.destroy();
	   		cropper = null;
		});

		crop.click(function(){
			if(which == "big"){
				canvas = cropper.getCroppedCanvas({
					width:1180,
					height:500
				});
			}else if(which == "small"){
				canvas = cropper.getCroppedCanvas({
					width:480,
					height:400
				});
			}

			canvas.toBlob(function(blob){
				url = URL.createObjectURL(blob);
				var reader = new FileReader();
				reader.readAsDataURL(blob);
				reader.onloadend = function(){
					// var product_id = $("#pid").val();
					// p_id:product_id,
					var old_img_val = send_img.val();
					var base64data = reader.result;
					$.ajax({
						url:'banner-ajax-files/upload-banner-image.php',
						method:'POST',
						data:{image:base64data,old_image:old_img_val,which:which},
						success:function(data)
						{
							$modal.modal('hide');
							uploaded_image.attr('src',"banner-ajax-files/"+data);
							//var split_image_name = data.split("/");
							//send_img.val(split_image_name[1]);
							$("#success-message").html("<div class='alert alert-dismissible fade show alert-success' role='alert'>Successfully image changed.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
	        		$("#error-message").slideUp();
	        	// setTimeout(function(){$("#success-message").fadeOut("slow")}, 3000);
	        	// location.reload();
						}
					});
				};
			});
		});
	}
	modalCropAndUpload($('#modal1'),document.getElementById('sample_image1'),$('#upload_image1'),$('#crop1'),$('#uploaded_image1'),$("#image-name-old1"));
	modalCropAndUpload($('#modal2'),document.getElementById('sample_image2'),$('#upload_image2'),$('#crop2'),$('#uploaded_image2'),$("#image-name-old2"));

});
</script>