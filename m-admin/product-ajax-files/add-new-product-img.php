<?php
$title = "Upload Images";
require_once "../header.php";
?>

<!-- =============================body starts ===================================-->
<div class="content-inner">
  <!-- Page Header-->
  <header class="page-header">
    <div class="container-fluid">
      <h2 class="no-margin-bottom">Upload Product Images</h2>
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
              <h3 class="h4">(Step 1-2)Only These format images required -
              	<span class="badge badge-warning">.JPEG</span>
              	<span class="badge badge-warning">.JPG</span>
              	<span class="badge badge-warning">.PNG</span>*
              </h3>
            </div>
              <!-- ERROR MESSAGE DIV-->
                <div id="error-message"> </div>
                <div id="success-message"></div>
              <!-- ERROR MESSAGE DIV CLOSE-->
            <!--============file uplaod    =================== -->
            <div class="card-body" id="content" >
              <!-- <form class="dropzone" id="submit_multi_image" action="upload-new-product-images.php"></form> -->
              <!-- <form class="dropzone" id="my-dropzone-container" method="post" enctype="multipart/form-data"></form>  -->
              <form class="dropzone" id="myDropzone"></form> 
              <!-- <div class="dropzone" id="myDropzone"></div> -->
              <div class="line"></div>
              <div class="col-sm-4 mt-3">
                <button class="btn btn-primary" id="upload_multi_images">Next</button>
              </div>
            </div>

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
        </div>
      </div>
    </div>
  </footer>
</div>

<!-- =============================body close ===================================-->

</div>
    </div>
<!-- ========================================================================================= -->
<!-- <div class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Crop</h4>
      </div>
      <div class="modal-body">
        <div class="image-container">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary crop-upload">Crop & upload</button>
      </div>
    </div>
  </div>
</div> -->
<!-- ========================================================================================= -->

    <!-- JavaScript files-->
    <script src="../vendor/jquery/jquery.js"></script>
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/popper.js/umd/popper.min.js"> </script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="../vendor/jquery-validation/jquery.validate.min.js"></script>

    <!--  cropper and dropzone js files -->
    <script src="../js/dropzone.js"></script>
    <script src="../js/cropper.js"></script>
    <script src="../js/dropzoneCopper.js"></script>
    <!-- <script src="https://unpkg.com/dropzone"></script> -->
    <!-- <script src="https://unpkg.com/cropperjs"></script> -->


    <!-- Main File-->
    <script src="../js/front.js"></script>
    <script type="text/javascript">

// ================== dropzone code only start
    // Dropzone.autoDiscover =false;

    //     var myDropzone = new Dropzone("#submit_multi_image", { 
    //       url: 'upload-new-product-images.php',
    //       parallelUploads: 5,
    //       uploadMultiple: true,
    //       acceptedFiles: '.jpg,.jpeg,.png',
    //       autoProcessQueue: false,
    //       maxFiles: 5,
    //       addRemoveLinks: true,    
    //       success: function(file,response){
    //       	//var res = response;
          	
    //         if(response != "true"){            
    //           $("#success-message").html("<div class='alert alert-dismissible fade show alert-success' role='alert'>images uploaded successfully.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
    //           $("#error-message").slideUp();
    //           myDropzone.removeAllFiles();
    //           setTimeout(function(){$("#success-message").fadeOut("slow")}, 3000);
    //           location.replace("new-product-from.php");
              
    //         }else{
    //           $("#error-message").html("<div class='alert alert-dismissible fade show alert-danger' role='alert'>images cant uploaded its failed.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
    //           $("#success-message").slideUp();
    //           setTimeout(function(){$("#error-message").fadeOut("slow")}, 3000);
    //         }
    //       }
    //     });

    //     $("#upload_multi_images").on("click",function(){
    //       //alert("click");
    //         myDropzone.processQueue();        
          
    //     });
// ================== dropzone code only close

/*----------------------------------------------------------------------------------------*/

//==========================old copper code
  // Dropzone.options.autoDiscover =false;
  Dropzone.options.myDropzone = {
    url: 'test-img.php',
    addRemoveLinks: true, 
    parallelUploads: 5,
    uploadMultiple: true,
    acceptedFiles: '.jpg,.jpeg,.png',
    maxFiles: 5,
    // autoProcessQueue : false,

    // success: function(file, done) {
      transformFile: function(file, done) {
      var myDropZone = this;

      // Create the image editor overlay
        var editor = document.createElement('div');
        editor.style.position = 'fixed';
        editor.style.left = 0;
        editor.style.right = 0;
        editor.style.top = 0;
        editor.style.bottom = 0;
        editor.style.zIndex = 9999;
        editor.style.backgroundColor = '#000';        

      // // Create the cancel button
      //   var cancel = document.createElement('button');
      //   cancel.style.position = 'absolute';
      //   cancel.style.left = '10px';
      //   cancel.style.top = '60px';
      //   cancel.style.zIndex = 9999;
      //   cancel.textContent = 'Cancel';
      //   cancel.classes ='btn btn-danger';
      //   cancel.addEventListener('click', function() {
      //     // Remove the editor from view
      //     editor.parentNode.removeChild(editor);
      //   });

      // Create the confirm button
        var confirm = document.createElement('button');
        confirm.style.position = 'absolute';
        confirm.style.left = '10px';
        confirm.style.top = '10px';
        confirm.style.zIndex = 9999;
        confirm.textContent = 'Confirm';
        confirm.addEventListener('click', function() {

          // Get the canvas with image data from Cropper.js
            var canvas = cropper.getCroppedCanvas({
                width: 800,
                height: 800
              });

          // Turn the canvas into a Blob (file object without a name)
            canvas.toBlob(function(blob) {
                // Update the image thumbnail with the new image data
                  myDropZone.createThumbnail(
                      blob,
                      myDropZone.options.thumbnailWidth,
                      myDropZone.options.thumbnailHeight,
                      myDropZone.options.thumbnailMethod,
                      false,
                      function(dataURL) {
                          // Update the Dropzone file thumbnail
                          myDropZone.emit('thumbnail', file, dataURL);
                          // Return modified file to dropzone
                          // done = blob;
                            $("#upload_multi_images").on("click",function(){ 
                                done(blob);
                                // done = blob;
                            });
                      }
                  );
              });

          // Remove the editor from view
            editor.parentNode.removeChild(editor);

        });

      editor.appendChild(confirm);
      // editor.appendChild(cancel);

      // Load the image
      var image = new Image();
      image.src = URL.createObjectURL(file);
      editor.appendChild(image);

      // Append the editor to the page
      document.body.appendChild(editor);

      // Create Cropper.js and pass image
      var cropper = new Cropper(image, {
          aspectRatio: 1
      });

      this.on("successmultiple", function(files, response) {
        // Gets triggered when the files have successfully been sent.
        // Redirect user or notify of success.
        if(response != true){            
                $("#success-message").html("<div class='alert alert-dismissible fade show alert-success' role='alert'>"+response+"images uploaded successfully.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
                $("#error-message").slideUp();
                //this.removeAllFiles();
                //setTimeout(function(){$("#success-message").fadeOut("slow")}, 3000);
                //location.replace("new-product-from.php");
                
              }else{
                $("#error-message").html("<div class='alert alert-dismissible fade show alert-danger' role='alert'>images cant uploaded its failed.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
                $("#success-message").slideUp();
                //setTimeout(function(){$("#error-message").fadeOut("slow")}, 3000);
              }
        });
    } 
  }
// =============================old copper code close

/*----------------------------------------------------------------------------------------*/

//========================== new copper code start
  // // transform cropper dataURI output to a Blob which Dropzone accepts
  // var dataURItoBlob = function (dataURI) {
  //     var byteString = atob(dataURI.split(',')[1]);
  //     var ab = new ArrayBuffer(byteString.length);
  //     var ia = new Uint8Array(ab);
  //     for (var i = 0; i < byteString.length; i++) {
  //         ia[i] = byteString.charCodeAt(i);
  //     }
  //     return new Blob([ab], {type: 'image/jpeg'});
  // };

  // Dropzone.autoDiscover = false;
  // var c = 0;

  // var myDropzone = new Dropzone("#my-dropzone-container", {
  //     url: 'test-img.php',
  //     addRemoveLinks: true,
  //     parallelUploads: 5,
  //     uploadMultiple: false,
  //     maxFiles: 5,
  //     init: function () {
  //         this.on('success', function (file) {
  //             var $button = $('<a href="#" class="js-open-cropper-modal" data-file-name="' + file.dataURL + '">Crop & Upload</a>');
  //             $(file.previewElement).append($button);
  //             console.log(file.dataURL);
  //         });
  //     }
  // });

  // $('#my-dropzone-container').on('click', '.js-open-cropper-modal', function (e) {
  //     e.preventDefault();
  //     var fileName = $(this).data('file-name');
  //     console.log(fileName);

  //     var modalTemplate =
  //         '<div class="modal fade" tabindex="-1" role="dialog">' +
  //         '<div class="modal-dialog modal-lg" role="document">' +
  //         '<div class="modal-content">' +
  //         '<div class="modal-header">' +
  //         '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
  //         '<h4 class="modal-title">Crop</h4>' +
  //         '</div>' +
  //         '<div class="modal-body">' +
  //         '<div class="image-container">' +
  //         '<img id="img-' +c + '" src="' + fileName + '">' +
  //         '</div>' +
  //         '</div>' +
  //         '<div class="modal-footer">' +
  //         '<button type="button" class="btn btn-warning rotate-left"><span class="fa fa-rotate-left"></span></button>' +
  //         '<button type="button" class="btn btn-warning rotate-right"><span class="fa fa-rotate-right"></span></button>' +
  //         '<button type="button" class="btn btn-warning scale-x" data-value="-1"><span class="fa fa-arrows-h"></span></button>' +
  //         '<button type="button" class="btn btn-warning scale-y" data-value="-1"><span class="fa fa-arrows-v"></span></button>' +
  //         '<button type="button" class="btn btn-warning reset"><span class="fa fa-refresh"></span></button>' +
  //         '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>' +
  //         '<button type="button" class="btn btn-primary crop-upload">Crop & upload</button>' +
  //         '</div>' +
  //         '</div>' +
  //         '</div>' +
  //         '</div>';

  //     var $cropperModal = $(modalTemplate);

  //     $cropperModal.modal('show').on("shown.bs.modal", function () {
  //         var cropper = new Cropper(document.getElementById('img-' + c), {
  //             autoCropArea: 1,
  //             movable: false,
  //             cropBoxResizable: true,
  //             rotatable: true
  //         });
  //         var $this = $(this);
  //         $this
  //             .on('click', '.crop-upload', function () {
  //                 // get cropped image data
  //                 var blob = cropper.getCroppedCanvas().toDataURL();
  //                 // transform it to Blob object
  //                 var croppedFile = dataURItoBlob(blob);
  //                 croppedFile.name = fileName;

  //                 var files = myDropzone.getAcceptedFiles();
  //                 for (var i = 0; i < files.length; i++) {
  //                     var file = files[i];
  //                     if (file.name === fileName) {
  //                         myDropzone.removeFile(file);
  //                     }
  //                 }
  //                 myDropzone.addFile(croppedFile);
  //                 $this.modal('hide');
  //             })
  //             .on('click', '.rotate-right', function () {
  //                 cropper.rotate(90);
  //             })
  //             .on('click', '.rotate-left', function () {
  //                 cropper.rotate(-90);
  //             })
  //             .on('click', '.reset', function () {
  //                 cropper.reset();
  //             })
  //             .on('click', '.scale-x', function () {
  //                 var $this = $(this);
  //                 cropper.scaleX($this.data('value'));
  //                 $this.data('value', -$this.data('value'));
  //             })
  //             .on('click', '.scale-y', function () {
  //                 var $this = $(this);
  //                 cropper.scaleY($this.data('value'));
  //                 $this.data('value', -$this.data('value'));
  //             });
  //     });
  // });
//========================== new copper code close

//====================================================================================================
  //   // transform cropper dataURI output to a Blob which Dropzone accepts
  // function dataURItoBlob(dataURI) {
  //     var byteString = atob(dataURI.split(',')[1]);
  //     var ab = new ArrayBuffer(byteString.length);
  //     var ia = new Uint8Array(ab);
  //     for (var i = 0; i < byteString.length; i++) {
  //         ia[i] = byteString.charCodeAt(i);
  //     }
  //     return new Blob([ab], { type: 'image/jpeg' });
  // }

  // // modal window template
  // var modalTemplate = '<div class="modal fade" tabindex="-1" role="dialog"><div class="modal-dialog modal-lg" role="document"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="modal-title">Crop</h4></div><div class="modal-body"><div class="image-container"></div></div><div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Close</button><button type="button" class="btn btn-primary crop-upload">Crop & upload</button></div></div></div></div>';

  // // initialize dropzone
  // Dropzone.autoDiscover = false;
  // var myDropzone = new Dropzone(
  //     "#my-dropzone-container",
  //     {   
  //         url: 'test-img.php',
  //         addRemoveLinks: true,
  //         parallelUploads: 5,
  //         uploadMultiple: false,
  //         maxFiles: 5,
  //         autoProcessQueue: false,
  //         // ..your other parameters..
  //     }
  // );

  // // listen to thumbnail event
  // myDropzone.on('thumbnail', function (file) {
  //     // ignore files which were already cropped and re-rendered
  //     // to prevent infinite loop
  //     if (file.cropped) {
  //         return;
  //     }
  //     if (file.width < 800) {
  //         // validate width to prevent too small files to be uploaded
  //         // .. add some error message here
  //         return;
  //     }
  //     // cache filename to re-assign it to cropped file
  //     var cachedFilename = file.name;
  //     // remove not cropped file from dropzone (we will replace it later)
  //     myDropzone.removeFile(file);

  //     // dynamically create modals to allow multiple files processing
  //     var $cropperModal = $(modalTemplate);
  //     // 'Crop and Upload' button in a modal
  //     var $uploadCrop = $cropperModal.find('.crop-upload');

  //     var $img = $('<img />');
  //     // initialize FileReader which reads uploaded file
  //     var reader = new FileReader();
  //     reader.onloadend = function () {
  //         // add uploaded and read image to modal
  //         $cropperModal.find('.image-container').html($img);
  //         $img.attr('src', reader.result);

  //         // initialize cropper for uploaded image
  //         var cropper = $img.data('cropper');
  //         $img.cropper({
  //             aspectRatio: 16 / 9,
  //             autoCropArea: 1,
  //             movable: false,
  //             cropBoxResizable: true,
  //             minContainerWidth: 850
  //         });
  //     };

  //     // read uploaded file (triggers code above)
  //     reader.readAsDataURL(file);

  //     $cropperModal.modal('show');

  //     // listener for 'Crop and Upload' button in modal
  //     $uploadCrop.on('click', function() {
  //         // get cropped image data
  //         var blob = $img.cropper('getCroppedCanvas').toDataURL();
  //         // transform it to Blob object
  //         var newFile = dataURItoBlob(blob);
  //         // set 'cropped to true' (so that we don't get to that listener again)
  //         newFile.cropped = true;
  //         // assign original filename
  //         newFile.name = cachedFilename;

  //         // add cropped file to dropzone
  //         myDropzone.addFile(newFile);
  //         // upload cropped file with dropzone
  //         myDropzone.processQueue();
  //         $cropperModal.modal('hide');
  //     });
  // });
//====================================================================================================




    </script>
  </body>
</html>






















 