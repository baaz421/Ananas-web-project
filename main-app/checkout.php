
<?php 
ob_start();
include "includes/header.php";

if(isset($_SESSION['checkout_id'])){
	$checkout_id = $_SESSION['checkout_id'];
	@$u_id = $_SESSION['u_id'];

}else{
	$checkout_id = "";
	@$u_id = "";
	unset($_SESSION["checkout_id"]);
	header("location: login.php");
}

?>
<style type="text/css">
	.backlayer{
		position: fixed;
		top: 0;
		left: 0;
		z-index: 1000;
		width: 100%;
		height: 100%;
		background-color: black;
		filter: alpha(opacity=80);
		opacity: 0.8;

	}
.loader {
  margin: 300px 50%;
  width: 48px;
  height: 48px;
  border: 3px solid #FFF;
  border-radius: 50%;
  display: inline-block;
  position: relative;
  box-sizing: border-box;
  animation: rotation 1s linear infinite;
} 
.loader::after {
  content: '';  
  box-sizing: border-box;
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
  width: 56px;
  height: 56px;
  border-radius: 50%;
  border: 3px solid transparent;
  border-bottom-color: #FF3D00;
}

@keyframes rotation {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
} 
</style>

<main class="main">
	<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
		<div class="container">
			<h1 class="page-title"><?php echo $english['participate']; ?><span>Review</span></h1>
		</div><!-- End .container -->
	</div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../index.php"><?php echo $english['home']; ?></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $english['participate']; ?></li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav --> 

    <div class="page-content">
    	<div class="checkout">
            <div class="container">
            	<div class="row justify-content-center">
            		<aside class="col-lg-3">
            			<div class="summary">
            				<h3 class="summary-title text-uppercase">Your Ananas Wallet </h3>
            				<!-- End .summary-title -->

            				<table class="table table-summary w-100">
            					<thead>
            						<tr>
            							<th class="font-italic" >Available Balance</th>
            							<th class="font-weight-bold" ><?php echo current_bal($u_id,$conn); ?></th>
            							<input type="text" value="<?php echo current_bal($u_id,$conn); ?>" id="current-bal" hidden>
            						</tr>
            						
            					</thead>
            					<tbody>
            						<tr>
            							<td>
            								<u><a href="dashboard/add-amount.php">Click here to add more Amount</a></u>
            							</td>
            						</tr>
            					</tbody>
            				</table><!-- End .table table-summary -->
            			</div><!-- End .summary -->
            		</aside><!-- End .col-lg-3 -->
            		<aside class="col-lg-6">
            			<div class="summary">
            				<h3 class="summary-title">Your Deal Details</h3>
            				<input type="text" value="<?php echo $checkout_id; ?>" id="checkout-id" hidden>
            				<!-- End .summary-title -->

            				<table class="table table-summary w-100" id="load-pro-details">
            					<thead>
            						<tr>
            							<th>Product</th>
            							<th>Price</th>
            							<th>Qty</th>
            							<th>Total</th>
            						</tr>
            					</thead>

            					<tbody>
            						<!-- <div id="load-pro-details"></div> -->
            						<!-- <tr id="load-pro-details"></tr> -->
            						<!-- <tr>
            							<td><a href="#">Beige knitted elastic runner shoes</a></td>
            							<td>1</td>
            							<td>$84.00</td>
            						</tr> -->
            						<!-- </tr> -->
            						<tr class="summary-subtotal">
            							<td>Subtotal:</td>
            							<td>&nbsp</td>
            							<td>&nbsp</td>
            							<td id="sub-total"></td>
            						</tr><!-- End .summary-subtotal -->
            						<!-- <tr id="coupon-show">
            						</tr> -->
                				
            						<tr class="summary-total">
            							<td>Total:</td>
            							<td>&nbsp</td>
            							<td>&nbsp</td>
            							<td id="final-total"></td>
            						</tr><!-- End .summary-total -->
            					</tbody>
            				</table><!-- End .table table-summary -->

            				<button type="submit" class="btn btn-outline-primary-2 btn-order btn-block" id="join-deal">
            					<span class="btn-text" id="test">Join Deal</span>
            					<span class="btn-hover-text">Proceed to Deal</span>
            				</button>
            			</div><!-- End .summary -->
            		</aside><!-- End .col-lg-3 -->
            	</div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .checkout -->
    </div><!-- End .page-content -->
</main><!-- End .main -->
<!-- ERROR MESSAGE DIV-->
  <div id="error-message">
  </div>
  <div id="success-message">
  </div>
<!-- ERROR MESSAGE DIV CLOSE-->
<div class="backlayer" style="display: none;">
	<span class="loader"></span>
</div>



<?php 
include "includes/footer.php";
?>
<script type="text/javascript">
$(document).ready(function(){

// Join Deal Button 
$(document).on("click","#join-deal",function(join){
join.preventDefault();
	var checkout_id = $("#checkout-id").val();
	var user_id = "<?php echo $u_id ?>";
	var current_balance = parseInt($("#current-bal").val());
	var mainTotalAmount = parseInt($("#final-total").text());
	console.log(checkout_id,"---",user_id,"---",current_balance);
	if(mainTotalAmount >= current_balance){
		$("#error-message").html("<div class='myAlert-bottom alert alert-dismissible fade show alert-primary' role='alert mt-1 mb-2 rounded'>Sorry, insufficient wallet balance .<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
	  $("#success-message").slideUp();
	  setTimeout(function(){$("#error-message").fadeOut("slow")}, 4000);
	  console.log(mainTotalAmount);
	}else{
		$.ajax({
	      url : "join-deal-ajax-pages/join-deal-final-stage.php",
	      type : "POST",
	      data :{user_id:user_id,checkout_id:checkout_id},
	      beforeSend: function () {
	      	$(".backlayer").show();
	      },
	      success :function(data){
	      	if(data == 0){
	      		location.replace("deal-success.php");
	      	}else if(data == -2){
	      		$("#error-message").html("<div class='myAlert-bottom alert alert-dismissible fade show alert-danger' role='alert mt-1 mb-2 rounded'>Sorry, insufficient wallet balance.!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
	          $("#success-message").slideUp();
	          // setTimeout(function(){$("#error-message").fadeOut("slow")}, 4000);
	      	}else if(data == -3){
	      		$("#error-message").html("<div class='myAlert-bottom alert alert-dismissible fade show alert-danger' role='alert mt-1 mb-2 rounded'>Sorry, Data Not Updated. Please try again.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
	          $("#success-message").slideUp();
	          // setTimeout(function(){$("#error-message").fadeOut("slow")}, 4000);
	      	}else{
	      		$("#error-message").html("<div class='myAlert-bottom alert alert-dismissible fade show alert-danger' role='alert mt-1 mb-2 rounded'>"+data+"Sorry, Something went wrong or server problem.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
	          $("#success-message").slideUp();
	          // setTimeout(function(){$("#error-message").fadeOut("slow")}, 4000);
	      	}
	      },
	      complete: function () {
					$(".backlayer").hide();
					}
	  	});

	}
});


// load product deatails 
function LoadProductDetails(){
	$.ajax({
		url : "join-deal-ajax-pages/load-cart-review.php",
		success : function(data){
			$("#load-pro-details > tbody").prepend(data);
			SubTotal();
			loadCouponField();
			MainTotalDisplay();
		}		
	})
}
LoadProductDetails();

// load sub total 
function SubTotal(){
	$.ajax({
		url : "all-products-files/load-sub-total-cart.php",
		success: function(data){
			$("#sub-total").text(data+".0");
		}
	});
}


// // load coupon field 
// function loadCouponField(){
// 	$.ajax({
// 		url : "join-deal-ajax-pages/show-coupon-option.php",
// 		success: function(data){
// 			$("#coupon-show").html(data);
// 		}
// 	});
// }


// update coupon percentage
function addPer(percentage,coupon_code){
	var checkout_id = $("#checkout-id").val();
	var coupon_per = percentage;
	var cou_code = coupon_code;
	$.ajax({
      url : "join-deal-ajax-pages/update-for-coupon.php",
      type : "POST",
      data :{c_per:coupon_per,checkout_id:checkout_id,c_code:cou_code},
      success :function(data){
      	$.ajax({
	  		url : "all-products-files/load-sub-total-cart.php",
	  		success: function(total){
	  			
	  			var minus_per = total / 100 * data;
	  			var final_amt = total - minus_per;
	  			$("#final-total").text(final_amt);	
	  			console.log(final_amt);
	  			console.log(data);
	  			  			
	  		}
	  	});
      }
    });	
}

// final total amount dispaly

function MainTotalDisplay(){
	$.ajax({
  		url : "all-products-files/load-sub-total-cart.php",
  		success: function(sub_total){
  			$.ajax({
		  		url : "join-deal-ajax-pages/final-amt.php",
		  		success: function(percentage){
		  			var minus_per = sub_total / 100 * percentage;
		  			var final_amt = sub_total - minus_per;
		  			$("#final-total").text(final_amt);
		  			  			
		  		}
		  	});		
  		}
  	});

}


  // submit coupon code
	$(document).on("click","#submit-coupon",function(cou){
		cou.preventDefault();
		var cou_code = $("#coupon-code").val().trim();
		var show_text_coupon =$("#coupon-text-show");
		if(cou_code != ""){
			$.ajax({
	      url : "join-deal-ajax-pages/check-coupon-code.php",
	      type : "POST",
	      data :{c_code:cou_code},
	      success :function(data){
	        if(data > 0){
	        	console.log(data+"from below");
	        	addPer(data,cou_code);
	        	setTimeout(function(){loadCouponField()}, 1000);
	        	
	        	

	        	// setTimeout(function(){loadCouponField().fadeIn("slow")}, 1000);
	        	// loadCouponField(); 	
	        	
	          $("#success-message").html("<div class='myAlert-bottom alert alert-dismissible fade show alert-success mt-1 mb-2 rounded' role='alert'>successfully Applied Coupon code.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
	          $("#error-message").slideUp();
	          setTimeout(function(){$("#success-message").fadeOut("slow")}, 4000);
	        }else if(data == -1){
	        $("#error-message").html("<div class='myAlert-bottom alert alert-dismissible fade show alert-danger' role='alert mt-1 mb-2 rounded'>sorry this code is Expied.!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
	          $("#success-message").slideUp();
	          setTimeout(function(){$("#error-message").fadeOut("slow")}, 4000);
	        }else if(data == -2){
	        $("#error-message").html("<div class='myAlert-bottom alert alert-dismissible fade show alert-danger' role='alert mt-1 mb-2 rounded'>Sorry this coupon code Disabled.!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
	          $("#success-message").slideUp();
	          setTimeout(function(){$("#error-message").fadeOut("slow")}, 4000);
	        }else{
	        	$("#error-message").html("<div class='myAlert-bottom alert alert-dismissible fade show alert-danger' role='alert mt-1 mb-2 rounded'>Sorry this coupon code not matched or Wrong please try again.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
	          $("#success-message").slideUp();
	          setTimeout(function(){$("#error-message").fadeOut("slow")}, 4000);
	        }
	      }
	    });			
		}else{
			$("#error-message").html("<div class='myAlert-bottom alert alert-dismissible fade show alert-primary' role='alert mt-1 mb-2 rounded'>Please Enter Coupon Code.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
	  $("#success-message").slideUp();
	  setTimeout(function(){$("#error-message").fadeOut("slow")}, 4000);
		}
		
	});

});
</script>