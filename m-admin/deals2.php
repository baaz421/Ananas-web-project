<?php


$pid =  $_GET['pid'];
$title = "Product Deal";
//echo $_SESSION['last_id'];
require_once "header.php";

$ot = "00:00"; // old time for deal 
$ot_t = strtotime($ot); // convert old time

$ct = date("H:i"); // current time for deal 
$ct_t = date('H:i',strtotime('+1 hour',strtotime($ct))); // convert current time
$ct_ts = strtotime($ct_t);

$et = "00:50"; // end time for deal 
$et_t = strtotime($et); // convert end time

$x = $et_t-$ot_t;
$y = $ct_ts-$ot_t;
$z = $y/$x*100;
if($z < 100){
echo round($z,1);
}else{
	echo "done";
}


?>

<!-- =============================body starts ===================================-->
<div class="content-inner">
  <!-- Page Header-->
  <header class="page-header">
    <div class="container-fluid">
      <h2 class="no-margin-bottom">Create Product Deal</h2>
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
<?php 

$current_date_from_php =date('d-m-Y h:i A');
$current_date = date('Y-m-d H:i A',strtotime('+1 hour',strtotime($current_date_from_php)));
$exp_date = explode(" ",$current_date);
	                  	
    if(isset($_GET['pid'])){

	    // load product details sql statement
	    $sql_load_pro = "SELECT * FROM products WHERE ID = $pid";
	    $load_pro_res = mysqli_query($conn, $sql_load_pro);
	    $fetch_pro = mysqli_fetch_assoc($load_pro_res);
	    $cat_id_pro = $fetch_pro['category_id'];
	    
	    // load categories details sql statement
	    $sql_cat = "SELECT * FROM categories WHERE ID = $cat_id_pro";
	    $cat_result_dis = mysqli_query($conn, $sql_cat);
	    $fetch_cat = mysqli_fetch_assoc($cat_result_dis);

	    // check images is avaiable in database or not
	    if($fetch_pro['image_1'] != "null"){
	    	$img_1 = "../All-Products-images/{$fetch_pro['image_1']}";
	    }else{
	    	$img_1 = "";
	    }

	    if($fetch_pro['image_2'] != "null"){
	    	$img_2 = "../All-Products-images/{$fetch_pro['image_2']}";
	    }else{
	    	$img_2 = "";
	    }

	    if($fetch_pro['image_3'] != "null"){
	    	$img_3 = "../All-Products-images/{$fetch_pro['image_3']}";
	    }else{
	    	$img_3 = "";
	    }

	    if($fetch_pro['image_4'] != "null"){
	    	$img_4 = "../All-Products-images/{$fetch_pro['image_4']}";
	    }else{
	    	$img_4 = "";
	    }

	}


?>
            <div class="card-header d-flex align-items-center">
           		<h3 class="h4"><?php echo $fetch_pro["product_name"]; ?></h3>
            </div>
            <?php
            $a_id =  $_SESSION['ma_id'];
            $a_country = $_SESSION['ma_country'];
           // echo "<pre>";
           // print_r($_SERVER);
           // echo "<pre>";

            ?>

	            <!-- ERROR MESSAGE DIV-->
	              <div id="error-message"> </div>
	              <div id="success-message"></div>
	            <!-- ERROR MESSAGE DIV CLOSE-->

	    <!-- product show for deal, means display products START HERE -->
	        <div class="card-body">
	        	<div class="row">
		    		<div class="col-md-6 mb-4 mb-md-0">
		    			<div class="mdb-lightbox">
		    				<div class="row product-gallery mx-1">
		    					<div class="col-12 mb-0">
						            <figure class="view rounded ">
						                <img src="../All-Products-images/<?php echo $fetch_pro['image_0']?>"
						                  class="img-fluid z-depth-1">
						            </figure>
				          		</div>
					        	
				        	</div>

			      		</div>
			  		</div>
				    <div class="col-md-6">
				    	<div class="col-12">
				            <div class="row">
				              <div class="col-3">
				                <div class="view overlay rounded z-depth-1 gallery-item">
				                  <img src="<?php echo $img_1;?>?>"
				                    class="img-fluid">
				                  <div class="mask rgba-white-slight"></div>
				                </div>
				              </div>
				              <div class="col-3">
				                <div class="view overlay rounded z-depth-1 gallery-item">
				                  <img src="<?php echo $img_2;?>"
				                    class="img-fluid">
				                  <div class="mask rgba-white-slight"></div>
				                </div>
				              </div>
				              <div class="col-3">
				                <div class="view overlay rounded z-depth-1 gallery-item">
				                  <img src="<?php echo $img_3;?>"
				                    class="img-fluid">
				                  <div class="mask rgba-white-slight"></div>
				                </div>
				              </div>
				              <div class="col-3">
				                <div class="view overlay rounded z-depth-1 gallery-item">
				                  <img src="<?php echo $img_4;?>"
				                    class="img-fluid">
				                  <div class="mask rgba-white-slight"></div>
				                </div>
				              </div>
				            </div>
		          		</div>
				      <div class="table-responsive">
				        <table class="table table-sm table-borderless mb-0">
				          <tbody>
				          	<tr>
				              <th class="pl-0 w-25" scope="row"><strong>Product Name</strong></th>
				              <td><?php echo $fetch_pro["product_name"]; ?></td>
				            </tr>
				          	<tr>
				              <th class="pl-0 w-25" scope="row"><strong>Product ID</strong></th>
				              <td><?php echo $fetch_pro['ID']; ?></td>
				            </tr>
				            <tr>
				              <th class="pl-0 w-25" scope="row"><strong>Category</strong></th>
				              <td><?php echo $fetch_cat['cat_name']; ?></td>
				            </tr>
				            <tr>
				              <th class="pl-0 w-25" scope="row"><strong>Market value</strong></th>
				              <td><?php echo $fetch_pro['m_price']; ?></td>
				            </tr>
				            <tr>
				              <th class="pl-0 w-25" scope="row"><strong>Description</strong></th>
				              <td><?php echo $fetch_pro['description']; ?></td>
				            </tr>
				            <tr>
				              <th class="pl-0 w-25" scope="row"><strong>Country</strong></th>
				              <td><?php echo $a_country; ?></td>
				            </tr>

				          </tbody>
				        </table>
				      </div>

				      <hr>
				      <div class="progress">
  <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" style="width: 60%"> 40.50 %</div>
</div>
			    	</div>
				</div>
	        </div>
	    <!-- product show for deal, means display products CLOSE HERE   -->
	        <div class="card-body">
		        <div class="col-md-12 mx-auto">
		            <form  action="<?php $_SERVER['PHP_SELF']."?pid=".$pid;?>" id="submit-deal" method="post" class="needs-validation" novalidate>

		                <div class="form-group row">
		                	<div class="col-sm-6">
		                        <label for="u-price">Unit Amount (Per Deal)</label>
		                        <input type="number" class="form-control" id="u-price" name="u-price" required>
		                        <div class="invalid-feedback">
							      Please Enter Unit Amount
							    </div>
		                    </div>
		                    <div class="col-sm-6">
		                        <label for="e-amount">Market value</label>
		                        <input type="number" class="form-control" id="e-amount" name="e-amount" value="<?php echo $fetch_pro['m_price']; ?>" disabled >
		                    </div>
		                </div>

		                <div class="form-group row">
		                	<p>Choose any method to close the deal for relevante zones by its value or by its time. <b>Note: both option can be choose or any one option time or value</b> </p>
		                </div>
		                <!-- red zone selection method -->
		                <div class="form-group row" >
		                  <label class="col-sm-5 mt-3">RED ZONE (Amount/Time)</label>
		                  <div class="col-sm-4 mt-3">
	                    	<!-- <label for="seeAnotherField">Select any one method for close the deal</label> -->
							<select class="form-control" id="red">
								  <option value="">Select Method</option>
							      <option value="Amount">Amount</option>
							      <option value="Time">Date & Time</option>
							</select>
		                  </div>
		                  <div class="col-sm-3 mt-3" id="redDiv1">
		                    <input type="number" class="form-control w-100"  id="red-amount"  name="r-z-a" placeholder="Amount">
		                    <div class="invalid-feedback">
						      Please Enter Amount
						    </div>
		                  </div>
		                  <div class="col-sm-3 mt-3" id="redDiv3">
		                  	<input type="datetime-local" class="p-1 w-100" id="red-date"  name="birthdaytime"  min="<?php echo $exp_date[0]."T".$exp_date[1]; ?>">
		                  	<div class="invalid-feedback">
						      Please select date and time
						    </div>
		                  </div>
		                </div>
		                <!-- orange zone selection method -->
		                <div class="form-group row" >
		                  <label class="col-sm-5 mt-3">ORANGE ZONE (Amount/Percentage/Time)</label>
		                  <div class="col-sm-4 mt-3">
	                    	<!-- <label for="seeAnotherField">Select any one method for close the deal</label> -->
							<select class="form-control" id="orange">
								  <option value="">Select Method</option>
							      <option value="Amount">Amount</option>
							      <option value="Percentage">Persentage</option>
							      <option value="Time">Date & Time</option>
							</select>
		                  </div>
		                  <div class="col-sm-3 mt-3" id="orangeDiv1">
		                    <input type="number" class="form-control w-100"  id="orange-amount"  name="r-z-a" placeholder="Amount">
		                    <div class="invalid-feedback">
						      Please Enter Amount
						    </div>
		                  </div>
		                  <div class="col-sm-3 mt-3" id="orangeDiv2">
		                    <input type="number" class="form-control w-100 " id="orange-percentage" name="r-z-p" placeholder="Percentage%">
		                    <div class="invalid-feedback">
						      Please Enter Percentage value %
						    </div>
		                  </div>
		                  <div class="col-sm-3 mt-3" id="orangeDiv3">
		                  	<input type="datetime-local" class="p-1 w-100" id="orange-date"  name="birthdaytime"  min="<?php echo $exp_date[0]."T".$exp_date[1]; ?>">
		                  	<div class="invalid-feedback">
						      Please select date and time
						    </div>
		                  </div>
		                </div>

		                <!-- green zone selection method -->
		                <div class="form-group row" >
		                  <label class="col-sm-5 mt-3">GREEN ZONE (Amount/Percentage/Time)</label>
		                  <div class="col-sm-4 mt-3">
	                    	<!-- <label for="seeAnotherField">Select any one method for close the deal</label> -->
							<select class="form-control" id="green">
								  <option value="">Select Method</option>
							      <option value="Amount">Amount</option>
							      <option value="Percentage">Persentage</option>
							      <option value="Time">Date & Time</option>
							</select>
		                  </div>
		                  <div class="col-sm-3 mt-3" id="greenDiv1">
		                    <input type="number" class="form-control w-100"  id="green-amount"  name="r-z-a" placeholder="Amount">
		                    <div class="invalid-feedback">
						      Please Enter Amount
						    </div>
		                  </div>
		                  <div class="col-sm-3 mt-3" id="greenDiv2">
		                    <input type="number" class="form-control w-100 " id="green-percentage" name="r-z-p" placeholder="Percentage%">
		                    <div class="invalid-feedback">
						      Please Enter Percentage value %
						    </div>
		                  </div>
		                  <div class="col-sm-3 mt-3" id="greenDiv3">
		                  	<input type="datetime-local" class="p-1 w-100" id="green-date"  name="birthdaytime"  min="<?php echo $exp_date[0]."T".$exp_date[1]; ?>">
		                  	<div class="invalid-feedback">
						      Please select date and time
						    </div>
		                  </div>
		                </div>



		                <button type="submit" class="btn btn-primary px-4 w-100" id="confirm-deal" >Confirm Deal Proceed</button>

		            </form>
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

// form validation for all fileds    	
	(function () {
	  'use strict'

	  // Fetch all the forms we want to apply custom Bootstrap validation styles to
	  var forms = document.querySelectorAll('.needs-validation')

	  // Loop over them and prevent submission
	  Array.prototype.slice.call(forms)
	    .forEach(function (form) {
	      form.addEventListener('submit', function (event) {
	        if (!form.checkValidity()) {
	          event.preventDefault()
	          event.stopPropagation()
	        }

	        form.classList.add('was-validated')
	      }, false)
	    })
	})()

// red zone function for selction option
	$("#red").change(function() {
	  	if($(this).val() == "Amount"){
		    $('#redDiv1').show();
		    $('#red-amount').attr('required', '');
		    $('#red-amount').attr('data-error', 'This field is required.');

		}else{
		    $('#redDiv1').hide();
		    $('#red-amount').removeAttr('required');
		    $('#red-amount').removeAttr('data-error');
	  	}
		if($(this).val() == "Time"){
			$('#redDiv3').show();
		    $('#red-date').attr('required', '');
		    $('#red-date').attr('data-error', 'This field is required.');

		}else{
			$('#redDiv3').hide();
			$('#red-date').removeAttr('required');
			$('#red-date').removeAttr('data-error');
		}
	});
	$("#red").trigger("change");

// orange zone function for selction option
$("#orange").change(function() {
  	if($(this).val() == "Amount"){
	    $('#orangeDiv1').show();
	    $('#orange-amount').attr('required', '');
	    $('#orange-amount').attr('data-error', 'This field is required.');

	}else{
	    $('#orangeDiv1').hide();
	    $('#orange-amount').removeAttr('required');
	    $('#orange-amount').removeAttr('data-error');
  	}
  	if($(this).val() == "Percentage"){
    	$('#orangeDiv2').show();
	    $('#orange-percentage').attr('required', '');
	    $('#orange-percentage').attr('data-error', 'This field is required.');

	}else{
		$('#orangeDiv2').hide();
	    $('#orange-percentage').removeAttr('required');
	    $('#orange-percentage').removeAttr('data-error');
	}
	if($(this).val() == "Time"){
		$('#orangeDiv3').show();
	    $('#orange-date').attr('required', '');
	    $('#orange-date').attr('data-error', 'This field is required.');

	}else{
		$('#orangeDiv3').hide();
		$('#orange-date').removeAttr('required');
		$('#orange-date').removeAttr('data-error');
	}
});
$("#orange").trigger("change");

// green zone function for selction option
$("#green").change(function() {
  	if($(this).val() == "Amount"){
	    $('#greenDiv1').show();
	    $('#green-amount').attr('required', '');
	    $('#green-amount').attr('data-error', 'This field is required.');

	}else{
	    $('#greenDiv1').hide();
	    $('#green-amount').removeAttr('required');
	    $('#green-amount').removeAttr('data-error');
  	}
  	if($(this).val() == "Percentage"){
    	$('#greenDiv2').show();
	    $('#green-percentage').attr('required', '');
	    $('#green-percentage').attr('data-error', 'This field is required.');

	}else{
		$('#greenDiv2').hide();
	    $('#green-percentage').removeAttr('required');
	    $('#green-percentage').removeAttr('data-error');
	}
	if($(this).val() == "Time"){
		$('#greenDiv3').show();
	    $('#green-date').attr('required', '');
	    $('#green-date').attr('data-error', 'This field is required.');

	}else{
		$('#greenDiv3').hide();
		$('#red-date').removeAttr('required');
		$('#red-date').removeAttr('data-error');
	}
});
$("#green").trigger("change");


$(document).ready(function(){

	
//submit form 
	$("#confirm-deal").on("click",function(e){
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
