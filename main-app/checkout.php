
<?php 
ob_start();
include "includes/header.php";

if(isset($_SESSION['checkout_id'])){
	$checkout_id = $_SESSION['checkout_id'];
	@$u_id = $_SESSION['u_id'];

}else{
	$checkout_id = "";
	@$u_id = "";
	header("location: login.php");
}


function combineDeal($conn,$user_id){
	$get_Cartlist = "SELECT * FROM cart WHERE user_id = '{$user_id}'";
	$run_get_Cartlist = mysqli_query($conn, $get_Cartlist);
	if(mysqli_num_rows($run_get_Cartlist) > 0){
	  $deal_ids = array();
	  while($row = mysqli_fetch_assoc($run_get_Cartlist)){			
			$ids_deal = $row['deal_id'];
			$deal_ids[]= $ids_deal;					
			}
		}
		$im_arr = implode("-",$deal_ids);
		return $im_arr;
}

function combineQty($conn,$user_id){
	$get_Cartlist = "SELECT * FROM cart WHERE user_id = '{$user_id}'";
	$run_get_Cartlist = mysqli_query($conn, $get_Cartlist);
	if(mysqli_num_rows($run_get_Cartlist) > 0){
	  $pro_qtys = array();
	  while($row = mysqli_fetch_assoc($run_get_Cartlist)){
			$c_qty 	= $row['qty'];
			$pro_qtys[]= $c_qty;			
			}
		}
		$im_arr = implode("-",$pro_qtys);
		return $im_arr;
}

function SubTotal($conn,$user_id){
	$cart_sub_total = "SELECT * FROM cart WHERE user_id = '{$user_id}'";
    $run_cart_sub_total = mysqli_query($conn, $cart_sub_total);
        if(mysqli_num_rows($run_cart_sub_total) > 0){
        	$sub_total = 0;
            while($row = mysqli_fetch_assoc($run_cart_sub_total)){
            	$qty = $row['qty'];
            	$amount = $row['unit_price'];
            	$sub_total = $sub_total + ($qty * $amount);
            } 
            $sub_total;  
        }else{
            $sub_total = 0;
        }
    return $sub_total;
}

if(isset($_SESSION['u_id'])){
	$user_id = $_SESSION['u_id'];
	$status  = 0;
	$coupon_per = 0;
	$check_row = "SELECT * FROM checkout WHERE user_id = {$user_id} AND status = {$status}";
	$run_check_row = mysqli_query($conn, $check_row);

	if(mysqli_num_rows($run_check_row) > 0){
		$fetch_order_id 	= mysqli_fetch_assoc($run_check_row);
		$checkout_id 		= $fetch_order_id['ID'];
		$cou_per 			= $fetch_order_id['coupon_per'];		
		$deal_ids 			= combineDeal($conn,$user_id);
		$deal_qtys 			= combineQty($conn,$user_id);
		$sub_total 			= SubTotal($conn,$user_id);
		if($cou_per == 0){
			$total 	= $sub_total;
		}else{
			$discount_amount 	= $sub_total / 100 * $cou_per;
			$total 				= $sub_total-$discount_amount;
		}
		$update_checkout = "UPDATE checkout SET 
		deal_ids 	= '{$deal_ids}', 
		deal_qtys 	= '{$deal_qtys}',
		sub_total 	= '{$sub_total}',
		total 		= '{$total}'
		WHERE ID = $checkout_id";
		mysqli_query($conn,$update_checkout);
		$_SESSION['checkout_id'] = $checkout_id ;
	}else{
		$deal_ids 			= combineDeal($conn,$user_id);
		$deal_qtys 			= combineQty($conn,$user_id);
		$sub_total 			= SubTotal($conn,$user_id);

		$create_row_checkout = "INSERT INTO checkout(user_id, deal_ids, deal_qtys, coupon_per, sub_total, total, status) VALUES('{$user_id}','{$deal_ids}','{$deal_qtys}','{$coupon_per}','{$sub_total}','{$sub_total}','{$status}')";
		$run_create_row_checkout = mysqli_query($conn, $create_row_checkout);
		if($run_create_row_checkout){
			$last_id_get = mysqli_insert_id($conn);
			$_SESSION['checkout_id'] = $last_id_get;
		}
	}
}



?>

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
            							<th class="font-weight-bold" ><?php echo current_bal($u_id,$conn); ?>.0</th>
            							<input type="text" value="<?php echo current_bal($u_id,$conn); ?>" id="current-bal" hidden>
            						</tr>
            					</thead>
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
            						<tr id="coupon-show">
            						</tr>
                				
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
	      success :function(data){
	      	if(data == 0){
	      		location.replace("deal-success.php");
	      	}else if(data == -2){
	      		$("#error-message").html("<div class='myAlert-bottom alert alert-dismissible fade show alert-danger' role='alert mt-1 mb-2 rounded'>Sorry, insufficient wallet balance.!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
	          $("#success-message").slideUp();
	          setTimeout(function(){$("#error-message").fadeOut("slow")}, 4000);
	      	}else if(data == -3){
	      		$("#error-message").html("<div class='myAlert-bottom alert alert-dismissible fade show alert-danger' role='alert mt-1 mb-2 rounded'>Sorry, Data Not Updated. Please try again.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
	          $("#success-message").slideUp();
	          setTimeout(function(){$("#error-message").fadeOut("slow")}, 4000);
	      	}else{
	      		$("#error-message").html("<div class='myAlert-bottom alert alert-dismissible fade show alert-danger' role='alert mt-1 mb-2 rounded'>"+data+"Sorry, Something went wrong or server problem.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
	          $("#success-message").slideUp();
	          setTimeout(function(){$("#error-message").fadeOut("slow")}, 4000);
	      	}
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


// load coupon field 
function loadCouponField(){
	$.ajax({
		url : "join-deal-ajax-pages/show-coupon-option.php",
		success: function(data){
			$("#coupon-show").html(data);
		}
	});
}


// update coupon percentage
function addPer(percentage){
	var checkout_id = $("#checkout-id").val();
	var coupon_per = percentage;
	$.ajax({
      url : "join-deal-ajax-pages/update-for-coupon.php",
      type : "POST",
      data :{c_per:coupon_per,checkout_id:checkout_id},
      success :function(data){

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
		
		var cou_code = $("#coupon-code").val().trim();
		var show_text_coupon =$("#coupon-text-show");
		if(cou_code != ""){
			$.ajax({
	      url : "join-deal-ajax-pages/check-coupon-code.php",
	      type : "POST",
	      data :{c_code:cou_code},
	      success :function(data){
	        if(data > 0){
	        	addPer(data);
	        		$.ajax({
					  		url : "all-products-files/load-sub-total-cart.php",
					  		success: function(total){
					  			
					  			var minus_per = total / 100 * data;
					  			var final_amt = total - minus_per;
					  			$("#final-total").text(final_amt);			  			
					  		}
					  	});      	
	        		loadCouponField();
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
		cou.preventDefault();
	});

});
</script>