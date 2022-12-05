// whishlist-ajax.js
$(document).ready(function(){
  'use strict';
  console.log("whishlist-js-files-showing");

  // add to wishlist buttom for green Zone
    $("#wishlist-buttom-g1").click(function(wbg1){
        var button = $(this);
        var p_id_b = $(this).data("pro_id");
        var user_id_b = $("#u-id").val();
        AddToWishListHome(p_id_b,user_id_b,button); 
        wbg1.preventDefault();
    });
    $("#wishlist-buttom-g2").click(function(wbg2){
        var button = $(this);
        var p_id_b = $(this).data("pro_id");
        var user_id_b = $("#u-id").val();
        AddToWishListHome(p_id_b,user_id_b,button); 
        wbg2.preventDefault();
    });
    $("#wishlist-buttom-g3").click(function(wbg3){
        var button = $(this);
        var p_id_b = $(this).data("pro_id");
        var user_id_b = $("#u-id").val();
        AddToWishListHome(p_id_b,user_id_b,button); 
        wbg3.preventDefault();
    });
    $("#wishlist-buttom-g4").click(function(wbg4){
        var button = $(this);
        var p_id_b = $(this).data("pro_id");
        var user_id_b = $("#u-id").val();
        AddToWishListHome(p_id_b,user_id_b,button); 
        wbg4.preventDefault();
    });
    $("#wishlist-buttom-g5").click(function(wbg5){
        var button = $(this);
        var p_id_b = $(this).data("pro_id");
        var user_id_b = $("#u-id").val();
        AddToWishListHome(p_id_b,user_id_b,button); 
        wbg5.preventDefault();
    });

  // add to wishlist buttom for orange Zone
    $("#wishlist-buttom-o1").click(function(wbo1){
        var button = $(this);
        var p_id_b = $(this).data("pro_id");
        var user_id_b = $("#u-id").val();
        AddToWishListHome(p_id_b,user_id_b,button); 
        wbo1.preventDefault();
    });
    $("#wishlist-buttom-o2").click(function(wbo2){
        var button = $(this);
        var p_id_b = $(this).data("pro_id");
        var user_id_b = $("#u-id").val();
        AddToWishListHome(p_id_b,user_id_b,button); 
        wbo2.preventDefault();
    });
    $("#wishlist-buttom-o3").click(function(wbo3){
        var button = $(this);
        var p_id_b = $(this).data("pro_id");
        var user_id_b = $("#u-id").val();
        AddToWishListHome(p_id_b,user_id_b,button); 
        wbo3.preventDefault();
    });
    $("#wishlist-buttom-o4").click(function(wbo4){
        var button = $(this);
        var p_id_b = $(this).data("pro_id");
        var user_id_b = $("#u-id").val();
        AddToWishListHome(p_id_b,user_id_b,button); 
        wbo4.preventDefault();
    });
    $("#wishlist-buttom-o5").click(function(wbo5){
        var button = $(this);
        var p_id_b = $(this).data("pro_id");
        var user_id_b = $("#u-id").val();
        AddToWishListHome(p_id_b,user_id_b,button); 
        wbo5.preventDefault();
    });

  // add to wishlist buttom for red Zone
    $("#wishlist-buttom-r1").click(function(wbr1){
        var button = $(this);
        var p_id_b = $(this).data("pro_id");
        var user_id_b = $("#u-id").val();
        AddToWishListHome(p_id_b,user_id_b,button); 
        wbr1.preventDefault();
    });
    $("#wishlist-buttom-r2").click(function(wbr2){
        var button = $(this);
        var p_id_b = $(this).data("pro_id");
        var user_id_b = $("#u-id").val();
        AddToWishListHome(p_id_b,user_id_b,button); 
        wbr2.preventDefault();
    });
    $("#wishlist-buttom-r3").click(function(wbr3){
        var button = $(this);
        var p_id_b = $(this).data("pro_id");
        var user_id_b = $("#u-id").val();
        AddToWishListHome(p_id_b,user_id_b,button); 
        wbr3.preventDefault();
    });
    $("#wishlist-buttom-r4").click(function(wbr4){
        var button = $(this);
        var p_id_b = $(this).data("pro_id");
        var user_id_b = $("#u-id").val();
        AddToWishListHome(p_id_b,user_id_b,button); 
        wbr4.preventDefault();
    });
    $("#wishlist-buttom-r5").click(function(wbr5){
        var button = $(this);
        var p_id_b = $(this).data("pro_id");
        var user_id_b = $("#u-id").val();
        AddToWishListHome(p_id_b,user_id_b,button); 
        wbr5.preventDefault();
    });

  // add to wishlist buttom for green Zone
    $("#wishlist-buttom-fd1").click(function(wbfd1){
        var button = $(this);
        var p_id_b = $(this).data("pro_id");
        var user_id_b = $("#u-id").val();
        AddToWishListHome(p_id_b,user_id_b,button); 
        wbfd1.preventDefault();
    });
    $("#wishlist-buttom-fd2").click(function(wbfd2){
        var button = $(this);
        var p_id_b = $(this).data("pro_id");
        var user_id_b = $("#u-id").val();
        AddToWishListHome(p_id_b,user_id_b,button); 
        wbfd2.preventDefault();
    });
    $("#wishlist-buttom-fd3").click(function(wbfd3){
        var button = $(this);
        var p_id_b = $(this).data("pro_id");
        var user_id_b = $("#u-id").val();
        AddToWishListHome(p_id_b,user_id_b,button); 
        wbfd3.preventDefault();
    });
    $("#wishlist-buttom-fd4").click(function(wbfd4){
        var button = $(this);
        var p_id_b = $(this).data("pro_id");
        var user_id_b = $("#u-id").val();
        AddToWishListHome(p_id_b,user_id_b,button); 
        wbfd4.preventDefault();
    });

  // add to Wishlist quickview
  $(document).on("click","#add-to-wishlist-quick",function(wish){
      var button = $(this);
      var p_id = $(this).data("p_id");
      var user_id = $("#u-id").val();
      AddToWishListHome(p_id,user_id,button);
      wish.preventDefault();
  });

  // load wishlist number count
    function loadWishlistNumber(){
      $.ajax({
        url: "all-products-files/wishlist-number-display.php",
        success:function(data){
          $("#wishlist-num").text(data);
        }
      });
    };

  // Add to wishlist for home function
    function AddToWishListHome(product_id,user_ID,w_button){
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

});