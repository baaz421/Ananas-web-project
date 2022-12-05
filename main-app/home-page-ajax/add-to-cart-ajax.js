// add-to-cart-ajax.js
$(document).ready(function(){
  'use strict';
  console.log("add-to-cart-js-files-showing");

  function notActiveDealMsg(){
    $("#error-message").html("<div class='myAlert-bottom alert alert-dismissible fade show alert-primary mt-1 mb-2 rounded' role='alert'>Sorry this is not active deal, Wait till its on deal. <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>").slideDown();
    $("#success-message").slideUp();
    setTimeout(function(){$("#error-message").fadeOut("slow")}, 4000);
  }

  // add to cart from green zone products
    $("#cart-buttom-g1").click(function(cbg1){
        if($(this).hasClass("isDisabled")){
            notActiveDealMsg();        
        }else{
            var button_b = $(this);
            var p_id_b = $(this).data("pro_id");
            var d_id_b = $(this).data("deal_id");
            var user_id_b = $("#u-id").val();
            var qty = 1;
            AddToCartHome(button_b,p_id_b,d_id_b,user_id_b,qty);
        }
        cbg1.preventDefault();
    });
    $("#cart-buttom-g2").click(function(cbg2){
        if($(this).hasClass("isDisabled")){
            notActiveDealMsg();        
        }else{
            var button_b = $(this);
            var p_id_b = $(this).data("pro_id");
            var d_id_b = $(this).data("deal_id");
            var user_id_b = $("#u-id").val();
            var qty = 1;
            AddToCartHome(button_b,p_id_b,d_id_b,user_id_b,qty);
        }
        cbg2.preventDefault();
    });
    $("#cart-buttom-g3").click(function(cbg3){
        if($(this).hasClass("isDisabled")){
            notActiveDealMsg();        
        }else{
            var button_b = $(this);
            var p_id_b = $(this).data("pro_id");
            var d_id_b = $(this).data("deal_id");
            var user_id_b = $("#u-id").val();
            var qty = 1;
            AddToCartHome(button_b,p_id_b,d_id_b,user_id_b,qty);
        }
        cbg3.preventDefault();
    });
    $("#cart-buttom-g4").click(function(cbg4){
        if($(this).hasClass("isDisabled")){
            notActiveDealMsg();        
        }else{
            var button_b = $(this);
            var p_id_b = $(this).data("pro_id");
            var d_id_b = $(this).data("deal_id");
            var user_id_b = $("#u-id").val();
            var qty = 1;
            AddToCartHome(button_b,p_id_b,d_id_b,user_id_b,qty);
        }
        cbg4.preventDefault();
    });
    $("#cart-buttom-g5").click(function(cbg5){
        if($(this).hasClass("isDisabled")){
            notActiveDealMsg();        
        }else{
            var button_b = $(this);
            var p_id_b = $(this).data("pro_id");
            var d_id_b = $(this).data("deal_id");
            var user_id_b = $("#u-id").val();
            var qty = 1;
            AddToCartHome(button_b,p_id_b,d_id_b,user_id_b,qty);
        }
        cbg5.preventDefault();
    });

  // add to cart from orange zone products
    $("#cart-buttom-o1").click(function(cbo1){
        if($(this).hasClass("isDisabled")){
            notActiveDealMsg();        
        }else{
            var button_b = $(this);
            var p_id_b = $(this).data("pro_id");
            var d_id_b = $(this).data("deal_id");
            var user_id_b = $("#u-id").val();
            var qty = 1;
            AddToCartHome(button_b,p_id_b,d_id_b,user_id_b,qty);
        }
        cbo1.preventDefault();
    });
    $("#cart-buttom-o2").click(function(cbo2){
        if($(this).hasClass("isDisabled")){
            notActiveDealMsg();        
        }else{
            var button_b = $(this);
            var p_id_b = $(this).data("pro_id");
            var d_id_b = $(this).data("deal_id");
            var user_id_b = $("#u-id").val();
            var qty = 1;
            AddToCartHome(button_b,p_id_b,d_id_b,user_id_b,qty);
        }
        cbo2.preventDefault();
    });
    $("#cart-buttom-o3").click(function(cbo3){
        if($(this).hasClass("isDisabled")){
            notActiveDealMsg();        
        }else{
            var button_b = $(this);
            var p_id_b = $(this).data("pro_id");
            var d_id_b = $(this).data("deal_id");
            var user_id_b = $("#u-id").val();
            var qty = 1;
            AddToCartHome(button_b,p_id_b,d_id_b,user_id_b,qty);
        }
        cbo3.preventDefault();
    });
    $("#cart-buttom-o4").click(function(cbo4){
        if($(this).hasClass("isDisabled")){
            notActiveDealMsg();        
        }else{
            var button_b = $(this);
            var p_id_b = $(this).data("pro_id");
            var d_id_b = $(this).data("deal_id");
            var user_id_b = $("#u-id").val();
            var qty = 1;
            AddToCartHome(button_b,p_id_b,d_id_b,user_id_b,qty);
        }
        cbo4.preventDefault();
    });
    $("#cart-buttom-o5").click(function(cbo5){
        if($(this).hasClass("isDisabled")){
            notActiveDealMsg();        
        }else{
            var button_b = $(this);
            var p_id_b = $(this).data("pro_id");
            var d_id_b = $(this).data("deal_id");
            var user_id_b = $("#u-id").val();
            var qty = 1;
            AddToCartHome(button_b,p_id_b,d_id_b,user_id_b,qty);
        }
        cbo5.preventDefault();
    });

  // add to cart from red zone products
    $("#cart-buttom-r1").click(function(cbr1){
        if($(this).hasClass("isDisabled")){
            notActiveDealMsg();        
        }else{
            var button_b = $(this);
            var p_id_b = $(this).data("pro_id");
            var d_id_b = $(this).data("deal_id");
            var user_id_b = $("#u-id").val();
            var qty = 1;
            AddToCartHome(button_b,p_id_b,d_id_b,user_id_b,qty);
        }
        cbr1.preventDefault();
    });
    $("#cart-buttom-r2").click(function(cbr2){
        if($(this).hasClass("isDisabled")){
            notActiveDealMsg();        
        }else{
            var button_b = $(this);
            var p_id_b = $(this).data("pro_id");
            var d_id_b = $(this).data("deal_id");
            var user_id_b = $("#u-id").val();
            var qty = 1;
            AddToCartHome(button_b,p_id_b,d_id_b,user_id_b,qty);
        }
        cbr2.preventDefault();
    });
    $("#cart-buttom-r3").click(function(cbr3){
        if($(this).hasClass("isDisabled")){
            notActiveDealMsg();        
        }else{
            var button_b = $(this);
            var p_id_b = $(this).data("pro_id");
            var d_id_b = $(this).data("deal_id");
            var user_id_b = $("#u-id").val();
            var qty = 1;
            AddToCartHome(button_b,p_id_b,d_id_b,user_id_b,qty);
        }
        cbr3.preventDefault();
    });
    $("#cart-buttom-r4").click(function(cbr4){
        if($(this).hasClass("isDisabled")){
            notActiveDealMsg();        
        }else{
            var button_b = $(this);
            var p_id_b = $(this).data("pro_id");
            var d_id_b = $(this).data("deal_id");
            var user_id_b = $("#u-id").val();
            var qty = 1;
            AddToCartHome(button_b,p_id_b,d_id_b,user_id_b,qty);
        }
        cbr4.preventDefault();
    });
    $("#cart-buttom-r5").click(function(cbr5){
        if($(this).hasClass("isDisabled")){
            notActiveDealMsg();        
        }else{
            var button_b = $(this);
            var p_id_b = $(this).data("pro_id");
            var d_id_b = $(this).data("deal_id");
            var user_id_b = $("#u-id").val();
            var qty = 1;
            AddToCartHome(button_b,p_id_b,d_id_b,user_id_b,qty);
        }
        cbr5.preventDefault();
    });

  // add to cart from green zone products
    $("#cart-buttom-fd1").click(function(cbfd1){
        if($(this).hasClass("isDisabled")){
            notActiveDealMsg();        
        }else{
            var button_b = $(this);
            var p_id_b = $(this).data("pro_id");
            var d_id_b = $(this).data("deal_id");
            var user_id_b = $("#u-id").val();
            var qty = 1;
            AddToCartHome(button_b,p_id_b,d_id_b,user_id_b,qty);
        }
        cbfd1.preventDefault();
    });
    $("#cart-buttom-fd2").click(function(cbfd2){
        if($(this).hasClass("isDisabled")){
            notActiveDealMsg();        
        }else{
            var button_b = $(this);
            var p_id_b = $(this).data("pro_id");
            var d_id_b = $(this).data("deal_id");
            var user_id_b = $("#u-id").val();
            var qty = 1;
            AddToCartHome(button_b,p_id_b,d_id_b,user_id_b,qty);
        }
        cbfd2.preventDefault();
    });
    $("#cart-buttom-fd3").click(function(cbfd3){
        if($(this).hasClass("isDisabled")){
            notActiveDealMsg();        
        }else{
            var button_b = $(this);
            var p_id_b = $(this).data("pro_id");
            var d_id_b = $(this).data("deal_id");
            var user_id_b = $("#u-id").val();
            var qty = 1;
            AddToCartHome(button_b,p_id_b,d_id_b,user_id_b,qty);
        }
        cbfd3.preventDefault();
    });
    $("#cart-buttom-fd4").click(function(cbfd4){
        if($(this).hasClass("isDisabled")){
            notActiveDealMsg();        
        }else{
            var button_b = $(this);
            var p_id_b = $(this).data("pro_id");
            var d_id_b = $(this).data("deal_id");
            var user_id_b = $("#u-id").val();
            var qty = 1;
            AddToCartHome(button_b,p_id_b,d_id_b,user_id_b,qty);
        }
        cbfd4.preventDefault();
    });

  // add to cart from Quick view
    $(document).on("click", "#add-to-cart-qview",function(ca){         
      if($(this).hasClass("isDisabled")){
        notActiveDealMsg();
      }else{
        var button = $(this);
        var p_id = $(this).data("p_id");
        var user_id = $("#u-id").val();
        var deal_id = $(this).data("d_id");
        var qty = 1;
        AddToCartHome(button,p_id,deal_id,user_id,qty);
        console.log(p_id+"-"+deal_id+"-"+user_id+"-"+qty)          
      }        
      ca.preventDefault();  
    });

  // load dorpdown cart for home page
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

  // Add to cart for home function
  function AddToCartHome(bc_button,Product_ID,dealId,User_ID,qty){
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
  }

});