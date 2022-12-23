<?php 
$actual_link_footer = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
 ?>
<!-- ===================================== footer starts here============================== -->

    <footer class="footer">
        <div class="cta cta-horizontal cta-horizontal-box bg-dark bg-image" style="background-image: url('assets/images/demos/demo-14/bg-1.jpg');">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-xl-8 offset-xl-2">
                        <div class="row align-items-center">
                            <div class="col-lg-5 cta-txt">
                                <h3 class="cta-title text-primary"><?php echo $english['join_our_newsletter']; ?></h3><!-- End .cta-title -->
                                <p class="cta-desc text-light"><?php echo $english['join_our_des']; ?></p><!-- End .cta-desc -->
                            </div><!-- End .col-lg-5 -->
                            
                            <div class="col-lg-7">
                                <form action="#">
                                    <div class="input-group">
                                        <input type="email" class="form-control" placeholder="<?php echo $english['enter_your_email']; ?>" aria-label="Email Adress" required>
                                        <div class="input-group-append">
                                            <button class="btn" type="submit"><?php echo $english['subscribe']; ?></button>
                                        </div><!-- .End .input-group-append -->
                                    </div><!-- .End .input-group -->
                                </form>
                            </div><!-- End .col-lg-7 -->
                        </div><!-- End .row -->
                    </div><!-- End .col-xl-8 offset-2 -->
                </div><!-- End .row -->
            </div><!-- End .container-fluid -->
        </div><!-- End .cta -->
        <div class="footer-middle border-0">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 col-lg-4">
                        <div class="widget widget-about">
                            <!-- logo footer -->
                            <img src="assets/images/demos/demo-14/web-logo.png" class="footer-logo" alt="Footer Logo" width="170" height="40">
                            <p><?php echo $english['footer_des']; ?></p>
                            
                            <div class="widget-about-info">
                                <div class="row">
                                    <div class="col-sm-6 col-md-4">
                                        <span class="widget-about-title"><?php echo $english['question']; ?></span>
                                        <a href="tel:123456789"><?php echo $english['tel']; ?></a>
                                    </div><!-- End .col-sm-6 -->
                                    <div class="col-sm-6 col-md-8">
                                        <span class="widget-about-title"><?php echo $english['payment_method']; ?></span>
                                        <figure class="footer-payments">
                                            <img src="assets/images/payments.png" alt="Payment methods" width="272" height="20">
                                        </figure><!-- End .footer-payments -->
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->
                            </div><!-- End .widget-about-info -->
                        </div><!-- End .widget about-widget -->
                    </div><!-- End .col-sm-12 col-lg-4 -->

                    <div class="col-sm-4 col-lg-2">
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
                    </div><!-- End .col-sm-4 col-lg-2 -->

                    <div class="col-sm-4 col-lg-2">
                        <div class="widget">
                            <h4 class="widget-title"><?php echo $english['customer_service']; ?></h4><!-- End .widget-title -->

                            <ul class="widget-list">
                                <li><a href="#"><?php echo $english['payment_method']; ?></a></li>
                                <li><a href="#"><?php echo $english['shipping']; ?></a></li>
                                <li><a href="#"><?php echo $english['terms_conditions']; ?></a></li>
                                <li><a href="#"><?php echo $english['privacy_policy']; ?></a></li>
                            </ul><!-- End .widget-list -->
                        </div><!-- End .widget -->
                    </div><!-- End .col-sm-4 col-lg-2 -->

                    <div class="col-sm-4 col-lg-2">
                        <div class="widget">
                            <h4 class="widget-title"><?php echo $english['my_accout']; ?></h4><!-- End .widget-title -->

                            <ul class="widget-list">
                                <li><a href="login.php?continue=<?php echo $actual_link; ?>"><?php echo $english['login']; ?></a></li>
                                <li><a href="cart.php"><?php echo $english['view_holds']; ?></a></li>
                                <li><a href="wishlist.php"><?php echo $english['wishlist']; ?></a></li>
                                <li><a href="dashboard.php"><?php echo $english['my_accout']; ?></a></li>
                                <li><a href="contact.php"><?php echo $english['contact']; ?></a></li>
                            </ul><!-- End .widget-list -->
                        </div><!-- End .widget -->
                    </div><!-- End .col-sm-4 col-lg-2 -->

                    <div class="col-sm-4 col-lg-2">
                        <div class="widget widget-newsletter">
                            <h4 class="widget-title"><?php echo $english['sign_up_to_newsletter']; ?></h4><!-- End .widget-title -->

                            <p><?php echo $english['newsletter_des']; ?></p>
                            
                            <form action="#">
                                <div class="input-group">
                                    <input type="email" class="form-control" placeholder="<?php echo $english['enter_your_email']; ?>" aria-label="Email Adress" required>
                                    <div class="input-group-append">
                                        <button class="btn btn-dark" type="submit"><i class="icon-long-arrow-right"></i></button>
                                    </div><!-- .End .input-group-append -->
                                </div><!-- .End .input-group -->
                            </form>
                        </div><!-- End .widget -->
                    </div><!-- End .col-sm-4 col-lg-2 -->
                </div><!-- End .row -->
            </div><!-- End .container-fluid -->
        </div><!-- End .footer-middle -->

        <div class="footer-bottom">
            <div class="container-fluid">
                <p class="footer-copyright"><?php echo $english['copyrights']; ?></p><!-- End .footer-copyright -->
                <div class="social-icons social-icons-color">
                    <span class="social-label"><?php echo $english['social_media']; ?></span>
                    <a href="#" class="social-icon social-facebook" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                    <a href="#" class="social-icon social-twitter" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                    <a href="#" class="social-icon social-instagram" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                    <a href="#" class="social-icon social-youtube" title="Youtube" target="_blank"><i class="icon-youtube"></i></a>
                    <a href="#" class="social-icon social-pinterest" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                </div><!-- End .soial-icons -->
            </div><!-- End .container-fluid -->
        </div><!-- End .footer-bottom -->
    </footer><!-- End .footer -->

<!-- ===================================== footer close here============================== -->

</div><!-- End .page-wrapper -->

<button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

<!-- ===================================== mobile view modal starts here============================== -->
<!-- Mobile Menu -->
<?php
        include 'mobileview.php';
?>
<!-- ===================================== mobile view modal close here============================== -->


<!-- Plugins JS File -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/jquery.hoverIntent.min.js"></script>
<script src="assets/js/jquery.waypoints.min.js"></script>
<script src="assets/js/superfish.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/bootstrap-input-spinner.js"></script>
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<script src="assets/js/jquery.plugin.min.js"></script>
<script src="assets/js/jquery.countdown.min.js"></script>


<script src="assets/js/jquery.elevateZoom.min.js"></script>
<!-- Main JS File -->
<script src="assets/js/main.js"></script>

<script src="assets/js/demos/demo-14.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  //   // load Green zone products
  // function load_green_zone_products(){
  //   $.ajax({
  //     url: "home-page-ajax/load-green-zone.php",
  //       success:function(data){
  //           // let load_green_pro = document.getElementById("green-zone-pro").innerHTML;
  //          // load_green_pro.insertAdjacentHTML("afterend", data);
  //          console.log(data);
  //          // load_green_pro.html(data);
  //         $("#green-zone-pro").;
  //         // $("#green-zone-pro").html(data);
  //       }
  //   });
  // }
    // load_green_zone_products();

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

    // load dorpdown cart for home page
    function loadDropdownCartf(){
        $.ajax({
            url: "all-products-files/dropdown-cart-show.php",
            success:function(data){
                $("#show-dropdown-cart").html(data);
            }
        });
    }

    loadDropdownCartf();

    $(document).on("click","#login-cart",function(link){
        location.replace("login.php?continue=<?php echo $actual_link_footer; ?>");
        link.preventDefault();
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

    // remove from cart
    $(document).on("click", "#remove-cartlist", function(re){
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
        re.preventDefault();
    });

    // Product quickView popup
    function owlCarousels($wrap, options) {
      if ( $.fn.owlCarousel ) {
        var owlSettings = {
          items: 1,
          loop: true,
          margin: 0,
          responsiveClass: true,
          nav: true,
          navText: ['<i class="icon-angle-left">', '<i class="icon-angle-right">'],
          dots: true,
          smartSpeed: 400,
          autoplay: false,
          autoplayTimeout: 15000
        };
        if (typeof $wrap == 'undefined') {
            $wrap = $('body');
        }
        if (options) {
            owlSettings = $.extend({}, owlSettings, options);
        }

        // Init all carousel
        $wrap.find('[data-toggle="owl"]').each(function () {
          var $this = $(this),
          newOwlSettings = $.extend({}, owlSettings, $this.data('owl-options'));

          $this.owlCarousel(newOwlSettings);
            
        });   
      }
    }
    $(document).on('click','.q-view',function (q) {
      function quantityInputsInside() {
        if ( $.fn.inputSpinner ) {
          $(".qty").inputSpinner({
              decrementButton: '<i class="icon-minus"></i>',
              incrementButton: '<i class="icon-plus"></i>',
              groupClass: 'input-spinner',
              buttonsClass: 'btn-spinner',
              buttonsWidth: '26px'
          });
        }
      }
      var ajaxUrl = $(this).attr('href');
      if ( $.fn.magnificPopup ) {
        setTimeout(function () {
          $.magnificPopup.open({
            type: 'ajax',
            mainClass: "mfp-ajax-product",
            tLoading: '',
            preloader: false,
            removalDelay: 350,
            items: {
              src: ajaxUrl
              },
            callbacks: {
              ajaxContentAdded: function () {
                owlCarousels($('.quickView-content'), {
                  onTranslate: function(e) {
                    var $this = $(e.target),
                        currentIndex = ($this.data('owl.carousel').current() + e.item.count - Math.ceil(e.item.count / 2)) % e.item.count;
                    $('.quickView-content .carousel-dot').eq(currentIndex).addClass('active').siblings().removeClass('active');
                  }
                });
                quantityInputsInside();
              },
              open: function() {
                $('body').css('overflow-x', 'visible');
                $('.sticky-header.fixed').css('padding-right', '1.7rem');
              },
              close: function() {
                $('body').css('overflow-x', 'hidden');
                $('.sticky-header.fixed').css('padding-right', '0');
              }
            },

            ajax: {
                tError: '',
            }
          }, 0);
        }, 500);

        q.preventDefault();
      }
    });
});
</script>
</body>
</html>