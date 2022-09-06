
<?php
ob_start();
include "includes/header.php";
if($_SESSION['u_email'] == false){
  header('Location: login.php');

}
?>

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

});
</script>