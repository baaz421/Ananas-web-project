<?php 
$actual_link_footer = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
 ?>
    <!-- =========================footer starts here======================-->
        <footer class="footer">
        	<div class="footer-middle border-0">
	            <div class="container">
	            	<div class="row">
	            		<div class="col-sm-6 col-lg-3">
	            			<div class="widget widget-about">
	            				<img src="assets/images/logo.png" class="footer-logo" alt="Footer Logo" width="170" height="40">
	            				<p><?php echo $english['footer_des']; ?></p>

	            				<div class="social-icons">
                                    <a href="#" class="social-icon" target="_blank" title="Facebook"><i class="icon-facebook-f"></i></a>
                                    <a href="#" class="social-icon" target="_blank" title="Twitter"><i class="icon-twitter"></i></a>
                                    <a href="#" class="social-icon" target="_blank" title="Instagram"><i class="icon-instagram"></i></a>
                                    <a href="#" class="social-icon" target="_blank" title="Youtube"><i class="icon-youtube"></i></a>
                                    <a href="#" class="social-icon" target="_blank" title="Pinterest"><i class="icon-pinterest"></i></a>
                                </div><!-- End .soial-icons -->
	            			</div><!-- End .widget about-widget -->
	            		</div><!-- End .col-sm-6 col-lg-3 -->

	            		<div class="col-sm-6 col-lg-3">
	            			<div class="widget">
	            				<h4 class="widget-title"><?php echo $english['useful_links']; ?></h4><!-- End .widget-title -->

	            				<ul class="widget-list">
	            					<li><a href="about.php"><?php echo $english['about']; ?></a></li>
                                    <li><a href="services.php"><?php echo $english['services']; ?></a></li>
                                    <li><a href="faq.php"><?php echo $english['faq']; ?></a></li>
                                    <li><a href="contact.php"><?php echo $english['contact']; ?></a></li>
                                    <li><a href="login.php"><?php echo $english['login']; ?></a></li>
	            				</ul><!-- End .widget-list -->
	            			</div><!-- End .widget -->
	            		</div><!-- End .col-sm-6 col-lg-3 -->

	            		<div class="col-sm-6 col-lg-3">
	            			<div class="widget">
	            				<h4 class="widget-title"><?php echo $english['customer_service']; ?></h4><!-- End .widget-title -->

	            				<ul class="widget-list">
	            					<li><a href="#"><?php echo $english['payment_method']; ?></a></li>
	            					<li><a href="#"><?php echo $english['shipping']; ?></a></li>
	            					<li><a href="#"><?php echo $english['terms_conditions']; ?></a></li>
	            					<li><a href="#"><?php echo $english['privacy_policy']; ?></a></li>
	            				</ul><!-- End .widget-list -->
	            			</div><!-- End .widget -->
	            		</div><!-- End .col-sm-6 col-lg-3 -->

	            		<div class="col-sm-6 col-lg-3">
	            			<div class="widget">
	            				<h4 class="widget-title"><?php echo $english['my_accout']; ?></h4><!-- End .widget-title -->

	            				<ul class="widget-list">
	            					<li><a href="login.php?continue=<?php echo $actual_link; ?>" data-toggle="modal"><?php echo $english['login']; ?></a></li>
	            					<li><a href="cart.php"><?php echo $english['view_holds']; ?></a></li>
	            					<li><a href="wishlist.php"><?php echo $english['wishlist']; ?></a></li>
	            					<li><a href="dashboard"><?php echo $english['my_accout']; ?></a></li>
	            					<li><a href="contact.php"><?php echo $english['contact']; ?></a></li>
	            				</ul><!-- End .widget-list -->
	            			</div><!-- End .widget -->
	            		</div><!-- End .col-sm-6 col-lg-3 -->
	            	</div><!-- End .row -->
	            </div><!-- End .container -->
	        </div><!-- End .footer-middle -->

	        <div class="footer-bottom">
	        	<div class="container">
	        		<p class="footer-copyright"><?php echo $english['copyrights']; ?></p><!-- End .footer-copyright -->
	        		<figure class="footer-payments">
	        			<img src="assets/images/payments.png" alt="Payment methods" width="272" height="20">
	        		</figure><!-- End .footer-payments -->
	        	</div><!-- End .container -->
	        </div><!-- End .footer-bottom -->
        </footer><!-- End .footer -->
    <!-- =========================footer close here======================-->
    </div><!-- End .page-wrapper -->
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

<!-- =========================mobile view starts here======================-->
    <!-- Mobile Menu -->
    <?php
        include 'mobileview.php';
    ?>
<!-- =========================mobile view close here======================-->


  

    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js"></script>
    
    <!-- Plugins JS File -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.hoverIntent.min.js"></script>
    <script src="assets/js/jquery.waypoints.min.js"></script>
    <script src="assets/js/superfish.min.js"></script>    
    <script src="assets/js/jquery.plugin.min.js"></script>
    <script src="assets/js/bootstrap-input-spinner.js"></script>
    <script src="assets/js/jquery.elevateZoom.min.js"></script>
    <script src="assets/js/jquery.sticky-kit.min.js"></script>
    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>    
    <script src="assets/js/demos/demo-14.js"></script>

<script type="text/javascript">
$(document).ready(function(){
// Load cart drowdown menu for header
function loadDropdownCartf(){
     $.ajax({
        url: "all-products-files/dropdown-cart-show.php",
        success:function(data){
            $("#show-dropdown-cart").html(data);
        }
    });
}

loadDropdownCartf();

$(document).on("click","#login-cart",function(){
	location.replace("login.php?continue=<?php echo $actual_link_footer; ?>");
});


// load cart number count
function loadCartNumberF(){
    $.ajax({
        url: "all-products-files/cart-number-display.php",
        success:function(data){
            $("#cart-num").text(data);
        }
    });
}
// load function for wishlist table
function loadCartTable(){
	$.ajax({
		url: "all-products-files/cart-page.php",
		success: function(data){
			$("#load-cart-tr").html(data);
		}
	});
}
// load sub total 
  function SubTotal(){
  	$.ajax({
  		url : "all-products-files/load-sub-total-cart.php",
  		success: function(data){
  			$("#sub-total-display").text(data);
  			console.log(data);
  		}
  	});
  }

// remove from cart
$(document).on("click", "#remove-cartlist", function(e){
	var c_id = $(this).data("c_id");
	var element = this;
	$.ajax({
      url : "all-products-files/cart-list-delete.php",
      type : "POST",
      data :{c_id : c_id},
      success :function(data){
        if(data == 1){
          $(element).closest("div").fadeOut();
          loadDropdownCartf();
          loadCartNumberF();
          loadCartTable();
          SubTotal();
          $("#add-to-cart").removeClass("isDisabled");
          $("#success-message").html("<div class='myAlert-bottom alert alert-dismissible fade show alert-success mt-1 mb-2 rounded' role='alert'>successfully removed from Cart List.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
                 $("#error-message").slideUp();
          setTimeout(function(){$("#success-message").fadeOut("slow")}, 4000);
        }else{
        $("#error-message").html("<div class='myAlert-bottom alert alert-dismissible fade show alert-danger mt-1 mb-2 rounded' role='alert'>Sorry Can't remove from cart records....!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
          $("#success-message").slideUp();
          setTimeout(function(){$("#error-message").fadeOut("slow")}, 4000);

        }

      }
     });
e.preventDefault();
});

// on click join deal button from cart dropdown menu
	$(document).on("click","#participate",function(participate){
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

		participate.preventDefault();
	});

});
</script>
</body>


<!-- molla/about.html  22 Nov 2019 10:03:54 GMT -->
</html>

