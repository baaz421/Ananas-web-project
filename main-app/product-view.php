
<?php 
ob_start();

include "includes/header.php";
if(isset($_SESSION['u_id'])){
    $user_id = $_SESSION['u_id'];
}else{
    $user_id = "";
}
include "all-products-files/load-singal-product.php";

// enable (or) Disable join button 
if(isset($_SESSION['u_email'])){
    $u_email = $_SESSION['u_email'];
    $u_status = "verified";
    $check_user_verfied = "SELECT vstatus FROM users WHERE email ='{$u_email}' AND vstatus = '{$u_status}'";
    $run_check_user_verfied = mysqli_query($conn,$check_user_verfied);
    if(mysqli_num_rows($run_check_user_verfied) > 0){
        $join_btn_dis = "";
        $join_id_dis = "join-deal-button";
        $u_s = "verified";
    }else{
        $join_btn_dis = "isDisabled";
        $join_id_dis = "dis-join-btn";
        $u_s = "notverified";  
    }
    
}else{
    $join_btn_dis = "isDisabled";
    $join_id_dis = "dis-join-btn";
    $u_s = ""; 
}
// end enable (or) Disable join button 

// enable (or) Disable cart button and progress bar text on top
$check_pro_deal_main_sql = "SELECT * FROM deal WHERE p_id = {$_GET['p_id']}";
$run_check_pro_deal_main = mysqli_query($conn, $check_pro_deal_main_sql);
if(mysqli_num_rows($run_check_pro_deal_main) > 0){
  while($deal_row = mysqli_fetch_assoc($run_check_pro_deal_main)){
    if($deal_row['deal_status'] == 1){
        $get_deal_id        = $deal_row['DID'];
        $get_zone           = $deal_row['zone'];
        $token_amt          = $deal_row['unit_price'];
        $label_main         = "<span class='product-label label-new'>ON DEAL</span>";
        // $p_bar = progressBarHtml();
        $p_bar_main         = zoneProgress($get_deal_id,$conn,$date);
        $main_cart_disable  = $pvc_disable;
        switch($get_zone){
            case 'red':
                $text_bg = "text-white bg-danger pr-1 pl-1 rounded";                
                // $text_bg = "text-danger";
                break;
            case 'orange':
                $text_bg = "text-white bg-primary pr-1 pl-1 rounded";            
                // $text_bg = "text-primary";
                break;
            case 'green':
                // $text_bg = "badge badge-success";
                $text_bg = "text-white bg-success pr-1 pl-1 rounded";
                // $text_bg = "text-success";
                break;
        }
    }else{
        $label_main = "<span class='product-label label-top'>UPCOMING DEAL</span>";
        $p_bar_main = "";
        $main_cart_disable = "isDisabled";
    }
  }
}else{
    $label_main = "<span class='product-label label-top'>UPCOMING DEAL</span>";
    $p_bar_main = "";
    $main_cart_disable = "isDisabled";
}

// ends here enable (or) Disable cart button and progress bar text on top

// get token amount
if(!isset($token_amt)){
    $amount = "Market Price: ".$p_amt;
}else{
    $amount = "Unit Price : ".$token_amt;
}
//end here get token amount 

// display zone message
if (!isset($get_zone)){
    $zone_msg = "";
}else{
    $zone_msg ="<h6 class='text-center'>This Product in <span class='text-uppercase $text_bg'>$get_zone</span> Zone</h6>";
}

?>

<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container d-flex align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../"><?php echo $english['home']; ?></a></li>
                <li class="breadcrumb-item"><a href="productsvall.php"><?php echo $english['products']; ?></a></li>
            </ol>

            <nav class="product-pager ml-auto" aria-label="Product">
                 


                <a class="product-pager-link product-pager-prev <?php echo $p_class_dis; ?>" href="product-view.php?p_id=<?php echo $p_link; ?>" aria-label="Previous" tabindex="-1" id="<?php echo $p_id_dis; ?>">
                    <i class="icon-angle-left"></i>
                    <span>Prev</span>
                </a>

                <a class="product-pager-link product-pager-next <?php echo $n_class_dis; ?>" href="product-view.php?p_id=<?php echo $n_link; ?>" aria-label="Next" tabindex="-1" id="<?php echo $n_id_dis; ?>">
                    <span>Next</span>
                    <i class="icon-angle-right"></i>
                </a>
            </nav><!-- End .pager-nav -->
        </div><!-- End .container -->
        <div class="container">
            <div class="row">
                <div class="col">
                    <?php echo $zone_msg; ?>
                   <?php echo $p_bar_main; ?>  
                </div>                
                        
            </div>           
        </div>
        
    </nav><!-- End .breadcrumb-nav -->
    
    <div class=""></div>
    <div class="page-content">
        <div class="container">
            <div class="product-details-top mb-2">                        
                <div class="row">
                    <div class="col-md-6">
                        <div class="product-gallery product-gallery-vertical">
                            <div class="row">
                                <figure class="product-main-image">
                                    <?php echo $label_main; ?>
                                    <img id="product-zoom" src="<?php echo $p_img_src; ?>" data-zoom-image="<?php echo $p_img_src; ?>" alt="product image">

                                    <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                        <i class="icon-arrows"></i>
                                    </a>
                                </figure><!-- End .product-main-image -->

                                <div id="product-zoom-gallery" class="product-image-gallery">
                                    <!-- == Small vertical left side images code here === -->
                                    <?php
                                       echo check_img_db($p_img_name1,$img_path);
                                       echo check_img_db($p_img_name2,$img_path);
                                       echo check_img_db($p_img_name3,$img_path);
                                       echo check_img_db($p_img_name4,$img_path);
                                     ?>

                                </div><!-- End .product-image-gallery -->
                            </div><!-- End .row -->
                        </div><!-- End .product-gallery -->
                    </div><!-- End .col-md-6 -->

                    <div class="col-md-6">
                        <div class="product-details product-details-centered">
                            <input type="text" id="p-id" value="<?php echo $p_id; ?>" hidden>
                            <input type="text" id="u-id" value="<?php echo $user_id; ?>" hidden>
                            <input type="text" id="deal-id" value="<?php echo $get_deal_id; ?>" hidden>

                            <h1 class="product-title"><?php echo $p_name; ?></h1><!-- End .product-title -->

                            <div class="product-price">
                                <?php echo $amount; ?>
                            </div><!-- End .product-price -->

                            <div class="product-content">
                                <p><?php echo $p_des; ?></p>
                            </div><!-- End .product-content -->
                            
                            <div class="product-details-action">
                                <div class="details-action-col">
                                    <div class="product-details-quantity">
                                        <input type="number" id="qty" class="form-control" value="1" min="1" max="10" step="1" data-decimals="0" required>
                                    </div><!-- End .product-details-quantity -->

                                    <a href="#" class="btn btn-outline-primary-2 <?php echo $join_btn_dis; ?>" id="<?php echo $join_id_dis; ?>" ><span>JOIN DEAL</span></a>
                                </div><!-- End .details-action-col -->

                                <div class="details-action-wrapper">
                                    <a href="#" class="btn btn-outline-primary-2 mr-1 <?php echo $pvw_disable ?>" title="Wishlist" id="add-to-wishlist">
                                        <span>Add to Wishlist</span>
                                    </a>

                                    <a href="#" class="btn btn-outline-primary-2 ml-1 <?php echo $main_cart_disable; ?>" title="Cart" id="add-to-cart" >
                                        <span>Add to Cart</span>
                                    </a>
                                </div><!-- End .details-action-wrapper -->
                            </div><!-- End .product-details-action -->

                            <div class="product-details-footer">
                                <div class="product-cat">
                                    <span>Category:</span>
                                    <a href="#"><?php echo $p_cat ?></a>
                                </div><!-- End .product-cat -->

                                <div class="social-icons social-icons-sm">
                                    <span class="social-label">Share:</span>
                                    <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                    <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                    <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                    <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                                </div>
                            </div><!-- End .product-details-footer -->
                        </div><!-- End .product-details -->
                    </div><!-- End .col-md-6 -->
                </div><!-- End .row -->
            </div><!-- End .product-details-top -->

            <div class="product-details-tab">
                <ul class="nav nav-pills justify-content-center" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab" role="tab" aria-controls="product-desc-tab" aria-selected="true">Description</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="product-info-link" data-toggle="tab" href="#product-info-tab" role="tab" aria-controls="product-info-tab" aria-selected="false">Additional information</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="product-shipping-link" data-toggle="tab" href="#product-shipping-tab" role="tab" aria-controls="product-shipping-tab" aria-selected="false">Shipping & Returns</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel" aria-labelledby="product-desc-link">
                        <div class="product-desc-content">
                            <h3>Product Information</h3>
                            <p><?php echo $p_des; ?>. </p>
                        </div><!-- End .product-desc-content -->
                    </div><!-- .End .tab-pane -->
                    <div class="tab-pane fade" id="product-info-tab" role="tabpanel" aria-labelledby="product-info-link">
                        <div class="product-desc-content">
                            <h3>Information</h3>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. </p>

                            <h3>Fabric & care</h3>
                            <ul>
                                <li>Faux suede fabric</li>
                                <li>Gold tone metal hoop handles.</li>
                                <li>RI branding</li>
                                <li>Snake print trim interior </li>
                                <li>Adjustable cross body strap</li>
                                <li> Height: 31cm; Width: 32cm; Depth: 12cm; Handle Drop: 61cm</li>
                            </ul>

                            <h3>Size</h3>
                            <p>one size</p>
                        </div><!-- End .product-desc-content -->
                    </div><!-- .End .tab-pane -->
                    <div class="tab-pane fade" id="product-shipping-tab" role="tabpanel" aria-labelledby="product-shipping-link">
                        <div class="product-desc-content">
                            <h3>Delivery & returns</h3>
                            <p>We deliver to over 100 countries around the world. For full details of the delivery options we offer, please view our <a href="#">Delivery information</a><br>
                            We hope you’ll love every purchase, but if you ever need to return an item you can do so within a month of receipt. For full details of how to make a return, please view our <a href="#">Returns information</a></p>
                        </div><!-- End .product-desc-content -->
                    </div><!-- .End .tab-pane -->
                </div><!-- End .tab-content -->
            </div><!-- End .product-details-tab -->

            <h2 class="title text-center mb-4">You May Also Like</h2><!-- End .title text-center -->
            <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                data-owl-options='{
                    "nav": false, 
                    "dots": true,
                    "margin": 20,
                    "loop": false,
                    "responsive": {
                        "0": {
                            "items":1
                        },
                        "480": {
                            "items":2
                        },
                        "768": {
                            "items":3
                        },
                        "992": {
                            "items":4
                        },
                        "1200": {
                            "items":4,
                            "nav": true,
                            "dots": false
                        }
                    }
                }' data-load = "below-products">
                <?php
                    $query = "SELECT * FROM products WHERE p_status = '1' ORDER BY RAND() LIMIT 5";
                    $result = mysqli_query($conn, $query);
                    $w_id = 1;
                        while($row = mysqli_fetch_array($result)){
                          
                          $pro_id = $row['ID'];
                          $img_path ="../All-Products-images/";
                          $img_src = $img_path.$row['image_0'];
                          $p_cat = GetCatName($row['category_id'],$conn);
                          $p_name =$row['product_name'];
                          $p_amt =$row['m_price'];

                          $bc_disable = DisableCartButton($user_id,$pro_id,$conn);

                          $check_pro_deal = "SELECT * FROM deal WHERE p_id ='$pro_id'";
                          $run_check_pro_deal = mysqli_query($conn, $check_pro_deal);
                            if(mysqli_num_rows($run_check_pro_deal) > 0){
                              while($deal_check = mysqli_fetch_assoc($run_check_pro_deal)){
                                if($deal_check['deal_status'] == 1){
                                    $deal_id = $deal_check['DID'];
                                    $label = "<span class='product-label label-new'>ON DEAL</span>";
                                    // $p_bar = progressBarHtml();
                                    $p_bar = zoneProgress($deal_id,$conn,$date);
                                    $buttom_cart_disable = $bc_disable;
                                    $unit_price = $deal_check['unit_price'];
                                }else{
                                    $label = "<span class='product-label label-top'>UPCOMING DEAL</span>";
                                    $p_bar = "";
                                    $buttom_cart_disable = "isDisabled";
                                    $deal_id = "";
                                    $unit_price = null;

                                }
                              }
                            }else{
                                $label = "<span class='product-label label-top'>UPCOMING DEAL</span>";
                                $p_bar = "";
                                $buttom_cart_disable = "isDisabled";
                                $deal_id = "";                                
                            }
                ?> 
                <div class="product product-7 text-center">
                    <figure class="product-media">
                        <?php echo $label; ?>
                        <a href="product-view.php?p_id=<?php echo $pro_id; ?>">
                            <img src="<?php echo $img_src; ?>" alt="Product image" class="product-image">
                        </a>

                        <div class="product-action-vertical">
                            <?php $bw_disable = DisableWishlistButton($user_id,$pro_id,$conn) ?>
                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable <?php echo $bw_disable; ?>" id="wishlist-buttom-<?php echo $w_id; ?>" data-pro_id="<?php echo $pro_id; ?>">
                                <span>add to wishlist</span>
                            </a>
                            <a href="quickview.php?p_id=<?php echo $pro_id; ?>" class="btn-product-icon btn-quickview q-view" title="Quick view">
                                <span>Quick view</span>
                            </a>
                        </div><!-- End .product-action-vertical -->

                        <div class="product-action">
                            <?php  ?>
                            <a href="#" class="btn-product btn-cart <?php echo $buttom_cart_disable; ?>" id="cart-buttom-<?php echo $w_id; ?>" data-pro_id="<?php echo $pro_id; ?>" data-deal_id="<?php echo $deal_id; ?>" >
                                <span>add to cart</span>
                            </a>
                        </div><!-- End .product-action -->
                    </figure><!-- End .product-media -->

                    <div class="product-body">
                        <div class="product-cat">
                            <a href="#"><?php echo $p_cat; ?></a>
                        </div><!-- End .product-cat -->
                        <h3 class="product-title"><a href="product-view.php?p_id=<?php echo $pro_id; ?>"><?php echo $p_name; ?></a></h3><!-- End .product-title -->
                        <div class="product-price">
                            <?php
                            if($unit_price != null){
                              $amt = "Unit Price: ".$unit_price;
                            }else{
                              $amt = "Market Price: ".$p_amt; 
                            }
                            echo $amt;
                            ?>
                        </div>
                        <?php echo $p_bar; ?>
                    </div><!-- End .product-body -->
                </div><!-- End .product -->
                    <?php
                        $w_id ++;
                        }
                    ?>
            </div><!-- End .owl-carousel -->
        </div><!-- End .container -->
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

 // disable next and previous button
 $('#dis-n-p').click(function(np) {
    np.preventDefault();
 });

 // disable join button
  $('#dis-join-btn').click(function(j) {
    var u_s = '<?php echo $u_s; ?>';
    //console.log(u_s);
    if(u_s == "notverified" ){
      $("#error-message").html("<div class='myAlert-bottom alert alert-dismissible fade show alert-info mt-1 mb-2 rounded' role='alert'>Please Verify your account to join the deal. click here <span class='text-uppercase font-weight-bold text-reset text-white'>&nbsp&nbsp&nbsp&nbsp<a href='dashboard/verification.php'>Verify</a></span><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
    $("#success-message").slideUp();  
    }else{
     $("#error-message").html("<div class='myAlert-bottom alert alert-dismissible fade show alert-info mt-1 mb-2 rounded' role='alert'>Please Login to join the deal. click here <span class='text-uppercase font-weight-bold text-reset text-white'>&nbsp&nbsp&nbsp&nbsp<a href='login.php?continue=<?php echo $actual_link; ?>'>login</a></span><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
    $("#success-message").slideUp();   
    }
    j.preventDefault();
 });

// load wishlist number count
function loadWishlistNumber(){
    $.ajax({
        url: "all-products-files/wishlist-number-display.php",
        success:function(data){
            $("#wishlist-num").text("("+data+")");
        }
    });
};

// add to wishlist
$("#add-to-wishlist").click(function(w){
    var button = $(this);
    var p_id = $("#p-id").val();
    var user_id = $("#u-id").val();
    AddToWishList(p_id,user_id,button); 
    w.preventDefault();
});

// add to wishlist buttom
$("#wishlist-buttom-1").click(function(wb){
    var button = $(this);
    var p_id_b = $(this).data("pro_id");
    var user_id_b = $("#u-id").val();
    AddToWishList(p_id_b,user_id_b,button); 
    wb.preventDefault();
});
$("#wishlist-buttom-2").click(function(wb){
    var button = $(this);
    var p_id_b = $(this).data("pro_id");
    var user_id_b = $("#u-id").val();
    AddToWishList(p_id_b,user_id_b,button); 
    wb.preventDefault();
});
$("#wishlist-buttom-3").click(function(wb){
    var button = $(this);
    var p_id_b = $(this).data("pro_id");
    var user_id_b = $("#u-id").val();
    AddToWishList(p_id_b,user_id_b,button); 
    wb.preventDefault();
});
$("#wishlist-buttom-4").click(function(wb){
    var button = $(this);
    var p_id_b = $(this).data("pro_id");
    var user_id_b = $("#u-id").val();
    AddToWishList(p_id_b,user_id_b,button); 
    wb.preventDefault();
});
$("#wishlist-buttom-5").click(function(wb){
    var button = $(this);
    var p_id_b = $(this).data("pro_id");
    var user_id_b = $("#u-id").val();
    AddToWishList(p_id_b,user_id_b,button); 
    wb.preventDefault();
});

// add to Wishlist quickview
$(document).on("click","#add-to-wishlist-quick",function(wish){
    var button = $(this);
    var p_id = $(this).data("p_id");
    var user_id = $("#u-id").val();
    AddToWishList(p_id,user_id,button); 
    wish.preventDefault();
});

// function for wishlist 

function AddToWishList(product_id,user_ID,w_button){
    var button = w_button;
    var pro_id = product_id;
    var user_id = user_ID;
    console.log(pro_id +"--"+ user_id);
    if(user_id == ""){
        $("#error-message").html("<div class='myAlert-bottom alert alert-dismissible fade show alert-info mt-1 mb-2 rounded' role='alert'>Please Login to Add to Wishlist. click here <span class='text-uppercase font-weight-bold text-reset text-white'>&nbsp&nbsp&nbsp&nbsp<a href='login.php?continue=<?php echo $actual_link; ?>'>login</a></span><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
        $("#success-message").slideUp();
    }else{
        $.ajax({
            url: "all-products-files/add-to-Wishlist.php",
            method:"POST",
            data:{p_id:pro_id, u_id:user_id},
            success:function(data){

                if(data == 1){
                 $("#success-message").html("<div class='myAlert-bottom alert alert-dismissible fade show alert-success mt-1 mb-2 rounded' role='alert'>successfully added to wishlist.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
                 $("#error-message").slideUp();
                 setTimeout(function(){$("#success-message").fadeOut("slow")}, 4000);
                 loadWishlistNumber();
                 button.addClass("isDisabled");
                }else{
                 $("#error-message").html("<div class='myAlert-bottom alert alert-dismissible fade show alert-primary mt-1 mb-2 rounded' role='alert'>it's already added to wishlist .<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
                 $("#success-message").slideUp();
                 setTimeout(function(){$("#error-message").fadeOut("slow")}, 4000);
                 button.addClass("isDisabled");
                }
              
            }
        });
    }
};

function notActiveDealMsg(){
    $("#error-message").html("<div class='myAlert-bottom alert alert-dismissible fade show alert-primary mt-1 mb-2 rounded' role='alert'>Sorry this is not active deal, Wait till its on deal. <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
    $("#success-message").slideUp();
    setTimeout(function(){$("#error-message").fadeOut("slow")}, 4000);
}
// join deal direct button
$(document).on("click","#join-deal-button",function(jdD){
    // if(this.id == "join-deal-button" ){
        if($("#add-to-cart").hasClass("isDisabled")){
            $(this).addClass("isDisabled");
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
            // setTimeout(function(){location.replace("checkout.php")}, 1000);
            // location.replace("checkout.php");
        }else{
        var button = $(this);
        var p_id = $("#p-id").val();
        var user_id = $("#u-id").val();
        var deal_id = $("#deal-id").val();
        var qty = $("#qty").val();
        $("#add-to-cart").addClass("isDisabled");
        AddToCartProductView(button,p_id,deal_id,user_id,qty);
        setTimeout(function(){
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
        }, 1000);
        // location.replace("checkout.php");
        // setTimeout(function(){location.replace("checkout.php")}, 2000);
        }  
    // }
jdD.preventDefault();
});

// add to cart from top
$(document).on("click","#add-to-cart, #add-to-cart-qview",function(ca){
    if(this.id == "add-to-cart"){
        if($(this).hasClass("isDisabled")){
            notActiveDealMsg();
        }else{
        var button = $(this);
        var p_id = $("#p-id").val();
        var user_id = $("#u-id").val();
        var deal_id = $("#deal-id").val();
        var qty = $("#qty").val();
        AddToCartProductView(button,p_id,deal_id,user_id,qty);
        }   
    }else if(this.id == "add-to-cart-qview"){
        if($(this).hasClass("isDisabled")){
            notActiveDealMsg();
        }else{
            var button = $(this);
            var p_id = $(this).data("p_id");
            var user_id = $("#u-id").val();
            var deal_id = $("#deal-id").val();
            var qty = 1;
            AddToCartProductView(button,p_id,deal_id,user_id,qty);            
        }
    }
  ca.preventDefault();  
});

// add to cart from bottom products
$("#cart-buttom-1").click(function(wb){
    if($(this).hasClass("isDisabled")){
        notActiveDealMsg();        
    }else{
        var button_b = $(this);
        var p_id_b = $(this).data("pro_id");
        var d_id_b = $(this).data("deal_id");
        var user_id_b = $("#u-id").val();
        var qty = 1;
        AddToCartProductView(button_b,p_id_b,d_id_b,user_id_b,qty);
    }
    wb.preventDefault();
});

$("#cart-buttom-2").click(function(wb){
    if($(this).hasClass("isDisabled")){
        notActiveDealMsg();        
    }else{
        var button_b = $(this);
        var p_id_b = $(this).data("pro_id");
        var d_id_b = $(this).data("deal_id");
        var user_id_b = $("#u-id").val();
        var qty = 1;
        AddToCartProductView(button_b,p_id_b,d_id_b,user_id_b,qty);
    }
    wb.preventDefault();
});
$("#cart-buttom-3").click(function(wb){
    if($(this).hasClass("isDisabled")){
        notActiveDealMsg();        
    }else{
        var button_b = $(this);
        var p_id_b = $(this).data("pro_id");
        var d_id_b = $(this).data("deal_id");
        var user_id_b = $("#u-id").val();
        var qty = 1;
        AddToCartProductView(button_b,p_id_b,d_id_b,user_id_b,qty);
    }
    wb.preventDefault();
});
$("#cart-buttom-4").click(function(wb){
    if($(this).hasClass("isDisabled")){
        notActiveDealMsg();        
    }else{
        var button_b = $(this);
        var p_id_b = $(this).data("pro_id");
        var d_id_b = $(this).data("deal_id");
        var user_id_b = $("#u-id").val();
        var qty = 1;
        AddToCartProductView(button_b,p_id_b,d_id_b,user_id_b,qty);
    }
    wb.preventDefault();
});
$("#cart-buttom-5").click(function(wb){
    if($(this).hasClass("isDisabled")){
        notActiveDealMsg();        
    }else{
        var button_b = $(this);
        var p_id_b = $(this).data("pro_id");
        var d_id_b = $(this).data("deal_id");
        var user_id_b = $("#u-id").val();
        var qty = 1;
        AddToCartProductView(button_b,p_id_b,d_id_b,user_id_b,qty);
    }
    wb.preventDefault();
});

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

// add to cart function
function AddToCartProductView(bc_button,Product_ID,dealId,User_ID,qty){
    // $(document).on("click","#add-to-cart, #add-to-cart-qview",function(cart){
      // var button = $(this);
      // var p_id = $("#p-id").val();
      // var user_id = $("#u-id").val();
      var button = bc_button;
      var p_id = Product_ID;
      var deal_id = dealId;
      var user_id = User_ID;
      var c_qty  = qty;
      console.log(p_id +"--"+ user_id);
        if(user_id == ""){
            $("#error-message").html("<div class='myAlert-bottom alert alert-dismissible fade show alert-info mt-1 mb-2 rounded' role='alert'>Please Login to Add to Cart. click here <span class='text-uppercase font-weight-bold text-reset text-white'>&nbsp&nbsp&nbsp&nbsp<a href='login.php?continue=<?php echo $actual_link; ?>'>login</a></span><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
            $("#success-message").slideUp();
        }else{
            $.ajax({
                url: "all-products-files/add-to-Cart.php",
                method:"POST",
                data:{p_id:p_id,d_id:deal_id,u_id:user_id,qty:c_qty},
                success:function(data){

                    if(data == 1){
                     $("#success-message").html("<div class='myAlert-bottom alert alert-dismissible fade show alert-success mt-1 mb-2 rounded' role='alert'>successfully added to Cart.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
                     $("#error-message").slideUp();
                     setTimeout(function(){$("#success-message").fadeOut("slow")}, 4000);
                     button.addClass("isDisabled");
                     loadCartNumber();
                     loadDropdownCart();
                    }else{
                     $("#error-message").html("<div class='myAlert-bottom alert alert-dismissible fade show alert-primary mt-1 mb-2 rounded' role='alert'>it's already added to Cart .<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
                     $("#success-message").slideUp();
                     setTimeout(function(){$("#error-message").fadeOut("slow")}, 4000);
                     button.addClass("isDisabled");
                    }
                  
                }
            });
        }

      // cart.preventDefault();
    // });
}

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