
<?php 
include "includes/header.php";
require "all-products-files/products-functions.php";
?>
<main class="main">
	<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
    <div class="container">
    	<h1 class="page-title"><?php echo $english['view_holds']; ?><span>Basket</span></h1>
    </div><!-- End .container -->
	</div><!-- End .page-header -->

  <nav aria-label="breadcrumb" class="breadcrumb-nav">
      <div class="container">
     		<ol class="breadcrumb">
         		<li class="breadcrumb-item"><a href="../index.php"><?php echo $english['home']; ?></a></li>
         		<li class="breadcrumb-item active" aria-current="page"><?php echo $english['hold']; ?></li>
     		</ol>
  	</div><!-- End .container -->
  </nav><!-- End .breadcrumb-nav -->

  <div class="page-content">
  	<div class="cart">
    	<div class="container">
        <div class="row">

          <div class="col-lg-9">
            <table class="table table-cart table-mobile">
							<thead>
								<tr>
									<th>Product</th>
									<th>Unit Price</th>
									<th class="text-center">Quantity</th>
									<th>Total</th>
									<th></th>
								</tr>
							</thead>
							<tbody id="load-cart-tr">									
							</tbody>
						</table><!-- End .table table-wishlist -->
          </div><!-- End .col-lg-9 -->

          <aside class="col-lg-3">
          	<div class="summary summary-cart">
          		<h3 class="summary-title">Cart Total</h3><!-- End .summary-title -->

          		<table class="table table-summary">
          			<tbody>
          				<tr class="summary-subtotal">
          					<td>Subtotal:</td>
          					<td id ="sub-total-display"></td>
          				</tr><!-- End .summary-subtotal -->
          			</tbody>
          		</table><!-- End .table table-summary -->

          		<a href="#" class="btn btn-outline-primary-2 btn-order btn-block" id="join" name="join">PROCEED TO JOIN DEAL</a>
          	</div><!-- End .summary -->

        		<a href="productsvall.php" class="btn btn-outline-dark-2 btn-block mb-3" ><span>CONTINUE SHOPPING</span><i class="icon-refresh"></i></a>

          </aside><!-- End .col-lg-3 -->

        </div><!-- End .row -->
    	</div><!-- End .container -->
  	</div><!-- End .cart -->
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
	
	// load cart in dropdown 
    function loadDropdownCart(){
         $.ajax({
            url: "all-products-files/dropdown-cart-show.php",
            success:function(data){
                $("#show-dropdown-cart").html(data);
            }
        });
    }
   // load cart number count
		function loadCartNumber(){
		    $.ajax({
		        url: "all-products-files/cart-number-display.php",
		        success:function(data){
		            $("#cart-num").text(data);
		        }
		    });
		}
	// load function for cart table
		function loadCartTable(){
			$.ajax({
				url: "all-products-files/cart-page.php",
				success: function(data){
					$("#load-cart-tr").html(data);
				}
			});
		}
	// call function for cart table
  	loadCartTable();

  // load sub total 
	  function SubTotal(){
	  	$.ajax({
	  		url : "all-products-files/load-sub-total-cart.php",
	  		success: function(data){
	  			$("#sub-total-display").html(data);
	  		}
	  	});
	  }
  SubTotal();
  
	// quatity  decrement 
  	$(document).on("click",".minus",function(){
			var cart_id = $(this).data("cart_id");
			var $input = $(this).parent().find('input');
			var count = parseInt($input.val()) - 1;
			count = count < 1 ? 1 : count;
			$input.val(count);
			$input.change();
			console.log(count+"---"+cart_id);
			CartQtyUpdate(cart_id,count);
			return false;				
		});
	// quatity increment
  	$(document).on("click",".plus",function(){  
			var cart_id = $(this).data("cart_id");
			var $input = $(this).parent().find('input');
			$input.val(parseInt($input.val()) + 1);
			$input.change();
			var qty = $input.val();
			console.log(qty+"---"+cart_id);
			CartQtyUpdate(cart_id,qty);
			return false;
		});

	// function for update cart quantity 
		function CartQtyUpdate(Cart_ID,Cart_QTY){
			var cart_id = Cart_ID;
			var cart_qty = Cart_QTY;
			$.ajax({
				url 	: "all-products-files/cart-quantity-update.php",
	      type 	: "POST",
	      data 	:{c_id : cart_id, c_qty : cart_qty},
	      success :function(data){
	      	if(data == 1){
	      		loadCartTable();
	      		loadDropdownCart();
	      		SubTotal();
	      	}else{
	      		$("#error-message").html("<div class='myAlert-bottom alert alert-dismissible fade show alert-danger' role='alert mt-1 mb-2 rounded'>Sorry Can't Update Quantity....!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
	          $("#success-message").slideUp();
	          setTimeout(function(){$("#error-message").fadeOut("slow")}, 4000);
	      	}
	      }
			});
		}

  // remove from cart list
		$(document).on("click", "#remove-cart-list", function(rem){
			var c_id = $(this).data("c_id");
			var element = this;
			$.ajax({
		      url : "all-products-files/remove-cartlist.php",
		      type : "POST",
		      data :{c_id : c_id},
		      success :function(data){
		        if(data == 1){
		          $(element).closest("tr").fadeOut();
		          loadCartTable();
		          loadDropdownCart();
		          loadCartNumber();
		          SubTotal();
		          $("#success-message").html("<div class='myAlert-bottom alert alert-dismissible fade show alert-success mt-1 mb-2 rounded' role='alert'>successfully removed from Cart List.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
		                 $("#error-message").slideUp();
		          setTimeout(function(){$("#success-message").fadeOut("slow")}, 4000);
		        }else{
		        $("#error-message").html("<div class='myAlert-bottom alert alert-dismissible fade show alert-danger' role='alert mt-1 mb-2 rounded'>Can't remove record....!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
		          $("#success-message").slideUp();
		          setTimeout(function(){$("#error-message").fadeOut("slow")}, 4000);

		        }

		      }
    	});
			rem.preventDefault();
		});

	// on click join 
		$(document).on("click","#join",function(join){
			var user_status = "<?php echo $user_status; ?>";
			if(user_status == "notverified"){
				$("#error-message").html("<div class='myAlert-bottom alert alert-dismissible fade show alert-primary' role='alert mt-1 mb-2 rounded'>You account not verified, please verify you account. <a href='dashboard/verification.php'> Click Here</a><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
		    $("#success-message").slideUp();
		    setTimeout(function(){$("#error-message").fadeOut("slow")}, 4000);		    
			}else{
				$.ajax({
	  		url : "all-products-files/load-sub-total-cart.php",
	  		success: function(data){
	  			if(data == 0){
	  				$("#error-message").html("<div class='myAlert-bottom alert alert-dismissible fade show alert-primary' role='alert mt-1 mb-2 rounded'>Sorry Cart is Empty.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
				    $("#success-message").slideUp();
				    setTimeout(function(){$("#error-message").fadeOut("slow")}, 4000);
	  			}else{
	  				$.ajax({
							url : "join-deal-ajax-pages/create-checkout.php",
							success : function(data){
								if(data == 1){
									location.replace("checkout.php");
								}else{
									$("#error-message").html("<div class='myAlert-bottom alert alert-dismissible fade show alert-primary' role='alert mt-1 mb-2 rounded'>Oop's Session Timeout, Please Login again...!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
				    				$("#success-message").slideUp();
				   				 	setTimeout(function(){$("#error-message").fadeOut("slow")}, 4000);
								}
							}
						});
	  			}

	  		}
	  	});	
				
			}

			join.preventDefault();
		});


});
</script>