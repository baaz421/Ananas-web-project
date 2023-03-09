

<?php
//edit-product.php
$title = "New Product Form";

require_once "../header.php";

$pro_id = $_GET['pid']; //echo $pro_id;
$sql_get_product_data = "SELECT * FROM products WHERE ID = $pro_id";
$run_sql_for_get_product_data = mysqli_query($conn,$sql_get_product_data);
$pro_details = mysqli_fetch_assoc($run_sql_for_get_product_data); 

// product image name from database      		
$product_images = array(
	$pro_details['image_0'],
	$pro_details['image_1'],
	$pro_details['image_2'],
	$pro_details['image_3'],
	$pro_details['image_4']
);

// product image coloum name from database
$key = array_keys($pro_details);
$product_images_key = array(
	$key[6],
	$key[7],
	$key[8],
	$key[9],
	$key[10]
);  


?>
<style type="text/css">
			.column {
		  float: left;
		  width: 20%;
		  padding: 5px;
		}

		/* Clearfix (clear floats) */
		.row::after {
		  content: "";
		  clear: both;
		  display: table;
		}

	.image_area {
			  position: relative;
			}

			img {
			  	display: block;
			  	max-width: 100%;
			}

			.preview{
	  			overflow: hidden;
	  			width: 160px; 
	  			height: 160px;
	  			margin: 10px;
	  			border: 1px solid red;
			}
			.preview1{
	  			overflow: hidden;
	  			width: 160px; 
	  			height: 160px;
	  			margin: 10px;
	  			border: 1px solid red;
			}
			.preview2{
	  			overflow: hidden;
	  			width: 160px; 
	  			height: 160px;
	  			margin: 10px;
	  			border: 1px solid red;
			}
			.preview3{
	  			overflow: hidden;
	  			width: 160px; 
	  			height: 160px;
	  			margin: 10px;
	  			border: 1px solid red;
			}
			.preview4{
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
			  bottom: 0px;
			  left: 0;
			  right: 0;
			  background-color: rgba(255, 255, 255, 0.5);
			  overflow: hidden;
			  height: 0;
			  transition: .5s ease;
			  width: 100%;
			}

			.image_area:hover .overlay {
			  height: 100%;
			  cursor: pointer;
			}

			.text {
			  color: #333;
			  font-size: 12px;
			  position: absolute;
			  top: 50%;
			  left: 50%;
			  -webkit-transform: translate(-50%, -50%);
			  -ms-transform: translate(-50%, -50%);
			  transform: translate(-50%, -50%);
			  text-align: center;
			}
			.remove-text{
				font-size: 12px;
			}
</style>

<!-- =============================body starts ===================================-->
<div class="content-inner">
  <!-- Page Header-->
  <header class="page-header">
    <div class="container-fluid">
      <h2 class="no-margin-bottom">Enter product data</h2>
    </div>
  </header>
  <!-- Forms Section-->
  <section class="forms"> 
    <div class="container-fluid">
      <div class="row">
        <!-- Form Elements -->
        <div class="col-lg-12">
          <div class="card">
            <div class="card-close">
              <div class="dropdown">
                <button type="button" id="closeCard5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                <div aria-labelledby="closeCard5" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
              </div>
            </div>
            <div class="card-header d-flex align-items-center">

              <h3 class="h4">Enter all fields for edit products<span class="redtext">hello</span>
              </h3>
            </div>

	            <!-- ERROR MESSAGE DIV-->
	              <div id="error-message"> </div>
	              <div id="success-message"></div>
	            <!-- ERROR MESSAGE DIV CLOSE-->
	        <!-- Product images display -->
	      <form id="submit-product">
	        <div class="card-body">
	        	<div class="row">
	        		<div class="col-sm-12" >
	        			<p>Click on image to change or remove </p>
	        		</div>	

  						<!-- <div class='column image_area'>
	  						<label for='upload_image'>
									<img src='../../All-Products-images/' style='width:100%' id='uploaded_image'/>
									<div class='overlay'>
										<div class='text'>Click to Change Product Image</div>
									</div>
									<input type='file' name='image' class='image' id='upload_image' style='display:none' />
								</label>
							</div> -->
							<?php
							$path 					= "../../All-Products-images/";
							$upload_image 	= "upload_image";
							$uploaded_image = "uploaded_image";
							$send_img				= "send_img";
							$modal 					= "modal";
							$sample_image 	= "sample_image";
							$preview 				= "preview";
							$crop 					= "crop";
							$remove_img1		= "remove_img";
							// ==================== function for image upload ====================//
							function uploadImageView($product_image_name,$path,$upload_image,$uploaded_image,$image_coloum_name,$send_img,$modal,$sample_image,$preview,$crop,$remove_img){
									if($product_image_name == null){
										$add_more_img = "../img/add-more.png";
										$Display_Product_image = "
											<div class='column '>
					  						<label for='$upload_image' class='image_area'>

													<img src='$add_more_img' style='width:100%' id='$uploaded_image'/>

													<input type='text' name='$send_img' value='$product_image_name' id='$send_img' hidden />
													<input type='text' value='$image_coloum_name' id='$image_coloum_name' hidden />
													<div class='overlay'>
														<div class='text'>Click to Change Product Image</div>
													</div>
													<input type='file' name='image' class='image' id='$upload_image' style='display:none' />
												</label>
												</div>
												";

										$Display_Product_image .="
											<div class='modal fade' id='$modal' tabindex='-1' role='dialog' aria-labelledby='modalLabel' aria-hidden='true'>
										  	<div class='modal-dialog modal-lg' role='document'>
										    	<div class='modal-content'>
										      		<div class='modal-header'>
										        		<h5 class='modal-title'>Crop Image Before Upload</h5>
										        		<button type='button' class='close' data-dismiss='$modal' aria-label='Close'>
										          			<span aria-hidden='true'>×</span>
										        		</button>
										      		</div>
										      		<div class='modal-body'>
										        		<div class='img-container'>
										            		<div class='row'>
										                		<div class='col-md-8'>
										                    		<img src='' id='$sample_image' />
										                		</div>
										                		<div class='col-md-4'>
										                    		<div class='$preview'></div>
										                		</div>
										            		</div>
										        		</div>
										      		</div>
										      		<div class='modal-footer'>
										      			<button type='button' id='$crop' class='btn btn-primary'>Crop</button>
										        		<button type='button' class='btn btn-secondary' data-dismiss='$modal'>Cancel</button>
										      		</div>
										    	</div>
										  	</div>
											</div>
											";

									}else{
										$Display_Product_image ="
										<div class='column '>
				  						<label for='$upload_image' class='image_area'>

												<img src='$path$product_image_name' style='width:100%' id='$uploaded_image'/>

												<input type='text' name='$send_img' value='$product_image_name' id='$send_img' hidden />
												<input type='text' value='$image_coloum_name' id='$image_coloum_name' hidden />
												<div class='overlay'>
													<div class='text'>Click to Change Product Image</div>
												</div>
												<input type='file' name='image' class='image' id='$upload_image' style='display:none' />
											</label>
											<div>
											<button class='btn bg-light text-black w-100' style = 'font-size: 12px;' id='$remove_img' data-id='$product_image_name'>Remove</button>
											</div>
										</div>

										";

										$Display_Product_image .="
											<div class='modal fade' id='$modal' tabindex='-1' role='dialog' aria-labelledby='modalLabel' aria-hidden='true'>
										  	<div class='modal-dialog modal-lg' role='document'>
										    	<div class='modal-content'>
										      		<div class='modal-header'>
										        		<h5 class='modal-title'>Crop Image Before Upload</h5>
										        		<button type='button' class='close' data-dismiss='$modal' aria-label='Close'>
										          			<span aria-hidden='true'>×</span>
										        		</button>
										      		</div>
										      		<div class='modal-body'>
										        		<div class='img-container'>
										            		<div class='row'>
										                		<div class='col-md-8'>
										                    		<img src='' id='$sample_image' />
										                		</div>
										                		<div class='col-md-4'>
										                    		<div class='$preview'></div>
										                		</div>
										            		</div>
										        		</div>
										      		</div>
										      		<div class='modal-footer'>
										      			<button type='button' id='$crop' class='btn btn-primary'>Crop</button>
										        		<button type='button' class='btn btn-secondary' data-dismiss='$modal'>Cancel</button>
										      		</div>
										    	</div>
										  	</div>
											</div>
												";
								}

								return $Display_Product_image;
							}

							echo uploadImageView($product_images[0],$path,"upload_image","uploaded_image",$product_images_key[0],"send_img","modal","sample_image","preview","crop","remove_img");					
							echo uploadImageView($product_images[1],$path,"upload_image1","uploaded_image1",$product_images_key[1],"send_img1","modal1","sample_image1","preview1","crop1","remove_img1");
							echo uploadImageView($product_images[2],$path,"upload_image2","uploaded_image2",$product_images_key[2],"send_img2","modal2","sample_image2","preview2","crop2","remove_img2");
							echo uploadImageView($product_images[3],$path,"upload_image3","uploaded_image3",$product_images_key[3],"send_img3","modal3","sample_image3","preview3","crop3","remove_img3");
							echo uploadImageView($product_images[4],$path,"upload_image4","uploaded_image4",$product_images_key[4],"send_img4","modal4","sample_image4","preview4","crop4","remove_img4");
							?>

							

 						</div>
 						<br>
	        	
        		<div class="form-group row">
              <label class="col-sm-3 form-control-label">Product Name</label>
              <div class="col-sm-9">
                <input type="text" name="Product-name" id="Product-name" class="form-control" value="<?php echo $pro_details['product_name'] ?>" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 form-control-label">Select Category</label>
              <div class="col-sm-9">
                <select name="category" class="form-control mb-3" id="cat-box"required>
                  <?php 
                	$sql_get_categories ="SELECT ID,cat_name FROM categories WHERE status = 1";
									$result_get_categories = mysqli_query($conn,$sql_get_categories);
									if(mysqli_num_rows($result_get_categories) > 0){
										while($cat_row = mysqli_fetch_assoc($result_get_categories)){
											if($pro_details['category_id'] == $cat_row['ID']){
												$select_cat = "selected";
											}else{
												$select_cat = "";
											}
										echo '<option id="selected-cat_id" value="'.$cat_row['ID'].'" '.$select_cat.'>'.$cat_row['cat_name'].'</option>';
										}
									}
                	?>
                </select>
              </div>
            </div>
            <div class="form-group row">
				    	<label class="col-sm-3 form-control-label">Product Description</label>
				    	<div class="col-sm-9">
				    		<textarea name="description" id="description" class="form-control" required><?php echo $pro_details['description'] ?></textarea>
							</div>
						</div>
        		<div class="form-group row">
              <label class="col-sm-3 form-control-label">Market Price</label>
               	<div class="col-sm-9">
                  <div class="row">
                    <div class="col-md-3">
                      <input type="number" name="market-price" id="market-price" value="<?php echo $pro_details['m_price'] ?>" class="form-control" required>
                      <input type="text" name="pid" id="pid" value="<?php echo $pro_id; ?>" hidden>
                    </div>
                  </div>
                </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-4 offset-sm-3"> 
                <button type="submit" name="submit-p" id="submit-p" class="btn btn-primary">Submit Product</button>
              </div>
            </div>

	        </div>
	      </form>
	        	
	        

            
            
          </div>

        </div>
      </div>
    </div>
  </section>
  <!-- Page Footer-->
  <footer class="main-footer">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <p>Your company &copy; 2017-2020</p>
        </div>
        <div class="col-sm-6 text-right">
          <p>Design by <a href="https://bootstrapious.com/p/admin-template" class="external">Bootstrapious</a></p>
          <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
        </div>
      </div>
    </div>
  </footer>
</div>

<!-- =============================body close ===================================-->

</div>
</div>
    <!-- JavaScript files-->
    <script src="../vendor/jquery/jquery.js"></script>
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/popper.js/umd/popper.min.js"> </script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="../vendor/chart.js/Chart.min.js"></script>
    <script src="../vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="../js/charts-home.js"></script>
    <script src="../js/dropzone.js"></script>
    <!-- Main File-->
    <script src="https://unpkg.com/dropzone"></script>
		<script src="https://unpkg.com/cropperjs"></script>
    <script src="../js/front.js"></script>
    <script type="text/javascript">


$(document).ready(function(){
	//location.reload();
var modal = $('#modal');
var image = document.getElementById('sample_image');
var upload_image = $('#upload_image');
var preview = '.preview';
var crop = $('#crop');
var uploaded_image = $('#uploaded_image');
var send_img = $("#send_img");
var col_name = $("#image_0");

	function modalCropAndUpload(modal,image,upload_image,preview,crop,uploaded_image,send_img,col_name) {
				var $modal = modal;

				var image = image;

				var $preview = preview;

				var cropper;

				upload_image.change(function(event){
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
						preview: $preview
					});
				}).on('hidden.bs.modal', function(){
					cropper.destroy();
			   		cropper = null;
				});

				crop.click(function(){
					canvas = cropper.getCroppedCanvas({
						width:800,
						height:800
					});

					canvas.toBlob(function(blob){
						url = URL.createObjectURL(blob);
						var reader = new FileReader();
						reader.readAsDataURL(blob);
						reader.onloadend = function(){
							var image_col_name =  col_name.val();
							var product_id = $("#pid").val();
							var send_img_exist = send_img.val();
							var base64data = reader.result;
							$.ajax({
								url:'upload-singal-product-image.php',
								method:'POST',
								data:{image:base64data,col_name:image_col_name,p_id:product_id,image_name_exits:send_img_exist},
								success:function(data)
								{
									$modal.modal('hide');
									uploaded_image.attr('src',data);
									//var split_image_name = data.split("/");
									//send_img.val(split_image_name[1]);
									$("#success-message").html("<div class='alert alert-dismissible fade show alert-success' role='alert'>Successfully image changed.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
			        	$("#error-message").slideUp();

			        	setTimeout(function(){$("#success-message").fadeOut("slow")}, 3000);
			        	location.reload();


								}
							});
						};
					});
				});
		}
// calling function for crop image and modal open 
modalCropAndUpload(modal,image,upload_image,preview,crop,uploaded_image,send_img,col_name);
modalCropAndUpload($('#modal1'),document.getElementById('sample_image1'),$('#upload_image1'),".preview1",$('#crop1'),$('#uploaded_image1'),$("#send_img1"),$("#image_1"));
modalCropAndUpload($('#modal2'),document.getElementById('sample_image2'),$('#upload_image2'),".preview2",$('#crop2'),$('#uploaded_image2'),$("#send_img2"),$("#image_2"));
modalCropAndUpload($('#modal3'),document.getElementById('sample_image3'),$('#upload_image3'),".preview3",$('#crop3'),$('#uploaded_image3'),$("#send_img3"),$("#image_3"));
modalCropAndUpload($('#modal4'),document.getElementById('sample_image4'),$('#upload_image4'),".preview4",$('#crop4'),$('#uploaded_image4'),$("#send_img4"),$("#image_4"));

// delete image function below
//var remove_img = $("#remove_img");
function deleteImageOneByOne(remove_img){
	remove_img.on('click',function(e){
	e.preventDefault();
	if(confirm("Do you real want to delete this Image.?")){
		var image_value =  remove_img.data('id');
		var product_id = $("#pid").val();
		//alert(image_value+product_id);
			$.ajax({
				url : "delete-signal-image.php",
				type : "POST",
				data : {image_name:image_value, p_id:product_id},
				success:function(data){
					if(data == 1){
							location.reload();
						}else{
								$("#error-message").html("<div class='alert alert-dismissible fade show alert-danger ' role='alert'>Sorry it can't be delete.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
			        	$("#success-message").slideUp();
			      	} 
					}
				});
	 		}
		});
}
// calling function for delete
deleteImageOneByOne($("#remove_img"));
deleteImageOneByOne($("#remove_img1"));
deleteImageOneByOne($("#remove_img2"));
deleteImageOneByOne($("#remove_img3"));
deleteImageOneByOne($("#remove_img4"));



//load categories 
	
	// $.ajax({
	// url : "load-new-products-category.php",
	// type : "POST",
	// dataType : "JSON",
	// success : function(data){
	//   $.each(data,function(key, value){
	//   	var cat_id_sel = $("#selected-cat_id").val();
	//   	if(cat_id_sel == value.ID){
	//   		$("#cat-box").append("<option value='"+value.ID+"' selected >"+ value.cat_name +"</option>");
	//   	}else{
	//   		$("#cat-box").append("<option value='"+value.ID+"' >"+ value.cat_name +"</option>");
	//   	}
	    
	//   });
	// }
	// });
	
		

// submit form 
	$("#submit-p").on("click",function(e){
		e.preventDefault();
		var p_name = $("#Product-name").val();
		var p_des = $("#description").val();
		var p_price = $("#market-price").val();
		if(p_name == "" || p_des == "" || p_price == ""){
			$("#error-message").html("<div class='alert alert-dismissible fade show alert-danger' role='alert'>Please fill all fields .<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
            $("#success-message").slideUp();
            //setTimeout(function(){$("#error-message").fadeOut("slow")}, 4000);
		}else{
			 $.ajax({
			 	url : "edit-product-submit.php",
			 	type : "POST",
			 	data : $("#submit-product").serialize(),
			 	beforesend: function(){
			 		$("#success-message").html("<div class='alert alert-dismissible fade show alert-info ' role='alert'>Please wait storing product...<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
            		$("#error-message").slideUp();
			 	},
			 	success : function(data){
			 		if(data == 1){
			 		$("#success-message").html("<div class='alert alert-dismissible fade show alert-success ' role='alert'>Successfully uploaded product.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
            		$("#error-message").slideUp();
            		setTimeout(function(){$("#success-message").fadeOut("slow")}, 3000);
            		//$('#submit-product').trigger("reset");
            		//location.replace("../products.php");
            	}else{
            		$("#error-message").html("<div class='alert alert-dismissible fade show alert-danger ' role='alert'>Inserting product failed.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
            		$("#success-message").slideUp();
            		setTimeout(function(){$("#success-message").fadeOut("slow")}, 3000);
			 		}
			 	}
			 });
            	
		}
	});


});


    </script>
  </body>
</html>
