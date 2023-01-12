
<?php 
include "includes/header.php";
// include "all-products-files/load-products.php"
if(isset($_SESSION['u_id'])){
    $user_id = $_SESSION['u_id'];
}else{
    $user_id = "";
}

?>


<main class="main">
<input type="text" id="u-id" value="<?php echo $user_id; ?>" hidden>
	<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
		<div class="container-fluid">
			<h1 class="page-title"><?php echo $english['products']; ?></h1>
		</div><!-- End .container-fluid -->
	</div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
        <div class="container-fluid">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../index.php"><?php echo $english['home']; ?></a></li>
                <li class="breadcrumb-item"><a href="#"><?php echo $english['products']; ?></a></li>
            </ol>
        </div><!-- End .container-fluid -->
    </nav><!-- End .breadcrumb-nav -->
    
    <div class="page-content">
        <div class="container-fluid">
			<div class="toolbox">
				<div class="toolbox-left">
                    <a href="#" class="sidebar-toggler"><i class="icon-bars"></i>Filters</a>
				</div><!-- End .toolbox-left -->

                <div class="toolbox-center">
                    <div class="toolbox-info">
                        Showing <span><?php echo TotalProducts($conn); ?></span> Products
                    </div><!-- End .toolbox-info -->
                </div><!-- End .toolbox-center -->

				<div class="toolbox-right">
					<div class="toolbox-sort">
						<label for="sortby">Sort by:</label>
						<div class="select-custom">
							<select name="sortby" id="sortby" class="form-control">
								<option value="popularity" selected="selected">Most Popular</option>
								<option value="rating">Most Rated</option>
								<option value="date">Date</option>
							</select>
						</div>
					</div><!-- End .toolbox-sort -->
				</div><!-- End .toolbox-right -->
			</div><!-- End .toolbox -->

            <div class="products">
                <div class="row" id="all-products-load">
                    <!-- ====== products load in this div =========== -->
                </div><!-- End .row -->

                    <div class="load-more-container text-center" id="load_data_message" >
                        <!--  =============    loding button here ============= -->
                    </div> <!-- End .load-more-container-->
                
                
            </div><!-- End .products -->

            <div class="sidebar-filter-overlay"></div><!-- End .sidebar-filter-overlay -->

            <!-- ============= Filter side menu ================= -->
            <aside class="sidebar-shop sidebar-filter">
                <div class="sidebar-filter-wrapper">

                    <!-- filter header -->
                    <div class="widget widget-clean">
                        <label>Filters</label>
                        <a href="#" class="sidebar-filter-clear">Clean All</a>
                    </div><!-- End .widget -->

                    <!-- categories -->
                    <div class="widget widget-collapsible">
                        <h3 class="widget-title">
                            <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true" aria-controls="widget-1">
                                Category
                            </a>
                        </h3><!-- End .widget-title -->

                        <div class="collapse show" id="widget-1">
                            <div class="widget-body">
                                <div class="filter-items filter-items-count">
                                    <div class="filter-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="cat-1">
                                            <label class="custom-control-label" for="cat-1">Dresses</label>
                                        </div><!-- End .custom-checkbox -->
                                        <span class="item-count">3</span>
                                    </div><!-- End .filter-item -->

                                    <div class="filter-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="cat-2">
                                            <label class="custom-control-label" for="cat-2">T-shirts</label>
                                        </div><!-- End .custom-checkbox -->
                                        <span class="item-count">0</span>
                                    </div><!-- End .filter-item -->

                                    <div class="filter-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="cat-3">
                                            <label class="custom-control-label" for="cat-3">Bags</label>
                                        </div><!-- End .custom-checkbox -->
                                        <span class="item-count">4</span>
                                    </div><!-- End .filter-item -->

                                    <div class="filter-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="cat-4">
                                            <label class="custom-control-label" for="cat-4">Jackets</label>
                                        </div><!-- End .custom-checkbox -->
                                        <span class="item-count">2</span>
                                    </div><!-- End .filter-item -->

                                    <div class="filter-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="cat-5">
                                            <label class="custom-control-label" for="cat-5">Shoes</label>
                                        </div><!-- End .custom-checkbox -->
                                        <span class="item-count">2</span>
                                    </div><!-- End .filter-item -->

                                    <div class="filter-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="cat-6">
                                            <label class="custom-control-label" for="cat-6">Jumpers</label>
                                        </div><!-- End .custom-checkbox -->
                                        <span class="item-count">1</span>
                                    </div><!-- End .filter-item -->

                                    <div class="filter-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="cat-7">
                                            <label class="custom-control-label" for="cat-7">Jeans</label>
                                        </div><!-- End .custom-checkbox -->
                                        <span class="item-count">1</span>
                                    </div><!-- End .filter-item -->

                                    <div class="filter-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="cat-8">
                                            <label class="custom-control-label" for="cat-8">Sportwear</label>
                                        </div><!-- End .custom-checkbox -->
                                        <span class="item-count">0</span>
                                    </div><!-- End .filter-item -->
                                </div><!-- End .filter-items -->
                            </div><!-- End .widget-body -->
                        </div><!-- End .collapse -->
                    </div><!-- End .widget -->

                    <!-- brand  -->
                    <div class="widget widget-collapsible">
                        <h3 class="widget-title">
                            <a data-toggle="collapse" href="#widget-4" role="button" aria-expanded="true" aria-controls="widget-4">
                                Brand
                            </a>
                        </h3><!-- End .widget-title -->

                        <div class="collapse show" id="widget-4">
                            <div class="widget-body">
                                <div class="filter-items">
                                    <div class="filter-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="brand-1">
                                            <label class="custom-control-label" for="brand-1">Next</label>
                                        </div><!-- End .custom-checkbox -->
                                    </div><!-- End .filter-item -->

                                    <div class="filter-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="brand-2">
                                            <label class="custom-control-label" for="brand-2">River Island</label>
                                        </div><!-- End .custom-checkbox -->
                                    </div><!-- End .filter-item -->

                                    <div class="filter-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="brand-3">
                                            <label class="custom-control-label" for="brand-3">Geox</label>
                                        </div><!-- End .custom-checkbox -->
                                    </div><!-- End .filter-item -->

                                    <div class="filter-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="brand-4">
                                            <label class="custom-control-label" for="brand-4">New Balance</label>
                                        </div><!-- End .custom-checkbox -->
                                    </div><!-- End .filter-item -->

                                    <div class="filter-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="brand-5">
                                            <label class="custom-control-label" for="brand-5">UGG</label>
                                        </div><!-- End .custom-checkbox -->
                                    </div><!-- End .filter-item -->

                                    <div class="filter-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="brand-6">
                                            <label class="custom-control-label" for="brand-6">F&F</label>
                                        </div><!-- End .custom-checkbox -->
                                    </div><!-- End .filter-item -->

                                    <div class="filter-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="brand-7">
                                            <label class="custom-control-label" for="brand-7">Nike</label>
                                        </div><!-- End .custom-checkbox -->
                                    </div><!-- End .filter-item -->

                                </div><!-- End .filter-items -->
                            </div><!-- End .widget-body -->
                        </div><!-- End .collapse -->
                    </div><!-- End .widget -->

                    <!-- price range -->
                    <div class="widget widget-collapsible">
                        <h3 class="widget-title">
                            <a data-toggle="collapse" href="#widget-5" role="button" aria-expanded="true" aria-controls="widget-5">
                                Price
                            </a>
                        </h3><!-- End .widget-title -->

                        <div class="collapse show" id="widget-5">
                            <div class="widget-body">
                                <div class="filter-price">
                                    <div class="filter-price-text">
                                        Price Range:
                                        <span id="filter-price-range"></span>
                                    </div><!-- End .filter-price-text -->

                                    <div id="price-slider"></div><!-- End #price-slider -->
                                </div><!-- End .filter-price -->
                            </div><!-- End .widget-body -->
                        </div><!-- End .collapse -->
                    </div><!-- End .widget -->

                </div><!-- End .sidebar-filter-wrapper -->
            </aside><!-- End .sidebar-filter -->
            <!-- ============= Filter side menu end ================= -->

        </div><!-- End .container-fluid -->
    </div><!-- End .page-content -->
</main><!-- End .main -->
<!-- ERROR MESSAGE DIV-->
  <div id="error-message" >
  </div>
  <div id="success-message" >
  </div>
<!-- ERROR MESSAGE DIV CLOSE-->

<?php 
include "includes/footer.php";
?>

<script type="text/javascript">
$(document).ready(function(){
// load all product by ajax call
 var limit = 4;
 var start = 0;
 var action = 'inactive';
 function load_products_data(limit, start){
  $.ajax({
   url:"all-products-files/load-all-products.php",
   method:"POST",
   data:{limit:limit, start:start},
   cache:false,
   success:function(data)
   {
    $('#all-products-load').append(data);
    if(data == false)
    {
     $('#load_data_message').html("<button type='button' class='btn btn-outline-darker btn-load-more' disabled>No more products </button>");
     action = 'active';
    }
    else
    {
     $('#load_data_message').html("<button type='button' class='btn btn-outline-darker btn-load-more' disabled>Loading......  <i class='icon-refresh'></i></button>");
     action = "inactive";
    }
   }
  });
 }

 if(action == 'inactive')
 {
  action = 'active';
  load_products_data(limit, start);
 }
 $(window).scroll(function(){
  if($(window).scrollTop() + $(window).height() > $("#all-products-load").height() && action == 'inactive')
  {
   action = 'active';
   start = start + limit;
   setTimeout(function(){
    load_products_data(limit, start);
   }, 1000);
  }
 });

// Product quickView popup
    function quantityInputsAllPro() {
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
 $(document).on('click','.btn-quickview',function (qu) {
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
                        quantityInputsAllPro();
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

        qu.preventDefault();
    }
});

// load wishlist number count
function loadWishlistNumber(){
    $.ajax({
        url: "all-products-files/wishlist-number-display.php",
        success:function(data){
            $("#wishlist-num").text("("+data+")");
        }
    });
}

// load cart dropdown 
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



// add to Wishlist 
    $(document).on("click","#add-to-Wishlist, #add-to-wishlist-quick",function(wish){
        var button = $(this);
        var p_id = $(this).data("p_id");
        var user_id = $("#u-id").val();
        console.log(p_id +"--"+ user_id);
        if(user_id == ""){
            $("#error-message").html("<div class='myAlert-bottom alert alert-dismissible fade show alert-info mt-1 mb-2 rounded' role='alert'>Please Login to Add to Wishlist. click here <span class='text-uppercase font-weight-bold text-reset text-white'>&nbsp&nbsp&nbsp&nbsp<a href='login.php?continue=<?php echo $actual_link; ?>'>login</a></span><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
            $("#success-message").slideUp();
        }else{
            $.ajax({
                url: "all-products-files/add-to-Wishlist.php",
                method:"POST",
                data:{p_id:p_id, u_id:user_id},
                success:function(data){

                    if(data == 1){
                     $("#success-message").html("<div class='myAlert-bottom alert alert-dismissible fade show alert-success mt-1 mb-2 rounded' role='alert'>successfully added to wishlist.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
                     $("#error-message").slideUp();
                     setTimeout(function(){$("#success-message").fadeOut("slow")}, 4000);
                     button.addClass("isDisabled");
                     loadWishlistNumber();
                     // $(this.hash).css({"color":"currentColor","cursor":"not-allowed","opacity":"0.5","text-decoration":"none"});

                    }else{
                     $("#error-message").html("<div class='myAlert-bottom alert alert-dismissible fade show alert-primary mt-1 mb-2 rounded' role='alert'>it's already added to wishlist .<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
                     $("#success-message").slideUp();
                     setTimeout(function(){$("#error-message").fadeOut("slow")}, 4000);
                     button.addClass("isDisabled");
                    }
                  
                }
            });
        }
      wish.preventDefault();
    });

// add to cart 
    $(document).on("click","#add-to-cart, #add-to-cart-qview",function(cart){
      var button = $(this);
      var p_id = $(this).data("p_id");
      var d_id = $(this).data("d_id");
      var user_id = $("#u-id").val();
      console.log(p_id +"--"+ user_id);
        if(user_id == ""){
            $("#error-message").html("<div class='myAlert-bottom alert alert-dismissible fade show alert-info mt-1 mb-2 rounded' role='alert'>Please Login to Add to Cart. click here <span class='text-uppercase font-weight-bold text-reset text-white'>&nbsp&nbsp&nbsp&nbsp<a href='login.php?continue=<?php echo $actual_link; ?>'>login</a></span><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
            $("#success-message").slideUp();
        }else if($(this).hasClass("isDisabled")){
            $("#error-message").html("<div class='myAlert-bottom alert alert-dismissible fade show alert-primary mt-1 mb-2 rounded' role='alert'>Sorry this is not active deal, Wait till its on deal. <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
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
                     loadCartNumber();
                     loadDropdownCart();
                    }else{
                     $("#error-message").html("<div class='myAlert-bottom alert alert-dismissible fade show alert-primary mt-1 mb-2 rounded' role='alert'>"+data+"it's already added to Cart .<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
                     $("#success-message").slideUp();
                     // setTimeout(function(){$("#error-message").fadeOut("slow")}, 4000);
                     button.addClass("isDisabled");
                    }
                  
                }
            });
        }

      cart.preventDefault();
    });

 
});
</script>
