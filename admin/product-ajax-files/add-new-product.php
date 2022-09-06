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
              <form class="dropzone" id="submit_multi_image" action="upload-new-product-images.php">
                 
              </form> 
              <div class="line"></div>
              <div class="col-sm-4 mt-3">
                <button class="btn btn-primary" id="upload_multi_images">Next</button>
              </div>
            </div>
            <!-- <div class="card-body">
                <div id="preview">
                  <h5>Image Preview</h5>
                  <div id="image_preview" ></div>
                </div>            
            </div> -->
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
    <script src="../vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="../js/dropzone.js?v=1"></script>
    <!-- Main File-->
    <script src="../js/front.js"></script>
    <script type="text/javascript">

       Dropzone.autoDiscover =false;

      var myDropzone = new Dropzone("#submit_multi_image", { 
        url: 'upload-new-product-images.php',
        parallelUploads: 5,
        uploadMultiple: true,
        acceptedFiles: '.jpg,.jpeg,.png',
        autoProcessQueue: false,
        maxFiles: 5,
        addRemoveLinks: true,    
        success: function(file,response){
        	//var res = response;
        	
          if(response != "true"){            
            $("#success-message").html("<div class='alert alert-dismissible fade show alert-success' role='alert'>images uploaded successfully.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
            $("#error-message").slideUp();
            myDropzone.removeAllFiles();
            //$("#image_preview").html(response);
            //$("#preview").show();
            // $("#image_preview").html(file);
            setTimeout(function(){$("#success-message").fadeOut("slow")}, 3000);
            location.replace("new-product-from.php");
            
          }else{
            $("#error-message").html("<div class='alert alert-dismissible fade show alert-danger' role='alert'>images cant uploaded its failed.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
            $("#success-message").slideUp();
            setTimeout(function(){$("#error-message").fadeOut("slow")}, 3000);
          }
        }
      });

      $("#upload_multi_images").on("click",function(){
        //alert("click");
          myDropzone.processQueue();
        
        
      });

    </script>
  </body>
</html>






















 