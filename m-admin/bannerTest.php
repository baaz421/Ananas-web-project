<html>
<style type="text/css">
	#profileImageModal .modal-body {
		min-height: 400px;
		max-height:400px;
	}

	.imgdiv {
		max-height: 300px !important;
		max-width: 300px !important;
	}
	#profilePicture {
		margin-top:50px;
		border:1px solid red;
		min-height:250px;
		min-width:250px;
		max-height:250px;
		max-width:250px;
	}
</style>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.4.0/cropper.min.css">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css">
<body>     
	<div class="container">
		<div class="row d-flex justify-content-center">        
			<div class="st-account-img"> 
				<img id="profilePicture" src="" alt="" data-target="#profileImageModal" data-toggle="modal">
			</div> 
		</div>
	</div> 
	<div class="modal fade" id="profileImageModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
		<div class="modal-dialog modal-md" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalLabel">Upload Image</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<div class="thumbimg ">

							<input type="file" name="image" id="image" style="display:none;">
							<button type="button" onclick="image.click();" class="btn st-cropper-select-btn btn-secondary btn-md">Select File</button>
							<div class="showimg  d-flex justify-content-center pt-3" >
								<div class="row imgdiv" id="imgdiv" style="" >
									<img id="imagecan">
								</div>
							</div>
						</div>
					</div>

				</div>
				<div class="modal-footer d-flex justify-content-center">
					<button type="button" onclick="onClickUpload()" class="btn btn-primary st-cropper-upload-btn btn-md">Upload
						<i class="fa fa-spinner fa-spin showloading" style="color:white; font-size:12px; display:none;  position:absolute; margin-left: 3px; margin-top: 4px;"></i>
					</button>
					<button type="button" class="btn btn-secondary btn-md st-cropper-close-btn" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>


</body>
</html>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.4.0/cropper.min.js"></script>
<script type="text/javascript">
	var cropper;
	$(document).ready(function(){
//cropper Start
		$('#imgdiv').hide();
		$('#croppedimg').hide();

		$('#image').on("change", function (e) {
			console.log(e);
			ratio = 3 / 1 ;
			croppingimg(e, ratio);
		});

		function croppingimg(e, ratio) {
			var imgsrc = URL.createObjectURL(e.target.files[0])
			if (imgsrc) {
              // console.log(imgsrc);
				$('#imagecan').attr("src", imgsrc);
				$('#imgdiv').show();
				var image = document.getElementById('imagecan');
				if (cropper) {
					cropper.destroy();
				}
				cropper = new Cropper(image, {
					viewMode: 3,
					aspectRatio: ratio,
					dragMode: 'move',
					cropBoxMovable: false,
					cropBoxResizable: false,
					checkOrientation: false,
					viewMode:1,
					crop: function (event) {
						var url = cropper.getCroppedCanvas({
							width: 100,
							height: 100,
						}).toDataURL();
						$('#cropped').attr("src", url);
						$('#croppedimg').show();
						window.URL.revokeObjectURL(imgsrc);
					}
				});
			}
		}
  //cropper end
	});
	function onClickUpload() {
		console.log('test')
		var profileImage;
		if(cropper.getCroppedCanvas()){
			cropper.getCroppedCanvas().toBlob(function (blob) {
          // profileImage = new FormData();
          // profileImage.append('profileImage', blob, "profileImage");
				var url = cropper.getCroppedCanvas().toDataURL();
				console.log(url);
          // $('.showloading').show();
          // $.ajax({
          //     url: "{!!url('user/insertimage')!!}",
          //     data: profileImage,
          //     type: "POST",
          //     processData: false,
          //     contentType: false,
          //     headers: {
          //         'X-CSRF-TOKEN': "{{ csrf_token() }}"
          //     },
          //     success: function (result) {
                   // $('.showloading').hide();
				if (cropper) {
					cropper.destroy();
					$('#croppedimg').hide();
					$('#imgdiv').hide();
				}
                  // if (result['code'] == 200) {
				$('#profileImageModal').modal('toggle');
				$('#profilePicture').removeAttr('src')
				$('#profilePicture').attr('src', url);
                      // $('#headerProfileImage').attr('src', url);
				$('#image').val("");
                      // toastr.success("Image Upadated");
                  // } else {
                  //     alert(result['code'] + ":" + result['massage'])
                  //     $('#profileImageModal').modal('toggle');
                  //     // toastr.error("Something went wrong. Please try again");
                  // }
              // },
              // error: function (jqXHR, textStatus, errorThrown) {
              //      $('.showloading').hide();
              //     console.log(jqXHR);
              //     toastr.error("Something went wrong. Please try again");
              //     // alert(jqXHR.status + ":" + textStatus + ":" + errorThrown);
              // }
          // });
			}, 'image/png');
		}
	}
</script>