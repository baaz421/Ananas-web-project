
<?php
ob_start();
include "includes/header.php";
if($_SESSION['u_email'] == false){
  header('Location: login.php');
}
if(isset($_SESSION['u_id'])){
    $user_id = $_SESSION['u_id'];
}else{
    $user_id = "";
}
?>
<input type="text" id="u-id" value="<?php echo $user_id; ?>" hidden>
<main class="main">
	<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
		<div class="container">
			<h1 class="page-title"><?php echo $english['wishlist']; ?></h1>
		</div><!-- End .container -->
	</div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php"><?php echo $english['home']; ?></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $english['wishlist']; ?></li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->
    <!-- ERROR MESSAGE DIV-->
      <div id="error-message">
      </div>
      <div id="success-message">
      </div>
    <!-- ERROR MESSAGE DIV CLOSE-->
    <div class="page-content">
    	<div class="container">
			<table class="table table-wishlist table-mobile">
				<thead>
					<tr>
						<th>Product</th>
						<th>Product Status</th>
						<th></th>
						<th></th>
					</tr>
				</thead>

				<tbody id="load-wishlist">
					
				</tbody>
			</table><!-- End .table table-wishlist -->
        	<div class="wishlist-share">
        		<div class="social-icons social-icons-sm mb-2">
        			<label class="social-label">Share on:</label>
					<a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
					<a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
					<a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
					<a href="#" class="social-icon" title="Youtube" target="_blank"><i class="icon-youtube"></i></a>
					<a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
				</div><!-- End .soial-icons -->
        	</div><!-- End .wishlist-share -->
    	</div><!-- End .container -->
    </div><!-- End .page-content -->
</main><!-- End .main -->


<?php 
include "includes/footer.php";
?>
<script type="text/javascript">
$(document).ready(function(){

// load function for wishlist table
	function loadWishlistTable(){
		$.ajax({
			url: "all-products-files/wishlist-page.php",
			success: function(data){
				$("#load-wishlist").html(data);
			}
		});
	}
	// call function for wishlist table
  loadWishlistTable();

// load wishlist number count
  	function loadWishlistNumber(){
    	$.ajax({
        	url: "all-products-files/wishlist-number-display.php",
        	success:function(data){
            	$("#wishlist-num").text("("+data+")");
        	}
    	});
	}

// remove from wishlist
$(document).on("click", "#remove-wishlist", function(){
	var w_id = $(this).data("w_id");
	var element = this;
	$.ajax({
      url : "all-products-files/wishlist-delete.php",
      type : "POST",
      data :{w_id : w_id},
      success :function(data){
        if(data == 1){
          $(element).closest("tr").fadeOut();
          loadWishlistTable();
          loadWishlistNumber();
          $("#success-message").html("<div class='alert alert-dismissible fade show alert-success' role='alert'>successfully removed from wishlist.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
                 $("#error-message").slideUp();
          setTimeout(function(){$("#success-message").fadeOut("slow")}, 4000);
        }else{
        $("#error-message").html("<div class='alert alert-dismissible fade show alert-danger' role='alert'>Can't remove record....!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
          $("#success-message").slideUp();
          setTimeout(function(){$("#error-message").fadeOut("slow")}, 4000);

        }

      }
     });

});
// load cart number count
function loadCartNumberWish(){
    $.ajax({
        url: "all-products-files/cart-number-display.php",
        success:function(data){
            $("#cart-num").text(data);
        }
    });
}
// Load cart drowdown menu for header
function loadDropdownCartWish(){
     $.ajax({
        url: "all-products-files/dropdown-cart-show.php",
        success:function(data){
            $("#show-dropdown-cart").html(data);
        }
    });
}

// add to cart from whishlish 
    $(document).on("click","#add-cart-wish",function(cart){
      var button = $(this);
      var p_id = $(this).data("p_id");
      var d_id = $(this).data("deal_id");
      var user_id = $("#u-id").val();
      console.log(p_id +"--"+ user_id+"--"+d_id);
        if(user_id == ""){
            $("#error-message").html("<div class='myAlert-bottom alert alert-dismissible fade show alert-info mt-1 mb-2 rounded' role='alert'>Please Login to Add to Cart. click here <span class='text-uppercase font-weight-bold text-reset text-white'>&nbsp&nbsp&nbsp&nbsp<a href='login.php?continue=<?php echo $actual_link; ?>'>login</a></span><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
            $("#success-message").slideUp();
        }else{
            $.ajax({
                url: "all-products-files/add-to-Cart.php",
                method:"POST",
                data:{p_id:p_id, d_id:d_id, u_id:user_id},
                success:function(data){
                    if(data == 1){
                     $("#success-message").html("<div class='myAlert-bottom alert alert-dismissible fade show alert-success mt-1 mb-2 rounded' role='alert'>successfully added to Cart.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
                     $("#error-message").slideUp();
                     setTimeout(function(){$("#success-message").fadeOut("slow")}, 4000);
                     button.addClass("isDisabled");
                     loadCartNumberWish();
                     loadDropdownCartWish();
                    }else{
                     $("#error-message").html("<div class='myAlert-bottom alert alert-dismissible fade show alert-primary mt-1 mb-2 rounded' role='alert'>it's already added to Cart .<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
                     $("#success-message").slideUp();
                     setTimeout(function(){$("#error-message").fadeOut("slow")}, 4000);
                     button.addClass("isDisabled");
                    }
                  
                }
            });
        }

      cart.preventDefault();
    });


});
</script>