
<?php
//session_start();

$title = "New Product Form";
//echo $_SESSION['last_id'];
require_once "../header.php";

?>

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

              <h3 class="h4">(Step 2-2) Enter all fields for new products
              </h3>
            </div>
	            <!-- ERROR MESSAGE DIV-->
	              <div id="error-message"> </div>
	              <div id="success-message"></div>
	            <!-- ERROR MESSAGE DIV CLOSE-->
	        <div class="card-body" >
	        	<form id="submit-product">
	        		<div class="form-group row">
	                  <label class="col-sm-3 form-control-label">Product Name</label>
	                  <div class="col-sm-9">
	                    <input type="text" name="Product-name" id="Product-name" class="form-control" placeholder="Required Product Title" required>
	                  </div>
	                </div>
	                <div class="form-group row">
	                  <label class="col-sm-3 form-control-label">Select Category</label>
	                  <div class="col-sm-9">
	                    <select name="category" class="form-control mb-3" id="cat-box"required>
	                      <option>Select Category</option>
	                    </select>
	                  </div>
	                </div>
	                <div class="form-group row">
					    <label class="col-sm-3 form-control-label">Product Description</label>
					    <div class="col-sm-9">
					    	<textarea name="description" id="description" class="form-control" placeholder="Required Product Description" required></textarea>
						</div>
					</div>
	        		<div class="form-group row">
	                  <label class="col-sm-3 form-control-label">Market Price</label>
	                  <div class="col-sm-9">
	                    <div class="row">
	                      <div class="col-md-3">
	                        <input type="number" name="market-price" id="market-price" placeholder="Market price" class="form-control" required>
	                      </div>
	                    </div>
	                  </div>
	                </div>
	                <div class="form-group row">
	                  <div class="col-sm-4 offset-sm-3"> 
	                    <button type="submit" name="submit-p" id="submit-p" class="btn btn-primary">Submit Product</button>

	                  </div>
	                  <div class="col-sm-4">
	                  	<a href="../products.php" class="btn btn-primary">Cancel Go Back</a>
	                  </div>	                  
	                </div>
	        	</form>
	        	
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
    <script src="../js/front.js"></script>
    <script type="text/javascript">
$(document).ready(function(){
//load categories 
	
	$.ajax({
	url : "load-new-products-category.php",
	type : "POST",
	dataType : "JSON",
	success : function(data){
	  $.each(data,function(key, value){
	    $("#cat-box").append("<option value='"+value.ID+"' >"+ value.cat_name +"</option>");
	  });
	}
	});
	
		

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
			 	url : "submit-new-product.php",
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
            		$('#submit-product').trigger("reset");
            		location.replace("../products.php");
            	}else{
            		$("#error-message").html("<div class='alert alert-dismissible fade show alert-danger ' role='alert'>Inserting product failed.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
            		$("#success-message").slideUp();
			 		}
			 	}
			 });
            	
		}
	});


});


    </script>
  </body>
</html>
